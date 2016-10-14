<?php

namespace Tequilarapido\Presenter\Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use Tequilarapido\Presenter\Presentable;
use Tequilarapido\Presenter\Presenter;
use Tequilarapido\Presenter\PresenterException;
use Tequilarapido\Presenter\Tests\TestCase;

class PresenterTest extends TestCase
{
    /** @test */
    public function it_throws_an_exception_if_undefined_presenter()
    {
        $model = new UndefinedPresenterModel;

        try {
            $model->present();
        } catch (\Exception $e) {
        }
        $this->assertInstanceOf(PresenterException::class, $e);
    }

    /** @test */
    public function it_throws_an_exception_if_invalid_presenter()
    {
        $model = new InvalidPresenterModel;

        try {
            $model->present();
        } catch (\Exception $e) {
        }
        $this->assertInstanceOf(PresenterException::class, $e);
    }

    /** @test */
    public function it_returns_correctly_a_presented_value()
    {
        $model = new User(['first_name' => 'John', 'last_name' => 'Doe']);

        $this->assertInstanceOf(UserPresenter::class, $model->present());
        $this->assertEquals('John Doe', $model->present()->name());
        $this->assertEquals('John Doe', $model->present()->name);
    }
}

class UndefinedPresenterModel extends Model
{
    use Presentable;
}

class InvalidPresenterModel extends Model
{
    use Presentable;

    public $presenter = '\Some\UnfoundClass';
}

class User extends Model
{
    use Presentable;

    public $presenter = UserPresenter::class;

    protected $fillable = ['first_name', 'last_name'];
}

class UserPresenter extends Presenter
{
    public function name()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
