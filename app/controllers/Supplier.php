<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class Supplier extends Controller
{
    private $supplierModel;

    public function __construct()
    {

        if (!isset($_SESSION['id_tmu'])) {
            header('Location: ' . BASEURL . '');
            exit();
        }
        $this->supplierModel = $this->model('MyApp\Models\SupplierModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Supplier',
            'supplier' => $this->supplierModel->getAll(),
        ];
        $this->view('templates/header', $data);
        $this->view('supplier/index', $data);
        $this->view('templates/footer-2');
    }

    public function insert()
    {
        $data = [
            'title' => 'Add Supplier',
        ];
        $this->view('templates/header', $data);
        $this->view('supplier/insert', $data);
        $this->view('templates/footer');
    }

    public function insert_supplier()
    {
        $fields = [
            'name_tms' => 'string | required',
            'city_tms' => 'string | required',
            'contact_tms' => 'string | required',
            'email_tms' => 'string | required',
            'address_tms' => 'string | required',
        ];
        $message = [
            'name_tms' => [
                'required' => 'Nama harus diisi!',
            ],
            'city_tms' => [
                'required' => 'Kota harus diisi!',
            ],
            'contact_tms' => [
                'required' => 'Kontak harus diisi!',
            ],
            'email_tms' => [
                'required' => 'Email harus diisi!',
            ],
            'address_tms' => [
                'required' => 'Alamat harus diisi!',
            ]
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);
        $proc = $this->supplierModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil!', 'Data supplier berhasil ditambahkan');
            $this->redirect('supplier');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit supplier',
            'supplier' => $this->supplierModel->getById($id),
        ];
        $this->view('templates/header', $data);
        $this->view('supplier/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_supplier()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $fields = [
            'name_tms' => 'string | required',
            'city_tms' => 'string | required',
            'contact_tms' => 'string | required',
            'email_tms' => 'string | required',
            'address_tms' => 'string | required',
            'id_tms' => 'int',
            'mode' => 'string',
        ];
        $message = [
            'name_tms' => [
                'required' => 'Nama harus diisi!',
            ],
            'city_tms' => [
                'required' => 'Kota harus diisi!',
            ],
            'contact_tms' => [
                'required' => 'Kontak harus diisi!',
            ],
            'email_tms' => [
                'required' => 'Email harus diisi!',
            ],
            'address_tms' => [
                'required' => 'Alamat harus diisi!',
            ],
            'mode' => [
                'required' => 'Mode harus diisi!',
            ],
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);
        

        if ($inputs['mode'] == 'update') {
            $proc = $this->supplierModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Berhasil!', 'Data supplier berhasil diubah');
                $this->redirect('supplier');
            } else {
                Message::setFlash('error', 'Gagal!', 'Gagal mengubah data supplier');
                $this->redirect('supplier/edit/' . $inputs['id_tms']);
            }
        } elseif ($inputs['mode'] == 'delete') {
            $proc = $this->supplierModel->delete($inputs['id_tms']);
            if ($proc) {
                Message::setFlash('success', 'Berhasil!', 'Data supplier berhasil dihapus');
                $this->redirect('supplier');
            } else {
                Message::setFlash('error', 'Gagal!', 'Gagal menghapus data supplier');
                $this->redirect('supplier/edit/' . $inputs['id_tms']);
            }
        }
    }
}
