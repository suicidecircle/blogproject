"use strict";
window.onload = function() {
	var currentPage = 0;
	//Getting the page number for currentPage if it's saved in localStorage, else it will set the currentpage to 0
	//currentPage = JSON.parse(localStorage.pagenumber);
	currentPage = JSON.parse(localStorage.getItem('page-number'));	
	if (currentPage == null){
		currentPage = 0;
	}	
	//EVENT LISTENERS for next/prev page buttons	
	document.getElementById('previousPage').addEventListener("click", function(){changePage(this.id);});
	document.getElementById('nextPage').addEventListener("click", function(){changePage(this.id);});

	var pages = {};	
	var blogPosts = [];


	//Changes page on button click
	function changePage(elementId){						
			if (elementId === "nextPage"){				
				currentPage += 1;				
			}else if (elementId === "previousPage"){
				currentPage -= 1;
			}		
			displayPosts();
			resetPosition();
	}

	//resets users position to top of the page when button is clicked.
	function resetPosition() {		
		var body = $("html, body");
		body.stop().animate({scrollTop:0}, 500, 'swing', function(){});
	}
	
	//shortens the post and adds "read more to the end."
	function shortenBlogposts() {
		$('.content-area').each(function(i, obj){
			let div = $(obj);
			let postId = div.attr('id');			
			div.html(div.text().substring(0,700) +  "" + "<a class='read-more' href=readpost.php?pid=" + postId + ">Read more</a>")
		});		
	}
	

	
	
	function createPostLayout(currentPage, contentsRight, i){
		
		//store the currentpage to localStorage
		localStorage.setItem('page-number', JSON.stringify(currentPage));
				
		
		contentsRight.innerHTML += "<div class='blog-post'>";					
		$('#right-contents').append("<div class='blog-title-area'><h1><a class='blog-titles' href='readpost.php?pid="+blogStuff.ids[i]+"'>" + blogStuff.headers[i] + "</h1></div>");
		contentsRight.innerHTML += "<div class='post-date'>posted: "+ blogStuff.dates[i] + "<br></div>";
		contentsRight.innerHTML += "<div class='content-area' id='"+ blogStuff.ids[i]+ "'>"+ blogStuff.bodies[i] + "</div>";
		contentsRight.innerHTML += "<div class='post-tag'>"+ blogStuff.tags[i] + "</div>";
		contentsRight.innerHTML +="</div>";			
	}
	
	
	function createLeftpanel(leftLinks){
		
		var postMonths = [];
		for (var i= 0; i < cont.archiveTime.length; i++){
			postMonths.push(cont.archiveTime[i]);
			var timelines = postMonths.filter(function(i, time, self){
				return time == self.indexOf(i); 
			});			
		}
		
		for (var i = 0; i < timelines.length; i++){
			leftLinks.innerHTML += "<div class='ArchiveTimelines'>"+timelines[i]+"</div>";
		}

		for (var i = 0; i < cont.allHeaders.length; i++){			
			console.log(timelines[i]);
			//leftLinks.innerHTML += "<div><a class='leftLinks' href='readpost.php?pid="+allIds[i]+"'>" + allHeaders[i] + "</div>";
			if(cont.archiveTime[i] == timelines[0]){
				leftLinks.childNodes[0].innerHTML += "<div><a class='leftLinks' href='readpost.php?pid="+cont.allIds[i]+"'>" + cont.allHeaders[i] + "</div>";
			} else if(cont.archiveTime[i] == timelines[1]){
				leftLinks.childNodes[1].innerHTML += "<div><a class='leftLinks' href='readpost.php?pid="+cont.allIds[i]+"'>" + cont.allHeaders[i] + "</div>";
			}
			
		}					
		
	}
	
	
	//creates content divs and displays the blogposts.
	function displayPosts(){
		
		var contentsRight = document.getElementById("right-contents"),
			nextPage = document.getElementById("nextPage"),
			previousPage = document.getElementById("previousPage"),
			leftLinks = document.getElementById("links-left");
			
		var contentRight = $('#right-contents');				
		leftLinks.innerHTML="";
		
		
		
		createLeftpanel(leftLinks);		
		
		
		switch(currentPage){			
			case 0:				
				previousPage.classList.add("hiddenButton");
				nextPage.classList.remove("hiddenButton");	
				
				localStorage.setItem('page-number', JSON.stringify(currentPage));				
				contentsRight.innerHTML = "";
				for(var i = 0; i < (blogStuff.headers.length/2); i++){										
					createPostLayout(currentPage, contentsRight, i);					
				}							
				shortenBlogposts();
			break;			
			
			case 1:	
				
				previousPage.classList.remove("hiddenButton");
				nextPage.classList.add("hiddenButton");								
				
				localStorage.setItem('page-number', JSON.stringify(currentPage));				
				contentsRight.innerHTML = "";
				
				for(var i = Math.round(headers.length/2); i <headers.length; i++){
					createPostLayout(currentPage, contentsRight, i);					
				}									
				shortenBlogposts();			
			break;
		}	
	}
	displayPosts();
};