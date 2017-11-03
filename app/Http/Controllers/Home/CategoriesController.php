<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Category $category
     * @param Request $request
     * @param Topic $topic
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category, Request $request, Topic $topic, User $user)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics = $topic->withOrder($request->order)
            ->where('category_id', $category->id)
            ->paginate(20);

        // 活跃用户列表
        $active_users = $user->getActiveUsers();

        // 传参变量话题和分类到模板中
        return view('topics.index', compact('topics', 'category', 'active_users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
