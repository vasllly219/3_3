<?php
namespace classes\products;

require_once './autoload.php';

class Fridge extends Product
{
  use \traits\GetPriceDiscount;

  private $volume;
  private $numbersCamers;

  public function setVolume($volume)
  {
    new \classes\Log("Определен обьем(вместимость) объекта \"{$this->title}\" (обьем = {$volume} литров)");
    $this->volume = $volume;
    return $this;
  }

  public function setNumbersCamers($numbersCamers)
  {
    new \classes\Log("Определено количество камер объекта \"{$this->title}\" (количество камер = {$numbersCamers})");
    $this->numbersCamers = $numbersCamers;
    return $this;
  }

  public function getDiscription()
  {
    $price = $this->getPrice();
    $summa = $price + $this->delivery;
    $discriptionArray = ["Холодильник {$this->title}", " оснащен ", "", $this->numbersCamers, " камерами", ",", " общим обьемом ", $this->volume, " литров", " и", " весит ", $this->weight, " кг", ". Цена с учетом скидки: ", $price, " + доставка: ", $this->delivery, ". Итого: ", $summa];
    $out = $this->setDiscription($discriptionArray);
    new \classes\Log("Вызвано описание объекта \"{$this->title}\"");
    return $out;
  }
}
