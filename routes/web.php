<?php

use App\Http\Controllers\DischargeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\OPDCardsController;
use App\Http\Controllers\TriageController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [OPDCardsController::class, 'index'])
     ->middleware('auth', 'can:view_any_cases');
Route::get('/create', [OPDCardsController::class, 'create'])
     ->middleware('auth', 'can:create_case');
Route::post('/', [OPDCardsController::class, 'store'])
     ->middleware('auth', 'can:create_case');
Route::delete('/{opdcard}', [OPDCardsController::class, 'destroy'])
     ->middleware('auth', 'can:cancel,opdcard');

Route::get('/triage/{opdcard}/edit', [TriageController::class, 'edit'])
     ->middleware('auth', 'can:triage,opdcard');
Route::patch('/triage/{opdcard}', [TriageController::class, 'update'])
     ->middleware('auth', 'can:triage,opdcard');

Route::get('/exam/{opdcard}/edit', [ExamController::class, 'edit'])
     ->middleware('auth', 'can:exam,opdcard');
Route::patch('/exam/{opdcard}', [ExamController::class, 'update'])
     ->middleware('auth', 'can:exam,opdcard');

Route::patch('/discharge/{opdcard}', [DischargeController::class, 'update'])
     ->middleware('auth', 'can:discharge,opdcard');
