 var ajax_arry=[];
 var ajax_index =0;
 var sctp = 100;
 $(function(){
   $('#loading').show();
 $.ajax({
	     url:"/ajax",
                  type:"POST",
                  data:"actionfunction=showData&page=1",
        cache: false,
        success: function(response){
		   $('#loading').hide();
		  $('#ajaxscroll').html(response);

		}

	   });
	$(window).scroll(function(){

	   var height = $('#ajaxscroll').height();
	   var scroll_top = $(this).scrollTop();
	   if(ajax_arry.length>0){
	   $('#loading').hide();
	   for(var i=0;i<ajax_arry.length;i++){
	     ajax_arry[i].abort();
	   }
	}
	   var page = $('#ajaxscroll').find('.nextpage').val();
	   var isload = $('#ajaxscroll').find('.isload').val();

	     if ((($(window).scrollTop()+document.body.clientHeight)==$(window).height()) && isload=='true'){
		   $('#loading').show();
	   var ajaxreq = $.ajax({
	     url:"/ajax",
                  type:"POST",
                  data:"actionfunction=showData&page="+page,
        cache: false,
        success: function(response){
			$('#ajaxscroll').find('.nextpage').remove();
			$('#ajaxscroll').find('.isload').remove();
			$('#loading').hide();

			$('#ajaxscroll').append(response);


			var check = $("#night-mode").prop('checked');
			if(check == true) {
				$("span.list-group-item").css({"background-color": "#333", "color": "#FFF"});
				$("body").css({"background-color": "#444"});
			} else {
				$("span.list-group-item").css({"background-color": "#FFF", "color": "#333"});
				$("body").css({"background-color": "#FFF"});
			}

		}

	   });
	   ajax_arry[ajax_index++]= ajaxreq;

	   }
	return false;

 if($(window).scrollTop() == $(window).height()) {
       alert("bottom!");
   }
	});

});
