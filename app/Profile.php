<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'profiles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'profile_img',
        'skills',
        'exp_yrs',
        'qualification',
        'id_type',
        'id_no',
        'gender',  
    ];

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

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
       /* return $query->when(!empty(request()->input('location', 0)), function($query) {
            $query->whereHas('location', function($query) {
                $query->whereId(request()->input('location'));
            });
        })
        ->when(!empty(request()->input('category', 0)), function($query) {
            $query->whereHas('categories', function($query) {
                $query->whereId(request()->input('category'));
            });
        })*/
        return $query->when(!empty(request()->input('search', '')), function($query) {
            $query->where(function($query) {
                $search = request()->input('search');
                $query->where('name', 'LIKE', "%$search%")                   
                    ->orWhere('qualification', 'LIKE', "%$search%")   
                    ->orWhere('studio_address', 'LIKE', "%$search%")
                    ->orWhereHas('location', function($query) use($search){
                        $query->where('name','LIKE', "%$search%");})                    
                    ->orWhereHas('categories', function($query) use($search){
                        $query->where('name','LIKE', "%$search%");  
                });
            });
        });
    }
}
