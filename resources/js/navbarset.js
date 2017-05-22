function selectLink(link)
{
	var nav = $(".navbar");
	var links = nav.find(".link");
	links.removeClass("active");
	
	var linkbtn = nav.find(".link."+link);
	linkbtn.addClass("active");

}

function selectDropDown(link)
{
	var drop = $(".dropdown a."+link);
	drop.addClass("selectedDrop");
}