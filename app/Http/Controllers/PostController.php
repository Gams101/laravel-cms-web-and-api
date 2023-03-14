<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestForm;
use Domain\Post\Actions\CreatePostAction;
use Domain\Post\Actions\ListPostAction;
use Domain\Post\PostRequestData;
use Illuminate\Http\Request;
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

    public function store(PostRequestForm $request)
    {
        $data = PostRequestData::fromRequest($request);

        /** @var CreatePostAction */
        $action = app(CreatePostAction::class);

        $result = $action->execute($data);

        return Response::json($result, 201);
    }

}
