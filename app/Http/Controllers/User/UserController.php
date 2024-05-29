<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userModel;
    public function __construct(UserTransformer $tranformer, Staff $userModel){
        $this->setTransformer($tranformer);
        $this->userModel = $userModel;
    }

    public function view():mixed
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
