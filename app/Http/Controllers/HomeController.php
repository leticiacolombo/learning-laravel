<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke() {
        // é executado quando tentam acessar o controller sem passar nenhuma action
        return view('welcome');
    }
}
