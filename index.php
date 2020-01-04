<?php
// error_reporting(~E_NOTICE);

require_once('class.php');
require_once('testData.php');

$class = new SbrToShopify();

// Get shopify order from shopify webhook
// $shopifyResponse = file_get_contents('php://input');
$shopifyResponse = json_decode($shopifyResponse, true);

if( isset($shopifyResponse['fulfillments']) && count($shopifyResponse['fulfillments']) > 0 ) {

	$customer = $class->checkCustomer($shopifyResponse['customer']);

	if( $customer ) {

    	$order_items = $invoice_items = [];
        $addressId = $class->checkAddress($customer, $shopifyResponse['billing_address']);

    	foreach( $shopifyResponse['fulfillments'] as $fulfillments ) {
    		foreach( $fulfillments['line_items'] as $item ) {
    			if( isset($item['sku']) && $item['sku'] != '' ) {
    				$invoice_items[] = [
    						'item_lookup' => $item['sku'],
    						'qty' => intval($item['quantity'])
    					];

    				$order_items[] = [
    					'item_lookup' => $item['sku'],
    					'qty' => intval($item['quantity']),
    					'ship_from_location_id' => intval(100005),
    				];
    			}
    		}
    	}

        // Create order with items
		$order_data = [
			'customer_id' => intval($customer),
			'source_location_id' => intval(100005),
			'station_id' => intval(100005),
			'billing_address_id' => $addressId,
			'shipping_address_id' => $addressId,
			'lines' => $order_items
		];

        // dd($order_data);
        $order = $class->createOrder( $order_data );


        // Get order details
		$orderDetail = $class->getOrder($order);

        // Add payment to order
		$payment_data = [
			'type' => "ExternalPayment",
			'deposit' => true,
			'amount' => $orderDetail['total'],
			'description' => "Payment from shopify",
		];

		$dump = $class->createPayment($order, $payment_data);
		$dump = $class->changeOrderStatus($order, "open");

        // Generate invoice
		$invoice_data = [
			'source_location_id' => '100005',
			'station_id' => '100070',
			'total' => $shopifyResponse['total_price'],
			'order_id' => $order,
			'item_lines' => $invoice_items,
			'status' => 'complete'
		];

		$invoice = $class->createInvoice($invoice_data);

		dd($invoice);
    }
}