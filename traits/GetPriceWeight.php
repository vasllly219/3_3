<?php
namespace traits;

trait GetPriceWeight
{
  public function getPrice()
  {
    $cache = new \classes\Cache(get_class($this), $this->title);
    if ($cache->exist()){
      new \classes\Log("Для объекта \"{$this->title}\" был загружен КЭШ его цены");
      $this->validPrice((int)$cache->read());
      return $cache->read();
    }
    if ($this->weight > 10)
    {
      $price = $this->price * (100 - $this->discount) / 100;
    } else {
      $price = $this->price;
    }
    $array = [get_class($this), $this->title, $price];
    new \classes\Log("Для объекта \"{$this->title}\" был записан КЭШ его цены");
    $cache->write(implode("|", $array));
    $this->validPrice($price);
    return $price;


  }
}
