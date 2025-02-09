<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        return view('dashboard');
    }
}