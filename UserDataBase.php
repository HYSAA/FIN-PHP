<?php

namespace Model;

use Library\Database\DatabaseAdapterInterface;

class UserDatabase implements UserDatabaseInterface
{
    private $db;
    private $table = "users";

    public function __construct(DatabaseAdapterInterface $db)
    {
        $this->db = $db;
    }

    public function findById($id): ?User
    {
        $this->db->select($this->table, ["id" => $id]);
        $row = $this->db->fetch();

        if (!$row) {
            return null;
        }

        $user = new User();
        $user->setId($row["id"])
             ->setName($row["name"])
             ->setEmail($row["email"]);

        return $user;
    }
    
    public function insert(User $user)
    {
        $data = [
            "name"  => $user->getName(), 
            "email" => $user->getEmail()
        ];

        $this->db->insert($this->table, $data);
    }
    
    public function update(User $user)
    {
        $data = [
            "name"  => $user->getName(), 
            "email" => $user->getEmail()
        ];

        $this->db->update($this->table, $data, "id = {$user->getId()}");
    }

    public function delete(User $user)
    {
        $this->db->delete($this->table, "id = {$user->getId()}");
    }
}
