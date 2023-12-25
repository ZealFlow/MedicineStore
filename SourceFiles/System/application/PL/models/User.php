<?php

class User {
    private $userID;
    private $fullName;
    private $password;
    private $email;
    private $address;
    private $phone;
    private $status;
    private $role;

    public function __construct($userID = null, $fullName = null, $password = null, $email = null, $address = null, $phone = null, $status = null, $role = null) {
        $this->userID = $userID;
        $this->fullName = $fullName;
        $this->password = $password;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->status = $status;
        $this->role = $role;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function isStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}
