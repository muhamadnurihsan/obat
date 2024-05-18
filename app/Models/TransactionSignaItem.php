<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionSignaItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'productID';
    protected $fillable = ['id', 'transaction_id', 'product_id', 'quantity', 'stok'];
}
