<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 */
class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = array(
        'title',
        'description',
        'parent_id',
        'slug',
    );



}
