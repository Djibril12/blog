<?php

class User {

    private $id;
    private $username;
    private $password;
    private $email;
    private $createdAt;

  

    public function __toString() {
          $str =  $this->getUsername() . ' ' . $this->getPassword() . ' ' . $this->getEmail();
    
        return $str;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setId($id) {
        $this->id = (int) $id;
        return $this;
    }

    public function setUsername($username) {
        $this->username = (string) $username;
        return $this;
    }

    public function setPassword($password) {
        $this->password = (string) $password;
        return $this;
    }

    public function setEmail($email) {
        $this->email = (string) $email;
        return $this;
    }

    public function setCreatedAt(DateTime $createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

}
