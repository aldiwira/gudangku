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

// End Admin JS
