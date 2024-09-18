<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Transformers\BankTransformer;
use Illuminate\Http\Request;

class BankController extends Controller
{
    protected $bankModel;
    public function __construct(BankTransformer $tranformer, Bank $bankModel){
        $this->setTransformer($tranformer);
        $this->bankModel = $bankModel;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = $this->bankModel->data();
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
