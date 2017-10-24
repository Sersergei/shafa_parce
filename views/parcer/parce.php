<?php
/**
 * Created by PhpStorm.
 * User: Ohonko
 * Date: 26.09.2017
 * Time: 17:54
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form=ActiveForm::begin(); ?>
<?=$form->field($model, 'URL') ?>
<?=$form->field($model, 'Name') ?>
<?=$form->field($model, 'Description') ?>
<?=$form->field($model, 'Price') ?>
<?=$form->field($model, 'Color') ?>
<?=$form->field($model, 'Size') ?>
<?=$model->Img; ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить',['class'=>'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>