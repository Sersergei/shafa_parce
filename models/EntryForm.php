<?php
/**
 * Created by PhpStorm.
 * User: Ohonko
 * Date: 21.09.2017
 * Time: 18:04
 */
namespace app\models;

use yii\base\Model;

class EntryForm extends  Model
{
    public  $url;

    public function rules()
    {
        return [
            ['url','url','defaultScheme'=>'http'],
        ];
    }
}