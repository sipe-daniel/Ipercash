<?php
// require_once 'include/init.php';
$mode == "test";
$secretkey = 'sk_test_4CrTdSEgRg2woqYSyJM0Hd';
require_once('payplug/lib/init.php');
session_start();
\Payplug\Payplug::setSecretKey($secretkey);
$input = file_get_contents('php://input');
function log_me($message, $mode) {
  $fp = fopen('phpayplug/logs/notifications_' . $mode . '.txt', 'a+');
  fwrite($fp, $message."\r\n");
  fclose($fp);
}
log_me("-------------------------------------------------------" ,$mode);
if ($debug_mode == true) {
  ob_start();
  var_dump($input);
  $output = ob_get_clean();
  log_me("[Debug] - [" . date('d/m/Y à H:i:s',time()) . "] Json: " . $output, $mode);
} else { }
try {
  $resource = \Payplug\Notification::treat($input);
  if ($resource->object == "payment") {
    log_me("[" . $resource->object . "] - [" . date('d/m/Y à H:i:s',time()) . "] ". $mode ." | Payment ID: " . $resource->id . " | Amount: " . $resource->amount / 100 . "€ | Is paid: " . var_export($resource->is_paid,true) . " | " . $resource->customer->first_name . " | " . $resource->customer->last_name . " | " . $resource->customer->email . " | Paid at: " . date('d/m/Y H:i:s',$resource->hosted_payment->paid_at) . " | Error code: " . $resource->failure->code . " | Error message: " . $resource->failure->message . " | Order ID: " . $resource->metadata[order_id] . " | ", $mode);
  } else if ($resource->object == "refund") {
    log_me("[" . $resource->object . "] - [" . date('d/m/Y à H:i:s',time()) . "] ". $mode ." | Payment ID: " . $resource->id . " | Refund ID: " . $resource->payment_id . " | Amount: " . $resource->amount / 100 . "€ | Order ID: " . $resource->metadata[order_id] . " | Reason: " . $resource->metadata[reason] . " | ", $mode);
  }
}
catch (\Payplug\Exception\PayplugException $exception) { log_me("[Error] - [". date('d/m/Y à H:i:s',time()) ."] " . $exception, $mode); }