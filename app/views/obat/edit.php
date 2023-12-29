<?php

use MyApp\Core\Message;

$data = Message::getData();

if ($data) {
    $obat['id_tmd'] = $data['id_tmd'];
    $obat['brand_tmd'] = $data['brand_tmd'];
    $obat['name_tmd'] = $data['name_tmd'];
    $obat['id_tmc'] = $data['id_tmc'];
    $obat['id_tmdu'] = $data['id_tmdu'];
    $obat['buy_tmd'] = $data['buy_tmd'];
    $obat['sale_tmd'] = $data['sale_tmd'];
    $obat['stock_drug_tmd'] = $data['stock_drug_tmd'];
    $obat['status_tmd'] = $data['status_tmd'];
    $obat['expired_date_tmd'] = $data['expired_date_tmd'];
}

Message::flash();
?>

<div class="container-fluid">
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
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
                            <form action="<?= BASEURL; ?>/obat/edit_obat" method="POST" class="form-sample" id="form">
                                <input type="hidden" name="id_tmd" value="<?= $obat['id_tmd'] ?>">
                                <input type="hidden" name="mode" id="mode">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="brand_tmd" class="col-sm-3 col-form-label">Brand</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="brand_tmd" class="form-control" id="brand_tmd" value="<?= $obat['brand_tmd'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="name_tmd" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name_tmd" class="form-control" id="name_tmd" value="<?= $obat['name_tmd'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="expired_date_tmd" class="col-sm-3 col-form-label">Expire</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="expired_date_tmd" class="form-control" id="expired_date_tmd" value="<?= $obat['expired_date_tmd'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="id_tmc" class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-md-9">
                                                <select id="id_tmc" name="id_tmc" class="form-select" required>
                                                    <option selected disabled></option>
                                                    <?php foreach ($categories as $category) : ?>
                                                        <option value="<?= $category['id_tmc']; ?>" <?php if ($obat['id_tmc'] == $category['id_tmc']) echo 'selected'; ?>>
                                                            <?= $category['name_tmc']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="id_tmdu" class="col-sm-3 col-form-label">Jenis</label>
                                            <div class="col-md-9">
                                                <select id="id_tmdu" name="id_tmdu" class="form-select" required>
                                                    <option selected disabled></option>
                                                    <?php foreach ($units as $unit) : ?>
                                                        <option value="<?= $unit['id_tmdu']; ?>" <?php if ($obat['id_tmdu'] == $unit['id_tmdu']) echo 'selected'; ?>>
                                                            <?= $unit['name_tmdu']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="status_tmd" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-md-9">
                                                <select id="status_tmd" name="status_tmd" class="form-select">
                                                    <option selected><?= $obat['status_tmd'] ?></option>
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
                                            <label for="buy_tmd" class="col-sm-3 col-form-label">Beli</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="buy_tmd" class="form-control" id="buy_tmd" value="<?= $obat['buy_tmd'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sale_tmd" class="col-sm-3 col-form-label">Jual</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="sale_tmd" class="form-control" id="sale_tmd" value="<?= $obat['sale_tmd'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="stock_drug_tmd" class="col-sm-3 col-form-label">Stok</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="stock_drug_tmd" class="form-control" id="stock_drug_tmd" value="<?= $obat['stock_drug_tmd'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" style="margin-right: 5px;"><a href="<?= BASEURL ?>/obat" style="color:white">
                                            <span><i class="ti ti-arrow-back"></i></span>
                                            <span class='hide-menu'>Back</span>
                                        </a></button>
                                    <button class="btn btn-success save-btn" type="submit" onclick="edit('update')" style="margin-right: 5px;">
                                        <span><i class='ti ti-edit'></i></span>
                                        <span class='hide-menu'>Update</span>
                                    </button>
                                    <button class='btn btn-danger' type="submit" onclick="edit('delete')">
                                        <span>
                                            <i class='ti ti-trash'></i>
                                        </span>
                                        <span class='hide-menu'>Delete</span>
                                    </button>
                                </div>
                            </form><!-- End Multi Columns Form -->
                        </div>
                    </div>
                </div>
            </div><!-- End Modal Dialog Scrollable-->
        </section>
    </main>
</div>