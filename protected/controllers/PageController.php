<?php
Class PageController Extends Controller {
	public function actionCreate() {
		$this->restrict();

		$page = New Page;

		if($_POST) {
			$page->attributes = $_POST['Page'];
			if($page->save())
				$this->redirect(Array('/page/index'));
		}

		$this->render('create', array('model' => $page));
	}

	public function actionUpdate() {
		$this->restrict();

		$page = Page::model()->findByPK($_GET['id']);

		if($_POST) {
			$page->attributes = $_POST['Page'];
			$page->save();
		}

		$this->render('create', array('model' => $page));
	}

	public function actionIndex() {
		$this->render('index');
	}

	public function actionDelete() {
		$this->restrict();

		$page = Page::model()->findByPK($_GET['id']);
		if($page)
			$page->delete();
	}

	public function actionView() {
		$page = Page::model()->findByAttributes(Array('url' => current(array_keys($_GET))));
		if(!$page)
			throw new CHttpException(404);

		$this->render('view', array('model' => $page));
	}
}