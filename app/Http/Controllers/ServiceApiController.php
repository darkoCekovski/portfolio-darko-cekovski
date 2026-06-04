<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceApiController extends Controller
{
    public function show(string $name): JsonResponse
    {
        // Use locale from query param if provided, fall back to app locale
        $locale = request()->query('locale', app()->getLocale());
        app()->setLocale($locale);

        $service = Service::where('name', $name)->firstOrFail();

        return response()->json([
            'id'          => $service->id,
            'name'        => $service->name,
            'icon'        => $service->icon,
            'title'       => $service->translated_title,
            'description' => $service->translated_description,
        ]);
    }
}
