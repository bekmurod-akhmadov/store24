<?php use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = "Rasmiylashtirish"?>
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
                                                ])?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer , 'middle_name')->textInput([
                                                    'class' => 'input-text w-100',
                                                ])?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer , 'gender')->dropDownList(
                                                    Yii::$app->params['gender'],
                                                    [
                                                        'class' => 'country_to_state country_select select2-hidden-accessible w-100'
                                                    ]
                                                )?>
                                            </p>
                                        </div>

                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer , 'birth_date')->textInput([
                                                    'class' => 'input-text w-100',
                                                    'type' => 'date'
                                                ])?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer->adress, 'address')->textInput()?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customerAdress , 'region_id')->dropDownList(
                                                    \yii\helpers\ArrayHelper::map($customer->districts , 'id' , 'name_uz'),
                                                    [
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
                                                <?=$customerForm->field($customer->adress, 'zipcode')->textInput()?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">
                                                <?=$customerForm->field($customer->adress, 'phone_number')->widget(\yii\widgets\MaskedInput::className() , [
                                                    'mask' => '99 999 99 99',
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
                        <!-- .woocommerce-billing-fields -->
                        <div class="woocommerce-account-fields">

                            <div class="create-account collapse" id="createLogin">
                                <p data-priority="" id="account_password_field" class="form-row validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                    <label class="" for="account_password">Account password
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input type="password" value="" placeholder="Password" id="account_password" name="account_password" class="input-text ">
                                </p>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <!-- .woocommerce-account-fields -->
                    </div>

                </div>
                <!-- .col2-set -->
                <h3 id="order_review_heading">Your order</h3>
                <div class="woocommerce-checkout-review-order" id="order_review">
                    <div class="order-review-wrapper">
                        <h3 class="order_review_heading">Your Order</h3>
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cart_item">
                                <td class="product-name">
                                    <strong class="product-quantity">1 ×</strong> 55" KU6470 6 Series UHD Crystal Colour HDR Smart TV&nbsp;
                                </td>
                                <td class="product-total">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">£</span>627.99</span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="product-name">
                                    <strong class="product-quantity">1 ×</strong> 4K Action Cam GPS&nbsp;
                                </td>
                                <td class="product-total">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">£</span>219.00</span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="product-name">
                                    <strong class="product-quantity">1 ×</strong> Bluetooth on-ear PureBass Headphones&nbsp;
                                </td>
                                <td class="product-total">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">£</span>99.95</span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="product-name">
                                    <strong class="product-quantity">1 ×</strong> Band Fitbit Flex&nbsp;
                                </td>
                                <td class="product-total">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">£</span>17.00</span>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">£</span>963.94</span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td>
                                    <strong>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">£</span>963.94</span>
                                    </strong>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.woocommerce-checkout-review-order-table -->
                        <div class="woocommerce-checkout-payment" id="payment">
                            <ul class="wc_payment_methods payment_methods methods">
                                <li class="wc_payment_method payment_method_bacs">
                                    <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                    <label for="payment_method_bacs">Direct bank transfer</label>

                                </li>
                                <li class="wc_payment_method payment_method_cheque">
                                    <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                    <label for="payment_method_cheque">Check payments </label>

                                </li>
                                <li class="wc_payment_method payment_method_cod">
                                    <input type="radio" data-order_button_text="" value="cod" name="payment_method" class="input-radio" id="payment_method_cod">
                                    <label for="payment_method_cod">Cash on delivery </label>

                                </li>
                            </ul>
                            <div class="form-row place-order">
                                <p class="form-row terms wc-terms-and-conditions woocommerce-validated">
                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                        <input type="checkbox" id="terms" name="terms" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                        <span>I’ve read and accept the <a class="woocommerce-terms-and-conditions-link" href="terms-and-conditions.html">terms &amp; conditions</a></span>
                                        <span class="required">*</span>
                                    </label>
                                    <input type="hidden" value="1" name="terms-field">
                                </p>
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
<!-- #post-## -->