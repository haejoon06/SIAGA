// document.getElementById('id_tmd').addEventListener('change', function() {
//   var selectedOption = this.options[this.selectedIndex];
//   var selectedIdTmd = selectedOption.value;

//   // Mengambil nilai stock_drug_tmd dari server menggunakan AJAX
//   fetch('http://localhost/public_hmtl/opname/get_stock/' + selectedIdTmd)
//       .then(response => response.json())
//       .then(data => {
//           console.log(data); // Add this line
//           // Mengisi stock_tso dengan nilai stock_drug_tmd yang didapat
//           document.getElementById('stock_tso').value = data.stock_drug_tmd;
//       })
//       .catch(error => console.error('Error:', error));
// });


function myFunction() {
  let input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerText.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

// let search = document.getElementById("mySearch");
// search.addEventListener("keyup", myFunction);

function edit(mode) {
  if (mode === "delete") {
    document.getElementById("mode").value = "delete";
    document.getElementById("form").submit();
  } else if (mode == "update") {
    document.getElementById("mode").value = "update";
    document.getElementById("form").submit();
  } else {
    Swal.fire({
      icon: "warning",
      title: "Konfirmasi",
      text: "Yakin akan dihapus?",
      showCancelButton: true,
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak",
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById("mode").value = "delete";
        document.getElementById("form").submit();
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        return false;
      }
    });
  }
}

function confirmForm() {
  return Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Deleted!", "Your file has been deleted.", "success");
    }
  });
}

// function toggleMenu() {
//   var menu = document.querySelector(".apexcharts-menu");
//   menu.classList.toggle("apexcharts-menu-open");
// }
// document.querySelector(".exportExcel").addEventListener("click", function() {
//   exportToExcel();
// });

// // Fungsi untuk menangani klik pada tombol Export PDF
// document.querySelector(".exportPDF").addEventListener("click", function() {
//   exportToPDF();
// });

// // Fungsi untuk menangani klik pada tombol Import Excel (contoh kosong, harus diimplementasikan sesuai kebutuhan)
// document.querySelector(".importExcel").addEventListener("click", function() {
//   importFromExcel();
// });

// function exportToExcel() {
//   /* Logika untuk mengekspor ke Excel */

//   // Ambil data yang ingin diekspor (contoh: array of objects)
//   var obatData = [];
//     $('#example tbody tr').each(function () {
//         var rowData = {
//             brand_tmd: $(this).find('td:eq(0)').text(),
//             name_tmd: $(this).find('td:eq(1)').text(),
//             name_tmc: $(this).find('td:eq(2)').text(),
//             name_tmdu: $(this).find('td:eq(3)').text(),
//             buy_tmd: $(this).find('td:eq(4)').text(),
//             sale_tmd: $(this).find('td:eq(5)').text(),
//             stock_drug_tmd: $(this).find('td:eq(6)').text(),
//             status_tmd: $(this).find('td:eq(7)').text(),
//         };
//         obatData.push(rowData);
//     });

//   // Kirim permintaan AJAX untuk mengekspor ke Excel
//   $.ajax({
//     url: 'http://localhost/public_html/public/export/excel',
//     type: 'POST',
//     data: { obatData: obatData, filename: 'exported_data.xlsx' },
//     dataType: 'json', // Tentukan bahwa kita ingin menerima data dalam format JSON
//     success: function (result) {
//       if (result.success) {
//           // Berikan tautan langsung ke file Excel
//           var downloadLink = document.createElement('a');
//           downloadLink.href = result.filename;
//           downloadLink.download = result.filename;
//           document.body.appendChild(downloadLink);
//           downloadLink.click();
//           document.body.removeChild(downloadLink);

//           // Handle success, misalnya tampilkan pesan sukses
//           alert(result.message);
//       } else {
//           // Handle error, misalnya tampilkan pesan error
//           alert('Error exporting to Excel: ' + result.message);
//       }
//   },
//   // ...
// });
// }



// function exportToPDF() {
//   /* Logika untuk mengekspor ke PDF */

//   // Ambil tabel sebagai objek
//   var table = document.getElementById('example');

//   // Menyimpan ID dari elemen HTML yang ingin diubah menjadi PDF
//   var content = document.getElementById('content');

//   // Inisialisasi PDF
//   var pdf = new jsPDF();

//   // Tambahkan konten tabel ke PDF
//   pdf.autoTable({
//     html: '#example'
//   });

