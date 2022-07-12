<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});




////////////////////////////////MANAGE USER/////////////////////////////////////////////
Route::get('/adminDashboard', 'AdminController@index');
Route::prefix('admin')->group(function()
{
	Route::get('/login', 'AdminController@loginForm')->name('login');
	Route::post('/login', 'loginController@login')->name('admin.login.submit');
	Route::get('/manageKasir','AdminController@kasir')->name('admin.kasir');
	Route::post('/registerKasir','AdminController@registerkasir')->name('admin.login.kasir');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'AdminController@logout')->name('admin.logout');
});
// Route::get('/manageAdmin','AdminController@admin')->name('manageAdmin');
// Route::post('/manageAdmin/store','AdminController@registerAdmin');


////////////////////////////////////////////SUPPLIER/////////////////////////////////////////
Route::get('/supplier', 'SupplierController@index');
Route::get('/supplier/create','SupplierController@create');
Route::post('/supplier/store', 'SupplierController@store');
Route::get('/supplier/edit/{sup}', 'SupplierController@edit');
Route::post('/supplier/update', 'SupplierController@update');
Route::get('supplier/hapus/{delSup}', 'SupplierController@destroy');
Route::get('/supplierProduct', 'SuppProductController@index');


////////////////////////////////////////////Kategori/////////////////////////////////////////
Route::get('/kategori', 'CategoriesController@index');
Route::post('/kategori/store', 'CategoriesController@store');
Route::get('kategori/edit/{kat}', 'CategoriesController@edit');
Route::post('/kategori/update', 'CategoriesController@update');
Route::get('kategori/hapus/{delkat}', 'CategoriesController@destroy');

////////////////////////////////////////////CABANG/////////////////////////////////////////
Route::get('/cabang', 'CabangController@index');
Route::post('/cabang/store', 'CabangController@store');
Route::get('cabang/edit/{cab}', 'CabangController@edit');
Route::post('/cabang/update', 'CabangController@update');
Route::get('cabang/hapus/{d}', 'CabangController@destroy');


////////////////////////////////////////////PRODUK/////////////////////////////////////////
Route::get('/produk', 'ProductController@index');
Route::get('/produk/create', 'ProductController@create');
Route::post('/produk/store', 'ProductController@store');
Route::post('/produk/tamp', 'ProductController@barcode')->name('produk.tamp');
Route::get('/produk/detail/{z}', 'ProductController@detail')->name('produk.detail');
Route::get('/produk/create/{tamsup}', 'ProductController@create');
Route::post('/produk/tambahSupplier', 'ProductController@tambahSupplier');
Route::get('hapusSupplier/{delSupp}', 'ProductsController@destroy');
//Route::get('/produk/barcode/{f}', 'ProductController@barcode');

////////////////////////////////////////////PEMBELIAN/////////////////////////////////////////
Route::get('/pembelian', 'PembelianController@index');
Route::get('/pembelian/create/{pembe}', 'PembelianController@create');
Route::post('/pembelian/tambahProduk', 'PembelianController@tambahProduk');
Route::post('/pembelian/store', 'PembelianController@store');
Route::get('/pembelian/detail/{b}', 'PembelianController@detail');


///////////////////////////////////////PEMESANAN/////////////////////////////////////////
Route::get('/pemesanan', 'PemesananController@index');
Route::post('/pemesanan/store', 'PemesananController@store');
Route::get('/pemesanan/create/{pesan}', 'PemesananController@create');
Route::get('/pemesanan/detail/{c}', 'PemesananController@detail');
Route::post('/pemesanan/tambahProduk', 'PemesananController@tambahProduk');


////////////////////////////////////PENERIMAAN/////////////////////////////////////////
// Route::get('/penerimaan', 'PenerimaanController@penerimaan');
Route::get('/penerimaan', 'PenerimaanController@index');
Route::get('/penerimaan/detail/{c}', 'PenerimaanController@detail');
Route::get('/penerimaan/hapus', 'PenerimaanController@destroy');
Route::get('/realise/{x}', 'PenerimaanController@realise');
Route::post('/penerimaan/update', 'PenerimaanController@update');

/////////////////////////////STOK//////////////////////
Route::get('stok', 'PembelianController@stok');
Route::get('stokCabang', 'DeliveriController@stok');

Route::get('deliveri', 'DeliveriController@index');
Route::post('deliveri/store', 'DeliveriController@store');
Route::get('deliveri/detail/{deliv}', 'DeliveriController@detail');
Route::post('deliveri/tambahProduk', 'DeliveriController@tambahProduk');

