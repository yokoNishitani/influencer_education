<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{    
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showTop() {
        $admin = Admin::all();
        return view('admin.top',['admin' => $admin]);
    }

=======
use Illuminate\Http\Request;

class TopController extends Controller
{
    //
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff
}
