<?php
/**
 * 用户相关类
 */
class User {
    public $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * 获取用户名
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * 设置用户名
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * 获取密码
     * @return string
     */
    private function getPassword()
    {
        return $this->password;
    }

    /**
     * 设置密码
     * @param string $password
     */
    private function setPassowrd($password)
    {
        $this->password = $password;
    }
}
//创建反射类实例
$refClass = new ReflectionClass(new User('liulu', '123456'));

$properties = $refClass->getProperties(); // 获取User类的所有属性，返回ReflectionProperty的数组
$property = $refClass->getProperty('password'); // 获取User类的password属性

$methods = $refClass->getMethods(); // 获取User类的所有方法，返回ReflectionMethod数组
$method = $refClass->getMethod('getUsername');  // 获取User类的getUsername方法

$instance = $refClass->newInstance('admin', 123, '***');


$instance->setUsername('admin_1'); // 调用User类的实例调用setUsername方法设置用户名
$username = $instance->getUsername(); // 用过User类的实例调用getUsername方法获取用户名
echo $username . "\n"; // 输出 admin_1

// 也可以写成
$refClass->getProperty('username')->setValue($instance, 'admin_2'); // 通过反射类ReflectionProperty设置指定实例的username属性值
$username = $refClass->getProperty('username')->getValue($instance); // 通过反射类ReflectionProperty获取username的属性值
echo $username . "\n"; // 输出 admin_2