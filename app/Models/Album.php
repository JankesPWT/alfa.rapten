<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property int           $album_id
 * @property string        $tytul
 * @property string        $info
 * @property string        $typ
 * @property Carbon        $rel_date
 * @property string        $tracklista
 * @property string        $tracklista_hh
 * @property int           $image
 * @property int           $status
 * @property Carbon        $data_dod
 * @property Carbon        $datownik
 *
 * @property-read Collection $items
 */

class Album extends Model
{

    protected $table = 'album';
    protected $primaryKey = 'album_id';
    const CREATED_AT = 'data_dod';
    const UPDATED_AT = 'datownik';

    protected $casts = [
        'data_dod' => 'datetime:Y-m-d H:m:s',
        'datownik' => 'datetime:Y-m-d H:m:s',
    ];
    
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function label(): BelongsTo
    {
        return $this->belongsTo(Label::class, 'label_id');
    }
    
}