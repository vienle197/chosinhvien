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
    const SLIDER = "SLIDER";
    const BANNER = "BANNER";
    const BANNER_3 = "BANNER_3";
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public function rules()
    {
        return array_merge([
            [['imageFile'], 'file'],
        ], parent::rules());
    }

    public function upload()
    {
        if ($this->imageFile) {
            $path = \Yii::getAlias('@frontend/public');
            $filePath = 'uploads/' . implode('/', str_split(TextUtility::randChar(10))) . '/';
            $fileDirPath = $path . '/' . $filePath;
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