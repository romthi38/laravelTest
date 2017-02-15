<?php
/**
 * Created by PhpStorm.
 * User: MIW
 * Date: 09/02/2017
 * Time: 09:59
 */

namespace App\AppConfig;

use DB;
use Cache;

class AppConfig {

    private static $config = array();
    private static $config_loaded = false;

    public static function get($key, $default_value = '') {
        self::loadConfig();
        if(isset(self::$config[$key]))
            return self::$config[$key];
        else
            return $default_value;
    }

    public static function update($key, $value) {
        DB::table('app_config')->where('config_key', $key)->update(['config_value' => $value]);

        self::$config_loaded = false;

        Cache::forget('app_config');
    }

    private function loadConfig() {
        if(self::$config_loaded) return;

        if(!(App::environment('production')))
            Cache::flush();

        $cacheDuration = config('settings.cache_duration.app_config');

        self::$config = Cache::remember('app_config', $cacheDuration, function() {
            return DB::table('app_config')->pluck('config_value', 'config_key');
        });

        self::$config_loaded = true;
    }
}