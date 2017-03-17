<?php
namespace traits;

trait Write
{
  protected $name;
  protected $file;
  protected $fp;

  public function write($data)
  {
    $this->file = str_replace('\\', DIRECTORY_SEPARATOR, $this->getPath());
    $this->fp = fopen($this->file, 'a');
    fwrite($this->fp, $data . PHP_EOL);
    fclose($this->fp);
  }
}
