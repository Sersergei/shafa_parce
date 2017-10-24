<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tovar".
 *
 * @property string $URL
 * @property string $Name
 * @property string $Description
 * @property string $Price
 * @property string $Img
 */
class Tovar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tovar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['URL', 'Name', 'Description', 'Price', 'Img','Color'], 'required'],
            [['URL', 'Description', 'Img'], 'string'],
            [['Name'], 'string', 'max' => 100],
            [['Price'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'URL' => 'Url',
            'Name' => 'Name',
            'Description' => 'Description',
            'Price' => 'Price',
            'Img' => 'Img',
            'Color'=>'Color',

        ];
    }
}
