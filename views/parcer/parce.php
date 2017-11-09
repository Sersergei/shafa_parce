<?php
/**
 * Created by PhpStorm.
 * User: Ohonko
 * Date: 26.09.2017
 * Time: 17:54
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Size;

$js = '

jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {

    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {

        jQuery(this).html("Tovar: " + (index + 1))

    });

});


jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {

    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {

        jQuery(this).html("Tovar: " + (index + 1))

    });

});

';


$this->registerJs($js);

?>
<?php
$form=ActiveForm::begin(['id'=>'dynamic-form']); ?>
<?=$form->field($model, 'URL') ?>
<?=$form->field($model, 'Name') ?>
<?=$form->field($model, 'Description') ?>
<?=$form->field($model, 'Price') ?>
<?=$form->field($model, 'Img') ?>
<?=$model->Img; ?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 4, // the maximum times, an element can be cloned (default 999)
    'min' => 0, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $modelSklad[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'id_Sklad',
        'id_Size',
        'id_Color',
        'count',
        'id_Tovar',
    ],
]); ?>

    <div class="panel-heading">
    <i class="fa fa-envelope"></i> Address Book
    <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add address</button>
    <div class="clearfix"></div>
    </div>
    <div class="panel-body container-items"><!-- widgetContainer -->

<?php foreach ($modelSklad as $index => $modelSklad): ?>
    <div class="item panel panel-default"><!-- widgetBody -->
    <div class="panel-heading">
        <span class="panel-title-address">Склад: <?= ($index + 1) ?></span>
        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
        <div class="clearfix"></div>
    </div>
        <div class="panel-body">
        <?php
        // necessary for update action.
        if (!$modelSklad->isNewRecord) {
            echo Html::activeHiddenInput($modelSklad, "[{$index}]id");
        }
        $size=Size::find()->all();
        $size_item=\yii\helpers\ArrayHelper::map($size,'id_size','Name_suze');
        $color=\app\models\Color::find()->all();
        $color_item=\yii\helpers\ArrayHelper::map($color,'id_Color','Name_Color');
        ?>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($modelSklad, "[{$index}]id_Size")->dropDownList($size_item) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($modelSklad, "[{$index}]id_Color")->dropDownList($color_item) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($modelSklad, "[{$index}]count")->textInput(['maxlength' => true]) ?>
            </div>
        </div><!-- end:row -->
    </div>
    </div>
<?php endforeach; ?>
    </div>
    </div>
<?php DynamicFormWidget::end(); ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить',['class'=>'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>