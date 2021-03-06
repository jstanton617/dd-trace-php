--TEST--
[Sandbox regression] Userland method is traced
--SKIPIF--
<?php if (PHP_VERSION_ID < 50500) die('skip PHP 5.4 not supported'); ?>
--FILE--
<?php
class Test {
    public function m(){
        echo "METHOD" . PHP_EOL;
    }
}

dd_trace_method("Test", "m", function(){
    echo "HOOK" . PHP_EOL;
});

(new Test())->m();

?>
--EXPECT--
METHOD
HOOK
