<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public $table = 'profiles';

    protected $dates = [
        'created_at',
        'updated_at',
        //'deleted_at',
    ];

    protected $fillable = [
        'title',
        'salary',
        'address',
        //'top_rated',
        'company',
       
        'location_id',       
        'requirements',
        'description',      
    ];


    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeSearchResults($query)
    {
        return $query->when(!empty(request()->input('location', 0)), function($query) {
            $query->whereHas('location', function($query) {
                $query->whereId(request()->input('location'));
            });
        })
        ->when(!empty(request()->input('category', 0)), function($query) {
            $query->whereHas('categories', function($query) {
                $query->whereId(request()->input('category'));
            });
        })
        ->when(!empty(request()->input('search', '')), function($query) {
            $query->where(function($query) {
                $search = request()->input('search');
                $query->where('title', 'LIKE', "%$search%")                   
                      
                      ->orWhere('address', 'LIKE', "%$search%")
                      ->orWhereHas('location', function($query) use($search){
                        $query->where('name','LIKE', "%$search%");})                    
                      ->orWhereHas('categories', function($query) use($search){
                        $query->where('name','LIKE', "%$search%");  });    
            });
        });
    }
}
