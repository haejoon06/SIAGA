<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class Opname extends Controller
{

    private $opnameModel;

    public function __construct()
    {
        if (!isset($_SESSION['id_tmu'])) {
            header('Location: ' . BASEURL . '');
            exit();
        }
        $this->opnameModel = $this->model('MyApp\Models\OpnameModel');
    }

    public function index()
    {
        $obatModels = $this->model('MyApp\Models\ObatModel');
        $obatData = $obatModels->getAll();
        $data = [
            'title' => 'Opname',
            'opname' => $this->opnameModel->getAll(),
            'obat' => $obatData,
        ];
        $this->view('templates/header', $data);
        $this->view('opname/index', $data);
        $this->view('templates/footer-2');
    }

    public function insert()
    {
        $obatModels = $this->model('MyApp\Models\ObatModel');
        $obatData = $obatModels->getAll();

        $data = [
            'title' => 'Add Opname',
            'obat' => $obatData,
        ];
        $this->view('templates/header', $data);
        $this->view('opname/insert', $data);
        $this->view('templates/footer');
    }

    public function insert_opname()
    {
        $fields = [
            'id_tmd' => 'int | required',
            'real_tso' => 'int | required',
            'description_tso' => 'string | required',
            'time_tso' => 'string | required',
        ];
        $message = [
            'id_tmd' => [
                'required' => 'Obat harus diisi!',
            ],
            'real_tso' => [
                'required' => 'Real harus diisi!',
            ],
            'description_tso' => [
                'required' => 'Description harus diisi!',
            ],
            'time_tso' => [
                'required' => 'Time harus diisi!',
            ],
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        $proc = $this->opnameModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil !', 'Data unit berhasil ditambahkan');
            $this->redirect('opname');
        }
    }

    public function edit($id_tso)
    {
        $obatModels = $this->model('MyApp\Models\ObatModel');
        $obatData = $obatModels->getAll();
        $data = [
            'title' => 'Edit Opname',
            'opname' => $this->opnameModel->getById($id_tso),
            'obat' => $obatData,
        ];
        $this->view('templates/header', $data);
        $this->view('opname/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_opname()
    {
        $fields = [
            'real_tso' => 'int | required',
            'description_tso' => 'string | required',
            'time_tso' => 'string | required',
            'id_tso' => 'int',
            'id_tmd' => 'int',
            'mode' => 'string', // Add mode field for update or delete
        ];
        $message = [
            'real_tso' => [
                'required' => 'Real harus diisi!',
            ],
            'description_tso' => [
                'required' => 'Description harus diisi!',
            ],
            'time_tso' => [
                'required' => 'Time harus diisi!',
            ],
            'id_tso' => [
                'required' => 'Id harus diisi!',
            ],
            'id_tmd' => [
                'required' => 'Obat harus diisi!',
            ],
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($inputs['mode'] == 'update') {
            $proc = $this->opnameModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Berhasil!', 'Data opname berhasil diubah');
                $this->redirect('opname');
            } else {
                Message::setFlash('error', 'Gagal!', 'Gagal mengubah data opname');
                $this->redirect('opname/edit/' . $inputs['id_tso']);
            }
        } elseif ($inputs['mode'] == 'delete') {
            $proc = $this->opnameModel->delete($inputs['id_tso']);
            if ($proc) {
                Message::setFlash('success', 'Berhasil!', 'Data opname berhasil dihapus');
                $this->redirect('opname');
            } else {
                Message::setFlash('error', 'Gagal!', 'Gagal menghapus data opname');
                $this->redirect('opname/edit/' . $inputs['id_tso']);
            }
        }
    }
}
