<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'C_login/index';

/*
ROUTE LOGIN/LOGOUT
*/
$route['logout'] = 'C_Login/logout';

/*
ROUTE APPLICANT REVIEWER
*/
$route['reviewer/pedagang'] = 'C_Pedagang/reviewerPedagang';
$route['reviewer/pelanggan'] = 'C_Pedagang/reviewerPelanggan';
$route['reviewer/pengajuan'] = 'C_Pedagang/reviewerPengajuan';

$route['reviewer/pengajuan/detail/approve/(:num)'] = 'C_Pedagang/approvePedagang/$1';

$route['reviewer/pengajuan/detail/(:num)'] = 'C_Pedagang/detailPengajuan/$1';
$route['reviewer/pengajuan-menu'] = 'C_Pedagang/reviewerMenu';
$route['reviewer/pedagang/detail/(:num)'] = 'C_Pedagang/detailPedagang/$1';
$route['reviewer/menu/detail/(:num)'] = 'C_Pedagang/detailPengajuanMenu/$1';
$route['reviewer/pengajuan-menu/approve/(:num)'] = 'C_Pedagang/approveMenu/$1';


/*
ROUTE ADMIN
*/
$route['admin/pegawai'] 				= 'C_Admin/dataPegawai';
$route['admin/user'] 					= 'C_Admin/dataUser';
$route['admin/pegawai/insertPegawai']	= 'C_Admin/insertPegawai';
$route['admin/pegawai/detail/(:num)']	= 'C_Admin/detailPegawai/$1';
$route['admin/user/detail/(:num)']		= 'C_Admin/detailUser/$1';


/*
ROUTE PROFITABLEMEASURER bn
*/
$route['pm/laporankeuangan'] = 'C_keuangan/laporanKeuangan';
$route['pm/laporankeuangan/gantipersentase'] = 'C_keuangan/gantiPersentase';
$route['pm/laporanbelisaldo'] = 'C_keuangan/laporanBeliSaldo';
$route['pm/laporanbelipromo'] = 'C_keuangan/laporanBeliPromo';
$route['pm/laporanwithdraw'] = 'C_keuangan/laporanWithdraw';
$route['pm/transaksipedagang'] = 'C_keuangan/transaksiPedagang';


/*
ROUTE CS
*/
$route['cs/pesanmasuk'] = 'C_customerservice/pesanMasuk';
$route['cs/pesanmasuk/detail/(:num)'] = 'C_customerservice/detailPesan/$1';
$route['cs/pesanterkirim'] = 'C_customerservice/pesanTerkirim';


// API
$route['api/login'] = 'C_Login/loginUser';
$route['api/token'] = 'C_Login/magicMethod';


//pembeli
$route['api/signup'] = 'C_API/signUp';
$route['api/menu'] = 'C_API/menu';
$route['api/menu/(:num)'] = 'C_API/oneMenu/$1';

//pedagang
$route['api/signuppedagang'] = 'C_API/signUpPedagang';
$route['api/menupedagang/(:num)'] = 'C_API/menuPedagang/$1';
$route['api/edituser/(:num)'] = 'C_API/editUser/$1';
$route['api/insertmenu'] = 'C_API/insertMenu';
//data pedagang
$route['api/datapedagang'] = 'C_API/listPedagang';

//saldo

$route['api/saldouser'] = 'C_API/saldoUser';
$route['api/topupsaldo'] = 'C_API/topUpSaldo';
//bikin pesanan
$route['api/order'] = 'C_API/pesanMenu';
//terima pesanan
$route['api/order/(:num)/approve'] = 'C_API/approveOrder/$1';
//pesanan siap
$route['api/order/(:num)/ready'] = 'C_API/orderReady/$1';
//transaksi beres
$route['api/order/(:num)/end'] = 'C_API/orderEnd/$1';

//laporan pedagang
$route['api/laporan'] = 'C_API/laporan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
