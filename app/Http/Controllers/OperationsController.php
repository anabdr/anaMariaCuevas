<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OperationRequest;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidOperation;
use App\Services\OperationService;

class OperationsController extends Controller
{

    protected $operationService;

    public function __construct(OperationService $operationService){
        $this->operationService = $operationService;
    }
    public function operations($operation, $operatorA, $operatorB)
    {
        /*
        * al inicio cree unas validaciones
        * pero al validar en el servicio la operacion con el switch
        * comente la validación
        * ya que creo que que ahorraria muchas lineas de código
        */
        
        // //reglas
        // $rules = [
        //     'operation' => ['required',new ValidOperation],
        //     'operatorA' => 'required|integer',
        //     'operatorB' => 'required|integer'
        // ];
        // //mensajes
        // $messages = [
        //     'operation.required' => 'La operacion es obligatoria',
        //     'operatorA.required' => 'El primero operador es obligatorio',
        //     'operatorB.required' => 'El segundo operador es obligatorio',
        //     'operatorA.integer' => 'El primero operador debe ser un número',
        //     'operatorB.integer' => 'El segundo operador debe ser un número',
            
        // ];
        // //validación
        // $validator = Validator::make(
        //     [
        //         'operation' => $operation,
        //         'operatorA' => $operatorA,
        //         'operatorB' => $operatorB,
        //     ],
        //     $rules,
        //     $messages
        // );

        
        // if ($validator->fails()) {
        //     foreach ($validator->errors()->all() as $error) {
        //         return response()->json($error);
        //     }
        // }

        try{
            $result = $this->operationService->executeOperation($operation, $operatorA, $operatorB);                 
            return response()->json("Result: ". $result);
        }catch(Exception $e){
            file_put_contents('errorOperation.log',$e->getMessage(),FILE_APPEND);
            return response()->json(['message' => 'Ha ocurrido un error'],500);
        }
        
        
    }
}
