<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        $data = array('title' => 'Profil Pengguna');
        return view('user.profile', $data);
    }
}
