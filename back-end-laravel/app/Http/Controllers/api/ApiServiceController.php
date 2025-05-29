<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\ApiServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ApiServiceController extends Controller
{
     public function index()
    {
        $services = Service::with('image')->where('status',2)->get();


        $services->map(function ($service) {
            $service->image_url = $service->image ? Storage::url($service->image->url) : null;
            return $service;
        });

        return response()->json($services, Response::HTTP_OK);
    }

    public function store(ApiServiceRequest $request)
    {
        $services = Service::create($request->all());
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galery', 'public');
            $image = $services->image()->create(['url' => $imagePath]);
            $services->image_url = Storage::url($image->url);
        }
        return response()->json([
            'message' => "Registro creado satisfactoriamente",
            'service' => $services->load('image')
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $services = Service::with('image')->find($id);
        $services->map(function ($service) {
            $service->image_url = $service->image ? Storage::url($service->image->url) : null;
            return $service;
        });

        if (!$services) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }

        return response()->json($services, 200);
    }

    public function update(ApiServiceRequest $request, $id)
    {
        $services = Service::find($id);

        if (!$services) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }

        $services->update($request->except('image'));

        if ($request->hasFile('image')) {
            if ($services->image) {
                $existingImagePath = $services->image->url;
                if (Storage::disk('public')->exists($existingImagePath)) {
                    Storage::disk('public')->delete($existingImagePath);
                }
                $services->image->delete();
            }
            $imagePath = $request->file('image')->store('galery', 'public');
            $image = $services->image()->create(['url' => $imagePath]);
            $services->image_url = Storage::url($image->url);
        }
        return response()->json([
            'message' => "Registro actualizado satisfactoriamente",
            'service' => $services->load('image')
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $services = Service::find($id);

        if (!$services) {
            return response()->json([
                'message' => "No se encontró el ID especificado para eliminar."
            ], Response::HTTP_NOT_FOUND);
        }

        if ($services->image) {
            Storage::disk('public')->delete($services->image->url);
            $services->image()->delete();
        }
        $services->delete();

        return response()->json([
            'message' => "Registro y su imagen eliminados satisfactoriamente"
        ], Response::HTTP_OK);
    }
}
