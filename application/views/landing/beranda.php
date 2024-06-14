    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="assets/landing/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Selamat Datang <br><strong class="text-dark">JeWePe Wedding Organizer</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Mengabadikan setiap momen pernikahan anda</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/landing/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                <p class="fs-4 text-white animated zoomIn">Selamat Datang <br><strong class="text-dark">JeWePe Wedding Organizer</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Mengabadikan setiap momen pernikahan anda</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Store Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Katalog Paket Pernikahan</p>
                <h1 class="display-6">Silahkan pilih paket pernikahan Anda</h1>
            </div>
            <div class="row g-4">
                <?php 
                foreach($getAllKatalog as $row):?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="<?= base_url('assets/files/katalog/') . $row->image ?> " alt="">
                        <div class="p-4">
                            <h4 class="mb-3"><?= $row->package_name; ?></h4>
                            <?= word_limiter(strip_tags($row->description), 10); ?>
                            <h4 class="text-primary">Rp. <?= number_format($row->price,2,',', ".")?></h4>
                        </div>
                        <div class="store-overlay">
                            <a href="<?= base_url('Beranda/detail?id=') . $row->catalogue_id?>" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">View More Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Store End -->
