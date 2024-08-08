<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfileForm()
    {
        return view('user.profile_edit');
    }
}
