$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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


});