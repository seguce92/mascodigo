<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use \App\Resources\ModelResource;
use App\Http\Controllers\Controller;

class DataController extends Controller
{

    public function searchGlobal (Request $request) {
        /*$data = \App\Entities\Learn\Lesson::where('title', 'like', '%'.$request->q.'%')
            ->orWhere('content', 'like', '%'.$request->q.'%')
            ->get();*/

        $data = \App\Entities\Learn\Lesson::with(['course.skill'])->get();

        return (new ModelResource($data))
            ->response()
            ->setStatusCode(201);
    }
}
