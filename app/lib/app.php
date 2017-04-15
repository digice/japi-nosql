<?php

/** @package    JAPI-NoSQL
  * @descr      A Simple API Framework
  * @class      Default
  * @author     Roderic Linguri <linguri@digices.com>
  * @license    MIT
  * @copyright  2017 Digices LLC. All Rights Reserved.
  **/

class AppCtl
{

  /** @property *str* action **/
  protected $action;

  /** @property *str* model **/
  protected $model;

  /**
    * @method contructor
    **/
  public function __construct()
  {

    // check for global API token
    if ($t = Prs::param('t')) {

      // check that token matches ours
      if ($t == '1a79a4d60de6718e8e5b326e338ae533') {

        // check for model
        if ($m = Prs::param('m')) {

            // check for class
            if (file_exists(__DIR__.DIRECTORY_SEPARATOR.$m.'.php')) {

              $this->model = $m;

            } // ./class exists

            else {
              $this->model = 'default';
            } // ./class does not exist

        } // ./model is set

        else {

          $this->model = 'default';

        }

        $class = ucwords($this->model).'Qry';

        $qry = new $class();

        header('Content-Type: application/json');

        echo $qry->assoc();

      } // .token matches

      else {
        die('API access token is not valid.');
      } // ./token does not match

    } // .token is set

    else {
     die('API Access requires an access token.');
    } // ./token is not set

  } // ./construct

}
