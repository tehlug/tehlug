<?php
Class SessionController Extends Controller {
	public function actionCreate() {
		$this->restrict();

		$model = New Session;

		if($_POST) {
			$model->attributes = $_POST['Session'];
			$model->author_id = Member::model()->findByLabel($_POST['author'])->id;
			$model->date = DateTimeParser::parse($_POST['Session']['date']);
			$model->save();
		}

		$this->render('create', array('model' => $model));
	}

	public function actionUpdate() {
		$this->restrict();

		$model = Session::model()->findByPK($_GET['id']);

		if($_POST) {
			$model->attributes = $_POST['Session'];
			$model->author_id = Member::model()->findByLabel($_POST['author'])->id;
			$model->date = DateTimeParser::parse($_POST['Session']['date']);


			foreach(Session_Participant::model()->findAllByAttributes(Array('session_id' => $model->id)) as $p)
				$p->delete();

			$participants = Array();
			foreach($_POST['participant'] as $label)
				if($member = Member::model()->findByLabel($label)) {
					$p = New Session_Participant;
					$p->session_id = $model->id;
					$p->member_id = $member->id;
					$p->save();
				}


			$model->save();
		}

		$this->render('create', array('model' => $model));
	}

	public function actionIndex() {
		$this->render('index');
	}

	public function actionView() {
		$model = Session::model()->findByPK($_GET['id']);
		$this->render('view', array('model' => $model));
	}

	public function actionDelete() {
		$this->restrict();

		$session = Session::model()->findByPK($_GET['id']);
		if($session)
			$session->delete();
	}
}