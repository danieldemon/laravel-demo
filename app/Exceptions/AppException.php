<?php

namespace App\Exceptions;

class AppException extends \Exception
{

	protected $data = [];

	public function __construct(?$message, array $data = [])
	{
		parent::__construct($message ?: 'Something Wrong.');

		$this->data = $data;
	}

	public function toArray()
	{
		return [
			'status' => 'error',
			'message' => $this->getMessage(),
			'data' => $this->data
		];
	}

	public function getStatus()
	{
		return 500;
	}
}