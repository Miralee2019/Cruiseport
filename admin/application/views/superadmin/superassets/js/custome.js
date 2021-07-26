	$(document).ready(function () {
$("#btn1").bind("click" , function(){

		$("#zip_file_import").click();
	});

	function formSubmit() {
		var fullpath = document.getElementById("zip_file_import").value;
		var backslash=fullpath.lastIndexOf("\\");
		var filename = fullpath.substr(backslash+1);

		var confirm_message = confirm("Files selected for import are \n: "+filename+"\n\nDo you want to proceed?");
		if (confirm_message==false) {
			return false;
		} else {
			document.getElementById("import_form").submit();
			document.body.style.cursor = "wait";
		}
	}
	$("#zip_file_import").on('change', function () {

				       //Get count of selected files
				       var countFiles = $(this)[0].files.length;

				       var imgPath = $(this)[0].value;
				       var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
				       var image_holder = $("#image");
				       image_holder.empty();

				       if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "doc"  || extn == "txt" || extn == "wmv") {
				       	if (typeof (FileReader) != "undefined") {

				               //loop for each file selected for uploaded.
				               for (var i = 0; i < countFiles; i++) {

				               	var reader = new FileReader();
				               	reader.onload = function (e) {
				               		$("<img />", {
				               			"src": e.target.result,
				               			"class": "thumb-image img-responsive"
				               		}).appendTo(image_holder);
				               	}

				               	image_holder.show();
				               	reader.readAsDataURL($(this)[0].files[i]);
				               }

				           } 
				       } 
				       /* });*/

				   });
	   });
	
	$(document).ready(function () {
		$(".btn-select").each(function (e) {
			var value = $(this).find("ul li.selected").html();
			if (value != undefined) {
				$(this).find(".btn-select-input").val(value);
				$(this).find(".btn-select-value").html(value);
			}
		});
	});

	$(document).on('click', '.btn-select', function (e) {
		e.preventDefault();
		var ul = $(this).find("ul");
		if ($(this).hasClass("active")) {
			if (ul.find("li").is(e.target)) {
				var target = $(e.target);
				target.addClass("selected").siblings().removeClass("selected");
				var value = target.html();
				$(this).find(".btn-select-input").val(value);
				$(this).find(".btn-select-value").html(value);
			}
			ul.hide();
			$(this).removeClass("active");
		}
		else {
			$('.btn-select').not(this).each(function () {
				$(this).removeClass("active").find("ul").hide();
			});
			ul.slideDown(300);
			$(this).addClass("active");
		}
	});

	$(document).on('click', function (e) {
		var target = $(e.target).closest(".btn-select");
		if (!target.length) {
			$(".btn-select").removeClass("active").find("ul").hide();
		}
	});
