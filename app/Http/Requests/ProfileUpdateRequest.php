<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['required', 'string', 'unique:users,phone,' . $this->user()->id, new Phone('ID')],
        ];
    }

    public function messages()
    {
        return [
            'phone.unique' => 'Nomor telepon sudah terdaftar.',
            'phone.phone' => 'Nomor telepon harus valid dan menggunakan kode negara Indonesia.',
        ];
    }
}
