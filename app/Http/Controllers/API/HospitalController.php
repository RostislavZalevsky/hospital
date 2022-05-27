<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth:api',
            'api.doctor',
        ]);
    }

    public function getPatients(Request $request) // By Doctor!
    {
        $user = $request->user();

        return response()->json($user->doctor()->patients()->get());
    }
}
