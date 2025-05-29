<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\ApiClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ApiClientController extends Controller
{
     public function index()
    {
        $clients = Client::with('image')->where('status',2)->get();


        $clients->map(function ($client) {
            $client->image_url = $client->image ? Storage::url($client->image->url) : null;
            return $client;
        });

        return response()->json($clients, Response::HTTP_OK);
    }

    public function store(ApiClientRequest $request)
    {
        $clients = Client::create($request->all());
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galery', 'public');
            $image = $clients->image()->create(['url' => $imagePath]);
            $clients->image_url = Storage::url($image->url);
        }
        return response()->json([
            'message' => "Registro creado satisfactoriamente",
            'client' => $clients->load('image')
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $clients = Client::with('image')->find($id);

        $clients->map(function ($client) {
            $client->image_url = $client->image ? Storage::url($client->image->url) : null;
            return $client;
        });
        
        if (!$clients) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }


        return response()->json($clients, 200);
    }

    public function update(ApiClientRequest $request, $id)
    {
        $clients = Client::find($id);

        if (!$clients) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }

        $clients->update($request->except('image'));

        if ($request->hasFile('image')) {
            if ($clients->image) {
                $existingImagePath = $clients->image->url;
                if (Storage::disk('public')->exists($existingImagePath)) {
                    Storage::disk('public')->delete($existingImagePath);
                }
                $clients->image->delete();
            }
            $imagePath = $request->file('image')->store('galery', 'public');
            $image = $clients->image()->create(['url' => $imagePath]);
            $clients->image_url = Storage::url($image->url);
        }
        return response()->json([
            'message' => "Registro actualizado satisfactoriamente",
            'client' => $clients->load('image')
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $clients = Client::find($id);

        if (!$clients) {
            return response()->json([
                'message' => "No se encontró el ID especificado para eliminar."
            ], Response::HTTP_NOT_FOUND);
        }

        if ($clients->image) {
            Storage::disk('public')->delete($clients->image->url);
            $clients->image()->delete();
        }
        $clients->delete();

        return response()->json([
            'message' => "Registro y su imagen eliminados satisfactoriamente"
        ], Response::HTTP_OK);
    }
}
