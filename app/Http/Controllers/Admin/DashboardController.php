<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    private $view = "Admin/Dashboard";
    
    public function index()
    {
        return Inertia::render("$this->view/Index");
    }
}
