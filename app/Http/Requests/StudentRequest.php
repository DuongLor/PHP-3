<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
		//
		$rules = [];
		$currentAction = $this->route()->getActionMethod();
		switch ($this->method()):
			case "POST":
				switch ($currentAction):
					case "store":
						$rules = [
							'name' => 'required',
							'email' => 'required|email|unique:students',
							'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
						];
						break;
					case "update":
						$rules = [
							'name' => 'required',
							'email' => 'required|email|unique:students',
						];
						break;
				endswitch;
				break;
		endswitch;
		return $rules;
	}
	public function messages()
	{
		return [
			'name.required' => 'Tên Không được để trống',
			'email.required' => 'Email Không được để trống',
			'email.email' => 'Không đúng định dạng email',
			'email.unique' => 'Email đã tồn tại',
			'image.required' => 'Hình ảnh Không được để trống',
			'image.image' => 'Ảnh Không đúng định dạng',
			'image.mimes' => 'Ảnh hông đúng định dạng',
			'image.max' => 'Kích thước ảnh không được vượt quá 5MB',
		];
	}
}
