<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BannerRequest extends FormRequest
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
        return [
            'name'        => ['required', 'string', Rule::unique("banners", "name")->ignore($this->banner), 'max:255'],
            'image'       => 'image|mimes:jpeg,png,jpg|max:5098'
        ];
    }

    public function attributes()
    {
        return [
            'name'        => trans('validation.attributes.name'),
            'image'       => trans('validation.attributes.image'),
        ];
    }

}
