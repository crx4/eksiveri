 var ajax_arry=[];
 var ajax_index =0;
 var sctp = 100;
 $(function(){
   $('#loading').show();
 $.ajax({
	     url:"../ajax/entry_feed.php",
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
	     url:"../ajax/entry_feed.php",
                  type:"POST",
                  data:"actionfunction=showData&page="+page,
        cache: false,
        success: function(response){
		   $('#ajaxscroll').find('.nextpage').remove();
		   $('#ajaxscroll').find('.isload').remove();
		   $('#loading').hide();

		  $('#ajaxscroll').append(response);

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
