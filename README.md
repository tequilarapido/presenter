Simple and straightforward presenter implementation for Eloquent models.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tequilarapido/presenter.svg?style=flat-square)](https://packagist.org/packages/tequilarapido/presenter)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/tequilarapido/presenter/master.svg?style=flat-square)](https://travis-ci.org/tequilarapido/presenter)
[![StyleCI](https://styleci.io/repos/70917961/shield)](https://styleci.io/repos/70917961)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/960ac4a0-ff08-44df-b247-a6d21200810f.svg?style=flat-square)](https://insight.sensiolabs.com/projects/960ac4a0-ff08-44df-b247-a6d21200810f)
[![Quality Score](https://img.shields.io/scrutinizer/g/tequilarapido/presenter.svg?style=flat-square)](https://scrutinizer-ci.com/g/tequilarapido/presenter)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/tequilarapido/$pckage$/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/tequilarapido/ckage$/?branch=master)

<p align="center">
    <img src="https://s16.postimg.org/sq2va8mnp/presenter.jpg" />
</p>


## Contents

- [Installation](#installation)
- [Usage](#usage)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

You can install the package using composer

``` bash
$ composer require tequilarapido/presenter
```

## Usage

Let's assume we have a User model class

``` php
class User extends Model {
   protected $fillables = ['first_name', 'last_name'];
}
``` 

* 1/  Create a presenter class like the following, and add presentation methods to it.
  For the example, we'll make a method that will return the user full name.   

``` php
use Tequilarapido\Presenter\Presenter;

class UserPresenter extends Presenter {    
     public function name()
     {
        return $this->first_name . ' ' . $this->last_name;
     }
}
```

> We can access model property directly inside the presenter class. We can also access them via the $model property

``` php
$this->first_name
// or 
$this->model->first_name
// or
$this->model->getAttribute('first_name')
```

* 2/  you need to reference this class in the model using a public `$presenter` property and use the `Prensentable` trait.

``` php
use Tequilarapido\Presenter\Presentable;

class User extends Model {
    use Presentable;

   protected $fillables = ['first_name', 'last_name'];
   
   public $presenter = UserPresenter::class;
}
``` 

* 3/ You can than get the presented value like so : 

``` php
$user = User::find(1);

// Retreive as property 
$user->present()->name 

// you can alse call the method 
$user->present()->name()
```

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Nassif Bourguig](https://github.com/nbourguig)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.






