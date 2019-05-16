<?php

class ArweaveUploadUninstall{
  public static function uninstall(){
    // Access database with SQL
    $args = array(
        'meta_key'  => 'arweave_txn_id',
    );
    $the_query = new WP_Query($args);

    $posts = $the_query->posts;

    foreach ($posts as $post) {
      delete_post_meta($post->ID, 'arweave_txn_id');
    }
  }

}
