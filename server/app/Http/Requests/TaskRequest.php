<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // 認証機能
    public function authorize()
    {
        // 認証機能を使うので、falseからtrueに変更する。
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    // ルールを定義する
    public function rules()
    {
        // ルールを複数定義する時は、｜でつなぐ。
        // required：必須項目、string：文字列型
        return [
            'title' =>      'required|string|max:50',
            'body' =>       'required|string|max:2000',
        ];
    }
}
