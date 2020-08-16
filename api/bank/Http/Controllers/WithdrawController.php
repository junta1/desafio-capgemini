<?php

namespace Bank\Http\Controllers;

use App\Http\Controllers\Controller;
use Bank\Services\WithdrawService;
use Bank\Validation\BankValidation;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    protected $service;

    public function __construct(WithdrawService $movimentService)
    {
        $this->service = $movimentService;
    }

    public function store(BankValidation $request)
    {
        try {
            $input = $request->all();

            $withdraw = $this->service->withdrawSave($input);

            return response()->json($withdraw, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 400);
        }
    }
}
