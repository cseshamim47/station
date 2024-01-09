$(document).ready(function(){
		
		$("li").find("#ico").html('<span class="glyphicon glyphicon-folder-close"></span>&nbsp;');
		  $(".collapse").on("hide.bs.collapse", function(){
			$(this).parent().find("#ico").html('<span class="glyphicon glyphicon-folder-close"></span>&nbsp;');
		  });
		  $(".collapse").on("show.bs.collapse", function(){
			$(this).parent().find("#ico").html('<span class="glyphicon glyphicon-folder-open"></span>&nbsp;');
		  });
		});        
		
        function popupCenter(url, title, w, h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
 } ;;