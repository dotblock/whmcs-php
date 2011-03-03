<?php

/**
 * WHMCS API
 *
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Quote extends WHMCS_Base {

  // --------------------------------------------------------------------

  /**
   * Create a new quote
   *
   * Parameters:
   *
   * userid - the unique id number of the client in the tblclients table
   * firstname - optional - only required if userid is not specified
   * lastname - optional - only required if userid is not specified
   * companyname - optional - only required if userid is not specified
   * email - optional - only required if userid is not specified
   * address1 - optional - only required if userid is not specified
   * address2 - optional - only required if userid is not specified
   * city - optional - only required if userid is not specified
   * state - optional - only required if userid is not specified
   * postcode - optional - only required if userid is not specified
   * country - optional - only required if userid is not specified
   * phonenumber - optional - only required if userid is not specified
   * currency - optional - only required if userid is not specified
   * subject - Subject of the quote
   * stage - Draft,Delivered,On Hold,Accepted,Lost,Dead
   * validuntil - In format set in Localisation
   * datecreated - Optional - In format set in Localisation
   * customernotes - notes that are viewable by the client
   * adminnotes - notes that are admin only
   * lineitems - a base64 encoded serialized array containing:
   * desc - The line description
   * qty - The quantity being quoted
   * up - unit price
   * discount - discount amount in %
   * taxable - true or false
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Create_Quote
   */

  public static function create_quote($params = array()) {
    $params['action'] = 'createquote';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Update an existing quote
   *
   * Parameters:
   *
   * quoteid - the id number of the quote in tblquotes
   * userid - the unique id number of the client in the tblclients table
   * firstname - optional - only required if userid is not specified
   * lastname - optional - only required if userid is not specified
   * companyname - optional - only required if userid is not specified
   * email - optional - only required if userid is not specified
   * address1 - optional - only required if userid is not specified
   * address2 - optional - only required if userid is not specified
   * city - optional - only required if userid is not specified
   * state - optional - only required if userid is not specified
   * postcode - optional - only required if userid is not specified
   * country - optional - only required if userid is not specified
   * phonenumber - optional - only required if userid is not specified
   * currency - optional - only required if userid is not specified
   * subject - Subject of the quote
   * stage - Draft,Delivered,On Hold,Accepted,Lost,Dead
   * validuntil - In format set in Localisation
   * datecreated - Optional - In format set in Localisation
   * customernotes - notes that are viewable by the client
   * adminnotes - notes that are admin only
   * lineitems - a base64 encoded serialized array containing:
   * id - existing lineid only required to update existing lines
   * desc - The line description
   * qty - The quantity being quoted
   * up - unit price
   * discount - discount amount in %
   * taxable - true or false
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Update_Quote
   */

  public static function update_quote($params = array()) {
    $params['action'] = 'updatequote';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Delete a quote
   *
   * Parameters:
   *
   * quoteid - the id number of the quote in tblquotes
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Delete_Quote
   */

  public static function delete_quote($params = array()) {
    $params['action'] = 'deletequote';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Send a quote to client
   *
   * Parameters:
   *
   * quoteid - the id number of the quote in tblquotes
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Send_Quote
   */

  public static function send_quote($params = array()) {
    $params['action'] = 'sendquote';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Accept a quote
   *
   * Parameters:
   *
   * quoteid - the id number of the quote in tblquotes
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Accept_Quote
   */

  public static function accept_quote($params = array()) {
    $params['action'] = 'acceptquote';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

}

/* End of file quote.php */
/* Location: ./lib/whmcs/quote.php */
