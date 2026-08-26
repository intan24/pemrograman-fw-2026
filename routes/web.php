<?php

use Illuminate\Support\Facades\Route;

/* 1. ROUTING DASAR & HTTP VERBS 
*/
// Rute Bawaan Laravel
Route::get('/', function () {
    return view('welcome');
});

// Rute GET Sederhana
Route::get('/halo', function () {
    return 'Halo, selamat datang di praktikum Laravel!';
});



/*
2. ROUTE PARAMETERS & CONSTRAINTS 
*/
// A. Parameter Wajib (Required Parameter)
Route::post('/user/{id}', function ($id) {
    return 'ID Pengguna: ' . $id;
});

// B. Parameter Opsional (Optional Parameter dengan Nilai Default)
Route::get('/salam/{nama?}', function ($nama = 'Tamu') {
    return 'Selamat datang, ' . $nama;
});

// C. Regex Constraint (Membatasi parameter 'id' hanya boleh angka)
Route::get('/produk/{id}', function ($id) {
    return 'Detail Produk ID: ' . $id;
})->where('id', '[0-9]+');


/*
3. NAMED ROUTES & REDIRECT
*/
// Definisi Rute dengan Alias Nama 'profile'
Route::get('/profile-pengguna-lama-yang-panjang', function () {
    return 'Ini adalah Halaman Profil Pengguna';
})->name('profile.show');

// Rute lain yang melakukan pengalihan (Redirect) menggunakan Named Route
Route::get('/tes-redirect', function () {
    return redirect()->route('profile');
});


/*
4. ROUTE GROUPS 
*/
// Mengelompokkan Rute dengan Prefix '/admin'
Route::prefix('admin')->group(function () {
    
    // Akses: http://127.0.0.1:8000/admin/dashboard
    Route::get('/dashboard', function () {
        return 'Halaman Dashboard Admin';
    });

    // Akses: http://127.0.0.1:8000/admin/users
    Route::get('/users', function () {
        return 'Halaman Kelola Data Users';
    });

});


/* 5. RESOURCE ROUTES 
*/ 
// Otomatis membangkitkan 7 rute CRUD standar (index, create, store, show, edit, update, destroy)
Route::resource('photos', App\Http\Controllers\PhotoController::class);