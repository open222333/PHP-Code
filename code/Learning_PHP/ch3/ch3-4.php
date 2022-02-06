<?php
// 使用elseif()
if ($logged_in) {
    // 如果$logged_in為true時執行此行
    print "Welcome aboard, trusted user.";
} elseif ($new_messages) {
    // $logged_in為flase但$new_messages為tru時執行這行
    print "Dear stranger, there are new messages.";
} elseif ($emergency) {
    // $logged_in跟$new_messages都是false
    // 但$emergency為true時執行這行
    print "Stranger, there are no new messages, but there is an emergency.";
}
