const flashData = $('.flash-data').data('flashdata');

if (flashData){
  Swal.fire(
    'Success',
    'Data Berhasil ' + flashData,
    'success'
  );
}

// tombol hapus
$('.tombol-hapus').on('click', function(e) {

  // menghentikan link ketika klik "delete"
  e.preventDefault();

  // mengambil link setelah di klik "OK"
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah Anda Yakin?',
    text: "Data akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  })

});