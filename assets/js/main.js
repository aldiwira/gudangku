$(document).ready(function () {
	console.log("marhaban ya inspect element");

	// Start Admin JS
	$("#menu-toggle").click(function (e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});

	// logout function
	document.getElementById("doLogout").addEventListener("click", (e) => {
		document.cookie = "SID=;expires=1000;path=/";
		document.location.reload(true);
	});

	// datatable barang
	var uri = document.URL.split("/")[4];
	if (uri === "peminjaman") {
		$("#listBarang").DataTable();
		$("#listBarang_filter").attr("class", "dataTables_filter float-right");
	} else if (uri === "tambah") {
		$("#listBarang").DataTable();
		$("#listBarang_filter").attr("class", "dataTables_filter float-right");
	}

	// Listener collapse

	document.getElementById("togglekatagori").addEventListener("click", (e) => {
		if ($("#katagori-fa").attr("class") === "fa fa-chevron-down mr-3") {
			$("#katagori-fa").attr("class", "fa fa-chevron-up mr-3");
		} else {
			$("#katagori-fa").attr("class", "fa fa-chevron-down mr-3");
		}
	});
	document.getElementById("togglebarang").addEventListener("click", (e) => {
		if ($("#barang-fa").attr("class") === "fa fa-chevron-up mr-3") {
			$("#barang-fa").attr("class", "fa fa-chevron-down mr-3");
		} else {
			$("#barang-fa").attr("class", "fa fa-chevron-up mr-3");
		}
	});

	//focus click add katagori
	document.getElementById("tambahtrgr").addEventListener("click", (e) => {
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
});

// End Admin JS
