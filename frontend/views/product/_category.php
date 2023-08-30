
    <?php
        $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
    ?>

    <div class="yith-wcwl-add-to-wishlist">
        <a href="#" rel="nofollow" class="add_to_wishlist"> Istaklarga qo'shish</a>
    </div>
    <!-- .yith-wcwl-add-to-wishlist -->
    <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $model->slug ])?>">
        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?=$image?>">
        <span class="price" style="height:51px">
            <?php if ($model->discount == NULL ): ?>
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol"></span><?=number_format($model->price , '0' , ' ' , ' ')?> so'm
            </span>
            <?php else: ?>
            <ins>
                <span class="amount"><?=number_format($model->discount , '0' , ' ' , ' ')?> so'm</span>
            </ins>
            <br>
            <del>
                <span class="amount"><?=number_format($model->price , '0' , ' ' , ' ')?> so'm</span>
            </del>
            <?php endif; ?>
        </span>
        <h2 class="woocommerce-loop-product__title"><?=\common\components\StaticFunctions::getPartOfText($model->name , 20)?></h2>
    </a>
    <!-- .woocommerce-LoopProduct-link -->
    <div class="techmarket-product-rating">
        <div title="Rated 5.00 out of 5" class="star-rating">
            <span style="width:100%">
                <strong class="rating">5.00</strong> out of 5
            </span>
        </div>
        <span class="review-count">(<?=$model->commentCount?>)</span>
    </div>
    <!-- .techmarket-product-rating -->
    <span class="sku_wrapper">SKU:
        <span class="sku"><?=$model->sku?></span>
    </span>

    <!-- .woocommerce-product-details__short-description -->
    <a class="button product_type_simple add_to_cart_button" href="cart.html">Savatga</a>
    <a class="add-to-compare-link" href="compare.html">Taqqoslash</a>

