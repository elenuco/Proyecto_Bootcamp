<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class NuevaUnidadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'numero_unidad' => array(
                'required', 'integer'
            ),
            'nombre_unidad' => array(
                'required', 'string',
            ),
            'mate_id' => array(
                'required', 'integer'
            ),
        
        ];
    }
    public function messages()
    {
        return array(
            'numero_unidad.required' => "Se requiere de un numero de unidad",
            'numero_unidad.integer' => "El numero de la unidad debe ser numero entero",
            'nombre_unidad.required' => "Se requiere el nombre de la unidad",
            'nombre_unidad.string' => "El nombre de la unidad debe ser cadena de texto",
            'mate_id.required' => "Se requiere el id de la materia",
            'mate_id.integer' => "El id de la materia debe ser entero",
            
        );
    }
    
    protected function failedValidation(Validator $validator)
    {
        $errors=$validator->errors();

        $formato = array(
            "error" => "Algunos datos han fallado.",
            "primer_error" => $errors->first(),
            "detalles" => $errors,
        );

        
        $respuesta= response()->json($formato,422);

        throw new ValidationException($validator, $respuesta);
    }
}
