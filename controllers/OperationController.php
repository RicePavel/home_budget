<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\models\Item;
use app\models\Operation;

class OperationController extends Controller {
    
    public function actionList() {
        $operations = Operation::find()->with('item')->all();
        $sumAmount = Operation::find()->sum('amount');
        return $this->render('list', ['operations' => $operations, 'sumAmount' => $sumAmount]);
    }
    
    public function actionAdd($type) {
        $items = Item::find()->where(['type' => $type])->all();
        $itemsArray = [];
        foreach ($items as $item) {
            $itemsArray[$item->item_id] = $item->name;
        }
        $operationModel = new Operation();
        if ($operationModel->load(Yii::$app->request->post())) {
            $ok = $operationModel->saveOperation();
            if ($ok) {
                return $this->redirect(['operation/list']);
            }
        }
        return $this->render('add', ['items' => $itemsArray, 'operationModel' => $operationModel]);
    }
    
    public function actionDelete() {
        
    }
    
}

