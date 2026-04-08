<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pins;
use App\Models\Stop;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FetchPinController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $pin = Pins::with(['jeepneyRoute'])
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $pin,
        ], Response::HTTP_OK);

    }

    public function fetchStop(Request $request): JsonResponse
    {
        $request->validate([
            'jeepney_route_id' => ['required', 'integer', 'exists:jeepney_routes,id'],
        ]);

        $stops = Stop::where('jeepney_route_id', $request->input('jeepney_route_id'))->get();

        return response()->json([
            'status' => 'success',
            'data' => $stops,
        ], Response::HTTP_OK);
    }
}
