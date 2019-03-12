<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 04/03/2019
 * Time: 18:37
 */

namespace frontend\controllers\service;


use common\models\db\Address;
use common\models\db\Customer;

class AccountController extends ServiceController
{
    public function actionAddAddress(){
        $model = new Address();
        $model->setAttributes(\Yii::$app->request->post());
        $model->created_at = date('Y-m-d H:t:s');
        $model->updated_at = date('Y-m-d H:t:s');
        $model->status = 1;
        $model->customer_id = $this->user->id;
        if($model->validate()){
                if($model->is_default){
                    Address::updateAll(['is_default' => 0,'updated_at' => date('Y-m-d H:t:s')],['customer_id' => $this->user->id,'status' => 1]);
                }
            $model->save();
            return $this->response(true,"Thêm địa chỉ thành công!");
        }
        return $this->response(false,"Vui lòng nhập đúng tất cả các trường!");
    }

    public function actionUpdateAcc(){
        /** @var Customer $user */
        $user = \Yii::$app->user->getIdentity();
        if (!$user){
            return $this->response(false,'Vui lòng đăng nhập');
        }
        $model = Customer::findOne($user->id);
        if (!$model){
            return $this->response(false,'Vui lòng đăng nhập');
        }
        $model->setAttributes(\Yii::$app->request->post());
        $model->updated_at = date('Y-m-d H:t:s');
        if($model->validate()){
            $model->save();
            return $this->response(true,"Cập nhật thành công!");
        }
        return $this->response(false,"Vui lòng nhập đúng tất cả các trường!");
    }
    public function actionUpdatePass(){
        /** @var Customer $user */
        $user = \Yii::$app->user->getIdentity();
        if (!$user){
            return $this->response(false,'Vui lòng đăng nhập');
        }
        $model = Customer::findOne($user->id);
        if (!$model){
            return $this->response(false,'Vui lòng đăng nhập');
        }
        $pass = \Yii::$app->request->post('password');
        if (!$model){
            return $this->response(false,'Password rỗng');
        }
        $model->password_hash = \Yii::$app->security->generatePasswordHash($pass);
        $model->updated_at = date('Y-m-d H:t:s');
        if($model->validate()){
            $model->save();
            return $this->response(true,"Cập nhật thành công!");
        }
        return $this->response(false,"Vui lòng nhập đúng tất cả các trường!");
    }
}
