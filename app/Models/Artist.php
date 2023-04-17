<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


/**
 * @property int           $artis_id
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
    
}