<?php
    $this->title = $model->name;
?>
<nav class="woocommerce-breadcrumb">
    <span class="delimiter"></span><a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span><a href="<?=\yii\helpers\Url::to(['/product/category' , 'id' => $category->id])?>"><?=$category->name?> </a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
    </span><?=$model->name?>
</nav>
<div class="product product-type-simple">
    <div class="single-product-wrapper">
        <div class="product-images-wrapper thumb-count-4">
            <?php if ($model->discount != NULL): ?>
                <span class="onsale">-
                    <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol"></span><?=number_format($model->price - $model->discount , '0' , ' ', ' ')?> so'm</span>
                </span>
            <?php endif; ?>
            <!-- .onsale -->
            <div id="techmarket-single-product-gallery" class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images" data-columns="4">
                <div class="techmarket-single-product-gallery-images" data-ride="tm-slick-carousel" data-wrap=".woocommerce-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">
                    <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                        <a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
                        <figure class="woocommerce-product-gallery__wrapper ">
                            <?php if($model->images): ?>
                                <?php foreach ($model->images as $galleryImage): ?>
                                    <div data-thumb="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$galleryImage->product_id?>/l_<?=$galleryImage->image?>" class="woocommerce-product-gallery__image">
                                        <a href="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$galleryImage->product_id?>/l_<?=$galleryImage->image?>" tabindex="0">
                                            <img width="600" height="600" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$galleryImage->product_id?>/l_<?=$galleryImage->image?>" class="attachment-shop_single size-shop_single wp-post-image" alt="">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </figure>
                    </div>
                    <!-- .woocommerce-product-gallery -->
                </div>
                <!-- .techmarket-single-product-gallery-images -->
                <div class="techmarket-single-product-gallery-thumbnails" data-ride="tm-slick-carousel" data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
                    <figure class="techmarket-single-product-gallery-thumbnails__wrapper">
                        <?php if($model->images): ?>
                            <?php foreach ($model->images as $galleryImage): ?>
                                <figure data-thumb="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$galleryImage->product_id?>/l_<?=$galleryImage->image?>" class="techmarket-wc-product-gallery__image">
                                    <img width="180" height="180" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$galleryImage->product_id?>/l_<?=$galleryImage->image?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
                                </figure>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </figure>
                    <!-- .techmarket-single-product-gallery-thumbnails__wrapper -->
                </div>
                <!-- .techmarket-single-product-gallery-thumbnails -->
            </div>
            <!-- .techmarket-single-product-gallery -->
        </div>
        <!-- .product-images-wrapper -->
        <div class="summary entry-summary">
            <div class="single-product-header">
                <h1 class="product_title entry-title"><?=$model->name?></h1>
                <a class="add-to-wishlist" href="wishlist.html">Istaklarga qo'shish</a>
            </div>
            <!-- .single-product-header -->
            <div class="single-product-meta">
                <div class="brand">
                    <a href="#">
                        <img alt="galaxy" src="/images/brands/5.png">
                    </a>
                </div>
                <div class="cat-and-sku">
                    <span class="posted_in categories">
                        <a rel="tag" href="<?=\yii\helpers\Url::to(['/product/category' , 'id' => $category->id])?>"><?=$category->name?></a>
                    </span>
                    <span class="sku_wrapper">SKU:
                        <span class="sku"><?=$model->sku?></span>
                    </span>
                </div>
                <div class="product-label">
                    <div class="">
                        <span></span>
                    </div>
                </div>
            </div>
            <!-- .single-product-meta -->
            <div class="rating-and-sharing-wrapper">
                <div class="woocommerce-product-rating">
                    <div class="star-rating">
                        <span style="width:100%">Rated
                            <strong class="rating">5.00</strong> out of 5 based on
                            <span class="rating">1</span> Izohlar</span>
                    </div>
                    <a rel="nofollow" class="woocommerce-review-link" href="#reviews">(<span class="count"><?=$model->commentCount?></span> Izohlar)</a>
                </div>
            </div>
            <!-- .rating-and-sharing-wrapper -->
            <div class="woocommerce-product-details__short-description my-3">
                <?=$model->description?>
            </div>
            <!-- .woocommerce-product-details__short-description -->
            <div class="product-actions-wrapper">
                <div class="product-actions">
                    <p class="price">
                        <?php if ($model->discount != NULL ):?>
                        <del>
                            <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol"></span><?=number_format($model->price , '0' , ' ' , ' ')?> so'm</span>
                        </del>
                        <ins>
                            <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol"><?=number_format($model->discount , '0' , ' ' , ' ')?> so'm</span>
                        </ins>
                        <?php else: ?>
                            <ins>
                                <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol"><?=number_format($model->price , '0' , ' ' , ' ')?> so'm</span>
                            </ins>
                        <?php endif; ?>
                    </p>
                    <!-- .single-product-header -->
                    <form enctype="multipart/form-data" method="post" class="cart">
                        <div class="quantity">
                            <label for="quantity-input">Soni</label>
                            <input  type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" id="quantity-input">
                        </div>
                        <!-- .quantity -->
                        <a href="<?=\yii\helpers\Url::to(['/cart/add' , 'id' => $model->id])?>" data-id="<?=$model->id?>" id="<?=$model->id?>" class="single_add_to_cart_button button alt add-to-cart " value="185" name="add-to-cart" type="submit">Savatga</a>
                    </form>
                    <!-- .cart -->
                    <a class="add-to-compare-link" href="compare.html">Taqqoslash</a>
                </div>
                <!-- .product-actions -->
            </div>
            <!-- .product-actions-wrapper -->
        </div>
        <!-- .entry-summary -->
    </div>
    <!-- .single-product-wrapper -->
    <div class="tm-related-products-carousel section-products-carousel" id="tm-related-products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#tm-related-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
        <section class="related">
            <header class="section-header">
                <h2 class="section-title">Tavfsiya qilingan tovarlar</h2>
                <nav class="custom-slick-nav"></nav>
            </header>
            <!-- .section-header -->
            <div class="products">
                <?php if (!empty($recomentProducts)): ?>
                    <?php foreach ($recomentProducts as $recomentProduct): ?>
                        <?php
                        $image = \common\components\StaticFunctions::getImage($recomentProduct , 'product' , 'image');
                        ?>
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist"> Istaklarga qo'shish</a>
                            </div>
                            <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $recomentProduct->slug])?>" class="woocommerce-LoopProduct-link">
                                <img src="<?=$image?>" width="224" height="197" class="wp-post-image" alt="">
                                <span class="price">
                                            <ins>
                                                <span class="amount"> </span>
                                            </ins>
                                            <span class="amount"><?=number_format($recomentProduct->price , '0' , ' ' , ' ')?> so'm</span>
                                        </span>
                                <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title"><?=$recomentProduct->name?></h2>
                            </a>
                            <div class="hover-area">
                                <a class="button add_to_cart_button" href="#" rel="nofollow">Savatga</a>
                                <a class="add-to-compare-link" href="#">Taqqoslash</a>
                            </div>
                        </div>
                        <!-- /.product-outer -->
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
        <!-- .single-product-wrapper -->
    </div>
    <!-- .tm-related-products-carousel -->
    <div class="woocommerce-tabs wc-tabs-wrapper">
        <ul role="tablist" class="nav tabs wc-tabs" id="tablist_view">
            <li class="nav-item description_tab">
                <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-description" href="#tab-description">Tovar haqida</a>
            </li>
            <li class="nav-item specification_tab">
                <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-specification" href="#tab-specification">Xususiyatlari</a>
            </li>
            <li class="nav-item reviews_tab">
                <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-reviews" href="#tab-reviews">Izohlar (<?=$model->commentCount?>)</a>
            </li>
        </ul>
        <!-- /.ec-tabs -->
        <div class="tab-content" id="tab_content_view">
            <div class="tab-pane panel wc-tab" id="tab-description" role="tabpanel">
                <?=$model->body?>
            </div>
            <div class="tab-pane" id="tab-specification" role="tabpanel">
                <div class="tm-shop-attributes-detail like-column columns-3">
                    <h3 class="tm-attributes-title">Xususiyatlari</h3>

                        <?php if ($model->chars): ?>
                            <?php foreach ($model->chars as $char): ?>
                                <div class="boxx d-flex align-items-center mb-2">
                                    <div class="attribute" style="font-size:15px;font-weight:500;"><?=$char->atttribute?></div>
                                    <span>..........................</span>
                                    <div class="value"><?=$char->value?></div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                </div>
                <!-- /.tm-shop-attributes-detail -->
            </div>
            <div class="tab-pane" id="tab-reviews" role="tabpanel">
                <div class="techmarket-advanced-reviews" id="reviews">
                    <div class="advanced-review row">
                        <div class="advanced-review-rating">
                            <h2 class="based-title">Izohlar (<?=$model->commentCount?>)</h2>
                            <div class="avg-rating">
                                <span class="avg-rating-number">5.0</span>
                                <div title="Rated 5.0 out of 5" class="star-rating">
                                    <span style="width:100%"></span>
                                </div>
                            </div>
                            <!-- /.avg-rating -->
                            <div class="rating-histogram">
                                <div class="rating-bar">
                                    <div title="Rated 5 out of 5" class="star-rating">
                                        <span style="width:100%"></span>
                                    </div>
                                    <div class="rating-count">1</div>
                                    <div class="rating-percentage-bar">
                                        <span class="rating-percentage" style="width:100%"></span>
                                    </div>
                                </div>
                                <div class="rating-bar">
                                    <div title="Rated 4 out of 5" class="star-rating">
                                        <span style="width:80%"></span>
                                    </div>
                                    <div class="rating-count zero">0</div>
                                    <div class="rating-percentage-bar">
                                        <span class="rating-percentage" style="width:0%"></span>
                                    </div>
                                </div>
                                <div class="rating-bar">
                                    <div title="Rated 3 out of 5" class="star-rating">
                                        <span style="width:60%"></span>
                                    </div>
                                    <div class="rating-count zero">0</div>
                                    <div class="rating-percentage-bar">
                                        <span class="rating-percentage" style="width:0%"></span>
                                    </div>
                                </div>
                                <div class="rating-bar">
                                    <div title="Rated 2 out of 5" class="star-rating">
                                        <span style="width:40%"></span>
                                    </div>
                                    <div class="rating-count zero">0</div>
                                    <div class="rating-percentage-bar">
                                        <span class="rating-percentage" style="width:0%"></span>
                                    </div>
                                </div>
                                <div class="rating-bar">
                                    <div title="Rated 1 out of 5" class="star-rating">
                                        <span style="width:20%"></span>
                                    </div>
                                    <div class="rating-count zero">0</div>
                                    <div class="rating-percentage-bar">
                                        <span class="rating-percentage" style="width:0%"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.rating-histogram -->
                        </div>
                        <!-- /.advanced-review-rating -->
                        <div class="advanced-review-comment">
                            <div id="review_form_wrapper">
                                <div id="review_form">
                                    <div class="comment-respond" id="respond">
                                        <h3 class="comment-reply-title" id="reply-title">Izoh qoldirish</h3>

                                            <?php $form = \yii\bootstrap5\ActiveForm::begin([
                                                    'id' => 'commentform',
                                                    'options' => [
                                                        'class'=> 'comment-form'
                                                    ]
                                            ]) ?>
                                            <div class="comment-form-rating">
                                                <label>Baholash</label>
                                                <p class="stars">
                                                    <span><a href="#" class="star-1">1</a><a href="#" class="star-2">2</a><a href="#" class="star-3">3</a><a href="#" class="star-4">4</a><a href="#" class="star-5">5</a></span>
                                                </p>
                                            </div>

                                            <p class="comment-form-author">
                                                <?=$form->field($comment , 'name')?>
                                            </p>
                                            <p class="comment-form-comment" style="width:100%;">
                                                <?=$form->field($comment , 'message')->textarea([
                                                    'rows' => '8',
                                                    'cols' => '45',
                                                    'id' => 'comment',
                                                    'options' => [
                                                        'class' => 'w-100'
                                                    ]

                                                ])?>
                                            </p>
                                            <p class="form-submit">
                                                <input type="submit" value="Add Review" class="submit" id="submit" name="submit">
                                                <input type="hidden" id="comment_post_ID" value="185" name="comment_post_ID">
                                                <input type="hidden" value="0" id="comment_parent" name="comment_parent">
                                            </p>
                                            <?php \yii\bootstrap5\ActiveForm::end() ?>
                                        <!-- /.comment-form -->
                                    </div>
                                    <!-- /.comment-respond -->
                                </div>
                                <!-- /#review_form -->
                            </div>
                            <!-- /#review_form_wrapper -->
                        </div>
                        <!-- /.advanced-review-comment -->
                    </div>
                    <!-- /.advanced-review -->
                    <div id="comments">
                        <ol class="commentlist">
                            <li id="li-comment-83" class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                <div class="comment_container" id="comment-83">
                                    <?php if (!empty($model->comments)): ?>
                                        <?php foreach ($model->comments as $commentItem): ?>
                                        <?php
