<?php

namespace App\Http\Controllers\Other;

use App\Models\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest\StoreFileRequest;
use App\Http\Requests\FileRequest\UpdateFileRequest;

class FileController extends Controller
{
    protected $model;
    public function __construct(File $model)
    {
        $this->model = $model;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        $data = $this->model->uploadFile($request->file('file'), $request->get('file_name'));
        return $this->successResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
