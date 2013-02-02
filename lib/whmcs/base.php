<?php

/**
 * Main class used to subclass WHMCS API resources
 *
 * @package   WHMCS
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Base
{

  /**
   * @var The URL to the WHMCS API
   */
  public static $api_url;

  /**
   * @var The username for the authentication to the WHMCS API
   */
  public static $api_username;

  /**
   * @var The password for the authentication to the WHMCS API
   */
  public static $api_password;

  /**
   * Sets the WHMCS API settings
   *
   * @param string $api_url      The url to the WHMCS API
   * @param string $api_username The username for the API to authenticate using
   * @param string $api_password The password for the API to authenticate using
   *
   * @return void
   */

  public static function init($api_url, $api_username, $api_password) {
    if (empty($api_url) || empty($api_username) || empty($api_password)) {
      trigger_error('Must set WHMCS API url, username, and password settings');
      exit;
    }

    self::$api_url = $api_url;
    self::$api_username = $api_username;
    self::$api_password = $api_password;
  }

  /**
   * Sends an API request to the WHMCS API
   *
   * Parameters:
   * action - The API action to perform
   *
   * All other parameters are passed along as HTTP POST variables
   *
   * @param array $params The parameters to pass to WHMCS
   * @return unknown
   */

  public static function send_request($params = array()) {
    if (empty(self::$api_url) || empty(self::$api_username) || empty(self::$api_password)) {
      trigger_error('Must set WHMCS API url, username, and password settings');
      exit;
    }

    if (empty($params['action'])) {
      trigger_error('No API action set');
      exit;
    }

    $params['responsetype'] = 'json';
    $params['username'] = self::$api_username;
    $params['password'] = self::$api_password;

    $ch = curl_init(self::$api_url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $data = curl_exec($ch);

    curl_close($ch);

    $response = self::parse_response($data);
    return $response;
  }

  /**
   * Parses the API response
   *
   * @param string $response The response from the API request
   * @return void
   */

  public static function parse_response($response) {
    return json_decode(trim($response));
  }

}
