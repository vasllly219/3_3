<?php
namespace classes\products;

require_once './autoload.php';

class TV extends Product
{
  use \traits\GetPriceWeight;

  private $diagonal;
  private $resolution;

  public function setDiagonal($diagonal)
  {
    new \classes\Log("Определена диагональ объекта \"{$this->title}\" (диагональ = {$diagonal} дюймов)");
    $this->diagonal = $diagonal;
    return $this;
  }

  public function setResolution($resolution)
  {
    new \classes\Log("Определено максемальное разрешение экрана объекта \"{$this->title}\" (максимальное разрешение = {$resolution})");
    $this->resolution = $resolution;
    return $this;
  }

  private function setDelivery()
  {
    if ($this->weight > 10)
    {
      $this->delivery = 250;
    }
    new \classes\Log("Определена стоимость доставки объекта \"{$this->title}\" (цена доставки = {$this->delivery})");
  }

  public function getDiscription()
  {
    $this->setDelivery();
    $price = $this->getPrice();
    $summa = $price + $this->delivery;
    $discriptionArray = ["Телевизор {$this->title}", " c", " диаганалью ", $this->diagonal, " дюймов", " и", " максимальным разрешением экрана ", $this->resolution, "", ",", " весит ", $this->weight, " кг", ". Цена с учетом скидки: ", $price, " + доставка: ", $this->delivery, ". Итого: ", $summa];
    $out = $this->setDiscription($discriptionArray);
    new \classes\Log("Вызвано описание объекта \"$this->title\"");
    return $out;
  }
}
