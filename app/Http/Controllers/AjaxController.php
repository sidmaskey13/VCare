<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use App\Work;
use App\Field;

class AjaxController extends Controller
{
    public function ajax($id)
    {
//        $field=Field::where('id',$id)->get();
//        return response()->json($field);

        $field=Doctor::where('field_id',$id)->get();
        return response()->json($field);
    }
}
