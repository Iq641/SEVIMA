<?php

class DatatestController extends Controller
{
	public function init()
    {
        //if (isset($_SESSION['user'])) {

       // } else {
           // Yii::app()->user->isGuest;
        //}

        //if (Yii::app()->user->isGuest) {
            //Yii::app()->theme = 'login';
        //} else {
			Yii::app()->theme = 'adminlte';
        //}
        parent::init();
    }
	
	public function actionIndex()
	{
		$go['home'] = Controller::createUrl('site/index');

		$iduser = Yii::app()->session->get('apel_iduser');
		$mod    = MstUser::model()->find('iduser="'. $iduser .'"');
		$idkat  = explode(',',$mod->idkategori);
		$data   = array();
		foreach($idkat as $idk) {
			$cek = MstKategori::model()->find('idkategori="'. $idk .'"');
			if ($cek!=null) { $data[]  = $cek; }
		}
		
		$this->render('index',array('data'=>$data,'go'=>$go));
	}

	public function actionTestSoal()
	{
		$go['back'] = Controller::createUrl('index');
		
		$id     			   = $_GET['id'];
		$model				   = MstKategori::model()->findByPk($id);
		$data['idkategori']    = $model->idkategori;
		$data['nama_kategori'] = $model->nama;

		$iduser			   = Yii::app()->session->get('apel_iduser');
		$model			   = MstUser::model()->find('iduser="'. $iduser .'"');
		$data['iduser']    = $iduser;
		$data['nama_user'] = $model->nama;
		$data['tgl_mulai'] = date('Y-m-d H:s:i');
		do {
			$no  = Tool::GETNumber('JAWABAN');
			$cek = DataJawaban::model()->find('idjawab="'. $no .'"');				
		} while ($cek!=null);
		$data['idjawab'] = $no; 

		$sql  = 'select * from mst_soal where idkategori="'. $data['idkategori'] .'" order by no_soal';
		$soal = Yii::app()->db->createCommand($sql)->queryAll(); 
		$no   = array();
		for($i=0; $i<count($soal); $i++) { $no[] = $i; }
		shuffle($no); 
		
		$data['soal'] = array();	$i = 0;
		foreach($no as $no) { $i++; $data['soal'][$i] = $soal[$no]; }
		
		$data['soal'] = $soal;
		$data['no']   = $no;

		$this->render('_input',array('data'=>$data,'go'=>$go));
	}
	
	public function actionSimpanJawaban() {
		$data   = json_decode($_POST['data'],true);
		$iduser = $data['iduser']; 
		$idjwb  = $data['idjawab'];
		$tglM   = $data['tgl_mulai'];
		$tglS   = date('Y-m-d H:s:i');
		
		$sql   = 'idjawab="' . $idjwb .'"'; 
		$model  = DataJawaban::model()->find($sql); 
		if ($model==null) {
			$model = new DataJawaban;
			$model->idjawab    = $idjwb;
			$model->iduser     = $iduser; 
			$model->idkategori = $data['idkategori'];
			$model->tgl_mulai  = date('Y-m-d H:s:i',strtotime($data['idkategori'])); 
		}
		$model->tgl_selesai  = date('Y-m-d H:s:i'); 
		if ($data['jwb']==$data['jwb_kunci']) {
			$model->benar = $model->benar + 1;
		} else {
			$model->salah = $model->salah + 1;
		}
		$model->save(false);
		
		echo true;
	}
		
}