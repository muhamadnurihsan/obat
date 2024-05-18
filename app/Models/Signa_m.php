<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signa_m extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class', 'status'];
    protected $dates = ['deleted_at'];
}
