$(document).ready(function(){
	//scroll to top
	 $(window).scroll(function() {
	    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
	        $('#return-to-top').fadeIn(200);   // Fade in the arrow
	        $("#sticker").addClass("lightheader");
	    } else {
	        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
	        $("#sticker").removeClass("lightheader");
	    }
	});

	$('#return-to-top').click(function() {      // When arrow is clicked
	    $('body,html').animate({
	        scrollTop : 0                       // Scroll to top of body
	    }, 500);
	});


	// download count

	$("#share").on('click', function() {
			var id = $(this).data('share');
			console.log(id);
			return false;

		});


	$("#like").on('click', function() {
		var pdfId = $(this).data('pdfid');
		var userId = $(this).data('userid');

		console.log(pdfId);
		console.log(userId);
		$.ajax({
			url:"ajax/countLike.php",
			type:"POST",
			dataType:"text",
			data:{"pdfId":pdfId,"userId":userId},
			success:function(data){
				console.log(data);
				$("#likecount").html(data);
				$("#like").css('display', 'none');
				$("#dislike").css('display', 'inline-block');
			}
		});
		//return false;
	});

	$("#dislike").on('click', function() {
		var pdfId = $(this).data('pdfid');
		var userId = $(this).data('userid');

		console.log(pdfId);
		console.log(userId);
		$.ajax({
			url:"ajax/countDislikes.php",
			type:"POST",
			dataType:"text",
			data:{"pdfId":pdfId,"userId":userId},
			success:function(data){
				console.log(data);
				//console.log(data);
				$("#dislikecount").html(data);
				$("#like").css('display', 'inline-block');
				$("#dislike").css('display', 'none');
				
			}
		});
		//return false;
	});

	$("#love").on('click', function() {
		var pdfId = $(this).data('pdfid');
		var userId = $(this).data('userid');

		console.log(pdfId);
		console.log(userId);
		$.ajax({
			url:"ajax/countLove.php",
			type:"POST",
			dataType:"text",
			data:{"pdfId":pdfId,"userId":userId},
			success:function(data){
				console.log(data);
				//console.log(data);
				$("#lovecount").html(data);
				$("#love").css('display', 'none');
			}
		});
		//return false;
	});

	$("#pdfDownloadtrigger").on('click', function() {
		var pdfId = $(this).data('pdfid');
		var userId = $(this).data('userid');

		console.log(pdfId);
		console.log(userId);
		$.ajax({
			url:"ajax/downloadCount.php",
			type:"POST",
			dataType:"text",
			data:{"pdfId":pdfId,"userId":userId},
			success:function(data){
				console.log(data);
				console.log(data);
				$("#downloadcount").html(data);
			}
		});
		//return false;
	});

	$("#searchquery").on('keyup', function() {
		var query = $(this).val();
		console.log(query);
		if (query !='') {
			$.ajax({
			url:"ajax/searchQueryajax.php",
			type:"POST",
			dataType:"text",
			data:{"query":query},
			success:function(data){
				console.log(data);
				$("#searchqueryresult").fadeIn();
				$("#searchqueryresult").html(data);
				}
			});
		}
		//return false;
	});
	$(document).on('click','li',function(){
		$('#searchquery').val($(this).text());
		$('#searchqueryresult').fadeOut();
	});
	
	

	/*$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 50) {
        //clearHeader, not clearheader - caps H
        $("#sticker").addClass("lightheader");
    }
	}); */





	   
  });
