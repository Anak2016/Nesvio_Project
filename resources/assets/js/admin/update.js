(function(){
	'use strict';
	ACMESTORE.admin.update = function(){

		//update project category
		$(".update-category").on('click',function(e){
			var token = $(this).data('token');
			var id = $(this).attr('id');
			var name = $("#item-name-"+id).val();


			$.ajax({
				type: 'POST',
				url: '/admin/product/categories/' + id + '/edit',
				data: {token:token, name:name},
				success: function(data){
					// console.log(data);
					var response = jQuery.parseJSON(data);
					// console.log(typeof(data));//string
					// console.log(typeof(response));//object
					$(".notification").css("display", "block").removeClass('primary').addClass('success').delay(4000).slideUp(300).html(response.success)
				},
				error: function(request, error){
					//responseText is message that is sent back from request.
					var errors = jQuery.parseJSON(request.responseText);
					var ul = document.createElement('ul');
					// console.log(typeof(errors));

					$.each(errors, function(key,value){
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});

					$(".notification").css("display", 'block').removeClass('primary').addClass('alert').delay(6000).slideUp(300).html(ul)
				}
			});

			// alert(token + 'and id: ' + id);
			e.preventDefault();		
		});

		//update subcategory
		$(".update-subcategory").on('click',function(e){
			var token = $(this).data('token');
			var id = $(this).attr('id');
			// var category_id = $(this).attr('category-id');
			var category_id = $(this).data('category-id');
			// var category_id = $(this).data('test');
			var name = $("#item-subcategory-name-"+ id).val();
			var selected_category_id = $('#item-category-'+category_id + ' option:selected').val();


			if(category_id !== selected_category_id){
				category_id = selected_category_id;
			}

			// console.log(category_id);
			// console.log(selected_category_id);
			// console.log(name);

			$.ajax({
				type: 'POST',
				url: '/admin/product/subcategory/' + id + '/edit',
				data: {token:token, name:name, category_id:category_id},
				success: function(data){
					// var response = JSON.parse(JSON.stringify(data));
					console.log(typeof(data));  	
					var response = jQuery.parseJSON(data);
					// console.log(typeof(data));//string
					// console.log(typeof(response));//object
					$(".notification").css("display", "block").removeClass('primary').addClass('success').delay(4000).slideUp(300).html(response.success)
				},
				error: function(request, error){
					
					//responseText is message that is sent back from request.
					var errors = jQuery.parseJSON(request.responseText);
					console.log(typeof(errors));
					// var errors = JSON.parse(JSON.stringify(data));
					var ul = document.createElement('ul');

					$.each(errors, function(key,value){
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});

					$(".notification").css("display", 'block').removeClass('primary').addClass('alert').delay(6000).slideUp(300).html(ul)
				}
			});

			// alert(token + 'and id: ' + id);
			e.preventDefault();		
		});
	};
})();