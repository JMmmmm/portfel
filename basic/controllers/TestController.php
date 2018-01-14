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
use app\models\Note;


class TestController extends Controller
{
    
    public function actionIndex()
    {
       $var = \Yii::$app->test->run();
       return $this->renderContent($var);  
    }

    public function actionInsert() {
        Yii::$app->db->createCommand()->batchInsert('user', ['username', 'name', 'surname', 
            'password_hash', 'access_token', 'auth_key', 'created_at', 'updated_at'], [
            ['Colred', 'Дмитрий', 'Астаханов', 'toktok123', '12345ght', 'tuktuk321', 020302017, 03032017],
            ['Sis', 'Андрей', 'Лисов', 'toktok123', '54321thg', 'rto12', 040502017, 05052017],
            ['Ded', 'Федор', 'Хитров', 'toktok123', '3247gh', '47gh', 050502017, 06052017],
        ])->execute();
        
        Yii::$app->db->createCommand()->batchInsert('note', ['text', 'creator_id', 'created_at'], [
            ['ываллывывмывьмлывьмлыьвлмьылвмь', 2, 06052017],
            ['dsdsdsdsdssdsds', 3, 06052017],
            ['wrowkprqwifjqi', 1, 03032017],
        ])->execute();
    }
    
    public function actionSelect() {
        $id = 1;
//        $data = (new \yii\db\Query())->from('user')->where('id=:id', [':id' => $id])->all();
//        $data = (new \yii\db\Query())->from('user')->where('id>:id', [':id' => $id])->orderBy(['name' => SORT_DESC])->all();
//        $data = (new \yii\db\Query())->from('user')->count('*');
        
        $data = (new \yii\db\Query())->from('note')->innerJoin('user', 'user.id = note.creator_id')->all();
        
        return $this->renderContent(_end($data));
        
    }
    
    public function actionTest2() {
        $model = User::findOne(4);
        $model -> surname = 'Геннов';
        $model -> save();
        
        $modelNote = new Note();
        $modelNote -> text = 'sdfsdfsdfsd';
        $modelNote -> creator_id = 4;
        $modelNote -> save();
    }
    
    
}
?>