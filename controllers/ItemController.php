<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Item;

class ItemController extends Controller
{
    
    public function actionAdd_income_item() {
        $model = new Item();
        $saved = false;
        if ($model->load(Yii::$app->request->post())) {
            $saved = Item::saveIncomeItem($model);
            if ($saved) {
                return $this->redirect(['item/income_items']);
            }
        }
        return $this->render('add_item', ['model' => $model]);
    }
    
    public function actionAdd_expense_item() {
        $model = new Item();
        $saved = false;
        if ($model->load(Yii::$app->request->post())) {
            $saved = Item::saveExpenseItem($model);
            if ($saved) {
                return $this->redirect(['item/expense_items']);
            }
        }
        return $this->render('add_item_1', ['model' => $model, 'type' => Item::EXPENSE_TYPE]);
    }
    
    public function actionIncome_items() {
        $items = Item::find()->where(['type' => Item::INCOME_TYPE])->all();
        return $this->render('income_items', ['items' => $items]);
    }
    
    public function actionExpense_items() {
        $items = Item::find()->where(['type' => Item::EXPENSE_TYPE])->all();
        return $this->render('items_list', ['items' => $items, 'type' => Item::EXPENSE_TYPE]);
    }
    
    public function actionDelete() {
        $request = Yii::$app->request;
        $item_id = $request->post('item_id');
        $type = $request->post('type');
        if ($item_id) {
            $model = Item::findOne($item_id);
            if ($model) {
                $model->delete();
            }
        }
        if ($type == Item::EXPENSE_TYPE) {
            return $this->redirect(['item/expense_items']);
        }
        return $this->redirect(['item/income_items']);
    }
    
}
