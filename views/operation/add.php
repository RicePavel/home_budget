<?php

use yii\helpers\Html;
use app\models\Item;
use yii\widgets\ActiveForm;

$this->title = 'Добавить операцию';

$form = ActiveForm::begin()

?>

<?= $form->field($operationModel, 'item_id')->dropDownList($items)->label('Статья') ?>

<?= $form->field($operationModel, 'amount')->label('Сумма') ?>

<?= Html::submitButton('Добавить') ?>

<?php ActiveForm::end() ?>
