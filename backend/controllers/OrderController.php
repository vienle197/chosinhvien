<?php

namespace backend\controllers;

use common\models\db\OrderItem;
use Yii;
use common\models\db\Order;
use backend\models\OrderSearch;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $page = Yii::$app->request->get("page",1);
        $limit = Yii::$app->request->get("limit",20);
        $keyword = Yii::$app->request->get("keyword",false);
        $type_search = Yii::$app->request->get("type_search",false);
        $time_start = Yii::$app->request->get("time_start",false);
        $time_end = Yii::$app->request->get("time_start",false);
        $status = Yii::$app->request->get("status",false);


        $search = Order::find()->where(['active' => 1]);
        if($keyword){
            if($type_search){
                if($type_search == 'buyer_name'){
                    $condition = ['or'];
                    $keywordArr = explode(' ',$keyword);
                    foreach ($keywordArr as $val){
                        $condition[] = ['like','first_name',$val];
                        $condition[] = ['like','last_name',$val];
                    }
                    $search->andWhere($condition);
                }else{
                    $search->andWhere(['like',$type_search,$keyword]);
                }
            }else{
                $search->andWhere(['or',
                    ['like' , 'customer_id' , $keyword],
                    ['like' , 'first_name' , $keyword],
                    ['like' , 'last_name' , $keyword],
                    ['like' , 'phone' , $keyword],
                    ['like' , 'email' , $keyword],
                    ['like' , 'address' , $keyword],
                ]);
            }
        }
        if($time_start){
            $search->andWhere(['>','created_at',strtotime(str_replace("T"," ",$time_start))]);
        }
        if($time_end){
            $search->andWhere(['>','created_at',strtotime(str_replace("T"," ",$time_end))]);
        }
        if($status){
            $search->andWhere(['status'=>$status]);
        }
        $search->with(['city','district','ward',
            'orderItems' => function($q){
                /** @var ActiveQuery $q*/
                $q->with([
                    'product' => function($qr){
                        /** @var ActiveQuery $qr*/
                        $qr->with(['merchant','manufacturer']);
                    }
                ]);
            }
        ]);
        $search = $search->limit($limit)->offset($page-1 * $limit)->all();
        return $this->render('index', [
            'data' => $search
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
