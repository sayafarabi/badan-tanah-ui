<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        return view('admin.footer');
    }

    public function update(Request $request)
    {
        return redirect()->route('admin.footer.index')->with('success', 'Footer berhasil diubah!');
    }
}