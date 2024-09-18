<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Models\CustomerSource;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Transformers\CustomerTransformer;
use App\Http\Requests\CustomerRequest\StoreCustomerRequest;
use App\Http\Requests\CustomerRequest\UpdateCustomerRequest;
use App\Models\File;

class CustomerController extends Controller
{
    protected $customerModel;
    public function __construct(CustomerTransformer $tranformer, Customer $customerModel)
    {
        $this->setTransformer($tranformer);
        $this->customerModel = $customerModel;
    }

    public function view(): mixed
    {
        $customerTypes = Customer::CUSTOMER_TYPE;
        $customerSource = CustomerSource::all()->toArray();
        return view('pages.customer', ['page' => 'Khách hàng', 'types' => $customerTypes, 'sources' => $customerSource]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $entries = $this->customerModel->data();
            return $this->jsonReponse($entries, 200, [], ['paginate' => false]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            // dd($data);
            $entry = $this->customerModel->create($data);
            $contacts = [...$data['emails']['data'], ...$data['phones']['data'], ...$data['messages']['data']];
            // dd($contacts);
            $entry->contacts()->createMany($contacts);

            if (isset($data['file_id'])) {
                $file = File::where('id', $data['file_id'])->update(['fileable_id' => $entry->id, 'fileable_type' => get_class($entry)]);
            }
            DB::commit();
            return $this->responseOne($entry, 'Thêm mới thành công!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $entry = $this->customerModel->findUuid($id, ['contacts', 'products', 'source', 'city', 'district', 'ward', 'emails', 'phones', 'messages', 'user', 'observer']);
        if ($entry) {
            return $this->responseOne($entry);
        }
        return $this->errorResponse('Not fount', 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
