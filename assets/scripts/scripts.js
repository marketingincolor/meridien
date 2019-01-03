jQuery(document).foundation();
/*
These functions make sure WordPress
and Foundation play nice together.
*/
jQuery(document).ready(function(){
ajaxFilterStudies();
ajaxFilterBlogs();
// Remove empty P tags created by WP inside of Accordion and Orbit
jQuery('.accordion p:empty, .orbit p:empty').remove();
// Adds Flex Video to YouTube and Vimeo Embeds
jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function(){if(jQuery(this).innerWidth()/jQuery(this).innerHeight()>1.5){jQuery(this).wrap("<div class='widescreen responsive-embed'/>");}else{jQuery(this).wrap("<div class='responsive-embed'/>");}});});

/*
Insert Custom JS Below
*/
jQuery(window).scroll(function() {
	var scroll = jQuery(window).scrollTop();
    if (scroll >= 50) {
        jQuery(".top-bar").addClass("min-padding-header");
    }
    if (scroll < 50) {
        jQuery(".top-bar").removeClass("min-padding-header");
    }
});

function ajaxFilterStudies(){
    jQuery('#filter-studies').on('click',function(e){
        e.preventDefault();
    var locations   = jQuery('#locations-select').val();
    var indications = jQuery('#indications-select').val();
    var $content    = jQuery('#results-container');
    var url         = templateURL + '/ajax-filter-studies.php';

    // if locations or indications is blank send alert and exit the function
    if (indications === null || locations === null) {
        alert('You must select both a location and indication.');
        return false;
    }

    // Show Loading Gif
    $content.html('<div class="small-12 cell text-center"><img class="loading" src="' + templateURL + '/assets/images/loading.gif" style="width:100px"></div>');

        jQuery.ajax({
            url: url,
            type: 'POST',
            data: {
                locations : locations,
                indications : indications
            },
            success: function(response) {
        $content.html(response);
      }
        });
    });
}

function ajaxFilterBlogs(){
	jQuery('#filter-blogs').on('click',function(e){
		e.preventDefault();
    var indications = jQuery('#indications-select').val();
    var $content    = jQuery('#archive-grid');
    var ajaxURL     = templateURL + '/ajax-filter-blogs.php';
    var currentURL  = location.href;
    var category;

    // if locations or indications is blank send alert and exit the function
    if (indications === null) {
    	alert('You must select an indication to filter by.');
    	return false;
    }

    // Get category based on current URL
    if (currentURL.indexOf('patient') > -1) {
        category = 'patient';
    }else{
        category = 'sponsor-cro';
    }

    // Show Loading Gif
    $content.html('<div class="small-12 cell text-center"><img class="loading" src="' + templateURL + '/assets/images/loading.gif" style="width:100px"></div>');

		jQuery.ajax({
			url: ajaxURL,
			type: 'POST',
			data: {
				indications : indications,
                category    : category
			},
			success: function(response) {
                $content.html(response);
            }
		});
	});
}
