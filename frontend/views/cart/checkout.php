<?php use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
$region_id = !empty($model->customerAddress->region_id) ? $model->customerAddress->region_id : NULL;
$district_id = !empty($model->customerAddress->district_id) ? $model->customerAddress->district_id : NULL;

$this->title = "Rasmiylashtirish";
?>
<?php if (!empty($session['cart'])): ?>
<div class="type-page hentry">
    <div class="entry-content">
        <div class="woocommerce">
            <?php if (empty($user)): ?>
            <div class="woocommerce-info">Rasmiylashtirish uchun iltimos oldin saytga  kiring<a data-toggle="collapse" href="#login-form" aria-expanded="false" aria-controls="login-form" class="showlogin"> | kirish uchun bu yerga bosing</a>
            </div>

            <div class="collapse" id="login-form">
                <?php $form = \yii\bootstrap5\ActiveForm::begin([
                    'options' => ['id' => 'login-form'],
                    'class' => 'woocomerce-form woocommerce-form-login login',
                ]) ?>
                    <p>Agar siz avval biz bilan xarid qilgan bo'lsangiz, iltimos, kirish uchun maydonlarni to'ldiring. Agar siz yangi mijoz boʻlsangiz, oldin saytdan
                        <a style="color:blue;text-decoration:underline;" href="<?=\yii\helpers\Url::to(['customer/registration'])?>">ro'yhatdan o'ting</a>
                    </p>
                        <?php if($login): ?>
                        <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="username">Username
                                                <span class="required">*</span>
                                            </label>
                                            <?= $form->field($login, 'username')->textInput(['autofocus' => true])->label(false) ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="password">Parol
                                                <span class="required">*</span>
                                            </label>
                                            <?= $form->field($login, 'confirmation_code')->passwordInput()->label(false) ?>
                                        </div>
                                    </div>
                                    <?= $form->field($login, 'rememberMe')->checkbox() ?>

                                    <div class="my-1 mx-0" style="color:#999;">
                                        Agar siz saytimizda yangi bo'lsangiz,iltimos oldin ro'yhatdan <a style="text-decoration:underline;color:blue" href="<?=\yii\helpers\Url::to(['/customer/registration'])?>">o'ting</a>.
                                    </div>

                                    <div class="form-group">
                                        <?= Html::submitButton('Kirish', ['class' => 'btn btn-primary my-3', 'name' => 'login-button']) ?>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>

                    <?php \yii\bootstrap5\ActiveForm::end() ?>

            </div>
            <!-- .collapse -->
            <?php else: ?>

            <?php $customerForm = ActiveForm::begin([
                    'options' => [
                        'id' => 'login-form1',
                        'class' => 'checkout woocommerce-checkout',
                        'name' => 'customer-checkout'
                    ]
                ]) ?>

                <div id="customer_details" class="col2-set">
                    <div class="col-1">
                        <div class="woocommerce-billing-fields">
                            <h3>Foydalanuvchi ma'lumotlari</h3>
                            <div class="woocommerce-billing-fields__field-wrapper-outer">
                                <div class="woocommerce-billing-fields__field-wrapper">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer , 'first_name')->textInput([
                                                    'class' => 'input-text w-100',
                                                    'value' => !empty($model->first_name) ? $model->first_name : '',
                                                    'options' => [
                                                        'id' => 'billing_company'
                                                    ]
                                                ])?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer , 'last_name')->textInput([
                                                    'class' => 'input-text w-100',
                                                    'value' => !empty($model->last_name) ? $model->last_name : '',
                                                ])?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customerAdress , 'region_id')->dropDownList(
                                                    \yii\helpers\ArrayHelper::map($customer->districts , 'id' , 'name_uz'),
                                                    [
//                                                        'options'  => [
//                                                            "$region_id" => ['selected' => 'selected'],
//                                                        ],
                                                        'prompt' => 'Viloyat...',
                                                        'class' => 'country_to_state country_select select2-hidden-accessible w-100',
                                                        'onchange' => '
                                                            $.get("' . Yii::$app->urlManager->createUrl(['cart/get-districts']) . '", { region_id: $(this).val() })
                                                                .done(function(data) {
                                                                    var options = JSON.parse(data);
                                                                    var districtDropdown = $("#customeraddress-district_id");
                                                                    districtDropdown.empty(); // Очистить список перед добавлением новых элементов
                                                        
                                                                    $.each(options, function(key, value) {
                                                                        districtDropdown.append(new Option(value, key));
                                                                    });
                                                                });
'
                                                    ]
                                                )?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">

                                                <?=$customerForm->field($customer->adress , 'district_id')->dropDownList(
                                                    [],

                                                    [
                                                        'prompt' => 'Tuman...',
                                                        'class' => 'country_to_state country_select select2-hidden-accessible w-100',
                                                    ]
                                                )?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer->adress, 'address')->textInput([
                                                        'value' => !empty($model->customerAddress->address) ? $model->customerAddress->address : ''
                                                ])?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer->adress, 'zipcode')->textInput([
                                                    'value' => !empty($model->customerAddress->zipcode) ? $model->customerAddress->zipcode : ''
                                                ])?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer->adress, 'phone_number')->widget(\yii\widgets\MaskedInput::className() , [
                                                    'mask' => '99 999 99 99',
                                                    'options' => [
                                                        'value' => !empty($model->customerAddress->phone_number) ? $model->customerAddress->phone_number : '',
                                                    ],

                                                ])?>
                                            </p>
                                        </div>

                                    </div>



