<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as DB;

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
    
    protected $fillable = ['ksywa', 'imie', 'nazwisko', 'miasto', 'dob', 'aka', 'strona', 'facebook', 'youtube', 'image', 'bio'];

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

    public static function getArtistAlbumsWithSquads(int $id)
    {
        return DB::table('album as p')
                 ->select('p.*', 'sq.nazwa as squad', 'l.nazwa as label')
                 ->leftJoin('squad as sq', 'sq.squad_id', '=', 'p.squad_id')
                 ->leftJoin('label as l', 'l.label_id', '=', 'p.label_id')
                 ->whereIn('p.squad_id', function($query) use ($id) {
                    $query->select('asq.squad_id')
                        ->from('art_squad as asq')
                        ->where('asq.artist_id', '=', $id);
                 })
                 ->orderBy('p.rel_date', 'DESC')
                 ->get();
    }


    public static function getArtistFeats(int $id)
    {
        return DB::table('feat')
                    ->select([
                        'artist.artist_id',
                        'artist.ksywa AS albumartist',
                        'squad.squad_id',
                        'squad.nazwa',
                        'album.album_id',
                        'album.tytul AS albumtytul',
                        'album.image',
                        'song.song_id',
                        'song.nr',
                        'song.tytul AS songtytul',
                        'artist2.ksywa'
                    ])
                    ->leftJoin('song', 'song.song_id', '=', 'feat.song_id')
                    ->leftJoin('artist', 'artist.artist_id', '=', 'feat.artist_id')
                    ->leftJoin('album', 'album.album_id', '=', 'song.album_id')
                    ->leftJoin('artist as artist2', 'artist2.artist_id', '=', 'album.artist_id')
                    ->leftJoin('squad', 'squad.squad_id', '=', 'album.squad_id')
                    ->where('feat.feat_prod', '=', 1)
                    ->where('album.typ', '<>', 'składanka')
                    ->where('feat.artist_id', '=', $id)
                    ->orderBy('album.rel_date', 'desc')
                    ->orderBy('song.cd', 'asc')
                    ->orderBy('song.nr', 'asc')
                    ->get();
    }
}