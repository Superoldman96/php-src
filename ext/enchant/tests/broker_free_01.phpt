--TEST--
@enchant_broker_free() function
--CREDITS--
marcosptf - <marcosptf@yahoo.com.br>
--EXTENSIONS--
enchant
--FILE--
<?php
$broker = enchant_broker_init();
if (is_object($broker)) {
    echo("OK\n");

    if (@enchant_broker_free($broker)) {
        echo("OK\n");
    } else {
        echo("broker free failed\n");
    }
} else {
    echo("init failed\n");
}
echo("OK\n");
?>
--EXPECT--
OK
OK
OK
