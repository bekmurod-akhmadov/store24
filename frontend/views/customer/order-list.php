<?php
    $this->title = "Mening buyurtmalarim";
?>
<nav class="woocommerce-breadcrumb">
    <a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span>
    <a href="<?=\yii\helpers\Url::to(['/customer/profile'])?>">Mening profilim</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span>
    Mening buyurtmalarim
</nav>
<div class="type-page hentry">
    <div class="entry-content">
        <div class="woocommerce">
            <div class="cart-wrapper">
                <?php if (!empty($models)): ?>
                <form method="post" action="#" class="woocommerce-cart-form" style="max-width:100%;flex:0 0 100%">
                    <table class="shop_table shop_table_responsive cart">
                        <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Buyurtma raqami</th>
                            <th class="product-price">Buyurtma sanasi</th>
                            <th class="product-quantity">Tovarlar soni</th>
                            <th class="product-subtotal">Jami</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($models as $model): ?>
                            <?php
//                                $prodcut = \common\models\Product::findOne($model->pro)
                                ?>
                                <tr>
                                    <td class="product-remove">
                                        <a class="remove" href="#">×</a>
                                    </td>
                                    <td data-title="Price" class="product-price">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">
                                                <a href="<?=\yii\helpers\Url::to(['/customer/order-detail' , 'id' => $model->id])?>" style="color:blue;text-decoration:underline">#<?=$model->id?></a>
                                            </span>
                                        </span>
                                    </td>
                                    <td data-title="Price" class="product-price">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?=date('Y.m.d / H:i' , strtotime($model->ordered_at))?></span>
                                        </span>
                                    </td>
                                    <td class="product-quantity product-price" data-title="Quantity">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?=$model->qty?> ta</span>
                                        </span>
                                    </td>
                                    <td data-title="Total" class="product-subtotal">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"><?=number_format($model->sum , '0' , ' ' , ' ')?></span> so'm
                                        </span>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- .shop_table shop_table_responsive -->
                </form>
                <?php else: ?>
                    <div class="nothing text-center">
                        <div class="image_block">
                            <img src="/images/default/nothing-found.jpg" alt="">
                        </div>
                        <h4>Sizda buyurtmalar mavjud emas</h4>
                        <a class="button wc-forward text-light" href="<?=\yii\helpers\Url::to(['/product/index'])?>">Buyurtma qilish</a>
                    </div>

                <?php endif; ?>
            </div>
            <!-- .cart-wrapper -->
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .entry-content -->
</div>
<!-- #main -->