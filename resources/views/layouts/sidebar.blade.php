<div class="sidebar">
    <div class="sidebar-item">
        <div class="sidebar-item__title">Категории</div>
        <div class="sidebar-item__content">
            <ul class="sidebar-category">

                @foreach($categories as $category)

                    <li class="sidebar-category__item"><a href="/category/{{$category->name}}"
                                                          class="sidebar-category__item__link">{{$category->name}}</a></li>

                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-item">
        <div class="sidebar-item__title">Последние новости</div>
        <div class="sidebar-item__content">
            <div class="sidebar-news">
                <div class="sidebar-news__item">
                    <div class="sidebar-news__item__preview-news"><img src="../app/img/cover/game-2.jpg"
                                                                       alt="image-new"
                                                                       class="sidebar-new__item__preview-new__image">
                    </div>
                    <div class="sidebar-news__item__title-news"><a href="#"
                                                                   class="sidebar-news__item__title-news__link">О
                            новых играх в режиме VR</a></div>
                </div>
                <div class="sidebar-news__item">
                    <div class="sidebar-news__item__preview-news"><img src="../app/img/cover/game-1.jpg"
                                                                       alt="image-new"
                                                                       class="sidebar-new__item__preview-new__image">
                    </div>
                    <div class="sidebar-news__item__title-news"><a href="#"
                                                                   class="sidebar-news__item__title-news__link">О
                            новых играх в режиме VR</a></div>
                </div>
                <div class="sidebar-news__item">
                    <div class="sidebar-news__item__preview-news"><img src="../app/img/cover/game-4.jpg"
                                                                       alt="image-new"
                                                                       class="sidebar-new__item__preview-new__image">
                    </div>
                    <div class="sidebar-news__item__title-news"><a href="#"
                                                                   class="sidebar-news__item__title-news__link">О
                            новых играх в режиме VR</a></div>
                </div>
            </div>
        </div>
    </div>
</div>