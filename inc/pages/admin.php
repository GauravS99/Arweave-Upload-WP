<?php

class ArweaveUploadAdmin{

  function register(){
    add_action('admin_menu', array($this, 'add_admin_pages'));
    add_action('admin_init', array($this, 'add_custom_settings'));
  }

  function add_admin_pages(){
    add_menu_page('Arweave Upload', 'Arweave', 'manage_options', 'arweave_upload',
    array($this, 'admin_index'), 'dashicons-admin-network', 110);
    add_submenu_page('arweave_upload', 'Arweave Upload', 'General',
    'manage_options', 'arweave_upload', array($this, 'admin_index'));
  }

  /**
  *  Adds custom settings to the Arweave page
  */
  function add_custom_settings(){
    register_setting('arweave-upload-group', 'keyfile');

    add_settings_section('arweave-upload-options', 'Arweave Upload Settings',
    array($this, 'arweave_upload_options'), 'arweave_upload');

    add_settings_field('arweave-key-button', "Select Key File:",
    array($this, 'arweave_upload_key_button'), 'arweave_upload',
    'arweave-upload-options');

    add_settings_field('arweave-key', "Current Key File:",
    array($this, 'arweave_upload_key'), 'arweave_upload',
    'arweave-upload-options');

    add_settings_field('arweave-key-remove', "Remove Key File:",
    array($this, 'arweave_upload_remove_button'), 'arweave_upload',
    'arweave-upload-options');

  }

  function arweave_upload_options(){
    echo 'Please choose your Arweave wallet key file (JSON)';
  }

  function arweave_upload_key(){
    $keyfile = esc_attr(get_option("keyfile"));

    $value = '';
    if($keyfile !== ''){
        $value = 'value=' . $keyfile;
    }
    echo '<input type="text" name="keyfile" id="keyfile" '. $value .' readonly/>';
  }

  function arweave_upload_key_button(){
    echo '<input type="file" name="keyfile" onchange="airweave_upload_handleFiles(this.files)"/>';
  }

  function arweave_upload_remove_button(){
    echo '<input type="button"  onclick="airweave_upload_onremove()" value="Remove"/>';
  }

  function admin_index(){
    require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'templates/admin.php';
  }

}
