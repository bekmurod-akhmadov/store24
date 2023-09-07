<?php
$this->title = 'Barcha tovarlar';
?>
<nav class="woocommerce-breadcrumb mb-0">
    <a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <i class="tm tm-breadcrumbs-arrow-right"></i>
    <span class="delimiter">
        <span style="font-size:15px;font-weight: 500;">Barcha tovarlar</span>
    </span>
</nav>

<!-- .shop-archive-header -->
<div class="shop-control-bar">
    <div class="handheld-sidebar-toggle">
        <button type="button" class="btn sidebar-toggler">
            <i class="fa fa-sliders"></i>
            <span>Filters</span>
        </button>
    </div>
    <!-- .handheld-sidebar-toggle -->
    <ul role="tablist" class="shop-view-switcher nav nav-tabs" id="tablist">
        <li class="nav-item">
            <a href="#grid-extended" title="Grid Extended View" data-toggle="tab" class="nav-link ">
                <i class="tm tm-grid"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="#list-view-large" title="List View Large" data-toggle="tab" class="nav-link ">
                <i class="tm tm-listing-large"></i>
            </a>
        </li>
    </ul>
    <!-- .shop-view-switcher -->
    <!--    <form class="form-techmarket-wc-ppp" method="POST">-->
    <!--        <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp">-->
    <!--            <option value="20">Show 20</option>-->
    <!--            <option value="40">Show 40</option>-->
    <!--            <option value="-1">Show All</option>-->
    <!--        </select>-->
    <!--        <input type="hidden" value="5" name="shop_columns">-->
    <!--        <input type="hidden" value="15" name="shop_per_page">-->
    <!--        <input type="hidden" value="right-sidebar" name="shop_layout">-->
    <!--    </form>-->
    <!-- .form-techmarket-wc-ppp -->
    <!-- .woocommerce-ordering -->
    <nav class="techmarket-advanced-pagination">
        <form class="form-adv-pagination" method="post">
            <input type="number" value="1" class="form-control" step="1" max="5" min="1" size="2" id="goto-page">
        </form> of 5<a href="#" class="next page-numbers">→</a>
    </nav>
    <!-- .techmarket-advanced-pagination -->
</div>
<!-- .shop-control-bar -->
<div class="tab-content" id="tab_content">
    <div id="grid-extended" class="tab-pane" role="tabpanel">
        <div class="woocommerce columns-5">

            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_category',
                'options' => ['class' => 'products' , 'id' => 'prducts_block'], // Удаляем класс list-view
                'layout' => "{items}\n{summary}\n{pager}",
                'itemOptions' => function ($model, $key, $index, $widget) {
                    return ['class' => 'product first']; // Указываем класс элемента и убираем атрибут data-key
                },
                'summaryOptions' => ['class' => 'summary mt-4'],
                'pager' => [
                    'options' => ['class' => 'page-numbers mt-4'], // Добавьте класс к пагинации
                    'linkOptions' => ['class' => 'page-numbers current'],
                ],
            ])
            ?>
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .tab-pane -->
    <div id="list-view-large" class="tab-pane" role="tabpanel">
        <div class="woocommerce columns-1">
            <div class="products">

                <?= \yii\widgets\ListView::widget([
                    'dataProvider' => $dataProviderGrid,
                    'itemView' => '_grid',
                    'options' => ['class' => 'products' , 'id' => 'prducts_block'], // Удаляем класс list-view
                    'layout' => "{items}\n{summary}\n{pager}",
                    'itemOptions' => function ($model, $key, $index, $widget) {
                        return ['class' => 'product list-view-large first']; // Указываем класс элемента и убираем атрибут data-key
                    },
                    'summaryOptions' => ['class' => 'summary mt-4'],
                    'pager' => [
                        'options' => ['class' => 'page-numbers mt-4'], // Добавьте класс к пагинации
                        'linkOptions' => ['class' => 'page-numbers current'],
                    ],
                ])
                ?>

            </div>
            <!-- .products -->
        </div>
        <!-- .woocommerce -->
    </div>

</div>
<!-- .tab-content -->
<div class="shop-control-bar-bottom">

    <nav class="woocommerce-pagination">
        <ul class="page-numbers">
            <li>
                <span class="page-numbers current">1</span>
            </li>
            <li><a href="#" class="page-numbers">2</a></li>
            <li><a href="#" class="page-numbers">3</a></li>
            <li><a href="#" class="page-numbers">4</a></li>
            <li><a href="#" class="page-numbers">5</a></li>
            <li><a href="#" class="next page-numbers">→</a></li>
        </ul>
        <!-- .page-numbers -->
    </nav>
    <!-- .woocommerce-pagination -->
</div>
<!-- .shop-control-bar-bottom -->

<script>
    document.querySelector("#tablist").firstElementChild.firstElementChild.classList.add('active');
    document.querySelector("#tab_content").firstElementChild.classList.add('active');
</script>