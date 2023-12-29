<?php

namespace MyApp\Core;

class Routes
{
    public function run()
    {
        $router = new App();
        $router->setDefaultController('Login');
        $router->setDefaultMethod('index');
        $router->setNamespace('MyApp\Controllers');

        //Login
        $router->get('/login', ['Login', 'index']);
        $router->post('/auth/login', ['Auth', 'login']);
        $router->get('/auth/logout',  ['Login', 'index']);

        //Logout
        $router->get('/logout', ['Auth', 'logout']);
        //Home
        $router->get('/home', ['Home', 'index']);

        //User
        $router->get('/user', ['User', 'index']);
        $router->get('/user/insert', ['User', 'insert']);
        $router->post('/user/insert_user', ['User', 'insert_user']);
        $router->get('/user/edit/(:id)', ['User', 'edit']);
        $router->post('/user/edit_user', ['User', 'edit_user']);
        $router->post('/user/delete/(:id)', ['User', 'delete']);
        $router->get('/user/delete_user/(:id)', ['User', 'delete_user']);

        //Obat
        $router->get('/obat', ['Obat', 'index']);
        $router->get('/obat/insert', ['Obat', 'insert']);
        $router->post('/obat/insert_obat', ['Obat', 'insert_obat']);
        $router->get('/obat/edit/(:id)', ['Obat', 'edit']);
        $router->post('/obat/edit_obat', ['Obat', 'edit_obat']);
        $router->post('/obat/delete/(:id)', ['Obat', 'delete']);
        $router->get('/obat/delete_obat/(:id)', ['Obat', 'delete_obat']);

        //Kategori
        $router->get('/kategori', ['Kategori', 'index']);
        $router->get('/kategori/insert', ['Kategori', 'insert']);
        $router->post('/kategori/insert_kategori', ['Kategori', 'insert_kategori']);
        $router->get('/kategori/edit/(:id)', ['Kategori', 'edit']);
        $router->post('/kategori/edit_kategori', ['Kategori', 'edit_kategori']);
        $router->post('/kategori/delete/(:id)', ['Kategori', 'delete']);

        //Unit
        $router->get('/unit', ['Unit', 'index']);
        $router->get('/unit/insert', ['Unit', 'insert']);
        $router->get('/unit/edit/(:id)', ['Unit', 'edit']);
        $router->post('/unit/insert_unit', ['Unit', 'insert_unit']);
        $router->post('/unit/edit_unit', ['Unit', 'edit_unit']);
        $router->post('/unit/delete/(:id)', ['Unit', 'delete']);

        //Supplier
        $router->get('/supplier', ['Supplier', 'index']);
        $router->get('/supplier/insert', ['Supplier', 'insert']);
        $router->get('/supplier/edit/(:id)', ['Supplier', 'edit']);
        $router->post('/supplier/insert_supplier', ['Supplier', 'insert_supplier']);
        $router->post('/supplier/edit_supplier', ['Supplier', 'edit_supplier']);
        $router->post('/supplier/delete/(:id)', ['Supplier', 'delete']);

        // Opname
        $router->get('/opname', ['Opname', 'index']);
        $router->get('/opname/insert', ['Opname', 'insert']);
        $router->get('/opname/edit/(:id)', ['Opname', 'edit']);
        $router->post('/opname/insert_opname', ['Opname', 'insert_opname']);
        $router->post('/opname/edit_opname', ['Opname', 'edit_opname']);
        $router->post('/opname/delete/(:id)', ['Opname', 'delete']);
        
        // Expire
        $router->get('/expire', ['Expire', 'index']);
        $router->get('/expire/insert', ['Expire', 'insert']);
        $router->get('/expire/edit/(:id)', ['Expire', 'edit']);
        $router->post('/expire/insert_expire', ['Expire', 'insert_expire']);
        $router->post('/expire/edit_expire', ['Expire', 'edit_expire']);
        $router->post('/expire/delete/(:id)', ['Expire', 'delete']);
        
        //Pembelian
        $router->get('/pembelian', ['Pembelian', 'index']);
        $router->get('/pembelian/insert', ['Pembelian', 'insert']);
        $router->get('/pembelian/edit/(:id)', ['Pembelian', 'edit']);
        $router->post('/pembelian/insert_pembelian', ['Pembelian', 'insert_pembelian']);
        $router->post('/pembelian/edit_pembelian', ['Pembelian', 'edit_pembelian']);
        $router->post('/pembelian/delete/(:id)', ['Pembelian', 'delete']);

        //Penjualan
        $router->get('/penjualan', ['Penjualan', 'index']);
        $router->get('/penjualan/insert', ['Penjualan', 'insert']);
        $router->get('/penjualan/edit/(:id)', ['Penjualan', 'edit']);
        $router->post('/penjualan/insert_penjualan', ['Penjualan', 'insert_penjualan']);
        $router->post('/penjualan/edit_penjualan', ['Penjualan', 'edit_penjualan']);
        $router->post('/penjualan/delete/(:id)', ['Penjualan', 'delete']);
        
        //Hutang
        $router->get('/hutang', ['Hutang', 'index']);
        $router->get('/hutang/insert', ['Hutang', 'insert']);
        $router->get('/hutang/edit/(:id)', ['Hutang', 'edit']);
        $router->post('/hutang/insert_hutang', ['Hutang', 'insert_hutang']);
        $router->post('/hutang/edit_hutang', ['Hutang', 'edit_hutang']);
        $router->post('/hutang/delete/(:id)', ['Hutang', 'delete']);

        //Pembayaran
        $router->get('/pembayaran', ['Pembayaran', 'index']);
        $router->get('/pembayaran/insert', ['Pembayaran', 'insert']);
        $router->get('/pembayaran/edit/(:id)', ['Pembayaran', 'edit']);
        $router->post('/pembayaran/insert_pembayaran', ['Pembayaran', 'insert_pembayaran']);
        $router->post('/pembayaran/edit_pembayaran', ['Pembayaran', 'edit_pembayaran']);
        $router->post('/pembayaran/delete/(:id)', ['Pembayaran', 'delete']);
        
        //Laporan Obat
        $router->get('/laporan_obat', ['Laporan_obat', 'index']);
        $router->get('/laporan_obat/insert', ['Laporan_obat', 'insert']);
        $router->get('/laporan_obat/edit/(:id)', ['Laporan_obat', 'edit']);
        $router->post('/laporan_obat/insert_laporan_obat', ['Laporan_obat', 'insert_laporan_obat']);
        $router->post('/laporan_obat/edit_laporan_obat', ['Laporan_obat', 'edit_laporan_obat']);
        $router->post('/laporan_obat/delete/(:id)', ['Laporan_obat', 'delete']);

        //Laporan Keuangan
        $router->get('/laporan_keuangan', ['Laporan_keuangan', 'index']);
        $router->get('/laporan_keuangan/insert', ['Laporan_keuangan', 'insert']);
        $router->get('/laporan_keuangan/edit/(:id)', ['Laporan_keuangan', 'edit']);
        $router->post('/laporan_keuangan/insert_laporan_keuangan', ['Laporan_keuangan', 'insert_laporan_keuangan']);
        $router->post('/laporan_keuangan/edit_laporan_keuangan', ['Laporan_keuangan', 'edit_laporan_keuangan']);
        $router->post('/laporan_keuangan/delete/(:id)', ['Laporan_keuangan', 'delete']);

        //Export
        $router->get('/export', ['Export', 'index']);
        $router->get('/export/excel', ['Export', 'exportToExcel']);
        $router->post('/export/excel', ['Export', 'exportToExcel']);

        //Import
        $router->get('/import', ['Import', 'index']);
        $router->get('/import/excel', ['Import', 'importFromExcel']);

        $router->run();
    }
}
