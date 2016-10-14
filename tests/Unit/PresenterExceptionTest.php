<?php

namespace Tequilarapido\Presenter\Tests\Unit;

use Tequilarapido\Presenter\PresenterException;
use Tequilarapido\Presenter\Tests\TestCase;

class PresenterExceptionTest extends TestCase
{
    /** @test */
    public function it_is_an_exception()
    {
        $this->assertInstanceOf(\Exception::class, new PresenterException);
    }

}
