<body>
    <!-- =======================area button======================= -->
    <nav class="area-button">
        <button id="btn_tambah" class="btn-primary">Add Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
    </nav>

    <!-- buat area table -->
    <table class="tbl-60">
        <thead>
            <tr>
                <!-- =============judul tabel============= -->
                <th style="width: 5%" ;>No.</th>
                <th style="width: 20%" ;>Menu</th>
                <th style="width: 15%" ;>Harga</th>
                <th style="width: 5%" ;>Aktif</th>
                <th style="width: 15%" ;>Aksi</th>
            </tr>
        </thead>

        <!-- =====================isi tabel========================== -->
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

    <script>// inisialisasi object
        let btn_tambah = document.getElementById("btn_tambah");

        //=============================event button tambah=================================//
        btn_tambah.addEventListener('click', function() {
            location.href = '<?php echo site_url("Hidangan/addHidangan") ?>'
        });

        //=============================function refresh====================================//
        function setRefresh() {
            location.href = '<?php echo base_url(); ?>';
        }

        //===============================function update====================================//
        function gotoUpdate(menu) {
            
            location.href = '<?php echo site_url("Hidangan/updateHidangan"); ?>' + '/' + menu;
        }

        //================================function delete===================================//
        function gotoDelete(menu) {
            if (confirm("Data Hidangan " + menu + " Ingin di Hapus?") === true) {
                // alert("Data Berhasil di Hapus");

                // panggil fungsi setDelete
                setDelete(menu);
            }
        }

        function setDelete(menu) {
            // membuat variable / konstanta data
            const data = {
                "menuhidangan": menu
            }
            // kirim data async dengan fetch
            fetch('<?php echo site_url("Hidangan/setDelete"); ?>', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then((response) => {
                    return response.json()
                })
                .then(function(data) {
                    // menggunakan alert data dari Controller hidangan ambil dari statusnya
                    alert(data.statusnya);
                    // panggil fungsi setrefresh
                    setRefresh();
                })
        }

    </script>

</body>

</html>