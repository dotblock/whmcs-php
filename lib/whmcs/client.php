<?php

/**
 * WHMCS API
 *
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Client extends WHMCS_Base {

  // --------------------------------------------------------------------

  /**
   * Create a new client
   *
   * Parameters:
   *
   * firstname
   * lastname
   * companyname - optional
   * email
   * address1
   * address2 - optional
   * city
   * state
   * postcode
   * country - two letter ISO country code
   * phonenumber
   * password2 - password for the new user account
   * currency - the ID of the currency to set the user to
   * groupid - used to assign the client to a client group
   * notes
   * cctype - Visa, Mastercard, etc...
   * cardnum
   * expdate - in the format MMYY
   * startdate
   * issuenumber
   * customfields - a base64 encoded serialized array of custom field values
   * noemail - pass as true to surpress the client signup welcome email sending
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Add_Client
   */

  public static function add_client($params = array()) {
    $params['action'] = 'addclient';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Update a client's info
   *
   * Parameters:
   *
   * firstname
   * lastname
   * companyname
   * email
   * address1
   * address2
   * city
   * state
   * postcode
   * country - two letter ISO country code
   * phonenumber
   * password2
   * credit - credit balance
   * taxexempt - true to enable
   * notes
   * cardtype - visa, mastercard, etc...
   * cardnum - cc number
   * expdate - cc expiry date
   * startdate - cc start date
   * issuenumber - cc issue number
   * language - default language
   * status - active or inactive
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Update_Client
   */

  public static function update_client($params = array()) {
    $params['action'] = 'updateclient';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Delete a client
   *
   * Parameters:
   *
   * clientid - ID Number of the client to delete
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Delete_Client
   */

  public static function delete_client($params = array()) {
    $params['action'] = 'deleteclient';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get multiple clients
   *
   * Parameters:
   *
   * limitstart - Record to start at (default = 0)
   * limitnum - Number of records to return (default = 25)
   * search - Can be passed to filter for clients with a name/email matching the term entered
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Clients
   */

  public static function get_clients($params = array()) {
    $params['action'] = 'getclients';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get a client's info
   *
   * Parameters:
   *
   * clientid - the id number of the client
   * email - the email address of the client
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Clients_Details
   */

  public static function get_clients_details($params = array()) {
    $params['action'] = 'getclientsdetails';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get a hash of a client's password
   *
   * Parameters:
   *
   * userid - should contain the user id of the client you wish to get the password for
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Clients_Password
   */

  public static function get_clients_password($params = array()) {
    $params['action'] = 'getclientpassword';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Add a client contact
   *
   * Parameters:
   *
   * clientid - the client ID to add the contact to
   * firstname
   * lastname
   * companyname
   * email
   * address1
   * address2
   * city
   * state
   * postcode
   * country - two letter ISO country code
   * phonenumber
   * password2 - if creating a sub-account
   * permissions - can specify sub-account permissions eg manageproducts,managedomains
   * generalemails - set true to receive general email types
   * productemails - set true to receive product related emails
   * domainemails - set true to receive domain related emails
   * invoiceemails - set true to receive billing related emails
   * supportemails - set true to receive support ticket related emails
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Add_Contact
   */

  public static function add_contact($params = array()) {
    $params['action'] = 'addcontact';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get client's contacts
   *
   * Parameters:
   *
   * limitstart - Record to start at (default = 0)
   * limitnum - Number of records to return (default = 25)
   * userid
   * firstname
   * lastname
   * companyname
   * email
   * address1
   * address2
   * city
   * state
   * postcode
   * country
   * phonenumber
   * subaccount - true/false
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Contacts
   */

  public static function get_contacts($params = array()) {
    $params['action'] = 'getcontacts';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Update a client's contact
   *
   * Parameters:
   *
   * contactid - The ID of the contact to delete
   * generalemails - set to true to receive general emails
   * productemails - set to true to receive product emails
   * domainemails - set to true to receive domain emails
   * invoiceemails - set to true to receive invoice emails
   * supportemails - set to true to receive support emails
   * firstname - change the firstname
   * lastname - change the lastname
   * companyname - change the companyname
   * email - change the email address
   * address1 - change address1
   * address2 - change address2
   * city - change city
   * state - change state
   * postcode - change postcode
   * country - change country
   * phonenumber - change phonenumber
   * subaccount - enable subaccount
   * password - change the password
   * permissions - set permissions eg manageproducts,managedomains
   *
   * Only send fields you wish to update
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Update_Contact
   */

  public static function update_contact($params = array()) {
    $params['action'] = 'updatecontact';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Delete a client's contact
   *
   * Parameters:
   *
   * contactid - The ID of the contact to delete
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Delete_Contact
   */

  public static function delete_contact($params = array()) {
    $params['action'] = 'deletecontact';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get client's products
   *
   * Parameters:
   *
   * clientid - the ID of the client to retrieve products for
   * serviceid - the ID of the service to retrieve details for
   * domain - the domain of the service to retrieve details for
   * pid - the product ID of the services to retrieve products for
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Clients_Products
   */

  public static function get_clients_products($params = array()) {
    $params['action'] = 'getclientsproducts';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Update client's product
   *
   * Parameters:
   *
   * serviceid - the ID of the service to be updated
   * pid
   * serverid
   * regdate - Format: YYYY-MM-DD
   * nextduedate - Format: YYYY-MM-DD
   * domain
   * firstpaymentamount
   * recurringamount
   * billingcycle
   * paymentmethod
   * status
   * serviceusername
   * servicepassword
   * subscriptionid
   * promoid
   * overideautosuspend - on/off
   * overidesuspenduntil - Format: YYYY-MM-DD
   * ns1
   * ns2
   * dedicatedip
   * assignedips
   * notes
   * autorecalc - pass true to auto set price based on product ID or billing cycle change
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Update_Client_Product
   */

  public static function update_client_product($params = array()) {
    $params['action'] = 'updateclientproduct';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Validate client login info
   *
   * Parameters:
   *
   * email - the email address of the user trying to login
   * password2 - the password they supply for authentication
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Validate_Login
   */

  public static function validate_login($params = array()) {
    $params['action'] = 'validatelogin';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Send email to client
   *
   * Parameters:
   *
   * messagename - unique name of the email template to send from WHMCS
   * id - related ID number to send message for
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Send_Email
   */

  public static function send_email($params = array()) {
    $params['action'] = 'sendemail';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

}

/* End of file client.php */
/* Location: ./lib/whmcs/client.php */
