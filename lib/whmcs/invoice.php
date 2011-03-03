<?php

/**
 * WHMCS API
 *
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Invoice extends WHMCS_Base {

  // --------------------------------------------------------------------

  /**
   * Get invoices
   *
   * Parameters:
   *
   * userid - the client ID to retrieve invoices for
   * status - the status to filter for, Paid, Unpaid, Cancelled, etc...
   * limitstart - the offset number to start at when returning matches (optional, default 0)
   * limitnum - the number of records to return (optional, default 25)
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Invoices
   */

  public static function get_invoices($params = array()) {
    $params['action'] = 'getinvoices';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get an invoice
   *
   * Parameters:
   *
   * invoiceid - should be the invoice id you wish to retrieve
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Invoice
   */

  public static function get_invoice($params = array()) {
    $params['action'] = 'getinvoice';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Create a new invoice
   *
   * Parameters:
   *
   * userid - should contain the user id of the client you wish to create the invoice for
   * date - the date the invoice is created in the format YYYYMMDD
   * duedate - the date the invoice is due in the format YYYYMMDD
   * taxrate - the rate of tax that should be charged
   * paymentmethod - the payment method for the invoice eg. banktransfer
   * notes - any additional notes the invoice should display to the customer
   * sendinvoice - set to true to send the "Invoice Created" email to the customer
   *
   * itemdescription1 - item 1 description
   * itemamount1 - item 1 amount
   * itemtaxed1 - set to true if item 1 should be taxed
   * itemdescription2 - item 2 description
   * itemamount2 - item 2 amount
   * itemtaxed2 - set to true if item 2 should be taxed
   *
   * etc...
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Create_Invoice
   */

  public static function create_invoice($params = array()) {
    $params['action'] = 'createinvoice';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Update an existing invoice
   *
   * Parameters:
   *
   * invoiceid - The ID of the invoice to update
   * itemdescription - Array of existing line item descriptions to update. Line ID from database needed
   * itemamount - Array of existing line item amounts to update
   * itemtaxed - Array of existing line items taxed or not
   * newitemdescription - Array of new line item descriptipons to add
   * newitemamount - Array of new line item amounts
   * newitemtaxed - Array of new line items taxed or not
   * date - date of invoice format yyyymmdd
   * duedate - duedate of invoice format yyyymmdd
   * datepaid - date invoice was paid format yyyymmdd
   * status - status of invoice. Unpaid, Paid, Cancelled, Collection, Refunded
   * paymentmethod - payment method of invoice eg paypal, banktransfer
   *
   * Other than invoiceid, no other fields are required
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Update_Invoice
   */

  public static function update_invoice($params = array()) {
    $params['action'] = 'updateinvoice';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Add an invoice payment
   *
   * Parameters:
   *
   * invoiceid - should contact the ID number of the invoice to add the payment to
   * transid - should contain the transaction number for the payment
   * amount - should contact the amount paid, can be left blank to take full amount of invoice
   * fees - optional, if set defines how much fees were involved in the transaction
   * gateway - should contain the gateway used in system name format, eg. paypal, authorize, etc...
   * noemail - set to true to not send an email if the payment marks the invoice paid
   * date - optional, if set defines the date the payment was made
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Add_Invoice_Payment
   */

  public static function add_invoice_payment($params = array()) {
    $params['action'] = 'addinvoicepayment';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Attempt to capture payment for an invoice
   *
   * Parameters:
   *
   * invoiceid - the ID of the invoice the capture is to be attempted for
   * cvv - optionally can be used to pass the cards verification value in the payment request
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Capture_Payment
   */

  public static function capture_payment($params = array()) {
    $params['action'] = 'capturepayment';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Add a new billable item
   *
   * Parameters:
   *
   * clientid
   * description
   * amount
   * recur - frequency to recur - 1,2,3,etc...
   * recurcycle - Days, Weeks, Months or Years
   * recurfor - number of times to repeat
   * invoiceaction - noinvoice, nextcron, nextinvoice, duedate, recur
   * duedate - date the invoice should be due
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Add_Billable_Item
   */

  public static function add_billable_item($params = array()) {
    $params['action'] = 'addbillableitem';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Add a credit to client's account
   *
   * Parameters:
   *
   * clientid - the ID of the client the credit is to be added to
   * description - reason for credit being added (stored in admin credit log)
   * amount - the amount to be added
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Add_Credit
   */

  public static function add_credit($params = array()) {
    $params['action'] = 'addcredit';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Add transaction
   *
   * Parameters:
   *
   * userid - Optional Add Transaction to a user
   * invoiceid - Optional Add transaction to a particular invoice
   * description - Description of the transaction
   * amountin - amount to add to the account
   * amountout - if an outgoing enter this
   * fees - transaction fee you were charged
   * paymentmethod - gateway used in WHMCS
   * transid - Transaction ID you wish to assign
   * date - date of transaction (same format as your WHMCS eg DD/MM/YYYY)
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Add_Transaction
   */

  public static function add_transaction($params = array()) {
    $params['action'] = 'addtransaction';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get configured payment methods
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Payment_Methods
   */

  public static function get_payment_methods() {
    return self::send_request(array('action' => 'getpaymentmethods'));
  }

  // --------------------------------------------------------------------

}

/* End of file invoice.php */
/* Location: ./lib/whmcs/invoice.php */
