<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, $request)

    {
        $query->when($request ?? false, function($query, $search){
            return $query->where('title', 'like', '%'.$search.'%')
                        ->orWhere('body', 'like', '%'.$search.'%');

        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
