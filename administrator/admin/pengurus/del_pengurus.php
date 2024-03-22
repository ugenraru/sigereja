<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_pengurus WHERE id_pengurus='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
            $sql_hapus_bid = "DELETE FROM tb_bidang WHERE id_pengurus='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus_bid);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pengurus';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pengurus';
                    }
                })</script>";
            }
        }

