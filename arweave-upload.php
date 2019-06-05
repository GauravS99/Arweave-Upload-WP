<?php
/**
* @package arweave-upload
*/
/*
Plugin Name: Backup to Arweave
Plugin URI: https://github.com/GauravS99/Arweave-Upload-WP
Description: This plugin will use your Arweave keyfile and tokens to submit a permanent backup of each post (or revision) to the Arweave when the user presses ‘Publish’. For information on Arweave and the permaweb, please visit https://www.arweave.org/.
Version: 1.0.0
Author: Gaurav Sharma
Author URI: https://github.com/GauravS99
License: GPLv2 or later
*/
/*

Backup to Arweave is a WordPress plugin that will use your Arweave tokens to submit a
permanent backup of each post to the Arweave when the user presses ‘Publish’.
It will also create a list of transaction ids so that you can find the data you've saved later on.
For more information about Arweave and the permaweb, visit https://www.arweave.org/.

Copyright (C) 2019 Automattic, Inc.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


//For security
if(!defined('ABSPATH')){
  echo 'You cannot access this file';
  die;
}

define('ARWEAVE_UPLOAD_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('ARWEAVE_UPLOAD_BASENAME',  plugin_basename(__FILE__));
define('ARWEAVE_UPLOAD_HOSTNAME',  '159.65.213.43'); //default

require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/base/activate.php';
require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/base/deactivate.php';

function activate_arweave_upload(){
   ArweaveUploadActivate::activate();
}

function deactivate_arweave_upload(){
  ArweaveUploadDeactivate::deactivate();
}

//activation
register_activation_hook(__FILE__, 'activate_arweave_upload');

//deactivation
register_deactivation_hook(__FILE__, 'deactivate_arweave_upload');

require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/init.php';

if(class_exists('ArweaveUploadInit')){
  ArweaveUploadInit::register_services();
}
