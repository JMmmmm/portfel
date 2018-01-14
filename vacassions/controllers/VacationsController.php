<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\SignupForm;
use app\models\Vacations;
use app\models\Access;

class VacationsController extends \yii\web\Controller
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
        return $this->render('index');
    }
    
    public function actionProduction()
    {
        $model = Vacations::findAll(['category_id' => 1]);
        $titleForBread = 'Производство';
        
        return $this->render('index', ['model' => $model, 'titleForBread' => $titleForBread]);
    }
    
    public function actionSelling()
    {
        $model = Vacations::findAll(['category_id' => 2]);
        $titleForBread = 'Торговля и продажи';
        
        return $this->render('index', ['model' => $model, 'titleForBread' => $titleForBread]);
    }
    
    public function actionTransport()
    {
        $model = Vacations::findAll(['category_id' => 3]);
        $titleForBread = 'Транспорт и автосервис';
        
        return $this->render('index', ['model' => $model, 'titleForBread' => $titleForBread]);
    }
    
    public function actionUnderindex($id) {
        
        //$id = $request->get('id');
        $model = Vacations::findOne($id);
        
        if (Yii::$app->user->isGuest) {
            $accessModel = 10;
        } 
        else {
        $userNum = Yii::$app->user->id;
        $accessModel = Access::find()
        ->where(['user_id' => $userNum, 'vacations_id' => $id])
        ->count();
        }
        return $this->render('underIndex', ['model' => $model, 'accessModel' => $accessModel]);
    }
    
    public function actionBuy($id) {
        
        //$id = $request->get('id');
        $model = Vacations::findOne($id);
        $userNum = Yii::$app->user->id;
        $userModel = User::findOne($userNum);
        $userModel->link(User::RELATION_ACCESSED_VACATIONS, $model);
        
        return $this->render('buy', ['model' => $model]);
    }
}
