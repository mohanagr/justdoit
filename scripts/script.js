$(function() {			//defer not working
	    $( "#accordion" ).accordion();
	 });
	 $(document).ready(function(){
	 	var count = 0;
	 	$(".heads").each(function(){
	 		var p = $(this).attr("prio");
	 		var t = $(this).attr("tdate");
	 		var n = $(this).attr("today");
	 		
	 		//alert($(this).text());
	 		if(p =="High") {
	 			$(this).css("background-color", "#ff4d4d");
	 			$(this).next(".content").css("background-color", "#ff9999");
	 		}
	 		else if (p == "Medium") {
	 			$(this).css("background-color", "#6666ff");
	 			$(this).next(".content").css("background-color", "#99a0ff");
	 		}
	 		else {
	 			$(this).css("background-color", "#47d147");
	 			$(this).next(".content").css("background-color", "#85e085");
	 		}
	 		if(t == n)
	 			count = count + 1;
	 		//alert(n);
	 		 
	 	});
	 	if(count !=0)
	 		alert("You have " + count + " unfinished tasks due TODAY!!");
	 	else
	 		alert("No tasks due today! Chill.")
	 });
	 $(document).ready(function(){
	 	$(".rem").click(function(){
		var ttle = $(this).attr('--id');
	 	var this_btn = this;
	 	if(confirm("Sure You want to get rid of this task?")) {
			$.ajax({
	 		 		type: 'POST',
	 		 		url: 'taskManager.php',
	 		 		data: {titl:ttle, Delete: true},
	 		 		success: function(E) {
	 		 			//alert(E);
	 		 			$(this_btn).parent("h3").next("div").remove(); //add fadeout
	 		 			$(this_btn).parent("h3").remove();
	 		 			alert("Task Deleted Successfully!")
	 		 		}
	 	
	 		 	}); 
		}
	 	
	 	
	 	});
	 }); 
	 $(document).ready(function(){
	 	$("#new").click(function(){
	 		$("#fm").css("display", "inline-block");
	 	});
	 });