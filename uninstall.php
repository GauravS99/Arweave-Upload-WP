<?php

/**
* Trigger this file on uninstall
* @package arweave-upload
*/

if (! defined('WP_UNINSTALL_PLUGIN')){
  die;
}

$args = array(
    'meta_key'  => 'arweave_txn_id',
);
$the_query = new WP_Query($args);

$posts = $the_query->posts;

foreach ($posts as $post) {
  delete_post_meta($post->ID, 'arweave_txn_id');
}

unregister_setting( 'arweave-upload-group', 'arweave-upload-keyfile');
unregister_setting( 'arweave-upload-group', 'arweave-upload-hostname');
