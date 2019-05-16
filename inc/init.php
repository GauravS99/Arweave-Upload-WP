<?php

require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/base/publish.php';
require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/pages/admin.php';
require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/pages/links.php';


final class ArweaveUploadInit{
  /**
  * Store all the classes inside array
  * @return array a full list of classes
  */
  public static function get_services(){
    return array(
      ArweaveUploadAdmin::class,
      ArweaveUploadLinks::class,
      ArweaveUploadPublish::class,
    );
  }

  /**
  * Loops through classes and does register method if available
  */
  public static function register_services(){
    foreach(self::get_services() as $class){
      $service = new $class();
      if(method_exists($service, 'register')){
        $service -> register();
      }
    }
  }

}
