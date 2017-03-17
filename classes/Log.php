<?php
namespace classes;

require_once './autoload.php';

class Log extends Conf implements \interfaces\WriteInterface
{
  use \traits\Write;

  static protected $resolution = '.log';

  public function __construct($log){
    $this->write(date('d M Y H:i:s',(time()) + 3 * 60 * 60) . ': ' . $log);
  }
}
