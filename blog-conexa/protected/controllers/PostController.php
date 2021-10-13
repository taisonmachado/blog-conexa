<?php

class PostController extends GxController {

	
	public function actionView($id) {
		$post = $this->loadModel($id, 'Post');
		$comentario = $this->novoComentario($post);

		$this->render('view', array(
			'model' => $post,
			'comentario' => $comentario
		));
	}

	public function actionCreate() {
		$model = new Post;


		if (isset($_POST['Post']) && !Yii::app()->user->isGuest) {
			// $model->setAttributes($_POST['Post']);
			$post = $_POST['Post'];
			$model->titulo = $post['titulo'];
			$model->texto = $post['texto'];
			$model->categoria_id = $post['categoria_id'];
			$model->usuario_id = Yii::app()->user->getId();
			$model->data = new CDbExpression('NOW()');
			$model->cadastrado=new CDbExpression('NOW()');
			$model->atualizado=new CDbExpression('NOW()');

			/* print_r($model);
			die; */
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->post_id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Post');


		if (isset($_POST['Post'])) {
			$model->setAttributes($_POST['Post']);
			$model->atualizado=new CDbExpression('NOW()');

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->post_id));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id) {
		$post = $this->loadModel($id, 'Post');
		// if (Yii::app()->getRequest()->getIsPostRequest()) {
		if (!Yii::app()->user->isGuest && Yii::app()->user->id == $post->usuario_id) {
			$this->loadModel($id, 'Post')->delete();

			$this->redirect('index');
		} else
			throw new CHttpException(400, Yii::t('app', 'Permissão Negada.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Post');
		$this->render('index', array(
			'titulo' => 'Posts',
			'dataProvider' => $dataProvider,
		));
	}

	public function actionCategoria($id)
	{
		$posts = new CActiveDataProvider('Post', array(
			'criteria' => array(
				'condition' => "categoria_id={$id}",
				'order' => 'data DESC',
				// 'with' => 'categoria',
			),
			'pagination' => array(
				'pageSize' => 10
			)
		));

		$categoria = Categoria::model()->find('categoria_id=:categoria_id', array(':categoria_id' => $id));
		// $posts = Post::model()->find('categoria_id=:categoria_id', array(':categoria_id' => $id));
		$this->render('index', array(
			'titulo' => "Posts - $categoria->nome",
			'dataProvider' => $posts,
			'categoria' => $categoria,
		));
	}

	public function actionSearch()
	{
		if(!isset($_REQUEST['q']))
			$this->redirect(array('index'));
		
		$search = $_REQUEST['q'];

		// $search=$_GET['q'];
		// escape % and _ characters
		// $search=strtr($search, array('%'=>'\%', '_'=>'\_'));
		// where(array('like', 'title', '%'.$search.'%'));

		
		$criteria = new CDbCriteria();
		$criteria->alias = 'p';
		$criteria->join = 'LEFT JOIN categoria AS c ON c.categoria_id=p.categoria_id';
		$criteria->addSearchCondition('p.titulo', $search, true, 'OR');
		$criteria->addSearchCondition('p.texto', $search, true, 'OR');
		$criteria->addSearchCondition('c.nome', $search, true, 'OR');
		$posts = Post::model()->find($criteria);
		/* print_r($posts);
		die; */
		
		$posts = new CActiveDataProvider('Post', array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => 10
			)
		));

		$this->render('index', array(
			'titulo' => 'Posts',
			'dataProvider' => $posts,
			'search' => $search,
		));
	}

	public function actionMeusPosts()
	{
		if(Yii::app()->user->isGuest)
			$this->redirect(array('index'));

		$usuario_id = Yii::app()->user->id;

		$posts = new CActiveDataProvider('Post', array(
			'criteria' => array(
				'condition' => "usuario_id={$usuario_id}"
			),
			'pagination' => array(
				'pageSize' => 10
			),
		));

		$this->render('index', array(
			'titulo' => 'Meus Posts',
			'dataProvider' => $posts,
		));
	}

	public function filters()
    {
        return array(
            'accessControl',
        );
    }

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('index','view', 'categoria', 'search'),
					'users'=>array('*'),
					),
				array('allow', 
					'users'=>array('@'),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}

	protected function novoComentario($post) {
		setlocale(LC_ALL, 'pt_BR.utf8');
		$comentario = new Comentario;
		if(isset($_POST['Comentario']) && !Yii::app()->user->isGuest){
			$comentario->texto=$_POST['Comentario']['texto'];
			$comentario->post_id = $post->post_id;
			$comentario->usuario_id = Yii::app()->user->id;
			$comentario->data = new CDbExpression('NOW()');
			$comentario->cadastrado=new CDbExpression('NOW()');
			$comentario->atualizado=new CDbExpression('NOW()');
			$comentario->save();
			$this->refresh();
		}
		return $comentario;
	}

}