<!--                                    <p class="form-row form-row-wide w-100" style="width:50%;margin-bottom: none;">-->
<!--                                        --><?//= $customerForm->field($customer, 'gender')->widget(Select2::classname(), [
//                                            'data' => Yii::$app->params['gender'],
//                                            'options' => ['placeholder' => 'Jinsingiz...'],
//                                            'pluginOptions' => [
//                                                'allowClear' => true
//                                            ],
//                                        ]); ?>
<!--                                    </p>-->

                                </div>
                            </div>
                            <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                        </div>

                    </div>

                </div>
                <!-- .col2-set -->
                <h3 id="order_review_heading">Sizning tovarlaringiz</h3>
                <div class="woocommerce-checkout-review-order" id="order_review">
                    <div class="order-review-wrapper">
                        <h3 class="order_review_heading">Sizning tovarlaringiz</h3>
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                            <tr>
                                <th class="product-name">Tovarlar</th>
                                <th class="product-total">Summa</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($session['cart'])): ?>
                                    <?php foreach ($session['cart'] as $key => $sessionItem): ?>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                <strong class="product-quantity"><?=$sessionItem['qty']?> ×</strong><?=$sessionItem['name']?>
                                            </td>
                                            <td class="product-total">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol"><?=number_format($sessionItem['price'] * $sessionItem['qty'] , '0' , ' ' , ' ')?></span> so'm</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Jami summa</th>
                                    <td>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?=number_format($session['cart.sum'] , '0' , ' ' , ' ')?></span> so'm</span>
                                    </td>
                                </tr>
                            <tr class="order-total">
                                <th>Jami tovarlar</th>
                                <td>
                                    <strong>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?=$session['cart.qty']?></span> ta</span>
                                    </strong>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.woocommerce-checkout-review-order-table -->
                        <div class="woocommerce-checkout-payment" id="payment">
                            <div class="form-row place-order">
                                <?=Html::submitButton('Rasmiylashtirish' , ['class' => 'button wc-forward text-center'])?>
                            </div>
                        </div>
                        <!-- /.woocommerce-checkout-payment -->
                    </div>
                    <!-- /.order-review-wrapper -->
                </div>
                <!-- .woocommerce-checkout-review-order -->
<!--            </form>-->
            <!-- .woocommerce-checkout -->
            <?php ActiveForm::end() ?>
            <?php endif; ?>
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .entry-content -->
</div>
<?php else: ?>
    <div class="container text-center">
        <h2>Siz hech narsa xarid qilmadingiz!</h2>
        <a href="<?=\yii\helpers\Url::to(['/product/index'])?>" class="button wc-forward text-light">Xarid qilishga o'tish</a>
    </div>
<?php endif; ?>