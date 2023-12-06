<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

use App\Http\Controllers\ClientsController;

route::apiResource('clientes', ClienteController::class);

route::apiResource('clients', ClientsController::class);
