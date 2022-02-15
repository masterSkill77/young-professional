<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Establishments;
use Exception;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => Establishments::all() ] , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $establishment = new Establishments();
            $establishment->establishment_name = $request->input('establishment_name');

            $establishment->save();
            return response()->json(['data' => $establishment] , 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage() ] , 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => Establishments::find($id)] , 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $establishment = Establishments::find($id);
            $establishment->establishment_name = $request->input('establishment_name');
            $establishment->update();
            return response()->json(['data' => $establishment] , 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()] , 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $establishment = Establishments::find($id);
            $establishment->destroy();
            return response()->json(['data' => $establishment] , 200);
        }        
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()] , 403);
        }
    }
}
