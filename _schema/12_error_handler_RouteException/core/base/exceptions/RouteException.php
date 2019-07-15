<?php
namespace core\base\exceptions;



use core\base\controller\BaseMethods;


/**
 * Class RouteException
 *
 * @package core\base\exceptions
 */
class RouteException extends \Exception
{
   protected $messages;

   use BaseMethods;


    /**
     * RouteException Constructor
     *
     *
     * RouteException constructor.
     * @param string $message
     */
   public function __construct($message = "", $code = 0)
   {
       parent::__construct($message, $code);

       $this->messages = include 'messages.php';

       /* debug($this); */

       $error = $this->getMessage() ? $this->getMessage() : $this->messages[$this->getCode()];
       $error .= "\r\n" . 'file ' . $this->getFile() . "\r\n" . 'In line ' . $this->getLine() . "\r\n";

       if($this->messages[$this->getCode()])
       {
           // мы переписываем сообщение в свойство $message родительского
           $this->message = $this->messages[$this->getCode()];
       }

       // method writeLog() from trait BaseMethods
       $this->writeLog($error);
   }

}