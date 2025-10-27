<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KartingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'marca'=>'required|string|max:255',
            'modelo'=>'required|string|max:255',
            'anio'=>'required|integer|digits:4|min:1900|max:2025',
            'tipo_motor'=>'required|string|max:255',
            'precio_alquiler'=>'required|numeric',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
    public function kartings()
    {
        return [
            'marca.required' => 'La marca es obligatoria.',
            'marca.alpha' => 'La marca solo debe contener letras.',
            'modelo.required' => 'El modelo es obligatorio.',
            'modelo.alpha' => 'El modelo solo debe contener letras.',
            'anio.required' => 'El año es obligatorio.',
            'tipo_motor.required' => 'El tipo motor es obligatorio.',
            'tipo_motor.alpha' => 'El tipo motor solo debe contener letras.',
            'precio_alquiler.required' => 'El precio es obligatorio.',
            'anio.digits' => 'El año debe tener 4 cifras',
            'anio.integer' => 'El año debe ser un numero valido'
        ];
    }
}
