<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdOrder') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'Customers_IdCustomer') ?>

    <?= $form->field($model, 'Users_IdUser') ?>

    <?= $form->field($model, 'Literature_IdLiterature') ?>

    <?php // echo $form->field($model, 'Count') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
