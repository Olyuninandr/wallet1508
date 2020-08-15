<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable =[
        'amount',
        'category_id',
        'source',
        'date',];

    public function getCategoryName()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
