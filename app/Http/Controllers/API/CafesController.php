<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreCafeRequest;
use App\Models\Cafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CafesController extends Controller
{
    //
    public function getCafes()
    {
        $cafes = Cafe::all();
        return response()->json($cafes);

    }

    public function postNewCafe(StoreCafeRequest $request)
    {
        $cafe = new Cafe;
        $cafe->name = $request->name;
        $cafe->addr = $request->addr;
        $cafe->city = $request->city;
        $cafe->state = $request->state;
        $cafe->zip = $request->zip;
        $cafe->latitude = $request->latitude || '';
        $cafe->longitude = $request->longitude || '';

        $cafe->save();
        return response()->json($cafe,201);
    }

    public function getCafe($id)
    {
        $cafe = Cafe::where('id','=',$id)->first();
        return response()->json($cafe);

    }
}
