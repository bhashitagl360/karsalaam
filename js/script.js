
$.noConflict();
jquery(document).ready(function(e) {
	if((screen.width>=1279)) {
		jquery('#container').masonry({
			itemSelector: '.box',
			columnWidth:360   
		});
	} else if ((screen.width>1000))  {
		jquery('#container').masonry({
			itemSelector: '.box',
			columnWidth:41   
		});
	} else if ((screen.width<1000))  {
		jquery('#container').masonry({
			itemSelector: '.box',
			columnWidth:41   
		});
	} else if ((screen.width<=800)) {

		jquery('#container').masonry({
				itemSelector: '.box',
				columnWidth:40   
			});
	} else if ((screen.width<=767))  { 
		jquery('#container').masonry({
			itemSelector: '.box',
			columnWidth:360   
		});
	} 
});
