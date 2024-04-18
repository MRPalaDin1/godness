<?php

namespace Controller;

use Model\Abonents;
use Model\Divisions;
use Model\NumAbonent;
use Model\Room;
use Model\RoomType;
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
        $types = RoomType::all();

        if ($request->method === 'POST') {

            $name = $request->get('name');
            $surname = $request->get('surname');
            $patron = $request->get('patron');
            $date = $request->get('date');
            $img = $request->get('img');

            //*/var_dump($_FILES['img']); die();
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                // Путь для сохранения изображения
                $target_dir = "/srv/users/vkrmnupx/zithupf-m6/pop-it-mvc/public/image/";;
                $target_file = $target_dir . basename($_FILES['img']['name']);
                //var_dump $_FILES); die();
                // Перемещаем загруженное изображение в указанную директорию
                if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                    echo "Изображение успешно загружено.";
                    // Получаем путь к загруженному изображению
                    $img_path = $_FILES['img']['name'];
                    //var_dump($_FILES['img']['name']);
                } else {
                    echo "Ошибка при загрузке изображения.";
                }
            } else {
                echo "Изображение не было загружено.";
            }
            $request->set('img', $_FILES['img']['name']);

            if (Abonents::create($request->all())) {
                app()->route->redirect('/hello');
            }

            // Добавляем путь к изображению к данным о преподавателе

        }

        return new View('site.hello', ['abonents' => $abonents, 'telephones' => $telephones, 'divisions' => $divisions, 'rooms' => $rooms, 'types' => $types]);

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

        if ($request->method === 'POST') {
            Room::create($request->all());
            app()->route->redirect('/hello');
        }

        return new View('site.hello');

    }

    public function createtel(Request $request): string
    {

        if ($request->method === 'POST') {
            Telephone::create($request->all());
            app()->route->redirect('/hello');
        }
    }

    public function creatediv(Request $request): string
    {

        if ($request->method === 'POST') {
            Divisions::create($request->all());
            app()->route->redirect('/hello');
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
            if ($validator->fails()) {
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
        if (Auth::attempt($request->all())) {
            if (app()->auth->user()->id_role == '0') {
                app()->route->redirect('/hello');
            } elseif (app()->auth->user()->id_role == '1') {
                app()->route->redirect('/signup');
            }
        }
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
        $divisions = Divisions::all();
        $rooms = Room::all();
        $telephones = Telephone::all();
        $types = RoomType::all();

        return new View('site.view', ['abonents' => $abonents, 'telephones' => $telephones, 'divisions' => $divisions, 'rooms' => $rooms, 'types' => $types]);
    }

    public function viewPhone(Request $request): string
    {
            $abonent = Abonents::where('id_abonents', $request->get('abonent'))->first();

            return new View('site.view_phone', ['abonent' => $abonent]);

    }

    public function viewdiv(Request $request): string
    {
        if ($request->method === 'POST') {
            $division = Divisions::where('id_division', $request->get('id_division'))->first();
            return new View('site.viewdiv', ['telephones' => $division->telephones]);
        }
    }

    public function viewdivroom(Request $request): string
    {
        if ($request->method === 'POST') {
            $division = Divisions::where('id_division', $request->get('id_division'))->first();
            return new View('site.viewdivroom', ['telephones' => $division->telephones]);
        }
    }

    public function viewroom(Request $request): string
    {
        if ($request->method === 'POST') {
            $division = Divisions::where('id_division', $request->get('id_division'))->first();
            return new View('site.viewroom', ['telephones' => $division->telephones]);
        }
    }
}