<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function setCookie() {
        $response = new Response();
        $response->withCookie("UserName", "Bao Toan", 0.3);
        echo "Set cookie successful";
        return $response;
    }

    public function getCookie(Request $request) {
        echo $request->cookie("UserName");
    }

    public function uploadFile(Request $request) {
        if($request->hasFile('myFile')) {
            $file = $request->file('myFile');

            echo 'File size: '.$file->getClientSize('myFile').'<br/>';
            echo 'Mime type: '.$file->getClientMimeType('myFile').'<br/>';
            echo 'Original name: '.$file->getClientOriginalName('myFile').'<br/>';
            echo 'Original extension: '.$file->getClientOriginalExtension('myFile').'<br/>';
            echo 'Is valid: '.$file->isValid('myFile').'<br/>';

            if($file->isValid('myFile')) {
                $file->move('img', $file->getClientOriginalName('myFile'));
                echo "Upload successful";
            } else {
                echo "Upload fail";
            }
        } else {
            echo "There is no file to upload";
        }
    }

    public function getJson() {
        return response()->json(['name'=>'Bao Toan', 'age'=>22]);
    }

    public function getMyView() {
        return view('myViews.welcome');
    }

    public function showTime($time) {
        return view('myViews.welcome', ['time'=>$time]);
    }

    public function blade($viewName) {
        return view('pages.'.$viewName);
    }

    public function getHello($name) {
        return view('pages.welcome', ['name'=>$name]);
    }

    public function demoCondition() {
        return view('pages.condition', ['name'=>'Bao Toan']);
    }
}
