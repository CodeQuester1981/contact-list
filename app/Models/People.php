<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'id_number',
        'mobile_number',
        'email',
        'language',
        'interests'
    ];

    protected $dates = ['deleted_at'];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('surname', 'like', '%' . request('search') . '%')
                ->orWhere('language', 'like', '%' . request('search') . '%')
                ->orWhere('interests', 'like', '%' . request('search') . '%')
                ->orWhere('mobile_number', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
