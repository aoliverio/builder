---
layout: page
title: Docs
permalink: /docs/1.0/tutorial-user-authentication.html
author: "aoliverio"
---

# User authentication

> User authentiction using Auth component

It's possible to implement the authentication system for your application using the CakePHP 3.x Auth component and the layout Builder/signin defined in Bootstrap 3 style.


## Setup Auth component
Load and setting the cake Auth component in your appController:
```php
class AppController extends Controller {
    public function initialize() {
        parent::initialize();
        
        // Use cake Auth component
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);

        // Allow only display action without sign in.
        $this->Auth->allow(['display']);
    }

    public function isAuthorized($user) {
        
        // Allow all action for authenticated user
        return true;
    }
}
```
## Define authentication method 
Create a login action in UsersController and change template in 'Builder/signin', as follows:
```php
class UsersController extends AppController {

    // Code from bake.

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password is incorrect.'));
        }

        // Set signin layout from Layout/builder
        $this->viewBuilder()->layout('builder/signin');
        // Use the layout without Template 
        $this->render(false);
    }
}
```
To sign out the authenticated user, implement logout function in the same controller:
```php
class UsersController extends AppController {

    // Code from bake.

    public function logout() {
        $this->Flash->success(__('You are now logged out.'));
        return $this->redirect($this->Auth->logout());
    }
}
```
## Adding password hashing
CakePHP will call convention based setter methods any time a property is set in one of your entities. 
Let’s add a setter for the password. In src/Model/Entity/User.php add the following:
```php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity{

    // Code from bake.

    protected function _setPassword($value){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
```
## Define customized login template
You can define a customized template for the login action 'login.ctp' and save it in scr/Template/Users.
The Builder signin layout uses this integrated code in `<div class="form-signin"></div>`, as follows:
```php
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
<h2 class="form-signin-heading"><?= __('Please sign in') ?></h2>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button(__('Sign in'), ['class' => 'btn btn-primary btn-lg btn-block']); ?>
<?= $this->Form->end() ?>
```