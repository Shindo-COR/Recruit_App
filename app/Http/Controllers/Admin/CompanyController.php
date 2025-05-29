<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //企業一覧の表示
    public function index(){
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

}
