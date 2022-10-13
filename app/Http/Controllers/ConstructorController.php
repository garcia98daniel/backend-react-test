<?php

namespace App\Http\Controllers;

use App\Models\Constructor;
use App\Http\Requests\StoreConstructorRequest;
use App\Http\Requests\UpdateConstructorRequest;

class ConstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getConstructors()
    {
        try {
            $constructor = Constructor::all();
                $response = [
                    'data' => $constructor,
                    'message' => "Constructoras listadas.",
                ];

                return response($response, 200);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al listar Constructoras",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
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
     * @param  \App\Http\Requests\StoreConstructorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConstructorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function show(Constructor $constructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Constructor $constructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConstructorRequest  $request
     * @param  \App\Models\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConstructorRequest $request, Constructor $constructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constructor $constructor)
    {
        //
    }
}
