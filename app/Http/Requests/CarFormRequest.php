<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Car;

class CarFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $car = new Car;
        $brands = array_keys($car->getBrands());
        return [
            'brand' => ['required', Rule::in($brands)],
            'type' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:1000'
        ];
    }
}
