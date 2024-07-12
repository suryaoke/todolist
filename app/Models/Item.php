<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['description', 'is_completed', 'checklist_id'];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }
}
