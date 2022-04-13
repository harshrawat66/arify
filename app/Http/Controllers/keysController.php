<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keys;
use Illuminate\Support\Str;

class keysController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function genView() 
    {
        return view('keygen.forms');
    }

    public function batchGenView() 
    {
        return view('keygen.batchforms');
    }

    public function savekey(Request $req) 
    {
        $body = $req->all();
        $query = new keys();

        if(!$body['name'] || $body['name'] == ""){
            abort(500);
        }
        if(!$body['mobile'] || $body['mobile'] == ""){
            abort(500);
        }
        if(!$body['email'] || $body['email'] == ""){
            abort(500);
        }
        if(!$body['productKey'] || $body['productKey'] == ""){
            abort(500);
        }

        $res = $query->insert([
            'name' => $body['name'],
            'mobile' => $body['mobile'],
            'email' => $body['email'],
            'productKey' => $body['productKey'],
        ]);
        
        return $res;
    }

    public function index() 
    {
        //
    }

    public function keyGen() 
    {
        $batchNo = 'ASK-';
        $uuid = Str::uuid()->toString();
        return $batchNo . $uuid;
    }

    public function batchSavekey(Request $req){
        $body = $req->all();
        $query = new keys();
        $genKeys = [];

        for($i = 0 ; $i < (int)$body['batchCount'] ; $i++){
            $uuid = Str::uuid()->toString();
            $key = $body['batchNumber'] . '-' . $uuid;
            $genKeys[] = [ 
                'productKey' => $key
            ];
        }

        $query->insert($genKeys);

        return true;
    }

    public function editKey(Request $req){
        $query = new keys();

        $arr = keys::where('id', (int)request('keyId'))->get();

        return view('keygen.edit', compact('arr'));
    }

    public function updateKey(Request $req){
        $query = new keys();

        $keys = [
            'id' => request('id'),
            'name' => request('name'),
            'mobile' => request('mobile'),
            'phonemodel' => request('phonemodel'),
            'email' => request('email'),
            'macaddress' => request('macaddress'),
            'productKey' => request('productKey'),
            'validtill' => request('validtill'),
            'status' => request('status'),
        ];

        $arr = $query->paginate(20);

        $query->where('id', (int)request('id'))->update($keys);

        return view('home.keym', compact('arr'));
    }
}
