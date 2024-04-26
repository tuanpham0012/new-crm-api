<?php

namespace App\Http\Controllers\Department;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Transformers\DepartmentTranformer;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

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
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $entry = $this->departmentModel->findUuid($id);
        return $this->responseOne($entry);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $storeData = $request->all();
        try {
            DB::beginTransaction();
            $this->departmentModel->fixTree();
            $department = $this->departmentModel->create($storeData);
            DB::commit();
            return $this->responseOne($department, __('response.created_success', ['model' => __('model.departments')]), 200);
        }catch (\Exception $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $data = $request->only(['name', 'note', 'status', 'parent_id']);
        try {
            DB::beginTransaction();
            $this->departmentModel->fixTree();
            $department = $this->departmentModel->updateForUuid($id, $data);
            DB::commit();
            return $this->successResponse($department, __('response.updated_error', ['model' => __('model.departments')]), 200);
        }catch (\Exception $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
