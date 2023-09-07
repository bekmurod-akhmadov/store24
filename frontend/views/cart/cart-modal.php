<li>
    <div class="widget woocommerce widget_shopping_cart" id="widget_shopping_cart">
        <div class="widget_shopping_cart_content">

            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                <?php if (!empty($session['cart'])): ?>
                    <?php foreach ($session['cart'] as $key => $cart): ?>
                        <?php
                        $product = \common\models\Product::findOne($key);
                        $image = \common\components\StaticFunctions::getImage($product , 'product' , 'image');
                        ?>
                        <li class="woocommerce-mini-cart-item mini_cart_item"   >
                            <a href="<?=\yii\helpers\Url::to(['/cart/show' , 'id' => $product->id])?>" id="<?=$product->id?>" data-id="<?=$product->id?>" class="remove" aria-label="Remove this item" data-product_id="65" data-product_sku="">×</a>
                            <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $product->slug])?>">
                                <img src="<?=$image?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""><?=$product->name?>
                            </a>
                            <span class="quantity"><?=$cart['qty']?> ×
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol"><?=number_format($product->discount > 0 ? $product->discount : $product->price , '0',' ' , ' ')?></span> so'm
                                                    </span>
                                                </span>
                        </li>
                        <!-- .cart_list -->

                    <?php endforeach;?>
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Jami:</strong>
                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?=number_format( $session['cart.sum'], '0',' ' , ' ')?></span> so'm</span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons">
                        <a href="<?=\yii\helpers\Url::to(['/cart/cart'])?>" class="button wc-forward">Savatga o'tish</a>
                        <a href="<?=\yii\helpers\Url::to(['/cart/checkout'])?>" class="button checkout wc-forward">Rasmiylashtirish</a>
                    </p>

                <?php else: ?>
                    <li class="woocommerce-mini-cart-item mini_cart_item"   >

                    <span class="quantity">
                        <span class="woocommerce-Price-amount amount text-center">
                            <div class="alert alert-warning">Savatingiz hali bo'sh</div>
                            <a href="<?=\yii\helpers\Url::to(['/product/index'])?>" class="button wc-forward text-light">Qo'shish</a>
                        </span>
                    </span>
                    </li>
                <?php endif;?>

            </ul>

        </div>
        <!-- .widget_shopping_cart_content -->
    </div>
        <!-- .widget_shopping_cart -->
</li>


