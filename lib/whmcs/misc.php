<?php

/**
 * WHMCS API
 *
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Misc extends WHMCS_Base {

  // --------------------------------------------------------------------

  /**
   * Perform a whois lookup for a domain name
   *
   * Parameters:
   *
   * domain - the domain to check
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Domain_WHOIS
   */

  public static function domain_whois($params = array()) {
    $params['action'] = 'domainwhois';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get activity log
   *
   * Parameters:
   *
   * limitstart - Which User ID to start at (default = 0)
   * limitnum - Limit by number (default = 25)
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Activity_Log
   */

  public static function get_activity_log($params = array()) {
    $params['action'] = 'getactivitylog';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get administrator details
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Admin_Details
   */

  public static function get_admin_details() {
    return self::send_request(array('action' => 'getadmindetails'));
  }

  // --------------------------------------------------------------------

  /**
   * Update administrator notes
   *
   * Parameters:
   *
   * notes - notes to enter
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Update_Admin_Notes
   */

  public static function update_admin_notes($params = array()) {
    $params['action'] = 'updateadminnotes';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get allowed currencies
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Currencies
   */

  public static function get_currencies() {
    return self::send_request(array('action' => 'getcurrencies'));
  }

  // --------------------------------------------------------------------

  /**
   * Get promotions
   *
   * Note: WHMCS has this listed under Misc as well as invoices. It's
   * aliased here for consistancy with their API docs
   *
   * Parameters:
   *
   * code - the specific promotion code to return information for (optional)
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Promotions
   */

  public static function get_promotions($params = array()) {
    return WHMCS_Invoice::get_promotions($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get email templates
   *
   * Parameters:
   *
   * type - optional - from product,domain,support,general,invoice,affiliate
   * language - optional - only required for additional languages
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Email_Templates
   */

  public static function get_email_templates($params = array()) {
    $params['action'] = 'getemailtemplates';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get todo items
   *
   * Parameters:
   *
   * status - optional - from New,Pending,In Progress,Completed,Postponed
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_To-Do_Items
   */

  public static function get_todo_items($params = array()) {
    $params['action'] = 'gettodoitems';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get configured todo item statuses
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_To-Do_Items_Statuses
   */

  public static function get_todo_item_statuses() {
    return self::send_request(array('action' => 'gettodoitemstatuses'));
  }

  // --------------------------------------------------------------------

  /**
   * Get staff online
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Staff_Online
   */

  public static function get_staff_online() {
    return self::send_request(array('action' => 'getstaffonline'));
  }

  // --------------------------------------------------------------------

  /**
   * Get stats
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Stats
   */

  public static function get_stats() {
    return self::send_request(array('action' => 'getstats'));
  }

  // --------------------------------------------------------------------

  /**
   * Encrypt a password with the WHMCS algorithm
   *
   * Parameters:
   *
   * password2 - should contain the string you want encrypting
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Encrypt_Password
   */

  public static function encrypt_password($params = array()) {
    $params['action'] = 'encryptpassword';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Decrypt a string with the WHMCS algorithm
   *
   * NOTE: This cannot be used to decrypt the clients password.
   *
   * Parameters:
   *
   * password2 - should contain the string you want decrypting
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Decrypt_Password
   */

  public static function decrypt_password($params = array()) {
    $params['action'] = 'decryptpassword';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

}

/* End of file misc.php */
/* Location: ./lib/whmcs/misc.php */
