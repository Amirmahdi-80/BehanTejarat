<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function view()
    {
        $title='صفحه ثبت نام';
        return view('Auth.Register',compact('title'));
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only([
            'Firstname',
            'Lastname',
            'email',
            'password'
        ]);

        /* Upload Avatar */
        if($request->has('avatar')) {
            $file = $request->file('avatar');
            $path = $file->store('Avatars');
            $data['avatar'] = $file->hashName();
        }
        /* Upload Avatar */

        /* Create User */
        $user = $this->model->create($data);
        /* Create User */

        return redirect()->route('login')->with('msg','ثبت نام با موفقیت انجام شد!');
    }

}
