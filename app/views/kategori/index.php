<?php

use MyApp\Core\Message;

$data = Message::getData();
if ($data) {
    $id = $data['id_kategori'];
}
Message::flash();
?>

<div class="container-fluid">
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <!-- Start Ngoding Disini -->
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
                            <p>Data ini adalah data semua kategori di aplikasi <b>SIAGA</b>.</p>
                            <!-- Modal Dialog Scrollable -->
                            <button type="button" onclick="location.href='<?= BASEURL . '/kategori/insert' ?>'" class="btn btn-primary">
                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 4h6v6h-6zm10 0h6v6h-6zm-10 10h6v6h-6zm10 3h6m-3 -3v6" />
                                    </svg></i>
                                </span>
                                <span class="hide-menu">Add Kategori</span>
                            </button>
                            <div class="col-lg-12 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table id="example" class="stripe" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($kategori as $kategori) {
                                                        $no++; ?>
                                                        <tr>
                                                            <th scope='row'><?= $no ?></th>
                                                            <td><?= $kategori["name_tmc"]; ?></td>
                                                            <td>
                                                                <a href="<?= BASEURL; ?>/kategori/edit/<?= $kategori['id_tmc'] ?>" class='btn btn-warning'>
                                                                    <span><i class='ti ti-edit'></i></span>
                                                                    <span class='hide-menu'>Edit</span>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= BASEURL;?>/kategori/delete/<?= $kategori['id_tmc']?>" class='btn btn-danger'>
                                                                    <span><i class='ti ti-trash'></i></span>
                                                                    <span class='hide-menu'>Delete</span>
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