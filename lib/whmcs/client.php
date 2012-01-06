<?php

/**
 * Client class for managing clients
 *
 * @package   WHMCS
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Client extends WHMCS_Base
{

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
   * http://docs.whmcs.com/API:Add_Client
   */

  public static function add_client($params = array()) {
    $params['action'] = 'addclient';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Update_Client
   */

  public static function update_client($params = array()) {
    $params['action'] = 'updateclient';
    return self::send_request($params);
  }

  /**
   * Delete a client
   *
   * Parameters:
   *
   * clientid - ID Number of the client to delete
   *
   * See:
   *
   * http://docs.whmcs.com/API:Delete_Client
   */

  public static function delete_client($params = array()) {
    $params['action'] = 'deleteclient';
    return self::send_request($params);
  }

  /**
   * Close a client account
   *
   * Parameters:
   *
   * clientid - ID Number of the client to close
   *
   * See:
   *
   * http://docs.whmcs.com/API:Close_Client
   */

  public static function close_client($params = array()) {
    $params['action'] = 'closeclient';
    return self::send_request($params);
  }

  /**
   * Add the client note
   *
   * Parameters:
   *
   * userid - UserID for the note
   * notes - The note to add
   *
   * See:
   *
   * http://docs.whmcs.com/API:Add_Client_Note
   */

  public static function add_client_note($params = array()) {
    $params['action'] = 'addclientnote';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Get_Clients
   */

  public static function get_clients($params = array()) {
    $params['action'] = 'getclients';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Get_Clients_Details
   */

  public static function get_clients_details($params = array()) {
    $params['action'] = 'getclientsdetails';
    return self::send_request($params);
  }

  /**
   * Get a list of the client credits
   *
   * Parameters:
   *
   * clientid - ID of the client to obtain the credit list for
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Credits
   */

  public static function get_credits($params = array()) {
    $params['action'] = 'getcredits';
    return self::send_request($params);
  }

  /**
   * Get a list of the client emails
   *
   * Parameters:
   *
   * clientid - ID of the client to obtain the email list for
   * date - optional - date to obtain emails for. Can be YYYYMMDD, YYYYMM, MMDD, DD or MM
   * subject - optional - to obtain email with a specific subject
   * limitstart - optional - for pagination, specify an ID to start at
   * limitnum - optional - to restrict the number of results returned
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Emails
   */

  public static function get_emails($params = array()) {
    $params['action'] = 'getemails';
    return self::send_request($params);
  }

  /**
   * Get quotes
   *
   * Note: WHMCS has this listed under Client as well as quote. It's
   * aliased here for consistancy with their API docs
   *
   * Parameters:
   *
   * quoteid - optional - specific quote to obtain
   * userid - optional - obtain quotes for a specific user
   * datecreated - optional - Format YYYYMMDD
   * lastmodified - optional - Format YYYYMMDD
   * validuntil - optional - Format YYYYMMDD
   * stage - optional - Specific stage to retrieve quotes for
   * subject - optional - to obtain quotes with a specific subject
   * limitstart - optional - for pagination, specify an ID to start at
   * limitnum - optional - to restrict the number of results returned
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Quotes
   */

  public static function get_quotes($params = array()) {
    return WHMCS_Quote::get_quotes($params);
  }

  /**
   * Get a hash of a client's password
   *
   * Parameters:
   *
   * userid - should contain the user id of the client you wish to get the password for
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Clients_Password
   */

  public static function get_clients_password($params = array()) {
    $params['action'] = 'getclientpassword';
    return self::send_request($params);
  }

  /**
   * Get transactions
   *
   * Note: WHMCS has this listed under Client as well as invoices. It's
   * aliased here for consistancy with their API docs
   *
   * Parameters:
   *
   * userid - optional - User ID to obtain details for
   * invoiceid - optional - Obtain transactions for a specific invoice
   * transid - optional - Obtain details for a specific transaction ID
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Transactions
   */

  public static function get_transactions($params = array()) {
    return WHMCS_Invoice::get_transactions($params);
  }

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
   * http://docs.whmcs.com/API:Add_Contact
   */

  public static function add_contact($params = array()) {
    $params['action'] = 'addcontact';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Get_Contacts
   */

  public static function get_contacts($params = array()) {
    $params['action'] = 'getcontacts';
    return self::send_request($params);
  }

  /**
   * Update a client's contact
   *
   * Parameters:
   *
   * contactid - The ID of the contact to update
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
   * http://docs.whmcs.com/API:Update_Contact
   */

  public static function update_contact($params = array()) {
    $params['action'] = 'updatecontact';
    return self::send_request($params);
  }

  /**
   * Delete a client's contact
   *
   * Parameters:
   *
   * contactid - The ID of the contact to delete
   *
   * See:
   *
   * http://docs.whmcs.com/API:Delete_Contact
   */

  public static function delete_contact($params = array()) {
    $params['action'] = 'deletecontact';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Get_Clients_Products
   */

  public static function get_clients_products($params = array()) {
    $params['action'] = 'getclientsproducts';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Update_Client_Product
   */

  public static function update_client_product($params = array()) {
    $params['action'] = 'updateclientproduct';
    return self::send_request($params);
  }

  /**
   * Update client's addon
   *
   * Parameters:
   *
   * id - ID of addon to update
   * addonid - optional - Update the defined addon id
   * name - optional - Custom name to define for the addon
   * setupfee - optional - Setup fee cost. No symbol, just xx.xx
   * recurring - optional - Setup fee cost. No symbol, just xx.xx
   * billingcycle - optional - One of Free Account, One Time, Monthly, Quarterly, Semi-Annually, Annually, Biennially or Triennially
   * nextduedate - optional - Update the next due date yyyymmdd
   * nextinvoicedate - optional - Update the next invoice date yyyymmdd
   * notes - optional - add custom notes to the addon
   * status - optional - Pending, Active, Suspended, Cancelled, Terminated, Fraud
   *
   * See:
   *
   * http://docs.whmcs.com/API:Update_Client_Addon
   */

  public static function update_client_addon($params = array()) {
    $params['action'] = 'updateclientaddon';
    return self::send_request($params);
  }

  /**
   * Get the details of all the domains a client has
   *
   * Parameters:
   *
   * clientid - the ID of the client to retrieve products for
   * domainid - the ID of the domain to retrieve details for
   * domain - the domain of the service to retrieve details for
   *
   * See:
   *
   * http://docs.whmcs.com/API:Get_Clients_Domains
   */

  public static function get_clients_domains($params = array()) {
    $params['action'] = 'getclientsdomains';
    return self::send_request($params);
  }

  /**
   * Update client's domain
   *
   * Parameters:
   *
   * domainid - ID of domain to update
   * domain - instead of domainid
   * type - optional - Register or Transfer
   * regdate - optional - Update the reg date yyyymmdd
   * domain - optional - Update the domain name
   * firstpaymentamount - optional - Set the first payment amount. No symbol, just xx.xx
   * recurringamount - optional - Setup fee cost. No symbol, just xx.xx
   * registrar - optional - Update the registrar assigned to the domain
   * billingcycle - optional - One of Free Account, One Time, Monthly, Quarterly, Semi-Annually, Annually, Biennially or Triennially
   * status - optional - One of Active, Pending, Pending Transfer, Expired, Cancelled, Fraud
   * nextduedate - optional - Update the next due date yyyymmdd
   * nextinvoicedate - optional - Update the next invoice date yyyymmdd
   * expirydate - optional - Update the expiry date yyyymmdd
   * regperiod - optional - Update the reg period for the domain. 1-10
   * paymentmethod - optional - set the payment method
   * subscriptionid - optional - allocate a subscription ID
   * dnsmanagement - optional - enable/disable DNS Management
   * emailforwarding - optional - enable/disable Email Forwarding
   * idprotection - optional - enable/disable ID Protection status
   * donotrenew - optional - enable/disable Do Not Renew
   * updatens - optional - Set to true to update Nameservers
   * nsX - optional - X should be 1-5, nameservers to send. Minimum 1&2 required
   * notes - optional - add custom notes to the addon
   *
   * See:
   *
   * http://docs.whmcs.com/API:Update_Client_Domain
   */

  public static function update_client_domain($params = array()) {
    $params['action'] = 'updateclientdomain';
    return self::send_request($params);
  }

  /**
   * Add cancellation request for a specific product
   *
   * Parameters:
   *
   * serviceid - Service ID to be cancelled
   * type - 'Immediate' OR 'End of Billing Period'
   * reason - Reason for cancel - Optional
   *
   * See:
   *
   * http://docs.whmcs.com/API:Add_Cancel_Request
   */

  public static function add_cancel_request($params = array()) {
    $params['action'] = 'addcancelrequest';
    return self::send_request($params);
  }

  /**
   * Allows you to calculate the cost for an upgrade or downgrade of a product/service, and create an order for it
   *
   * Parameters:
   *
   * clientid - the client ID to be upgraded
   * serviceid - the service ID to be upgraded
   * type - either "product" or "configoptions"
   * newproductid - if upgrade type = product, the new product ID to upgrade to
   * newproductbillingcycle - monthly, quarterly, etc...
   * configoptions[x] - if upgrade type = configoptions, an array of config options
   * paymentmethod - the payment method for the order (paypal, authorize, etc...)
   * ordernotes - any admin notes to add to the order (optional)
   * calconly - set true to just validate upgrade and get price, false to actually create order
   *
   * See:
   *
   * http://docs.whmcs.com/API:Upgrade_Product
   */

  public static function upgrade_product($params = array()) {
    $params['action'] = 'upgradeproduct';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Validate_Login
   */

  public static function validate_login($params = array()) {
    $params['action'] = 'validatelogin';
    return self::send_request($params);
  }

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
   * http://docs.whmcs.com/API:Send_Email
   */

  public static function send_email($params = array()) {
    $params['action'] = 'sendemail';
    return self::send_request($params);
  }

}

/* End of file client.php */
/* Location: ./lib/whmcs/client.php */
