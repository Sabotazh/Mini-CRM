<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = Company::query()->paginate(10);

        return 'admin' === Auth::user()->role
            ? view('company.index', compact('companies'))
                ->with('i', (request()->input('page', 1) - 1) * 10)
            : view('employee.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): View
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $input = $request->all();

        if ($image = $request->file('logo')) {
            $destinationPath = 'logos/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['logo'] = "$profileImage";
        } else {
            unset($input['logo']);
        }

        $input['website'] = 'https://' . $input['website'] . '/';

        $company->update($input);

        return redirect()->route('companies.show', $company)->with('success', 'company-updated-successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        if ('admin' === Auth::user()->role) {
            $company->delete();

            return to_route('companies.index')->with('success', 'company-deleted-successfully');
        } else {
            return to_route('employee.dashboard');
        }
    }
}
