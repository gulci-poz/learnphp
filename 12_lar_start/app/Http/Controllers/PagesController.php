<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function contact() {
        return view('pages.contact');
    }

    public function about() {
        //1
        /*
        //<h1>About <?= $name; ?></h1>
        //<h1>About {{ $name }}</h1>
        //<h1>About {!! $name !!}</h1>
        */
        /*
        $name = 'Sebastian <span style="color: red;">Gulczynski</span>';
        return view('pages.about')->with('name', $name);
        */

        //2
        //<h1>About {{ $first }} {{ $last }}</h1>
        /*
        return view('pages.about')->with([
            'first' => 'Sebastian',
            'last' => 'Gulczynski'
        ]);
        */

        //3
        //<h1>About {{ $first }} {{ $last }}</h1>
        /*
        $data = [];
        $data['first'] = 'Sebastian';
        $data['last'] = 'Gulczynski';
        return view('pages.about', $data);
        */

        //4
        //<h1>About {{ $first }} {{ $last }}</h1>
        /*
        $first = 'Sebastian';
        $last = 'Gulczynski';
        return view('pages.about', compact('first', 'last'));
        */
        /*
        @if ($first == 'John')
        <h1>About John</h1>
        @else
        <h1>About {{ $first }} {{ $last }}</h1>
        @endif
        */

        $people = ['Karolina', 'Sebastian', 'Wiktoria', 'Melania'];
        return view('pages.about', compact('people'));
    }
}
