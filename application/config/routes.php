<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'User';
$route['404_override'] = 'Handling';
$route['translate_uri_dashes'] = FALSE;
// Routes App 
$route['login'] = "User";
$route['user'] = "Main/user";
$route['admin'] = "Main/admin";
$route['peminjaman'] = "Main/peminjaman";
$route['pengembalian'] = "Main/pengembalian";
$route['tambah'] = "Main/tambah";
$route['status'] = "Main/status";
$route['log'] = "Main/riwayat";
$route['daftar'] = "User/Register";
$route['kategori'] = "main/kategori";
// form handling
$route['tambah/katagori'] = "Main/katagori";
$route['tambah/barang'] = "Main/addBarang";
$route['tambah/hapus/(:any)'] = "Main/deleteItem";
$route['user/update/(:any)'] = "Main/updateUser";
$route['user/delete/(:any)'] = "Main/deleteUser";
$route['(:any)/changepassword'] = "Main/changePassword";
$route['peminjaman/pinjam'] = "Main/addPinjam";
$route['peminjaman/tambah'] = "Main/addCart";
$route['peminjaman/getcart/(:any)'] = "Main/getCartItem";
$route['peminjaman/hapuscart/(:any)'] = "Main/delCart";
$route['peminjaman/check/kategori/(:any)'] = "Handling/check";
$route['peminjaman/check/stok/(:any)'] = "Handling/check";
$route['pengembalian/tampilkan/(:any)'] = "Main/showkembaliBarang";
$route['pengembalian/kembali/(:any)'] = "Main/kembaliBarang";
$route['admin/lihatbarang/(:any)'] = "Handling/countItems";
$route["log/details/(:any)"] = "Handling/showDetailLog";
$route["log/clear"] = "Handling/clearLogs";
$route["kategori/delete/(:any)"] = "main/removekategori";
