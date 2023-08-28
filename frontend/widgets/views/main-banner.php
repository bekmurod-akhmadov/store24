<div class="home-v1-slider home-slider">
    <?php if (!empty($models)): ?>
    <?php foreach ($models as $model): ?>
        <?php
            $image = \common\components\StaticFunctions::getImage($model , 'banner' , 'image');
            ?>
    <div class="slider-1" style="background-image: url(<?=$image?>);">
        <img ssrc="/images/slider/home-v1-img-1.png" alt="">
        <div class="caption">
            <div class="title"><?=$model->title?></div>
            <div class="sub-title"><?=$model->description?></div>
            <a href="<?=\yii\helpers\Url::to(['/product/index'])?>" class="button">Barchasini ko'rish
                <i class="tm tm-long-arrow-right"></i>
            </a>
        </div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
    <!-- .slider-1 -->
<!--    <div class="slider-1 slider-2" style="background-image: url(/images/slider/home-v1-background.jpg);">-->
<!--        <img ssrc="/images/slider/home-v1-img-2.png" alt="">-->
<!--        <div class="caption">-->
<!--            <div class="title">The new-tech gift you-->
<!--                <br> are wishing for is-->
<!--                <br> right here</div>-->
<!--            <div class="sub-title">Big screens in incredibly slim designs-->
<!--                <br>that in your hand.</div>-->
<!--            <div class="button">Browse now-->
<!--                <i class="tm tm-long-arrow-right"></i>-->
<!--            </div>-->
<!--            <div class="bottom-caption">Free shipping on US Terority </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <!-- .slider-2 -->
</div>
<!-- .home-v1-slider -->