<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 07/03/2019
 * Time: 22:39
 */

namespace backend\models;


use common\components\TextUtility;
use yii\web\UploadedFile;

class Product extends \common\models\db\Product
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public function rules()
    {
        return array_merge([
            [['category_id', 'manufacturer_id', 'merchant_id'], 'required'],
            [['imageFile'], 'file'],
        ], parent::rules());
    }

    public function upload()
    {
        if ($this->imageFile) {
            $path = \Yii::getAlias('@frontend/public');
            $filePath = '/uploads/' . implode('/', str_split(TextUtility::randChar(10))) . '/';
            $fileDirPath = $path  . $filePath;
            if (!file_exists($fileDirPath)) {
                mkdir($fileDirPath, 0777, true);
            }
            $this->imageFile->saveAs($fileDirPath . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return $filePath  . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }
}