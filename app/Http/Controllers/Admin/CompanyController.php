<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    //企業一覧の表示
    public function index(){
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

}
