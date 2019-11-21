<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchaseInvoiceRequest;
use App\Http\Requests\UpdatePurchaseInvoiceRequest;
use App\Repositories\PurchaseInvoiceRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SupplierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PurchaseInvoiceController extends AppBaseController
{
    /** @var  PurchaseInvoiceRepository */
    private $purchaseInvoiceRepository;
    private $productRepository;
    private $supplierRepository;

    public function __construct(PurchaseInvoiceRepository $purchaseInvoiceRepo, ProductRepository $productRepo, SupplierRepository $supplierRepo)
    {
        $this->purchaseInvoiceRepository = $purchaseInvoiceRepo;
        $this->productRepository = $productRepo;
        $this->supplierRepository = $supplierRepo;

    }

    /**
     * Display a listing of the PurchaseInvoice.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $purchaseInvoices = $this->purchaseInvoiceRepository->all();

        return view('purchase_invoices.index')
            ->with('purchaseInvoices', $purchaseInvoices);
    }

    /**
     * Show the form for creating a new PurchaseInvoice.
     *
     * @return Response
     */
    public function create()
    {
        $products = $this->productRepository->all();
        $suppliers = $this->supplierRepository->all();
        $data =
        [
            'products' => $products->pluck('name', 'id'),
            'suppliers' => $suppliers->pluck('name', 'id')
        ];
        return view('purchase_invoices.create')->with($data);
    }

    /**
     * Store a newly created PurchaseInvoice in storage.
     *
     * @param CreatePurchaseInvoiceRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseInvoiceRequest $request)
    {
        $input = $request->all();

        $purchaseInvoice = $this->purchaseInvoiceRepository->create($input);

        Flash::success('Purchase Invoice saved successfully.');

        return redirect(route('purchaseInvoices.index'));
    }

    /**
     * Display the specified PurchaseInvoice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchaseInvoice = $this->purchaseInvoiceRepository->find($id);

        if (empty($purchaseInvoice)) {
            Flash::error('Purchase Invoice not found');

            return redirect(route('purchaseInvoices.index'));
        }

        return view('purchase_invoices.show')->with('purchaseInvoice', $purchaseInvoice);
    }

    /**
     * Show the form for editing the specified PurchaseInvoice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchaseInvoice = $this->purchaseInvoiceRepository->find($id);

        if (empty($purchaseInvoice)) {
            Flash::error('Purchase Invoice not found');

            return redirect(route('purchaseInvoices.index'));
        }

        $products = $this->productRepository->all();
        $suppliers = $this->supplierRepository->all();
        $data =
        [
            'purchaseInvoice' => $purchaseInvoice,
            'products' => $products->pluck('name', 'id'),
            'suppliers' => $suppliers->pluck('name', 'id')
        ];


        return view('purchase_invoices.edit')->with($data);
    }

    /**
     * Update the specified PurchaseInvoice in storage.
     *
     * @param int $id
     * @param UpdatePurchaseInvoiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseInvoiceRequest $request)
    {
        $purchaseInvoice = $this->purchaseInvoiceRepository->find($id);

        if (empty($purchaseInvoice)) {
            Flash::error('Purchase Invoice not found');

            return redirect(route('purchaseInvoices.index'));
        }

        $purchaseInvoice = $this->purchaseInvoiceRepository->update($request->all(), $id);

        Flash::success('Purchase Invoice updated successfully.');

        return redirect(route('purchaseInvoices.index'));
    }

    /**
     * Remove the specified PurchaseInvoice from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseInvoice = $this->purchaseInvoiceRepository->find($id);

        if (empty($purchaseInvoice)) {
            Flash::error('Purchase Invoice not found');

            return redirect(route('purchaseInvoices.index'));
        }

        $this->purchaseInvoiceRepository->delete($id);

        Flash::success('Purchase Invoice deleted successfully.');

        return redirect(route('purchaseInvoices.index'));
    }
}
