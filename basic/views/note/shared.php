<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                    
            'text:ntext',
            
            [
                'header' => 'User',
                'value' => function ($model) {
                    return $model->getAccesses()->one()->user->name;
                }
                
            ],
            
            'created_at:datetime',

            ['header' => 'Unshare',
             'class' => 'yii\grid\ActionColumn',
             'template' => '{unshare}',
             'buttons' => [
                 'unshare' => function ($url, $model){
                     return Html::a(yii\bootstrap\Html::icon('remove'), 
                         ['/access/delete', 'id'=> $model->getAccesses()->one()->id],
                         ['data' => [
                             'confirm' => 'Вы уверены что хотите удалить доступ для этого пользователя',
                             'method' => 'post',
                         ],]);
                 }
                 
             ]
                
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
