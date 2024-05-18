<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obatalkes_m extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'product_id';
    protected $table = 'obatalkes_ms';
    protected $fillable = ['name', 'class', 'status'];
    protected $dates = ['deleted_at'];
}
