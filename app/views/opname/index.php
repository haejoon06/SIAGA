#index

<?php

use MyApp\Core\Message;

$data = Message::getData();
if ($data) {
    $id = $data['id_tso'];
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
                                        <li class="breadcrumb-item active">Stok</li>
                                    </ol>
                                </nav>
                            </div><!-- End Page Title -->
                            <p>Data ini adalah data stock opname obat di aplikasi <b>SIAGA</b>.</p>
                            <!-- Modal Dialog Scrollable -->
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><button type="button" onclick="location.href='<?= BASEURL . '/opname/insert' ?>'" class="btn btn-primary">
                                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                        <path d="M9 12l.01 0" />
                                                        <path d="M13 12l2 0" />
                                                        <path d="M9 16l.01 0" />
                                                        <path d="M13 16l2 0" />
                                                    </svg></i>
                                                </span>
                                                <span class="hide-menu">Tambah Opname</span>
                                            </button></td>
                                        <td><button type="button" onclick="location.href='<?= BASEURL . '/opname/insert' ?>'" class="btn btn-success" style="margin-left: 5px;">
                                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                        <path d="M8 11h8v7h-8z" />
                                                        <path d="M8 15h8" />
                                                        <path d="M11 11v7" />
                                                    </svg></i>
                                                </span>
                                                <span class="hide-menu">Import Excel</span>
                                            </button></td>
                                        <!-- <td>
                                            <button class="btn btn-secondary custom-button">
                                                <label for="myFile" class="custom-file-upload">
                                                    <i class="fa fa-cloud-upload"></i> Choose a File
                                                </label>
                                                <input type="file" id="myFile" name="filename">
                                                <br>
                                                <input type="submit" value="Upload">
                                            </button>
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <!--  Form input file excel -->
                            <div class="col-lg-12 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table id="example" class="stripe" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Brand</th>
                                                        <th>Obat</th>
                                                        <th>Stok</th>
                                                        <th>Real</th>
                                                        <th>Selisih</th>
                                                        <th>Deskripsi</th>
                                                        <th>Tanggal</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($opname as $item) {
                                                        $no++;
                                                    ?>
                                                        <tr>
                                                            <th scope='row'><?= $no ?></th>
                                                            <?php
                                                            // Find the corresponding category based on the ID
                                                            $matchingObat = array_filter($obat, function ($obat) use ($item) {
                                                                return $obat["id_tmd"] == $item["id_tmd"];
                                                            });
                                                            $matchingObat = reset($matchingObat); // Get the first matching category
                                                            // Display the category name
                                                            ?>
                                                            <td><?= isset($matchingObat["brand_tmd"]) ? $matchingObat["brand_tmd"] : ''; ?></td>
                                                            <td><?= isset($matchingObat["name_tmd"]) ? $matchingObat["name_tmd"] : ''; ?></td>
                                                            <td><?= $item["stock_tso"]; ?></td>
                                                            <td><?= $item["real_tso"]; ?></td>
                                                            <td><?= $item["difference_tso"]; ?></td>
                                                            <td><?= $item["description_tso"]; ?></td>
                                                            <td><?= $item["time_tso"]; ?></td>
                                                            <td>
                                                                <a href="<?= BASEURL; ?>/opname/edit/<?= $item['id_tso'] ?>" class='btn btn-warning'>
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