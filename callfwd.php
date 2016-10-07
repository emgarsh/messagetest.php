<?php

// parse the query parameter PhoneNumber as the forward to phone number
$fwd_to_phone = $_REQUEST['PhoneNumber'];
$fwd_to_phone = preg_replace('/[^0-9]/', '', $fwd_to_phone);
$fwd_to_phone = "+1".$fwd_to_phone;

//prepare the BXML response headers
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

//format response using transfer
echo '<Response>';
if ($_REQUEST['eventType'] == 'answer') {
  echo '<Transfer transferCallerId="'.$_REQUEST['from'].'">
          <PhoneNumber>'.$fwd_to_phone.'</PhoneNumber>
        </Transfer>';

}
echo '</Response>';
?>
