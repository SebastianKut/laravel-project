<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Define default key other than ID for querries inside controller
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //defines which fields can be persisted through controller Post::create method, to turn it off completely pass empty array

    // protected $guarded = [];

    protected $fillable = ['slug', 'title', 'body', 'user_id'];

    // Database tables main relationships
    // hasOne
    // hasMany
    // belongsTo
    // belongsToMany

    // belongsTo and belongsToMany - you're telling Laravel that this table holds the foreign key that connects it to the other table.

    // hasOne and hasMany - you're telling Laravel that this table does not have the foreign key. (User hasMany Posts - because user doesnt have post_id)

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Now that we defined user method the example query 'find post with id=5 and show his author (or user in this case)' would look like this
    // Post::find(5)->user


    //Many to many relationship (many tags can belong to many articles and vice versa) - requires Tag table and linking table(pivot table) article_tag with relationship of tags and articles
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
