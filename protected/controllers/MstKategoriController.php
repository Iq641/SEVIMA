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
		$go['back']  = Controller::createUrl('index');
		$go['new'] 	 = Controller::createUrl('NewData');
		$sql  = 'select * from mst_kategori order by idkategori';
		$data = Yii::app()->db->createCommand($sql)->queryAll();
		
		$this->render('index',array('data'=>$data,'go'=>$go));
	}	
	
	public function actionNewData()
	{
		$go['back']  = Controller::createUrl('index');
		$model		 = new MstKategori;
		$model->id	 = 0;
		
		$this->render('_input',array('model'=>$model,'go'=>$go));
	}

	public function actionEditData()
	{
		$go['back']  = Controller::createUrl('index');
		
		$id          = $_GET['id'];
		$model		 = MstKategori::model()->findByPk($id);
		
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
			
			$sql  = 'id<>'. $id .' and nama="'. $nama .'"';
			$cek  = MstKategori::model()->find($sql);
			if ($cek!=null) { $ok = 1; }
		}
		
		echo $ok;
	}	
		
	public function actionSimpanData()
	{
		$data = json_decode($_POST['data'],true); 
		$id   = $data['id'];
		
		$model = MstKategori::model()->findByPk($id);
		if($model==null) {			
			do {
				$no  = Tool::GETNumber('KATEGORI');
				$cek = MstKategori::model()->find('idkategori="'. $no .'"');				
			} while ($cek!=null);
			
			$model = new MstKategori;
			$model->idkategori = $no;
		}

		$model->nama = $data['nama'];
		$ok  = $model->save(false);
		$msg = 'Simpan Data Kategori<br>'. $model->idkategori .' '. $model->nama;
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