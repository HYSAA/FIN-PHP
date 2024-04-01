<?php

namespace Model;

use InvalidArgumentException;
use UnexpectedValueException;

class User implements UserInterface
{
    private $id;
    private $name;
    private $email;

    public function setId($id): self
    {
        if ($this->id !== null) {
            throw new \BadMethodCallException("The user ID has already been set.");
        }

        if (!is_int($id) || $id < 1) {
            throw new InvalidArgumentException("The user ID is invalid.");
        }

        $this->id = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name): self
    {
        if (strlen($name) < 2 || strlen($name) > 30) {
            throw new InvalidArgumentException("The user name must be between 2 and 30 characters.");
        }

        $this->name = $name;
        return $this;
    }
    
    public function getName()
    {
        if ($this->name === null) {
            throw new UnexpectedValueException("The user name has not been set.");
        }

        return $this->name;
    }

    public function setEmail($email): self
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email address.");
        }

        $this->email = $email;
        return $this;
    }
    
    public function getEmail()
    {
        if ($this->email === null) {
            throw new UnexpectedValueException("The user email has not been set.");
        }

        return $this->email;
    }
    
    public function getGravatar($size = 70, $default = "monsterid")
    {
        $email = $this->getEmail();
        $hashedEmail = md5(strtolower($email));

        return "http://www.gravatar.com/avatar/$hashedEmail?s=$size&d=" . urlencode($default) . "&r=G";
    }
}
