# BenGorFile
> Lightweight file PHP library developed using Domain-Driven Design

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c684216d-c5f3-4b70-a7cf-1ec2af743142/mini.png)](https://insight.sensiolabs.com/projects/c684216d-c5f3-4b70-a7cf-1ec2af743142)
[![Build Status](https://travis-ci.org/BenGorFile/File.svg?branch=master)](https://travis-ci.org/BenGorFile/File)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BenGorFile/File/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/BenGorFile/File/?branch=master)
[![Total Downloads](https://poser.pugx.org/bengor-file/file/downloads)](https://packagist.org/packages/bengor-file/file)
[![Latest Stable Version](https://poser.pugx.org/bengor-file/file/v/stable.svg)](https://packagist.org/packages/bengor-file/file)
[![Latest Unstable Version](https://poser.pugx.org/bengor-file/file/v/unstable.svg)](https://packagist.org/packages/bengor-file/file)

BenGorFile is **lightweight, flexible and easy to use** file management library. Using **Domain-Driven Design**
this library offers a well tested and documented codebase with many common use cases already implemented, such as:

 * Upload file
    * Default
    * By hash
 * Overwrite file
 * Remove file
 * Rename file

## Requirements
PHP >= 5.5

## Installation
The easiest way to install this component is using [Composer][6]
```bash
$ composer require bengor-file/file
```

## Documentation
All the documentation is stored in the `docs` folder.

[Show me the docs!](docs/index.md)

## Tests
This library is completely tested by **[PHPSpec][1], SpecBDD framework for PHP**.

Run the following command to launch tests:
```bash
$ vendor/bin/phpspec run -fpretty
```

## Contributing
This library follows PHP coding standards, so pull requests need to execute the Fabien Potencier's [PHP-CS-Fixer][5].
Furthermore, if the PR creates some not-PHP file remember that you have to put the license header manually.
In order to simplify we provide a Composer script that wraps all the commands related with
this process.
```bash
$ composer run-script cs
```

There is also a policy for contributing to this project. Pull requests must be explained step by step to make the
review process easy in order to accept and merge them. New methods or code improvements must come paired with
[PHPSpec][1] tests.

If you would like to contribute it is a good point to follow Symfony contribution standards, so please read the
[Contributing Code][2] in the project documentation. If you are submitting a pull request, please follow the guidelines
in the [Submitting a Patch][3] section and use the [Pull Request Template][4].

## Credits
This library is created by:
>
**@benatespina** - [benatespina@gmail.com](mailto:benatespina@gmail.com)<br>
**@gorkalaucirica** - [gorka.lauzirika@gmail.com](mailto:gorka.lauzirika@gmail.com)

## Licensing Options
[![License](https://poser.pugx.org/bengor-file/file/license.svg)](https://github.com/BenGorFile/File/blob/master/LICENSE)

[1]: http://www.phpspec.net/
[2]: http://symfony.com/doc/current/contributing/code/index.html
[3]: http://symfony.com/doc/current/contributing/code/patches.html#check-list
[4]: http://symfony.com/doc/current/contributing/code/patches.html#make-a-pull-request
[5]: http://cs.sensiolabs.org/
[6]: http://getcomposer.org
