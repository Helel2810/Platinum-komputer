<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCommentRequest;
use App\Http\Requests\UpdateProductCommentRequest;
use App\Repositories\ProductCommentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductCommentController extends AppBaseController
{
    /** @var  ProductCommentRepository */
    private $productCommentRepository;

    public function __construct(ProductCommentRepository $productCommentRepo)
    {
        $this->productCommentRepository = $productCommentRepo;
    }

    /**
     * Display a listing of the ProductComment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productComments = $this->productCommentRepository->all();

        return view('product_comments.index')
            ->with('productComments', $productComments);
    }

    /**
     * Show the form for creating a new ProductComment.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_comments.create');
    }

    /**
     * Store a newly created ProductComment in storage.
     *
     * @param CreateProductCommentRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCommentRequest $request)
    {
        $input = $request->all();

        $productComment = $this->productCommentRepository->create($input);

        Flash::success('Product Comment saved successfully.');

        return redirect(route('productComments.index'));
    }

    /**
     * Display the specified ProductComment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            Flash::error('Product Comment not found');

            return redirect(route('productComments.index'));
        }

        return view('product_comments.show')->with('productComment', $productComment);
    }

    /**
     * Show the form for editing the specified ProductComment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            Flash::error('Product Comment not found');

            return redirect(route('productComments.index'));
        }

        return view('product_comments.edit')->with('productComment', $productComment);
    }

    /**
     * Update the specified ProductComment in storage.
     *
     * @param int $id
     * @param UpdateProductCommentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductCommentRequest $request)
    {
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            Flash::error('Product Comment not found');

            return redirect(route('productComments.index'));
        }

        $productComment = $this->productCommentRepository->update($request->all(), $id);

        Flash::success('Product Comment updated successfully.');

        return redirect(route('productComments.index'));
    }

    /**
     * Remove the specified ProductComment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productComment = $this->productCommentRepository->find($id);

        if (empty($productComment)) {
            Flash::error('Product Comment not found');

            return redirect(route('productComments.index'));
        }

        $this->productCommentRepository->delete($id);

        Flash::success('Product Comment deleted successfully.');

        return redirect(route('productComments.index'));
    }
}
