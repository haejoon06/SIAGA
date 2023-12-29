<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class Kategori extends Controller
{
    private $kategoriModel;

    public function __construct()
    {
        // Cek apakah pengguna sudah login
        if (!isset($_SESSION['id_tmu'])) {
            // Jika belum login, arahkan ke halaman login
            header('Location: '. BASEURL. '');
            exit();
        }
        $this->kategoriModel = $this->model('MyApp\Models\KategoriModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->kategoriModel->getAll(),
        ];

        $this->view('templates/header', $data);
        $this->view('kategori/index', $data);
        $this->view('templates/footer-2');
    }

    public function insert()
    {
        $data = [
            'title' => 'Add Kategori',
        ];

        $this->view('templates/header', $data);
        $this->view('kategori/insert', $data);
        $this->view('templates/footer');
    }

    public function insert_kategori()
    {
        $fields = [
            'nama' => 'string | required',
        ];
        $message = [
            'nama' => [
                'required' => 'Nama harus diisi!',
            ],
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        $proc = $this->kategoriModel->insert($inputs);

        if ($proc) {
            Message::setFlash('success', 'Berhasil !', 'Data kategori berhasil ditambahkan');
            $this->redirect('kategori');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $this->kategoriModel->getById($id),
        ];

        $this->view('templates/header', $data);
        $this->view('kategori/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_kategori()
    {
        $fields = [
            'name_tmc' => 'string | required',
            'id_tmc' => 'int',
            'mode' => 'string', // Tambah mode field for update or delete
        ];
        $message = [
            'name_tmc' => [
                'required' => 'Nama harus diisi!',
            ],
            'mode' => [
                'required' => 'Mode harus diisi!',
            ],
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($inputs['mode'] == 'update') {
            $proc = $this->kategoriModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Berhasil !', 'Data kategori berhasil diubah');
                $this->redirect('kategori');
            } else {
                Message::setFlash('error', 'Gagal !', 'Gagal mengubah data kategori');
                $this->redirect('kategori/edit/' . $inputs['id_tmc']);
            }
        } elseif ($inputs['mode'] == 'delete') {
            $proc = $this->kategoriModel->delete($inputs['id_tmc']);
            if ($proc) {
                Message::setFlash('success', 'Berhasil !', 'Data kategori berhasil dihapus');
                $this->redirect('kategori');
            } else {
                Message::setFlash('error', 'Gagal !', 'Gagal menghapus data kategori');
                $this->redirect('kategori/edit/' . $inputs['id_tmc']);
            }
        }
    }
}
