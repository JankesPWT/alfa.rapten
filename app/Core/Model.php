<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\DB;

abstract class Model
{
    public DB $db;

    public function __construct()
    {
        $this->db = App::$db;     
    }

    abstract static public function tableName(): string;
    abstract static public function primaryKey(): string;
    abstract static public function allFields(): array;

    public function findAll(): ?array
    {
        //przenieść LIMIT do argumentu metody
        $tableName = static::tableName(); 

        $sql = "SELECT * FROM {$tableName} LIMIT 13";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll() ?: null;
    }

    public function findOne(int $id): ?array
    {
        $tableName = static::tableName();
        $primaryKey = static::primaryKey();

        $sql = "SELECT * FROM {$tableName} WHERE {$primaryKey} = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch() ?: null;
    }

    #from codeholic MVC Framework
    public function findAllWhere($where): ?array // ['email' => 'jankes@jankes.com.pl', 'firstname' => 'Jacek']
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        
        $sql = implode(" AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $stmt = $this->db->prepare("SELECT * FROM $tableName WHERE $sql");
        // SELECT * FROM $tableName WHERE email = :email AND firstname = :firstname
        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }
        $stmt->execute();
        return $stmt->fetchAll() ?: null;
    }

    public function save(array $data): bool
    {
        $keys = array_keys($data);
        $values = array_values($data);

        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $stmt = $this->db->prepare(
            "INSERT INTO {$this->tableName()} (" . implode(',', $keys) . ") VALUES ($placeholders)"
        );

        return $stmt->execute($values);
    }

    /*
    public function update(int $id, array $data): bool
    {
        $fields = array_map(fn ($key) => "$key=?", array_keys($data));
        $values = array_values($data);
        $values[] = $id;

        $stmt = $this->db->prepare(
            "UPDATE {$this->tableName()} SET " . implode(',', $fields) . " WHERE id=?"
        );

        return $stmt->execute($values);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->tableName()} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
    */

    public function prepare($sql)
    {
        return $this->db->prepare($sql);
    }
}
