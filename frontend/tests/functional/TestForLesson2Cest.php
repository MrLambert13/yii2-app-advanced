<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class TestForLesson2Cest
{
    public function _before(FunctionalTester $I) {
    }

    public function _after(FunctionalTester $I) {
    }

    // tests

    /**
     * @param FunctionalTester     $I
     * @param \Codeception\Example $data
     *
     * @dataProvider pageProvider
     */
    public function tryRun(FunctionalTester $I, \Codeception\Example $data) {
        $I->amOnRoute($data['url']);

        $I->see($data['title'], 'li.active a');
        //Либо так $I->see($data['title'], ['css' => 'li.active a']);
    }

    /**
     * @return array
     */
    protected function pageProvider() {
        return [
            ['url' => 'site/index', 'title' => 'Home'],
            ['url' => 'site/about', 'title' => 'About'],
            ['url' => 'site/contact', 'title' => 'Contact'],
            ['url' => 'site/signup', 'title' => 'Signup'],
            ['url' => 'site/login', 'title' => 'Login'],
        ];
    }
}
