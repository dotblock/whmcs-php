<?php

/**
 * WHMCS API
 *
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Ticket extends WHMCS_Base {

  // --------------------------------------------------------------------

  /**
   * Open a new ticket
   *
   * Parameters:
   *
   * clientid - the ID of the client the ticket belongs to
   * name - only required if not a registered client (clientid must be sent as 0)
   * email - only required if not a registered client
   * deptid - the ID of the ticket department
   * subject
   * message
   * priority - can be "Low", "Medium" or "High"
   * serviceid - the ID if the ticket relates to a specific product
   * customfields - a base 64 serialized array of field IDs => values
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Open_Ticket
   */

  public static function open_ticket($params = array()) {
    $params['action'] = 'openticket';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Reply to ticket
   *
   * Parameters:
   *
   * ticketid - the ID of the ticket to add the reply to
   * clientid - if adding reply as a client
   * name - only required if not a registered client (clientid must be sent as 0)
   * email - only required if not a registered client
   * adminusername - if adding reply as an admin, name to show
   * message
   * status - specify if you want to set the status to On Hold or In Progress after reply
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Reply_Ticket
   */

  public static function reply_ticket($params = array()) {
    $params['action'] = 'addticketreply';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get tickets
   *
   * Parameters:
   *
   * limitstart - Optional start at which result (default 0)
   * limitnum - Optional limit at how many results (default 25)
   * clientid - Optional search for a particular client's tickets
   * deptid - Optional search in a particular department
   * status - Optional search a particular status
   * subject - Optional search for a word in the subject
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Tickets
   */

  public static function get_tickets($params = array()) {
    $params['action'] = 'gettickets';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get a ticket
   *
   * Parameters:
   *
   * ticketid - Ticket id to retrieve
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Ticket
   */

  public static function get_ticket($params = array()) {
    $params['action'] = 'getticket';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Update an existing ticket
   *
   * Parameters:
   *
   * ticketid - Ticket ID to be updated
   * subject
   * priority - Low, Medium or High
   * status - Open, Answered, Closed, etc...
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Update_Ticket
   */

  public static function update_ticket($params = array()) {
    $params['action'] = 'updateticket';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Add a note to an existing ticket
   *
   * Parameters:
   *
   * ticketid - Ticket ID the note is to be added
   * message - The not to add
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Add_Ticket_Note
   */

  public static function add_ticket_note($params = array()) {
    $params['action'] = 'addticketnote';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Delete an existing ticket
   *
   * Parameters:
   *
   * ticketid - Ticket ID to be deleted
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Delete_Ticket
   */

  public static function delete_ticket($params = array()) {
    $params['action'] = 'deleteticket';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get support departments
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Support_Departments
   */

  public static function get_support_departments() {
    return self::send_request(array('action' => 'getsupportdepartments'));
  }

  // --------------------------------------------------------------------

  /**
   * Get support statuses
   *
   * Parameters:
   *
   * deptid - Optional - Send a Department ID to limit results
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Support_Statuses
   */

  public static function get_support_statuses($params = array()) {
    $params['action'] = 'getsupportstatuses';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Get ticket predefined categories
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Ticket_Predefined_Cats
   */

  public static function get_ticket_predefined_cats() {
    return self::send_request(array('action' => 'getticketpredefinedcats'));
  }

  // --------------------------------------------------------------------

  /**
   * Get ticket predefined replies
   *
   * Parameters:
   *
   * catid - Optional Select category to browse
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Get_Ticket_Predefined_Replies
   */

  public static function get_ticket_predefined_repies($params = array()) {
    $params['action'] = 'getsupportstatuses';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

}

/* End of file ticket.php */
/* Location: ./lib/whmcs/ticket.php */
