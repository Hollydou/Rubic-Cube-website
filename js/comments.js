$(document).ready(function(){
	$('form#newCommentForm').submit(function(event){
		var complete = false;
		
		if($('input#commentNameInput').val() != '' && $('input#commentCourseInput').val() != '' && $('input#commentMessageInput').val() != ''){
			complete = true;
		}
		
		if(!complete){
			console.log("incomplete form");
			
			if($('input#commentNameInput').val() == ''){
				$('input#commentNameInput').addClass('error');
				$('input#commentNameInput').prev().addClass('error');
			} 
			if($('input#commentCourseInput').val() == ''){
				$('input#commentCourseInput').addClass('error');
				$('input#commentCourseInput').prev().addClass('error');
			} 
			if($('input#commentMessageInput').val() == ''){
				$('input#commentMessageInput').addClass('error');
				$('input#commentMessageInput').prev().addClass('error');
			}
			
		}else{
			console.log("complete form");
			var newComment = $('#comment_template div.comment').clone();
			var name = $('input#commentNameInput').val();
			var course = $('input#commentCourseInput').val();
			var comment = $('textarea#commentMessageInput').val();
			console.log($(newComment).find('commentName'));
			
			$(newComment).find('.commentName').text(name);
			$(newComment).find('.commentMessage').text(comment);
			$(newComment).find('.commentCourse').text(course);
			
			$(newComment).prependTo('div#commentsContainer');
		}
		event.preventDefault();
	});
	
	$('.deleteComment').click(function(){
		$(this).parent().remove();
	});
});
