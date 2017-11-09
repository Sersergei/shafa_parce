<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "Sklad".
 *
 * @property integer $id_Sklad
 * @property integer $id_Size
 * @property integer $id_Color
 * @property integer $count
 * @property integer $id_Tovar
 *
 * @property Size $idSize
 * @property Color $idColor
 * @property Tovar $idTovar
 */
class Sklad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Sklad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Size', 'id_Color', 'count',], 'required'],
            [['id_Size', 'id_Color', 'count', 'id_Tovar'], 'integer'],
            [['id_Size'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['id_Size' => 'id_size']],
            [['id_Color'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['id_Color' => 'id_Color']],
          //  [['id_Tovar'], 'exist', 'skipOnError' => true, 'targetClass' => Tovar::className(), 'targetAttribute' => ['id_Tovar' => 'id'],'on'=>'register'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Sklad' => 'Id  Sklad',
            'id_Size' => 'Id  Size',
            'id_Color' => 'Id  Color',
            'count' => 'Count',
            'id_Tovar' => 'Id  Tovar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSize()
    {
        return $this->hasOne(Size::className(), ['id_size' => 'id_Size']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdColor()
    {
        return $this->hasOne(Color::className(), ['id_Color' => 'id_Color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTovar()
    {
        return $this->hasOne(Tovar::className(), ['id' => 'id_Tovar']);
    }
}
