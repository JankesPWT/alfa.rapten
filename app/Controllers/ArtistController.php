<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\ArtistModel;

class ArtistController
{
    private ArtistModel $artists;

    public function __construct()
    {
        $this->artists = new ArtistModel;
    }

    public function index($vars)// : View
    {
        //print_r($vars);
        $artistModel = new ArtistModel();
        
        $artists = $artistModel->findAll();

        return View::make('artist/index', ['artists' => $artists]);
    }

    public function show($vars)
    {
        $id = (int)$vars['id'];
        $artistModel = new ArtistModel();
        
        $artist = $artistModel->findOne($id);

        if (!$artist) {
            View::make('errors/404');
            return;
        }

        return View::make('artist/show', ['artist' => $artist]);
    }

    /*
    public function view($vars)
    {
        //

    }

    public function create()
    {
        // Display a form to create a new artist
        View::make('artists/create.php');
    }

    public function store()
    {
        // Handle a POST request to create a new artist
        $name = $_POST['name'];
        $bio = $_POST['bio'];

        // Validation logic would go here

        $artist = new Artist($name, $bio);
        $artist->save();

        // Redirect to the newly created artist's page
        header('Location: /artist/' . $artist->getId());
    }

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
