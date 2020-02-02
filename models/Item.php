<?php

namespace app\models;

use yii\db\ActiveRecord;

class Item extends ActiveRecord {
    
    const INCOME_TYPE = 1;
    const EXPENSE_TYPE = 0;
    
    public function rules() {
        return [
            [['name'], 'safe']
        ];
    }
    
    public static function tableName() {
        return '{{item}}';
    }
            
    public static function saveIncomeItem(Item $model) : bool {
        $model->type = self::INCOME_TYPE;
        return $model->save();
    }
    
    public static function saveExpenseItem(Item $model) {
        $model->type = self::EXPENSE_TYPE;
        return $model->save();
    }
    
}