
$( document ).ready(function() {
	
	$( "#contactSave" ).on( "click", function() {		  

		
		if ($( "#isEdit").val()) {
			//alert("upravit");
			var apiAction = "saveEdit";
			editId = $( "#isEdit").val();
		}
		else {
			//alert("ulozit novy");
			var apiAction = "saveNew";
			editId = 0;
		}

		var someEmpty = $('input[required]').filter(function(){
			return $.trim(this.value).length === 0;
		}).length > 0;
		
		var existence = "no";
		
		if (!someEmpty && existence=="no") {			
			//alert("vse OK, postuji");
			$.ajax({
				  method: "POST",
				  url: "./api/",
				  data: { 
					action: apiAction, 
					name: $( "#name").val(), 
					surname: $( "#surname").val(), 
					phone: $( "#phone").val(), 
					email: $( "#email").val(), 
					note: $( "#note").val(),
					id: editId
				  }
				})
				  .done(function( msg ) {
					//alert( "Data Saved: " + msg );
					console.log("data ulozena");
					$( "#name").prop( "disabled", true );
					$( "#surname").prop( "disabled", true );
					$( "#phone").prop( "disabled", true );
					$( "#email").prop( "disabled", true );
					$( "#note").prop( "disabled", true );
					$( "#contactSave").html("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-check2\" viewBox=\"0 0 16 16\"><path d=\"M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z\"/></svg> Uloženo");
					$( "#contactSave").prop( "disabled", true );
					setTimeout(function () {
						   window.location.href = "./"; //will redirect to your blog page (an ex: blog.html)
					}, 2000); //will call the function after 2 secs.
					
			});
		}
		else {
			$('input[required]').each(function(){
				if($(this).val() == "") {
					$(this).addClass('is-invalid');
					$(this).removeClass('is-valid');
				}
				else {
					$(this).removeClass('is-invalid');
					$(this).addClass('is-valid');
				}
			});
		}
		
		  
		event.preventDefault();
		
	});
	
	$( ".deleteContact" ).on( "click", function() {		  
		//alert("smazat"+$( this ).data('id'));
		$( this ).closest('tr').addClass('bg-danger text-white rowReady2Delete');
		
		
		$.ajax({
			  method: "POST",
			  url: "./api/",
			  data: { 
				action: "delete", 
				id: $( this ).data('id'),
			  }
			})
			  .done(function( msg ) {
				//alert(msg);				  
			  });
		$( this ).closest('tr').fadeOut( "slow" );
		event.preventDefault();
	});
		
});
