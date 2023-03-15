<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequestForm;
use Domain\Page\Actions\CreatePageAction;
use Domain\Page\Actions\DeletePageAction;
use Domain\Page\Actions\ListPageAction;
use Domain\Page\Actions\UpdatePageAction;
use Domain\Page\Page;
use Domain\Page\PageRequestData;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

class PageController extends Controller
{
    public function list(Request $request)
    {
        $this->authorize('viewAny', Page::class);

        $paginate = $request->query('paginate', 5);

        /** @var ListPageAction */
        $action = app(ListPageAction::class);

        $result = $action->execute($paginate);

        return Response::json($result);
    }

    public function update(int $id, PageRequestForm $request)
    {
        try {
            /** @var Page */
            $model = Page::findOrFail($id);

            $this->authorize('update', $model);

            $data = PageRequestData::fromRequest($request);

            /** @var UpdatePageAction */
            $action = app(UpdatePageAction::class);

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
            /** @var Page */
            $model = Page::findOrFail($id);

            $this->authorize('delete', $model);

            /** @var DeletePageAction */
            $action = app(DeletePageAction::class);

            $result = $action->execute($model);

        } catch (ModelNotFoundException $e) {
            return Response::json(
                ['message' => $e->getMessage()],
                HttpResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return Response::json($result);
    }

    public function store(PageRequestForm $request)
    {
        $this->authorize('create', Page::class);

        $data = PageRequestData::fromRequest($request);

        /** @var CreatePageAction */
        $action = app(CreatePageAction::class);

        $result = $action->execute($data);

        return Response::json($result, 201);
    }
}
