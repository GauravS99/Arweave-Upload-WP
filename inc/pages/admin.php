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
    register_setting('arweave-upload-group', 'arweave-upload-keyfile');
    register_setting('arweave-upload-group', 'arweave-upload-hostname');
    update_option('arweave-upload-hostname',  ARWEAVE_UPLOAD_HOSTNAME);

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

    add_settings_field('arweave-node', "Provide any valid Arweave node hostname or IP address:",
    array($this, 'arweave_upload_hostname'), 'arweave_upload',
    'arweave-upload-options');

  }

  function arweave_upload_options(){
    echo 'Please choose your Arweave wallet key file (JSON)';
  }

  function arweave_upload_key(){
    $keyfile = esc_attr(get_option("arweave-upload-keyfile"));

    $value = '';
    if($keyfile !== ''){
        $value = 'value=' . $keyfile;
    }
    echo '<input type="text" name="arweave-upload-keyfile" id="arweave-upload-keyfile" '. $value .' readonly/>';
  }

  function arweave_upload_key_button(){
    echo '<input type="file" onchange="airweave_upload_handleFiles(this.files)"/>';
  }

  function arweave_upload_remove_button(){
    echo '<input type="button"  onclick="airweave_upload_onremove()" value="Remove"/>';
  }

  function arweave_upload_hostname(){
      $hostname = esc_attr(get_option("arweave-upload-hostname"));

      if(!$hostname ||  $hostname === ''){
          $value = 'value="' . ARWEAVE_UPLOAD_HOSTNAME . '"';
      }
      else{
          $value = 'value=' . $hostname;
      }

      echo '<input type="text" name="arweave-upload-hostname" id="arweave-upload-hostname" '. $value .' />';
  }
  function admin_index(){
    require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'display/admin.php';
  }

}
