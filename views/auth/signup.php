<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>