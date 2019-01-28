# Settings for Temply

## Instructions

1. Install Package
	```php
	composer require infinety-es/temply-home
	```

2. Add a Listener in EventServiceProvider.php
	```php
	'Infinety\TemplyHome\Http\Events\ActivateWebsite' => [
        'App\Listeners\YourListener',
    ],
    ```
