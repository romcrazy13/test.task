<?php

include_once 'AjaxController.php';

class LetterController extends Controller
{
    public $list;

    /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','send'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Letter;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Letter']))
		{
			$model->attributes=$_POST['Letter'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idLetter));
		}

		$this->list = $this->getList();

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Letter']))
		{
			$model->attributes=$_POST['Letter'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idLetter));
		}

        $this->list = $this->getList();

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Letter');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Letter('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Letter']))
			$model->attributes=$_GET['Letter'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Letter the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Letter::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Letter $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='letter-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function getList()
    {
        $api_key = Yii::app()->params['APIkey'];

        // Создаём POST-запрос
        $POST = array (
            'api_key' => $api_key,
        );

        // Устанавливаем соединение
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $POST);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_URL, 'https://api.unisender.com/ru/api/getLists?format=json');
        $result = curl_exec($ch);

        if ($result) {
            // Раскодируем ответ API-сервера
            $jsonObj = json_decode($result);

            if(null===$jsonObj) {
                // Ошибка в полученном ответе
                echo "Invalid JSON";

            }
            elseif(!empty($jsonObj->error)) {
                // Ошибка получения перечня список
                echo "An error occured: " . $jsonObj->error . "(code: " . $jsonObj->code . ")";

            } else {
                // Выводим коды и названия всех имеющихся списков
                return $jsonObj->result;
            }
        } else {
            // Ошибка соединения с API-сервером
            echo "API access error";
        }
    }

    public function actionSend($id){

	    $data = $this->loadModel($id);
        $_SESSION['model'] = array(
            'email' => $data->email,
            'senderName' => $data->senderName,
            'senderEmail' => $data->senderEmail,
            'subject' => $data->subject,
            'body' => $data->body,
            'listId' => $data->listId,
        );

        $result = AjaxController::sendLetter();
        echo "<script>alert('" . $result . "')</script>";
// TODO Дописать добавление записей отчета об отправке
//        $this->actionUpdate($id);

        $this->actionView($id);
    }

}
