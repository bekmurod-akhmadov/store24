<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <?php use yii\bootstrap5\ActiveForm;
            use yii\bootstrap5\Html;

            $form = ActiveForm::begin(['id' => 'register-form']); ?>
            <div class="row">
                <div class="col-lg-6">
                    <label for="username">Ismi
                        <span class="required">*</span>
                    </label>
                    <?= $form->field($model, 'last_name')->textInput(['autofocus' => true])->label(false) ?>
                </div>
                <div class="col-lg-6">
                    <label for="username">Familiyasi
                        <span class="required">*</span>
                    </label>
                    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true])->label(false) ?>
                </div>
                <div class="col-lg-6">
                    <label for="username">Foydalanuvchi nomi
                        <span class="required">*</span>
                    </label>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>
                </div>
                <div class="col-lg-6">
                    <label for="password">Parol
                        <span class="required">*</span>
                    </label>
                    <?= $form->field($model, 'confirmation_code')->passwordInput()->label(false) ?>
                </div>
                <div class="col-lg-6">
                    <label for="password">Viloyat
                        <span class="required">*</span>
                    </label>
                    <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">

                        <?=$form->field($model , 'region_id')->dropDownList(
                            \yii\helpers\ArrayHelper::map($model->regions , 'id' , 'name_uz'),
                            [
                                'prompt' => 'Viloyat...',
                                'class' => 'country_to_state country_select select2-hidden-accessible w-100',
                                'onchange' => '
                                                            $.get("' . Yii::$app->urlManager->createUrl(['customer/get-districts']) . '", { region_id: $(this).val() })
                                                                .done(function(data) {
                                                                    var options = JSON.parse(data);
                                                                    var districtDropdown = $("#registration-district_id");
                                                                    districtDropdown.empty(); // Очистить список перед добавлением новых элементов
                                                        
                                                                    $.each(options, function(key, value) {
                                                                        districtDropdown.append(new Option(value, key));
                                                                    });
                                                                });
'
                            ]
                        )->label(false)?>
                    </p>
                </div>
                <div class="col-lg-6">
                    <label for="password">Tuman
                        <span class="required">*</span>
                    </label>
                    <p class="form-row form-row-wide w-100" style="width:100%;margin-bottom: none;">

                        <?=$form->field($model , 'district_id')->dropDownList(
                            [],
                            [
                                'prompt' => 'Tuman...',
                                'class' => 'country_to_state country_select select2-hidden-accessible w-100',
                            ]
                        )->label(false)?>
                    </p>
                </div>
                <div class="col-lg-6">
                    <label for="password">Ko'cha nomi uy raqami (To'liq)
                        <span class="required">*</span>
                    </label>
                    <?= $form->field($model, 'address')->textInput()->label(false) ?>
                </div>
                <div class="col-lg-6">
                    <label for="password">Zipcode
                        <span class="required">*</span>
                    </label>
                    <?= $form->field($model, 'zipcode')->textInput()->label(false) ?>
                </div>
                <div class="col-lg-6">
                    <label for="password">Telefon
                        <span class="required">*</span>
                    </label>
                    <?=$form->field($model, 'phone_number')->widget(\yii\widgets\MaskedInput::className() , [
                        'mask' => '99 999 99 99',
                    ])->label(false)?>
                </div>
                <div class="col-lg-6" style="padding-top:35px;">
                    <div class="my-1 mx-0" style="color:#999;">
                        Agar oldin ro'yhatdan o'tgan bolsangiz login parolingiz bilan <a style="text-decoration:underline;color:blue" href="<?=\yii\helpers\Url::to(['/customer/login'])?>">kiring</a>.
                    </div>
                </div>

            </div>
            <div class="form-group">
                <?= Html::submitButton("Ro'yhatdan o'tish", ['class' => 'btn btn-primary my-3', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>