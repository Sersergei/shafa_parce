<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Color".
 *
 * @property integer $id_Color
 * @property string $Name_Color
 *
 * @property Sklad[] $sklads
 */
class Color extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name_Color'], 'required'],
            [['Name_Color'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Color' => 'Id  Color',
            'Name_Color' => 'Name  Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSklads()
    {
        return $this->hasMany(Sklad::className(), ['id_Color' => 'id_Color']);
    }
}
