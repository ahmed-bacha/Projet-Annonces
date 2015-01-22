<?php

/**
 * Singleton implementation of PDO class
 *
 * @version 	1.00
 * @license 	http://www.gnu.org/copyleft/gpl.html GPL
 * @author 		Michal "Techi" Vrchota <michal.vrchota@seznam.cz>
 * @package 	Modeles
 * @category 	Database
 */

class SPDO extends PDO
{
	/**
	 * @var SPDO $instance
	 */

	private static $instance = FALSE;

	/**
	 * returns instance from anywhere
	 *
	 * @return SPDO
	 */

	public static function getInstance()
	{
		if(!self::$instance)
		{
			// init your connection here to design singleton implementation
			throw new Exception("PDO instance was not initialized");
		}
		else
		{
			return self::$instance;
		}
	}

	/**
	 * Connect to DB - same as PDO constructor
	 *
	 * @param string $dsn
	 * @param string $username
	 * @param string $password
	 * @param array  $driver_options
	 * @return SPDO
	 */

	public static function connect($dsn, $username = "root", $password = "root", array $driver_options = NULL)
	{
		self::$instance = new PDO($dsn, $username, $password, $driver_options);
		self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		return self::$instance;
	}
}

SPDO::connect("mysql:host=".DB_URL.";dbname=".DB_NAME, DB_USER, DB_PASS);

?>
