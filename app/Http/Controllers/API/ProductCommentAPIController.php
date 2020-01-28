<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductCommentAPIRequest;
use App\Http\Requests\API\UpdateProductCommentAPIRequest;
use App\Models\ProductComment;
use App\Repositories\ProductCommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProductCommentController
 * @package App\Http\Controllers\API
 */

class ProductCommentAPIController extends AppBaseController
{
    /** @var  ProductCommentRepository */
    private $productCommentRepository;

    public function __construct(ProductCommentRepository $productCommentRepo)
    {
        $this->productCommentRepository = $productCommentRepo;
    }

    /**
     * Display a listing of the ProductComment.
     * GET|HEAD /productComments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $productComments = $this->productCommentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($productComments->toArray(), 'Product Comments retrieved successfully');
    }

    /**
     * Store a newly created ProductComment in storage.
     * POST /productComments
     *
     * @param CreateProductCommentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCommentAPIRequest $request)
    {
        $input = $request->all();

        $productComment = $this->productCommentRepository->create($input);

        return $this->sendResponse($productComment->toArray(), 'Product Comment saved successfully');
    }

    /**
     * Display the specified ProductComment.
     * GET|HEAD /productComments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductComment $productComment */
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            return $this->sendError('Product Comment not found');
        }

        return $this->sendResponse($productComment->toArray(), 'Product Comment retrieved successfully');
    }

    /**
     * Update the specified ProductComment in storage.
     * PUT/PATCH /productComments/{id}
     *
     * @param int $id
     * @param UpdateProductCommentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductCommentAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductComment $productComment */
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            return $this->sendError('Product Comment not found');
        }

        $productComment = $this->productCommentRepository->update($input, $id);

        return $this->sendResponse($productComment->toArray(), 'ProductComment updated successfully');
    }

    /**
     * Remove the specified ProductComment from storage.
     * DELETE /productComments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductComment $productComment */
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            return $this->sendError('Product Comment not found');
        }

        $productComment->delete();

        return $this->sendSuccess('Product Comment deleted successfully');
    }
}
