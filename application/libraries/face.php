<?php

	/**
	* Class Name : Face
	* Author : A.shokri
	* Date : 2018/04/22
	*/

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Face
	{
		
		function __construct()
		{
			
		}

		public function detect($base_url, $file)
		{
			require_once 'HTTP/Request2.php';

			$request = new Http_Request2('https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect');
			$url = $request->getUrl();

			$headers = array(
			    'Content-Type' => 'application/octet-stream',
			    'Ocp-Apim-Subscription-Key' => '10018af4f37848c9b8af367b99f9966d',
			);

			$request->setHeader($headers);

			$parameters = array(
			    'returnFaceId' => 'true',
			    'returnFaceLandmarks' => 'false',
			    'returnFaceAttributes' => 'age,gender',
			);

			$url->setQueryVariables($parameters);

			$request->setMethod(HTTP_Request2::METHOD_POST);

			$face_file = $base_url . "upload/" . $file;
			$file_content = file_get_contents($face_file);

			$request->setBody($file_content);

			try
			{
			    $response = $request->send();
			    return json_decode($response->getBody(), true);
			}
			catch (HttpException $ex)
			{
			    return 0;
			}
		}

	}

?>