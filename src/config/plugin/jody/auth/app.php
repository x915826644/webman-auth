<?php
/**
 * 修改自shopwwi/webman-auth
 * */
return [
    'enable' => true,
    'app_key' => 'base64:N721v3Gt2I58HH7oiU7a70PQ+i8ekPWRqwI+JSnM1wo=',
    'default_guard' =>'admin',
    'guard' => [
        'admin' => [
            'key' => 'id',
            'field' => ['id','username','email','mobile','roles'], //设置允许写入扩展中的字段
            'num' => 0, //-1为不限制终端数量 0为只支持一个终端在线 大于0为同一账号同终端支持数量 建议设置为1 则同一账号同终端在线1个
            'model'=> function($key,$uid) {
                // 返回一个数组
                return \think\facade\Db::name('admins')
                    ->where($key,$uid)
                    ->find();
            },

        ]
    ],
    'jwt' => [
        //令牌获取方式 header传Authorization， input传_token， session自动
        'access'=>'header',
        'redis' => true,
        // 算法类型 ES256、HS256、HS384、HS512、RS256、RS384、RS512
        'algorithms' => 'HS256',
        // access令牌秘钥
        'access_secret_key' => '7aPwOvS48FDkjbdHPMswbjUL6brvvoEwNoY4hZ2EWyM6sFhyAMYg9U13PS7mXsPb',
        // access令牌过期时间，单位秒。默认 2 小时
        'access_exp' => 36000,
        // refresh令牌秘钥
        'refresh_secret_key' => '7aPwOvS48FDkjbdHPMswbjUL6brvvoEwNoY4hZ2EWyM6sFhyAMYg9U13PS7mXsPb',
        // refresh令牌过期时间，单位秒。默认 7 天
        'refresh_exp' => 72000,
        // 令牌签发者
        'iss' => 'webman',
        // 令牌签发时间
        'iat' => time(),

        /**
         * access令牌 RS256 私钥
         * 生成RSA私钥(Linux系统)：openssl genrsa -out access_private_key.key 1024 (2048)
         */
        'access_private_key' => <<<EOD
-----BEGIN RSA PRIVATE KEY-----
...
-----END RSA PRIVATE KEY-----
EOD,
        /**
         * access令牌 RS256 公钥
         * 生成RSA公钥(Linux系统)：openssl rsa -in access_private_key.key -pubout -out access_public_key.key
         */
        'access_public_key' => <<<EOD
-----BEGIN PUBLIC KEY-----
...
-----END PUBLIC KEY-----
EOD,

        /**
         * refresh令牌 RS256 私钥
         * 生成RSA私钥(Linux系统)：openssl genrsa -out refresh_private_key.key 1024 (2048)
         */
        'refresh_private_key' => <<<EOD
-----BEGIN RSA PRIVATE KEY-----
...
-----END RSA PRIVATE KEY-----
EOD,
        /**
         * refresh令牌 RS256 公钥
         * 生成RSA公钥(Linux系统)：openssl rsa -in refresh_private_key.key -pubout -out refresh_public_key.key
         */
        'refresh_public_key' => <<<EOD
-----BEGIN PUBLIC KEY-----
...
-----END PUBLIC KEY-----
EOD,
    ],
];
