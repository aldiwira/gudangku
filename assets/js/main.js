console.log("marhaban ya inspect element");

// Start Admin JS
$("#menu-toggle").click(function (e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});

// logout function

function doLogout() {
	document.cookie = "SID=;expires=1000;path=/";
	document.location.reload(true);
}

// Listener collapse

$(document).ready(function () {
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
		document.getElementById("tambahkategori").focus();
	});
});

// End Admin JS
