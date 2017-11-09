<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sklad */

$this->title = $model->id_Sklad;
$this->params['breadcrumbs'][] = ['label' => 'Sklads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sklad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_Sklad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_Sklad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_Sklad',
            'id_Size',
            'id_Color',
            'count',
            'id_Tovar',
        ],
    ]) ?>

</div>
