<?php

class ArweaveUploadLinks{

  function register(){
    add_filter("plugin_action_links_" . ARWEAVE_UPLOAD_BASENAME, array($this, 'settings_link'));
  }

  public function settings_link($links){
    $settings_link = '<a href="admin.php?page=arweave_upload">
    Settings<a>';
    array_push($links, $settings_link);
    return $links;
  }
}
