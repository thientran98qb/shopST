<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $sidebar = [
            'parent' => 'home'
        ];
        $data['sidebar'] = $sidebar;

        return view('backend.dashboards.index', $data);
    }
}
