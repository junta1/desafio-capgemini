<?php

namespace Bank\Http\Controllers;

use App\Http\Controllers\Controller;
use Bank\Services\BalanceService;

class BalanceController extends Controller
{
    protected $service;

    public function __construct(BalanceService $balanceService)
    {
        $this->service = $balanceService;
    }

    public function index(int $id)
    {
        try {
            $balance = $this->service->balance($id);

            return response()->json($balance, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 400);
        }
    }
}
