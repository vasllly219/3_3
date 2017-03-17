<?php
namespace interfaces;

interface ProductInterface
{
  public function __construct($title, $price);
  public function setWeight($weight);
  public function getTitle();
}
