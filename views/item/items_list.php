<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Item;

$header = '';
$addingLabel = '';
$addingUrl = '';

switch ($type) {
    case Item::INCOME_TYPE: 
        $header = 'Статьи дохода';
        $addingLabel = 'Добавить статью дохода';
        $addingUrl = 'item/add_income_item';
        break;
    case Item::EXPENSE_TYPE:
        $header = 'Статьи расхода';
        $addingLabel = 'Добавить статью расхода';
        $addingUrl = 'item/add_expense_item';
        break;
}

$this->title = $header;

?>

<h2><?= $header ?></h2>

<?= Html::a($addingLabel, [$addingUrl], ['class' => 'btn btn-primary']) ?>
<br/>
<div></div>
<br/>

<table class="table">
    <?php foreach ($items as $item) { ?>
    <tr>
        <td><?= $item->name ?></td>
        <td>
            <?php $form = ActiveForm::begin(['action' => ['item/delete']]); ?>
            <input type="hidden" name="item_id" value="<?= $item->item_id ?>" />
            <input src="img/delete_3.png" type="image" name="submit" onclick="return confirm('подтвердите удаление')" />
            <?php ActiveForm::end() ?>
        </td>
    </tr>
    <?php } ?>
</table>


