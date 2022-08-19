<?php

class Database
{
	private static ?\mysqli $connection = null;

	public static function getConnection(): \mysqli
	{
		if (is_null(self::$connection)) {
			self::$connection = new \mysqli(
				'localhost',
				'root',
				''
			);
			self::$connection->select_db('tutorial_php_wpu');

			return self::$connection;
		}
		return self::$connection;
	}
}
