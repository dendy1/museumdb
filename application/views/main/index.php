<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h6 class="text-white pb-20"><?php echo date_format(date_create($close_exhibition['start_date']), "d.m.Y H:i"); ?> &#8212; <?php echo date_format(date_create($close_exhibition['end_date']), "d.m.Y H:i"); ?></h6>
                <h1 class="text-white">
                    <?php echo $close_exhibition['name']; ?>
                </h1>
                <p class="pt-10 pb-10 text-white">
                    <?php echo $close_exhibition['description']; ?>
                </p>
                <p class="pb-30 text-white">
                    <?php echo $close_exhibition['country']. ', ' . $close_exhibition['town']. ', ' . $close_exhibition['place']; ?>
                </p>
                <a href="/exhibition/<?php echo $close_exhibition['exhibition_id']; ?>" class="primary-btn text-uppercase">Полная информация</a>
            </div>
        </div>
    </div>
</section>


<section class="exibition-area section-gap" id="exhibitions">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Выставки</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-exibition-carusel">
                <?php foreach ($ongoing_exhibitions as $exhibition): ?>
                    <div class="card text-center">
                        <a href="/exhibition/<?php echo $exhibition['exhibition_id']; ?>">
                            <div class="card-header">
                                <img
                                     src="/public/img/exhibitions/<?php echo $exhibition['exhibition_id']; ?>.jpg"
                                     onerror="this.src='/public/img/exhibitions/exhibition.png'">
                            </div>
                        </a>
                        <div class="card-body justify-content-center">
                            <h3 class="card-title">
                                <?php echo $exhibition['name']; ?>
                            </h3>
                            <p class="card-text">
                                <?php echo $exhibition['description']; ?>
                            </p>
                            <p class="card-text">
                                <?php echo $exhibition['country']. ', ' . $exhibition['town']. ', ' . $exhibition['place']; ?>
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            <?php echo date_format(date_create($exhibition['start_date']), "d.m.Y H:i"); ?> &#8212; <?php echo date_format(date_create($exhibition['end_date']), "d.m.Y H:i"); ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- End exibition Area -->

<!-- Start gallery Area ГАЛЕРЕЯ ЭКСПОНАТОВ-->
<section class="gallery-area section-gap" id="gallery">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10 text-white">Галерея экспонатов</h1>
                </div>
            </div>
        </div>
        <div id="grid-container" class="row">
            <?php foreach ($exhibits as $exhibit): ?>
                <a class="single-gallery" href="/exhibit/<?php echo $exhibit["id"]; ?>">
                    <div class="container">
                        <img class="grid-item" src="/public/img/exhibits/<?php echo $exhibit["exhibit_id"]; ?>.jpg" onerror="this.src='/public/img/exhibits/exhibit.png'">
                        <div class="centered"><?php echo $exhibit["name"]; ?></div>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</section>