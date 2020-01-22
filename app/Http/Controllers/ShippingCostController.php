<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShippingCostRequest;
use App\Http\Requests\UpdateShippingCostRequest;
use App\Repositories\ShippingCostRepository;
use App\Repositories\CourierRepository;
use App\Repositories\ShipmentMethodRepository;
use App\Repositories\DistrictRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ShippingCostController extends AppBaseController
{
    /** @var  ShippingCostRepository */
    private $shippingCostRepository;
    private $courierRepository;
    private $districtRepository;


    public function __construct(ShippingCostRepository $shippingCostRepo, CourierRepository $courierRepo, ShipmentMethodRepository $shipmentMethodRepo, DistrictRepository $districtRepo)
    {
        $this->shippingCostRepository = $shippingCostRepo;
        $this->courierRepository = $courierRepo;
        $this->shipmentMethodRepository = $shipmentMethodRepo;
        $this->districtRepository = $districtRepo;
    }

    /**
     * Display a listing of the ShippingCost.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shippingCosts = $this->shippingCostRepository->all();

        return view('shipping_costs.index')
            ->with('shippingCosts', $shippingCosts);
    }

    /**
     * Show the form for creating a new ShippingCost.
     *
     * @return Response
     */
    public function create()
    {
        $courier = $this->courierRepository->all();
        $shipmentMethod = $this->shipmentMethodRepository->all();
        $district = $this->districtRepository->all();
        $data = [
          'courier' => $courier->pluck('name', 'id'),
          'shipmentMethod' => $shipmentMethod->pluck('name', 'id'),
          'district' => $district->pluck('name', 'id')
        ];
        return view('shipping_costs.create')->with($data);
    }

    /**
     * Store a newly created ShippingCost in storage.
     *
     * @param CreateShippingCostRequest $request
     *
     * @return Response
     */
    public function store(CreateShippingCostRequest $request)
    {
        $input = $request->all();

        $shippingCost = $this->shippingCostRepository->create($input);

        Flash::success('Shipping Cost saved successfully.');

        return redirect(route('shippingCosts.index'));
    }

    /**
     * Display the specified ShippingCost.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shippingCost = $this->shippingCostRepository->find($id);

        if (empty($shippingCost)) {
            Flash::error('Shipping Cost not found');

            return redirect(route('shippingCosts.index'));
        }

        return view('shipping_costs.show')->with('shippingCost', $shippingCost);
    }

    /**
     * Show the form for editing the specified ShippingCost.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shippingCost = $this->shippingCostRepository->find($id);

        if (empty($shippingCost)) {
            Flash::error('Shipping Cost not found');

            return redirect(route('shippingCosts.index'));
        }

        $courier = $this->courierRepository->all();
        $shipmentMethod = $this->shipmentMethodRepository->all();
        $district = $this->districtRepository->all();
        $data = [
          'shippingCost' => $shippingCost,
          'courier' => $courier->pluck('name', 'id'),
          'shipmentMethod' => $shipmentMethod->pluck('name', 'id'),
          'district' => $district->pluck('name', 'id')
        ];


        return view('shipping_costs.edit')->with($data);
    }

    /**
     * Update the specified ShippingCost in storage.
     *
     * @param int $id
     * @param UpdateShippingCostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShippingCostRequest $request)
    {
        $shippingCost = $this->shippingCostRepository->find($id);

        if (empty($shippingCost)) {
            Flash::error('Shipping Cost not found');

            return redirect(route('shippingCosts.index'));
        }

        $shippingCost = $this->shippingCostRepository->update($request->all(), $id);

        Flash::success('Shipping Cost updated successfully.');

        return redirect(route('shippingCosts.index'));
    }

    /**
     * Remove the specified ShippingCost from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shippingCost = $this->shippingCostRepository->find($id);

        if (empty($shippingCost)) {
            Flash::error('Shipping Cost not found');

            return redirect(route('shippingCosts.index'));
        }

        $this->shippingCostRepository->delete($id);

        Flash::success('Shipping Cost deleted successfully.');

        return redirect(route('shippingCosts.index'));
    }
}
