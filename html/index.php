<?php
require_once(dirname(__FILE__) . '/../includes/tt-timer.class.php');
$site->printHeader();
$site->info();


print "<hr /><p>Testing</p><hr />";
print '<p>$site->getConfig(\'database\',\'username\') = ';
    print_r($site->getConfig('database','username'));
    print "</p>";
    print '<p>$site->getConfig(\'database\',\'passwordz\') = ';
    print_r($site->getConfig('database','passwordz'));
    print "</p>";
    print '<p>$site->getConfig(\'database\') = ';
    print_r($site->getConfig('database'));
    print "</p>";
$site->printFooter();
?>
