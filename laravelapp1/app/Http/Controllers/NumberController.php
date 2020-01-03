<?php


namespace App\Http\Controllers;


class NumberController extends Controller
{


    public function number() {
        $numbers = [ random_int(0, 100),
            random_int(0, 100),
            random_int(0, 100)
        ];
        return view('number', [ 'numbers' => $numbers ] );
    }

}
