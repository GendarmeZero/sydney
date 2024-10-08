<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test;

Route::get('/example', [Test::class, 'exampleMethod']);
