<?php

use Illuminate\Support\Facades\Route;

//LOGIN


Route::get('/', 'HomeController@index')->name('home');
Route::get('/warta/{slug}', 'PublishController@showWarta');

Route::middleware('guest')->group(function() {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@store')->name('login');
    Route::get('/registrasi', 'LoginController@registrasi')->name('registrasi');
    Route::post('/registrasi', 'LoginController@storeregistrasi')->name('registrasi');
    
});

//ADMIN
Route::middleware('auth')->group(function() {
    Route::get('/admin', 'DashboardAdminController@index');
    Route::get('/users', 'UsersController@index');
    Route::get('/menu', 'MenuController@index');
    Route::get('/editMenu', 'MenuController@editMenu');
    Route::get('/editRapat', 'RapatController@editRapat');
    Route::get('/role-menu', 'MenuController@roleMenu');
    Route::get('/accessMenu', 'MenuController@accessMenu');
    Route::get('/showSubmenu', 'MenuController@showSubmenu');
    Route::get('/admin-warta', 'UserViewController@admin_warta');
    Route::get('/publish/{slug}', 'PublishController@showPublish');
    Route::get('/admin-galeri', 'PublishController@admin_galeri');
    Route::get('/admin-visimisi', 'VisimisiController@index');

    Route::get('/admin-jabatan', 'MasterDataController@jabatan');
    Route::get('/admin-partai', 'MasterDataController@partai');
    Route::get('/admin-komisi', 'MasterDataController@komisi');
    Route::get('/admin-anggota', 'MasterDataController@anggota');
    Route::get('/admin-pendidikan', 'MasterDataController@pendidikan');
    Route::get('/admin-ruang-rapat', 'MasterDataController@ruang_rapat');

    Route::get('/admin-agenda-rapat', 'RapatController@index');
    Route::get('/admin-hasil-rapat', 'RapatController@hasil_rapat');
    Route::get('/admin-selesaikan-rapat', 'RapatController@selesaikan_rapat');
    Route::get('/admin-arsip-rapat', 'RapatController@arsip_rapat');
    Route::get('/admin-susunan-organisasi', 'OrganisasiController@index');
    Route::get('/admin-tugas-pokok', 'OrganisasiController@tugas_pokok');
    Route::get('/admin-tugas-fungsi', 'OrganisasiController@tugas_fungsi');
    Route::get('/admin-struktur', 'OrganisasiController@struktur_organisasi');

    Route::get('/admin-register', 'UsersController@dataregistrasi');
    Route::get('/admin-register-accept/{id}', 'UsersController@register_accept');
    Route::get('/admin-register-delete/{id}', 'UsersController@register_delete');

    Route::get('/admin-aspirasi', 'AspirasiController@index');
    Route::get('/admin-aspirasi/{id}', 'AspirasiController@show');
    Route::get('/admin-proses-aspirasi/{id}', 'AspirasiController@proses');
    Route::get('/admin-aspirasi-accept/{id}', 'AspirasiController@accept');
    Route::post('/admin-create-hasil-aspirasi', 'AspirasiController@hasil');

    //USER
    Route::post('/create-aspirasi', 'AspirasiController@store');

    //POST METHOD
    Route::post('/createRole', 'UsersController@createRole');
    Route::post('/deleteRole', 'UsersController@deleteRole');

    Route::post('/createUser', 'UsersController@createUser');

    Route::post('/createAccess', 'MenuController@createAccess');

    Route::post('/createMenu', 'MenuController@createMenu');
    Route::post('/updateMenu', 'MenuController@updateMenu');
    Route::post('/deleteMenu', 'MenuController@deleteMenu');

    Route::post('/deleteSubmenu', 'MenuController@deleteSubmenu');
    Route::post('/createSubmenu', 'MenuController@createSubmenu');

    Route::post('/createPublish', 'PublishController@createPublish');
    Route::post('/deletePublish', 'PublishController@deletePublish');

    Route::post('/createVisimisi', 'VisimisiController@createVisimisi');
    Route::post('/deleteVisimisi', 'VisimisiController@deleteVisimisi');
    Route::post('/updateVisimisi', 'VisimisiController@updateVisimisi');

    Route::post('/createVisimisi', 'VisimisiController@createVisimisi');

    Route::post('/createJabatan', 'MasterDataController@createJabatan');
    Route::post('/deleteJabatan', 'MasterDataController@deleteJabatan');
    Route::post('/updateJabatan', 'MasterDataController@updateJabatan');

    Route::post('/createPartai', 'MasterDataController@createPartai');
    Route::post('/deletePartai', 'MasterDataController@deletePartai');
    Route::post('/updatePartai', 'MasterDataController@updatePartai');

    Route::post('/createRuangan', 'MasterDataController@createRuangan');
    Route::post('/deleteRuangan', 'MasterDataController@deleteRuangan');
    Route::post('/updateRuangan', 'MasterDataController@updateRuangan');

    Route::post('/createKomisi', 'MasterDataController@createKomisi');
    Route::post('/deleteKomisi', 'MasterDataController@deleteKomisi');
    Route::post('/updateKomisi', 'MasterDataController@updateKomisi');

    Route::post('/createAnggota', 'MasterDataController@createAnggota');
    Route::post('/deleteAnggota', 'MasterDataController@deleteAnggota');
    Route::post('/updateAnggota', 'MasterDataController@updateAnggota');

    Route::post('/createPendidikan', 'MasterDataController@createPendidikan');
    Route::post('/deletePendidikan', 'MasterDataController@deletePendidikan');
    Route::post('/updatePendidikan', 'MasterDataController@updatePendidikan');

    Route::post('/createRapat', 'RapatController@createRapat');
    Route::post('/createHasilRapat', 'RapatController@createHasilRapat');
    Route::post('/deleteRapat', 'RapatController@deleteRapat');
    Route::post('/deleteHasilRapat', 'RapatController@deleteHasilRapat');
    Route::post('/updateRapat', 'RapatController@updateRapat');

    Route::post('/createOrganisasi', 'OrganisasiController@createOrganisasi');
    Route::post('/deleteOrganisasi', 'OrganisasiController@deleteOrganisasi');
    Route::post('/updateOrganisasi', 'OrganisasiController@updateOrganisasi');

    Route::post('/createTugasPokok', 'OrganisasiController@createTugasPokok');
    Route::post('/deleteTugasPokok', 'OrganisasiController@deleteTugasPokok');
    Route::post('/updateTugasPokok', 'OrganisasiController@updateTugasPokok');

    Route::post('/createTugasFungsi', 'OrganisasiController@createTugasFungsi');
    Route::post('/deleteTugasFungsi', 'OrganisasiController@deleteTugasFungsi');
    Route::post('/updateTugasFungsi', 'OrganisasiController@updateTugasFungsi');

    Route::post('/createStruktur', 'OrganisasiController@createStruktur');
    Route::post('/deleteStruktur', 'OrganisasiController@deleteStruktur');
    Route::post('/updateStruktur', 'OrganisasiController@updateStruktur');

    //LOGOUT
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::get('/change-password', 'LoginController@change_password');
    Route::post('/change-password', 'LoginController@update_password');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
