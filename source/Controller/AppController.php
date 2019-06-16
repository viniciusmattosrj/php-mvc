<?php

namespace App\Controller;

use App\Model\User;

final class AppController extends Controller
{
    public static function index()
    {
        return (new AppController)->view('index');
    }

    public static function list()
    {
        $users = (new User)->listAll();
        return (new AppController)->view('list', ['users' => $users]);
    }

    public static function write()
    {
        (new User)->createNew((new AppController)->params('user'));
        self::redirect('/list');
    }

    public static function logout()
    {
        (new User)->deleteAll();
        (new AppController)->redirect('/');
    }

}
