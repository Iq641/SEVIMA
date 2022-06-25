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
		$iduser = Yii::app()->session->get('apel_iduser');
		$id     = $_GET['id'];
		$model	= MstKategori::model()->findByPk($id);
		
		$data['iduser']		= $iduser;
		$data['idkategori'] = $model->idkategori;
		$data['nama']		= $model->nama;

		$sql  = 'select * from mst_soal where idkategori="'. $data['idkategori'] .'" order by no_soal';
		$soal = Yii::app()->db->createCommand($sql)->queryAll(); 
		for($i=1; $i<=count($soal); $i++) { $no[] = $i; }
		shuffle($no);
		
		$data['soal'] = $soal;
		$data['no']   = $no;

		$this->render('_input',array('data'=>$data,'go'=>$go));
	}
	
}