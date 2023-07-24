pilih_tempat = () =>{
    Swal.fire({
        title: 'Error!',
        text: "Slot Parkiran Tidak Boleh Kosong!",
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Baik'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "../../index.php";
        }
    })
}
salah_sandi = () => {
    Swal.fire({
        title: 'Data Salah',
        text: "🙏 Mohon Maaf Data Yang Anda Masukan Tidak Terdaftar Disistem Kami. Harap Diperiksa Kembali.",
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Baik'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "../../index.php";
        }
    })
}

saldo_kurang = () => {
    Swal.fire({
        title: 'Error',
        text: "Saldo Anda Tidak Cukup Untuk Melakukan Booking!",
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Baik'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "../../index.php";
        }
    })
}

gagal1 = () => {
    Swal.fire({
        title: 'Error',
        text: "🙏 Mohon Maaf Tidak Dapat Melakukan Booking!. Karena Sistem Telah Mencatat Data Tersebut Sedang Berada Didalam Parkiran",
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Baik'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "../../index.php";
        }
    })
}

gagal2 = () => {
    Swal.fire({
        title: 'Error',
        text: "🙏 Mohon Maaf Data Yang Anda Masukan Sudah Ada Di Antrian Booking. Mohon Periksa Kembali",
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Baik'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "../../index.php";
        }
    })
}

berhasil = () => {
    let timerInterval
    Swal.fire({
    title: 'Hore! Pesanan Berhasil!',
    html: 'Tertutup Otomatis Dalam <b></b> Milliseconds.',
    timer: 3000,
    icon: 'success',
    timerProgressBar: true,
    didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft()
        }, 100)
    },
    willClose: () => {
        clearInterval(timerInterval)
    }
    }).then((result) => {
      /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
        document.location.href = "../../index.php";
    }
    })
}

///----------------cek saldo
cek_berhasil = (saldo) => {
    Swal.fire({
        title: 'Saldo Anda Senilai',
        text: "Rp "+ saldo,
        icon: 'info',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Baik'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "index.php";
        }
    })
}

data_kosong = () => {
    Swal.fire({
        title: 'Error!',
        text: 'Data Tidak Boleh Kosong',
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Baik'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "index.php";
        }
    })
}
salah_data = () => {
    Swal.fire({
        title: 'Data Salah',
        text: "🙏 Mohon Maaf Data Yang Anda Masukan Tidak Terdaftar Disistem Kami. Harap Diperiksa Kembali.",
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Baik'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "index.php";
        }
    })
}
