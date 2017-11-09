<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sklads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sklad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sklad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_Sklad',
            'id_Size',
            'id_Color',
            'count',
            'id_Tovar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
