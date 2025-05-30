<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
// namespace App\Http\Controllers;
// Userディレクトリにあるのに namespace が App\Http\Controllers; のままだと、
// App\Http\Controllers\RecruitController として認識されてしまいます。
use App\Models\Job_Category;
use App\Models\Recruit;
use Illuminate\Http\Request;


class RecruitController extends Controller
{
    //
    public function index(Request $request)
    {
        // カテゴリ一覧を取得
        $categories = Job_Category::all();
        #検索
        $query = Recruit::query();


        // キーワード検索（タイトル・説明）
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                    ->orWhere('information', 'like', "%{$keyword}%");
            });
        }

        // カテゴリ検索
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }


        // 並び替え
        if ($request->filled('sort_order') && $request->sort === 'latest') {
            $query->orderBy('created_at', 'desc');
        }

        #表示
        $category_id = $request->input('category_id');

        $recruits = Recruit::latest()->paginate(10);//新しい順に、１０件表示
        return view('user.recruits.index', compact('recruits', 'category_id'));
    }

    public function show(Recruit $recruit, Request $id)
    {
        $recruit = Recruit::where('id', $id)->firstOrFail();
        return view('user.recruits.show', compact('recruit'));
    }
}
