<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suggestion;
use App\Models\Company;
use App\Models\Rating;
use Storage;

class AdminController extends Controller
{
    public function index()
    {
        $companies = Company::select('id', 'name', 'url_logo')->paginate(25);

        $suggestions = Suggestion::select('id', 'user_name', 'body')->get();

        $ratings = Rating::select('id', 'user_name', 'body', 'rating')->get();

        return view('dashboard', compact('companies', 'ratings', 'suggestions'));
    }

    public function createCompany(Request $request)
    {
        $companyData = $request->validate([
            'company_name' => ['required', 'string', 'max:190'],
            'company_logo' => ['required', 'file'],
        ]);

        $path = $request->file('company_logo')->store('logos', 's3');

        Storage::disk('s3')->setVisibility($path, 'public');

        Company::create([
            'name' => $companyData['company_name'],
            'file_name' => basename($path),
            'url_logo' => Storage::disk('s3')->url($path),
        ]);

        return back()->withMessage('Company added successfully.');
    }

    public function updateCompany(Request $request)
    {
        $companyData = $request->validate([
            'company_name' => ['required', 'string', 'max:190'],
            'company_logo' => ['nullable', 'file'],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
        ]);

        $updateCompany = Company::find($companyData['company_id']);

        $updateCompany->name = $companyData['company_name'];

        if (isset($companyData['company_logo'])) 
        {
            Storage::disk('s3')->delete('logos/' . $updateCompany->file_name);

            $path = $request->file('company_logo')->store('logos', 's3');

            Storage::disk('s3')->setVisibility($path, 'public');

            $updateCompany->file_name = basename($path);

            $updateCompany->url_logo = Storage::disk('s3')->url($path);
        }

        $updateCompany->save();

        return back()->withMessage('Company updated successfully.');
    }

    public function deleteCompany($id)
    {
        $company = Company::find($id);

        Storage::disk('s3')->delete('logos/' . $company->file_name);

        $company->delete();

        return back()->withMessage('Company deleted successfully.');
    }
}
