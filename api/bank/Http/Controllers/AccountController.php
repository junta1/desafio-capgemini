<?php

namespace Bank\Http\Controllers;

use App\Http\Controllers\Controller;
use Bank\Services\AccountService;

class AccountController extends Controller
{
    protected $service;

    public function __construct(AccountService $accountService)
    {
        $this->service = $accountService;
    }

    public function index()
    {
        try {
            $service = $this->service->all();

            return response()->json($service, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 400);
        }
    }

    public function show(int $id)
    {
        try {
            $service = $this->service->find($id);

            return response()->json($service, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 400);
        }
    }
}

