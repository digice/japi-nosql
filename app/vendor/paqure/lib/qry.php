<?php

/** @package    PaQuRe
  * @descr      API Framework
  * @class      Qry (Query)
  * @author     Roderic Linguri <linguri@digices.com>
  * @license    MIT
  * @copyright  2017 Digices LLC. All Rights Reserved.
  **/

abstract class Qry
{

  /** @property *assoc* Parse **/
  protected $prs;

  /** @property *assoc* Reply **/
  protected $rep;

  /** @property *str* Model Name **/
  protected $mdl;

  /**
    * @method Constructor
    * @descr  extended class must set strings for mdl and col
    */
  public function __construct()
  {
    $this->rep = new Rep();
  } // ./construct

  /**
    * @method Assoc
    * @return *assoc* api response
    */
  public function assoc()
  {
    return $this->rep->assoc();
  } // ./assoc

}
