<?php

use Master\Guru_ngaji;
use Master\Kecamatan;
use Master\Tpq;
use Master\Menu;

include ('autoload.php'); 
include('Config/Database.php'); 

$menu = new Menu(); 
$guru_ngaji = new Guru_ngaji($dataKoneksi);
$kecamatan = new Kecamatan($dataKoneksi);
$tpq = new Tpq($dataKoneksi);
// $mahasiswa->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uts</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script scr="assets/bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SI DATA GURU NGAJI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                foreach ($menu->topMenu() as $r) {
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo $r['Link']; ?>" class="nav-link">
                            <?php echo $r['Text']; ?>
                        </a>
                    </li>
                    <?php
                }
            ?>
            </ul>
            </div>
            </div>
        </nav>
        <br>
        <div class="Content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat datang di Website";
                // ========== star kontent guru ngaji ================
            } elseif ($target == "guru_ngaji") {
                if ($act == "tambah_guru_ngaji") {
                    echo $guru_ngaji->tambah();
                } elseif ($act == "simpan_guru_ngaji") {
                    if ($guru_ngaji->simpan()) {
                        echo "<script>
                            alert('data suskess disimpan');
                            window.location.href='?target=guru_ngaji';
                            </script>";
                    } else {
                        echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=guru_ngaji';
                        </script>";
                    }
                } elseif ($act == "edit_guru_ngaji") {
                    $id = $_GET['id'];
                    echo $guru_ngaji->edit($id);
                } elseif ($act == "update_guru_ngaji") {
                    if ($guru_ngaji->update()) {
                        echo "<script>
                            alert('data suksess diubah');
                            window.location.href='?target=guru_ngaji';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=guru_ngaji';
                        </script>";
                    }
                } elseif ($act == "delete_guru_ngaji") {
                    $id = $_GET['id'];
                    if ($guru_ngaji->delete($id)) {
                        echo "<script>
                        alert('data suksess dihapus');
                        window.location.href='?target=guru_ngaji';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=guru_ngaji';
                        </script>";
                    }
                } else {
                    echo $guru_ngaji->index();
                }
                // ======================== Star kontent kecamatan ========================
            } elseif ($target == "kecamatan") {
                if ($act == "tambah_kecamatan") {
                    echo $kecamatan->tambah();
                } elseif ($act == "simpan_kecamatan") {
                    if ($kecamatan->simpan()) {
                        echo "<script>
                            alert('data suskess disimpan');
                            window.location.href='?target=kecamatan';
                            </script>";
                    } else {
                        echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=kecamatan';
                        </script>";
                    }
                } elseif ($act == "edit_kecamatan") {
                    $id = $_GET['id'];
                    echo $kecamatan->edit($id);
                } elseif ($act == "update_kecamatan") {
                    if ($kecamatan->update()) {
                        echo "<script>
                            alert('data suksess diubah');
                            window.location.href='?target=kecamatan';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=kecamatan';
                        </script>";
                    }
                } elseif ($act == "delete_kecamatan") {
                    $id = $_GET['id'];
                    if ($kecamatan->delete($id)) {
                        echo "<script>
                        alert('data suksess dihapus');
                        window.location.href='?target=kecamatan';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=kecamatan';
                        </script>";
                    }
                } else {
                    echo $kecamatan->index();
                }

                // ======================== Star kontent tpq ========================
            } elseif ($target == "tpq") {
                if ($act == "tambah_tpq") {
                    echo $tpq->tambah();
                } elseif ($act == "simpan_tpq") {
                    if ($tpq->simpan()) {
                        echo "<script>
                            alert('data suskess disimpan');
                            window.location.href='?target=tpq';
                            </script>";
                    } else {
                        echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=tpq';
                        </script>";
                    }
                } elseif ($act == "edit_tpq") {
                    $id = $_GET['id'];
                    echo $tpq->edit($id);
                } elseif ($act == "update_tpq") {
                    if ($tpq->update()) {
                        echo "<script>
                            alert('data suksess diubah');
                            window.location.href='?target=tpq';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=tpq';
                        </script>";
                    }
                } elseif ($act == "delete_tpq") {
                    $id = $_GET['id'];
                    if ($tpq->delete($id)) {
                        echo "<script>
                        alert('data suksess dihapus');
                        window.location.href='?target=tpq';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=tpq';
                        </script>";
                    }
                } else {
                    echo $tpq->index();
                }

                // no page
                
            } else {
                echo " Page 404 Not Found";
            }
            ?>
            
            </div>
        </div>

</body>

</html>