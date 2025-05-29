<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\PrefectureCategory;
use App\Models\Recruit;
use App\Models\User;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    //企業一覧の表示
    public function index(){
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

    public function create(){
        return view('admin.companies.create');
    }

    public function store(Request $request){
        //userテーブルに登録
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_num = $request->phone_num;
        $user->password = $request->password;
        $user->role = 1;

        $user->save();


        //companiesテーブルに登録
        $company = new Company;

        $prefecture_id = PrefectureCategory::where('name', $request->prefecture)
                                ->select('id')
                                ->first();

        $company->user_id = $user->id;
        $company->name = $request->name;
        $company->information = $request->information;
        $company->filename = 'file place';
        $company->prefecture_id = $prefecture_id->id;
        $company->is_recruiting = 1;

        $company->save();

        return redirect('/admin/companies');
    }

    public function show(string $company){
        $company = Company::find($company);
        // dd($company->user->email);
        return view('admin.companies.show', compact('company'));
    }
}
