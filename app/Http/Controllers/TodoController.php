<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        // $form = DB::table('contens')->where('content', $content)->first;
        // $form = Content::with('content')->get();
        // return view('index', ['items' => $form]);

        // $param = [
        //     'input' => $request->input,
        //     'content' => $items
        // ];
        // return view('index', $param);

        // $item = Content::find($request->input);
        // $param = [
        //     'input' => $request->input,
        //     'item' => $item
        // ];
        // return view('index', $param);

        // $items = Content::all();
        // $date = Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('Y-m-d');
        // $date = DB::table('contents')->where('created_at', 1)->first();
        // $date = DB::table('contents');
        // $miso = [
        //     'items' => $items,
        //     'date' => $date
        // ];

        // $items = Content::select('content')->get();
        // return view('index', ['items' => $items]);

        // $items = Content::all();
        // return view('index', ['items' => $param]);

        // $query = Content::query();
        // $query->where('id', 1);
        // $posts = $query->get();
        // return view('index', ['items' => $posts]);
        // ↑idの1番目の情報をすべてを取得し表示

        // $content = Content::all();
        // dd($content);
        // return response()->json([
        //     'posts' => $content
        // ]);
        // ↑デバッグ「https://qiita.com/1rohas/items/ba596b57d6027cc21166」

        $items = Content::all();
        return view('index', compact('items'));
        // return view('index', ['items' => $items]);
        // ↑contentのすべてを取得し表示
    }

    public function add(Request $request)
    {
        return view('add');
    }
    public function create(Request $request)
    {
        // $validate_rule = [
        //     'content' => 'required|max:20',
        // ];
        // $this->validate($request, $validate_rule);
        $this->validate($request, Content::$rules);
        $form = $request->all();
        Content::create($form);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        // $id = $request->id;
        // var_dump($id);
        // die;

        $content = Content::find($request->id);
        return view('edit', ['items' => $content]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Content::$rules);
        $form = $request->all();
        unset($form['_token']);
        Content::where('id', $request->id)->update($form);
        // Content::find($request->id)->fill($form)->save();
        return redirect('/');

        // $content = Content::find($request->id);
        // $content->content = $request->content;
        // $content->save();
        // return redirect('/');
    }

    public function delete(Request $request)
    {
        $content = Content::find($request->id);
        return view('delete', ['items' => $content]);
    }
    public function remove(Request $request)
    {
        $content = Content::find($request->id);
        $content->delete();
        return redirect('/');
    }
}
