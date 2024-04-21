<?php

namespace Bomdev\Asmoop\Controllers\Admin;
use Bomdev\Asmoop\Commons\Controller;
class HomeController extends Controller{
    public function index(){
        return $this->renderViewAdmin('home', 
        [
        ]);
    }
}