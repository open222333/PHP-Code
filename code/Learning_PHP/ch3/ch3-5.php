<?php
// 為elseif()加上else
if ($logged_in) {
    // 如果$logged_in為true時執行此行
    print "Welcome aboard, trusted user.";
} elseif ($new_messages) {
    // $logged_in為false但$new_messages為true時執行這行
    print "Dear stranger, there are new messages.";
} elseif ($emergency) {
    // $logged_in跟$new_messages都是false
    // 但$emergency為true時執行這行
    print "Stranger, there are no new messages, and there's no emergency.";
} else {
    // $logged_in、$new_messages與$emergency全都是false時執行這行
    print "I don't know you, you have no messages, and there's no emergency.";
}
