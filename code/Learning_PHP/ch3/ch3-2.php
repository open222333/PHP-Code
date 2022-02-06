<?php
// if()內含多行程述句
print "This is always printed.";
if ($logged_in) {
    print "Welcome aboard, trusted user.";
    print "This is only printed if $logged_in is true.";
}
print "This is also always printed.";
