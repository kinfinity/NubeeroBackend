<?php

    namespace _3rdParty\Core\client;

    require 'vendor/autoload.php'; 
    use Curl\Curl;

    class CurlClient
    {
        // private static string $username;
        // private static string $password;
        //
        // public function __construct(config $config)
        public function __construct()
        {
            //
            // CurlClient::$username = $config->leadway_username;
            // CurlClient::$password = $config->leadway_password;

        }

        public function GET(string $request_url,$request_body)
        {
            try 
            {    
                // $API_key = "aEgX8sbHoarPcgYAE0evYO6geFasYBj+bdejmcbQ5EL001Pg/C0keB4plEZrkT/2";
                // $auth = hash("sha512", $API_key);
                $auth = '2F65418C6600BA6AE92D63E181C82264D0B73C3F175A37BBD7CED1CF2F9C2086F31590BDF8EE54E54ABDFE71542D8F27FDF0FD3450040BBBCCE9E2F55308A76E';
                var_dump($auth);
                //
                $curl = new Curl();
                //$curl->setBasicAuthentication(CurlClient::$username, CurlClient::$password);
                $curl->setHeader("Accept", "/");
                $curl->setHeader("Authorization ", $auth);
                $curl->setHeader("Cache-Control", "no-cache");
                $curl->setHeader("Accept", "application/json");
                $curl->setHeader("Content-Type", "application/json");
                
                echo "RequestUrl: " . $request_url;
                // $data = array($request_body->request_str => $request_body);
                // And then encoded as a json string
                // $data_string = json_encode($data);

                // var_dump($data_string);

                // $curl->setOpts( 
                //     array(
                //         CURLOPT_POST => true,
                //         CURLOPT_POSTFIELDS => $data_string,
                //         CURLOPT_HEADER => true,
                //         CURLOPT_HTTPHEADER => array
                //         (
                //             'Content-Type:application/json',
                //             'Content-Length: ' . strlen($data_string)
                //         )
                //     )
                // );


                $curl->get($request_url);
                $curl->call();
                
                echo "\n" . "RESPONSE-Header: " . print_r(serialize($curl->http_response_header),1). "\n";
                echo "RESPONSE: " . print_r(serialize($curl->response),1). "\n";
                echo "RESPONSE: " . print_r(serialize($curl->headers_list),1). "\n";
                echo "RESPONSE: " . print_r(serialize($curl->getallheaders),1). "\n";

                if ($curl->error) {
                    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
                } else {
                    echo 'Response:' . "\n";
                    var_dump($curl->response);
                }

                return $curl->response;

            }
            catch (\Exception $e) 
            {
                //
                echo 'Error LOG: '. $e->error_log;

            }
            finally
            {
                // var_dump($curl->requestHeaders);
                // var_dump($curl->responseHeaders);
                // Manual clean up
                $curl->close();
            }
            
        }
        
        public function POST(string $request_url,$request_body)
        {
            try 
            {    
                // $API_key = "aEgX8sbHoarPcgYAE0evYO6geFasYBj+bdejmcbQ5EL001Pg/C0keB4plEZrkT/2";
                // $auth = hash("sha512", $API_key);
                $auth = 'Authorization: 2F65418C6600BA6AE92D63E181C82264D0B73C3F175A37BBD7CED1CF2F9C2086F31590BDF8EE54E54ABDFE71542D8F27FDF0FD3450040BBBCCE9E2F55308A76E';
                // var_dump($auth);
                //
                $curl = new Curl();
                //$curl->setBasicAuthentication(CurlClient::$username, CurlClient::$password);
                $curl->setHeader("Accept", "/");
                // $curl->setHeader("Authorization ", "2F65418C6600BA6AE92D63E181C82264D0B73C3F175A37BBD7CED1CF2F9C2086F31590BDF8EE54E54ABDFE71542D8F27FDF0FD3450040BBBCCE9E2F55308A76E");
                $curl->setHeader("Cache-Control", "no-cache");
                $curl->setHeader("Accept", "application/json");
                // $curl->setHeader("Content-Type", "application/json");
                $curl->removeHeader('Content-Length');
                
                //$curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
                //$curl->set($request_body);
                //request.AddParameter("application/json", RequestJSON, ParameterType.RequestBody);
                echo "RequestUrl: " . $request_url . "\n";
                // $data = array($request_body->request_str => $request_body);//
                // And then encoded as a json string
                $request_json = json_encode($request_body,JSON_PRETTY_PRINT);

                echo " \n JSON Request: \n";
                var_dump($request_json);

                $curl->setOpts( 
                    array(
                        CURLOPT_POST => true,
                        // CURLOPT_POSTFIELDS => $request_json,
                        CURLOPT_HEADER => true,
                        // CURLOPT_TIMEOUT => 1000,
                        CURLOPT_HTTPHEADER => array
                        (
                            'Content-Type:application/json',
                            $auth
                            // 'Content-Length: ' . strlen($request_json)
                        )
                    )
                );
                echo "\n REQUEST \n";
                $curl->post($request_url,$request_json);
                var_dump($curl->requestHeaders);
                // var_dump($curl);
                $curl->call();
                
                if ($curl->error) {
                    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
                }


                $x = explode('GMT',$curl->rawResponse)[1];
                $v = str_replace(" ","",$x);
                $v = str_replace("\n","",$x);
                $response = json_decode($v, true);
                print_r($response);        // Dump all data of the Array
                    
                return $response;

            }
            catch (\Exception $e) 
            {
                //
                echo 'Error LOG: '. $e->error_log;

            }
            finally
            {
                // var_dump($curl->requestHeaders);
                // var_dump($curl->responseHeaders);
                // // Manual clean up.
                $curl->close();
            }
            
        }
        
    }

?>