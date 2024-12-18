<?php

namespace App\Http\API;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="online-platform Swagger API",
 *     description="L5 Swagger OpenApi description",
 *     @OA\Contact(
 *         email="your@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */


class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Get(
     *     path="/api/users",
     *     @OA\Response(
     *         response=200,
     *         description="Display a listing of users."
     *     )
     * )
     */

    public function index(): JsonResponse
    {
        $users = $this->userService->getAllUser();
        return response()->json($users);
    }

    public function findById($id):JsonResponse
    {
        $user = $this->userService->findById($id);
        return response()->json($user);
    }


    /**
     * @OA\Post(
     *     path="/api/users/",
     *     summary="Create a new user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */


    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = $this->userService->createUser($request->all());
        return response()->json($user, 201);
    }


    public function update(Request $request, $id): JsonResponse
    {
        // Валидация входящих данных
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
        ]);

        try {
            // Обновление пользователя через сервис
            $user = $this->userService->updateUser($request->only(['name', 'email']), $id);
            // Возвращение успешного ответа с обновленным пользователем
            return response()->json($user);
        } catch (\Exception $e) {
            // Возвращение ошибки при возникновении исключения
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return response()->json(null, 204);
    }
}
