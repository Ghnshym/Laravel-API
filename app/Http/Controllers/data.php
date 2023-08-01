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

    public function item($data){

        $data = student::where('id', $data)
                ->orWhere('name', 'like', '%' . $data . '%')
                ->orWhere('position', 'like', '%' . $data . '%')
                ->get();
        if(!empty($data)){
            return $data;
        }
        else{
            $obj = "This data not in the table sorry";
            return $obj;
        }
    }

    public function add(Request $request){

        $student = new student;
        $student->name = $request->name;
        $student->company = $request->company;
        $student->position = $request->position;
        $student->save();

        if($student){
            return ['result' => "successfully saved"];
        }else{
            return ['result' => "sorry to saved"];
        }
    }

    public function update(Request $request){

        $student = student::find($request->id);
        $student->name = $request->name;
        $student->company = $request->company;
        $student->position = $request->position;

        $result = $student->save();
        if($result){
            return ['result' => "updated successfully"];
        }else{
            return ['result' => "update fail"];
        }

    }

    public function search($string){

        $search = student::Where('name','like', '%'.$string.'%')->get();
        if(count($search)){

            return $search;
        }else{
            return ['result' => "nothing to search"];
        }
    }

    public function delete($id){

        $delete = student::find($id);
        $delete->delete();
        if($delete){
            return ['result' => "deleted successfully"];
        }
    }
}
