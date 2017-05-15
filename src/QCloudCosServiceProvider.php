<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 2017/3/3
 * Time: 11:18
 */

namespace Smallnews\Cos;

use Illuminate\Support\ServiceProvider;

class QCloudCosServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $this->publishes([
        //     __DIR__ . '/config/qcloudcos.php' => config_path('qcloudcos.php'),
        // ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 获取配置
        $old_conf = require __DIR__ . '/config/qcloudcos.php';
        $config = $this->app['config']->get('qcloud', []);

        // 合并设置
        $qcloud['cos'] = array_merge($old_conf['cos'], $config['cos']);
        $this->app['config']->set('qcloud', $qcloud);
        
        $this->app['qcloudcos'] = new QCloudCosOper($this->app['config']);
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['qcloudcos'];
    }
}
