# Installation

Content is easy to install. The minimum requirements are CakePHP 3.x application and third-party libraries.

## Minimal Requirements

The Content plugin using this third-party libraries, managed with aoliverio/builder plugin:

- jQuery
- jQuery UI
- Bootstrap
- FontAwesome
- DataTables (Add advanced interaction controls to any HTML table, http://datatables.net)
- Summernote (Simple WYSIWYG editor on Bootstrap, http://summernote.org)

## Installing Builder

If you have downloaded and installed Composer, let’s say you want to install aoliverio/builder 
plugin into vendor folder. For this just run the following composer command:

```
composer require aoliverio/builder
```

and load plugin in your application, as follows:

```
bin/cake plugin load -r Builder
```

Copy files from Builder layouts, styles and scripts in your CakePHP app:
```
cp -R vendor/aoliverio/builder/src/Template/Layout/builder src/Template/Layout/
cp -R vendor/aoliverio/builder/webroot/css/builder webroot/css/
cp -R vendor/aoliverio/builder/webroot/js/builder webroot/js/
```

Copy files from Builder bower_components in your CakePHP app:
```
cp -R vendor/aoliverio/builder/webroot/bower_components webroot/
```

Edit initialize function in src/Controller/AppController, it requires no change to the standard behavior.
```php
class AppController extends Controller {
    public function initialize() {
        parent::initialize();
 
        // to customize insert your code here
        // see 'how to use' page on Wiki section
    }
}
```

Edit initialize function in src/View/AppView, as follows:
```php
namespace App\View;

use Builder\View\View;

class AppView extends View {
    public function initialize() {

        // to customize insert your code here
        // see 'how to use' page on Wiki section

        parent::initialize();
    }
}
```

## Creating the Database 

You must create database, or adding tables on existing database, using SQL code defined into: 

```
/vendor/aoliverio/builder/config/schema/builder.sql
```

If you are created a new database, just replace the values in the `Datasources.default` array in the 
**config/app.php** file with those that apply to your setup. 

## Checking the Installation

You can quickly check that our installation is correct, by checking the default plugin home page. 
From your Internet browser go to this url, replacing `your-app-baseurl` with the correct address:

```
http://your-app-baseurl/builder
```

At this point you can proceed with the plugin configuration.
