<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Lang;

class ItemRequest extends FormRequest
{
     public function authorize()
     {
          //return false;
          // true に変更
          return true;
     }
     public function rules()
     {
          return [
               'name' => ['required', 'string'],
               'code' => ['required', 'string', Rule::unique('items')->ignore($this->id)],
               'price' => ['required', 'min:0', 'integer'],
               'amount' => ['min:0', 'integer'],
          ];
     }

     public function messages()
     {
          return [
               'name.required' => Lang::get('messages.name_required'),
               'code.required' => Lang::get('messages.code_required'),
               'code.required' => Lang::get('messages.code_unique'),
               'price.required' => Lang::get('messages.price_required'),
               'price.integer' => Lang::get('messages.price_invalid'),
               'price.min' => Lang::get('messages.price_invalid'),
               'amount.integer' => Lang::get('messages.amount_invalid'),
               'amount.min' => Lang::get('messages.amount_invalid'),
          ];
     }
}
