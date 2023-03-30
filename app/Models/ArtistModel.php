<?php

namespace App\Models;

use App\Core\Model;

class ArtistModel extends Model
{
    private int $artist_id;
    private string $ksywa;
    private string $imie;
    private string $nazwisko;
    private string $miasto;
    private string $dob;
    private string $bio;
    private string $aka;
    private string $strona;
    private string $facebook;
    private string $youtube;
    private string $image;
    private string $status;
    private string $data_dod;
    private string $datownik;

    public static function tableName(): string 
    {
        return 'artist';
    }

    public static function primaryKey(): string 
    {
        return 'artist_id';
    }
    
    public function getAll()//: object
    {
        return parent::findAll();
    }

    public function getById(int $id)
    {
        return parent::findOne($id);
    }

    public function getByKsywa(string $ksywa)
    {
        $where = ['ksywa' => "$ksywa"];
        return parent::findAllWhere($where);
    }

    /*
    public function create(array $data)
    {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $params = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ];
        return $this->db->execute($sql, $params);
    }
    
    public function update(int $id, array $data)
    {
        $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
        $params = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'id' => $id
        ];
        return $this->db->execute($sql, $params);
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $params = ['id' => $id];
        return $this->db->execute($sql, $params);
    }
    */
}