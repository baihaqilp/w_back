<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => ['required', 'string', 'unique:users'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'kode_korus' => ['max:255'],
            'no_anggota_umum' => 'string',
            'provinsi' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'desa' => ['required', 'string', 'max:255'],
            'alamat_lengkap' => ['required', 'string', 'max:255'],
            'rt_rw' => ['required', 'string', 'max:255'],
            'kode_pos' => ['required', 'string', 'max:255'],
            'password' => 'required|string|min:8|max:25',
            'lat' => 'required|string|max:255',
            'lng' => 'required|string|max:255',
        ];
    }

    public function getAttributes() {
        return $this->validated();
    }
}
