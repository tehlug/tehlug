<?php
Class MemberController Extends Controller {
	public function actionCreate() {
		$this->restrict();

		$model = New Member;

		if($_POST) {
			$model->attributes = $_POST['Member'];

			if($_POST['Member']['password'])
				$model->password = md5($_POST['Member']['password']);
			else
				$model->password = md5($model->randomPassword);

			$model->save();
		}

		$this->render('create', array('model' => $model));
	}

	public function actionUpdate() {
		$this->restrict();

		$model = Member::model()->findByPK($_GET['id']);

		if($_POST) {
			$model->attributes = $_POST['Member'];
			if($_POST['Member']['password'])
				$model->password = md5($_POST['Member']['password']);

			$model->save();
		}

		$this->render('create', array('model' => $model));
	}

	public function actionIndex() {
		$this->render('index');
	}

	public function actionSearch() {
		$all = Array();
		foreach(Member::model()->findAllBySql('SELECT * FROM member WHERE name LIKE "%'.$_GET['term'].'%"') as $member)
			$all[] = $member->label;

		echo json_encode($all);
	}

	public function actionDelete() {
		$this->restrict();

		$member = Member::model()->findByPK($_GET['id']);
		if($member)
			$member->delete();
	}

	public function actionView() {
		$member = Member::model()->findByPK($_GET['id']);
		$this->render('view', array('model' => $member));
	}

	public function actionLogin() {
		$model = New Member;
		$model->scenario = 'login';

		if($_POST) {
			$model->email = $_POST['Member']['email'];
			$model->password = $_POST['Member']['password'];
			if($model->validate()) {
				$identity = New MemberIdentity($model->email, $model->password);
				if($identity->authenticate()) {
					Yii::app()->user->login($identity);
					$this->redirect(Array('/'));
				} else
					$model->addError('email', Yii::t('member', 'Entered username and/or password is not correct'));
			}
		}

		$this->render('login', array('model' => $model));
	}

	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Array('/'));
	}
}