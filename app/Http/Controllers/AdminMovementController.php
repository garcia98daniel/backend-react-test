<?php

namespace App\Http\Controllers;

use App\Models\AdminMovement;
use App\Http\Requests\StoreAdminMovementRequest;
use App\Http\Requests\UpdateAdminMovementRequest;

class AdminMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminMovementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminMovementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminMovement  $adminMovement
     * @return \Illuminate\Http\Response
     */
    public function show(AdminMovement $adminMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminMovement  $adminMovement
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminMovement $adminMovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminMovementRequest  $request
     * @param  \App\Models\AdminMovement  $adminMovement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminMovementRequest $request, AdminMovement $adminMovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminMovement  $adminMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminMovement $adminMovement)
    {
        //
    }
}
