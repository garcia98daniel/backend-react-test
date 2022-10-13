<?php

namespace App\Http\Controllers;

use App\Models\InterestedUser;
use App\Models\Project;
use App\Http\Requests\StoreinterestedUserRequest;
use App\Http\Requests\UpdateinterestedUserRequest;
use Illuminate\Http\Request;

class InterestedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * param  ProjectId $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getInterestedPeople($id)
    {
        try {
            $interestedUser = Project::with('interestedPeople')->first();
                $response = [
                    'data' => $interestedUser,
                    'message' => "Personas interesadas listadas.",
                ];

                return response($response, 200);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al listar personas interesadas",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreinterestedUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createInterested(StoreinterestedUserRequest $request)
    {
        try {
            $data = json_decode($request->getContent(), true);
            $request = new Request($data);

            $fields = $request->validate([
                'projects_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'date_of_birth' => 'required',
                'city' => 'required',
            ]);

            $interestedUser = InterestedUser::create([
                'projects_id' => $fields['projects_id'],
                'name' => $fields['name'],
                'email' => $fields['email'],
                'contact' => $fields['contact'],
                'date_of_birth' => $fields['date_of_birth'],
                'city' => $fields['city'],
            ]);

            if($interestedUser){
                
                $response = [
                    'data' => $interestedUser,
                    'message' => "usuario interesado creado con éxito.",
                ];

                return response($response, 201);
            }
            
            $response = [
                'message' => "Ups!, No se pudo crear el usuario interesado."
            ];

            return response($response, 400);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al intentar crear usuario interesado",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
    }

       /**
     * Display the specified resource.
     *
     * @param  \App\Models\interestedUser  $interestedUser
     * @return \Illuminate\Http\Response
     */
    public function getInterested($id)
    {
        
        try {
            $interestedUser = InterestedUser::where("id", $id)->first();

            if($interestedUser){

                $response = [
                    'data' => $interestedUser,
                    'message' => "usuario interesado listado.",
                ];
                
                return response($response, 200);
            }

            $response = [
                'data' => null,
                'message' => "No se encontro ningun usuario interesado con este id",
            ];
            
            return response($response, 404);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al listar usuario interesado",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinterestedUserRequest  $request
     * @param  \App\Models\interestedUser  $interestedUser
     * @return \Illuminate\Http\Response
     */
    public function editInterested(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);
            $request = new Request($data);

            $fields = $request->validate([
                'projects_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'date_of_birth' => 'required',
                'city' => 'required',
            ]);
         
            $interestedUser = InterestedUser::where("id", $request->id )->update([
                'projects_id' => $fields['projects_id'],
                'name' => $fields['name'],
                'email' => $fields['email'],
                'contact' => $fields['contact'],
                'date_of_birth' => $fields['date_of_birth'],
                'city' => $fields['city'],
            ]);

            if($interestedUser){
                $interestedUser = InterestedUser::where("id", $request->id)->first();
                $response = [
                    'data' => $interestedUser,
                    'message' => "Cambios del usuario interesado actualizados con éxito.",
                ];

                return response($response, 200);
            }
            
            $response = [
                'message' => "Ups!, No se pudo actualizar la información del usuario interesado."
            ];

            return response($response, 400);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al intentar actualizar el usuario interesado",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * param  interestedUserId  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteInterestedPeople($id)
    {
        try {
            
            $interestedUser = InterestedUser::where("id", $id)->first();
            
            if($interestedUser){
                $response = [
                    'data' => $interestedUser,
                    'message' => "Persona interesada eliminada con éxito.",
                ];
                $interestedUser->delete();
                return response($response, 200);
            }
            
            $response = [
                'message' => "Ups!, No se pudo eliminar a este interesado o no se encontro."
            ];

            return response($response, 404);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al intentar eliminar el interesado",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
    }
}
