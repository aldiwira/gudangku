<script type='text/javascript'>
    toastr.options.closeButton = true;

    // start check document ready
    $(document).ready(() => {
        $('#changePassword').on('hidden.bs.modal', function(e) {
            <?php session_destroy() ?>
        })
        <?php if (isset($_SESSION['toast'])) { ?>
            toastr.options.closeButton = true;
            var toastvalue = "<?php echo $_SESSION['toast'] ?>";
            var status = toastvalue.split(":")[0];
            var message = toastvalue.split(":")[1];
            if (status === "success") {
                toastr.success(message, status);
            } else if (status === "error") {
                toastr.error(message, status);
            } else if (status == "warn") {
                toastr.warning(message, status);
            }
        <?php } ?>
        <?php if (isset($_SESSION['failedchange'])) { ?>
            var stt = "<?php echo $_SESSION['failedchange'] ?>";
            if (stt === "show") {
                $("#changePassword").modal('show');
            }
        <?php } ?>

        // start script for pinjam barang

        // start script for tambah barang
        $("#tambahBarangBtn").on("click", () => {
            var nama_barang = document.getElementById("namabarangId").value;
            var kategori_barang = document.getElementById("kategoribarangId").value;
            var jumlah_barang = document.getElementById("jumlahbarangId").value;
            var stock = document.getElementById("disabledTextInput");
            var stockValue = parseInt(stock.value);

            if (parseInt(jumlah_barang) > stockValue || stockValue === 0) {
                toastr.error("Jumlah barang yang anda masukkan melebihi stock barang yang tersedia");
            } else {
                if (jumlah_barang == "0") {
                    toastr.error("Anda belum memasukkan jumlah barang, masukkan jumlah barang terlebih dahulu");
                } else {
                    $.ajax({
                        url: "<?php echo base_url("peminjaman/tambah"); ?>",
                        method: "POST",
                        data: {
                            namabrginput: nama_barang,
                            katbrginput: kategori_barang,
                            jmlbrginput: jumlah_barang
                        },
                        success: (data) => {
                            $("#detail_cart").html(data);
                            var stockAfter = parseInt(stock.value) - parseInt(jumlah_barang);
                            stock.setAttribute("value", stockAfter);
                        }
                    });
                }
            }

        });
        // end script for tambah barang
        var listennerKategori = document.getElementById("kategoribarangId");
        if (listennerKategori) {
            listennerKategori.addEventListener("change", (e) => {
                var values = listennerKategori.value;
                document.getElementById("jumlahbarangId").setAttribute("value", 0);
                document.getElementById("disabledTextInput").setAttribute("value", 0);

                if (values !== "") {
                    $.ajax({
                        url: `<?php echo base_url("peminjaman/check/kategori"); ?>/${listennerKategori.value}`,
                        method: "POST",
                        success: (data) => {
                            $("#namabarangId").html(data);
                        }
                    })
                } else {
                    $("#namabarangId").html("<option value='' selected>Pilih Katagori barang terlebih dahulu</option>");
                }
            });
        }
        var listennerNamaBarang = document.getElementById("namabarangId");
        if (listennerNamaBarang) {
            listennerNamaBarang.addEventListener("change", (e) => {
                var values = listennerNamaBarang.value;

                $.ajax({
                    url: `<?php echo base_url("peminjaman/check/stok"); ?>/${listennerNamaBarang.value}`,
                    method: "POST",
                    success: (data) => {
                        document.getElementById("disabledTextInput").setAttribute("value", data);
                        document.getElementById("jumlahbarangId").setAttribute("value", 0);
                        document.getElementById("jumlahDisable").removeAttribute("disabled");

                    }
                })
            });
        }
        // end script for pinjam barang
    });
    // end check document ready

    function onModalBarang(idDetail) {
        var url = `<?php echo base_url("pengembalian/tampilkan"); ?>/${idDetail}`;
        $.ajax({
            url: url,
            method: "GET",
            success: (data) => {
                $("#modalBarangAmbil").html(data);
            }
        });
    };

    function doSubmitKembali() {
        pinjamDatas = document.getElementById("dataPinjam");
        const datas = parseTable(pinjamDatas);
        var datasFinal = [];
        // check input kondisi barang
        datas.map((currElement, index) => {

            let jumlah = parseInt(currElement.jumlah_barang);
            let inputJumlah = 0;
            let element = currElement;
            var jumlahRusak = document.getElementById(`valueRusak${index}`);
            var jumlahNormal = document.getElementById(`valueNormal${index}`);
            if (currElement.kondisi_barang_rusak) {
                inputJumlah = inputJumlah + parseInt(jumlahRusak.value);
                element = {
                    ...element,
                    jumlah_rusak: parseInt(jumlahRusak.value)
                };
            }
            if (currElement.kondisi_barang_normal) {
                inputJumlah = inputJumlah + parseInt(jumlahNormal.value);
                element = {
                    ...element,
                    jumlah_normal: parseInt(jumlahNormal.value)
                };
            }
            if (jumlah === inputJumlah) {
                datasFinal.push(element);
            } else {
                toastr.warning(`Pastikan anda memasukkan jumlah ${element.nama_barang} sesuai dengan jumlah barang`);
            }

        })
        // check all inserted
        if (datasFinal.length === datas.length) {
            const idCatatan = document.getElementById("kodecatatan").getAttribute("value");
            var url = `<?php echo base_url("pengembalian/kembali"); ?>/${idCatatan}`;
            $.ajax({
                url: url,
                data: {
                    datas: datasFinal
                },
                method: "POST",
                success: (data) => {
                    //hide modal when success
                    let status = JSON.parse(data);
                    if (status === true) {
                        $("#pinjamModal").modal("hide");
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }
                },
                error: (err) => {
                    toastr.error(err.statusText);
                }
            })
        }
    }

    function deleteCartItems(rowId) {
        var url = `<?php echo base_url("peminjaman/hapuscart"); ?>/${rowId}`;
        $.ajax({
            url: `<?php echo base_url("peminjaman/getcart"); ?>/${rowId}`,
            method: "GET",
            success: (data) => {
                var datas = JSON.parse(data);
                var stock = document.getElementById("disabledTextInput");

                var stockAfter = parseInt(datas.qty) + parseInt(stock.value);
                stock.setAttribute("value", stockAfter);
            }
        })
        $.ajax({
            url: url,
            method: "DELETE",
            success: (data) => {
                $("#detail_cart").html(data);
            },
            error: (err) => {
                toastr.error(err.statusText);
            }
        });
    }
</script>