<?php
namespace classes\products;

require_once './autoload.php';
use \classes\MyException as MyException;

abstract class Product implements \interfaces\ProductInterface
{
  protected $title;
  protected $price;
  protected $weight;
  protected $discount = 10;
  protected $delivery = 300;

  public function __construct($title, $price)
  {
    $this->title = $title;
    $this->price = $price;
    $log = '';
    new \classes\Log("Создан объект \"{$this->title}\" (с ценой = {$price}), класса \"" . get_class($this) . '"');
  }

  public function setWeight($weight)
  {
    new \classes\Log("Определен вес объекта \"{$this->title}\" (вес = {$weight} кг.)");
    $this->weight = $weight;
    return $this;
  }

  public function getTitle()
  {
    new \classes\Log("Вызвано название объекта \"{$this->title}\"");
    return $this->title;
  }

  public function setDiscription(array $discriptionArray)
  {
    $discription = $discriptionArray[0];
    if (isset($discriptionArray[3]) || isset($discriptionArray[7]))
    {
      $discription = $discription . $discriptionArray[1];
    }
    if (isset($discriptionArray[3]))
    {
      $discription = $discription . $discriptionArray[2]. $discriptionArray[3] . $discriptionArray[4];
    }
    if (isset($discriptionArray[3]) && isset($discriptionArray[7]))
    {
      $discription = $discription . $discriptionArray[5];
    }
    if (isset($discriptionArray[7]))
    {
      $discription = $discription . $discriptionArray[6] . $discriptionArray[7] . $discriptionArray[8];
    }
    if ((isset($discriptionArray[3]) || isset($discriptionArray[7])) && isset($discriptionArray[11]))
    {
      $discription = $discription . $discriptionArray[9];
    }
    if (isset($discriptionArray[11]))
    {
      $discription = $discription . $discriptionArray[10]. $discriptionArray[11]. $discriptionArray[12];
    }
    $discription = $discription . $discriptionArray[13] . $discriptionArray[14] . $discriptionArray[15] . $discriptionArray[16] . $discriptionArray[17] . $discriptionArray[18];
    new \classes\Log("Сформуоировано описание объекта \"{$this->title}\" описание: \"{$discription}\"");
    return $discription;
  }

  public function validPrice($price){
    try {
      if ($price === 0){throw new MyException('Цена != 0', 0);}
      if ($price < 0){throw new MyException('Цена < 0', 1);}
      if (is_bool($price)){throw new MyException('Цена не должна быть булиевой', 2);}
      if (is_string($price)){throw new MyException('Цена не должна быть строкой', 3);}
      if (is_array($price)){throw new MyException('Цена не должна быть массивом', 4);}
      if (is_object($price)){throw new MyException('Цена не должна быть обьектом', 5);}
      if (is_resource($price)){throw new MyException('Цена не должна быть ресурсом', 6);}
      if ($price === null){throw new MyException('Цена не должна быть NULL', 7);}
    } catch (MyException $e) {
      new \classes\Log("!!!Поймано собственное переопределенное исключение: " . $e);
    } catch (Exception $e) {
      echo "Поймано встроенное исключение", $e;
    }
  }

  abstract public function getDiscription();
  abstract public function getPrice();
}
