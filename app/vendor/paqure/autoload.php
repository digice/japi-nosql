<?php

/** @package    PaQuRe
  * @descr      API Framework
  * @file       Library Autoloader
  * @author     Roderic Linguri <linguri@digices.com>
  * @license    MIT
  * @copyright  2017 Digices LLC. All Rights Reserved.
  **/

$lib = __DIR__.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR;

$di = new DirectoryIterator($lib);

foreach ($di as $item) {

  $fn = $item->getFilename();

  if (substr($fn, 0, 1) != '.') {
    require_once($lib.$fn);
  }

}
