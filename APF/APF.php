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
		//框架目录常量
		define('APF_PATH', dirname(str_replace('\\', '/', __FILE__)));
		define('DATA_PATH', APF_PATH . '/Data');
		define('EXTENDS_PATH', APF_PATH. '/Extends');
		define('LIB_PATH', APF_PATH . '/Lib');
		define('CONFIG_PATH', APF_PATH . '/Config');
		define('CORE_PATH', LIB_PATH . '/Core');
		define('FUNCTION_PATH', LIB_PATH . '/Function');
		//根目录
		define('ROOT_PATH', dirname(APF_PATH));
		//公共目录
		define('COMMON_PATH', ROOT_PATH . '/Common');
		define('COMMON_CONFIG_PATH', COMMON_PATH . '/Config');
		define('COMMON_MODEL_PATH', COMMON_PATH . '/Model');
		define('COMMON_LIB_PATH', COMMON_PATH . '/Lib');
		//应用目录
		define('APP_PATH', ROOT_PATH . '/' . APP_NAME);
		define('APP_CONTROLLER_PATH', APP_PATH . '/Controller');
		define('APP_VIEW_PATH', APP_PATH . '/View');
		define('APP_CONFIG_PATH', APP_PATH .'/Config');
	}

	private static function _mk_dir()
	{
		$filesArr = [
			COMMON_PATH,
			COMMON_CONFIG_PATH,
			COMMON_MODEL_PATH,
			COMMON_LIB_PATH,
			APP_PATH,
			APP_CONTROLLER_PATH,
			APP_VIEW_PATH,
			APP_CONFIG_PATH
		];

		foreach ($filesArr as $v) {
			file_exists($v) || mkdir($v);
		}
	}

	private static function _import_core()
	{
		$filesArr = [
			FUNCTION_PATH . '/function.php';
			CORE_PATH . '/App.php';
		];

		$includeFiles = get_include_files();
		foreach ($filesArr as $v) {
			in_array($v, $includeFiles) || require $v;
		}
	}
}
