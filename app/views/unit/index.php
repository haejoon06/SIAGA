<?php

use MyApp\Core\Message;

$data = Message::getData();
if ($data) {
    $id = $data['id_tmdu'];
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
                            <p>Data ini adalah data semua Jenis Obat di aplikasi <b>SIAGA</b>.</p>
                            <!-- Modal Dialog Scrollable -->
                            <button type="button" onclick="location.href='<?= BASEURL . '/unit/insert' ?>'" class="btn btn-primary">
                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M13 5h8" />
                                        <path d="M13 9h5" />
                                        <path d="M13 15h8" />
                                        <path d="M13 19h5" />
                                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    </svg></i>
                                </span>
                                <span class="hide-menu">Add Jenis</span>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($unit as $unit) {
                                                        $no++; ?>
                                                        <tr>
                                                            <th scope='row'><?= $no ?></th>
                                                            <td><?= $unit["name_tmdu"]; ?></td>
                                                            <td>
                                                                <a href="<?= BASEURL; ?>/unit/edit/<?= $unit['id_tmdu'] ?>" class='btn btn-warning' style="margin-left:75%">
                                                                    <span><i class='ti ti-edit'></i></span>
                                                                    <span class='hide-menu'>Edit</span>
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