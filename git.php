<?php

echo(shell_exec("cd /var/www; ./git.sh"));

echo(shell_exec("ls"));

echo(shell_exec("./git.sh"));
$aaa="";

echo(exec("git pull", $aaa));