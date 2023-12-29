<?php

use MyApp\Core\Message;

$data = Message::getData();
if ($data) {
    $id = $data['id_tms'];
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
                            <p>Data ini adalah data semua supplier aplikasi <b>SIAGA</b>.</p>
                            <button type="button" onclick="location.href='<?= BASEURL . '/supplier/insert' ?>'" class="btn btn-primary">
                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                        <path d="M15 12h-6" />
                                        <path d="M12 9v6" />
                                    </svg></i>
                                </span>
                                <span class="hide-menu">Tambah Supplier</span>
                            </button>
                            <div class="col-lg-12 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table id="example" class="stripe" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>City</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($supplier as $supplier) {
                                                        $no++; ?>
                                                        <tr>
                                                            <th scope='row'><?= $no ?></th>
                                                            <td><?= $supplier["name_tms"]; ?></td>
                                                            <td><?= $supplier["city_tms"]; ?></td>
                                                            <td><?= $supplier["contact_tms"]; ?></td>
                                                            <td><?= $supplier["email_tms"]; ?></td>
                                                            <td><?= $supplier["address_tms"]; ?></td>
                                                            <td>
                                                                <a href="<?= BASEURL; ?>/supplier/edit/<?= $supplier['id_tms'] ?>" class='btn btn-warning'>
                                                                    <span>
                                                                        <i class='ti ti-edit'></i>
                                                                    </span>
                                                                    <span class='hide-menu'>Edit
                                                                    </span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>