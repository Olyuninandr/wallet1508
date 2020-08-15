<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function getCategoryName()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
