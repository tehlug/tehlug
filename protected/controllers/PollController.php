<?php
Class PollController Extends Controller {
	public function actionCreate() {
		$this->restrict();

		$model = New Poll;

		if($_POST) {
			$model->question = $_POST['Poll']['question'];
			$model->start_date = DateTimeParser::parse($_POST['Poll']['start_date']);
			$model->end_date = DateTimeParser::parse($_POST['Poll']['end_date']);

			if($model->save()) {
				foreach($_POST['new_answers'] as $answer) {
					if(!trim($answer)) //Skip empty options.
						continue;

					$a = New Answer;
					$a->answer = $answer;
					$a->poll_id = $model->id;
					$a->save();
				}
				$this->redirect(Array('/poll/view', 'id' => $model->id));
			}
		}

		$this->render('create', array('model' => $model));
	}

	public function actionUpdate() {
		$this->restrict();

		$model = Poll::model()->findByPk($_GET['id']);

		if($_POST) {
			$model->question = $_POST['Poll']['question'];
			$model->start_date = DateTimeParser::parse($_POST['Poll']['start_date']);
			$model->end_date = DateTimeParser::parse($_POST['Poll']['end_date']);

			if($model->save()) {
				foreach($model->answers as $answer)
					if($_POST['answer'][$answer->id]) {
						$answer->answer = $_POST['answer'][$answer->id];
						$answer->update();
					} else
						$answer->delete();

				foreach($_POST['new_answers'] as $answer) {
					if(!trim($answer)) //Skip empty options.
						continue;

					$a = New Answer;
					$a->answer = $answer;
					$a->poll_id = $model->id;
					$a->save();
				}

				$model->getRelated('answers', True);
			}
		}

		$this->render('create', array('model' => $model));
	}

	public function actionView() {
		$model = Poll::model()->findByPk($_GET['id']);

		if($_POST && !$model->myVote && !Yii::app()->user->isGuest && $_POST['answer']) {
			$vote = New Vote;
			$vote->poll_id = $model->id;
			$vote->member_id = Yii::app()->user->id;
			$vote->answer_id = $_POST['answer'];
			$vote->save();
		}

		$this->render('view', array('model' => $model));
	}

	public function actionIndex() {
		$this->render('index');
	}

	public function actionDelete() {
		$this->restrict();

		$page = Poll::model()->findByPK($_GET['id']);
		if($page)
			$page->delete();
	}
}
