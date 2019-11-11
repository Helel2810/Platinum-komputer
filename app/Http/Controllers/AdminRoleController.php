<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRoleRequest;
use App\Http\Requests\UpdateAdminRoleRequest;
use App\Repositories\AdminRoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdminRoleController extends AppBaseController
{
    /** @var  AdminRoleRepository */
    private $adminRoleRepository;

    public function __construct(AdminRoleRepository $adminRoleRepo)
    {
        $this->adminRoleRepository = $adminRoleRepo;
    }

    /**
     * Display a listing of the AdminRole.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $adminRoles = $this->adminRoleRepository->all();

        return view('admin_roles.index')
            ->with('adminRoles', $adminRoles);
    }

    /**
     * Show the form for creating a new AdminRole.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin_roles.create');
    }

    /**
     * Store a newly created AdminRole in storage.
     *
     * @param CreateAdminRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateAdminRoleRequest $request)
    {
        $input = $request->all();

        $adminRole = $this->adminRoleRepository->create($input);

        Flash::success('Admin Role saved successfully.');

        return redirect(route('adminRoles.index'));
    }

    /**
     * Display the specified AdminRole.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $adminRole = $this->adminRoleRepository->find($id);

        if (empty($adminRole)) {
            Flash::error('Admin Role not found');

            return redirect(route('adminRoles.index'));
        }

        return view('admin_roles.show')->with('adminRole', $adminRole);
    }

    /**
     * Show the form for editing the specified AdminRole.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $adminRole = $this->adminRoleRepository->find($id);

        if (empty($adminRole)) {
            Flash::error('Admin Role not found');

            return redirect(route('adminRoles.index'));
        }

        return view('admin_roles.edit')->with('adminRole', $adminRole);
    }

    /**
     * Update the specified AdminRole in storage.
     *
     * @param int $id
     * @param UpdateAdminRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdminRoleRequest $request)
    {
        $adminRole = $this->adminRoleRepository->find($id);

        if (empty($adminRole)) {
            Flash::error('Admin Role not found');

            return redirect(route('adminRoles.index'));
        }

        $adminRole = $this->adminRoleRepository->update($request->all(), $id);

        Flash::success('Admin Role updated successfully.');

        return redirect(route('adminRoles.index'));
    }

    /**
     * Remove the specified AdminRole from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $adminRole = $this->adminRoleRepository->find($id);

        if (empty($adminRole)) {
            Flash::error('Admin Role not found');

            return redirect(route('adminRoles.index'));
        }

        $this->adminRoleRepository->delete($id);

        Flash::success('Admin Role deleted successfully.');

        return redirect(route('adminRoles.index'));
    }
}
