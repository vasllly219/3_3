<?php
namespace traits;

trait GetPriceDiscount
{
  public function getPrice()
  {
    $cache = new \classes\Cache(get_class($this), $this->title);
    if ($cache->exist()){
      new \classes\Log("Для объекта \"{$this->title}\" был загружен КЭШ его цены");
      $this->validPrice((int)$cache->read());
      return $cache->read();
    }
    $price = $this->price * (100 - $this->discount) / 100;
    $array = [get_class($this), $this->title, $price];
    new \classes\Log("Для объекта \"{$this->title}\" был записан КЭШ его цены");
    $cache->write(implode("|", $array));
    $this->validPrice($price);
    return $price;
  }
}
