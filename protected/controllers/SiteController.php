<?php

class SiteController extends Controller
{
	public function init()
    {
        //if (isset($_SESSION['user'])) {
		//
        //} else {
        //    Yii::app()->user->isGuest;
        //}
		//
        //if (Yii::app()->user->isGuest) {
        //    Yii::app()->theme = 'login';
        //} else {
		//	Yii::app()->theme = 'adminlte';
        //}
		Yii::app()->session->add('apel_iduser', 'APEL000002');
		Yii::app()->theme = 'adminlte';
        parent::init();
    } 
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->render('index');		
	}

	public function actionAuth()
	{
		$this->render('index');		
	}
	
	public function actionDashboard()
    {
        if (Yii::app()->user->isGuest) {
            $this->redirect(CController::createUrl('site/login'));
        } else {
			$this->redirect(CController::createUrl('beranda/admin'));
        }
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$_SESSION['login'] = '1'; die(json_encode($_SESSION));
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionCreate()
	{
		$model=new TblPosting;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblPosting']))
		{
			$model->attributes=$_POST['TblPosting'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionPosting()
	{
		$sql="
		    INSERT INTO tbl_posting(`id`, `uid`, `message`, `tag`, `type`, `value`, `idgroupposting`, `page`, `time`, `photo`, `likes`, `comments`, `shares`) VALUES ('','".$_POST['uid']."','".$_POST['message']."','','','','".$_POST['group']."','',NOW(),'','','','')
             ";
			
			$execute  = Yii::app()->db->createCommand($sql)->execute();
			
			$sql1="select * from tbl_posting order by id desc";			
			$cekuser  = Yii::app()->db->createCommand($sql1)->queryScalar();
			echo $cekuser;
	}
	
	public function actionComment()
	{
		
		$sql="
		    INSERT INTO tbl_comments(`id`, `uid`, `mid`, `message`, `type`, `value`, `time`, `likes`) VALUES ('','".$_POST['comment_uid']."','".$_POST['comment_mid']."','".$_POST['comment_msg']."','','',NOW(),'')
             ";
			
		$execute  = Yii::app()->db->createCommand($sql)->execute();
		$sql1="
		    update tbl_posting set comments = comments+1 where id='".$_POST['comment_mid']."'
             ";
			
			$execute  = Yii::app()->db->createCommand($sql1)->execute();
			
		$uid = $_POST['comment_uid'];
		$mid = $_POST['comment_mid'];
		$msg = $_POST['comment_msg'];
		
		$this->render('admin');
		
		//print_r($uid." - ".$mid." - ".$msg); die;
		
	}
	
	public function actionLike()
	{
		$sql="
		    INSERT INTO tbl_likes(`id`, `post`, `idby`, `type`, `time`) VALUES ('','".$_POST['mid']."','".$_POST['uid']."','',NOW())
             ";
			
			$execute  = Yii::app()->db->createCommand($sql)->execute();
			
		$sql1="
		    update tbl_posting set likes = likes+1 where id='".$_POST['mid']."'
             ";
			
			$execute  = Yii::app()->db->createCommand($sql1)->execute();
	}
	
	public function actionUnlike()
	{
		$sql="
		    Delete from tbl_likes where post = '".$_POST['mid']."' and idby ='".$_POST['uid']."'
             ";
			
			$execute  = Yii::app()->db->createCommand($sql)->execute();
			
		$sql1="
		    update tbl_posting set likes = likes-1 where id='".$_POST['mid']."'
             ";
			
			$execute  = Yii::app()->db->createCommand($sql1)->execute();
	}
	
	public function actionSearch()
	{
		$keyword=$_POST['formsearch'];
		$cari = Yii::app()->db->createCommand()
	        ->select('a.*, date_format(a.time,"%d %M %Y %H:%i:%s") as tgl_post, b.nama as nama')
	        ->from('tbl_posting a')
	        ->where(array('like', 'message', '%'.$keyword.'%'))
	        ->leftJoin('tbl_mst_profil b', 'b.user_id=a.uid')
	        ->queryAll();
		

		$this->render('search',array(
			'cari'=>$cari,
		));
	}
	
	public function actionUpload()
	{
		$file = 'lampiran_file';
		if (isset($_FILES[$file])) {
			
			$media	= $_FILES[$file];
			$ext	= pathinfo($_FILES[$file]["name"], PATHINFO_EXTENSION);
			$size	= $_FILES[$file]["size"];
			$tgl	= date("Y-m-d");

			if ($media["error"] !== UPLOAD_ERR_OK) {
				echo '<div class="alert alert-warning">Gagal upload file.</div>';
				exit;
			}
			
			$name = preg_replace("/[^A-Z0-9._-]/i", "_", $media["name"]);
			
			$uploaddir = Yii::app()->basePath . '/../themes/clean/upload/msgimg/';
			$uploadfile = $uploaddir . $_POST['idtrx'].'.'.$ext;
			$success = move_uploaded_file($_FILES[$file]["tmp_name"], $uploadfile);
			if ($success) { 
				//$in = $conn->query("INSERT INTO files(tgl_upload, file_name, file_size, file_type) VALUES('$tgl', '$name', '$size', '$ext')");
				//$q = $conn->query("SELECT id FROM files ORDER BY id DESC LIMIT 1");
				//$rq = $q->fetch_assoc();
				//echo $rq['id'];
				$sql1="update tbl_posting set tag ='".$_POST['idtrx'].".".$ext."', photo = photo+1 where id='".$_POST['idtrx']."'
                 ";
			    
			    $execute  = Yii::app()->db->createCommand($sql1)->execute();
				
				echo 'Sukses';
				exit;
			}
		}
	}
}