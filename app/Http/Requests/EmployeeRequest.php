<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->employee;
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hire_date' => 'required|date',
            'gender' => 'required|in:Pria,Wanita',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'password' => 'required|min:6|max:255|confirmed',
            'password_confirmation' => 'required|min:6|max:255',
            'phone_number' => 'required|min:3|max:15',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Pegawai harus diisi',
            'email.required' => 'Alamat Email Pegawai harus diisi',
            'email.email' => 'Alamat Email Pegawai harus valid',
            'image.required' => 'Foto Pegawai wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar tidak valid. Gunakan format jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran gambar maksimal 2 Megabytes',
            'hire_date.required' => 'Tanggal Penerimaan Pegawai harus diisi',
            'hire_date.date' => 'Format tanggal penerimaan tidak valid',
            'gender.required' => 'Jenis Kelamin Wajib Dipilih',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Dipilih',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.max' => 'Password maksimal 255 karakter',
            'password.confirmed' => 'Konfirmasi Password tidak cocok',
            'password_confirmation.required' => 'Konfirmasi Password wajib diisi',
            'password_confirmation.min' => 'Konfirmasi Password minimal 6 karakter',
            'password_confirmation.max' => 'Konfirmasi Password maksimal 255 karakter',
            'phone_number.required' => 'Nomor Telepon wajib diisi',
            'phone_number.min' => 'Nomor Telepon minimal 3 karakter',
            'phone_number.max' => 'Nomor Telepon maksimal 15 karakter',
            'department_id.required' => 'Departemen wajib dipilih',
            'department_id.exists' => 'Departemen tidak valid',
            'position_id.required' => 'Posisi wajib dipilih',
            'position_id.exists' => 'Posisi tidak valid',
        ];
    }
}
