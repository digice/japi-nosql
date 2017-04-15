<?php

/** @package    JAPI-NoSQL
  * @descr      A Simple API Framework
  * @file       Application Autoloader
  * @author     Roderic Linguri <linguri@digices.com>
  * @license    MIT
  * @copyright  2017 Digices LLC. All Rights Reserved.
  **/

$vendor = __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR;

$vi = new DirectoryIterator($vendor);

foreach ($vi as $fw) {

  $dn = $fw->getFilename();

  if (substr($dn, 0, 1) != '.') {
    require_once($vendor.$dn.DIRECTORY_SEPARATOR.'autoload.php');
  }

}

$lib = __DIR__.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR;

$di = new DirectoryIterator($lib);

foreach ($di as $item) {

  $fn = $item->getFilename();

  if (substr($fn, 0, 1) != '.') {
    require_once($lib.$fn);
  }

}
