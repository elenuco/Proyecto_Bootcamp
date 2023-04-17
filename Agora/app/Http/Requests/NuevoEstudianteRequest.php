<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


class NuevoEstudianteRequest extends FormRequest
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
           'nie' => array(
            'required','regex:/\d{6}[0-9]/'
           ),
           'fecha_nacimiento' => array(
            'required', 'date', 'date_format:Y-m-d'
           ),
           'genero' => array(
            'required', 'string', Rule::in(['femenino', 'masculino'])
           ),
           'foto' => array(
            'required', 'string'
           ),
           'telefono' => array(
            'required', 'regex:/\D*\(?(\d{3})?\)?\D*(\d{4})\D*(\d{4})/'
           ),
           'usuario_id' => array(
            'required', 'integer'
           ),
           'grado_id' => array(
            'required', 'integer'
           ),
           'institucion_id' => array(
            'required', 'integer'
           ),
           'munici_id' => array(
            'required', 'integer'
           )
        ];
    }

    public function messages()
    {
        return array(
            'nie.required' => "Debe de ingresar un nie",
            'nie.regex' => "El nie debe contener 7 digitos, por ejemplo 3456299",
            'fecha_nacimiento.required' => "Se requiere una fecha nacimiento",
            'fecha_nacimiento.date' => "Se require una fecha",
            'fecha_nacimiento.date_format' => "Se debe ingresar la fecha con este formato 2023-12-31",
            'genero.required' => "Se requiere un genero",
            'genero.string' => "El genero debe de contener solo letras",
            'genero.in' => 'El género debe ser femenino o masculino',
            'foto.required' => 'Se requiere de una foto',
            'telefono.required' => 'Se requiere de un telefono',
            'telefono.regex' => "El formato del numero es 0000-0000",
            'usuario_id.required' => "Se requiere de un usuario",
            'usuario_id.integer' => "El usuario debe ser un numero entero",
            'grado_id.required' => "Se requiere de un grado academico",
            'grado_id.integer' => "El grado academico debe ser un numero entero",
            'institucion_id.required' => "Se requiere de una institucion",
            'institucion_id.integer' => "La institucion debe ser un numero entero",
            'munici_id.required' => "Se requiere de un municipio",
            'munici_id.integer' => "El municipio debe ser un numero entero",
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
