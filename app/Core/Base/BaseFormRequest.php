<?php

namespace App\Core\Base;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{

    public function storeRules()
    {
        return [];
    }

    public function updateRules()
    {
        return [];
    }

    /**
     * Get the validation rules that apply to the request.
     * @param $method
     * @return array
     */
    public function rules(?$method)
    {
        switch($method ?: $this->method())
        {
            case 'POST':
                {
                    return $this->storeRules();
                }
            case 'PUT':
            case 'PATCH':
                {
                    return $this->updateRules();
                }
            default:
                return [];
                break;
        }
    }
}
