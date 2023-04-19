<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class NuevoCuestionarioRequest extends FormRequest
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
            'nombre_cuestionario' => array(
                'required','string'
               ),
               'tema' => array(
                'required', 'string'
               ),
               'descripcion' => array(
                'required', 'string'
               ),
               'duracion_cuestionario' => array(
                'required', 'integer'
               ),
               'unidad_id' => array(
                'required', 'integer'
               ),
               'grado_materia_id' => array(
                'required', 'integer'
               ),
        ];
    }
    public function messages()
    {
        return array(
            'nombre_cuestionario.required' => "Debe ingresar el nombre del cuestionario",
            'nombre_cuestionario.string' => "El nombre del cuestionario debe ser una cadena de texto",
            'tema.required' => "Debe ingresar el tema del cuestionario",
            'tema.string' => "El tema del cuestionario debe ser una cadena de texto",
            'descripcion.required' => "Debe ingresar la descripcion del cuestionario",
            'descripcion.string' => "La descripcion del cuestionario debe ser una cadena de texto",
            'duracion_cuestionario.required' => "Debe ingresar la duracion del cuestionario",
            'duracion_cuestionario.integer' => "La duracion del cuestionario debe ser en numeros enteros",
            'unidad_id.required' => "Debe ingresar la unidad del cuestionario",
            'unidad_id.integer' => "El id de la unidad debe ser un numero entero",
            'grado_materia_id.required' => "Debe ingresar el id de la materia y el grado del cuestionario",
            'grado_materia_id.integer' => "El id de la materia y el graado debe ser un numero entero", 
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
