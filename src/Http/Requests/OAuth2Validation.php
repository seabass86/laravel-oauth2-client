<?php

namespace MacsiDigital\OAuth2\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OAuth2Validation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        session(['oauth2state' => $this->state]);
        return $this->state == session('oauth2state');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required',
        ];
    }
}