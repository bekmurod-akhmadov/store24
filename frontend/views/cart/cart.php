<?php
    $this->title = "Savat";
?>
<nav class="woocommerce-breadcrumb">
    <a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span>
    Savat
</nav>
<?php if (!empty($session['cart'])): ?>
<div class="type-page hentry">
    <div class="entry-content">
        <div class="woocommerce">
            <div class="cart-wrapper">
                <form method="post" action="#" class="woocommerce-cart-form">
                    <table class="shop_table shop_table_responsive cart">
                        <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Tovar</th>
                            <th class="product-price">Narxi</th>
                            <th class="product-quantity">Soni</th>
                            <th class="product-subtotal">Jami</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($session['cart'] as $key => $item): ?>
                            <?php
                                $product = \common\models\Product::findOne($key);
                                $image = \common\components\StaticFunctions::getImage($product , 'product' , 'image');
                                ?>
                            <tr>
                                <td class="product-remove">
                                    <a class="remove" href="#">×</a>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $product->slug])?>">
                                        <img width="180" height="180" alt="" class="wp-post-image" src="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $product->slug])?>">
                                    </a>
                                </td>
                                <td data-title="Product" class="product-name">
                                    <div class="media cart-item-product-detail">
                                        <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $product->slug])?>">
                                            <img width="180" height="180" alt="" class="wp-post-image" src="<?=$image?>">
                                        </a>
                                        <div class="media-body align-self-center">
                                            <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $product->slug])?>"><?=$product->name?></a>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Price" class="product-price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol"><?=number_format($item['price'] , '0' ,' ' , ' ')?></span> so'm
                                    </span>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <div class="qty_group" style="border: 1px solid #ccc;border-radius: 10px;padding: 6px;text-align:center;">
                                            <span style="cursor: pointer" class="minus-button" data-id="<?=$key?>">
                                                <i class="fa fa-minus"></i>
                                            </span>
                                            <input style="width: 40px;border: none;text-align: center;outline: none;background-color:transparent;" class="cart_input" value="<?=$item['qty']?>" type="text"/>
                                            <span style="cursor: pointer" class="plus-btn" data-id="<?=$key?>">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Total" class="product-subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol"><?=number_format($item['price'] * $item['qty'], '0' ,' ' , ' ')?></span> so'm
                                    </span>
                                    <a  title="Tovarni o'chirish" data-id="<?=$key?>" id="<?=$key?>" class="delete-from-cart remove" href="<?=\yii\helpers\Url::to(['/cart/remove' , 'id' => $key])?>">×</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- .shop_table shop_table_responsive -->
                </form>
                <!-- .woocommerce-cart-form -->
                <div class="cart-collaterals">
                    <div class="cart_totals">
                        <h2>Cart totals</h2>
                        <table class="shop_table shop_table_responsive">
                            <tbody>
                            <tr class="cart-subtotal">
                                <th>Jami</th>
                                <td data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol"><?=number_format($session['cart.sum'] , '0' , ' ' , ' ')?></span> so'm</span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Tovarlar soni</th>
                                <td data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol"><?=$session['cart.qty']?></span>  ta</span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Umumiy</th>
                                <td data-title="Total">
                                    <strong>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?=number_format($session['cart.sum'] , '0' , ' ' , ' ' )?></span> so'm</span>
                                    </strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- .shop_table shop_table_responsive -->
                        <div class="wc-proceed-to-checkout"><!-- .wc-proceed-to-checkout -->
                            <a class="checkout-button button alt wc-forward" href="<?=\yii\helpers\Url::to(['/cart/checkout'])?>">
                                Rasmiylashtirish</a>
                            <a class="back-to-shopping" href="<?=\yii\helpers\Url::to(['/product/index'])?>">Xaridni davom ettirish</a>
                        </div>
                        <!-- .wc-proceed-to-checkout -->
                    </div>
                    <!-- .cart_totals -->
                </div>
                <!-- .cart-collaterals -->
            </div>
            <!-- .cart-wrapper -->
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .entry-content -->
</div>
<!-- .hentry -->
<?php else: ?>
    <div class="type-page hentry">
        <div class="entry-content">
            <div class="woocommerce text-center">
                <img src="/images/default/nothing-found.jpg" alt="" style="display:inline;width:350px;">
                <h4>Savatingiz bo'sh</h4>
                <a href="<?=\yii\helpers\Url::to(['/product/index'])?>" class="btn btn-primary">Qo'shish</a>
            </div>
        </div>
    </div>
<?php endif; ?>