<?php

/**
 * Load all the required WHMCS classes
 *
 * @package   WHMCS
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

$dir = realpath(dirname(__FILE__));

require_once "{$dir}/whmcs/api.php";
require_once "{$dir}/whmcs/client.php";
require_once "{$dir}/whmcs/domain.php";
require_once "{$dir}/whmcs/invoice.php";
require_once "{$dir}/whmcs/misc.php";
require_once "{$dir}/whmcs/module.php";
require_once "{$dir}/whmcs/order.php";
require_once "{$dir}/whmcs/quote.php";
require_once "{$dir}/whmcs/ticket.php";
