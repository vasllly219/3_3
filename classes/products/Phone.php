<?php
namespace classes\products;

require_once './autoload.php';

class Phone extends Product
{
  use \traits\GetPriceDiscount;

  private $diagonal;
  private $memory;

  public function setDiagonal($diagonal)
  {
    new \classes\Log("Определена диагональ объекта \"{$this->title}\" (диагональ = {$diagonal} дюймов)");
    $this->diagonal = $diagonal;
    return $this;
  }

  public function setMemory($memory)
  {
    new \classes\Log("Определен объем памяти объекта \"{$this->title}\" (объем памяти = {$memory} Gb)");
    $this->memory = $memory;
    return $this;
  }

  public function getDiscription()
  {
    $price = $this->getPrice();
    $summa = $price + $this->delivery;
    if (isset($this->weight)){$weight = $this->weight * 1000;}else{$weight = NULL;}
    $discriptionArray = ["Телефон {$this->title}", " оснащен ", "", $this->diagonal, " дюймовым дисплеем", " и", " ", $this->memory, " Gb памяти", " и", " весит всего ", $weight, " грамм", ". Цена с учетом скидки: ", $price, " + доставка: ", $this->delivery, ". Итого: ", $summa];
    $out = $this->setDiscription($discriptionArray);
    new \classes\Log("Вызвано описание объекта \"$this->title\"");
    return $out;
  }
}
