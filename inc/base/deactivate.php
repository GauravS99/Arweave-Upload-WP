<?php

class ArweaveUploadDeactivate{
  public static function deactivate(){
    flush_rewrite_rules();
  }
}
