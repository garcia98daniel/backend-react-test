<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProjects()
    {
        try {
            $projects = Project::with('constructors')->get();
                $response = [
                    'data' => $projects,
                    'message' => "Proyectos listado.",
                ];

                return response($response, 200);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al listar proyectos",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createProject(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);
            $request = new Request($data);

            $fields = $request->validate([
                'name' => 'required',
                'address' => 'required',
                'constructors_id' => 'required',
                'contact' => 'required',
            ]);

            $project = Project::create([
                'constructors_id' => $fields['constructors_id'],
                'name' => $fields['name'],
                'address' => $fields['address'],
                'contact' => $fields['contact'],
            ]);

            if($project){
                
                $response = [
                    'data' => $project,
                    'message' => "Proyecto creado con éxito.",
                ];

                return response($response, 201);
            }
            
            $response = [
                'message' => "Ups!, No se pudo crear el proyecto."
            ];

            return response($response, 400);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al intentar crear proyecto",
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
    public function getProject($id)
    {
        
        try {
            $project = Project::where("id", $id)->first();

            if($project){

                $response = [
                    'data' => $project,
                    'message' => "Proyecto listado.",
                ];
                
                return response($response, 200);
            }

            $response = [
                'data' => null,
                'message' => "No se encontro ningun proyecto con este id",
            ];
            
            return response($response, 404);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al listar proyecto",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function editProject(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);
            $request = new Request($data);

            $fields = $request->validate([
                'id' => 'required',
                'name' => 'required',
                'address' => 'required',
                'constructors_id' => 'required',
                'contact' => 'required',
            ]);
            
         
            $project = Project::where("id", $request->id )->update([
                'constructors_id' => $fields['constructors_id'],
                'name' => $fields['name'],
                'address' => $fields['address'],
                'contact' => $fields['contact'],
            ]);

            if($project){
                $project = Project::where("id", $request->id)->first();
                $response = [
                    'data' => $project,
                    'message' => "Cambios del proyecto actualizados con éxito.",
                ];

                return response($response, 200);
            }
            
            $response = [
                'message' => "Ups!, No se pudo actualizar la información del proyecto."
            ];

            return response($response, 400);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al intentar actualizar el proyecto",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function deleteProject($id)
    {
        
        try {
            
            $project = Project::where("id", $id)->first();
            
            if($project){
                $response = [
                    'data' => $project,
                    'message' => "Proyecto eliminado con éxito.",
                ];
                $project->delete();
                return response($response, 200);
            }
            
            $response = [
                'message' => "Ups!, No se pudo eliminar el proyecto o no se encontro el proyecto."
            ];

            return response($response, 404);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Error al intentar eliminar el proyecto",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
    }
}
