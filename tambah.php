<?php
include "menu/koneksi.php";

$success = false;
if(isset($_POST['simpan'])){

    $nama       = $_POST['nama_zakat'];
    $jenis      = $_POST['jenis_zakat'];
    $rupiah     = $_POST['jumlah_rupiah'];
    $beras      = $_POST['jumlah_beras'];
    $metode     = $_POST['metode'];
  
    $keterangan = $_POST['keterengan'];

    $query = "INSERT INTO tbl_zakat 
    (nama_zakat, jenis_zakat, jumlah_rupiah, jumlah_beras, metode,  keterengan)
    VALUES ('$nama','$jenis','$rupiah','$beras','$metode','$keterangan')";

      if(mysqli_query($koneksi, $query)){
        $success = true;
    } else {
        echo mysqli_error($koneksi);
    }
}


?>


    <title>Form Zakat Lebaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        min-height: 100vh;
        background: linear-gradient(160deg, #0f2027, #1c2b3a, #2c5364);
        background-attachment: fixed;

    }

    .judul {
        color;
    }

    .container {

        height: 100%;
 
         text-align: center;
         margin: auto;
    }

    .card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        color: white;
    }
</style>

<body>

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center ">
            <div class="col-md-8">

                <div class="card shadow-lg p-4">
                    <h2 class="text-center judul mb-4">
                        🌙 Form Zakat Lebaran 🕌
                    </h2>

                    <form method="POST">

                        <div class="mb-4">
                            <label class="form-label">Nama Muzakki</label>
                            <input type="text" name="nama_zakat" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Jenis Zakat</label>
                            <select name="jenis_zakat" class="form-select" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option>Zakat Fitrah</option>
                                <option>Zakat Mal</option>

                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Jumlah Rupiah</label>
                                <input type="number" name="jumlah_rupiah" class="form-control" value="0">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Jumlah Beras (Kg)</label>
                                <input type="number" step="0.1" name="jumlah_beras" class="form-control" value="0">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Metode Pembayaran</label>
                            <select name="metode" class="form-select" required>
                                <option value="">-- Pilih Metode --</option>
                                <option>Transfer</option>
                                <option>Tunai</option>
                            </select>
                        </div>


                        <div class="mb-4">
                            <label class="form-label">Keterangan (Jumlah Orang)</label>
                            <input type="number" name="keterengan" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" name="simpan" class="btn btn-success px-5">
                                💚 Simpan Zakat
                            </button>
                            <a href="data_zakat.php" class="btn btn-secondary px-4">
                                Batal
                            </a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if($success): ?>
<script>
Swal.fire({
    icon: 'success',
    title: '🌙 Berhasil!',
    text: 'Zakat berhasil ditambahkan',
    confirmButtonColor: '#00c853'
}).then(() => {
    window.location = 'admin.php';
});
</script>
<?php endif; ?>