<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User as UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerUser()
    {
        $userModel = new UserModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $userModel->save($data);
        return redirect()->to('/login')->with('success', 'Registration successful!');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginUser()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            session()->set('logged_in', $user['id']);
            return redirect()->to('/tasks');
        } else {
            return redirect()->to('/login')->with('error', 'Invalid login credentials.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logged out successfully.');
    }
}
