<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\DashboardService;

class DashboardController extends Controller
{
    private $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index (Request $request)
    {
        return $this->dashboardService->index($request);
    }
}
