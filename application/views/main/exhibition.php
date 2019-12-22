<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-8">
                <h1 class="text-white">
                    <?php echo $exhibition['name']; ?>
                </h1>
                <h3 class="pt-20 pb-20 text-white">
                    <?php echo $exhibition['description']; ?>
                </h3>
                <h4 class="pb-60 text-white">
                    <?php echo $exhibition['country']. ', ' . $exhibition['town']. ', ' . $exhibition['place']; ?>
                </h4>
                <h3 class="date text-white">
                    <?php echo date_format(date_create($exhibition['start_date']), "d.m.Y H:i"); ?> &#8212; <?php echo date_format(date_create($exhibition['end_date']), "d.m.Y H:i"); ?>
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
                    <h1 class="mb-10">Экспонаты на выставке</h1>
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