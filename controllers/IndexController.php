<?php
/**
 * Created by PhpStorm.
 * User: russo
 * Date: 7/6/14
 * Time: 6:00 PM
 */

namespace app\controllers;

use Yii;
use app\models\LoginForm;
use yii\bootstrap\ActiveForm;
use app\models\Cabinet;

class IndexController extends MainController{

    public function actionIndex(){
       $this->view->title = $this->_app->params['title'];
       return $this->render("index");
    }
    /**/
    public function actionAbout(){
        return $this->render("about");
    }
    /**/
    public function actionContact(){
        return $this->render("contact");
    }
    /**/
    public function actionArticles(){
        return $this->render("articles");
    }
    /**/
    public function actionSitemap(){
        return $this->render("sitemap");
    }

    public function actionPersonalCabinet(){
        $model = new LoginForm();

        if($this->_request->isPost){
            if ($model->load($this->_request->post()) && $model->login()) {
                return $this->render("p_cabinet",['identy'=>$this->_user->identity,
                                                  'cabinet'=>Cabinet::getUserCabinet($this->_user->identity->id)
                ]);
            }
        }elseif(!$this->_user->isGuest){
            return $this->render("p_cabinet",['identy'=>$this->_user->identity,
                                              'cabinet'=>Cabinet::getUserCabinet($this->_user->identity->id)
            ]);
        }
        return $this->render("p_cabinet_login",['model'=>$model]);
    }
    public function actionLogout(){
        if(!$this->_user->isGuest)
            $this->_user->logout();
        $this->redirect("/");
    }


}