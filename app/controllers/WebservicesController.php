<?php

class WebservicesController extends BaseController {

    public function getData()
    {
        $arg['CountryName'] = Input::get("country");

        $postdata = http_build_query($arg);

        $opt['http']['method'] = "POST";
        $opt['http']['header'] = "Content-type: application/x-www-form-urlencoded";
        $opt['http']['content'] = $postdata;

        $context = stream_context_create($opt);
        $xmlstring = file_get_contents("http://www.webservicex.net/country.asmx/GetCurrencyByCountry", false,  $context);

        $result = simplexml_load_string($xmlstring);

        if (strlen($result) < 200) {
            $result = "Nincs ilyen ország az adatbázisban";
        }

        return $result;
    }

}