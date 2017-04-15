<?php

/** @package    PaQuRe
  * @descr      API Framework
  * @class      Prs (Parse)
  * @author     Roderic Linguri <linguri@digices.com>
  * @license    MIT
  * @copyright  2017 Digices LLC. All Rights Reserved.
  **/

class Prs
{

  /**
    * @method Param
    * @descr  call with Prs::param('key')
    * @param  *str* request parameter key
    */
  public static function param($key)
  {

    // check for POST
    if (isset($_POST[$key])) {

      // check for characters
      if (strlen($_POST[$key]) > 0) {
        $value = $_POST[$key];
        unset($_POST[$key]);
        return $value;
      } // ./value has characters
      
      else {
        // parameter was empty
        unset($_POST[$key]);
        return false;
      } // ./value was empty string

    } // .POST parameter is valid

    elseif (isset($_GET[$key])) {

      // check for characters
      if (strlen($_GET[$key]) > 0) {
        $value = $_GET[$key];
        unset($_GET[$key]);
        return $value;
      } // ./get value has characters
      
      else {
        unset($_GET[$key]);
        return false;
      } // ./value was empty string

    } // ./No POST, but GET parameter is valid

    else {
      return false;
    } // ./no matching POST or GET

  }

}
