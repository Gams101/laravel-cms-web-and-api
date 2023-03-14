<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestForm;
use Domain\Post\Actions\CreatePostAction;
use Domain\Post\PostRequestData;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function store(PostRequestForm $request)
    {
        $data = PostRequestData::fromRequest($request);

        /** @var CreatePostAction */
        $action = app(CreatePostAction::class);

        $result = $action->execute($data);

        return Response::json($result, 201);
    }
}
