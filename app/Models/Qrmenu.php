<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qrmenu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'qrmenus';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'qrcode',
        'cover',
        'manager_id'
    ];

    public function manager()
    {
        return $this->belongsTo(
            'App\Models\User',
            'user_id',
            'id'
        );
    }

    public function pages()
    {
        return $this->hasMany(
            'App\Models\QrmenuPage',
            'qrmenu_id',
            'id'
        );
    }

}
