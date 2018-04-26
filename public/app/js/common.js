$(document).ready(function() {

	$(".order-form").submit(function() {
		$.ajax({
			type: "POST",
			url: "order",
			data: $(this).serialize()
		}).done(function() {

			 $(this).find("input").val("");
			alert("Ваш заказ добавел в корзину. Спасибо !");
			 $(".order-form").trigger("reset");
		});
		return false;
	});
	
});