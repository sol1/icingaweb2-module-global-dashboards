# Global Dashboards Module for Icingaweb2 
This module is a template for managing custom global dashboards in Icingaweb2. Fork or create a copy of this repository, customise the dashboards for your own needs then deploy them to Icingaweb2 as you would any other module.

## Setup
1. Fork'd the repository and have added your own dashboards
2. Install the module to Icingaweb2
```
cd  /usr/share/icingaweb2/modules
git clone <path to your own git repo which is a fork of this repo here> ./global-dashboards
```
3. Add access permissions to the roles that should have access to the global-dashboards module.

## Configuration
To configure your own global dashbaord you need to add the details for your dashboard to `configuration.php`.

The example below would create a new global dashboard with the name Example, the dashboard would contain one element with the title Tactical Overview and the url it points to would be http(s)://icinga.your.domain/icingaweb2/monitoring/tactical
```
$dashboard = $this->dashboard(N_('Example'), array('priority' => 100));
$dashboard->add(
    N_('Tactical Overview'),
    'monitoring/tactical',
    100
);
```

To further restrict access to dashboards to specific group add code within the module that explictly adds dashboards for that group. 
In the example below only members of the `example_group` would get the global Example dashboard.
```
if (in_array("example_group", $userGroups)) {
  $dashboard = $this->dashboard(N_('Example'), array('priority' => 100));
  $dashboard->add(
      N_('Tactical Overview'),
      'monitoring/tactical',
      100
  );
}
```
_Note you will need to add permissions for that groups role as well._
