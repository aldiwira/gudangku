$(document).ready(function () {
	console.log("marhaban ya inspect element");

	// Start Admin JS
	$("#menu-toggle").click(function (e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});

	// logout function
	var doLoginBtn = document.getElementById("doLogout");
	if (doLoginBtn) {
		doLoginBtn.addEventListener("click", (e) => {
			document.cookie = "SID=;expires=1000;path=/";
			document.location.reload(true);
		});
	}

	// datatable barang
	var uri = document.URL.split("/")[4];
	if (uri === "peminjaman") {
		$("#listBarang").DataTable();
		$("#listBarang_filter").attr("class", "dataTables_filter float-right");
	} else if (uri === "tambah") {
		$("#listBarang").DataTable();
		$("#listBarang_filter").attr("class", "dataTables_filter float-right");
	} else if (uri === "pengembalian") {
		$("#listkembaliBarang").DataTable();
		$("#listkembaliBarang_filter").attr(
			"class",
			"dataTables_filter float-right"
		);
	} else if (uri == "log") {
		$("#listBarang").DataTable();
		$("#listBarang_filter").attr("class", "dataTables_filter float-right");
	} else if (uri == "status") {
		$("#listBarangGudang").DataTable();
		$("#listBarangGudang_filter").attr(
			"class",
			"dataTables_filter float-right"
		);
		$("#listBarangKeluar").DataTable();
		$("#listBarangKeluar_filter").attr(
			"class",
			"dataTables_filter float-right"
		);
	}
	// Listener collapse
	var collapseKategori = document.getElementById("togglekatagori");
	var collapseBarang = document.getElementById("togglebarang");
	if (collapseKategori) {
		collapseKategori.addEventListener("click", (e) => {
			if ($("#katagori-fa").attr("class") === "fa fa-chevron-down mr-3") {
				$("#katagori-fa").attr("class", "fa fa-chevron-up mr-3");
			} else {
				$("#katagori-fa").attr("class", "fa fa-chevron-down mr-3");
			}
		});
	}
	if (collapseBarang) {
		collapseBarang.addEventListener("click", (e) => {
			if ($("#barang-fa").attr("class") === "fa fa-chevron-up mr-3") {
				$("#barang-fa").attr("class", "fa fa-chevron-down mr-3");
			} else {
				$("#barang-fa").attr("class", "fa fa-chevron-up mr-3");
			}
		});
	}

	//focus click add katagori
	var tambahBtn = document.getElementById("tambahtrgr");
	if (tambahBtn) {
		tambahBtn.addEventListener("click", (e) => {
			if ($("#katagori-fa").attr("class") === "fa fa-chevron-down mr-3") {
				$("#katagori-fa").attr("class", "fa fa-chevron-up mr-3");
			} else {
				$("#katagori-fa").attr("class", "fa fa-chevron-down mr-3");
			}
			document.getElementById("tambahkategori").value = "";
			setTimeout(() => {
				document.getElementById("tambahkategori").focus();
			}, 500);
		});
	}
});

// End Admin JS
