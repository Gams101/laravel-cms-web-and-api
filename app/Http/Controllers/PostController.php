<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestForm;
use Domain\Post\Actions\CreatePostAction;
use Domain\Post\Actions\DeletePostAction;
use Domain\Post\Actions\ListPostAction;
use Domain\Post\Actions\UpdatePostAction;
use Domain\Post\Post;
use Domain\Post\PostRequestData;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function list(Request $request)
    {
        $paginate = $request->query('paginate', 5);

        /** @var ListPostAction */
        $action = app(ListPostAction::class);

        $result = $action->execute($paginate);

        return Response::json($result);
    }

    public function update(int $id, PostRequestForm $request)
    {
        try {
            /** @var Post */
            $model = Post::findOrFail($id);

            $data = PostRequestData::fromRequest($request);

            /** @var UpdatePostAction */
            $action = app(UpdatePostAction::class);

            $result = $action->execute($model, $data);

        } catch (ModelNotFoundException $e) {
            return Response::json(
                ['message' => $e->getMessage()],
                HttpResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return Response::json($result);
    }

    public function destroy(int $id)
    {
        try {
            /** @var Post */
            $model = Post::findOrFail($id);

            /** @var DeletePostAction */
            $action = app(DeletePostAction::class);

            $result = $action->execute($model);

        } catch (ModelNotFoundException $e) {
            return Response::json(
                ['message' => $e->getMessage()],
                HttpResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return Response::json($result);
    }

    public function store(PostRequestForm $request)
    {
        $data = PostRequestData::fromRequest($request);

        /** @var CreatePostAction */
        $action = app(CreatePostAction::class);

        $result = $action->execute($data);

        return Response::json($result, 201);
    }

}
