<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function about(){
        $name = "悟空";
        $js = "<script>alert('hi');</script>";
        $heros = ["魯夫","鳴人","佐助","達爾"];
        return view("about",['name'=>$name,'js'=>$js,'heros'=>$heros]);
    }

    public function preg(){
        return view("pregtest");

    }

}
