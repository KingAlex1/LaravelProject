@if(Auth::user()->credential== 'admin')
    @extends('layouts.mainlayout')
@section('content')
    <div class="main-content">
        <div class="title-content"> Настройки катеригорий</div>
        <div class="content-middle">

            <div class="content-main__container">
                <div class="cart-product-list">
                    @include('layouts.formCategory')
                    @foreach($categories as $category)
                        <div class="cart-product-list__item">

                            <div class="cart-product__item__product-name">
                                <div class="cart-product__item__product-name__content"><a
                                            href="#">{{$category->name}}</a>
                                </div>
                            </div>
                            <div class="cart-product__item__product-desc">
                                <div
                                        class="cart-product__item__product-desc__content">{{$category->description}}
                                </div>
                            </div>
                            <div class="cart-product__set">
                                <div class="cart-product__delete">
                                    <a href="/setting/category/destroy/{{$category->id}}">Delete</a>
                                </div>
                            </div>
                            <div class="cart-product__set">

                                <div class="cart-product__edit">
                                    <form class="edit-form_cat" action="editCategory" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$category->id}}">
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
                                <form class="editCategory-form" method="POST" action="updateCategory"
                                      enctype="multipart/form-data">
                                    {{--CSRF  ТООООООООООООКЕЕЕЕЕЕННННННННННННННННН--}}
                                    {{csrf_field()}}
                                    <label for="nameInput"> Название </label>
                                    <input id="nameInput" class="order-input" type="text" name="name">

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
                {{ $categories->links('layouts.paginate') }}
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection
@endif