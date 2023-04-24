<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_num','due_date','invoice_date','amount','bank_code','status','user_id','status_value'];

    public function user(){
        return $this->belongsto(User::class,'user_id');
    }

    public function getDueDateAttribute($value)
    {
        return date('d F Y', strtotime($value));
    }
}
