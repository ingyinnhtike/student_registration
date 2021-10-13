<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Resources\TownshipCollection;
use App\Repositories\Contracts\TownshipRepository;
use App\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    public function search(Request $request,TownshipRepository $townshipRepository)
    {
        $q = $request->get('q');
        $townships = $townshipRepository->search($q);
        $townships = new TownshipCollection($townships);
        return response()->json($townships);
    }
}
