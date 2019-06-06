<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Cookie;

class HomeController extends Controller
{
    public function inicio(Request $request) {

        $token = '';
        if ($request->hasCookie('viniweb')) {
            $token = getForceSessionData($request->cookie('viniweb'));
            if ($token !== '') {
                return view('inicio', compact('token'));
            }
        }
        return response(view('inicio', compact('token')))->withCookie(new Cookie('viniweb', '', -1));
    }

    public static function getForceSessionData($cookie)
    {
        try {
            $data = decrypt($cookie);
        } catch (\Exception $ex) {
            return [
                'token'      => null,
            ];
        }
        $data = explode('|', $data);
        if (count($data) == 1)
            return 'sdfgafsakcuhdckauchdas';

        return null;
    }
}