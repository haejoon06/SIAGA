<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class User extends Controller
{

    private $userModel;
    public function __construct()
    {
        if (!isset($_SESSION['id_tmu'])) {
            header('Location: ' . BASEURL);
            exit();
        } else {
            if (isset($_SESSION['role_tmu']) && $_SESSION['role_tmu'] == 'Owner') {
                $this->userModel = $this->model('MyApp\Models\UserModel');
            }
        }
    }

    public function index()
    {

        $data = [
            'title' => 'User',
            'user' => $this->userModel->getAll()
        ];
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer-2');
    }

    public function insert()
    {
        $data = [
            'title' => 'Add User',
        ];
        $this->view('templates/header', $data);
        $this->view('user/insert', $data);
        $this->view('templates/footer');
    }

    public function insert_user()
    {
        $fields = [
            'username_tmu' => 'string | required',
            'password_tmu' => 'string | required',
            'name_tmu' => 'string | required',
            'role_tmu' => 'string | required',
            'gender_tmu' => 'string | required',
            'contact_tmu' => 'string | required',
            'email_tmu' => 'string | required',
            'address_tmu' => 'string | required'
        ];

        $messages = [
            'username_tmu' => [
                'required' => 'Username harus diisi!',
            ],
            'password_tmu' => [
                'required' => 'Password harus diisi!',
            ],
            'name_tmu' => [
                'required' => 'Nama harus diisi!',
            ],
            'role_tmu' => [
                'required' => 'Role harus diisi!',
            ],
            'gender_tmu' => [
                'required' => 'Jenis kelamin harus diisi!',
            ],
            'contact_tmu' => [
                'required' => 'Kontak harus diisi!',
            ],
            'email_tmu' => [
                'required' => 'Email harus diisi!',
            ],
            'address_tmu' => [
                'required' => 'Alamat harus diisi!',
            ]
        ];

        [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

        // if ($errors) {
        //     Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
        //     $this->redirect('user/insert');
        // }

        // Hash the password before saving it to the database
        $inputs['password_tmu'] = password_hash($inputs['password_tmu'], PASSWORD_DEFAULT);

        $proc = $this->userModel->insert($inputs);

        if ($proc) {
            Message::setFlash('success', 'Berhasil !', 'User berhasil ditambahkan');
            $this->redirect('user');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->userModel->getById($id)
        ];
        $this->view('templates/header', $data);
        $this->view('user/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_user()
    {
        $fields = [
            'username_tmu' => 'string | required',
            'password_tmu' => 'string | required',
            'name_tmu' => 'string | required',
            'role_tmu' => 'string | required',
            'gender_tmu' => 'string',
            'contact_tmu' => 'string',
            'email_tmu' => 'string',
            'address_tmu' => 'string',
            'mode' => 'string',
            'id_tmu' => 'int',
        ];
        $message = [
            'username_tmu' => [
                'required' => 'Username harus diisi!',
            ],
            'password_tmu' => [
                'required' => 'Password harus diisi!',
            ],
            'name_tmu' => [
                'required' => 'Nama harus diisi!',
            ],
            'role_tmu' => [
                'required' => 'Role harus diisi!',
            ],
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        $inputs['password_tmu'] = password_hash($inputs['password_tmu'], PASSWORD_DEFAULT);

        if ($inputs['mode'] == 'update') {
            $proc = $this->userModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Berhasil !', 'User berhasil diubah');
                $this->redirect('user');
            }
        } else {
            $proc = $this->userModel->delete($inputs['id_tmu']);
            if ($proc) {
                Message::setFlash('success', 'Berhasil !', 'User berhasil dihapus');
                $this->redirect('user');
            }
        }
    }
    public function delete_user($id)
    {
        $userModel = $this->model('MyApp\Models\UserModel');

        $deleteResult = $userModel->delete($id);

        if ($deleteResult) {
            header('Location: ' . BASEURL . '/user');
            exit(); 
        } else {
            echo "Failed to delete user.";
        }
    }
}