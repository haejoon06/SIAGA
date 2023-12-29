<?php

use MyApp\Core\Message;

$data = Message::getData();

if ($data) {
    $supplier['id_tms'] = $data['id_tms'];
    $supplier['name_tms'] = $data['name_tms'];
    $supplier['city_tms'] = $data['city_tms'];
    $supplier['contact_tms'] = $data['contact_tms'];
    $supplier['email_tms'] = $data['email_tms'];
    $supplier['address_tms'] = $data['address_tms'];
    
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
                            <form action="<?= BASEURL; ?>/supplier/edit_supplier" method="POST" class="row g-3" id="form">
                                <input type="hidden" name="id_tms" value="<?= $supplier['id_tms'] ?>">
                                <input type="hidden" name="mode" id="mode" value="update">
                                <div class="col-md-6">
                                    <label for="name_tms" class="form-label">Nama Supplier</label>
                                    <input type="text" name="name_tms" class="form-control" id="name_tms" value="<?= $supplier['name_tms'] ?>" required>

                                </div>
                                <div class="col-md-6">

                                    <label for="city_tms" class="form-label">Kota</label>
                                    <input type="text" name="city_tms" class="form-control" id="city_tms" value="<?= $supplier['city_tms'] ?>" required>
                                </div>
                                <div class="col-md-6">

                                    <label for="contact_tms" class="form-label">Contact</label>
                                    <input type="text" name="contact_tms" class="form-control" id="contact_tms" value="<?= $supplier['contact_tms'] ?>" required>
                                </div>
                                <div class="col-md-6">

                                    <label for="email_tms" class="form-label">Email</label>
                                    <input type="email" name="email_tms" class="form-control" id="email_tms" value="<?= $supplier['email_tms'] ?>" required>
                                </div>
                                <div class="col-md-12">

                                    <label for="address_tms" class="form-label">Alamat</label>
                                    <input type="text" name="address_tms" class="form-control" id="address_tms" value="<?= $supplier['address_tms'] ?>" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" style="margin-right: 5px;"><a href="<?= BASEURL ?>/supplier" style="color:white">
                                            <span><i class="ti ti-arrow-back"></i></span>
                                            <span class='hide-menu'>Back</span>
                                        </a></button>
                                    <button class="btn btn-success save-btn" type="submit" style="margin-right: 5px;">
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