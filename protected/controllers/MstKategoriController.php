<?php

class MstKategoriController extends Controller
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
		$go['new'] 	 = Controller::createUrl('NewData');
		$sql  = 'select * from mst_kategori order by idkategori';
		$data = Yii::app()->db->createCommand($sql)->queryAll();
		
		$this->render('index',array('data'=>$data,'go'=>$go));
	}	
	
	public function actionNewData()
	{
		$go['back']  = Controller::createUrl('admin');
		$model		 = new MstKategori;
		$model->id	 = 0;
		
		$this->render('_input',array('model'=>$model,'go'=>$go));
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
			$nama = $data['nama'];
			
			$sql  = 'select id from mst_kategori where id<>'. $id .' and nama="'. $nama .'"';
			$cek  = Yii::app()->db->createCommand($sql)->queryAll();
			if ($cek!=null) { $ok = 1; }
		}
		
		echo $ok;
	}	
}