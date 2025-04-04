<?php

namespace App\Http\Requests;

use App\Models\EquipmentsServicesType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EquipmentsServiceRequest extends FormRequest
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
            'type_id' => [
                'required',
                'integer',
                Rule::exists(EquipmentsServicesType::class, 'id')
            ],
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
        ];
    }
}
