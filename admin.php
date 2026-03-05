<?php
include "menu/koneksi.php";
include "hearder.php";
?>


<body class="sb-nav-fixed">


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card text-black mb-4">
                            <?php
                            $hitung = mysqli_query($koneksi, "SELECT SUM(jumlah_rupiah) AS total FROM tbl_zakat");
                            $data = mysqli_fetch_assoc($hitung);
                            $total = $data['total'];
                            ?>
                            <div class="card-body fs-4">Total Uang yang terkumpul &nbsp; <i
                                    class="fa-solid fa-sack-dollar"></i></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="fs-5 text-black mt-2">Rp <?= number_format($total, 0, ',', '.'); ?></p>
                                 <!-- #region -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card text-black mb-4">
                            <?php
                            $hitung = mysqli_query($koneksi, "SELECT SUM(jumlah_beras) AS beras FROM tbl_zakat");
                            $data = mysqli_fetch_assoc($hitung);
                            $beras = $data['beras'];
                            ?>
                            <div class="card-body fs-4">jumlah Beras yang terkumpul &nbsp; <i
                                    class="fa-solid fa-bowl-rice"></i></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="fs-5 text-black mt-2"><?= $beras ?> Kg </i></p>
                                 <!-- #region -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card text-black mb-4">
                            <?php
                            $hitung = mysqli_query($koneksi, "SELECT SUM(keterengan) AS orang FROM tbl_zakat");
                            $data = mysqli_fetch_assoc($hitung);
                            $orang = $data['orang'];
                            ?>
                            <div class="card-body fs-4">Jumlah orang yang zakat &nbsp; <i class="fa-solid fa-user"></i></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="fs-5 text-black mt-2"><?= number_format($orang, 0, ',', '.'); ?> Orang</p>
                                 <!-- #region -->
                            </div>
                        </div>
                    </div>

                <!-- </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div> -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Zakat</th>
                                    <th>Jumlah Rupiah</th>
                                    <th>Jumlah Beras</th>
                                    <th>Metode</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $zukir = mysqli_query($koneksi, "SELECT * FROM tbl_zakat");
                                foreach ($zukir as $row):
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_zakat'] ?></td>
                                        <td><?= $row['jenis_zakat'] ?></td>
                                        <td>Rp <?= number_format($row['jumlah_rupiah'], 0, ',', '.') ?></td>
                                        <td><?= $row['jumlah_beras'] ?> Kg</td>
                                        <td>
                                            <span>
                                                <?= $row['metode'] ?>
                                            </span>
                                        </td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['keterengan'] ?> Orang</td>
                                        <td>
                                            <a href="tambah_zakat.php?id=<?= $row['id_zakat'] ?>"
                                                class="btn btn-sm btn-warning me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>

                                            <a href="javascript:void(0);" onclick="confirmHapus(<?= $row['id_zakat'] ?>)"
                                                class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tbody>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="admin/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="admin/assets/demo/chart-area-demo.js"></script>
    <script src="admin/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="admin/js/datatables-simple-demo.js"></script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmHapus(id) {
        Swal.fire({
            title: 'Yakin?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "hapus.php?id=" + id;
            }
        });
    }
</script>


<?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'success'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Terhapus!',
            text: 'Data zakat berhasil dihapus',
            confirmButtonColor: '#d33'
        });
    </script>
<?php endif; ?>