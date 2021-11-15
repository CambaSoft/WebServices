<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseOk($data)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Done.',
            'data' => $data
        ], 200);
    }

    public function responseCreated($data)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Created Successfully.',
            'data' => $data
        ], 201);
    }

    public function responseBadRequest($data)
    {
        return response()->json([
            'status' => 'warning',
            'message' => 'Wrong Information.',
            'data' => $data
        ], 400);
    }

    public function responseNotFound($data)
    {
        return response()->json([
            'status' => 'warning',
            'message' => 'Not Found.',
            'data' => $data
        ], 404);
    }
}
