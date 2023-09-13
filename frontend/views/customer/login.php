<?php
$this->title = "Kirish";
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>
<nav class="woocommerce-breadcrumb">
    <a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span>Kirish
</nav>
<div class="type-page hentry">
    <div class="entry-content">

            <?php if (!empty(Yii::$app->session->hasFlash('success'))): ?>
                <div class="alert alert-success flesh_success">
                    <?=Yii::$app->session->getFlash('success' )?>
                </div>
            <?php endif; ?>

        <div class="woocommerce d-flex justify-content-center">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <label for="username">Username
                            <span class="required">*</span>
                        </label>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>

                        <label for="password">Parol
                            <span class="required">*</span>
                        </label>
                        <?= $form->field($model, 'confirmation_code')->passwordInput()->label(false) ?>

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div class="my-1 mx-0" style="color:#999;">
                            Agar siz saytimizda yangi bo'lsangiz,iltimos oldin ro'yhatdan <a style="text-decoration:underline;color:blue" href="<?=\yii\helpers\Url::to(['/customer/registration'])?>">o'ting</a>.
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary my-3', 'name' => 'login-button']) ?>
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
<script>
    let flash = document.querySelector(".flesh_success");
    setTimeout(function() {
        flash.style.display = 'none';
    }, 2000);
</script>