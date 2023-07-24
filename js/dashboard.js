
const waktu = () =>{
    const el = document.querySelector(".container .row .jam h1");

    let date = new Date();
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();

    hh = hh < 10 ? `0${hh}` : hh;
    mm = mm < 10 ? `0${mm}` : mm;
    ss = ss < 10 ? `0${ss}` : ss;

    let time = `${hh}:${mm}:${ss}`;
    el.innerText = time;
};

waktu();
setInterval(waktu, 1000);
// --
const data = document.getElementById('konfir_keluar');
data.addEventListener('click', () => {
    Swal.fire({
        title: 'LOGOUT',
        text: "Apakah Anda Yakin Ingin Logout",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Logout'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Logout',
                'Berhasil Logout',
                'success',
            )
            document.location.href = "../logout.php";
        }
    })
})

// tambah data alert
aksi = (text) => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    
    Toast.fire({
        icon: 'success',
        title: text
    })
}