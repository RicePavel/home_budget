<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Статьи дохода';

?>

<h2>Статьи дохода</h2>

<?= Html::a('Добавить статью дохода', ['item/add_income_item'], ['class' => 'btn btn-primary']) ?>
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


