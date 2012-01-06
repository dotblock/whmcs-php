<?php

/**
 * Misc class for miscelaneous WHMCS API functions
 *
 * @package   WHMCS
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Misc extends WHMCS_Base
{

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
   * http://docs.whmcs.com/API:Get_Activity_Log
   */

  public static function get_activity_log($params = array()) {
    $params['action'] = 'getactivitylog';
    return self::send_request($params);
  }

  /**
   * Get administrator details
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Admin_Details
   */

  public static function get_admin_details() {
    return self::send_request(array('action' => 'getadmindetails'));
  }

  /**
   * Update administrator notes
   *
   * Parameters:
   *
   * notes - notes to enter
   *
   * See:
   *
   * http://docs.whmcs.com/API:Update_Admin_Notes
   */

  public static function update_admin_notes($params = array()) {
    $params['action'] = 'updateadminnotes';
    return self::send_request($params);
  }

  /**
   * Get allowed currencies
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Currencies
   */

  public static function get_currencies() {
    return self::send_request(array('action' => 'getcurrencies'));
  }

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
   * http://docs.whmcs.com/API:Get_Promotions
   */

  public static function get_promotions($params = array()) {
    return WHMCS_Invoice::get_promotions($params);
  }

  /**
   * Get a list of the client groups
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Client_Groups
   */

  public static function get_client_groups() {
    return self::send_request(array('action' => 'getclientgroups'));
  }

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
   * http://docs.whmcs.com/API:Get_Email_Templates
   */

  public static function get_email_templates($params = array()) {
    $params['action'] = 'getemailtemplates';
    return self::send_request($params);
  }

  /**
   * Get todo items
   *
   * Parameters:
   *
   * status - optional - from New,Pending,In Progress,Completed,Postponed
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_To-Do_Items
   */

  public static function get_todo_items($params = array()) {
    $params['action'] = 'gettodoitems';
    return self::send_request($params);
  }

  /**
   * Get configured todo item statuses
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_To-Do_Items_Statuses
   */

  public static function get_todo_item_statuses() {
    return self::send_request(array('action' => 'gettodoitemstatuses'));
  }

  /**
   * Update a todo list item
   *
   * Parameters:
   *
   * itemid - ID of the ToDo in WHMCS to update
   * adminid - Admin ID to update the To Do item to
   * date - optional - open date of the To Do YYYYMMDD
   * title - optional - Title of the to do
   * description - optional - Text of the To Do
   * status - optional - Status - New, Pending, In Progress, Completed, Postponed
   * duedate - optional - due date of the To Do YYYYMMDD
   *
   * See:
   *
   * http://docs.whmcs.com/API:Update_To-Do_Item
   */

  public static function update_todo_item($params = array()) {
    $params['action'] = 'updatetodoitem';
    return self::send_request($params);
  }

  /**
   * Get staff online
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Staff_Online
   */

  public static function get_staff_online() {
    return self::send_request(array('action' => 'getstaffonline'));
  }

  /**
   * Get stats
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Stats
   */

  public static function get_stats() {
    return self::send_request(array('action' => 'getstats'));
  }

  /**
   * Encrypt a password with the WHMCS algorithm
   *
   * Parameters:
   *
   * password2 - should contain the string you want encrypting
   *
   * See:
   *
   * http://docs.whmcs.com/API:Encrypt_Password
   */

  public static function encrypt_password($params = array()) {
    $params['action'] = 'encryptpassword';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Decrypt_Password
   */

  public static function decrypt_password($params = array()) {
    $params['action'] = 'decryptpassword';
    return self::send_request($params);
  }

  /**
   * Ban an IP address on your system
   *
   * Parameters:
   *
   * days - number of days to ban for. If not submitted defaults to 7 (not required)
   * expires - in YYYY-MM-DD HH:II:SS format eg: 2011-06-06 01:12:34
   * ip - the ip to ban
   *
   * See:
   *
   * http://docs.whmcs.com/API:Add_Banned_IP
   */

  public static function add_banned_ip($params = array()) {
    $params['action'] = 'addbannedip';
    return self::send_request($params);
  }

  /**
   * Create products inside WHMCS
   *
   * Parameters:
   *
   * type - one of hostingaccount, reselleraccount, server or other
   * gid - the product group ID to add it to
   * name - the product name
   * description - the product description (optional)
   * hidden - set true to hide
   * showdomainoptions - set true to show
   * welcomeemail - the email template ID for a welcome email
   * qty - set quantity to enable stock control
   * proratadate - (optional)
   * proratachargenextmonth - (optional)
   * paytype - free, onetime or recurring
   * autosetup - on, payment, order or blank for none
   * module - module name (if applicable)
   * servergroupid - server group ID (optional)
   * subdomain - subdomain to offer with product (optional)
   * tax - set true to apply tax
   * order - display sort order to override default
   * configoption1
   * configoption2
   * etc...
   * pricing - an array of pricing in the format pricing[currencyid][cycle]
   *
   * See:
   *
   * http://docs.whmcs.com/API:Add_Product
   */

  public static function add_product($params = array()) {
    $params['action'] = 'addproduct';
    return self::send_request($params);
  }

  /**
   * Add an item to the activity log
   *
   * Parameters:
   *
   * description - Text to add to the log
   * userid - optional - UserID to assign the log to in order to appear in Client Log
   *
   * See:
   *
   * http://docs.whmcs.com/API:Log_Activity
   */

  public static function log_activity($params = array()) {
    $params['action'] = 'logactivity';
    return self::send_request($params);
  }

  /**
   * Send an email to admin users
   *
   * Parameters:
   *
   * messagename - Name of the Admin email template to send
   * mergefields - array of merge fields to populate the template being sent
   * type - Who to send the email to. One of system, account or support. Default: system
   * customsubject - optional - Subject for a custommessage being sent
   * custommessage - optional - Send a custom email to admin users, this will override 'messagename'
   * deptid - optional - If type = support, the users of a department to send email to
   *
   * See:
   *
   * http://docs.whmcs.com/API:Send_Admin_Email
   */

  public static function send_admin_email($params = array()) {
    $params['action'] = 'sendadminemail';
    return self::send_request($params);
  }

}

/* End of file misc.php */
/* Location: ./lib/whmcs/misc.php */
