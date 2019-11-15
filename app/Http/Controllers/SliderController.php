<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Repositories\SliderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\BrandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SliderController extends AppBaseController
{
    /** @var  SliderRepository */
    private $sliderRepository;
    private $productRepository;
    private $brandRepository;

    public function __construct(SliderRepository $sliderRepo, ProductRepository $productRepo, BrandRepository $brandRepo)
    {
        $this->sliderRepository = $sliderRepo;
        $this->productRepository = $productRepo;
        $this->brandRepository = $brandRepo;
    }

    /**
     * Display a listing of the Slider.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sliders = $this->sliderRepository->all();

        return view('sliders.index')
            ->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new Slider.
     *
     * @return Response
     */
    public function create()
    {
        $products =$this->productRepository->all();
        $brands = $this->brandRepository->all();

        $data =
        [
          'products' => $products->pluck('name', 'id'),
          'brands' => $brands->pluck('name', 'id'),
        ];

        return view('sliders.create')->with($data);
    }

    /**
     * Store a newly created Slider in storage.
     *
     * @param CreateSliderRequest $request
     *
     * @return Response
     */
    public function store(CreateSliderRequest $request)
    {
        $input = $request->all();

        $slider = $this->sliderRepository->create($input);

        Flash::success('Slider saved successfully.');

        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified Slider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        return view('sliders.show')->with('slider', $slider);
    }

    /**
     * Show the form for editing the specified Slider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        $products =$this->productRepository->all();
        $brands = $this->brandRepository->all();

        $data =
        [
          'slider' => $slider,
          'products' => $products->pluck('name', 'id'),
          'brands' => $brands->pluck('name', 'id'),
        ];


        return view('sliders.edit')->with($data);
    }

    /**
     * Update the specified Slider in storage.
     *
     * @param int $id
     * @param UpdateSliderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSliderRequest $request)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        $slider = $this->sliderRepository->update($request->all(), $id);

        Flash::success('Slider updated successfully.');

        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified Slider from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        $this->sliderRepository->delete($id);

        Flash::success('Slider deleted successfully.');

        return redirect(route('sliders.index'));
    }
}
