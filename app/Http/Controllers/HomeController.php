<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\keys;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $query = new keys();

        $avail = $query->count();
        $active = $query->where('status', 1)->count();
        $exp = $query->where('status', 2)->count();

        $arr = [
            'available' => $avail,
            'active' => $active,
            'expired' => $exp
        ];

        return view('home.index', compact('arr'));
    }

    public function keym(Request $req) 
    {
        $query = new keys();
        $arr = [];

        $reqFilter = $req->query('f', null);

        $f= [];

        if($reqFilter == 'active'){
            array_push($f, 1);
        }
        else if($reqFilter == 'expired'){
            array_push($f, 2);
        }
        else if($reqFilter == 'unassigned'){
            array_push($f, 0);
        }else{
            array_push($f, 0, 1, 2);
        }

        if($reqFilter){
            $arr = $query
            ->whereIn('status', $f)
            ->paginate(20)
            ->withQueryString();  
        }

        if(count($arr) == 0){
            $arr = $query->paginate(20);
        }

        return view('home.keym', compact('arr'));
    }

    public function search(Request $req) 
    {
        $query = new keys();
        $arr = [];

        $term = $req->query('q', null);
        $lookinto = $req->query('where', null);

        if($term && $lookinto){
                $arr = $query
                ->where($lookinto, $term)
                ->paginate(20)
                ->withQueryString();  
        }

        if(count($arr) == 0){
            $arr = $query->paginate(20);
        }
        
        return view('home.search', compact('arr'));
    }
}
