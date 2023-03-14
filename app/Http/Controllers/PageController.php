<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequestForm;
use Domain\Page\Actions\CreatePageAction;
use Domain\Page\Actions\ListPageAction;
use Domain\Page\PageRequestData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
{
    public function list(Request $request)
    {
        $paginate = $request->query('paginate', 5);

        /** @var ListPageAction */
        $action = app(ListPageAction::class);

        $result = $action->execute($paginate);

        return Response::json($result);
    }

    public function store(PageRequestForm $request)
    {
        $data = PageRequestData::fromRequest($request);

        /** @var CreatePageAction */
        $action = app(CreatePageAction::class);

        $result = $action->execute($data);

        return Response::json($result, 201);
    }
}
