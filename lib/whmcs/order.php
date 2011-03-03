<?php

/**
 * WHMCS API
 *
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Order extends WHMCS_Base {

  // --------------------------------------------------------------------

  /**
   * Create a new order
   *
   * Parameters:
   *
   * clientid - client id for order
   * pid - product id
   * domain - domain name
   * billingcycle - onetime, monthly, quarterly, semiannually, etc..
   * addons - comma seperated list of addon ids
   * customfields - a base64 encoded serialized array of custom field values
   * configoptions - a base64 encoded serialized array of configurable product options
   * domaintype - set for domain registration - register or transfer
   * regperiod - 1,2,3,etc...
   * dnsmanagement - true to enable
   * emailforwarding - true to enable
   * idprotection - true to enable
   * eppcode - if transfer
   * nameserver1 - first nameserver (req for domain reg only)
   * nameserver2 - second nameserver
   * nameserver3 - third nameserver
   * nameserver4 - fourth nameserver
   * paymentmethod - paypal, authorize, etc...
   * promocode - pass coupon code to apply to the order (optional)
   * affid - affiliate ID if you want to assign the order to an affiliate (optional)
   * noinvoice - set true to not generate an invoice for this order
   * noemail - set true to surpress the order confirmation email
   * clientip - can be used to pass the customers IP (optional)
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Add_Order
   */

  public static function add_order($params = array()) {
    $params['action'] = 'addorder';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get orders
   *
   * Parameters:
   *
   * limitstart - The record number to start at (default = 0)
   * limitnum - The number of order records to return (default = 25)
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Orders
   */

  public static function get_orders($params = array()) {
    $params['action'] = 'getorders';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get products
   *
   * Parameters:
   *
   * pid - can be used to just retrieve the details of a specific product ID
   * gid - can be passed to just retrieve products in a specific group
   * module - can be passed to just retrieve products assigned to a specific module
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Products
   */

  public static function get_products($params = array()) {
    $params['action'] = 'getproducts';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get promotions
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
    $params['action'] = 'getpromotions';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get order statuses
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Order_Statuses
   */

  public static function get_order_statuses() {
    $params['action'] = 'getorderstatuses';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Accept an order
   *
   * Parameters:
   *
   * orderid - the Order ID
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Accept_Order
   */

  public static function accept_order($params = array()) {
    $params['action'] = 'acceptorder';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Place an order in pending
   *
   * Parameters:
   *
   * orderid - the Order ID
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Pending_Order
   */

  public static function pending_order($params = array()) {
    $params['action'] = 'pendingorder';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Cancel an order
   *
   * Parameters:
   *
   * orderid - the Order ID
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Cancel_Order
   */

  public static function cancel_order($params = array()) {
    $params['action'] = 'cancelorder';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Mark an order as fraud
   *
   * Parameters:
   *
   * orderid - the Order ID
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Fraud_Order
   */

  public static function fraud_order($params = array()) {
    $params['action'] = 'fraudorder';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Delete an order
   *
   * Parameters:
   *
   * orderid - the Order ID
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Delete_Order
   */

  public static function delete_order($params = array()) {
    $params['action'] = 'deleteorder';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

}

/* End of file order.php */
/* Location: ./lib/whmcs/order.php */
