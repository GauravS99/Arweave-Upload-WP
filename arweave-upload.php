<?php
/**
* @package arweave-upload
*/
/*
Plugin Name: Arweave Upload
Plugin URI:
Description: This plugin will submits a permanent backup of each post to the Arweave when the user presses ‘Publish’
Version: 1.0.0
Author: Gaurav Sharma
Author URI: https://github.com/GauravS99
License: GPLv2 or later
Text Domain: arweave-upload
*/
/*

Arweave Upload is a WordPress plugin that will submit a
permanent backup of each post to the Arweave when the user presses ‘Publish’

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

require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/base/activate.php';
require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/base/deactivate.php';
require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/base/uninstall.php';

function activate_arweave_upload(){
   ArweaveUploadActivate::activate();
}

function deactivate_arweave_upload(){
  ArweaveUploadDeactivate::deactivate();
}

$uninstall = new ArweaveUploadUninstall();

//activation
register_activation_hook(__FILE__, 'activate_arweave_upload');

//deactivation
register_deactivation_hook(__FILE__, 'deactivate_arweave_upload');

//uninstall
register_uninstall_hook(__FILE__, array($uninstall, 'uninstall'));

require_once ARWEAVE_UPLOAD_PLUGIN_PATH . 'inc/init.php';

if(class_exists('ArweaveUploadInit')){
  ArweaveUploadInit::register_services();
}