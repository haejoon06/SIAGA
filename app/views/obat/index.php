<?php

use MyApp\Core\Message;

$data = Message::getData();
if ($data) {
    $id = $data['id_tmd'];
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
                            </div>
                            <p>Data ini adalah data semua obat di aplikasi <b>SIAGA</b>.</p>
                            <!-- Form Table -->
                            <button type="button" onclick="location.href='<?= BASEURL . '/obat/insert' ?>'" class="btn btn-primary">
                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                        <path d="M15 12h-6" />
                                        <path d="M12 9v6" />
                                    </svg></i>
                                </span>
                                <span class="hide-menu">Add Obat</span>
                            </button>
                            <button type="button" onclick="location.href='<?= BASEURL . '/opname/insert' ?>'" class="btn btn-success" style="margin-left: 3px;">
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
                            </button>
                            <button type="button" class="btn btn-danger delete-selected-btn" style="display: none; margin-left: 2px;" >
                                <a onclick="deleteSelected()" style="color:white">
                                    <span><i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg></i></span>
                                    <span class='hide-menu'>Delete Selected</span>
                                </a>
                            </button>
                            <div class="col-lg-12 d-flex align-items-stretch">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table id="example" class="stripe" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>No</th>
                                                    <th>Brand</th>
                                                    <th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Jenis</th>
                                                    <th>Beli</th>
                                                    <th>Jual</th>
                                                    <th>Stok</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($obat as $item) {
                                                    $no++;
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox" class="checkbox" data-id="<?= $item['id_tmd']; ?>"></td>
                                                        <th scope='row'><?= $no ?></th>
                                                        <td><?= $item["brand_tmd"]; ?></td>
                                                        <td><?= $item["name_tmd"]; ?></td>
                                                        <?php
                                                        // Find the corresponding category based on the ID
                                                        $matchingCategory = array_filter($categories, function ($category) use ($item) {
                                                            return $category["id_tmc"] == $item["id_tmc"];
                                                        });
                                                        $matchingCategory = reset($matchingCategory); // Get the first matching category
                                                        // Display the category name
                                                        ?>
                                                        <td><?= isset($matchingCategory["name_tmc"]) ? $matchingCategory["name_tmc"] : ''; ?></td>
                                                        <?php
                                                        // Find the corresponding unit based on the ID
                                                        $matchingUnit = array_filter($units, function ($unit) use ($item) {
                                                            return $unit["id_tmdu"] == $item["id_tmdu"];
                                                        });
                                                        $matchingUnit = reset($matchingUnit); // Get the first matching unit
                                                        // Display the unit name
                                                        ?>
                                                        <td><?= isset($matchingUnit["name_tmdu"]) ? $matchingUnit["name_tmdu"] : ''; ?></td>
                                                        <td><?= $item["buy_tmd"]; ?></td>
                                                        <td><?= $item["sale_tmd"]; ?></td>
                                                        <td><?= $item["stock_drug_tmd"]; ?></td>
                                                        <td><?= $item["status_tmd"]; ?></td>
                                                        <td>
                                                            <a href="<?= BASEURL; ?>/obat/edit/<?= $item['id_tmd'] ?>" class='btn btn-warning rounded-1'>
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
        </section>
    </main>
</div>

<script>
    function deleteSelected() {
        const checkedCheckboxes = document.querySelectorAll('.checkbox:checked');

        if (checkedCheckboxes.length > 0) {
            const selectedIds = Array.from(checkedCheckboxes).map((checkbox) => checkbox.dataset.id);

            window.location.href = '<?= BASEURL; ?>/user/delete_obat/' + selectedIds.join(',');
        } else {
            alert('Pilih setidaknya satu item untuk dihapus.');
        }
    }
</script>