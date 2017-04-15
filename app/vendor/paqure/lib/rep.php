<?php

/** @package    PaQuRe
  * @descr      API Framework
  * @class      Rep (Reply)
  * @author     Roderic Linguri <linguri@digices.com>
  * @license    MIT
  * @copyright  2017 Digices LLC. All Rights Reserved.
  **/

class Rep
{

  /** @property *str* success bool **/
  public $success;

  /** @property *str* returned model **/
  public $model;

  /** @property *str* returned action **/
  public $action;

  /** @property *str* message **/
  public $message;

  /** @property *arr* returned results **/
  public $results;

  /**
    * @method Constructor
    * @descr  extended class must set strings for mdl and col
    */
  public function __construct()
  {
    // initialize a default reply
    $this->results = array();
    $this->success = 'false';
    $this->message = 'No Data';
  } // ./construct

  /**
    * @method Assoc
    * @return *assoc* api response
    */
  public function assoc()
  {
    $res = array(
      'summary' => array(
        'success' => $this->success,
        'model' => $this->model,
        'action' => $this->action,
        'count' => strval(count($this->results)),
        'message' => $this->message
      ),
      'results' => $this->results
    );
    return json_encode($res);
  } // ./assoc

  /**
    * @method Apppend Result
    * @param  *any* result to be returned
    */
  public function appendResult($object)
  {
    $arr = array();
    // normalize to string values for everything
    foreach ($object as $k=>$v) {
      $arr[strval($k)] = strval($v);
    }
    array_push($this->results, $arr);
  } // ./appendResult

}