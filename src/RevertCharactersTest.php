<?php
namespace Ishakov\Advcake;

use PHPUnit\Framework\TestCase;

require_once './test.php';

class RevertCharactersTest extends TestCase
{
    public function testSimpleString()
    {
        $input = "Привет!";
        $expected = "Тевирп!";
        $actual = reverseSentence($input);
        $this->assertEquals($expected, $actual);
    }

    public function testStringWithSpaces()
    {
        $input = "Привет! Давно не виделись.";
        $expected = "Тевирп! Онвад ен ьсиледив.";
        $actual = reverseSentence($input);
        $this->assertEquals($expected, $actual);
    }

    public function testStringWithPunctuation()
    {
        $input = "Привет, мир!";
        $expected = "Тевирп, рим!";
        $actual = reverseSentence($input);
        $this->assertEquals($expected, $actual);
    }

    public function testEmptyString()
    {
        $input = "";
        $expected = "";
        $actual = reverseSentence($input);
        $this->assertEquals($expected, $actual);
    }
}
