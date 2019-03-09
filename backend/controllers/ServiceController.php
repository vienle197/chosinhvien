<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 09/03/2019
 * Time: 23:39
 */

namespace backend\controllers;

use common\models\model\Response;
use yii\rest\Controller;

class ServiceController extends Controller
{
    public $user;
    public function actionHungNl(){
        $data['post'] = \Yii::$app->request->post();
        $data['get'] = \Yii::$app->request->get();

        \Yii::info($data['post'] , 'post');
        \Yii::info($data['get'] , 'get');
        return $this->response(true,"Success ".date('Y-m-d H:i:s'),$data);
    }
    public function beforeAction($action)
    {
        @date_default_timezone_set("Asia/Ho_Chi_Minh");
        $befor = parent::beforeAction($action);
        $this->user = \Yii::$app->user->getIdentity();
        if(!$this->user){
            return $this->response(false,"Vui lòng đăng nhập để thực hiện chức năng này!");
        }
        return $befor; // TODO: Change the autogenerated stub
    }

    public function response($success = false, $message = null, $data = null)
    {
        \Yii::$app->response->format = 'json';
        is_null($message) ? $this->message : $message;
        return Response::json($success, $message, $data);
    }
}