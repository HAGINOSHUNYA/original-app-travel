<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            
            'event_category'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'start_day'=>'required',
            'image'=>'image|max:2048',
            'cost'=>'numeric|max:9999999',
         
        ];
    }
    public function attributes()  
    {  
        return [  
            'start_time'=>'開始予定時間',
            'end_time'=>'終了予定時間',
            'start_day'=>'開始予定日',
            'image'=>'画像',
            'cost'=>'値段', 
        ];  
    }  
}
