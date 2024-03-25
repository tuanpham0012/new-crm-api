<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Transformers\DepartmentTranformer;
use Illuminate\Support\Facades\View;

class DepartmentController extends Controller
{
    protected $departmentModel;
    public function __construct(DepartmentTranformer $tranformer, Department $departmentModel){
        $this->setTransformer($tranformer);
        $this->departmentModel = $departmentModel;
    }

    public function view():mixed
    {
        return view('pages.department', ['page' => 'Bộ phận']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = $this->departmentModel->getData()->get();
        return $this->responseCollection($entries, 200, [], ['paginate' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $storeData = $request->all();
        try {
            $this->departmentModel->fixTree();
            $department = $this->departmentModel->create($storeData);
            return $this->successResponse(['data' => $department, 'message' => trans('Thêm bộ phận thành công !')], 200);
        }catch (\Exception $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
