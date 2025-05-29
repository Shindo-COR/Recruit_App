<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Recruit;
use Illuminate\Http\Request;


class RecruitController extends Controller
{
    //
      public function index()
    {
        $recruits = Recruit::latest()->paginate(10);//新しい順に、１０件表示
        return view('user.recruits.index', compact('recruits'));
    }

    public function show(Recruit $recruit, Request $id)
    {
         $recruit = Recruit::findOrFail($id);
        return view('user.recruits.show', compact('recruit'));
    }
}
