<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Obat extends Controller
{
    private $obatModel;

    public function __construct()
    {
        // Cek apakah pengguna sudah login
        if (!isset($_SESSION['id_tmu'])) {
            // Jika belum login, arahkan ke halaman login
            header('Location: ' . BASEURL . '');
            exit();
        }
        $this->obatModel = $this->model('MyApp\Models\ObatModel');
    }

    public function index()
    {
        $categoryModel = $this->model('MyApp\Models\KategoriModel');
        $unitModel = $this->model('MyApp\Models\UnitModel');

        $categoryData = $categoryModel->getAll(); // Adjust the method name based on your model
        $unitData = $unitModel->getAll(); // Adjust the method name based on your model

        $data = [
            'title' => 'Obat',
            'obat' => $this->obatModel->getAll(),
            'categories' => $categoryData,
            'units' => $unitData,
        ];
        $this->view('templates/header', $data);
        $this->view('obat/index', $data);
        $this->view('templates/footer-2');
    }

    public function insert()
    {
        $categoryModel = $this->model('MyApp\Models\KategoriModel');
        $unitModel = $this->model('MyApp\Models\UnitModel');

        $categoryData = $categoryModel->getAll(); // Adjust the method name based on your model
        $unitData = $unitModel->getAll(); // Adjust the method name based on your model
        $data = [
            'title' => 'Add Obat',
            'categories' => $categoryData,
            'units' => $unitData,
        ];

        $this->view('templates/header', $data);
        $this->view('obat/insert', $data);
        $this->view('templates/footer');
    }

    public function insert_obat()
    {
        $fields = [
            'id_tmc' => 'int | required',
            'id_tmdu' => 'int | required',
            'brand_tmd' => 'string | required',
            'name_tmd' => 'string | required',
            'buy_tmd' => 'string | required',
            'sale_tmd' => 'string | required',
            'expired_date_tmd' => 'string | required',
            'stock_drug_tmd' => 'string | required',

        ];
        $message = [
            'id_tmc' => [
                'required' => 'Kategori harus diisi!',
            ],
            'id_tmdu' => [
                'required' => 'Satuan harus diisi!',
            ],
            'brand_tmd' => [
                'required' => 'Merk harus diisi!',
            ],
            'name_tmd' => [
                'required' => 'Nama harus diisi!',
            ],
            'buy_tmd' => [
                'required' => 'Beli harus diisi!',
            ],
            'sale_tmd' => [
                'required' => 'Jual harus diisi!',
            ],
            'expired_date_tmd' => [
                'required' => 'Expire harus diisi!',
            ],
            'stock_drug_tmd' => [
                'required' => 'Stock harus diisi!',
            ],
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        $proc = $this->obatModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil !', 'Data obat berhasil ditambahkan');
            $this->redirect('obat');
        }
    }

    public function edit($id_tmd)
    {
        $categoryModel = $this->model('MyApp\Models\KategoriModel');
        $unitModel = $this->model('MyApp\Models\UnitModel');

        $categoryData = $categoryModel->getAll(); // Adjust the method name based on your model
        $unitData = $unitModel->getAll(); // Adjust the method name based on your model
        $data = [
            'title' => 'Edit Obat',
            'obat' => $this->obatModel->getById($id_tmd),
            'categories' => $categoryData,
            'units' => $unitData,
        ];

        $this->view('templates/header', $data);
        $this->view('obat/edit', $data); // Sesuaikan dengan template yang digunakan
        $this->view('templates/footer');
    }

    public function edit_obat()
    {
        $fields = [
            'brand_tmd' => 'string | required',
            'name_tmd' => 'string | required',
            'id_tmc' => 'int | required',
            'id_tmdu' => 'int | required',
            'buy_tmd' => 'float | required',
            'sale_tmd' => 'float | required',
            'stock_drug_tmd' => 'int | required',
            'status_tmd' => 'string | required',
            'expired_date_tmd' => 'string | required',
            'id_tmd' => 'string',
            'mode' => 'string', // Add mode field for update or delete
        ];
        $message = [
            'brand_tmd' => [
                'required' => 'Merk harus diisi!',
            ],
            'name_tmd' => [
                'required' => 'Nama harus diisi!',
            ],
            'id_tmc' => [
                'required' => 'Kategori harus diisi!',
            ],
            'id_tmdu' => [
                'required' => 'Satuan harus diisi!',
            ],
            'buy_tmd' => [
                'required' => 'Beli harus diisi!',
            ],
            'sale_tmd' => [
                'required' => 'Jual harus diisi!',
            ],
            'stock_drug_tmd' => [
                'required' => 'Stok harus diisi!',
            ],
            'status_tmd' => [
                'required' => 'Status harus diisi!',
            ],
            'expired_date_tmd' => [
                'required' => 'Expire harus diisi!',
            ],
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        // if ($errors) {
        //     Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
        //     $this->redirect('obat/edit/' . $inputs['id_obat']);
        // }

        if ($inputs['mode'] == 'update') {
            $proc = $this->obatModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Berhasil !', 'Data obat berhasil diubah');
                $this->redirect('obat');
            } else {
                Message::setFlash('error', 'Gagal !', 'Gagal mengubah data obat');
                $this->redirect('obat/edit/' . $inputs['id_tmd']);
            }
        } elseif ($inputs['mode'] == 'delete') {
            $proc = $this->obatModel->delete($inputs['id_tmd']);
            if ($proc) {
                Message::setFlash('success', 'Berhasil !', 'Data obat berhasil dihapus');
                $this->redirect('obat');
            } else {
                Message::setFlash('error', 'Gagal !', 'Gagal menghapus data obat');
                $this->redirect('obat/edit/' . $inputs['id_tmd']);
            }
        }
    }

    public function import_obat()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $uploadedFile = $_FILES['file'];

            // Pastikan file yang diunggah adalah file Excel
            $allowedExtensions = ['xls', 'xlsx'];
            $fileExtension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                $excelData = $this->readExcelData($uploadedFile['tmp_name']);
                if ($excelData) {
                    $this->obatModel->importDataFromExcel($excelData);
                    Message::setFlash('success', 'Berhasil !', 'Data obat berhasil diimpor dari file Excel');
                    $this->redirect('obat');
                } else {
                    Message::setFlash('error', 'Gagal !', 'Gagal membaca data dari file Excel');
                    $this->redirect('obat');
                }
            } else {
                Message::setFlash('error', 'Gagal !', 'Format file tidak didukung. Hanya file Excel yang diizinkan (xls, xlsx)');
                $this->redirect('obat');
            }
        } else {
            Message::setFlash('error', 'Gagal !', 'File tidak ditemukan');
            $this->redirect('obat');
        }
    }

    private function readExcelData($filePath)
    {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        $excelData = [];
        for ($row = 1; $row <= $highestRow; ++$row) {
            $rowData = [];
            for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                $cellValue = $sheet->getCellByColumnAndRow($col, $row)->getValue();
                $rowData[] = $cellValue;
            }
            $excelData[] = $rowData;
        }

        return json_encode($excelData);
    }
}
