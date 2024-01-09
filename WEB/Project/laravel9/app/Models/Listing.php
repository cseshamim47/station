<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'listing';
    protected $guarded = [];
    // protected $fillable = ['title'];
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.$filters['tag'].'%');
        }

        if($filters['search'] ?? false){
            $query->where('tags','like','%'.$filters['search'].'%')
            ->orWhere('description','like','%'.$filters['search'].'%')
            ->orWhere('title','like','%'.$filters['search'].'%');
        }
    }

    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
