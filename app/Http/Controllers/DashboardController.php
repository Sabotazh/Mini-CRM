<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        return 'admin' === Auth::user()->role
            ? redirect()->route('admin.dashboard')
            : redirect()->route('employee.dashboard');
    }
}
