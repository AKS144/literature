<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    //use SoftDeletes;

    public $table = 'jobs';

    protected $dates = [
        'created_at',
        'updated_at',
        //'deleted_at',
    ];

    protected $fillable = [
        'title',
        'salary',
        'address',     
        'company',      
        'location_id',
        'name',
        'requirements',
        'description',      
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
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
                $query->where('name', 'LIKE', "%$search%")                   
                    ->orWhere('description', 'LIKE', "%$search%")               
                    ->orWhere('requirements', 'LIKE', "%$search%")
                    ->orWhere('address', 'LIKE', "%$search%")
                    ->orWhereHas('location', function($query) use($search){
                        $query->where('name','LIKE', "%$search%");
                    })
                    ->orWhereHas('categories', function($query) use($search){
                        $query->where('name','LIKE', "%$search%");  
                });                
            });
        });
    }
}
