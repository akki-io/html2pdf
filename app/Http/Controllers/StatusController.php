<?php

namespace App\Http\Controllers;

class StatusController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message' => 'Request successfully completed.']);
    }
}
