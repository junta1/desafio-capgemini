<?php

namespace Bank\Http\Controllers;

use App\Http\Controllers\Controller;
use Bank\Services\DepositService;
use Bank\Validation\BankValidation;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    protected $service;

    public function __construct(DepositService $depositService)
    {
        $this->service = $depositService;
    }

    public function store(BankValidation $request)
    {
        try {
            $input = $request->all();

            $deposit= $this->service->depositSave($input);

            return response()->json($deposit, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 400);
        }
    }
}
