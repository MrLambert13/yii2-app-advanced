<?php

namespace frontend\tests;

use frontend\models\ContactForm;

class TestForLesson2Test extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before() {
    }

    protected function _after() {
    }

    // tests
    public function testRun() {
        $testBoolean = true;
        $this->assertTrue($testBoolean, 'Сравнение с true');

        $testEqual = 13;
        $this->assertEquals(13, $testEqual, 'Тестовое число равно 13');

        $this->assertLessThan(15, $testEqual, 'Тестовое число меньше 15');
        $model = new ContactForm();
        $name = 'Artur';
        $model->setAttributes(['name' => $name, 'email' => 'artur@mail.ru', 'body' => 'some text']);
        $this->assertAttributeEquals('Artur', 'name', $model, 'Имя совпадает');

        $arr = [
            'first' => 1,
            'second' => 2,
        ];
        $this->assertArrayHasKey('first', $arr);
    }
}