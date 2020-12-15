<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\User;
use App\Http\Resources\UserCollection;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getUsers(Request $request)
    {
        $users = $this->userService->getAllUsers($request->all());

        return new UserCollection($users);
    }

    public function getUser($id)
    {
        $user = $this->userService->getUser($id);

        return new User($user);
    }

    public function storeUser(StoreUser $request)
    {
        $user = $this->userService->addUser($request->validated());

        return (new User($user))->additional([
            'message' => __('messages.users.created')
        ]);
    }

    public function register(StoreUser $request)
    {
        $user = $this->userService->addUser($request->validated());

        return (new User($user))->additional([
            'message' => __('messages.users.regisrered')
        ]);
    }

    public function updateUser($id, UpdateUSer $request)
    {
        $this->userService->updateUser($id, $request->validated());

        return response([
            'message' => __('messages.users.updated')
        ], 200);
    }

    public function deleteUser($id)
    {
        $this->userService->deleteUser($id);

        return response([
            'message'   => __('messages.users.deleted')
        ], 200);
    }


}
