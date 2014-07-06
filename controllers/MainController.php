<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;


class MainController extends Controller{
    protected $_app;
    protected $_request;
    protected $_user;
     /**
     * This is the action to handle external exceptions.
     */
    public function beforeAction($action){
        $this->_app = Yii::$app;
        $this->_request = $this->_app->request;
        $this->_user = $this->_app->user;
        return parent::beforeAction($action);
    }
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['message' => $exception->getMessage(),'name'=>$exception->getName()]);
        }
    }
}
