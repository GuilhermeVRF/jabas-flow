<?php

namespace App\Http\Controllers;

use App\Http\Services\RecurrenceService;
use Illuminate\Http\Request;

class RecurrenceController extends Controller
{
    private $recurrenceService;

    public function __construct(RecurrenceService $recurrenceService)
    {
        $this->recurrenceService = $recurrenceService;
    }

    public function index(Request $request)
    {
        return $this->recurrenceService->index($request);
    }

    public function edit($id){
        return $this->recurrenceService->edit($id);
    }
}
