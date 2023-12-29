<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class KategoriModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tbl_m_category');
        $this->setColumn([
            'id_tmc',
            'name_tmc',
        ]);
    }

    public function getAll()
    {
        $params = [
            'status_deactivated_tmc' => 0,
            'status_deleted_tmc' => 0
        ];
        return $this->get($params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $createdBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'name_tmc' => $data['name_tmc'],
            'created_by_tmc' => $createdBy
        ];
        return $this->insertData($table);
    }

    public function getById($id)
    {
        return $this->get(['id_tmc' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $updatedBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'name_tmc' => $data['name_tmc'],
            'updated_by_tmc' => $updatedBy
        ];
        $key = [
            'id_tmc' => $data['id_tmc']
        ];
        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        $table = [
            'status_deactivated_tmc' => 1,
            'status_deleted_tmc' => 1
        ];
        $key = [
            'id_tmc' => $id
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
