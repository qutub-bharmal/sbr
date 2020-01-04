<?php

class SbrToShopify
{
    private $spring_store, $spring_token;
    
    public function __construct()
    {
        $this->spring_store = "https://fabrik-testing.myspringboard.us/api/";
        $this->spring_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiIzMWQ3YzBkNC1mZTMzLTRhZmQtYWZiZS1mODk5ZjJkN2JmN2MiLCJpYXQiOjE1NzU5NzI1NTEsInN1YiI6MTAwMTY4LCJhdWQiOjM4NTg0LCJpc3MiOm51bGx9.LfT54UVaAAwn9O7iJDdkHV_vRWT9MkvdUYweyYdAmXM";
    }
    
    public function checkCustomer($data)
    {
        $customer = $this->callGet('/customers?query='.$data['email']);
        
        if (isset($customer['total']) && $customer['total'] > 0) {
            return $customer['results'][0]['id'];
        }
        
        $newCustomer = $this->createCustomer($data);
        
        return $this->getIdFromHeader($newCustomer);
    }
    
    public function createCustomer($data)
    {
        $customer_data = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ];
        
        return $this->callPost('customers', $customer_data);
    }
    
    public function checkAddress($customer_id, $data)
    {  
        $address = $this->callGet('customers/'.$customer_id.'/addresses');
        
        if (isset($address['total']) && $address['total'] > 0) {
            return $address['results'][0]['id'];
        }
        
        $adderss_data = [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'line_1' => $data['address1'],
                'line_2' => $data['address2'],
                'city' => $data['city'],
                'state' => $data['province_code'],
                'country' => $data['country'],
                'phone' => $data['phone'],
                'postal_code' => $data['zip'],
            ];
            
        return $this->callPost('customers/'.$customer_id.'/addresses', $adderss_data);
    }
    
    public function getOrder($order_id)
    {
        return $this->callGet('sales/orders/'.$order_id);
    }

    public function createOrder($data = [])
    {
        $order = $this->callPost('sales/orders', $data);

        if (isset($order['body']['error']) && !empty($order['body']['error'])) {
            return $order['body'];
        }
        return $this->getIdFromHeader($order);
    }

    public function createPayment($orderId, $data = [])
    {
        return $this->callPost('sales/orders/'.$orderId.'/payments', $data);
    }
    
    public function createInvoice($data)
    {   
        $invoice = $this->callPost('sales/invoices', $data);
        return $this->getIdFromHeader($invoice);
    }
    
    public function updateInvoice($invoiceId, $data)
    {   
        return $this->callPost('sales/invoices/'.$invoiceId, $data, 'PUT');
    }

    public function changeOrderStatus($orderId, $status)
    {
        return $this->callPost('sales/orders/'.$orderId, ['status' => $status], 'PUT');
    }

    public function callGet($url, $data = '') 
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->spring_store.$url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".$this->spring_token,
            "cache-control: no-cache"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if (!$err) {
            return json_decode($response, true);
        }
        return [];
    }
    
    public function callPost($url, $data, $method = "POST") 
    {
        $response_data = [
                'header', 
                'body'
            ];

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->spring_store.$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_VERBOSE => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer ".$this->spring_token,
                "cache-control: no-cache"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        
        $body = substr($response, $header_size);

        curl_close($curl);
        
        if (!$err) {
            $response_data['header'] = $header;
            $response_data['body'] = json_decode($body, true);
            
            return $response_data;
        }
        
        return $response_data['body']['error'] = 'Something went wrong.';
    }
    
    public function getIdFromHeader($data) 
    {
        preg_match("!\r\n(?:Location|URI): *(.*?) *\r\n!", $data['header'], $data_id);
        return end(explode('/', $data_id[1]));
    }
    
    public function email($data = 'testing') 
    {
        return mail('testdev301@gmail.com', 'Spb Testing', $data);
    }
}

// Dump data and exit
function dd($dump) 
{
    echo "<pre>";
    print_r($dump);
    echo "</pre>";
    exit;
}