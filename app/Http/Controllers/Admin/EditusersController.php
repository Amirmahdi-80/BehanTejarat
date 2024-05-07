<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EdituserRequest;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class EditusersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="مدیریت کاربران";
        $items= User::query()->orderByDesc('id')->paginate(10);
        return view('Admin.Editusers',compact('title','items','Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return route('signup.register');
    }

    public function store(EdituserRequest $request)
    {
        $item = User::query()->create($request->only(['Firstname','Lastname','password','id']));
        //3 redirect to index
        return redirect()->route('Admin.dashboard.index',compact('item'));
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
        $title = "ویرایش کاربر";
        //1 get 1 record depends on id
        $item = User::query()->findOrFail($id);
        //2 send data edit form
        return view('Admin.Edituser', compact('title','item','Products'));
    }

    /**
     * Update the specified resource in storage.
     */
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function update(EdituserRequest $request, string $id)
    {
        $data = $request->only(['Firstname', 'Lastname', 'email', 'id','Role']);
        $title='ویرایش اطلاعات';
        /* Upload Avatar */
        if ($request->has('avatar')) {
            $file = $request->file('avatar');
            $path = $file->store('Avatars');
            $data['avatar'] = $file->hashName();
        }
        /* Upload Avatar */

        $user = $this->model->where('id', $id)->update($data);

        return redirect()->route('Admin.Editusers.index', compact('data','title'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Editusers.index');
    }
}
