<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class newsContent extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function setCategory()
    {
        return json_decode($this->category, true);
    }

    public function sethashtags()
    {
        return json_decode($this->hashtags, true);
    }

    public function hit_count(){
        return $this->HasMany(HitCount::class,'news_id','id');
    }
}
