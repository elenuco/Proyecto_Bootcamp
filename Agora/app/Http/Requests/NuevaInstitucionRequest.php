<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class NuevaInstitucionRequest extends FormRequest
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
            'nombre_institucion' => array(
                'required'
            ),
            'tipo_institucion' => array(
                'required', 'string', Rule::in(['pública', 'privada'])
            ),
            'logo' => array(
                'required', 'string'
            ),
            'municipio_id' => array(
                'required', 'integer'
            ),
        ];
    }
    public function messages()
    {
        return array(
            'nombre_institucion.required' => "Se requiere de un nombre para la institucion",
            'tipo_institucion.required' => "Se requiere el tipo de institucion",
            'tipo_institucion.string' => "El tipo de institucion debe ser cadena de texto",
            'tipo_institucion.in' => "El tipo de institucion debe ser pública o privada",
            'logo.required' => "Se requiere de un logo",
            'logo.string' => "El logo debe ser una url",
            'municipio_id.required' => "Se requiere de un municipio",
            'municipio_id.integer' => "El municipio debe ser un numero entero",
        );
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $formato = array(
            "error" => "Algunos datos han fallado.",
            "primer_error" => $errors->first(),
            "detalles" => $errors,
        );


        $respuesta = response()->json($formato, 422);

        throw new ValidationException($validator, $respuesta);
    }
}
