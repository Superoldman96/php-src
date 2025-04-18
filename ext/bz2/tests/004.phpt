--TEST--
bzread() tests with invalid files
--EXTENSIONS--
bz2
--FILE--
<?php

$fd = bzopen(__DIR__."/004_1.txt.bz2","r");
var_dump(bzerror($fd));
var_dump(bzerrstr($fd));
var_dump(bzerrno($fd));

$fd2 = bzopen(__DIR__."/004_2.txt.bz2","r");
var_dump(bzerror($fd2));
var_dump(bzerrstr($fd2));
var_dump(bzerrno($fd2));

var_dump(bzread($fd, 10));
var_dump(bzerror($fd));
var_dump(bzerrstr($fd));
var_dump(bzerrno($fd));

var_dump(bzread($fd2, 10));
var_dump(bzerror($fd2));
var_dump(bzerrstr($fd2));
var_dump(bzerrno($fd2));

var_dump(bzread($fd));
var_dump(bzerror($fd));
var_dump(bzerrstr($fd));
var_dump(bzerrno($fd));

var_dump(bzread($fd2));
var_dump(bzerror($fd2));
var_dump(bzerrstr($fd2));
var_dump(bzerrno($fd2));

bzclose($fd2);
try {
    var_dump(bzread($fd2));
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    var_dump(bzerror($fd2));
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    var_dump(bzerrstr($fd2));
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    var_dump(bzerrno($fd2));
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}

echo "Done\n";
?>
--EXPECT--
array(2) {
  ["errno"]=>
  int(0)
  ["errstr"]=>
  string(2) "OK"
}
string(2) "OK"
int(0)
array(2) {
  ["errno"]=>
  int(0)
  ["errstr"]=>
  string(2) "OK"
}
string(2) "OK"
int(0)
bool(false)
array(2) {
  ["errno"]=>
  int(-5)
  ["errstr"]=>
  string(16) "DATA_ERROR_MAGIC"
}
string(16) "DATA_ERROR_MAGIC"
int(-5)
bool(false)
array(2) {
  ["errno"]=>
  int(-4)
  ["errstr"]=>
  string(10) "DATA_ERROR"
}
string(10) "DATA_ERROR"
int(-4)
bool(false)
array(2) {
  ["errno"]=>
  int(-5)
  ["errstr"]=>
  string(16) "DATA_ERROR_MAGIC"
}
string(16) "DATA_ERROR_MAGIC"
int(-5)
bool(false)
array(2) {
  ["errno"]=>
  int(-4)
  ["errstr"]=>
  string(10) "DATA_ERROR"
}
string(10) "DATA_ERROR"
int(-4)
bzread(): Argument #1 ($bz) must be an open stream resource
bzerror(): Argument #1 ($bz) must be an open stream resource
bzerrstr(): Argument #1 ($bz) must be an open stream resource
bzerrno(): Argument #1 ($bz) must be an open stream resource
Done
