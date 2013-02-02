<?php

/**
 * Ticket class for managing support tickets
 *
 * @package   WHMCS
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */
class WHMCS_Ticket extends WHMCS_Api
{
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
	 * @see http://docs.whmcs.com/API:Open_Ticket
	 */
	public static function open_ticket($params = array())
	{
		$params['action'] = 'openticket';
		return self::send_request($params);
	}
	
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
	 * @see http://docs.whmcs.com/API:Reply_Ticket
	 */
	public static function reply_ticket($params = array())
	{
		$params['action'] = 'addticketreply';
		return self::send_request($params);
	}
	
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
	 * @see http://docs.whmcs.com/API:Get_Tickets
	 */
	public static function get_tickets($params = array())
	{
		$params['action'] = 'gettickets';
		return self::send_request($params);
	}
	
	/**
	 * Get a ticket
	 *
	 * Parameters:
	 *
	 * ticketid - Ticket id to retrieve
	 *
	 * @see http://docs.whmcs.com/API:Get_Ticket
	 */
	public static function get_ticket($params = array())
	{
		$params['action'] = 'getticket';
		return self::send_request($params);
	}
	
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
	 * @see http://docs.whmcs.com/API:Update_Ticket
	 */
	public static function update_ticket($params = array())
	{
		$params['action'] = 'updateticket';
		return self::send_request($params);
	}
	
	/**
	 * Delete an existing ticket
	 *
	 * Parameters:
	 *
	 * ticketid - Ticket ID to be deleted
	 *
	 * @see http://docs.whmcs.com/API:Delete_Ticket
	 */
	public static function delete_ticket($params = array())
	{
		$params['action'] = 'deleteticket';
		return self::send_request($params);
	}
	
	/**
	 * Add a note to an existing ticket
	 *
	 * Parameters:
	 *
	 * ticketid - Ticket ID the note is to be added
	 * message - The not to add
	 *
	 * @see http://docs.whmcs.com/API:Add_Ticket_Note
	 */
	public static function add_ticket_note($params = array())
	{
		$params['action'] = 'addticketnote';
		return self::send_request($params);
	}
	
	/**
	 * Get ticket notes from a specified ticket
	 *
	 * Parameters:
	 *
	 * ticketid - Ticket ID to obtain the notes for
	 *
	 * @see http://docs.whmcs.com/API:Get_Ticket_Notes
	 */
	public static function get_ticket_notes($params = array())
	{
		$params['action'] = 'getticketnotes';
		return self::send_request($params);
	}
	
	/**
	 * Delete a ticket note from a ticket
	 *
	 * Parameters:
	 *
	 * noteid - Note ID to be removed
	 *
	 * @see http://docs.whmcs.com/API:Delete_Ticket_Note
	 */
	public static function delete_ticket_note($params = array())
	{
		$params['action'] = 'deleteticketnote';
		return self::send_request($params);
	}
	
	/**
	 * Get support departments
	 *
	 * Parameters:
	 *
	 * ignore_dept_assignments - Optional send as true to ignore the departments that the API user is assigned to
	 *
	 * @see http://docs.whmcs.com/API:Get_Support_Departments
	 */
	public static function get_support_departments($params = array())
	{
		$params['action'] = 'getsupportdepartments';
		return self::send_request($params);
	}
	
	/**
	 * Get support statuses
	 *
	 * Parameters:
	 *
	 * deptid - Optional - Send a Department ID to limit results
	 *
	 * @see http://docs.whmcs.com/API:Get_Support_Statuses
	 */
	public static function get_support_statuses($params = array())
	{
		$params['action'] = 'getsupportstatuses';
		return self::send_request($params);
	}
	
	/**
	 * Get ticket predefined categories
	 *
	 * @see http://docs.whmcs.com/API:Get_Ticket_Predefined_Cats
	 */
	public static function get_ticket_predefined_cats()
	{
		return self::send_request(array('action' => 'getticketpredefinedcats'));
	}
	
	/**
	 * Get ticket predefined replies
	 *
	 * Parameters:
	 *
	 * catid - Optional Select category to browse
	 *
	 * @see http://docs.whmcs.com/API:Get_Ticket_Predefined_Replies
	 */
	public static function get_ticket_predefined_repies($params = array())
	{
		$params['action'] = 'getticketpredefinedreplies';
		return self::send_request($params);
	}
	
	/**
	 * Add a new announcement
	 *
	 * Parameters:
	 *
	 * date - Date of the announcement in format yyyymmdd
	 * title - Title of the announcement
	 * announcement - Announcement text
	 * published - true/false
	 *
	 * @see http://docs.whmcs.com/API:Add_Announcement
	 */
	public static function add_announcement($params = array())
	{
		$params['action'] = 'addannouncement';
		return self::send_request($params);
	}
	
	/**
	 * Delete an announcement
	 *
	 * Parameters:
	 *
	 * announcementid - The ID of the announcement to delete
	 *
	 * @see http://docs.whmcs.com/API:Delete_Announcement
	 */
	public static function delete_announcement($params = array())
	{
		$params['action'] = 'deleteannouncement';
		return self::send_request($params);
	}
	
	/**
	 * Update an announcement
	 *
	 * Parameters:
	 *
	 * announcementid - ID of the announcement to edit
	 * date - Date of the announcement in format yyyymmdd
	 * title - Title of the announcement
	 * announcement - Announcement text
	 * published - true/false
	 *
	 * @see http://docs.whmcs.com/API:Update_Announcement
	 */
	public static function update_announcement($params = array())
	{
		$params['action'] = 'updateannouncement';
		return self::send_request($params);
	}
	
	/**
	 * Get a list of the announcements
	 *
	 * Parameters:
	 *
	 * limitstart - optional - used for pagination, start at a certain ID
	 * limitnum - optional - restrict number of records
	 *
	 * @see http://docs.whmcs.com/API:Get_Announcements
	 */
	public static function get_announcements($params = array())
	{
		$params['action'] = 'getannouncements';
		return self::send_request($params);
	}
}
