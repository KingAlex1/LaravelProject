$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Main

    $(".order-form").submit(function () {
        $.ajax({
            type: "POST",
            url: "order",
            data: $(this).serialize()
        }).done(function () {

            $(this).find("input").val("");
            alert("Ваш заказ добавел в корзину. Спасибо !");
            $(".order-form").trigger("reset");
        });
        return false;
    });

    //Godds

    $(".edit-form").submit(function () {
        $.ajax({
            type: "POST",
            url: "editGame",
            data: $(this).serialize()
        }).done(function (data) {
            console.log(data);
            $game = JSON.parse(data);
            $("#nameInput").val($game.name);
            $("#categoryInput").val($game.category);
            $("#priceInput").val($game.price);
            $("#descriptionInput").val($game.description);
            $("#idInput").val($game.id);
        });
        return false;
    });

    $(".editGame-form").submit(function () {

        $.ajax({
            type: "POST",
            url: "updateGame",
            data: $(this).serialize()
        }).done(function () {
            $(this).find("input").val("");
            alert("Игра отредактирована");
            $(".editGame-from").trigger("reset");
            location.reload();
        });
        return false;
    });

    // Category

    $(".edit-form_cat").submit(function () {
        $.ajax({
            type: "POST",
            url: "editCategory",
            data: $(this).serialize()
        }).done(function (data) {
            console.log(data);
            $category = JSON.parse(data);
            $("#nameInput").val($category.name);
            $("#descriptionInput").val($category.description);
            $("#idInput").val($category.id);
        });
        return false;
    });

    $(".editCategory-form").submit(function () {

        $.ajax({
            type: "POST",
            url: "updateCategory",
            data: $(this).serialize()
        }).done(function () {
            $(this).find("input").val("");
            alert("Категория отредактирована");
            $(".editCategory-form").trigger("reset");
            location.reload();
        });
        return false;
    });


});