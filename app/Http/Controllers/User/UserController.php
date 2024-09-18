<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest\StoreUserRequest;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    protected $userModel;
    public function __construct(UserTransformer $tranformer, Staff $userModel)
    {
        $this->setTransformer($tranformer);
        $this->userModel = $userModel;
    }

    public function view(): mixed
    {
        $genders = User::LABEL_GENDER;
        $statues = User::LABEL_STATUS;
        return view('pages.user', ['page' => 'Nhân viên', 'genders' => $genders, 'statuses' => $statues]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = $this->userModel->data();
        return $this->jsonReponse($entries, 200, [], ['paginate' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $entry = $this->userModel->create($data);
            $entry->updateDepartments($data['departments']['data']);
            $entry->updateBanks($data['banks']['data']);
            DB::commit();
            return $this->responseOne($entry, 'Thêm mới thành công!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $entry = $this->userModel->findUuid($id, ['departments', 'banks']);
        if ($entry) {
            return $this->responseOne($entry);
        }
        return $this->errorResponse('Not fount', 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $entry = $this->userModel->findUuid($id);
        if (!$entry) {
            return $this->errorResponse('Not fount', 404);
        }
        $data = $request->all();
        DB::beginTransaction();
        try {
            $entry->update($data);
            $entry->updateDepartments($data['departments']['data']);
            $entry->updateBanks($data['banks']['data']);
            DB::commit();
            return $this->responseOne($entry, 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
