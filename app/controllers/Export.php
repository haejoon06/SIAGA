<?php
// namespace MyApp\Controllers;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// class Export
// {
//     public function exportToExcel()
//     {
//         $obatData = $_POST['obatData'];
//         $filename = $_POST['filename'];

//         $spreadsheet = new Spreadsheet();
//         $sheet = $spreadsheet->getActiveSheet();

//         $this->setHeaders($sheet);
//         $this->populateData($sheet, $obatData);

//         $result = $this->saveToFile($spreadsheet, $filename);

//         ob_clean();

//         header('Content-Type: application/json');

//         echo json_encode($result);
//     }

//     private function setHeaders($sheet)
//     {
//         $headers = ['No', 'Brand', 'Nama', 'Kategori', 'Satuan', 'Beli', 'Jual', 'Stok', 'Status'];
//         $columnIndex = 1;

//         foreach ($headers as $header) {
//             $sheet->setCellValueByColumnAndRow($columnIndex++, 1, $header);
//         }
//     }

//     private function populateData($sheet, $obatData)
//     {
//         $rowIndex = 2;
//         $no = 0;

//         foreach ($obatData as $obat) {
//             $no++;
//             $columnIndex = 1;
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $no);
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $obat['brand_tmd']);
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $obat['name_tmd']);
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $obat['name_tmc']);
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $obat['name_tmdu']);
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $obat['buy_tmd']);
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $obat['sale_tmd']);
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $obat['stock_drug_tmd']);
//             $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $obat['status_tmd']);

//             $rowIndex++;
//         }
//     }

//     private function saveToFile($spreadsheet, $filename = null)
//     {
//         if ($filename === null) {
//             $filename = 'exported_data_' . date('Ymd_His') . '.xlsx';
//         }

//         try {
//             $writer = new Xlsx($spreadsheet);
//             $writer->save($filename);

//             return ['success' => true, 'filename' => $filename, 'message' => 'Export to Excel successful'];
//         } catch (\Exception $e) {
//             return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
//         }
//     }
// }

// // Example usage:
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $export = new Export();
//     $export->exportToExcel();
// }
// ?>
