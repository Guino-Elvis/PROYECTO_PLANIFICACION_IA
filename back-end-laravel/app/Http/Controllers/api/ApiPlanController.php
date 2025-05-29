<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\ApiPlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiPlanController extends Controller
{
    public function index()
    {
        $plans = Plan::with('benefits')->where('status', 2)->get();
        return response()->json($plans, Response::HTTP_OK);
    }


    public function store(ApiPlanRequest $request)
    {

        $plans = Plan::create($request->all());

        if ($request->has('benefits')) {
            $plans->benefits()->sync($request->benefits);
        }
        return response()->json([
            'message' => "Registro creado satisfactoriamente",
            'plan' => $plans->load('benefits')
        ], Response::HTTP_CREATED);
    }


    public function show($id)
    {
        $plans = Plan::with('benefits')->find($id);

        if (!$plans) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }

        return response()->json($plans, 200);
    }


    public function update(ApiPlanRequest $request, $id)
    {
        $plans = Plan::find($id);

        if (!$plans) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }

        $plans->update($request->all());

        if ($request->has('benefits')) {
            $plans->benefits()->sync($request->benefits);
        }

        return response()->json([
            'message' => "Registro actualizado satisfactoriamente",
            'plan' => $plans->load('benefits')
        ], Response::HTTP_OK);
    }


    public function destroy($id)
    {
        $plans = Plan::find($id);

        if (!$plans) {
            return response()->json([
                'message' => "No se encontró el ID especificado para eliminar."
            ], Response::HTTP_NOT_FOUND);
        }
        $plans->delete();

        return response()->json([
            'message' => "Registro eliminado satisfactoriamente"
        ], Response::HTTP_OK);
    }
}
