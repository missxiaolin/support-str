<?php
namespace Tests\Str;
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 xiaolin All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <462441355@qq.com> <https://github.com/missxiaolin>
// +----------------------------------------------------------------------

use PHPUnit\Framework\TestCase;
use xiaolin\Support\Str;

class BaseTest extends TestCase
{
    protected $author = 'xl';
    protected $name = '小林';

    public function testAscii()
    {
        $this->assertEquals('W', Str::ascii('Ω'));
    }

    public function testCamel()
    {
        $this->assertEquals('testCase', Str::camel('Test-Case'));
        $this->assertEquals('testCase', Str::camel('test_case'));
        $this->assertEquals('testCase', Str::camel('Test_case'));
    }

    public function testContains()
    {
        $this->assertTrue(Str::contains('xl', 'l'));
    }

    public function testEndsWith()
    {
        $this->assertTrue(Str::endsWith('xl', 'l'));
    }

    public function testFinish()
    {
        $this->assertEquals('xl', Str::finish('xl', 'l'));
        $this->assertEquals('xiaolin', Str::finish('xiao', 'lin'));
        $this->assertEquals('https://a.cn/', Str::finish('https://a.cn/', '/'));
        $this->assertEquals('https://a.cn/', Str::finish('https://a.cn', '/'));
    }

    public function testIs()
    {
        $this->assertTrue(Str::is('xi*', 'xiao'));
        $this->assertTrue(!Str::is('li*', 'x'));
    }

    public function testKebab()
    {
        $this->assertEquals('hello-world', Str::kebab('Hello    World'));
        $this->assertEquals('hello-world', Str::kebab('HelloWorld'));
    }

    public function testLength()
    {
        $this->assertTrue(Str::length('xl') === 2);
    }

    public function testLimit()
    {
        $this->assertEquals('xl...', Str::limit('xl and Agnes', 2));
    }

    public function testLower()
    {
        $this->assertEquals('xl and agnes', Str::lower('xl AND Agnes'));
    }

    public function testWords()
    {
        $this->assertEquals('xl and...', Str::words('xl and anges', 2));
    }

    public function testParseCallback()
    {
        $result = Str::parseCallback('IndexController@index');
        $this->assertEquals([
            'IndexController',
            'index'
        ], $result);
    }

    public function testPlural()
    {
        if (class_exists('xl\\Support\\Pluralizer')) {
            $this->assertEquals('cats', Str::plural('cat', 2));
        } else {
            $this->assertEquals('cat', Str::plural('cat', 2));
        }
    }

    public function testRandom()
    {
        $this->assertTrue(Str::length(Str::random(12)) === 12);
        $this->assertTrue(Str::length(Str::quickRandom(12)) === 12);
    }

    public function testReplace()
    {
        $this->assertEquals('xlandAgnes', Str::replaceArray(' ', ['', 'A'], 'xl and gnes'));
        $this->assertEquals('xl And agnes', Str::replaceFirst('a', 'A', 'xl and agnes'));
        $this->assertEquals('xl and Agnes', Str::replaceLast('a', 'A', 'xl and agnes'));
    }

    public function testUpper()
    {
        $this->assertEquals('HELLO WORLD', Str::upper('Hello world'));
    }

    public function testTitle()
    {
        $this->assertEquals('Xl And Agnes', Str::title('xl and Agnes'));
    }

    public function testSlug()
    {
        $this->assertEquals('xl-and-agnes', Str::slug('xl and Agnes'));
    }

    public function testSnake()
    {
        $this->assertEquals('xl_and_agnes', Str::snake('XlAndAgnes'));
        $this->assertEquals('xl_and_agnes', Str::snake('xlAndAgnes'));
    }

    public function testStartsWith()
    {
        $this->assertTrue(Str::startsWith('xl_and_agnes', 'x'));
    }

    public function testStudly()
    {
        $this->assertEquals('XlAndAgnes', Str::studly('Xl_and_agnes'));
    }

    public function testSubstr()
    {
        $this->assertEquals('xl a', Str::substr('xl and Agnes', 0, 4));
    }

    public function testUcfirst()
    {
        $this->assertEquals('Xl and Agnes', Str::ucfirst('xl and Agnes'));

    }

    public function testStrAfter()
    {
        $this->assertEquals('nah', Str::after('hannah', 'han'));
        $this->assertEquals('nah', Str::after('hannah', 'n'));
        $this->assertEquals('nah', Str::after('ééé hannah', 'han'));
        $this->assertEquals('hannah', Str::after('hannah', 'xxxx'));
        $this->assertEquals('hannah', Str::after('hannah', ''));
    }

    public function testStrBefore()
    {
        $this->assertEquals('han', Str::before('hannah', 'nah'));
        $this->assertEquals('ha', Str::before('hannah', 'n'));
        $this->assertEquals('ééé han', Str::before('ééé hannah', 'nah'));
        $this->assertEquals('hannah', Str::before('hannah', 'xxxx'));
        $this->assertEquals('hannah', Str::before('hannah', ''));
    }
}
