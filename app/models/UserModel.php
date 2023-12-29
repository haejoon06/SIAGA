<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class UserModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tbl_m_user');
        $this->setColumn([
            'id_tmu',
            'nik_tmu',
            'name_tmu',
            'address_tmu',
            'gender_tmu',
            'username_tmu',
            'email_tmu',
            'password_tmu',
            'role_tmu',
            'birth_place_tmu',
            'birth_date_tmu',
            'contact_tmu',
            'status_deactivated_tmu', // corrected column name
            'status_deleted_tmu',
            'created_by_tmu',
            'created_date_tmu',
            'updated_by_tmu',
            'updated_date_tmu'
        ]);
    }

    public function getAll()
    {
        $params = [
            'status_deactivated_tmu' => 0,
            'status_deleted_tmu' => 0
        ];

        return $this->get($params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
    {
    $params = [
        'username_tmu' => $username,
        'status_deactivated_tmu' => 0,
        'status_deleted_tmu' => 0
    ];

    return $this->get($params)->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $createdBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'name_tmu' => $data['name_tmu'],
            'address_tmu' => $data['address_tmu'],
            'gender_tmu' => $data['gender_tmu'],
            'username_tmu' => $data['username_tmu'],
            'email_tmu' => $data['email_tmu'],
            'password_tmu' => $data['password_tmu'],
            'role_tmu' => $data['role_tmu'],
            'contact_tmu' => $data['contact_tmu'],
            'created_by_tmu' => $createdBy
        ];
        return $this->insertData($table);
    }

    public function getById($id)
    {
        return $this->get(['id_tmu' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $updatedBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'name_tmu' => $data['name_tmu'],
            'address_tmu' => $data['address_tmu'],
            'gender_tmu' => $data['gender_tmu'],
            'username_tmu' => $data['username_tmu'],
            'email_tmu' => $data['email_tmu'],
            'password_tmu' => $data['password_tmu'],
            'role_tmu' => $data['role_tmu'],
            'contact_tmu' => $data['contact_tmu'],
            'updated_by_tmu' => $updatedBy
        ];
        $key = [
            'id_tmu' => $data['id_tmu']
        ];
        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        $table = [
            'status_deactivated_tmu' => 1,  
            'status_deleted_tmu' => 1,      
        ];

        $key = [
            'id_tmu' => $id,
        ];

        $updateResult = $this->updateData($table, $key);

        if ($updateResult) {

            $table = 1;
        } else {
        
            $table = 0; 
        }

        return $table; 

    }

    public function deleteMultiple($ids)
{
    $successCount = 0;

    foreach ($ids as $id) {
        $table = [
            'status_deactivated_tmu' => 1,
            'status_deleted_tmu' => 1,
        ];

        $key = [
            'id_tmu' => $id,
        ];

        $updateResult = $this->updateData($table, $key); 

        if ($updateResult) {
            $successCount++;
        }
    }

    return $successCount;
}

}