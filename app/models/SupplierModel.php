<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class SupplierModel extends Database
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tbl_m_supplier');
        $this->setColumn([
            'id_tms',
            'name_tms',
            'city_tms',
            'contact_tms',
            'email_tms',
            'address_tms',
            'status_deactivated_tms',
            'status_deleted_tms',
            'created_by_tms',
            'created_date_tms',
            'updated_by_tms',
            'updated_date_tms',
        ]);
    }

    public function getAll()
    {
        $params = [
            'status_deactivated_tms' => 0,
            'status_deleted_tms' => 0
        ];
        return $this->get($params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $createdBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'name_tms' => $data['name_tms'],
            'city_tms' => $data['city_tms'],
            'contact_tms' => $data['contact_tms'],
            'email_tms' => $data['email_tms'],
            'address_tms' => $data['address_tms'],
            'created_by_tms' => $createdBy
        ];
        return $this->insertData($table);
    }

    public function getById($id)
    {
        return $this->get(['id_tms' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $updatedBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'name_tms' => $data['name_tms'],
            'city_tms' => $data['city_tms'],
            'contact_tms' => $data['contact_tms'],
            'email_tms' => $data['email_tms'],
            'address_tms' => $data['address_tms'],
            'updated_by_tms' => $updatedBy
        ];
        $key = [
            'id_tms' => $data['id_tms']
        ];
        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        $table = [
            'status_deactivated_tms' => 1,
            'status_deleted_tms' => 1
        ];
        $key = [
            'id_tms' => $id
        ];
        $updateResult = $this->updateData($table, $key);
        if ($updateResult) {
            $table = 1;
        } else {
            $table = 0;
        }
        return $table;
    }
}
