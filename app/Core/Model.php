<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\DB;

/**
 * Summary of Model
 * @author Jacek Jankes Polit <jankes@jankes.com.pl>
 * @copyright (c) $CURRENT_YEAR
 * @package
 */
abstract class Model
{
    public static DB $db;

    public function __construct()
    {
        static::$db = App::$db;
    }

    abstract static public function tableName(): string;
    abstract static public function primaryKey(): string;

    public function findAll(): array
    {
        //przenieść LIMIT do argumentu metody
        $tableName = static::tableName(); 

        $sql = "SELECT * FROM {$tableName} LIMIT 13";
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function findOne(int $id): ?array
    {
        $tableName = static::tableName();

        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $stmt = static::db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    #from codeholic MVC Framework
    public function findAllWhere($where) // ['email' => 'jankes@jankes.com.pl', 'firstname' => 'Jacek']
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        
        $sql = implode(" AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $sql");
        // SELECT * FROM $tableName WHERE email = :email AND firstname = :firstname
        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }
        $stmt->execute();
        return $stmt->fetchAll();
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

    public static function prepare($sql)
    {
        return self::$db->prepare($sql);
    }
}
