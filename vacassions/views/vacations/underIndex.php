<?php
/* @var $this yii\web\Views */

use yii\helpers\Html;
use phpDocumentor\Reflection\Types\Null_;

$this->title = $model->name;
?>

<?php

    echo Html::tag('p', 'В компанию ' . Html::encode($model -> company), ['class' => 'lead']);
    echo Html::tag('p', 'Требуется ' .Html::encode($model -> name), ['class' => 'lead']);
    
    echo Html::tag('p', 'Полное описание ваканссии: <br> ' .Html::encode($model -> descript), ['class' => 'descript']);
    
    
    echo '<br>';
    
    echo Html::tag('p', 'Объявление создано ' . Html::encode($model -> created_at), ['class' => 'muted']);
    echo Html::tag('p', 'Последнее изменение ' . Html::encode($model -> updated_at), ['class' => 'muted']);
    echo Html::tag('small', Html::encode($model -> town), ['class' => 'muted']);
    
    echo '<br>';
    
    if ($accessModel == 0) {
        echo Html::tag('p', 'Номер телефона: <скрыто>' , ['class' => 'text-info']);
        echo Html::a('Купить номер телефона ', ['/vacations/buy', 'id' => $model->id], ['class'=>'btn btn-primary']);
    }
    elseif ($accessModel == 10) {
        echo Html::tag('p', 'Номер телефона: <скрыто>' , ['class' => 'text-info']);
        echo Html::tag('p', 'Чтобы посмотреть контакты соискателя, пожалуйста зарегистрируйтесь ', ['class'=>'muted']);
    }
    
    else {
        echo Html::tag('p', 'Номер телефона: ' . Html::encode($model -> phone), ['class' => 'muted']);
    }


?>