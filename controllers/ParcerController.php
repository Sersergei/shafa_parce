<?php
/**
 * Created by PhpStorm.
 * User: Ohonko
 * Date: 25.09.2017
 * Time: 17:56
 */

namespace app\controllers;

use app\models\EntryForm;
use app\models\Sklad;
use app\models\Tovar;
use Yii;
use GuzzleHttp\Client;
use yii\base\Model;
use yii\db\Exception;
use yii\helpers\Url;
use yii\web\Controller;

class ParcerController extends Controller
{
public function actionParce(){

    $model=new EntryForm();
    $model_tovar=new Tovar();
    $model_sklad=[new Sklad()];
    //проверяем передалась ли модель товар или УРЛ
    if($model->load(Yii::$app->request->post())  && $model->validate() or $model_tovar->load(Yii::$app->request->post())) {
        if (!$model_tovar->load(Yii::$app->request->post())) { //если товар не передался то парсим сайт
            $client = new Client();
            $res = $client->request('GET', $model->url);
            $body = $res->getBody();
            $document = \phpQuery::newDocumentHTML($body);
            $title = $document->find(".b-product__title");

            $model_tovar->URL = $model->url;
            $properties = $document->find(".b-product-properties__row");
            $model_tovar->Description = $document->find(".b-product__description-text p")->html();
            $model_tovar->Img = $document->find(".js-gallery-magnific-item");
            $model_tovar->Name = $document->find(".b-product__title")->html();

            foreach ($properties as $property) {
                $tovar_property_title = trim(pq($property)->find(".b-product-properties__title")->html());
                $tovar_property_value = trim(pq($property)->find(".b-product-properties__value")->html());
                $tovar_property[$tovar_property_title] = $tovar_property_value;
            }


            //$tovar->Color=$document->find(".b-product-properties__value:first")->html();
            //$tovar->Size=$document->find(".b-product-properties__value:second")->html();
            $model_tovar->Price = $document->find(".b-product-price__value:first")->html();
        } else {

           // $model_sklad= [new Sklad()];
            $count=count(Yii::$app->request->post('Sklad',[]));
            for($i=1; $i<$count;$i++){
                $model_sklad[]=new Sklad();
            }
            Model::loadMultiple($model_sklad,Yii::$app->request->post());
            $valid=$model_tovar->validate();

            $valid=Model::validateMultiple($model_sklad)&&$valid;

            if ($valid) { //сохраняем модель
                $transaction = \Yii::$app->db->beginTransaction();
                try{
                    if($flag=$model_tovar->save(false)){
                        foreach ($model_sklad as $sklad){
                            $sklad->id_Tovar=$model_tovar->id;
                            if(!($flag=$sklad->save(false))){
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if($flag){
                        $transaction->commit();
                        return $this->redirect((['parce']));
                    }
                }
                catch (Exception $e){
                    $transaction->rollBack();
                }
            }
        }


        // return $this->render('parce',['body'=>$body]);
        return $this->render('parce', [
            'model' => $model_tovar,
            'modelSklad'=>(empty($model_sklad)) ? [new Sklad()]:$model_sklad
        ]);
    }


    else{
        return $this->render('url',['model'=>$model]);
    }


}

}