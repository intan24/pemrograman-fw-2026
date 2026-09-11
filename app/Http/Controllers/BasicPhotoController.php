<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicPhotoController extends Controller { 
    
public function show($id) {
     // Me-return view dengan mengirimkan variabel id (tanpa Model database) 
     return view('photos.show', ['id' => $id]); 
     }
} 