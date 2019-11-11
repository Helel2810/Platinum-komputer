<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SubCategoryRepository;
use App\Repositories\BrandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;
    private $categoryRepository;
    private $subCategoryRepository;
    private $brandRepository;


    public function __construct(ProductRepository $productRepo, CategoryRepository $categoryRepo, SubCategoryRepository $subCategoryRepo, BrandRepository $brandRepo)
    {
        $this->productRepository = $productRepo;
        $this->categoryRepository = $categoryRepo;
        $this->subCategoryRepository = $subCategoryRepo;
        $this->brandRepository = $brandRepo;


    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->all();

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        $subCategories = $this->subCategoryRepository->all();
        $brand = $this->brandRepository->all();
        $data =
        [
          'categories' => $categories->pluck('name', 'id'),
          'subCategories' => $subCategories->pluck('name', 'id'),
          'brands' => $brand->pluck('name', 'id'),
        ];
        return view('products.create')->with($data);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        if ($files = $request->file('image1')) {
            $destinationPath = public_path('images'); // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $input['image1'] = asset('images/'.$profileImage);
         }

         if ($files = $request->file('image2')) {
             $destinationPath = public_path('images'); // upload path
             $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
             $files->move($destinationPath, $profileImage);
             $input['image2'] = asset('images/'.$profileImage);
          }

          if ($files = $request->file('image3')) {
              $destinationPath = public_path('images'); // upload path
              $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
              $files->move($destinationPath, $profileImage);
              $input['image3'] = asset('images/'.$profileImage);
           }

           if ($files = $request->file('image4')) {
               $destinationPath = public_path('images'); // upload path
               $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $profileImage);
               $input['image4'] = asset('images/'.$profileImage);
            }

        $input['admin_id'] = 1;

        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        $categories = $this->categoryRepository->all();
        $subCategories = $this->subCategoryRepository->all();
        $brand = $this->brandRepository->all();


        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $data = [
          'product' => $product,
          'categories' => $categories->pluck('name', 'id'),
          'subCategories' => $subCategories->pluck('name', 'id'),
          'brands' => $brand->pluck('name', 'id'),
        ];

        return view('products.edit')->with($data);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $input = $request->all();

        if ($files = $request->file('image1')) {
            $destinationPath = public_path('images'); // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $input['image1'] = asset('images/'.$profileImage);
         }

         if ($files = $request->file('image2')) {
             $destinationPath = public_path('images'); // upload path
             $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
             $files->move($destinationPath, $profileImage);
             $input['image2'] = asset('images/'.$profileImage);
          }

          if ($files = $request->file('image3')) {
              $destinationPath = public_path('images'); // upload path
              $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
              $files->move($destinationPath, $profileImage);
              $input['image3'] = asset('images/'.$profileImage);
           }

           if ($files = $request->file('image4')) {
               $destinationPath = public_path('images'); // upload path
               $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $profileImage);
               $input['image4'] = asset('images/'.$profileImage);
            }

        $input['admin_id'] = 1;

        $product = $this->productRepository->update($input, $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
