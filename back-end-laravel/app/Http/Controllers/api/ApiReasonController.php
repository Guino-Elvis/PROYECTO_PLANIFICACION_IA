<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\ApiReasonRequest;
use App\Models\Reason;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ApiReasonController extends Controller
{
    public function index()
    {
        $reasons = Reason::with('image')->where('status',2)->get();


        $reasons->map(function ($reason) {
            $reason->image_url = $reason->image ? Storage::url($reason->image->url) : null;
            return $reason;
        });

        return response()->json($reasons, Response::HTTP_OK);
    }

    public function store(ApiReasonRequest $request)
    {
        $reasons = Reason::create($request->all());
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galery', 'public');
            $image = $reasons->image()->create(['url' => $imagePath]);
            $reasons->image_url = Storage::url($image->url);
        }
        return response()->json([
            'message' => "Registro creado satisfactoriamente",
            'reason' => $reasons->load('image')
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $reasons = Reason::with('image')->find($id);
        $reasons->map(function ($reason) {
            $reason->image_url = $reason->image ? Storage::url($reason->image->url) : null;
            return $reason;
        });

        if (!$reasons) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }

        return response()->json($reasons, 200);
    }

    public function update(Request $request, $id)
    {
        $reasons = Reason::find($id);

        if (!$reasons) {
            return response()->json(['message' => "No se encontró el ID especificado."], Response::HTTP_NOT_FOUND);
        }

        $reasons->update($request->except('image'));

        if ($request->hasFile('image')) {
            if ($reasons->image) {
                $existingImagePath = $reasons->image->url;
                if (Storage::disk('public')->exists($existingImagePath)) {
                    Storage::disk('public')->delete($existingImagePath);
                }
                $reasons->image->delete();
            }
            $imagePath = $request->file('image')->store('galery', 'public');
            $image = $reasons->image()->create(['url' => $imagePath]);
            $reasons->image_url = Storage::url($image->url);
        }
        return response()->json([
            'message' => "Registro actualizado satisfactoriamente",
            'reason' => $reasons->load('image')
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $reasons = Reason::find($id);

        if (!$reasons) {
            return response()->json([
                'message' => "No se encontró el ID especificado para eliminar."
            ], Response::HTTP_NOT_FOUND);
        }

        if ($reasons->image) {
            Storage::disk('public')->delete($reasons->image->url);
            $reasons->image()->delete();
        }
        $reasons->delete();

        return response()->json([
            'message' => "Registro y su imagen eliminados satisfactoriamente"
        ], Response::HTTP_OK);
    }
}
