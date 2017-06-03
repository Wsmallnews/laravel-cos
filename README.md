## 腾讯云对象存储的 composer 包
> 本包主要代码是腾讯云官方代码，但因官方一直没有composer 包，特此造了此轮子，本文档会不定时更新

### 更新日期

```
2017-06-03
```

### 腾讯云对象存储官方文档

```
https://www.qcloud.com/document/product/436/6274 
```

### 安装 

```
composer require wsmallnews/laravel-cos
```

### 建立配置文件如下

config/qcloud.php
```
return [

    'cos' => [     // 腾讯云 对象存储
        'driver'    => 'cos',
        'root' => env('QCLOUD_ROOT', ''),
        'host' => env('QCLOUD_HOST', ''),
        'bucket' => env('QCLOUD_BUCKET'),
        'api_cos_api_end_point' => env('QCLOUD_API_COS_API_END_POINT', "http://sh.file.myqcloud.com/files/v2/"),
        'app_id' => env('QCLOUD_APPID'),
        'secret_id' => env('QCLOUD_SECRET_ID'),
        'secret_key' => env('QCLOUD_SECRET_KEY'),
        'time_out' => env('QCLOUD_TIME_OUT', 180),
        'location' => env('QCLOUD_LOCATION', 'sh'),
    ], 
];
```

### 添加服务提供者
```
Smallnews\Cos\QCloudCosServiceProvider::class,
```

### 使用

##### 第一种方法
```
use Smallnews\Cos\QCloudCosOper;

public function getAppId(){
    echo QCloudCosOper::getAppId();
}
```


##### 第二种方法

```
app('qcloudcos')::getAppId();
```

### 方法总揽

> 下面列出了所有接口，接口参数只给了必填参数，其他参数可参考腾讯云官方对象存储文档查看，已将所有方法中的 $bucketName参数默认使用配置文件中的 bucket 配置

```
QCloudCosOper::getAppId();                          // 获取 appId
QCloudCosOper::createFolder($folder);               // 创建目录
QCloudCosOper::upload($srcPath, $dstPath);          // 上传文件
QCloudCosOper::listFolder($folder);                 // 目录列表
QCloudCosOper::prefixSearch($prefix);               // 目录列表(前缀搜索)
QCloudCosOper::updateFolder($folder);               // 更新目录

QCloudCosOper::statFolder($folder);                 // 查询目录信息
QCloudCosOper::stat($path);                         // 查询文件信息
QCloudCosOper::copyFile($srcFpath, $dstFpath);      // 复制一个文件
QCloudCosOper::moveFile($srcFpath, $dstFpath);      // 移动一个文件
QCloudCosOper::delFile($path);                      // 删除文件
QCloudCosOper::delFolder($folder);                  // 删除目录

```

