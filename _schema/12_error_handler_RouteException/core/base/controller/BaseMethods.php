<?php
namespace core\base\controller;


/**
 * Trait BaseMethods  [ Helper class ]
 *
 *
 * @package core\base\controller
 */
trait BaseMethods
{



    /**
     * Clear String [ Метод для очистки строковое значение ]
     *
     * @param mixed[str|array] $str
     * @return array|string
     */
     protected function clearStr($str)
     {
          if(is_array($str))
          {
              foreach($str as $key => $item)
              {
                  $str[$key] = trim(strip_tags($item));
              }
              return $str;

          }else{

              return trim(strip_tags($str));
          }
     }



    /**
     * Clear Int [ Метод для очистки числовое значение ]
     *
     * @param mixed[int|array] $num
     * @return array|string
     */
     protected function clearNum($num)
     {

         /*
           if(is_int($num)){ echo 'int'; }
           elseif(is_float($num)){ echo 'float'; }
           else{ echo 'string'; }
         */
         // en une line on resume le commentaire si dessus
         return $num * 1;
     }


    /**
     * Determine if request method is post
     *
     *
     * @return bool
     */
     protected function isPost()
     {
         return $_SERVER['REQUEST_METHOD'] == 'POST';
     }


    /**
     * Determine if request method is Ajax
     *
     * @return bool
     */
     protected function isAjax()
     {
         return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
     }


     /**
      * Redirect to location
      *
      * @param bool $http
      * @param bool $code
     */
     protected function redirect($http = false, $code = false)
     {
          if($code)
          {
              $codes = ['301' => 'HTTP/1.1 301 Move Permanently'];

              if($codes[$code])
              {
                  header($codes[$code]);
              }
          }


          if($http)
          {
              $redirect = $http;

          }else{

              $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
          }

          header("Location: $redirect");
          exit;
     }


    /**
     * Errors logger
     *
     * @param $message
     * @param string $file
     * @param string $event
     * @throws \Exception
     */
     public function writeLog($message, $file = 'log.txt', $event = 'Fault')
     {
           $dateTime = new \DateTime();

           $str = $event . ': '. $dateTime->format('d-m-Y G:i:s') . ' - ' . $message . "\r\n";

           file_put_contents('log/'. $file, $str, FILE_APPEND);
     }
}