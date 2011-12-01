# whmcs-php

whmcs-php provides an PHP SDK for the [WHMCS API](http://wiki.whmcs.com/API:Functions).


## Usage

    <?php
    include_once 'lib/whmcs.php';

    WHMCS_Client::init('http://example.com/includes/api.php', 'someusername', 'c4ca4238a0b923820dcc509a6f75849b');
    var_dump(WHMCS_Client::get_clients_details(array('clientid' => '1')));

See the `lib/whmcs/` in this repo for usage details.


## Copyright

Copyright (c) 2011 DotBlock.com, see LICENSE in this repo for details.
