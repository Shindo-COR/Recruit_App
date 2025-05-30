<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\PrefectureCategory;
use App\Models\Recruit;
use App\Models\User;

use DateTime;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    //企業一覧の表示
    public function index(Request $request){
        //ソートが入力された場合のみ処理
        if($request->has('requirement')){
            $keyword = $request->requirement;
            $companies = Company::with('prefecture')
                            ->where('name', 'LIKE', "%{$keyword}%")
                            ->orWhereHas('prefecture', function($query) use ($keyword){
                                $query->where('name', 'LIKE', "%{$keyword}%");
                            })->get();
        }else if($request->has('sort')){
            if($request->sort == 'addition_old'){
                //登録日が古い順に表示
                $companies = Company::where('is_recruiting', 1)
                                ->orderBy('id', 'asc')
                                ->get();
            }else if($request->sort == 'addition_new'){
                //登録日が新しい順に表示
                $companies = Company::where('is_recruiting', 1)
                                ->orderBy('id', 'desc')
                                ->get();
            }else if($request->sort == 'update_old'){
                //最終更新日時が古い順に表示
                $companies = Company::where('is_recruiting', 1)
                                ->orderBy('updated_at', 'asc')
                                ->get();
            }else if($request->sort == 'update_new'){
                //最終更新日時が新しい順に表示
                $companies = Company::where('is_recruiting', 1)
                                ->orderBy('updated_at', 'desc')
                                ->get();
            }else if($request->sort == 'prefecture_up'){
                //都道府県を五十音に表示　あ→ん
                $companies = Company::join('prefecture_categories', 'companies.prefecture_id', '=', 'prefecture_categories.id')
                                ->where('is_recruiting', 1)
                                ->select('companies.id','companies.name', 'companies.prefecture_id', 'companies.created_at', 'companies.updated_at')
                                ->orderBy('sort_order', 'asc')
                                ->get();
            }else if($request->sort == 'prefecture_down'){
                //都道府県を五十音に表示　ん→あ
                $companies = Company::join('prefecture_categories', 'companies.prefecture_id', '=', 'prefecture_categories.id')
                                ->where('is_recruiting', 1)
                                ->select('companies.id','companies.name', 'companies.prefecture_id', 'companies.created_at', 'companies.updated_at')
                                ->orderBy('sort_order', 'desc')
                                ->get();
            }else{
                $companies = Company::where('is_recruiting', 1)
                                ->get();
            }
        }else{
        $companies = Company::where('is_recruiting', 1)
                        ->get();
    }
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

        //編集時間を更新するため現在時刻を取得
        $date = new Datetime();
        $date->format('Y-m-d H:i:s');

        $company_db->id = $company;
        $company_db->name = $request->name;
        $company_db->user_id = $company_db->user_id;
        $company_db->information = $request->information;
        $company_db->filename = 'file place';
        $company_db->prefecture_id = $prefecture_id->id;
        $company_db->is_recruiting = 1;
        $company_db->updated_at = $date;

        $company_db->save();


        //userテーブルをupdate
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_num = $request->phone_num;
        $user->updated_at = $date;

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
