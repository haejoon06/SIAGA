<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class Unit extends Controller
{
    private $unitModel;

    public function __construct()
    {
        if (!isset($_SESSION['id_tmu'])) {
            header('Location: '. BASEURL. '');
            exit();
        }
        $this->unitModel = $this->model('MyApp\Models\UnitModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Jenis',
            'unit' => $this->unitModel->getAll(),
        ];

        $this->view('templates/header', $data);
        $this->view('unit/index', $data);
        $this->view('templates/footer-2');
    }

    public function insert()
    {
        $data = [
            'title' => 'Add Satuan',
        ];

        $this->view('templates/header', $data);
        $this->view('unit/insert', $data);
        $this->view('templates/footer');
    }

    public function insert_unit()
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

        $proc = $this->unitModel->insert($inputs);

        if ($proc) {
            Message::setFlash('success', 'Berhasil !', 'Data unit berhasil ditambahkan');
            $this->redirect('unit');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit unit',
            'unit' => $this->unitModel->getById($id),
        ];

        $this->view('templates/header', $data);
        $this->view('unit/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_unit()
    {
        $fields = [
            'name_tmdu' => 'string | required',
            'id_tmdu' => 'int',
            'mode' => 'string', 
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
            $proc = $this->unitModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Berhasil !', 'Data unit berhasil diubah');
                $this->redirect('unit');
            } else {
                Message::setFlash('error', 'Gagal !', 'Gagal mengubah data unit');
                $this->redirect('unit/edit/' . $inputs['id_tmdu']);
            }
        } elseif ($inputs['mode'] == 'delete') {
            $proc = $this->unitModel->delete($inputs['id_tmdu']);
            if ($proc) {
                Message::setFlash('success', 'Berhasil !', 'Data unit berhasil dihapus');
                $this->redirect('unit');
            } else {
                Message::setFlash('error', 'Gagal !', 'Gagal menghapus data unit');
                $this->redirect('unit/edit/' . $inputs['id_tmdu']);
            }
        }
    }
}
