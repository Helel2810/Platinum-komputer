<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShipmentMethodRequest;
use App\Http\Requests\UpdateShipmentMethodRequest;
use App\Repositories\ShipmentMethodRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ShipmentMethodController extends AppBaseController
{
    /** @var  ShipmentMethodRepository */
    private $shipmentMethodRepository;

    public function __construct(ShipmentMethodRepository $shipmentMethodRepo)
    {
        $this->shipmentMethodRepository = $shipmentMethodRepo;
    }

    /**
     * Display a listing of the ShipmentMethod.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shipmentMethods = $this->shipmentMethodRepository->all();

        return view('shipment_methods.index')
            ->with('shipmentMethods', $shipmentMethods);
    }

    /**
     * Show the form for creating a new ShipmentMethod.
     *
     * @return Response
     */
    public function create()
    {
        return view('shipment_methods.create');
    }

    /**
     * Store a newly created ShipmentMethod in storage.
     *
     * @param CreateShipmentMethodRequest $request
     *
     * @return Response
     */
    public function store(CreateShipmentMethodRequest $request)
    {
        $input = $request->all();

        $shipmentMethod = $this->shipmentMethodRepository->create($input);

        Flash::success('Shipment Method saved successfully.');

        return redirect(route('shipmentMethods.index'));
    }

    /**
     * Display the specified ShipmentMethod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shipmentMethod = $this->shipmentMethodRepository->find($id);

        if (empty($shipmentMethod)) {
            Flash::error('Shipment Method not found');

            return redirect(route('shipmentMethods.index'));
        }

        return view('shipment_methods.show')->with('shipmentMethod', $shipmentMethod);
    }

    /**
     * Show the form for editing the specified ShipmentMethod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shipmentMethod = $this->shipmentMethodRepository->find($id);

        if (empty($shipmentMethod)) {
            Flash::error('Shipment Method not found');

            return redirect(route('shipmentMethods.index'));
        }

        return view('shipment_methods.edit')->with('shipmentMethod', $shipmentMethod);
    }

    /**
     * Update the specified ShipmentMethod in storage.
     *
     * @param int $id
     * @param UpdateShipmentMethodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShipmentMethodRequest $request)
    {
        $shipmentMethod = $this->shipmentMethodRepository->find($id);

        if (empty($shipmentMethod)) {
            Flash::error('Shipment Method not found');

            return redirect(route('shipmentMethods.index'));
        }

        $shipmentMethod = $this->shipmentMethodRepository->update($request->all(), $id);

        Flash::success('Shipment Method updated successfully.');

        return redirect(route('shipmentMethods.index'));
    }

    /**
     * Remove the specified ShipmentMethod from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shipmentMethod = $this->shipmentMethodRepository->find($id);

        if (empty($shipmentMethod)) {
            Flash::error('Shipment Method not found');

            return redirect(route('shipmentMethods.index'));
        }

        $this->shipmentMethodRepository->delete($id);

        Flash::success('Shipment Method deleted successfully.');

        return redirect(route('shipmentMethods.index'));
    }
}