//                                            $date = (int) date('m' , strtotime($commentItem->created_at));
//                                            $format = Yii::$app->params['month']['uz'][$date];
//                                            $dateFormat =  $format . ' ' . date('d' , strtotime($commentItem->created_at) . ' ,' . date('Y' , strtotime($commentItem->created_at)));
                                            ?>
                                            <div class="comment-text mb-3">
                                                <div class="star-rating">
                                                    <span style="width:100%">Reyting
                                                        <strong class="rating">5</strong> out of 5</span>
                                                </div>
                                                <p class="meta">
                                                    <strong itemprop="author" class="woocommerce-review__author"><?=$commentItem->name?></strong>
                                                    <span class="woocommerce-review__dash">&ndash;</span>
                                                    <time datetime="2017-06-21T08:05:40+00:00" itemprop="datePublished" class="woocommerce-review__published-date"><?=date('d.m.Y H:i' , strtotime($commentItem->created_at))?></time>
                                                </p>
                                                <div class="description">
                                                    <p><?=$commentItem->message?></p>
                                                </div>
                                                <!-- /.description -->
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <!-- /.comment-text -->
                                </div>
                                <!-- /.comment_container -->
                            </li>
                            <!-- /.comment -->
                        </ol>
                        <!-- /.commentlist -->
                    </div>
                    <!-- /#comments -->
                </div>
                <!-- /.techmarket-advanced-reviews -->
            </div>
        </div>
    </div>

</div>
<!-- .product -->

<script>
    document.querySelector("#tablist_view").firstElementChild.firstElementChild.classList.add('active')
    document.querySelector("#tab_content_view").firstElementChild.classList.add('active');
</script>
<style>
    .field-comment , .field-productcomment-name{
        width:100%;
    }

</style>