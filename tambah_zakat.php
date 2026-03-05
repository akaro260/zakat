<?php
include "menu/koneksi.php";
include "hearder.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_zakat WHERE id_zakat='$id'");
$row = mysqli_fetch_assoc($data);

$success = false;

if(isset($_POST['update'])){

    $nama       = $_POST['nama_zakat'];
    $jenis      = $_POST['jenis_zakat'];
    $rupiah     = $_POST['jumlah_rupiah'];
    $beras      = $_POST['jumlah_beras'];
    $metode     = $_POST['metode'];
 
    $keterangan = $_POST['keterengan'];

    $query = "UPDATE tbl_zakat SET 
        nama_zakat='$nama',
        jenis_zakat='$jenis',
        jumlah_rupiah='$rupiah',
        jumlah_beras='$beras',
        metode='$metode',
        keterengan='$keterangan'
        WHERE id_zakat='$id'";

    if(mysqli_query($koneksi, $query)){
        $success = true;
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4 mt-4">

    <h1 class="mt-4">Edit Zakat</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Zakat</li>
    </ol>

    <div class="card shadow mb-4">
        <div class="card-header bg-warning text-dark">
            <i class="fas fa-edit"></i> Form Edit Zakat
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Nama Muzakki</label>
                    <input type="text" name="nama_zakat" class="form-control"
                        value="<?= $row['nama_zakat']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Zakat</label>
                    <select name="jenis_zakat" class="form-select" required>
                        <option <?= ($row['jenis_zakat']=='Zakat Fitrah')?'selected':''; ?>>
                            Zakat Fitrah
                        </option>
                        <option <?= ($row['jenis_zakat']=='Zakat Mal')?'selected':''; ?>>
                            Zakat Mal
                        </option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jumlah Rupiah</label>
                        <input type="number" name="jumlah_rupiah" class="form-control"
                            value="<?= $row['jumlah_rupiah']; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jumlah Beras (Kg)</label>
                        <input type="number" step="0.1" name="jumlah_beras" class="form-control" 
                            value="<?= $row['jumlah_beras']; ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode" class="form-select" required>
                        <option <?= ($row['metode']=='Transfer')?'selected':''; ?>>
                            Transfer
                        </option>
                        <option <?= ($row['metode']=='Tunai')?'selected':''; ?>>
                            Tunai
                        </option>
                    </select>
                </div>



                <div class="mb-3">
                    <label class="form-label">Jumlah Orang</label>
                    <input type="number" name="keterengan" class="form-control"
                        value="<?= $row['keterengan']; ?>">
                </div>

                <div class="text-end">
                    <button type="submit" name="update" class="btn btn-warning">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="data_zakat.php" class="btn btn-secondary">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
</main>
</div>

<?php if($success): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data zakat berhasil diupdate',
}).then(() => {
    window.location = 'admin.php';
});
</script>
<?php endif; ?>