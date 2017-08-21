# yii2-file-session
PHP Yii2. This is an expanding class of web sessions . This class supports retrieving data on session id and deleting it.

Installation
------------
```
php composer.phar require --prefer-dist alexdin/yii2-file-session
```
or add

```json
"alexdin/yii2-file-session":"^0.0.1"
```

Configure 
-----
Configure file session
add this string to components in config main.php file (main-local.php).
```php
 'session' => [
             // this is the name of the session cookie used for login on the backend
             'class'=>'alexdin\file-session\Session',
             'name' => 'session-name',
             // dir for your path session
             // create migrate if dir is not exists or use "mkdir" function
             'savePath' => __DIR__ . '/../runtime/sessions',
         ],
 ```
 Usage
 -----

```php
Yii::$app->session->destroySession($id)
```
Clears and deletes the session by id
```php
Yii::$app->session->readSession($id)
```
Reads the session from the file and returns the serialized data in the string
```php
Yii::$app->session->getSessionData($id)
```
Returns an array of session data by  id
```php
Yii::$app->session->getSessionFileName($id)
```
Returns the session file name by id
