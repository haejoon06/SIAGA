<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class ObatModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tbl_m_drug');
        $this->setColumn([
            'id_tmd',
            'brand_tmd',  // Merk
            'name_tmd',   // Nama
            'id_tmc',     // id_kategori
            'id_tmdu',    // id_satuan
            'buy_tmd',    // beli
            'sale_tmd',   // jual
            'expired_date_tmd', // expire
            'stock_drug_tmd',   // stok
            'status_tmd',       // status
            'status_deactivated_tmd',
            'created_by_tmd',
            'created_date_tmd',
            'updated_by_tmd',
            'updated_date_tmd',
        ]);
    }

    public function getAll()
    {
        $params = [
            'status_deactivated_tmd' => 0,
            'status_deleted_tmd' => 0
        ];
        return $this->get($params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $createdBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'brand_tmd' => $data['brand_tmd'],
            'name_tmd' => $data['name_tmd'],
            'id_tmc' => $data['id_tmc'],
            'id_tmdu' => $data['id_tmdu'],
            'buy_tmd' => $data['buy_tmd'],
            'sale_tmd' => $data['sale_tmd'],
            'expired_date_tmd' => $data['expired_date_tmd'],
            'stock_drug_tmd' => $data['stock_drug_tmd'],
            'status_tmd' => $data['status_tmd'],
            'created_by_tmd' => $createdBy
        ];
        return $this->insertData($table);
    }

    public function getById($id)
    {
        return $this->get(['id_tmd' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $updatedBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'brand_tmd' => $data['brand_tmd'],
            'name_tmd' => $data['name_tmd'],
            'id_tmc' => $data['id_tmc'],
            'id_tmdu' => $data['id_tmdu'],
            'buy_tmd' => $data['buy_tmd'],
            'sale_tmd' => $data['sale_tmd'],
            'expired_date_tmd' => $data['expired_date_tmd'],
            'stock_drug_tmd' => $data['stock_drug_tmd'],
            'status_tmd' => $data['status_tmd'],
            'updated_by_tmd' => $updatedBy
        ];
        $key = [
            'id_tmd' => $data['id_tmd']
        ];
        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        $table = [
            'status_deactivated_tmd' => 1,
            'status_deleted_tmd' => 1
        ];
        $key = [
            'id_tmd' => $id
        ];
        $updateResult = $this->updateData($table, $key);
        if ($updateResult) {
            $table = 1;
        } else {
            $table = 0;
        }
        return $table;
    }

    public function importDataFromExcel($excelData)
    {
        $dataArray = json_decode($excelData, true);

        // Loop melalui dataArray, contoh menyimpan data ke tabel
        foreach ($dataArray as $data) {
            $table = [
                'brand_tmd' => $data['brand_tmd'],
                'name_tmd' => $data['name_tmd'],
                'id_tmc' => $data['id_tmc'],
                'id_tmdu' => $data['id_tmdu'],
                'buy_tmd' => $data['buy_tmd'],
                'sale_tmd' => $data['sale_tmd'],
                'expired_date_tmd' => $data['expired_date_tmd'],
                'stock_drug_tmd' => $data['stock_drug_tmd'],
                'status_tmd' => $data['status_tmd'],
                'created_by_tmd' => $_SESSION['id_tmu'] ?? null, // Gunakan ID pengguna saat ini sebagai pembuat
            ];

            $this->insertData($table); // Gunakan metode insertData yang telah ada di kelas Database Anda
        }
    }
}
