<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 07/03/2019
 * Time: 23:39
 */

namespace backend\models;


use common\components\TextUtility;
use yii\web\UploadedFile;

class Image extends \common\models\db\Image
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
            $fileDirPath = 'uploads/' . implode('/', str_split(TextUtility::randChar(10))) . '/';
            if (!file_exists($fileDirPath)) {
                mkdir($fileDirPath, 0777, true);
            }
            $this->imageFile->saveAs($fileDirPath . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return $fileDirPath  . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }
}