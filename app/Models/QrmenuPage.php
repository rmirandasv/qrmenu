<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QrmenuPage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'qrmenu_pages';

    protected $primaryKey = 'id';

    protected $fillable = [
        'qrmenu_id',
        'name',
        'cover'
    ];

    public $timestamps = true;

    public function qrmenu()
    {
        return $this->belongsto(
            'App\Models\Qrmenu',
            'qrmenu_id',
            'id'
        );
    }

    public function items()
    {
        return $this->hasMany(
            'App\Models\QrmenuPageItem',
            'qrmenu_page_id',
            'id'
        );
    }

}
