// JS + jQuery (input file)
$('.input-file input[type=file]').on('change', function(){
	let file = this.files[0];
	$(this).closest('.input-file').find('.input-file-text').html(file.name);
});

// ПРЕДВАРИТЕЛЬНЫЙ ПОКАЗ ИЗОБРАЖЕНИЯ
function readURL(input) {

	if (input.files && input.files[0]) {
		 var reader = new FileReader();

		 reader.onload = function (e) {
			  $('#conclusion').attr('src', e.target.result);
			  $('.preview span').css('display', 'none');
		 }

		 reader.readAsDataURL(input.files[0]);
	}
}

$("#main-input-file").change(function(){
	readURL(this);
});