//   // Simpan PDF
//   pdf.save('exported_data.pdf');
// }


// var isUploading = false;

// function handleExcelFileInput() {
//   if (isUploading) {
//     alert("Proses pengunggahan sedang berlangsung. Mohon tunggu.");
//     return;
//   }

//   var fileInput = document.getElementById("excelFileInput");
//   var file = fileInput.files[0];

//   if (file) {
//     isUploading = true; // Set status uploading menjadi true

//     var reader = new FileReader();

//     reader.onload = function (e) {
//       var data = new Uint8Array(e.target.result);
//       var workbook = XLSX.read(data, { type: "array" });

//       // Mendapatkan data dari workbook (gantilah dengan data sesuai kebutuhan)
//       var sheetName = workbook.SheetNames[0];
//       var excelData = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {
//         header: 1,
//       });

//       // Lakukan sesuatu dengan data yang diimpor
//       console.log("Imported Data:", excelData);

//       isUploading = false; // Set status uploading menjadi false setelah selesai
//     };

//     reader.readAsArrayBuffer(file);
//   }
// }

function showSuccessAlert() {
  Swal.fire("Saved!", "User has been saved.", "success").then(
    (ok) => {
      if (ok.isConfirmed) {
        window.location.href = "http://localhost/public_html/public/user";
      }
    }

    // Lanjutkan dengan mengarahkan pengguna ke tautan penghapusan jika dikonfirmasi
  );
}

function showUpdateSuccessAlert() {
  // You can customize the alert message as needed
  Swal.fire("Updated!", "User has been updated.", "success").then((ok) => {
    if (ok.isConfirmed) {
      window.location.href = "http://localhost/public_html/public/user";
    }
  });
}

function confirmDelete(event) {
  result = false;
  event.preventDefault();

  let deleteUrl = event.currentTarget.getAttribute("href");

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
      action: "my-costum-class",
    },
    buttonsStyling: true,
  });

  swalWithBootstrapButtons
    .fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      confirmButtonColor: "#28a745", // Green color
      cancelButtonColor: "#dc3545", // Red color
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons
          .fire({
            confirmButtonColor: "#28a745", // Green color
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",
          })
          .then((ok) => {
            if (ok.isConfirmed) {
              // Redirect to user/delete
              // window.location.href = deleteUrl;
              result = true;
            }
          });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons
          .fire({
            confirmButtonColor: "#28a745", // Green color
            title: "Cancelled",
            text: "User is safe :)",
            icon: "error",
          })
          .then((ok) => {
            if (ok.isConfirmed) {
              // Redirect to user/index or any other desired URL
              window.location.href =
                "http://localhost/public_html/public/user";
            }
          });
      }
    });

  return result ? true : false;
}

function showObatSuccessAlert() {
  Swal.fire("Saved!", "Obat has been saved.", "success").then((ok) => {
    if (ok.isConfirmed) {
      window.location.href = "http://localhost/public_html/public/obat";
    }
  });
}

function showObatUpdateSuccessAlert() {
  // You can customize the alert message as needed
  Swal.fire("Updated!", "Obat has been updated.", "success").then((ok) => {
    if (ok.isConfirmed) {
      window.location.href = "http://localhost/public_html/public/obat";
    }
  });
}

function deleteConfirm(event) {
  event.preventDefault();

  let deleteUrl = event.currentTarget.getAttribute("href");

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
      action: "my-costum-class",
    },
    buttonsStyling: true,
  });

  swalWithBootstrapButtons
    .fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      confirmButtonColor: "#28a745", // Green color
      cancelButtonColor: "#dc3545", // Red color
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons
          .fire({
            confirmButtonColor: "#28a745", // Green color
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",
          })
          .then((ok) => {
            if (ok.isConfirmed) {
              window.location.href = deleteUrl;
            }
          });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons
          .fire({
            confirmButtonColor: "#28a745", // Green color
            title: "Cancelled",
            text: "User is safe :)",
            icon: "error",
          })
          .then((ok) => {
            if (ok.isConfirmed) {
              window.location.href =
                "http://localhost/public_html/public/obat";
            }
          });
      }
    });
}

// Function to load notifications (replace this with actual data)
function toggleNotificationDropdown() {
  var dropdown = document.getElementById("notificationDropdown");
  dropdown.classList.toggle("show");
}

