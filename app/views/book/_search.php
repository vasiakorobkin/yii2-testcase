<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search clearfix mb50">

    <?php 
    $inputClasses = 'form-control wauto iblock ml10';
    $dateRangeTpl = '{input}<br>{error}';
    $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'fieldConfig' => [
            'options' => ['class' => 'iblock mr30 mb10'],
            'template' => '{label} {input}<br>{error}',
            'inputOptions' => [
                'class' => $inputClasses,
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'id')
        ->dropDownList(ArrayHelper::map($authors, 'id', 'fullname'), ['prompt' => '<Автор>'])
        ->label('Автор');
    ?>

    <?= $form->field($model, 'name')
        ->label('Название');
    ?>

    <?= Html::submitButton('Искать', ['class' => 'btn btn-primary pull-right']) ?>

    <?php ActiveForm::end(); ?>

</div>
