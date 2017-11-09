<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Size".
 *
 * @property integer $id_size
 * @property string $Name_suze
 * @property integer $id_Category
 *
 * @property Category $idCategory
 * @property Sklad[] $sklads
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Size';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name_suze', 'id_Category'], 'required'],
            [['Name_suze'], 'string'],
            [['id_Category'], 'integer'],
            [['id_Category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_Category' => 'id_Category']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_size' => 'Id Size',
            'Name_suze' => 'Name Suze',
            'id_Category' => 'Id  Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(Category::className(), ['id_Category' => 'id_Category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSklads()
    {
        return $this->hasMany(Sklad::className(), ['id_Size' => 'id_size']);
    }
}
