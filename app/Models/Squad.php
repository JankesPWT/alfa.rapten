<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



/**
 * @property int           $squad_id
 * @property string        $nazwa
 * @property string        $miasto
 * @property string        $est_date
 * @property string        $strona
 * @property string        $facebook
 * @property string        $youtube
 * @property string        $info
 * @property int           $image
 * @property int           $status
 * @property Carbon        $data_dod
 * @property Carbon        $datownik
 *
 * @property-read Collection $items
 */

class Squad extends Model
{

    protected $table = 'squad';
    protected $primaryKey = 'squad_id';
    const CREATED_AT = 'data_dod';
    const UPDATED_AT = 'datownik';

    protected $casts = [
        'data_dod' => 'datetime:Y-m-d H:m:s',
        'datownik' => 'datetime:Y-m-d H:m:s',
    ];
    
    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'art_squad', 'squad_id', 'artist_id', 'squad_id', 'artist_id');
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class, 'squad_id');
    }
}