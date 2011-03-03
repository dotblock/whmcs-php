<?php

/**
 * WHMCS API
 *
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Base {

  /**
   * Sends an API request to the WHMCS API
   *
   * Parameters:
   * action - The API action to perform
   *
   * All other parameters are passed along as HTTP POST variables
   */

  public static function send_request($params = array()) {
    if ( ! isset($params['action'])) {
      trigger_error("No API action set");
      exit;
    }

    if ( ! defined('WHMCS_USERNAME') || ! defined('WHMCS_PASSWORD') || ! defined('WHMCS_URL')) {
      trigger_error("Must set WHMCS_USERNAME, WHMCS_PASSWORD, and WHMCS_URL constants");
      exit;
    }

    $params['username'] = WHMCS_USERNAME;
    $params['password'] = WHMCS_PASSWORD;

    $url = WHMCS_URL;

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $data = curl_exec($ch);

    curl_close($ch);

    return self::parse_response($data);
  }

  // --------------------------------------------------------------------

  /**
   * Converts the API response to a Hash
   */

  public static function parse_response($raw = "") {
    if (strpos($raw, "xml version") !== FALSE) {
      return simplexml_load_string($raw);
    } elseif (strpos($raw, ';') !== FALSE) {
      $output = array();
      $lines = explode(';', $raw);
      foreach ($lines as $line) {
        if (strpos($line, '=') !== FALSE) {
          list($key, $val) = explode('=', $line);
          if ($key != "") {
            $output[$key] = $val;
          }
        }
      }
      return (object) $output;
    } else {
      return array();
    }
  }

  // --------------------------------------------------------------------

}

/* End of file base.php */
/* Location: ./lib/whmcs/base.php */
