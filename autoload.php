<?php
spl_autoload_register('autoload');
function autoload($name)
{
  $pathToFile = str_replace('\\', DIRECTORY_SEPARATOR, $name) . '.php';
  if (file_exists($pathToFile))
  {
      include "$pathToFile";
  }
}
