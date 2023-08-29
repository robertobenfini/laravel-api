<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\Technologies;


class Project extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'title', 'content', 'slug', 'image'];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }
}
