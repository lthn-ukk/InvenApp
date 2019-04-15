<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\Kondisi;


class KondisiController extends Controller
{
    public function addKondisi(){
        $inven = Inventaris::all();
        
        return view('admin.kondisi.addKondisi',['inven'=>$inven]);
    }

    public function storeKondisi(Request $request){

    }
}
