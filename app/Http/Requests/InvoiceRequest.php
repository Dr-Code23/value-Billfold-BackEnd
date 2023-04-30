<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Response;

class InvoiceRequest extends FormRequest
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
        return [
            'invoice_num' => 'required|max:20|unique:invoices,invoice_num',
            'due_date' => 'required|date',
            "amount" => "required",
            "bank_code" => "required|max:14|min:6|integer"
        ];
    }


    public function messages(): array
    {

        return [
            'invoice_num.unique' => 'A number of invoice  is unique',
            'invoice_num.max' => 'A number of invoice  is max 3',
            'invoice_num.required' => 'A number of invoice  is required',
            'bank_code.max' => 'the code of bank max 14',
            'bank_code.min' => 'the code of bank min 6',
            'bank_code.required' => 'the code of bank is required',
            'amount.required' => 'th amount of invoice is required',
            'due_date.required' => 'th due date of invoice is required',
            'due_date.date' => 'there error of format due date'
        ];
    }
}
