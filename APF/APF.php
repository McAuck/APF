<?php
class APF
{
	public function boot()
	{
		version_compare(PHP_VERSION, '5.4.0', '<') && exit('php 5.4+ required!');

		self::_def_const();
		self::_mk_dir();
		self::_import_core();
		App::run();
	}

	private static function _def_const()
	{

	}

	private static function _mk_dir()
	{

	}

	private static function _import_core()
	{
		
	}
}
