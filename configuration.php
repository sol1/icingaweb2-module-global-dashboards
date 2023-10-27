<?php

use Icinga\Authentication\Auth;

$userGroups = "";

$auth = Auth::getInstance();
if ($auth->isAuthenticated()) {
  $userGroups = $auth->getUser()->getGroups();
  //var_dump($userGroups);
  //exit;
}

## If we want dashboards for specific user groups hard code them in a if statement like this
#if (in_array("<USERGROUPNAME>", $userGroups)) {
#
#}


## All users see these
/*
 * Example
 */
$dashboard = $this->dashboard(N_('Example'), array('priority' => 100));
$dashboard->add(
    N_('Tactical Overview'),
    'monitoring/tactical',
    100
);
$dashboard->add(
    N_('Service Problems'),
    'monitoring/list/services?service_problem=1&sort=service_severity&dir=desc',
    110
);
$dashboard->add(
    N_('Host Problems'),
    'monitoring/list/hosts?host_problem=1&sort=host_severity&dir=desc',
    120
);

