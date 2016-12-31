<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function XinChao() {
    	echo "Hello, this is a controller";
    }

    public function MayTinh($a, $b) {
    	echo "Tong la: " . ($a + $b);
    	return redirect() -> route('asker');
    }

    public function GetUrl(Request $request) {
    	echo "Current path: " . $request->path() . "<br/>";
    	echo "Full path: " . $request->url() . "<br/>";
    	echo "Is Post method: " . ($request->isMethod('post') == true ? "yes" : "no"). "<br/>";
    	echo "Is contains 'Get': " . ($request->is('Get*') == true ? "yes" : "no");
    }

    public function getName(Request $request) {
    	echo "Your name is: " . $request->hoTen;
    }
}
