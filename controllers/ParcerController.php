<?php
/**
 * Created by PhpStorm.
 * User: Ohonko
 * Date: 25.09.2017
 * Time: 17:56
 */

namespace app\controllers;

use app\models\EntryForm;
use app\models\Tovar;
use Yii;
use GuzzleHttp\Client;
use yii\helpers\Url;
use yii\web\Controller;

class ParcerController extends Controller
{
public function actionParce(){
    $model=new EntryForm();
    if($model->load(Yii::$app->request->post())&& $model->validate()){
        $client=new Client();
        $res=$client->request('GET',$model->url);
        $body=$res->getBody();
        $document =\phpQuery::newDocumentHTML($body);
        $title=$document->find(".b-product__title");
        $tovar=new Tovar();
        $tovar->URL=$model->url;
        $properties=$document->find(".b-product-properties__row");
        $tovar->Description=$document->find(".b-product__description-text p")->html();
        $tovar->Img=$document->find(".js-gallery-magnific-item");
        $tovar->Name=$document->find(".b-product__title")->html();

        foreach ($properties as $property){
            $tovar_property_title=trim(pq($property)->find(".b-product-properties__title")->html());
            $tovar_property_value=trim(pq($property)->find(".b-product-properties__value")->html());
            $tovar_property[$tovar_property_title]=$tovar_property_value;
        }
        $tovar->Color=$tovar_property['Цвет'];
        $tovar->Size=$tovar_property['Размер'];
       // $tovar->=$tovar_property['Состав'];



        //$tovar->Color=$document->find(".b-product-properties__value:first")->html();
        //$tovar->Size=$document->find(".b-product-properties__value:second")->html();
        $tovar->Price=$document->find(".b-product-price__value:first")->html();


        // return $this->render('parce',['body'=>$body]);
        return $this->render('parce', [
            'model' => $tovar,
        ]);

    }

    else{
        return $this->render('url',['model'=>$model]);
    }


}

}