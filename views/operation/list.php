<?php

use yii\helpers\Html;
use app\models\Item;

$this->title = "Операции";

?>

<h2>Операции</h2>

<?= Html::a('Добавить доход', ['operation/add', 'type' => Item::INCOME_TYPE], ['class' => 'btn btn-primary']) ?> &nbsp; &nbsp;
<?= Html::a('Добавить расход', ['operation/add', 'type' => Item::EXPENSE_TYPE], ['class' => 'btn btn-primary']) ?>