// $('.block-menu').find('a').each(function(){

//   var el = $(this),
//        elText = el.text();
  
//   el.addClass("three-d");
//   el.append('<span aria-hidden="true" class="three-d-box"><span class="front">'+elText+'</span><span class="back">'+elText+'</span></span>');

// });

// // console.log('custom script loaded');
// //Checks if email exists
// $(document).ready(function(){
// 	$("#register").prop("disabled", true);

// 	$("#email").on("blur", function(){
// 		 var email = $(this).val();
// 		 $.ajax({
// 		 	url:"./lib/validate_email.php",
// 		 	method:"POST",
// 		 	data:{"email": email},
// 		 	success:function(data){
// 		 		$("#mail_avail").html(data);
// 		 	}
// 		 });
// 	});

// 	//Checks if username exist
// 	$("#username").on("keyup", function(){
// 		var uname = $(this).val();
// 		$.ajax({
// 			url:"./lib/validate_user.php",
// 		 	method:"POST",
// 		 	data:{"uname": uname},
// 		 	success:function(data){
// 		 		$("#user_avail").html(data);
// 		 	}
// 		});
// 	});

// 	//Check if password length is > 8 characters
// 	$('#password').on("keyup", function(){
// 		var pass = $(this).val();
// 		if(pass.length < 8 && pass != ""){
// 			$("#pwlength").html("Password too short");
// 		} else {
// 			$('#pwlength').html("Password length is valid");
// 		}
// 	});

// 	//Checks if password and confirm password matches
// 	$("#confirmpw").on("keyup", function(){
// 		var pword = $("#password").val();
// 		var confirmpw = $(this).val();
// 		if(pword == confirmpw){
// 			$("#match").html("Password matched");
// 		} else {
// 			$("#match").html("Password mismatched");
// 		}
// 	});

// 	// $.each("#itemQuantity, #price").click(function(){
// 	// 	var num1 = $('#itemQuantity').val();
// 	// 	var num2 = $('#price').val();
// 	// 	var num3 = num1 * num2;
		
// 	// 	$("#subtotal").val(num3);
// 	// 	$("#cart_item").html(num3);

// 	// });


// 	//Use an event to check if the field is filled out
// 	$("#email, #username, #password, #confirmpw").on("blur", function(){
// 		var usermsg = $("#user_avail").html();
// 		var emailmsg = $("#mail_avail").html();
// 		var pwmsg = $("#pwlength").html();
// 		var confmsg = $("#match").html();

// 		if(usermsg == "Username available" &&
// 			emailmsg == "Email available" &&
// 			pwmsg == "Password length is valid" &&
// 			confmsg == "Password matched"){
// 			$("#register").prop("disabled", false);
// 		} else {
// 			$("#register").prop("disabled", true);
// 		}
// 	});

// });
// 	function addToCart(itemId){
// 		var id = itemId;
// 		var quantity = $('#itemQuantity' + id).val();
// 		// console.log("item id is " + id);
// 		// console.log("quantity ordered is " + quantity);
// 		$.ajax({
// 			url:"./lib/add_to_cart.php",
// 			method:"POST",
// 			data:{"item_id":id, "item_quantity":quantity},
// 			success:function(data){
// 				$('a[href="./cart.php"]').html(data);
// 			}
// 		});
// 	}

// 	function updateCart(cartId){
// 		var total_sum = 0;
// 		var id = cartId;
// 		var cart_item_quant = $('#itemQuantity' + id).val();
// 		var cartItem_price = $('#price' + id).val();
// 		var subTotal = $('#subtotal' + id).val();
// 		//Updates subtotal of chosen item and Total Price Display
// 		$.ajax({
// 			url:"./lib/update_subtotal.php",
// 			method:"POST",
// 			data:{"cartItem_id":id, "cartQty":cart_item_quant, "cartPrice":cartItem_price},
// 			success:function(data){
// 				$('#subtotal'+id).val(data);

// 				$('.subtotal').each(function(){

// 					total_sum += parseInt(this.value);
// 				});

// 				total_sum = Number(total_sum).toLocaleString();
				
// 				$('#total_price').html(total_sum);
// 			}
// 		});

// 		//Updates Cart Quantity Display
// 		$.ajax({
// 			url:"./lib/update_cart_quantity.php",
// 			method:"POST",
// 			data:{"cartItem_id":id, "cartQty":cart_item_quant, "cartPrice":cartItem_price},
// 			success:function(data){
// 				$('a[href="./cart.php"]').html(data);
// 			}
// 		});

// 		// $.ajax({
// 		// 	url:"./lib/update_totalprice.php",
// 		// 	method:"POST",
// 		// 	data:{"cartItem_id":id, "cartQty":cart_item_quant, "cartPrice":cartItem_price, "sub_total_price":subTotal},
// 		// 	success:function(data){
// 		// 		$('#total_price').html(data);	//please work this out for total price to change as well
// 		// 	}
// 		// });

// 	}

// 	function removeFromCart(cartId){
// 		var id = cartId;
// 		var cart_item_quant = $('#itemQuantity' + id).val();
// 		var cart_total = $('#total_price').html();
// 		// var cartItem_price = $('#price' + id).val();
// 		// var subTotal = $('#subtotal' + id).val();

// 		$.ajax({
// 			url:"./lib/delete_cart.php",
// 			method:"POST",
// 			data:{"cartItem_id":id},
// 			success:function(data){
// 				$('#cartTotalPrice').html("Deleted Cart Item!");

// 				if(data == 0){
// 					$('#cart-tbl').hide();
// 				}
// 			}
// 		});

// 	}