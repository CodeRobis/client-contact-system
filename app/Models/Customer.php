<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'phone', 'email', 'company_id'];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
