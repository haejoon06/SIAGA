<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class UnitModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tbl_m_d_unit');
        $this->setColumn([
            'id_tmdu',
            'name_tmdu',
            'status_deactivated_tmdu',
            'status_deleted_tmdu',
            'created_by_tmdu',
            'created_date_tmdu',
            'updated_by_tmdu',
            'updated_date_tmdu',
        ]);
    }

    public function getAll()
    {
        $params = [
            'status_deactivated_tmdu' => 0,
            'status_deleted_tmdu' => 0
        ];
        return $this->get($params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $createdBy = isset($_SESSION['id_tmu'])? $_SESSION['id_tmu'] : null;
        $table = [
            'name_tmdu' => $data['name_tmdu'],
            'created_by_tmdu' => $createdBy
        ];
        return $this->insertData($table);
    }

    public function getById($id)
    {
        return $this->get(['id_tmdu' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $updatedBy = isset($_SESSION['id_tmu'])? $_SESSION['id_tmu'] : null;
        $table = [
            'name_tmdu' => $data['name_tmdu'],
            'updated_by_tmdu' => $updatedBy
        ];
        $key = [
            'id_tmdu' => $data['id_tmdu']
        ];
        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        $table = [
            'status_deactivated_tmdu' => 1,
            'status_deleted_tmdu' => 1
        ];
        $key = [
            'id_tmdu' => $id
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
