<?php
/**
 *-------------------------------------------------------------------------p*
 *
 *-------------------------------------------------------------------------h*
 * @copyright  Copyright (c) 2015-2022 Jody Inc. (http://www.Jody.com)
 *-------------------------------------------------------------------------c*
 * @license    http://www.Jody.com        s h o p w w i . c o m
 *-------------------------------------------------------------------------e*
 * @link       http://www.Jody.com by 象讯科技 phcent.com
 *-------------------------------------------------------------------------n*
 * @since      Jody象讯·PHP商城系统Pro
 *-------------------------------------------------------------------------t*
 */


namespace Jody\WebmanAuth\Exception;


class JwtTokenException extends \RuntimeException
{
    protected $error;

    public function __construct($error,$code = 401)
    {
        parent::__construct();
        $this->error = $error;
        $this->code = $code;
        $this->message = is_array($error) ? implode(PHP_EOL, $error) : $error;
    }

    /**
     * @param mixed $code
     * @return JwtTokenException
     */
    public function setCode($code): JwtTokenException
    {
        $this->code = $code;
        return $this;
    }

    /**
     * 获取验证错误信息
     * @access public
     * @return array|string
     */
    public function getError()
    {
        return $this->error;
    }
}