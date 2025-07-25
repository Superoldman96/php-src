--TEST--
SOAP Server 3: all functions
--EXTENSIONS--
soap
--FILE--
<?php
$server = new soapserver(null,array('uri'=>"http://testuri.org"));
$server->addfunction(SOAP_FUNCTIONS_ALL);

$HTTP_RAW_POST_DATA = <<<EOF
<?xml version="1.0" encoding="ISO-8859-1"?>
<SOAP-ENV:Envelope
  SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"
  xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"
  xmlns:xsd="http://www.w3.org/2001/XMLSchema"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xmlns:si="http://soapinterop.org/xsd">
  <SOAP-ENV:Body>
    <ns1:strlen xmlns:ns1="http://testuri.org">
      <x xsi:type="xsd:string">Hello World</x>
    </ns1:strlen>
  </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
EOF;

$server->handle($HTTP_RAW_POST_DATA);
echo "ok\n";
?>
--EXPECTF--
Deprecated: Constant SOAP_FUNCTIONS_ALL is deprecated since 8.4, as enabling all functions is a possible security concern in %s on line %d

Deprecated: SoapServer::addFunction(): Enabling all functions via SOAP_FUNCTIONS_ALL is deprecated since 8.4, due to possible security concerns. If all PHP functions should be enabled, the flattened return value of get_defined_functions() can be used in %s on line %d
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://testuri.org" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:strlenResponse><return xsi:type="xsd:int">11</return></ns1:strlenResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
ok
