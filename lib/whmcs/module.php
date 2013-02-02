<?php

/**
 * Module class for working with hosting account modules
 *
 * @package   WHMCS
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */
class WHMCS_Module extends WHMCS_Api
{
	/**
	 * Run the module create command
	 *
	 * Parameters:
	 *
	 * accountid - the unique id number of the account in the tblhosting table
	 *
	 * @see http://docs.whmcs.com/API:Module_Create
	 */
	public static function module_create($params = array())
	{
		$params['action'] = 'modulecreate';
		return self::send_request($params);
	}
	
	/**
	 * Run the module suspend command
	 *
	 * Parameters:
	 *
	 * accountid - the unique id number of the account in the tblhosting table
	 * suspendreason - an explanation of why the suspension has been made shown to clients & staff
	 *
	 * @see http://docs.whmcs.com/API:Module_Suspend
	 */
	public static function module_suspend($params = array())
	{
		$params['action'] = 'modulesuspend';
		return self::send_request($params);
	}
	
	/**
	 * Run the module unsuspend command
	 *
	 * Parameters:
	 *
	 * accountid - the unique id number of the account in the tblhosting table
	 *
	 * @see http://docs.whmcs.com/API:Module_Unsuspend
	 */
	public static function module_unsuspend($params = array())
	{
		$params['action'] = 'moduleunsuspend';
		return self::send_request($params);
	}
	
	/**
	 * Run the module terminate command
	 *
	 * Parameters:
	 *
	 * accountid - the unique id number of the account in the tblhosting table
	 *
	 * @see http://docs.whmcs.com/API:Module_Terminate
	 */
	public static function module_terminate($params = array())
	{
		$params['action'] = 'moduleterminate';
		return self::send_request($params);
	}
	
	/**
	 * Run the change package module command
	 *
	 * Parameters:
	 *
	 * serviceid - ID of the service in WHMCS to run the module command
	 *
	 * @see http://docs.whmcs.com/API:Module_Change_Package
	 */
	public static function module_change_package($params = array())
	{
		$params['action'] = 'modulechangepackage';
		return self::send_request($params);
	}
	
	/**
	 * Runs the change password command to the module for a service
	 *
	 * Parameters:
	 *
	 * serviceid - the unique id of the service to perform the action on
	 * servicepassword - optional - specify to update the password on the service before calling
	 *
	 * @see http://docs.whmcs.com/API:Module_Change_Password
	 */
	public static function module_change_password($params = array())
	{
		$params['action'] = 'modulechangepw';
		return self::send_request($params);
	}
}
