<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AfyaYanguMaishaYangu extends BaseController
{
    public function index(){
    return view('client/afyayangumaishayangu') ;   
    }

    public function school_details(){
        return view('client/schooldetails');
    }
}
