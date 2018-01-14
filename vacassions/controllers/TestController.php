<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Vacations;
use app\models\Access;
use app\models\Category;

class TestController extends Controller
{
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    
    public function actionIndex()
    {
       $var = \Yii::$app->test->run();
       return $this->renderContent($var);
        
        
    }

    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@кодер.укр';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
    
    public function actionIns() {
        
            /*
            $cat = new Category();
            $cat -> name = 'Производство';
            if ($cat->save()) {
                echo 'good';
            }
            $cat2 = new Category();
            $cat2 -> name = 'Торговля и продажи';
            if ($cat2->save()) {
                echo 'good';
            }
            $cat3 = new Category();
            $cat3 -> name = 'Транспорт и автосервис';
            if ($cat3->save()) {
                echo 'good';
            }
            */
                      
            
            
        
            $vac = new Vacations();
            $vac -> name = 'Автомеханик';
            $vac -> company = 'СТО-100';
            $vac -> town = 'Севастополь';
            $vac -> descript = 'пурум пурум пурум пурум пурум пурум пурум пурум пурум';
            $vac -> phone = '+ 7978 222 2222';
            $vac -> created_at = '02.10.2017';
            $vac -> updated_at = '02.10.2017';
 //           $vac -> access = '0';
            $vac -> category_id = '3';
            $vac -> img_address = 'Img Address';
            if ($vac->save()) {
                echo 'good';
            }
    }
    
    
    
}
