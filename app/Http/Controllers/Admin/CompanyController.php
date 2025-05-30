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
        $companies = Company::where('is_recruiting', 1)
                        ->get();

        return view('admin.companies.index', compact('companies'));
    }

    public function destroyIndex(){
        $companies = Company::where('is_recruiting', 0)
                        ->get();

        return view('admin.companies.destroyIndex', compact('companies'));
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

    public function edit(string $company){
        $company = Company::find($company);
        // dd($company->user->email);
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, string $company){
        //companiesテーブルをupdate
        $company_db = Company::find($company);
        $company_name = $company_db->name;
        // $user = User::find('name', $company_name)
        //                 ->get();

        $user = User::find($company_db->user_id);
        // dd($company_db, $company_name, $user);

        $prefecture_id = PrefectureCategory::where('name', $request->prefecture)
                                ->select('id')
                                ->first();

        // $company_db->id = $id;//$company_db は Company::find($company) で取得したモデルであり、IDも既にセットされています
        $company_db->name = $request->name;
        // $company_db->user_id = $company_db->user_id;
        $company_db->information = $request->information;
        $company_db->filename = 'file place';
        $company_db->prefecture_id = $prefecture_id->id;
        $company_db->is_recruiting = 1;

        $company_db->save();


        //userテーブルをupdate
        // $user->id = $user->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_num = $request->phone_num;
        // $user->password = $user->password;
        // $user->role = $user->role;

        $user->save();

        return redirect()->route('admin.companies.show', ['company' => $company]);
    }

    public function destroy(string $company){
        $company_db = Company::find($company);
        $company_db->is_recruiting = 0;

        $company_db->save();
        return redirect('/admin/companies');
    }
}
