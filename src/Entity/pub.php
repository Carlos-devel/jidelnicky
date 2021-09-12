<?php
// src/Entity/pub.php
namespace App\Entity;

class pub {
  private $id;

  private $name;

  private $address;

  private $url;

  private $gps;

  public function setId(int $id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setName(string $name){
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function setAddress(string $address) {
    $this->address = $address;
  }

  public function getAddress() {
    return $this->address;
  }

  public function setUrl (string $url) {
    $this->url = $url;
  }

  public function getUrl() {
    return $this->url;
  }

  public function setGPS(array $GPS) {
    $this->GPS = $GPS;
  }

  public function getGPS() {
    return $this->GPS;
  }

  public function __construct() {

  }

}
