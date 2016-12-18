# Builder for CakePHP 3.x

Builder is a CakePHP 3.x plugin used to generate code in Bootstrap 3 style. 

Some of the highlights:

- Defined a new Bake template for generate CRUD using Bootstrap 3 framework.
- Added filter action to controller and generate base filter template.
- Open add, edit, delete and filter templates in the Bootstrap 3 modal view.
- Used grid and detail template to extend the index and view actions functionality.
- Used element to import in CakePHP 3 app default code and behavior.
- Used DataTables JQuery plugin for table in the index template.
- Integrated simple Role-Based Access Controll.

The last version was called "Monument Valley", from the image that appears at login. 

![builder-login-area](https://raw.githubusercontent.com/aoliverio/builder/master/docs/images/login-area-screenshot.png)

This version uses popup element for ADD/EDIT/DELETE/FILTER actions:

![builder-form-template](https://raw.githubusercontent.com/aoliverio/builder/master/docs/images/form-template-screenshot.png)

In this version is a new dashboad Builder been integrated:

![builder-form-template](https://raw.githubusercontent.com/aoliverio/builder/master/docs/images/builder-dashboard-screenshot.png)

## Minimal Requirements

The Builder plugin using this third-party libraries, managed with bower:

- jQuery
- jQuery UI
- Bootstrap
- FontAwesome
- DataTables (Add advanced interaction controls to any HTML table, http://datatables.net)
- Summernote (Simple WYSIWYG editor on Bootstrap, http://summernote.org)

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:
```
composer require aoliverio/builder
```

Load plugin with route params in your application:
```
bin/cake plugin load -r Builder
```

Complete the installation using the Builder console:
```
bin/cake builder setup
```

## Docs

For more informations about installation and configuration options, see the [WIKI](https://github.com/aoliverio/builder/wiki).

## Bugs & Feedback

[https://github.com/aoliverio/builder/issues](https://github.com/aoliverio/builder/issues).

## License

Copyright (c) 2016 Antonio Oliverio and licensed under [MIT License](http://opensource.org/licenses/mit-license.php).
