<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidOperation;
use App\Services\OperationService;

class CalculateOperation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:operation {operation} {operatorA} {operatorB}';
    

    /**
     * The console command description.
     *
     * @var string
     */

     protected $description = 'Calcula una operación aritmética entre dos valores';

    protected $operationService;

    /**
     * Create a new command instance.
     *
     * @param  OperationService  $operationService
     * @return void
     */
    public function __construct(OperationService $operationService)
    {
        parent::__construct();
        $this->operationService = $operationService;
    }
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $operation = $this->argument('operation');
        $operatorA = $this->argument('operatorA');
        $operatorB = $this->argument('operatorB');


        
        /*
        * al inicio cree unas validaciones
        * pero al validar en el servicio la operacion con el switch
        * comente la validación
        * ya que creo que que ahorraria muchas lineas de código
        */

        // $rules = [
        //     'operation' => ['required',new ValidOperation],
        //     'operatorA' => 'required|integer',
        //     'operatorB' => 'required|integer'
        // ];

        // $messages = [
        //     'operation.required' => 'La operación es obligatoria',
        //     'operatorA.required' => 'El primero operador es obligatorio',
        //     'operatorB.required' => 'El segundo operador es obligatorio',
        //     'operatorA.integer' => 'El primero operador debe ser un número',
        //     'operatorB.integer' => 'El segundo operador debe ser un número',
            
        // ];

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
        //         $this->error($error);
        //     }
        //     return 1;
        // }

        try{
            $result = $this->operationService->executeOperation($operation, $operatorA, $operatorB);
            $this->info("El resultado de la operación es : $result");
        }catch(Exception $e){
            file_put_contents('errorOperation.log',$e->getMessage(),FILE_APPEND);
            $this->error('La operación no existe');
        }

        return 0;
    }
}
