<?php

use MyApp\Core\Message;

$data = Message::getData();
$brand_tmd = "";
$name_tmd = "";
$buy_tmd = "";
$sale_tmd = "";
$stock_drug_tmd = "";
$expired_date_tmd = "";
$status_tmd = "";

if ($data) {
    $brand_tmd = $data['brand_tmd'];
    $name_tmd = $data['name_tmd'];
    $buy_tmd = $data['buy_tmd'];
    $sale_tmd = $data['sale_tmd'];
    $stock_drug_tmd = $data['stock_drug_tmd'];
    $expired_date_tmd = $data['expired_date_tmd'];
    $status_tmd = $data['status_tmd'];
}

Message::flash();
?>

<div class="container-fluid">
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pagetitle">
                                <h1><?= $title ?></h1>
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/home">Home</a></li>
                                        <li class="breadcrumb-item active">Master Data</li>
                                    </ol>
                                </nav>
                            </div><!-- End Page Title -->
                            <!-- Multi Columns Form -->
                            <form class="form-sample" action="<?= BASEURL; ?>/user/insert_obat" method="POST" id="form">
                                <input type="hidden" name="id_tmu" value="<?= $id_tmu ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="brand_tmd" class="col-sm-3 col-form-label">Brand</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="brand_tmd" class="form-control" id="brand_tmd" value="<?= $brand_tmd ?>" placeholder="Brand" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="name_tmd" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name_tmd" class="form-control" id="name_tmd" aria-describedby="inputGroupPrepend" value="<?= $name_tmd ?>" placeholder="Nama" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="expired_date_tmd" class="col-sm-3 col-form-label">Expire</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="expired_date_tmd" class="form-control" id="expired_date_tmd" value="<?= $expired_date_tmd ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="id_tmc" class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-sm-9">
                                                <select id="id_tmc" name="id_tmc" class="form-select" required>
                                                    <option selected disabled>Pilih...</option>
                                                    <?php foreach ($categories as $category) : ?>
                                                        <option value="<?= $category['id_tmc']; ?>"><?= $category['name_tmc']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="id_tmdu" class="col-sm-3 col-form-label">Jenis</label>
                                            <div class="col-sm-9">
                                                <select id="id_tmdu" name="id_tmdu" class="form-select" required>
                                                    <option selected disabled>Pilih...</option>
                                                    <?php foreach ($units as $unit) : ?>
                                                        <option value="<?= $unit['id_tmdu']; ?>"><?= $unit['name_tmdu']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="status_tmd" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select id="status_tmd" name="status_tmd" class="form-select">
                                                    <option selected>Pilih...<?= $status_tmd ?></option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="buy_tmd" class="col-sm-3 col-form-label">Harga Beli</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="buy_tmd" class="form-control" id="buy_tmd" placeholder="0" value="<?= $buy_tmd ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sale_tmd" class="col-sm-3 col-form-label">Harga Jual</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="sale_tmd" class="form-control" id="sale_tmd" placeholder="0" value="<?= $sale_tmd ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="stock_drug_tmd" class="col-sm-3 col-form-label">Stok</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="stock_drug_tmd" class="form-control" id="stock_drug_tmd" placeholder="0" value="<?= $stock_drug_tmd ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="footer">
                                    <button class="btn btn-primary save-btn" id=saveButton type="submit">
                                        <span><i class="ti ti-device-floppy"></i></span>
                                        <span class="hide-menu">Save</span>
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: 5px;"><a href="<?= BASEURL ?>/obat" style="color:white">
                                            <span><i class="ti ti-square-x"></i></span>
                                            <span class="hide-menu">Cancel</span></a>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>