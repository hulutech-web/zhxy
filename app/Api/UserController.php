<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\SchoolResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function __construct() {
        $this->middleware('auth:sanctum');
    }

    public function info() {
        return new UserResource(Auth::user());
    }

    public function index() {
//        $users = User::paginate(10);
        $users = User::all();

        return UserResource::collection($users);
    }

    public function store(UserRequest $request, User $user) {
        $user->fill($request->input());
        $user['password'] = Hash::make($request->password);
        $user->save();

        return ['message' => '用户修改成功'];
    }

    public function destroy(Request $request, User $user) {
        $user->delete();

        return ['message' => '用户修改成功'];
    }

    public function show(Request $request, User $user) {
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user) {
        $user->fill($request->input())->save();

        return ['message' => '用户更新成功'];
    }
}
