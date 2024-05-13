<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    // Query untuk mengambil data pengguna berdasarkan id
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $_id = $_POST['user_id'];
    $_nama = $_POST['username'];
    $_password = $_POST['password'];
    $_email = $_POST['email'];
    $_tanggal = $_POST['tanggal'];
    $data = [$_id, $_nama, $_password, $_email, $_tanggal, $id];
    // Query SQL untuk update data pasien berdasarkan id
    $sql = "UPDATE users SET user_id = ?, username = ?, password = ?, email = ?, created_at = ? WHERE user_id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Website</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Pengguna</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">Form Pengguna</h2>
                            <form action="edit.php?user_id=<?= $row['user_id'] ?>" method="POST">
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">ID</label>
                                    <div class="col-8">
                                        <input id="kode" name="user_id" type="text" class="form-control" value="<?= $row['user_id'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                        <input id="nama" name="username" type="text" class="form-control" value="<?= $row['username'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tmp_lahir" class="col-4 col-form-label">Kata Sandi</label>
                                    <div class="col-8">
                                        <input id="tmp_lahir" name="password" type="text" class="form-control" value="<?= $row['password'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input id="email" name="email" type="email" class="form-control" value="<?= $row['email'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-4 col-form-label">Tanggal</label>
                                    <div class="col-8">
                                        <input id="alamat" name="tanggal" type="datetime-local" class="form-control" value="<?= $row['created_at'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>
