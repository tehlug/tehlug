<?php
Class NewsController Extends Controller {
	public function actionCreate() {
		$this->restrict();

		$news = New News;

		if($_POST) {
			$news->attributes = $_POST['News'];
			$news->date = DateTimeParser::parse($_POST['News']['date']);
			if($news->save())
				$this->redirect(Array('/news/index'));
		}

		$this->render('create', array('model' => $news));
	}

	public function actionUpdate() {
		$this->restrict();

		$news = News::model()->findByPK($_GET['id']);

		if($_POST) {
			$news->attributes = $_POST['News'];
			$news->date = DateTimeParser::parse($_POST['News']['date']);
			$news->save();
		}

		$this->render('create', array('model' => $news));
	}

	public function actionIndex() {
		$this->render('index');
	}

	public function actionDelete() {
		$this->restrict();

		$news = News::model()->findByPK($_GET['id']);
		if($news)
			$news->delete();
	}

	public function actionView() {
		$news = News::model()->findByPK($_GET['id']);
		$this->render('view', array('model' => $news));
	}

	public function actionRss() {
		$this->renderPartial('rss');
	}
}