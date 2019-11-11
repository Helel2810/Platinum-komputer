<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourierRequest;
use App\Http\Requests\UpdateCourierRequest;
use App\Repositories\CourierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CourierController extends AppBaseController
{
    /** @var  CourierRepository */
    private $courierRepository;

    public function __construct(CourierRepository $courierRepo)
    {
        $this->courierRepository = $courierRepo;
    }

    /**
     * Display a listing of the Courier.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $couriers = $this->courierRepository->all();

        return view('couriers.index')
            ->with('couriers', $couriers);
    }

    /**
     * Show the form for creating a new Courier.
     *
     * @return Response
     */
    public function create()
    {
        return view('couriers.create');
    }

    /**
     * Store a newly created Courier in storage.
     *
     * @param CreateCourierRequest $request
     *
     * @return Response
     */
    public function store(CreateCourierRequest $request)
    {
        $input = $request->all();

        $courier = $this->courierRepository->create($input);

        Flash::success('Courier saved successfully.');

        return redirect(route('couriers.index'));
    }

    /**
     * Display the specified Courier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $courier = $this->courierRepository->find($id);

        if (empty($courier)) {
            Flash::error('Courier not found');

            return redirect(route('couriers.index'));
        }

        return view('couriers.show')->with('courier', $courier);
    }

    /**
     * Show the form for editing the specified Courier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courier = $this->courierRepository->find($id);

        if (empty($courier)) {
            Flash::error('Courier not found');

            return redirect(route('couriers.index'));
        }

        return view('couriers.edit')->with('courier', $courier);
    }

    /**
     * Update the specified Courier in storage.
     *
     * @param int $id
     * @param UpdateCourierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourierRequest $request)
    {
        $courier = $this->courierRepository->find($id);

        if (empty($courier)) {
            Flash::error('Courier not found');

            return redirect(route('couriers.index'));
        }

        $courier = $this->courierRepository->update($request->all(), $id);

        Flash::success('Courier updated successfully.');

        return redirect(route('couriers.index'));
    }

    /**
     * Remove the specified Courier from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courier = $this->courierRepository->find($id);

        if (empty($courier)) {
            Flash::error('Courier not found');

            return redirect(route('couriers.index'));
        }

        $this->courierRepository->delete($id);

        Flash::success('Courier deleted successfully.');

        return redirect(route('couriers.index'));
    }
}
