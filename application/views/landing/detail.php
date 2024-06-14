
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Detail Paket</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url('')?>">Home</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Article Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <img src="<?= base_url('assets/files/katalog/') . $katalog->image; ?>" alt="" class="img-fluid">
            </div>
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                <div class="section-title">
                    <p class="fs-5 fw-medium fst-italic text-primary">JeWePe Wedding Organizer</p>
                    <h1 class="display-6"><?= $katalog->package_name;?></h1>
                </div>
                <?= $katalog->description; ?>
                <h3 class="text-primary">Rp. <?= number_format($katalog->price, 2, ",", "."); ?></h3>
            </div>

            <div class="col-lg-7 ms-auto wow fadeInUp" data-wow-delay="0.1s">
                <h4 class="mb-4">Tertarik Paket Ini? Yuk langsung pesan!</h4>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="Nama Anda">
                            <label for="name">Nama Anda</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Email Anda">
                            <label for="email">Email Anda</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="email" placeholder="No. Handphone Anda">
                            <label for="email">No. Handphone Anda</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="subject" placeholder="Tanggal Pernikahan">
                            <label for="subject">Tanggal Pernikahan</label>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Pesan Paket</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>