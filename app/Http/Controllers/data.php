<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\student;

class data extends Controller
{
    public function data(){

        $table1 =  client::all();
        $table2 =  student::all();

        $merge = [
            'data_table1' => $table1,
            'data_table2' => $table2,
        ];

        return response()->json($merge);
    }

    public function list($id=null){

        return $id?student::find($id):student::all();
    }
}
