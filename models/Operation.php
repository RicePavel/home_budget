<?php

namespace app\models;

use yii\db\ActiveRecord;

class Operation extends ActiveRecord {
    
    public function rules() {
        return [
            [['item_id', 'amount'], 'safe']
        ];
    }
    
    public function getItem() {
        return $this->hasOne(Item::className(), ['item_id' => 'item_id']);
    }
    
    public static function tableName() {
        return '{{operation}}';
    }
    
    public function saveOperation() : bool {
        $item = Item::findOne($this->item_id);
        if ($item) {
            if ($item->type == Item::EXPENSE_TYPE) {
                $this->amount = - abs($this->amount);
            } else {
                $this->amount = abs($this->amount);
            }
            return $this->save();
        } else {
            $this->addError('item_id', 'Передайте корректное значение');
            return false;
        }
    }
    
}

