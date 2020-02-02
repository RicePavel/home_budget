<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Добавить статью дохода';

$form = ActiveForm::begin([
    'id' => 'add_item_form'
])

?>

<h2>Добавить статью дохода</h2>

<?= $form->field($model, 'name')->label('Название') ?>

<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>