<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Http\Resources\SchoolResource;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $schools = School::all();
        return SchoolResource::collection($schools);
    }

    public function show(School $school)
    {
        return new SchoolResource($school);
    }

    public function store(Request $request, School $school)
    {
        $school->fill($request->input());
        $school->user_id = Auth::id();
        $school->save();
        return ['message' => '学校添加成功'];
    }


    public function update(Request $request, School $school)
    {
        $school->fill($request->input())->save();
        return ['message' => '学校修改成功'];
    }


    public function destroy(Request $request, School $school) {
        $school->delete();
        return ['message' => '学校修改成功'];
    }
}
