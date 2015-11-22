<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')
        ->textInput(['maxlength' => true])
        ->label('Имя');
    ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
        'options' => ['class' => $inputClasses],
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
        ],
    ])->label('Дата'); ?>

    <?= $form->field($model, 'author_id')
        ->dropDownList(ArrayHelper::map($authors, 'id', 'fullname'))
        ->label('Автор');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
