<?php
return [
	'DB_TYPE'               => 'mysql',
    'DB_HOST'               => 'db',
    'DB_NAME'               => 'test',
    'DB_USER'               => 'root',
    'DB_PWD'                => 'root',
    'DB_PREFIX'             => 'caipiao_',
    'DB_PORT'               => '3306',
	'DB_DEBUG'              => false,
	'DB_PARAMS'             => [\PDO::ATTR_CASE => \PDO::CASE_NATURAL],
];