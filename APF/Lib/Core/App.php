<?php
final class App
{
  public static function run()
  {
    self::_init();
  }
  
  private static function _init()
  {
        C(include CONFIG_PATH.'/Config.php');
        //加载公共配置项
        $commonPath = COMMON_CONFIG_PATH . '/config.php';

        $commonConfig = <<<config
<?php
return [
    //配置项 => 配置值,
];
config;
        file_exists($commonPath) || file_put_contents($commonPath, $commonConfig);

        C(include $commonPath);
        //用户配置项
        $userPath = APP_CONFIG_PATH . '/config.php';

        $userConfig = <<<config
<?php
return [
    //配置项 => 配置值,
];
config;
        file_exists($userPath) || file_put_contents($userPath, $userConfig);
        //加载用户配置项
        C(include $userPath);

        //设置默认时区
        date_default_timezone_set(C('DEFAULT_TIME_ZONE'));

        //设置session
        C('SESSION_START') && session();
    }
