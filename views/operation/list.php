<?php

use yii\helpers\Html;
use app\models\Item;

$this->title = "Операции";

?>

<h2>Операции</h2>

<?= Html::a('Добавить доход', ['operation/add', 'type' => Item::INCOME_TYPE], ['class' => 'btn btn-primary']) ?> &nbsp; &nbsp;
<?= Html::a('Добавить расход', ['operation/add', 'type' => Item::EXPENSE_TYPE], ['class' => 'btn btn-primary']) ?>
<br/>
<div></div>
<br/>

<table class="table">
    <tr>
        <td><b>Итого</b></td>
        <td><?= $sumAmount ?></td>
        <td></td>
    </tr>
    <?php foreach ($operations as $operation) { ?>
    <tr>
        <td><?= $operation->item->name ?></td>
        <td><?= $operation->amount ?></td>
        <td><?= DateTime::createFromFormat("Y-m-d H:i:s", $operation->insert_date)->format('d.m.Y H:i') ?></td>
    </tr>
    <?php } ?>
</table>