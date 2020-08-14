<?php
declare(strict_types=1);

namespace Bank\Http\Controllers;

use App\Http\Controllers\Controller;
use Bank\Services\MovimentService;

class MovimentController extends Controller
{
    protected $service;

    public function __construct(MovimentService $balanceService)
    {
        $this->service = $balanceService;
    }

    public function index(int $idAccount)
    {
        try {
            $balance = $this->service->all($idAccount);

            return response()->json($balance, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 400);
        }
    }
}
