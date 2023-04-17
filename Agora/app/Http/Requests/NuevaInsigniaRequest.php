<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class NuevaInsigniaRequest extends FormRequest
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
            'nombre_insignia' => array(
                'required'
            ),
            'imagen_insignia' => array(
                'required'
            ),
            'puntaje_max' => array(
                'required', 'numeric'
            ),
            'puntaje_min' => array(
                'required', 'numeric', 'min:0'
            ),
        ];
    }
    public function messages()
    {
        return array(
            'nombre_insignia.required' => "Se requiere de un nombre para la insignia",
            'imagen_insignia.required' => "Se requiere una imagen para la insignia",
            'puntaje_max.required' => "Se requiere de un puntaje máximo para la insignia",
            'puntaje_max.numeric' => "Se espera un puntaje maximo numerico",
            'puntaje_min.required' => "Se requiere de un puntaje minimo para la insignia",
            'puntaje_min.numeric' => "Se espera un puntaje minimo numerico",
            'puntaje_min.min' => "El punataje minimo no debe ser menor a cero",
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
