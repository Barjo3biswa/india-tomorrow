<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class newsSection extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    use SoftDeletes;

    public function childSection(){
        return $this->hasMany(newsSection::class,'parent_id','id');
    }

    public function contents($slug)
    {
        $test= newsContent::all()->filter(function($content) use ($slug) {
            $category = $content->setCategory();
            return is_array($category) && in_array($slug, $category);
        })->sortByDesc('id');

        return $test;
    }

    public function setAppearence()
    {
        return json_decode($this->appearence, true);
    }
}
