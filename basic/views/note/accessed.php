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

    <p>
        <?= Html::a('Create Note', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'text:ntext',
            
            [
                //'filter' => Html::activeDropDownList($searchModel, 'creator_id', $users, ['class' => 'form-control'])
                'filter' => $users,
                'attribute' => 'creator_id',
                'value' => function($model) {
                    return $model->creator->name;
                }
                
            ],
            
            [
                'attribute' => 'created_at',
                'filter' => false,
                'format' => 'datetime',
                
            ],

            
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
