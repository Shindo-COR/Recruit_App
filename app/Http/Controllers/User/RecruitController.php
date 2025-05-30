<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
// namespace App\Http\Controllers;
// Userディレクトリにあるのに namespace が App\Http\Controllers; のままだと、
// App\Http\Controllers\RecruitController として認識されてしまいます。
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
