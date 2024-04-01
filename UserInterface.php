<?php

namespace Model;

interface UserInterface
{
    public function setId($id);
    public function getId();

    public function setName($name);
    public function getName();

    public function setEmail($email);
    public function getEmail();
    public function getGravatar();
}

interface UserDatabaseInterface
{
    public function findById($id);
    public function insert(User $user);
    public function update(User $user);
    public function delete(User $user);
}
