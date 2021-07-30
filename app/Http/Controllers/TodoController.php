<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        // $form = DB::table('contens')->where('content', $content)->first;
        // $form = Content::with('content')->get();
        // return view('index', ['items' => $form]);

        // $form = $request->all();
        // $items = Content::where('content', $request->content)->update($form);

        $items = Content::all();
        return view('index', ['items' => $items]);
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
        $content = Content::find($request->id);
        return view('/todo/update');
    }
    public function update(Request $request)
    {
        $this->validate($request, Content::$rules);
        $form = $request->all();
        $form = $request->except(['_token']);
        unset($form['_token']);
        Content::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        return view('/');
    }
}
