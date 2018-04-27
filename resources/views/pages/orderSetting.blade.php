@if(Auth::user()->credential== 'admin')
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
                    <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
                </div>
                <div class="content-head__search-block">
                    <div class="search-container">
                        <form class="search-container__form">
                            <input type="text" class="search-container__form__input">
                            <button class="search-container__form__btn">search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="cart-product-list">
                    @include('layouts.fileForm')
                    @foreach($games as $game)
                        <div class="cart-product-list__item">
                            <div class="cart-product__item__product-photo"><img
                                        src="../{{$game['image']}}"
                                        class="cart-product__item__product-photo__image">
                            </div>
                            <div class="cart-product__item__product-name">
                                <div class="cart-product__item__product-name__content"><a
                                            href="#">{{$game['name']}}</a>
                                </div>
                            </div>
                            <div class="cart-product__item__product-desc">
                                <div
                                        class="cart-product__item__product-desc__content">{{$game['description']}}
                                </div>
                            </div>

                            <div class="cart-product__item__product-price"><span
                                        class="product-price__value">{{$game['price']}} руб
                                    </span>
                            </div>
                            <div class="cart-product__set">
                                <div class="cart-product__delete">
                                    <a href="/setting/destroy/{{$game['id']}}">Delete</a>
                                </div>
                            </div>
                            <div class="cart-product__set">

                                <div class="cart-product__edit">
                                    <form class="edit-form" action="editGame" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$game['id']}}">
                                        <input type="submit" name="edit" value="Редактировать"
                                               class="edit-btn"
                                               onClick="getElementById
                                    ('win2')
                                    .removeAttribute
                                ('style');">

                                    </form>


                                </div>
                            </div>
                        </div>

                    @endforeach


                    <div id="win2" style="display:none;">
                        <div class="overlay"></div>
                        <div class="visible">
                            <h2 class="order-title">Редактирование заказа</h2>
                            <div class="content">
                                <form class="editGame-form" method="POST" action="updateGame"
                                      enctype="multipart/form-data">
                                    {{--CSRF  ТООООООООООООКЕЕЕЕЕЕННННННННННННННННН--}}
                                    {{csrf_field()}}
                                    <label for="nameInput"> Название </label>
                                    <input id="nameInput" class="order-input" type="text" name="name">
                                    <label for="categoryInput"> Категория </label>
                                    <input id="categoryInput" class="order-input" type="text"
                                           name="category">
                                    <label for="priceInput"> Цена </label>
                                    <input id="priceInput" class="order-input" type="text"
                                           name="price">
                                    {{--<label for="imageInput"> Картинка </label>--}}
                                    {{--с кортинкой проблема при передаче через ajax  картинка нет в
                                    $request--}}
                                    {{--<input id="imageInput" class="order-input" type="file"--}}
                                    {{--name="image">--}}
                                    <label for="descriptionInput"> Описание </label>
                                    <input id="descriptionInput" class="order-input" type="text"
                                           name="description">
                                    <input id="idInput" type="hidden" name="id">

                                    <input type="submit" onClick="getElementById('win2').style
                                    .display='none';" name="submit" class="order-submit"
                                           value="Изменить">
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
@endsection
@endif