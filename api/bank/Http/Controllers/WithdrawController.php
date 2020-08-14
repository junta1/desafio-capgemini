<?php

namespace Bank\Http\Controllers;

use App\Http\Controllers\Controller;
use Bank\Services\WithdrawService;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    protected $service;

    public function __construct(WithdrawService $movimentService)
    {
        $this->service = $movimentService;
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
//dd($input);
            $withdraw = $this->service->withdrawSave($input);

            return response()->json($withdraw, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 400);
        }
    }
}
