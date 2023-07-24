$(document).ready(function() {
    setInterval(function() {
        $("#parkir").load("php/statusparkirindex/parkiran.php");
        $("#monitor").load("php/statusparkir/tombol.php");
    }, 1000);
});