<?php



// Create the SoapClient instance
$url         = "https://productores.orbiseguros.com.ar/ws_autos.asmx?wsdl";
$client     = new SoapClient($url, array("trace" => 1, "exception" => 0));



$xml = "<auto_lstpol><usuario><pass>WSDUMMY</pass><usa>5213199</usa></usuario><asegurado><tipdoc>DU</tipdoc><nrodoc>18817203</nrodoc></asegurado></auto_lstpol>";


$length = strlen($xml);


// Create the header
$header = new SoapHeader('POST /ws_autos.asmx HTTP/1.1', 
                            'Host: productores.orbiseguros.com.ar',
                            'Content-Type: text/xml; charset=utf-8',
                            'Content-Length: '.$length,
                            'SOAPAction: "http://tempuri.org/AUTOS_ListPolizas'
                        );





// Call wsdl function
$result = $client->__soapCall("AUTOS_ListPolizas", array(
    "auto_lstpol" => array(
                            "usuario"=> array("pass"=>"6100410000_ORBIS_0170", "usa"=>"614100"),

                            "asegurado"=> array("tipdoc"=>"DNI", "nrodoc"=>"25755577")      
                          )
), NULL, $header);

// Echo the result
echo "<pre>".print_r($result, true)."</pre>";



