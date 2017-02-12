<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Member;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['member_id', 'category_id', 'name', 'picture', 'price', 'author', 'overview', 'contact', 'status'];
    public function category()
	{
	    return $this->belongsTo(Category::class);
	}
	public function member()
	{
	    return $this->belongsTo(Member::class);
	}
}
