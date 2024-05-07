<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EdituserRequest;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class UserUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }
    public function index()
    {
        $Products=Products::all();
        $items= User::query()->orderByDesc('id')->paginate(10);
        $about="شما در این صفحه میتوانید اطلاعات حساب کاربری خود را ویرایش کنید";
        $title='ویرایش اطلاعات حساب کاربری';
        return view('Auth.Me',compact('about','title',"Products",'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Products=Products::all();
        $item = User::query()->findOrFail($id);
        $title = "ویرایش اطلاعات حساب کاربری";
        //2 send data edit form
        return view('Auth.EditMe', compact('title','Products','item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdituserRequest $request, string $id)
    {
        $data = $request->only(['Firstname', 'Lastname', 'email', 'Per']);
        $title = 'ویرایش اطلاعات';

        /* Upload Avatar */
        if ($request->has('avatar')) {
            $file = $request->file('avatar');
            $path = $file->store('Avatars');
            $data['avatar'] = $file->hashName();
        } else {
            unset($data["avatar"]);
        }
        /* Upload Avatar */

        $user = $this->model->find($id);
        $user->update($data);

        return redirect()->route('Admin.RegUp.index', compact('data', 'title'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.RegUp.index');
    }
}
