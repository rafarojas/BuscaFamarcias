
<?php

# constants

const PREFIX_COOKIE_NAME = 'exp';
header('Content-Type: text/javascript; charset=UTF-8');
const TTL_COOKIE         = 3600;

# functions A

# generates globally unique id; uses singleton pattern
function guid() {
if (!isset($GLOBALS['guid'])) { 
$GLOBALS['guid'] = uniqid( '', false );
}

return $GLOBALS['guid'];
}

# create cookie name following pattern/convetion of 
# exp_$identified_cookie
function cookie_name( $identifier ) {
return implode( '_', [ 
PREFIX_COOKIE_NAME, $identifier, 'cookie'
]);
}

# create cookie value following pattern $prefix-guid
function cookie_value( $prefix ) {
return implode( '-', [
$prefix, guid()
]);
}

# main 


# check if required parmeters are available
if (isset( $_REQUEST['resource'] )) {

# bind request paramters to variables in local scope
# NOTE: @ is used to silent warnings in the event that prefix
# has not been passed
$resources = preg_split( '/\//', $_REQUEST['resource'], null, PREG_SPLIT_NO_EMPTY);
$prefix    = @$_REQUEST['prefix'];

# if prefix has not been passed, then we default to using the
# resources name
if (empty( $prefix )) {
#$prefix = isset( $resources[1] ) ? $resources[1] : $resources[0];
$prefix = 'PARTNERS';
}

header( 'x-resource: ' . $_REQUEST['resource'] );
header( 'x-prefix: '   . $prefix );

# now we have fun - set a cookie name by a split of resources
foreach($resources as $resource) {
setcookie(
cookie_name( $resource ), 
cookie_value( $prefix ),
time() + TTL_COOKIE
);
}

# NOTE: I believe that some third party requires a cookie with
# the name 'exp_partnerscookie' so we are adding here in the event
# that a specific prefix has not been sent. This should be removed
# when we have fully determined the need
setcookie(
'exp_partnerscookie', 
cookie_value( $prefix ),
time() + TTL_COOKIE
);

# NOTE: for any items not containing a prefix, we

# otherwise raise an error and set response code accordingly
} else { 
http_response_code( 500 );
throw new Exception(  
'Failed to pass required parameters'
);
}