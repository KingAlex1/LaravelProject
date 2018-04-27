<?php

namespace App\Http\Controllers;

use App\Game;
use App\Order;
use App\User;
use Faker\Factory;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        $game = Game::all();
        $user = Auth::user();

        return view('pages.index', ['games' => $game, 'user' => $user]);

    }

    public function about()
    {
        return view('pages.about');
    }

    public function news()
    {
        return view('pages.news');
    }

    public function orders(Request $request)
    {
        $user = Auth::user()->email;
        $userOrders = User::with('orders')->get()->where('email', '=', $user);
        $orders = $userOrders->toArray();
        $games = [];
        foreach ($orders as $order) {
            foreach ($order['orders'] as $subOrder) {
                $games[] = Order::with('games')->get()->where('order_id', '=', $subOrder['order_id'])->toArray();

            }
        }

        return view('pages.orders', ['orders' => $userOrders, 'games' => $games]);
    }


    public function order(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->order_id = $request->id;
        $order->save();

        $mail = "Имя: " . $request->name . " Почта: " . $request->email . " Номер игры: " . $request->id;

        Mail::raw($mail, function (Message $message) {
            $message->from('alex_loft90@mail.ru', 'Laravel');
            $message->to('alex-sert2010@mail.ru');
            $message->subject('GameShop');
        });
    }

    public function editGame(Request $request)
    {

        $game = Game::find($request->id);
        echo json_encode($game);
    }

    public function updateGame(Request $request)
    {


        $game = Game::find($request->id);

        $game->name = $request->name;
        $game->category = $request->category;
        $game->price = $request->price;
//        $game->image = $_FILES['image']['type'] ;
        $game->description = $request->description;
        $game->save();


    }

    public function category($post_id)
    {
        $category = Game::all()->where('category', '=', $post_id);

        return view('pages.catAction', ['categories' => $category, 'cat' => $post_id]);
    }

    public function chooseGame($post_id)
    {
        $play = Game::find($post_id);
        $game = array_slice(Game::all()->toArray(), rand(0, 20), 3);

        return view('pages.game', ['plays' => $play, 'games' => $game]);
    }

    public function getGames()
    {
        $dir = 'img/';
        $factory = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $game = new Game();
            $game->name = $factory->name();
            $game->category = rand(1, 10);
            $game->price = rand(100, 900);
            $game->image = $factory->image($dir, 350, 250, 'cats', true, true, 'Faker');
            $game->description = $factory->text($maxNbChars = 30);
            $game->save();
        }

        return "Congratulation , our shop is full !!!";
    }

    public function setGames()
    {
        $game = Game::all();

        return view('pages.orderSetting', ['games' => $game]);
    }

    public function destroy($post_id)
    {
        Game::destroy($post_id);
        return redirect('/setting');
    }

    public function create(Request $request)
    {
        $game = new Game();
        $game->name = $request->name;
        $game->category = $request->category;
        $game->price = $request->price;
        $game->image = $request->file('image')->getClientOriginalName();
        $game->description = $request->description;
        $game->save();

        return redirect('/setting');
    }
}
