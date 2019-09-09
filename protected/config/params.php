<?php

return array(
    'adminEmail' => 'crystal.msys@gmail.com',
    'adminUrl' => '/',
    'memberUrl' => '/member',
    'inventoryUrl' => '/inventory',
    'access' => 'You are not authorized to perform this action.',
    '404' => 'The requested page does not exist..',
    '301' => 'You are not authorized to access this page.',
    'page' => '20',
    'date' => 'M d, Y',
    'payment_status' => array(
        'Processing' => 'Processing',
        'Call verified' => 'Call Verified',
        'Payment verified' => 'Payment Verified',
        'Confirmed' => 'Confirmed',
        'Ready for delivery' => 'Ready for delivery',
        'Delivered' => 'Delivered',
        'Refunded' => 'Refunded',
        'Closed' => 'Closed',
    ),
    'payment_status_emails' => array(
        'Processing' => array(
            'subject' => 'Order No. [quoteid] is under processing',
            'message'=>'<p>Your Order No. [quoteid] Dated  [date] is under processing.</p>
                        <p>Please wait for a call from Our Representative.</p>
                        <p>Please Contact on our contact numbers for any support.</p>
                        <p>Thank you</p>
                        <p>From</p>administrator
                        <p>MWP Business &amp; Presentations Pvt. Ltd. </p>',
        ),
        'Call verified' => array(
            'subject' => 'Order No. [quoteid] for call verification is completed',
            'message'=>'<p>Your Order No. [quoteid] Dated  [date] is varified.</p>
                       
                        <p>Please Contact on our contact numbers for any support.</p>
                        <p>Thank you</p>
                        <p>From</p>
                        <p>MWP Business &amp; Presentations Pvt. Ltd. </p>',
        ),
        'Payment verified' => array(
            'subject' => 'Payment is verfied for Order No. [quoteid]',
            'message'=>'<p>Your Order No. [quoteid] Dated  [date] is ready for Delivery, We had received your payment</p>
                        <p>Your Order will be dispatched in 3 &ndash; 4 working days. If you have any qestion please call our representative</p>
                        <p>Thank you</p>
                        <p>From</p>
                        <p>MWP Business &amp; Presentations Pvt. Ltd. </p>',
        ),
        'Confirmed' => array(
            'subject' => 'Order No. [quoteid] is confirmed.',
            'message'=>'<p>Your Order No. [quoteid] Dated  [date] is confirmed and ready for delivery</p>
                        <p>[bank_detail]</p>
                        <p>Please wait for a call from Our Representative.</p>
                        <p>Please Contact on our contact numbers for any support.</p>
                        <p>Thank you</p>
                        <p>From</p>
                        <p>MWP Business &amp; Presentations Pvt. Ltd. </p>',
        ),
        'Ready for delivery' => array(
            'subject' => 'Order No. [quoteid] is Ready for delivery',
            'message'=>'<p>Your Order No. [quoteid] Dated  [date] is completed and ready for delivery.</p>
                        <p>Your Order will be dispatched in 1 &ndash; 2 working days. If you have any qestion please call our representative</p>
                        <p>Thank you</p>
                        <p>From</p>
                        <p>MWP Business &amp; Presentations Pvt. Ltd. </p>',
        ),
        'Delivered' => array(
            'subject'=>'Order No.  [quoteid] has been Delivered',
            'message'=>'
                    <p>Goods of Order No. [quoteid] Dated  [date] has been Delivered.</p>
                    <p>Don\'t forget to email your comments on feedback@mwpbnp.com</p>
                    <p>Thank you for your Business with Us</p>
                    <p>From</p>
                    <p>MWP Business &amp; Presentations Pvt. Ltd. </p>
		 ',
        ),
        'Refunded' => array(
            'subject' => 'Order No. [quoteid] is refunded',
            'message'=>'<p>Your Order No. [quoteid] Dated  [date] had been received with us on your requrest, the same order has been canceled and refunded as per www.mwpbnp.com refund policy.</p>
                        <p>Please wait for a call from Our Representative.</p>
                        <p>Please Contact on our contact numbers for any further support.</p>
                        <p>Thank you</p>
                        <p>From</p>
                        <p>MWP Business &amp; Presentations Pvt. Ltd. </p>',
        ),
        
    )
);
?>
