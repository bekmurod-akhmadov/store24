<?php
$this->title = "Ro'yhatdan o'tish";
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>
<nav class="woocommerce-breadcrumb">
    <a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span>Ro'yhatdan o'tish
</nav>
<div class="type-page hentry">
    <div class="entry-content">
        <div class="woocommerce d-flex justify-content-center">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>
                        <label for="username">Foydalanuvchi nomi
                            <span class="required">*</span>
                        </label>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>

                        <label for="password">Parol
                            <span class="required">*</span>
                        </label>
                        <?= $form->field($model, 'confirmation_code')->passwordInput()->label(false) ?>

                        <div class="my-1 mx-0" style="color:#999;">
                            Agar oldin ro'yhatdan o'tgan bolsangiz login parolingiz bilan <a style="text-decoration:underline;color:blue" href="<?=\yii\helpers\Url::to(['/customer/registration'])?>">kiring</a>.
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton("Ro'yhatdan o'tish", ['class' => 'btn btn-primary my-3', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .entry-content -->
</div>
<!-- .hentry -->