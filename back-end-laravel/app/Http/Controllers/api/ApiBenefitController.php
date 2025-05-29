<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\ApiBenefitRequest;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiBenefitController extends Controller
{

    public function index()
    {
        $benefits = Benefit::all();
        return response()->json($benefits, Response::HTTP_OK);
    }
   
 
    public function store(ApiBenefitRequest $request)
    {
        $benefits = Benefit::create($request->all());

        return response()->json([
            'message' => "Registro creado satisfactoriamente",
            'benefit' => $benefits
        ], Response::HTTP_CREATED);
    }
   
   
    public function update(ApiBenefitRequest $request, $id)
    {
        $benefits = Benefit::find($id);
        if (!$benefits) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }
        $benefits->update($request->all()); 
        return response()->json([
            'message' => "Registro actualizado satisfactoriamente",
            'benefit' => $benefits
        ], Response::HTTP_OK);
    }

   
    public function destroy($id)
    {
        $benefits = Benefit::find($id);

        if (!$benefits) {
            return response()->json([
                'message' => "No se encontró el ID especificado para eliminar."
            ], Response::HTTP_NOT_FOUND);
        }
        $benefits->delete();

        return response()->json([
            'message' => "Registro eliminado satisfactoriamente"
        ], Response::HTTP_OK);
    }
   
 }