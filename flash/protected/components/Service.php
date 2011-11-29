<?php
/**
 * Service Class for Zend_AMF
 */
class Service
{
	public function getTime()
	{
		return time();
	}

	public function getDatetime()
	{
		return date('Y-m-d H:i:s');
	}

	public function validateEmail($value)
	{
		$validator = new CEmailValidator;
		if(!empty($value) && $validator->validateValue($value))
			return 'ok';

        return 'error';
	}

    public function appInit()
    {
		$a = new Application;
		$a->time = $this->getTime();
		$a->datetime = $this->getDatetime();

		return $a;
	}
}