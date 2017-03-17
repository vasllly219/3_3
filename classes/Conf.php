<?php
namespace classes;

require_once './autoload.php';

class Conf implements \interfaces\GetPathInterface
{
  public function getPath()
  {
    return str_replace('classes', 'documents', get_class($this)) . static::$resolution;
  }
}
