<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 28/11/2018
 * Time: 05:19 PM
 */
namespace frontend\controllers\service;


use common\models\model\Response;
use yii\rest\Controller;

class ServiceController extends Controller
{
    public function actionHungNl(){
        $data['post'] = \Yii::$app->request->post();
        $data['get'] = \Yii::$app->request->get();

        \Yii::info($data['post'] , 'post');
        \Yii::info($data['get'] , 'get');
        return $this->response(true,"Success ".date('Y-m-d H:i:s'),$data);
    }

    public function response($success = false, $message = null, $data = null)
    {
        \Yii::$app->response->format = 'json';
        is_null($message) ? $this->message : $message;
        return Response::json($success, $message, $data);
    }
}