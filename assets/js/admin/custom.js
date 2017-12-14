jQuery.fn.reset = function () {
	$(this).each (function() {
  		this.reset();
  	});
}

$(document).ready(function(){
	$('.eliminar').click(function(){
		var id = $(this).attr("data-id");
		$.post('eliminar.php',{'id' : id}, function(data) {
            console.log(data);
            alert("Elemento eliminado.");
			$("tr#"+id).slideUp();
		});
	});

});