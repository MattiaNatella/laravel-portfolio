<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return 'ciao sono la index';
    }

    public function profile()
    {
        return 'ciao sono la pagina profile';
    }
}
;
