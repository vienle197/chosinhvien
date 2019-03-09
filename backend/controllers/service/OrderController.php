<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 09/03/2019
 * Time: 23:36
 */
namespace backend\controllers\service;

use common\models\db\Order;
use Yii;

class OrderController extends \backend\controllers\ServiceController
{
    public function actionUpdateStatus(){
        $status = Yii::$app->request->post('status');
        $order_id = Yii::$app->request->post('order_id');
        if(!$status || !$order_id){
            return $this->response(false,"status and order id not null");
        }
        Order::updateAll(['status'=>$status,'updated_at' => time()],['id' => $order_id]);
        return $this->response(true,"Update success!");
    }
}