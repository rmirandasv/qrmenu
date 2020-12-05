<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QrmenuPageItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'qrmenu_page_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'qrmenu_page_id',
        'item_name',
        'item_desc',
        'item_photo',
        'item_price'
    ];

    public $timestamps = true;

    public function qrMenuPage()
    {
        return $this->belongsTo(
            'App\Models\QrmenuPage',
            'qrmenu_page_id',
            'id'
        );
    }
}
