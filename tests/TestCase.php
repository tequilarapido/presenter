<?php

namespace Tequilarapido\Presenter\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /** @var TestHelper */
    protected $helper;

    public function setUp() : void
    {
        parent::setUp();

        $this->helper = new TestHelper($this->app);
    }

    public function tearDown() : void
    {
        parent::tearDown();

        $this->helper = null;
    }
}
