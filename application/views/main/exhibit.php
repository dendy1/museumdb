<!-- start banner Area БАННЕР БЛИЖАЙШАЯ ВЫСТАВКА-->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-8">
                <h1 class="text-white">
                    <?php echo $exhibit['name']; ?>
                </h1>
                <h3 class="pt-20 pb-20 text-white">
                    <?php echo $exhibit['description']; ?>
                </h3>
                <h4 class="pb-60 text-white">
                    <?php echo $exhibit['author']; ?>
                </h4>


                <a href="/category/<?php echo $exhibit['category_id']; ?>">
                    <h2 class="text-white">
                        <?php echo $exhibit['category']; ?>
                    </h2>
                </a>
                <h4 class="pt-20 pb-20 text-white">
                    <?php echo $exhibit['category_description']; ?>
                </h4>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start exibition Area ВЫСТАВКИ-->
<section class="exibition-area section-gap" id="exhibitions">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Экспонат доступен на следующих выставках</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-exibition-carusel">
                <?php foreach ($exhibitions as $exhibition): ?>
                    <div class="single-exibition item">
                        <a href="/exhibition/<?php echo $exhibition['exhibition_id']; ?>">
                            <img src="../../../public/img/e1.jpg" alt="">
                            <h4><?php echo $exhibition['name']; ?></h4>
                        </a>
                        <p><?php echo $exhibition['description']; ?></p>
                        <h6 class="date">
                            <?php echo date_format(date_create($exhibition['start_date']), "d.m.Y H:i"); ?> &#8212; <?php echo date_format(date_create($exhibition['end_date']), "d.m.Y H:i"); ?>
                        </h6>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- End exibition Area -->