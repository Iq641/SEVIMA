<?php

class MstsoalController extends Controller
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
		$go['home']  = Controller::createUrl('site/index');
		$sql  = 'select * from mst_kategori order by idkategori';
		$data = Yii::app()->db->createCommand($sql)->queryAll();
		
		$this->render('index',array('data'=>$data,'go'=>$go));
	}	

	public function actionListSoal()
	{
		$idkategori 	  = $_GET['idkategori'];
		$mod	    	  = MstKategori::model()->find('idkategori="'. $idkategori .'"');
		$kategori['id']   = $mod->idkategori;
		$kategori['nama'] = $mod->nama;

		$go['back']  = Controller::createUrl('index');
		$go['new'] 	 = Controller::createUrl('NewData',array('kategori'=>$kategori));
				
		$sql  = 'select * from mst_soal where idkategori="'. $idkategori .'" order by no_soal';
		$data = Yii::app()->db->createCommand($sql)->queryAll();
		
		$this->render('_listSoal',array('data'=>$data,'go'=>$go, 'kategori'=>$kategori));
	}	
	
	public function actionNewData()
	{
		$kategori    = $_GET['kategori'];
		$go['back']  = Controller::createUrl('ListSoal',array('idkategori'=>$kategori['id']));
		
		$model		 = new MstSoal;
		$model->id	 = 0;
		
		$this->render('_input',array('model'=>$model,'go'=>$go, 'kategori'=>$kategori));
	}
	
	public function actionCheckInput()
	{
		$ok = 0;
		$aksi = $_POST['aksi'];		
		if ($aksi=='del') {
		} else {
			$data = $_POST['data'];
			$data = json_decode($data,true); 
			$id   = $data['id'];
			
			$idkategori = $data['id'];
			$no 		= $data['no_soal'];
			$ket 		= strtoupper($data['ket_soal']);
			
			$sql  = 'id<>'. $id .' and idkategori="'. $idkategori .'" and no_soal='. $no;
			$cek  = MstSoal::model()->find($sql);
			if ($cek!=null) { $ok = 1; 
			} else {
				$sql  = 'id<>'. $id .' and idkategori="'. $idkategori .'" and upper(ket_soal)="'. $ket .'"';
				$cek  = MstSoal::model()->find($sql);
				if ($cek!=null) { $ok = 2; }
			}
		}
		
		echo $ok;
	}	

	public function actionSimpanData()
	{
		$data = json_decode($_POST['data'],true); 
		$id   = $data['id'];
		
		$model = MstSoal::model()->findByPk($id);
		if($model==null) {			
			$model = new MstSoal;
			$model->idkategori = $data['idkategori'];
		}

		$model->no_soal   = $data['no_soal'];
		$model->ket_soal  = $data['ket_soal'];
		$model->jwb_a	  = $data['jwb_a'];
		$model->jwb_b	  = $data['jwb_b'];
		$model->jwb_c	  = $data['jwb_c'];
		$model->jwb_kunci = $data['jwb_kunci'];
		$ok  = $model->save(false);
		$msg = 'Simpan Data Kategori: '. $model->idkategori .' No. Soal: '. $model->no_soal;
		if ($ok) { $msg .= ', SUKSES'; 
		} else {   $msg .= ', GAGAL'; }
		
		echo $msg;
	}		

	public function actionHapusData()
	{
		$id    = $_POST['id'];
		$model = MstKategori::model()->findByPk($id);
		$msg   = 'Hapus Data Kategori<br>'. $model->idkategori .' '. $model->nama;
		$ok	   = $model->delete();
		if ($ok) { $msg .= ', SUKSES'; 
		} else {   $msg .= ', GAGAL'; }
		
		echo $msg;
	}	
}