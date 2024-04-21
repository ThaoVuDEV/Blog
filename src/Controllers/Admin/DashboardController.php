<?php

namespace Bomdev\Asmoop\Controllers\Admin;

use Bomdev\Asmoop\Commons\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->renderViewAdmin('dashboard');
    }
}
