{{--
The parent errors::layout comes from inside the framework
(/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/views/layout.blade.php)
and you are welcome to continue using it, or create your layout file and extend it.
--}}

@extends('errors::layout')

@section('title', 'Service Unavailable')

{{--
The method renderHttpException(HttpException $e)
of the /vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php class
pass the HttpException $e object to our view:
"return response()->view($view, ['exception' => $e], $status, $e->getHeaders());"
So we can use $exception to display the message we pass to 'php artisan down --message "..."'
--}}

@if ($message = $exception->getMessage())
    @section('message', $message)
@else
    @section('message', 'Be right back')
@endif