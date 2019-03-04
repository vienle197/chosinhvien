<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 04/03/2019
 * Time: 22:43
 */
use common\components\LanguageHelpers;
/**
 * @var \common\models\db\Product[] $products
 */

$keyword =Yii::$app->request->get('keyword','');
$cate_id =Yii::$app->request->get('category_id','');

?>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row row-eq-height">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h4 class="title">
                        <?= LanguageHelpers::loadLanguage("res-search","Kết quả tìm kiếm cho: ") ?>
                        <i>
                        <?= $keyword ? LanguageHelpers::loadLanguage("keyword","Từ khóa: ") : '' ?><?= $keyword ? $keyword." ." : '' ?>
                        <?= $cate_id ? LanguageHelpers::loadLanguage("category","Danh mục: ") : '' ?><?= $cate_id ? $cate_id." ." : '' ?>
                        </i>
                    </h4>
                </div>
            </div>
            <!-- section title -->
            <?php foreach ($products as $product){ ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <?= \frontend\views\widgets\ProductSingle::widget(['product' => $product,'countDown' => false]) ?>
                </div>
            <?php } ?>
        </div>
        <div>
            <?php
                $url = '/search.html';
                if($keyword){
                    $url .= $cate_id ? '?keyword='.$keyword.'&category_id='.$cate_id : '?keyword='.$keyword;
                }else{
                    $url .= $cate_id ? '?category_id='.$cate_id : "";
                }
                $page = Yii::$app->request->get("page",1);
                for($ind = 1;$ind<= ceil($total/20);$ind++){
                    $url_tmp = strpos($url,'?') ? $url."&page=".$ind : $url."?page=".$ind;
                    if($page == $ind)
                        echo "<a class='main-btn icon-btn ' href='".$url_tmp."'>".$ind."</a>";
                    else
                        echo "<a class='main-btn icon-btn primary-btn' href='".$url_tmp."'>".$ind."</a>";
                }
            ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
