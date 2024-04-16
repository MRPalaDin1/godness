<?php

namespace Controller;

use Model\Abonents;
use Model\Divisions;
use Model\NumAbonent;
use Model\Room;
use Model\Telephone;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;
use Illuminate\Database\Capsule\Manager as DB;

class Site
{
    public function index(Request $request): string
    {
        $posts = telephone::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }
    public function hello(Request $request): string
    {
        $divisions = Divisions::all();
        $rooms = Room::all();
        $abonents = Abonents::all();
        $telephones = Telephone::all();

/*        if ($request->method === 'POST') {
            $name = $request->get('name');
            $surname = $request->get('surname');
            $patron = $request->get('patron');
            $date = $request->get('date');

            if (Abonents::create($request->all())) {
                app()->route->redirect('/hello');
            }
        }

        if ($request->method === 'POST') {
            $abonentId = Abonents::where('id_abonents', $request->get('abonent'))->first()->id_abonents;
            $numAbonent = NumAbonent::where('id_abonents', $abonentId)->first();
            var_dump($abonentId);
            $telephones = $numAbonent->telephones()->get();
            var_dump($telephones);

            return new View('site.hello', ['abonents' => $abonents, 'telephones' => $telephones, 'divisions'=>$divisions]);
        }*/

        return new View('site.hello',['abonents'=>$abonents, 'telephones'=>$telephones, 'divisions'=>$divisions, 'rooms'=>$rooms]);

    }


    public function attatel(Request $request): string
    {
        if ($request->method === 'POST') {
            NumAbonent::create($request->all());
            app()->route->redirect('/hello');
        }
    }

    public function createroom(Request $request): string
    {

        /*if ($request->method === 'POST') {
            $room_num = Room::where('room_num', $request->get('room'))->first()->room_num;

            var_dump($room_num);

            $divisions = $divisions->division()->get();

            var_dump($divisions);
            return new View('site.hello',['divisions'=>$divisions, 'rooms'=>$rooms]);
        }*/

        if ($request->method === 'POST') {
            Telephone::create($request->all());
            app()->route->redirect('/login');
        }
    }

    public function createtel(Request $request): string
    {

        /*if ($request->method === 'POST') {
            $room_num = Room::where('room_num', $request->get('room'))->first()->room_num;

            var_dump($room_num);

            $divisions = $divisions->division()->get();

            var_dump($divisions);
            return new View('site.hello',['divisions'=>$divisions, 'rooms'=>$rooms]);
        }*/

        if ($request->method === 'POST') {
            Telephone::create($request->all());
            app()->route->redirect('/login');
        }
    }


    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

                   $validator = new Validator($request->all(), [
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            //var_dump($validator->fails()); die();
            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/signup');
            }
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all()))
        {
            if(app()->auth->user()->id_role == '0')
                {app()->route->redirect('/hello');
        }
            elseif (app()->auth->user()->id_role == '1')
                {app()->route->redirect('/signup');}}
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {

        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function view(Request $request): string
    {
        $abonents = Abonents::all();

        if ($request->method === 'POST') {
            $abonentId = Abonents::where('id_abonents', $request->get('abonent'))->first()->id_abonents;
            $numAbonent = NumAbonent::where('id_abonents', $abonentId)->first();

            var_dump($abonentId);
            echo "<br>";
            var_dump($numAbonent->id_abonents);

//            $telephones = $abonentId->num_abonent->telephones()->get();

            $telephones = $numAbonent->telephones()->get();

//            var_dump($telephones);


            return new View('site.view', ['abonents' => $abonents, 'telephones' => $telephones]);
        }


        return new View('site.view',['abonents'=>$abonents]);


    }


}


