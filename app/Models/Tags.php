<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'name'];

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }
}
