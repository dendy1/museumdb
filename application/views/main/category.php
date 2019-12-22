<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-8">
                <h1 class="text-white">
                    <?php echo $category['category']; ?>
                </h1>
                <h3 class="pt-20 pb-20 text-white">
                    <?php echo $category['category_description']; ?>
                </h3>
            </div>
        </div>
    </div>
</section>


<section class="exibition-area section-gap" id="exhibitions">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Экспонаты данного тематического раздела</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-exibition-carusel">
                <?php foreach ($exhibits as $exhibit): ?>
                    <div class="single-exibition item">
                        <a href="/exhibit/<?php echo $exhibit['exhibit_id']; ?>">
                            <img src="../../../public/img/e1.jpg" alt="">
                            <h4><?php echo $exhibit['name']; ?></h4>
                        </a>
                        <p><?php echo $exhibit['description']; ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>