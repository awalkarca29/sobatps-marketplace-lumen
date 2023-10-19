<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];
    protected $with = ['category'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
