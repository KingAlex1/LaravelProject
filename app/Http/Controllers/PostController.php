<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use App\Order;
use App\User;
use Faker\Factory;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    
    public function index()
    {

        $q = Input::get('query');

        $search = Game::whereRaw(
            "MATCH(name,category) AGAINST(? IN BOOLEAN MODE)",
            array($q)
        )->get();
        $game = Game::all();
        $user = Auth::user();

         if ( !$search->isEmpty()){
             return view('pages.index', ['games' => $search, 'user' => $user, 'categories'=>
                 $this->getCategoryList()]);
         }

        return view('pages.index', ['games' => $game, 'user' => $user, 'categories'=>
            $this->getCategoryList()]);
    }

    public function about()
    {
        return view('pages.about', ['categories'=> $this->getCategoryList()]);
    }

    public function news()
    {
        return view('pages.news', ['categories'=> $this->getCategoryList()]);
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
//        echo "<pre>";
//        print_r($games);
//        die();
        return view('pages.orders', ['orders' => $userOrders, 'games' => $games, 'categories'=> $this->getCategoryList()]);
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

    public function editCategory(Request $request)
    {
        $category = Category::find($request->id);

        echo json_encode($category);

    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

    }


    public function category($post_id)
    {
        $games = Game::all()->where('category', '=', $post_id);
        $category = Category::with('games')->get()->where('category','=',$post_id);


        return view('pages.catAction', [ 'cat' => $post_id, 'games' => $games, 'categories'=>$this->getCategoryList()]);
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

        return view('pages.orderSetting', ['games' => $game, 'categories'=> $this->getCategoryList()]);
    }

    public function destroyGood($post_id)
    {
        Game::destroy($post_id);

        return redirect('/setting/goods');
    }

    public function destroyCategory($post_id)
    {
        Category::destroy($post_id);

        return redirect('/setting/categories');
    }

    public function createGood(Request $request)
    {
        $game = new Game();
        $game->name = $request->name;
        $game->category = $request->category;
        $game->price = $request->price;
        $game->image = $request->file('image')->getClientOriginalName();
        $game->description = $request->description;
        $game->save();

        return redirect('/setting/goods');
    }

    public function setCategory()
    {
        $categories = Category::all();


        return view('pages.categorySetting', ['categories' => $categories]);
    }

    public function createCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect('/setting/categories');
    }

    public function getCategoryList()
    {
        return Category::all();

    }

    public function postSearch()
    {
        $q = Input::get('query');

        $games = Game::whereRaw(
            "MATCH(name,category) AGAINST(? IN BOOLEAN MODE)",
            array($q)
        )->get();

        
        return View::make('pages.index', compact('games'));

    }
}
