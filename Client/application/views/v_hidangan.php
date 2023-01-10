<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View | Hidangan</title>

    <!-- import font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>" />
</head>

<body>
    <!-- BUAT AREA MENU -->
    <nav class="area-menu">
        <button id="btn_tambah" class="btn-primary">Add Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
    </nav>

    <!-- buat area table -->
    <table class="tbl-60">
        <thead>
            <tr>
                <!-- judul tabel -->
                <th style="width: 5%" ;>No.</th>
                <th style="width: 20%" ;>Menu</th>
                <th style="width: 15%" ;>Harga</th>
                <th style="width: 5%" ;>Aktif</th>
                <th style="width: 15%" ;>Aksi</th>
            </tr>
        </thead>

        <!-- isi tabel -->
        <tbody>
        <!-- proses looping get data -->
        <?php
        $no = 1;
        foreach ($tampil->hidangan as $result) {
            // set nilai awal nomor
        ?>
            <tr>
                <td class="text-center"><?php echo $no ?></td>
                <td class="text-center"><?php echo $result->menu_hidangan ?></td>
                <td class="text-center"><?php echo $result->harga_hidangan ?></td>
                <td class="text-center"><?php echo $result->aktif_hidangan ?></td>
                <td class="text-center">
                    <nav class="area-aksi">
                        <button class="btn-ubah" id="btn_ubah" title="Ubah Data" onclick="return gotoUpdate()">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn-hapus" id="btn_hapus" title="Hapus Data" onclick="return gotoDelete()">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </nav>
                </td>
            </tr>

        <?php 
        $no++;
        } ?>
        
        </tbody>
    </table>

    <!-- import font awesome (js)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
         // membuat function refresh
         function setRefresh() {
            location.href = '<?php echo base_url(); ?>';
        }
    </script>

</body>

</html>