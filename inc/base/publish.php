<?php

include ARWEAVE_UPLOAD_PLUGIN_PATH . '/vendor/autoload.php';

class ArweaveUploadPublish{
  public function register(){
    add_action('publish_post',  array($this, 'arweave_upload'), 10, 2);
  }

  /**
  * uploads the data to the arweave
  */
  function arweave_upload($id, $post_obj){

    try{

      $hostname = get_option("arweave-upload-hostname");

      $arweave = new \Arweave\SDK\Arweave('http', $hostname, 1984);

      $wallet = $this-> get_wallet();

      //if wallet is not valid, do not proceed
      if(!$wallet){
        return;
      }

      $transaction = $arweave->createTransaction($wallet, [
        'quantity' => '0',
        'data' => $this->stringify_post($post_obj),
        'tags' => [
            'Content-Type' => 'WP Post'
        ]
      ]);

      error_log(json_encode($transaction->getAttributes()));

      $transaction_id = $transaction->getAttribute('id');

      $meta_key = 'arweave_txn_id';

      $arweave->api()->commit($transaction);

      add_post_meta($post_obj->ID, $meta_key, $transaction_id);
    }
    catch (TransactionNotFoundException $e) {
        error_log("Caught TransactionNotFoundException: {$e->getMessage()}");
    }
    catch (Exception $e) {
        error_log("Caught Exception: {$e->getMessage()}");
    }
  }

  /**
  * Uses the Wordpress custom keyfile setting to generate a new Arweave wallet
  */
  function get_wallet(){

    $keyfile = get_option("arweave-upload-keyfile");

    if ($keyfile == "" || !json_decode($keyfile, true)) {
        return NULL;
    }

    $wallet = NULL;

    try{
      $wallet = new Arweave\SDK\Support\Wallet(json_decode($keyfile, true);
    }
    catch(Exception $e){
      error_log("Caught Exception: {$e->getMessage()}");
    }

    return $wallet;
  }

  /**
  * Takes a WP Post object and converts into a JSON string to store in Arweave
  */
  function stringify_post($wp_post){
    $parameters = array('ID', 'post_author', 'post_name', 'post_type',
    'post_title', 'post_date', 'post_date_gmt', 'post_content',
    'post_excerpt', 'post_status', 'comment_status', 'ping_status',
    'post_password', 'post_parent', 'post_modified',
    'post_modified_gmt', 'comment_count');

    $result = array();
    foreach ($parameters as $p) {
      $result[$p] = $wp_post -> $p;
    }

    return json_encode($result);
  }

}
