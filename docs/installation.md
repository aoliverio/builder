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

And additional library managed with internal bower_components:

- DatePicker (view on GitHub https://eonasdan.github.io/bootstrap-datetimepicker/)

## Installing Content

If you have downloaded and installed Composer, let’s say you want to install aoliverio/content 
plugin into vendor folder. For this just run the following composer command:

```
composer require aoliverio/content
```

and load plugin in your application, as follows:

```
bin/cake plugin load -r Content
```

The Content plugin uses the uploads folder for attachments and images. 
You must create the folder in webroot of your application.

```
mkdir webroot/uploads
chmod -R 777 webroot/uploads
``` 

## Creating the Database 

You must create database, or adding tables on existing database, using SQL code defined into: 

```
/vendor/aoliverio/content/config/Schema/content.sql
```

If you are created a new database, just replace the values in the `Datasources.default` array in the 
**config/app.php** file with those that apply to your setup. 

## Checking the Installation

You can quickly check that our installation is correct, by checking the default plugin home page. 
From your Internet browser go to this url, replacing `your-app-baseurl` with the correct address:

```
http://your-app-baseurl/content
```

At this point you can proceed with the plugin configuration.
