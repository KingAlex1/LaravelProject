@extends('layouts.mainlayout')

@section('content')
    <div class="main-content">
        <div class="content-top">
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт
                диск, скачать Steam игры после оплаты
            </div>
            <div class="slider"><img src="../app/img/slider.png" alt="Image" class="image-main"></div>
        </div>
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
                </div>
                <div class="content-head__search-block">

                    <div class="search-container">
                        {!! Form::token(); !!}
                        {!! Form::model( ['route' =>'home', 'class' => 'search-container__form' ])!!}
                        {!! Form::text('query', null, [ 'placeholder' => 'Search query...', 'class'=> 'search-container__form__input'] ) !!}
                        {!! Form::submit('Search' , [ 'class' => 'search-container__form__btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="content-main__container">
                <div class="products-columns">
                    @foreach($games as $game)
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product"><a href="/game/{{$game->id}}"
                                                                                  class="products-columns__item__title-product__link">
                                    {{$game->name}}</a></div>
                            <div class="products-columns__item__thumbnail"><a href="/game/{{$game->id}}"
                                                                              class="products-columns__item__thumbnail__link"><img
                                            src="../{{$game->image}}" alt="Preview-image"
                                            class="products-columns__item__thumbnail__img"></a></div>
                            <div id="{{$game->id}}" class="products-columns__item__description"><span
                                        class="products-price">{{$game->price}} руб</span>

                                <button class="btn btn-blue" onClick="getElementById('win').removeAttribute
                                ('style'); "
                                        type="button">Купить
                                </button>
                            </div>
                        </div>
                    @endforeach
                    <div id="win" style="display:none;">
                        <div class="overlay"></div>
                        <div class="visible">
                            <h2 class="order-title">Форма заказа</h2>
                            <div class="content">
                                <form class="order-form" method="POST">
                                    {{--CSRF  ТООООООООООООКЕЕЕЕЕЕННННННННННННННННН--}}
                                    {{csrf_field()}}
                                    <label for="nameInput"> Ваше Имя </label>
                                    <input id="nameInput" class="order-input" type="text" name="name">
                                    <label for="emailInput"> Ваша Почта </label>
                                    <input id="emailInput" class="order-input" type="text" name="email"
                                           value= {{$user->email}} >
                                    <input id="gameID" class="order-input" type="hidden" name="id"
                                           value="">
                                    <script>
                                        var num = document.querySelector("#gameID");
                                        var buttons = document.querySelectorAll('.btn-blue');
                                        for (var i = 0; i < buttons.length; i++) {
                                            buttons[i].addEventListener('click', function (e) {
                                                var id = e.target.parentNode.getAttribute('id');
                                                num.setAttribute('value', id);
                                                console.log(id);
                                            })
                                        }


                                    </script>
                                    {{--<button onClick="getElementById('win').style--}}
                                    {{--.display='none'; " name="submit" class="order-submit"--}}
                                    {{-->Отправить--}}
                                    {{--</button>--}}
                                    <input type="submit" onClick="getElementById('win').style
                                    .display='none';" name="submit" class="order-submit"
                                           value="Подтвердить заказ">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-footer__container">
                <ul class="page-nav">
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i
                                    class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i
                                    class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
    </div>
@endsection