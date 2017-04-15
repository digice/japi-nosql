<?php

/** @package    JAPI-NoSQL
  * @descr      A Simple API Framework
  * @class      Default
  * @author     Roderic Linguri <linguri@digices.com>
  * @license    MIT
  * @copyright  2017 Digices LLC. All Rights Reserved.
  **/

class DefaultNameIdx extends Idx
{

  /**
    * @method Constructor
    * @descr  extended class must set strings for mdl and col
    */
  public function __construct()
  {
    $this->mdl = 'default';
    $this->col = 'name';
    parent::__construct();
  } // ./construct

}

class DefaultMdl extends Mdl
{

  /** @property *obj* shared instance **/
  protected static $shared;

  /**
    * @method Shared
    * @retuen  *obj* singleton
    */
  public static function shared()
  {
    if (!isset(self::$shared)) {
      self::$shared = new self();
    }
    return self::$shared;
  } // ./shared

  /**
    * @method Constructor
    */
  public function __construct()
  {

    // set the name of this model
    $this->name = 'default';

    $this->idx = new DefaultNameIdx();

    // parent constructor will calculate paths based on name
    parent::__construct();

  } // ./construct

}

class DefaultQry extends Qry
{

  /**
    * @method Constructor
    */
  public function __construct()
  {

    // parent constructs a default reply
    parent::__construct();

    $this->rep->model = 'default';

    if ($a = Prs::param('a')) {
      $this->rep->action = $a;
    } // ./an action parameter was set

    else {
      $this->rep->action = 'default';
    } // ./no action parameter

  } // ./construct

}
