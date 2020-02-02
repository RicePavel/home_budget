<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Item;

$header = '';

switch ($type) {
    case Item::INCOME_TYPE:
        $header = 'Добавить статью дохода';
        break;
    case Item::EXPENSE_TYPE:
        $header = 'Добавить статью расхода';
        break;
}

$this->title = $header;

$form = ActiveForm::begin([
    'id' => 'add_item_form'
])

?>

<h2><?= $header ?></h2>

<?= $form->field($model, 'name')->label('Название') ?>

<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>