<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HistoryResource;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = History::orderBy('id', 'desc')->limit(10)->get()->toArray();

        return new HistoryResource(true, 'Histories retrieved successfully', $data);
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
        $validator = Validator::make($request->all(), [
            'history' => 'required|string'
        ]);

        if ($validator->fails()) {
            return new HistoryResource(false, 'Bad Request', $validator->errors());
        }

        $data = History::create($request->all());

        return new HistoryResource(true, 'History created successfully', $data);
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
