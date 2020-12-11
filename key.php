<?php
$a['token'] = md5(bin2hex('192.168.1.1'));
$a['license'] = md5(bin2hex(time()));

print_r($a);
