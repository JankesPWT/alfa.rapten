<?php
// TODO pozmieniać artist na $this->model/$this->modelName, żeby używać tego controllera wszezie
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\Artist;
use App\Helpers\Dates;
use Illuminate\Database\Capsule\Manager as DB;
use Respect\Validation\Validator as V;


class ArtistController extends Controller
{

    public function index() // : View
    {
        $artists = Artist::get()
            ->take(30);

        return View::make("artist/index", ['artists' => $artists]);
    }

    public function show($vars)
    {

        $id = (int) $vars['id'];
        $artist = Artist::find($id);

        if (!$artist) {
            View::make('errors/404');
            return;
        }

        //obliczenie wieku w helperze i dodanie go do tablicy
        $age = Dates::age($artist['dob']);
        $artist['age'] = $age;

        $albums = $artist->albums()
            ->with('label')
            ->orderByDesc('rel_date')
            ->get()
            ->toArray();

        $withSquads = Artist::getArtistAlbumsWithSquads($id);
        $feats = Artist::getArtistFeats($id);

        return View::make('artist/show', [
            'artist' => $artist,
            'albums' => $albums,
            'withSquads' => $withSquads,
            'feats' => $feats,
        ]);
    }

    public function view($vars)
    {
        // $id = 34;

        // $artist = Artist::find($id);

        // $feats = Artist::getArtistFeats($id);

        // echo '<pre>';
        // print_r($feats);
        // echo '</pre>';
        
        // -----
        // $model = new Artist();
        // //$columns = DB::getSchemaBuilder()->getColumnListing('artist');
        // $columns = ($model)->getFillable();
        // $table = $model->getTable();


        // echo '<pre>';
        // print_r($columns);
        // echo '</pre>';

        //var_dump(V::url()->validate('http://jankes.com.pl'));
    }

    public function create()
    {
        $data = [];
        $errors = [];
        
        # TUTAJ MA BYĆ TYLKO WYŚWIETLANY FORMULARZ!
        if ($this->session->exists('data')) {
            $data = $this->session->get('data');
            $this->session->remove('data');
        }

        if ($this->session->exists('errors')) {
            $errors = $this->session->get('errors');
            $this->session->remove('errors');
        }

        echo '<pre>';
        print_r($this->session->get('data'));
        echo '</pre>';

        // Display a form to create a new artist
        return View::make('artist/create', [
            'fields' => $data,
            'errors' => $errors,
        ]);
    }


    public function store()
    {
        if (isset($_POST)) {
            $data = $_POST;
            $errors = [];

            //TODO walidacja youtube, instagrama
            //TODO zmiana daty urodzenia na raptenową
            //TODO ZDJĘCIE
            $artysta = Artist::where('ksywa', $data['ksywa'])->count();
            if ($artysta === 1) {
                $errors['ksywa'] = 'Taki artysta już istnieje';
            }
            if(empty($data['ksywa'])) {
                $errors['ksywa'] = 'Raper bez ksywy to jak amerykański uczeń bez karabinu';
            }
            
            if ($data['rok'] >= date("Y")) {
                $errors['rok'] = 'Przybysz z przyszłości?';
            }
            if ( ! empty($data['strona']) && ! V::url()->validate($data['strona'])) {
                $errors['strona'] = 'Nieprawidłowy adres';
            }

            $date = Dates::dateFormatter((int)$data['rok'], (int)$data['miesiac'], (int)$data['dzien']);
            $data['dob'] = $date;

            if (! $errors) {
                $this->session->set('data', $data); //to be deleted
                $this->response->redirect('/artist/create');

                //TODO db input

                $artist = new Artist();
                $artist->ksywa = $data['ksywa'];
                $artist->imie = $data['imie'];
                $artist->nazwisko = $data['nazwisko'];
                $artist->miasto = $data['miasto'];
                $artist->dob = $data['dob'];
                $artist->aka = $data['aka'];
                $artist->strona = $data['strona'];
                $artist->facebook = $data['facebook'];
                $artist->instagram = $data['instagram'];
                $artist->youtube = $data['youtube'];
                //$artist->image = $data['image'];
                $artist->bio = $data['bio'];
                //$artist->save();

                // Redirect to the newly created artist's page
                //$this->response->redirect('/artist/'. $artist->artist_id);
            } else {
                $this->session->set('data', $data);
                $this->session->set('errors', $errors);

                $this->response->redirect('/artist/create');
            }
        } else {
            $this->response->redirect('/artist/create');
        }
    }

    /*
    public function edit($id)
    {
        $artist = Artist::getById($id);

        if (!$artist) {
            View::make('404.php');
            return;
        }

        // Display a form to edit the artist's data
        View::make('artists/edit.php', ['artist' => $artist]);
    }

    public function update($id)
    {
        // Handle a POST request to update an existing artist
        $artist = Artist::getById($id);

        if (!$artist) {
            View::make('404.php');
            return;
        }

        $name = $_POST['name'];
        $bio = $_POST['bio'];

        // Validation logic would go here

        $artist->setName($name);
        $artist->setBio($bio);
        $artist->save();

        // Redirect back to the artist's page
        header('Location: /artists/' . $artist->getId());
    }

    public function destroy($id)
    {
        // Handle a DELETE request to delete an existing artist
        $artist = Artist::getById($id);

        if (!$artist) {
            View::make('404.php');
            return;
        }

        $artist->delete();

        // Redirect back to the list of artists
        header('Location: /artists');
    }
    */
}