////////////////////////////////PENJUALAN//////////////////////
Route::get('/penjualan/offline', 'PenjualanController@offline');
Route::post('/penjualan/pembeli', 'PenjualanController@pembeli');
Route::get('/penjualan/detailPembeli/{o}', 'PenjualanController@detail');
Route::get('/penjualan/tambahProduk/{h}', 'PenjualanController@tambah');
Route::post('/penjualan/store', 'PenjualanController@store');
Route::get('/penjualan/offline/struk', 'PenjualanController@cetakPenjualan');

Route::get('/pengeluaran', 'PengeluaranController@index');
Route::post('pengeluaran/store','PengeluaranController@store');

Route::get('laporanPemesanan', 'LaporanController@pemesanan');
Route::get('/laporanPemesanan/filter', 'LaporanController@laporanPemesanan');
Route::get('/laporanPemesanan/cetak_pdf', 'LaporanController@cetakPemesanan');


Route::get('laporanPembelian', 'LaporanController@pembelian');
Route::get('/laporanPembelian/filter', 'LaporanController@laporanPembelian');
Route::get('/laporanPembelian/cetak_pdf', 'LaporanController@cetakPembelian');

Route::get('/laporanPenjualan', 'LaporanController@penjualan');
Route::get('/laporanPenjualan/filter', 'LaporanController@laporanPenjualan');
Route::get('/laporanPenjualan/cetak_pdf', 'LaporanController@cetakPenjualan');

Route::get('laporanPengeluaran', 'LaporanController@pengeluaran');
Route::get('/laporanPengeluaran/filter', 'LaporanController@laporanPengeluaran');
Route::get('/laporanPengeluaran/cetak_pdf', 'LaporanController@cetakPengeluaran');

Route::get('laporanLaba', 'LaporanController@laba');
Route::get('/laporanLaba/filter', 'LaporanController@laporanLaba');
Route::get('/laporanLaba/laba_pdf', 'LaporanController@cetakLaporanLaba');

//  Route::get('pembelian/add/ajax-state',function(){
// 	$kode_produk = input::get("kode_produks");
// 	$sub=DB::table('produks')->select('produks.kode_produk','produks.nama_produk')
// 	->where('produks.kode_produk',$kode_produk)->get();
// 	return $sub;
// });

Route::get('penjualan/add/ajax-state',function(){
	$kode_produk = input::get("kode_produk");
	$sub=DB::table('produks')->select('produks.kode_produk','produks.nama_produk','produks.harga_jual')
	->where('produks.kode_produk',$kode_produk)->get();
	return $sub;
});


Route::get('penjualanKasir/add/ajax-state',function(){
	$kode_produk = input::get("kode_produk");
	$sub=DB::table('produks')->select('produks.kode_produk','produks.nama_produk','produks.harga_jual')
	->where('produks.kode_produk',$kode_produk)->get();
	return $sub;
});


///////////////////////////////KASIR////////////////////////////////////////
Route::prefix('kasir')->group(function()
{
	Route::get('/login', 'KasirController@loginForm')->name('kasir.login');
	Route::post('/login', 'KasirController@login')->name('kasir.login.submit');
	Route::get('/dashboard', 'KasirController@dashboard')->name('kasir.dashboard');
	Route::get('/manageKasir','KasirController@Kasir')->name('kasir.kasir');
	Route::post('/register','KasirController@registerKasir')->name('Kasir.login.store');
	Route::get('/manageKasir','KasirController@kasir')->name('Kasir.kasir');
	Route::post('/registerKasir','KasirController@registerkasir')->name('Kasir.login.kasir');
	Route::get('/kategori', 'KasirController@kategori')->name('kasir.kategori');
	Route::get('/produk', 'KasirController@produk')->name('kasir.produk');
	Route::get('/penjualan', 'KasirController@penjualan')->name('kasir.penjualan');

	
	Route::get('/logout', 'KasirController@logout')->name('kasir.logout');
});

Route::get('/dashboard', 'KasirController@dashboard');
Route::post('/penjualan/kasir', 'KasirController@pembeli');
Route::get('/kasir/detailPembeli/{o}', 'KasirController@detail');
Route::get('/kasir/tambahProduk/{h}', 'KasirController@tambah');
Route::post('/kasir/store', 'KasirController@store');
Route::get('/kasir/struk', 'KasirController@cetakPenjualan');
Route::get('/settingKasir/{ed}', 'KasirController@editKasir');
Route::post('/updateKasir', 'KasirController@updateKasir');



