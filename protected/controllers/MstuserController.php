<?php

class MstuserController extends Controller
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
		$sql  = 'select * from mst_user where iduser<>"APEL000000" order by iduser';
		$data = Yii::app()->db->createCommand($sql)->queryAll();

		$this->render('index',array('data'=>$data,'go'=>$go));
	}	
	
	function GOInput($model) {
		$go['back']  = Controller::createUrl('index');

		$sql = 'select idkategori,nama from mst_kategori order by idkategori';
		$dft = Yii::app()->db->createCommand($sql)->queryAll();
		
		$this->render('_input',array('model'=>$model,'go'=>$go, 'dft'=>$dft));
	}
	
	public function actionNewData()
	{
		$model		 = new MstUser;
		$model->id	 = 0;
		
		$this->GOInput($model);
	}

	public function actionEditData()
	{
		$id          = $_GET['id'];
		$model		 = MstUser::model()->findByPk($id);
		
		$this->GOInput($model);
	}
		
	public function actionCheckInput()
	{
		$ok = 0;
		$aksi = $_POST['aksi'];		
		if ($aksi=='del') {
		} 
		
		echo $ok;
	}	
		
	public function actionSimpanData()
	{
		$data = json_decode($_POST['data'],true); 
		$id   = $data['id'];
		
		$model = MstUser::model()->findByPk($id);
		if($model==null) {			
			do {
				$no  = Tool::GETNumber('USER');
				$cek = MstUser::model()->find('iduser="'. $no .'"');				
			} while ($cek!=null);

			$model = new MstUser;
			$model->iduser = $no;
			$model->sandi  = crypt('123456','apel'); 
		}

		$model->nama  	   = $data['nama'];
		$model->aktif 	   = $data['aktif'];
		$model->idkategori = $data['idkategori'];
		$ok  = $model->save(false);
		$msg = 'Simpan Data User<br>'. $model->iduser .' '. $model->nama;
		if ($ok) { $msg .= ', SUKSES'; 
		} else {   $msg .= ', GAGAL'; }
		
		echo $msg;
	}		

	public function actionHapusData()
	{
		$id    = $_POST['id'];
		$model = MstUser::model()->findByPk($id);
		$msg   = 'Hapus Data User<br>'. $model->iduser .' '. $model->nama;
		$ok	   = $model->delete();
		if ($ok) { $msg .= ', SUKSES'; 
		} else {   $msg .= ', GAGAL'; }
		
		echo $msg;
	}

	public function actionResetPassword()
	{
		$id    = $_POST['id'];
		$model = MstUser::model()->findByPk($id);
		$msg   = 'Reset Password User<br>'. $model->iduser .' '. $model->nama;
		$model->sandi = crypt('123456','apel');
		$ok	   = $model->save(false);
		if ($ok) { $msg .= ', SUKSES'; 
		} else {   $msg .= ', GAGAL'; }
		
		echo $msg;
	}
}