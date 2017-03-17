<?php
namespace classes;

require_once './autoload.php';

class Cache extends Conf implements \interfaces\WriteInterface, \interfaces\ReadInterface, \interfaces\ExistInterface
{
  use \traits\Write;

  static protected $resolution = '.cached';

  protected $className;
  protected $title;
  protected $price = 0;

  public function __construct($className, $title){
    $this->className = $className;
    $this->title = $title;
  }

  public function read()
  {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $this->getPath());
    $handle = @fopen($file, 'r');
    if ($handle) {
      while (($buffer = fgets($handle)) !== false) {
        $array = explode("|", $buffer);
        if ($array[0] === $this->className && $array[1] === $this->title){
          $this->price = $array[2];
          return $array[2];
        }
      }
      fclose($handle);
      return false;
    }
  }

  public function exist()
  {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $this->getPath());
    $handle = @fopen($file, 'r');
    if ($handle) {
      while (($buffer = fgets($handle)) !== false) {
        $array = explode("|", $buffer);
        if ($array[0] === $this->className && $array[1] === $this->title){
          return true;
        }
      }
      fclose($handle);
      return false;
    }
  }
}
