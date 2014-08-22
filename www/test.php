<?php
    define("STORE_DOMAIN", "inst.americommerce.com");
    define("API_USERNAME", "api_test");
    define("API_PASSWORD", "Test1234!");
    define("SECURITY_TOKEN", "iizsekure");
    
    // This namespace must be defined and cannot be changed.
    define("AC_NAMESPACE", "http://www.americommerce.com");
    
    /* Due to the nature of .NET SOAP Web Services, we have to create a subclass of the native PHP SoapClient and
    * override the way it handles namespaces. The default way the request is formatted is not interpreted by the
    * server correctly, especially when passing in a complex object as a parameter. */
    class ACSoapClient extends SoapClient {
        function __doRequest($request, $location, $action, $version) {
            $namespace = AC_NAMESPACE;
            
            $request = preg_replace('/<ns1:(\w+)/', '<$1 xmlns="'.$namespace.'"', $request, 1);
            $request = preg_replace('/<ns1:(\w+)/', '<$1', $request);
            $request = str_replace(array('/ns1:', 'xmlns:ns1="'.$namespace.'"'), array('/', 'xmlns="'.$namespace.'"'), $request);
            
            // parent call
            return parent::__doRequest($request, $location, $action, $version);
        }
    }

    // Create a hash containing the header information for authentication.
    $header_info = array(
        "UserName"      => API_USERNAME,
        "Password"      => API_PASSWORD,
        "SecurityToken" => SECURITY_TOKEN
    );
        
    try {
        $client = new ACSoapClient("https://".STORE_DOMAIN."/store/ws/AmeriCommerceDb.asmx?wsdl");
        $header = new SoapHeader("http://www.americommerce.com", "AmeriCommerceHeaderInfo", $header_info, false);

        $client->__setSoapHeaders($header);
     
        $lastorder = $client->Order_GetLastOrderID();
        $order = $client->Order_GetByKey(array("piorderID" => $lastorder->Order_GetLastOrderIDResult))->Order_GetByKeyResult;
        $customer = $client->Customer_GetByKey(array("picustomerID" => $order->customerID->Value))->Customer_GetByKeyResult;
        
        //$customer->lastName = "John";
        //$customer->firstName = "Doe";
        //$Customer->email = "newemail@thedomain.com";
    
       $savedCustomer = $client->Customer_SaveAndGet(array("poCustomerTrans" => $customer))->Customer_SaveAndGetResult;
    } catch(Exception $e) {
        print_r($e);
    }
?>
<html>
    <head>
        <title>Example Customer_SaveAndGet Method</title>
    </head>
    <body>
        <h3>First Name</h3>
        <?php echo $savedCustomer->firstName; ?><br/>
        <h3>Last Name</h3>
        <?php echo $savedCustomer->lastName; ?><br/>
        <h3>Email Address</h3>
        <?php echo $savedCustomer->email; ?><br/>
    </body>
</html> 

