<?php
/* @var $this yii\web\Views */

use yii\helpers\Html;

$this->title = 'Вакансии: ' . $titleForBread;
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?> </h1>

<div class="row">
	<?php 
	   foreach ($model as $value) {
	       echo Html::beginTag('div', ['class' => 'col-lg-3']);
	           echo Html::tag('p', Html::encode($value -> name), ['class' => 'lead']);
	           echo Html::tag('small', Html::encode($value -> town), ['class' => 'pull-right']);
	           echo Html::tag('p', Html::encode($value -> company), ['class' => 'muted']);
	           
	           echo Html::tag('p', 'Объявление создано ' . Html::encode($value -> created_at), ['class' => 'text-info']);
	           echo Html::tag('p', 'Последнее изменение ' . Html::encode($value -> updated_at), ['class' => 'text-info']);
	           
	           echo Html::a('Подробнее ... ', ['/vacations/underindex', 'id' => $value->id ], ['class'=>'btn btn-primary']);
	           
	       echo Html::endTag('div');
	   }
	 
	?>

</div>
