<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>



<div  class="container">
    <div class="row">
        <div class="col-md-5 offset-md-cust">
            <div class="card">
  

            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'card-body cardbody-color p-lg-4'],
               
            ]); ?>

                <div class="text-center">
                    <h1 class="title">Sign In</h1>
                    <p class="lead">Online Retailer Point of Sales</p>
                </div>

                <?= $form->field($model, 'username')->textInput(['id' => 'username', 'placeholder' => 'John Doe'])->label('Username') ?>

                <?= $form->field($model, 'password')->passwordInput(['id' => 'password',  'placeholder' => '********'])->label('Password') ?>

                <div class="text-center">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-color px-5 mb-5 w-100']) ?>
                </div>

                <div class="form-text text-center mb-5 text-dark">
                    Not Registered? <a href="/auth/signup" class="text-dark fw-bold underline-hover">Create an Account</a>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>



