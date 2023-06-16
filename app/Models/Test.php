<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    use Filterable;
    protected $guarded = false;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'test_tags', 'test_id', 'tag_id');
    }
}
