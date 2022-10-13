<?php

namespace App\Http\Controllers;

use App\Models\interestedUser;
use App\Http\Requests\StoreinterestedUserRequest;
use App\Http\Requests\UpdateinterestedUserRequest;

class InterestedUserController extends Controller
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
     * @param  \App\Http\Requests\StoreinterestedUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreinterestedUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\interestedUser  $interestedUser
     * @return \Illuminate\Http\Response
     */
    public function show(interestedUser $interestedUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\interestedUser  $interestedUser
     * @return \Illuminate\Http\Response
     */
    public function edit(interestedUser $interestedUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinterestedUserRequest  $request
     * @param  \App\Models\interestedUser  $interestedUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinterestedUserRequest $request, interestedUser $interestedUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\interestedUser  $interestedUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(interestedUser $interestedUser)
    {
        //
    }
}
