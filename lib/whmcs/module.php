<?php

/**
 * WHMCS API
 *
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

class WHMCS_Module extends WHMCS_Base {

  // --------------------------------------------------------------------

  /**
   * Run the module create command
   *
   * Parameters:
   *
   * accountid - the unique id number of the account in the tblhosting table
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Module_Create
   */

  public static function module_create($params = array()) {
    $params['action'] = 'modulecreate';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Run the module suspend command
   *
   * Parameters:
   *
   * accountid - the unique id number of the account in the tblhosting table
   * suspendreason - an explanation of why the suspension has been made shown to clients & staff
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Module_Suspend
   */

  public static function module_suspend($params = array()) {
    $params['action'] = 'modulesuspend';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Run the module unsuspend command
   *
   * Parameters:
   *
   * accountid - the unique id number of the account in the tblhosting table
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Module_Unsuspend
   */

  public static function module_unsuspend($params = array()) {
    $params['action'] = 'moduleunsuspend';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

  /**
   * Run the module terminate command
   *
   * Parameters:
   *
   * accountid - the unique id number of the account in the tblhosting table
   *
   * See:
   *
   * http://wiki.whmcs.com/API:Module_Terminate
   */

  public static function module_terminate($params = array()) {
    $params['action'] = 'moduleterminate';
    return self::send_request($params);
  }

  // --------------------------------------------------------------------

}

/* End of file module.php */
/* Location: ./lib/whmcs/module.php */
