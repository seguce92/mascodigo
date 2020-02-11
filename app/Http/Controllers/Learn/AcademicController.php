<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resources\ModelResource as Resource;

class AcademicController extends Controller
{
    protected $course;

    public function __construct () {
        $this->course = app(\App\Entities\Learn\Course::class);
    }
    
    public function index () {
        return view('admin::learn.academic.index', [
            'courses'   =>  $this->course->all()
        ]);
    }

    public function store (Request $request) {

    }


    public function courses () {
        $data = $this->course->all();

        return (new Resource(
            $data
        ));
    }

    public function advance () {
        $data = $this->course->all();

        return (new Resource(
            $data
        ));
    }

    public function completed () {
        $data = $this->course->all();

        return (new Resource(
            $data
        ));
    }


    public function favorite () {
        $data = $this->course->all();

        return (new Resource(
            $data
        ));
    }

    public function history () {
        $data = $this->course->all();

        return (new Resource(
            $data
        ));
    }
}
