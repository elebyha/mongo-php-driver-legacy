--TEST--
Test for PHP-xxx: Description
--SKIPIF--
<?php $needs = "2.0.0"; $needsOp = ">="; ?>
<?php require_once "tests/utils/auth-standalone.inc" ?>
--FILE--
<?php
require_once "tests/utils/server.inc";

$s = new MongoShellServer;
$host = $s->getStandaloneConfig(true);
$creds = $s->getCredentials();
/* Use this to login as normal user */
$opts = array(
    "db" => dbname(),
    "username" => $creds["user"]->username,
    "password" => $creds["user"]->password,
);
/* Use this to login as admin */
$opts = array(
    "db" => "admin",
    "username" => $creds["admin"]->username,
    "password" => $creds["admin"]->password,
);

$mc = new MongoClient($host, $opts);
$db = $mc->selectDb(dbname());
$collection = $mc->selectCollection(dbname(), collname(__FILE__));
$collection->drop();

echo "My test here\n";
?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
My test here
===DONE===

