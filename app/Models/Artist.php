<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int           $artist_id
 * @property string        $ksywa
 * @property string        $imie
 * @property string        $nazwisko
 * @property string        $miasto
 * @property string        $dob
 * @property string        $bio
 * @property string        $aka
 * @property string        $strona
 * @property string        $facebook
 * @property string        $youtube
 * @property int           $image
 * @property int           $status
 * @property Carbon        $data_dod
 * @property Carbon        $datownik
 *
 * @property-read Collection $items
 */

class Artist extends Model
{

    protected $table = 'artist';
    protected $primaryKey = 'artist_id';
    const CREATED_AT = 'data_dod';
    const UPDATED_AT = 'datownik';

    protected $casts = [
        'data_dod' => 'datetime:Y-m-d H:m:s',
        'datownik' => 'datetime:Y-m-d H:m:s',
    ];

    public function squads(): BelongsToMany
    {
        return $this->belongsToMany(Squad::class, 'art_squad', 'artist_id', 'squad_id', 'artist_id', 'squad_id');
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class, 'artist_id');
    }
    
    public static function getMixtapes($id)
    {
        return Artist::find($id)
                     ->albums
                     ->where('typ', 'mixtape')
                     ->toArray();
    }
}