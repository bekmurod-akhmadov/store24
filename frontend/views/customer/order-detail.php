<?php
$this->title = "Buyurtma haqida";
?>
<nav class="woocommerce-breadcrumb">
    <a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span>
    <a href="<?=\yii\helpers\Url::to(['/customer/order-list'])?>">Mening buyurtmalarim</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span>
    Buyurtma raqami - <?=!empty($order) ? $order->id : ''?>
</nav>
<div class="type-page hentry">
    <div class="entry-content">
        <div class="woocommerce">
            <div class="cart-wrapper">
                <?php if (!empty($order->orderDetails)): ?>
                <form style="max-width:100%;flex:0 0 100%;" method="post" action="#" class="woocommerce-cart-form">
                    <table class="shop_table shop_table_responsive cart">
                        <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Tovar</th>
                            <th class="product-price">Narxi</th>
                            <th class="product-quantity">Soni</th>
                            <th class="product-subtotal">Summa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($order->orderDetails as $model): ?>
                        <?php
                            $product = $model->product;
                            $image = \common\components\StaticFunctions::getImage($product , 'product' , 'image');
                            $price = NULL;
                            if ($product->discount > 0){
                                $price = $product->discount;
                            }else{
                                $price = $product->price;
                            }
                        ?>
                        <tr>
                            <td class="product-remove">
                                <a class="remove" href="#">×</a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $product->slug])?>">
                                    <img width="180" height="180" alt="" class="wp-post-image" src="single-product-fullwidth.html">
                                </a>
                            </td>
                            <td data-title="Product" class="product-name">
                                <div class="media cart-item-product-detail">
                                    <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $product->slug])?>">
                                        <img width="180" height="180" alt="" class="wp-post-image" src="<?=$image?>">
                                    </a>
                                    <div class="media-body align-self-center">
                                        <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $product->slug])?>"><?=\common\components\StaticFunctions::getPartOfText($product->name , '150')?></a>
                                    </div>
                                </div>
                            </td>
                            <td data-title="Price" class="product-price">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"><?=number_format($price , '0' , ' ' , ' ')?></span> so'm
                                </span>
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"><?=$model->count?></span>
                                </span>
                            </td>
                            <td data-title="Total" class="product-subtotal">
                                                                   <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"><?=number_format($model->count * $price , '0' , ' ' , ' ')?></span> so'm
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- .shop_table shop_table_responsive -->
                </form>
                <!-- .woocommerce-cart-form -->
                <?php endif; ?>
            </div>
            <!-- .cart-wrapper -->
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .entry-content -->
</div>
