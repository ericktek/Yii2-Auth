<?php


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="d-flex ">
    <div class="row justify-content-center align-items-center">
        <div class="">
            <div class="card">
  

            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'card-body cardbody-color p-lg-4'],
               
            ]); ?>

                <div class="text-center">
                    <h1 class="title">Sign Up</h1>
                    <p class="lead">Online Retailer Point of Sales</p>
                </div>

                <?= Html::csrfMetaTags() ?>
                
                <span class="row">
                
                <div class="col-md-6"><?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'John Doe']) ?></div> 
                <div class="col-md-6"> <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'John@gmail.com', 'type' => 'email']) ?></div> 
                </span>

                
                <span class="row">

                <div class="col-md-6"><?= $form->field($model, 'password')->passwordInput([ 'maxlength' => true, 'placeholder' => '********']) ?></div>

                <div class="col-md-6"><?= $form->field($model, 'password_confirm')->passwordInput(['maxlength' => true, 'placeholder' => '********']) ?></div>
                </span>

                <?= $form->field($model, 'imageFile')->fileInput(['class' => 'form-control', 'placeholder' => 'Profile Image'])->label('Profile Image (Not Compulsory)', ['class' => 'label'])?>


                <div class="form-group">
                    <?= Html::submitButton('Sign Up', ['class' => 'btn btn-color px-5 mb-3 w-100']) ?>
                </div>

                <div class="form-text text-center mb-0 mt-3 text-dark">
                Already registered? <a href="login" class="text-dark fw-bold underline-hover">Log In</a>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>