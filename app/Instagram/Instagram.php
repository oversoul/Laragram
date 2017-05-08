<?php 
namespace App\Instagram;

use Exception;
use GuzzleHttp\Client;

class Instagram {

	protected $client;
	protected $result;
	protected $username;

	public function __construct($username)
	{
		$this->client = new Client();
		$this->username = $username;
	}

	public function isValid()
	{
		try {
    		$this->result = $this->client->request('GET', "https://www.instagram.com/{$this->username}/media/");
    	} catch (Exception $e) {
    		return false;
    	}
    	return true;
	}

	public function getMedia()
	{
		if ( ! $this->result ) {
			$this->isValid();
		}

		$code = $this->result->getStatusCode();
		if ( $code != 200 ) {
			throw new Exception("Something went wrong.");
		}

		$headers = $this->result->getHeader('content-type');
		if ( ! in_array('application/json', $headers) ) {
			throw new Exception("Page response is not valid Json");
		}

		return $this->result->getBody()->getContents();
	}
}