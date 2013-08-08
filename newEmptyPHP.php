<html>
    <head>
        <style rel="stylesheet" type="text/css">
            /****************************
* Tabs
****************************/
.tabs {
  margin:16px 0;
}
.tabs-control {
  list-style: none;
  display:table;
  border-collapse:collapse;
  width:100%;
  padding: 0;
  margin: 0;
}
.tabs-control li {
  line-height: 130%;
  display:table-cell;
  border:1px solid rgba(0,0,0,0.08);
  border-bottom:0;
  font-size: 115%;
}
.tabs-control li a {
  display: block;
  padding: 11px 12px 8px;
  color: inherit;
  text-decoration:none;
  
	background:rgba(0,0,0,0.02);
  background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.04) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.04)));
  background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.04) 100%);
  background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.04) 100%);
  background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.04) 100%);
  background: linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.04) 100%);
  
  border-bottom:1px solid rgba(0,0,0,0.08);
  
  -webkit-box-shadow:inset 1px 0 0 0 rgba(255,255,255,0.5);
  -moz-box-shadow:inset 1px 0 0 0 rgba(255,255,255,0.5);
  box-shadow:inset 1px 0 0 0 rgba(255,255,255,0.5);
  
  -webkit-transition: background-color 0.3s;
  -moz-transition: background-color 0.3s;
  -o-transition: background-color 0.3s;
  transition: background-color 0.3s;
}
.tabs-control li a:hover {
	background-color:rgba(0,0,0,0.02);
}
.tabs-control li a.active, .tabs-control li a.active:hover {
  position: relative;
  z-index: 1;
  border-color:transparent;
  background:none;
}
.tabs-tabs {
	border:1px solid #eee;
	border-color:rgba(0,0,0,0.1);
	border-top:0;
  
  clear: left;
  margin: 0;
  position: relative;
}
.tabs-tabs  > * {
  display: none;
}
.tabs-tabs .tabs-tab {
  display: none;
  padding: 1px 12px;
}
.tabs-tabs .tabs-tab:after {
  content: '';
  clear: both;
  height: 0;
  overflow: hidden;
}
.tabs-tabs .tabs-tab:first-child {
  display: block;
}

.dark-panes-bg .tabs-control li {
  border-color:rgba(255,255,255,0.2);
}
.dark-panes-bg .tabs-control li a {
  background:rgba(255,255,255,0.1);
  background: -moz-linear-gradient(top, rgba(255,255,255, 0.1) 0%, rgba(255,255,255, 0.2) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255,255,255, 0.1)), color-stop(100%, rgba(255,255,255, 0.2)));
  background: -webkit-linear-gradient(top, rgba(255,255,255, 0.1) 0%, rgba(255,255,255, 0.2) 100%);
  background: -o-linear-gradient(top, rgba(255,255,255, 0.1) 0%, rgba(255,255,255, 0.2) 100%);
  background: -ms-linear-gradient(top, rgba(255,255,255, 0.1) 0%, rgba(255,255,255, 0.2) 100%);
  background: linear-gradient(top, rgba(255,255,255, 0.1) 0%, rgba(255,255,255, 0.2) 100%);

  border-bottom:1px solid rgba(255,255,255,0.1);

  -webkit-box-shadow:inset 1px 0 0 0 rgba(0,0,0,0.5);
  -moz-box-shadow:inset 1px 0 0 0 rgba(0,0,0,0.5);
  box-shadow:inset 1px 0 0 0 rgba(0,0,0,0.5);

}
.dark-panes-bg .tabs-control li a:hover {
    background-color:rgba(255,255,255,0.02);
}

.dark-panes-bg .tabs-control li a.active, .tabs-control li a.active:hover {
  border-color:transparent;
  background:none;
}

.dark-panes-bg .tabs-tabs {
    border-color:rgba(255,255,255,0.2);
}
            
        </style>
    </head>
    <body>
<div class="two-third">
    <h1>Say goodbye to IT headaches with Greenlight’s Managed IT Services.</h1>
    <p>Greenlight provide managed IT Support Services in Sydney and Melbourne, using a remote monitoring and management (RMM) platform to proactively monitor the health and performance of your IT network – without any kind of disruption to your employees’ activities.</p>
    <p>Our robust RMM platform supports early detection and remediation of issues before they cause downtime or data loss. We will also generate regular reports that provide insight into your IT system, including the business value and services being received, which will help you plan and budget for future IT expenses.</p>
    <p><div class="tabs">
        <ul class="tabs-control">
            <li><a href="#tab-it-support"><span>IT Support</span></a></li>
            <li><a href="#tab-co-managed-it"><span>Co-Managed IT</span></a></li>
            <li><a href="#tab-office-migrations"><span>Office Migrations</span></a></li>
            <li><a href="#tab-backup-disaster-recovery"><span>Backup &amp; Disaster Recovery</span></a></li>
            <li><a href="#tab-equipment-financing"><span>Equipment Financing</span></a></li>
        </ul>
        <div class="tabs-tabs"> 
            <div class="tabs-tab tab-it-support"></p>
                <div class="column1of2">
                    <h3>What are Managed IT Support Services?</h3>
                    <p>Technology support for your entire business for a flat monthly fee. Features include:</p>
                    <ul>
                        <li>Technical user support</li>
                        <li>Managed servers</li>
                        <li>Mobile Device Management (MDM)</li>
                        <li>Network Management and Support</li>
                        <li>Printer Support</li>
                        <li>Data Backup and Recovery</li>
                    </ul>
                </div>
                <div class="column2of2">
                    <h3>You’ll receive:</h3>
                    <ul>
                        <li>No contract peace of mind</li>
                        <li>Australian owned and operated</li>
                        <li>Service Level Agreement Quality Guarantee</li>
                        <li>Custom solutions tailored to YOUR business</li>
                        <li>Remote Management and Monitoring help us proactively safeguard your systems and infrastructure</li>
                        <li>Monthly reports</li>
                    </ul>
                </div>
                <p><br style="clear: both;"/><br/>
                    <a class="fullwidthlink" href="http://www.greenlight-itc.com/portfolio/it-support-sydney/"><span>Learn more about Managed IT Support</span></a><br/>
            </div><br/>
            <div class="tabs-tab tab-co-managed-it"></p>
                <div class="column1of2">
                    <h3>What is Co-Managed IT?</h3>
                    <p>We can work with your existing IT team to deliver:</p>
                    <ul>
                        <li>Full support for hosted applications and servers</li>
                        <li>IT Strategy and Consulting</li>
                        <li>On-site and Remote support for your hardware and software</li>
                    </ul>
                </div>
                <div class="column2of2">
                    <h3>You’ll receive:</h3>
                    <ul>
                        <li>Competitively priced hardware and software by leveraging our buying power</li>
                        <li>Flexibility in what aspects of your business we assist</li>
                        <li>Immediate access to additional IT services if and when you need them</li>
                        <li>Professional support ticketing system, with our service level agreement guarantee</li>
                        <li>Outsource simple tasks like desktop rollouts or complex Enterprise Server Builds</li>
                    </ul>
                </div>
                <p><br style="clear: both;"/><br/>
                    <a class="fullwidthlink" href="http://www.greenlight-itc.com/portfolio/co-managed-it/">Learn more about Co-Managed IT</a><br/>
            </div><br/>
            <div class="tabs-tab tab-office-migrations"></p>
                <div class="column1of2">
                    <h3>What are Office Relocation Services?</h3>
                    <p>Whether you are upsizing or downsizing, office relocations can be a nightmare. Let us help make your move easy and trouble free. We can manage the entire move from end to end, or simply work with your team to make sure you do not lose any data and make the most of your new office.</p>
                </div>
                <div class="column2of2">
                    <h3>You’ll receive:</h3>
                    <ul>
                        <li>Over a decade of experience in relocating IT infrastructure</li>
                        <li>Technical expertise to ensure network and telephony cabling are correctly planned and installed</li>
                        <li>A dedicated project manager to plan and implement the entire move</li>
                    </ul>
                </div>
                <p><br style="clear: both;"/><br/>
                    <a class="fullwidthlink" href="http://www.greenlight-itc.com/portfolio/office-relocation/">Learn more about Office Migration</a><br/>
            </div></p>
            <p><div class="tabs-tab tab-backup-disaster-recovery"></p>
                <div class="column1of2">
                    <h3>What is Backup &amp; Disaster Recovery?</h3>
                    <p>We are often so preoccupied with growing our businesses that we overlook how valuable data is to our business. While a lot of our data is stored in the cloud, we also have hundreds (or thousands) of business critical data stored on our computers worth both time and money. Let us help you safeguard and recover lost data.  Benefits include:</p>
                </div>
                <div class="column2of2">
                    <h3>You&#8217;ll receive:</h3>
                    <ul>
                        <li><strong>Peace of Mind</strong> – Know your data is safeguarded from hardware failures and accidental deletions</li>
                        <li><strong>Disaster Proof</strong> – Protect your business from power outages or natural disasters</li>
                        <li><strong>Business Asset</strong> – Disaster Recovery plans add to the value of your business</li>
                        <li><strong>Improve redundancy</strong> &#8211; Get to work quickly when purchasing new hardware</li>
                    </ul>
                </div>
                <p><br style="clear: both;"/><br/>
                    <a class="fullwidthlink" href="http://www.greenlight-itc.com/portfolio/backups-and-disaster-recovery/">Learn more about Backup &amp; Disaster Recovery</a><br/>
            </div></p>
            <p><div class="tabs-tab tab-equipment-financing"></p>
                <div class="column1of2">
                    <h3>What is Equipment Financing?</h3>
                    <p>If your business is growing, but you need the cashflow to finance hardware, software or even services&#8211; we can help you. Small and medium businesses are often constrained by their cashflow, and need to manage it intelligently to better project for future growth.</p>
                    <p>Equipment financing streamlines your business by removing the need for large capital costs, while providing the latest hardware to support your workforce.</p>
                </div>
                <div class="column2of2">
                    <h3>You&#8217;ll receive:</h3>
                    <ul>
                        <li><strong>Custom plans</strong> – we can customise financing that fits with your business goals</li>
                        <li><strong>Microsoft Financing</strong> – better manage the cost of your licensing requirements</li>
                        <li><strong>Easy access</strong> – unlike major financial institutions, Greenlight provide fewer barriers to financing to the right clients</li>
                    </ul>
                </div>
                <p><br style="clear: both;"/><br/>
                    <a class="fullwidthlink" href="http://www.greenlight-itc.com/portfolio/equipment-finance/">Learn more about Equipment Financing</a><br/>
            </div></p>
            <p>
        </div>
        <div class="clear"></div>
            
    </div></p>
</div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
    <script>
        jQuery(document).ready(function(){
	
	if(!jQuery.browser)
		jQuery.browser=browser_detect();
	
	if(jQuery.browser.msie && jQuery.browser.version < 8)
		return;
	
	if(jQuery.browser.webkit || jQuery.browser.chrome || jQuery.browser.safari)
		jQuery('body').addClass('webkit');
	else if(jQuery.browser.msie)
		jQuery('body').addClass('msie');
	else if(jQuery.browser.mozilla)
		jQuery('body').addClass('mozilla');
		
	if(jQuery.browser.msie && jQuery.browser.version == 8)
		jQuery('img').removeAttr('width').removeAttr('height');
		
	if(!!('ontouchstart' in window))
		jQuery('body').addClass('touch');
	else
		jQuery('body').addClass('no-touch');

	jQuery('.portfolio-small-preview .pic a').prepend('<span class="before" />');
		
	jQuery('.big-slider-slide, .flickr_badge_image a').append('<span class="after" />');
	
	responsiveListener_init();

	menu_init();
	
	gallery_init();
		
	slider_init();
	
	logos_init();
	
	testimonials_init();
	
	comments_init();
	
	isotope_init();
	
	lightbox_init();
	
	thumbs_masonry_init();
	
	tooltips_init();
	
	toggle_init();
	
	tabs_init();

	contact_form_init();
	
	sort_menu_init();
	
	//sidebar_slide_init();

	fix_placeholders();	
});

/***********************************/

function fix_placeholders() {
	
	var input = document.createElement("input");
  if(('placeholder' in input)==false) { 
		jQuery('[placeholder]').focus(function() {
			var i = jQuery(this);
			if(i.val() == i.attr('placeholder')) {
				i.val('').removeClass('placeholder');
				if(i.hasClass('password')) {
					i.removeClass('password');
					this.type='password';
				}			
			}
		}).blur(function() {
			var i = jQuery(this);	
			if(i.val() == '' || i.val() == i.attr('placeholder')) {
				if(this.type=='password') {
					i.addClass('password');
					this.type='text';
				}
				i.addClass('placeholder').val(i.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
			jQuery(this).find('[placeholder]').each(function() {
				var i = jQuery(this);
				if(i.val() == i.attr('placeholder'))
					i.val('');
			})
		});
	}
}

/***********************************/

function browser_detect() {
	
	var matched, browser;

	ua = navigator.userAgent.toLowerCase();

	var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
		/(webkit)[ \/]([\w.]+)/.exec( ua ) ||
		/(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
		/(msie) ([\w.]+)/.exec( ua ) ||
		ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
		[];

	matched = {
		browser: match[ 1 ] || "",
		version: match[ 2 ] || "0"
	};

	browser = {};

	if ( matched.browser ) {
		browser[ matched.browser ] = true;
		browser.version = matched.version;
	}

	if ( browser.webkit ) {
		browser.safari = true;
	}

	return browser;
}

/***********************************/

function responsiveListener_init(){
	var lastWindowSize=jQuery(window).width();
	jQuery(window).data('mobile-view',(lastWindowSize<768));
	
	jQuery(window).resize(function(){
		var w=jQuery(this).width();
		if(
			(w>=1420 && lastWindowSize < 1420) ||
			(w>=1270 && lastWindowSize < 1270) ||
			(w>=980 && lastWindowSize < 980) ||
			(w>=768 && lastWindowSize < 768) ||
			(w>=480 && lastWindowSize < 480) ||
			
			(w<=1419 && lastWindowSize > 1419) ||
			(w<=1269 && lastWindowSize > 1269) ||
			(w<=979 && lastWindowSize > 979) ||
			(w<=767 && lastWindowSize > 767) ||
			(w<=479 && lastWindowSize > 479)		
		){
			jQuery(window).data('mobile-view',(w<768));
			responsiveEvent();
		}
		lastWindowSize=w;
	});
	
}

function responsiveEvent(){
	
	sliderRewind();
	sliderCheckControl();
	isotopeCheck();
	thumbs_masonry_refresh();
	jQuery(window).scroll();
}

/*************************************/

function slider_init(){
	
	sliderCheckControl();
	
	var $box=jQuery('#big-slider-control .control-seek-box');
	var $slidesInner=jQuery('#big-slider .big-slider-inner');
	var initialPos=0;
	var initialOffset=0;
	var seekWidth=0;
	var boxWidth=0;
	var lastDirection=0;
	var lastPageX=0;
	var autoslide_direction=1;
	var autoslide_timer;
	
	var slidesWidth=0;
	var slidesPaneWidth=0;
	
	var movehandler=function(e){
		var left=initialOffset+(e.pageX-initialPos);
		if(left < 0)
			left=0;
		if(left > seekWidth-boxWidth)
			left = seekWidth-boxWidth;
		
		var percent=left/(seekWidth-boxWidth);
			
		$box.css('left',left+'px');
		var offset=(slidesPaneWidth-slidesWidth)*percent;
		$slidesInner.css('margin-left',offset+'px');
		
		lastDirection=lastPageX-e.pageX;
		lastPageX=e.pageX;
	}
	
	
	$box.mousedown(function(e){
		e.preventDefault();
		initialPos=e.pageX;
		initialOffset=parseInt($box.css('left'));
		boxWidth=$box.width();
		seekWidth=jQuery('#big-slider-control .control-seek').width();
		
		slidesWidth=jQuery('#big-slider .big-slider-uber-inner').width();
		slidesPaneWidth=jQuery('#big-slider').width();
		
		jQuery(this).addClass('pressed');

		jQuery(document).bind('mousemove',movehandler);
	});

	jQuery(document).mouseup(function(){
		if($box.hasClass('pressed')){
			$box.removeClass('pressed');
			jQuery(document).unbind('mousemove',movehandler);

			var $fs=jQuery('#big-slider .big-slider-slide:last');
			var sw=$fs.outerWidth()+parseInt($fs.css('margin-left'))+parseInt($fs.css('margin-right'));
			var ml=parseInt($slidesInner.css('margin-left'));
			if(lastDirection > 0) {
				ml=Math.ceil(ml/sw)*sw;
				if(ml > 0)
					ml=0;
			} else {
				ml=Math.floor(ml/sw)*sw;
				if(ml < slidesPaneWidth-slidesWidth)
					ml=slidesPaneWidth-slidesWidth;
			}
			$slidesInner.stop(true).animate({marginLeft: ml+'px'}, 300);
			fitBox(ml);
		}
	});
	
	/***/
	
	function fitBox(newMarginLeft){
		$box.stop(true);
		
		var percent=newMarginLeft/(slidesPaneWidth-slidesWidth);

		boxWidth=$box.width();
		seekWidth=jQuery('#big-slider-control .control-seek').width();

		var left=(seekWidth-boxWidth)*percent;
		$box.animate({left:left+'px'},300);
	}
	
	/***/
	
	jQuery('#big-slider-control .control-left').click(function(e){
		
		e.preventDefault();
		
		autoslide_direction=0;
		
		slider_scroll_left();
		
	});
	
	function slider_scroll_left() {
		
		$slidesInner.stop(true,true);
		
		var ml=parseInt($slidesInner.css('margin-left'));
		if(ml < 0)
		{
			var $fs=jQuery('#big-slider .big-slider-slide:last');
			var sw=$fs.outerWidth()+parseInt($fs.css('margin-left'))+parseInt($fs.css('margin-right'));
			ml+=sw;
			ml=Math.round(ml/sw)*sw;
			$slidesInner.animate({marginLeft: ml+'px'}, 300);
			fitBox(ml);
			
			return true;
		} else {
			return false;
		}
		
	}
	

	jQuery('#big-slider-control .control-right').click(function(e){
		
		e.preventDefault();
		
		autoslide_direction=1;
		
		slider_scroll_right();
		
	});
	
	function slider_scroll_right() {
		
		$slidesInner.stop(true,true);
		
		slidesWidth=jQuery('#big-slider .big-slider-uber-inner').width();
		slidesPaneWidth=jQuery('#big-slider').width();
		var ml=parseInt($slidesInner.css('margin-left'));
		if(slidesWidth+ml > (slidesPaneWidth + 20))
		{
			var $fs=jQuery('#big-slider .big-slider-slide:last');
			var sw=$fs.outerWidth()+parseInt($fs.css('margin-left'))+parseInt($fs.css('margin-right'));
			ml-=sw;
			ml=Math.round(ml/sw)*sw;
			$slidesInner.animate({marginLeft: ml+'px'}, 300);
			fitBox(ml);
			return true;
		} else {
			return false;
		}
		
	}
	
	var autoslideTimeout=parseInt(jQuery('#big-slider').data('timeout'));
	
	function slider_set_timer() {
		clearInterval(autoslide_timer);
		autoslide_timer=setInterval(function(){
			if(autoslide_direction == 1) {
				if(!slider_scroll_right()) {
					autoslide_direction=0;
					slider_scroll_left();
				}
			} else {
				if(!slider_scroll_left()) {
					autoslide_direction=1;
					slider_scroll_right()
				}
			}
		}, autoslideTimeout);
	}
	
	if(autoslideTimeout > 0 && jQuery('body').hasClass('no-touch')) {
		
		slider_set_timer();
		
		jQuery('#big-slider-control').mouseenter(function(){
			clearInterval(autoslide_timer);
		}).mouseleave(function(){
			slider_set_timer(); 
		});
		jQuery('#big-slider').mouseenter(function(){
			clearInterval(autoslide_timer);
		}).mouseleave(function(){
			slider_set_timer();
		});
	}
	
	
	/***/
	
	/*
	var touchStartPos=-1;
	var touchStartPosY=-1;
	var sliderInnerOffset=0;
	
	jQuery('#big-slider').bind('touchstart',function(e){
		
		var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
		touchStartPos=touch.pageX;
		touchStartPosY=touch.pageY;
		
		slidesWidth=jQuery('#big-slider .big-slider-uber-inner').width();
		slidesPaneWidth=jQuery('#big-slider').width();
		sliderInnerOffset=parseInt(jQuery('#big-slider .big-slider-inner').css('margin-left'));
	});
	
	jQuery('#big-slider').bind('touchmove',function(e){
		if(touchStartPos>=0) {

			var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];

			if(Math.abs(touch.pageY-touchStartPosY) < 30 ) {
				
				e.preventDefault();	
						
				var ml=sliderInnerOffset+touch.pageX-touchStartPos;
	
				if(ml > 0)
					ml=0;
				if(ml < slidesPaneWidth-slidesWidth)
					ml=slidesPaneWidth-slidesWidth;
				
				jQuery('#big-slider .big-slider-inner').css('margin-left',ml+'px');
				
				lastDirection=lastPageX-touch.pageX;
				lastPageX=touch.pageX;
				
			} else {
				event_touchend();
			}
		}
	});
	
	jQuery(document).bind('touchend', function(){
		
		event_touchend();

	});
	*/
	
	function event_touchend() {
		
		if(touchStartPos>=0) {
			
			touchStartPos=-1;
			
			var $fs=jQuery('#big-slider .big-slider-slide:last');
			var sw=$fs.outerWidth()+parseInt($fs.css('margin-left'))+parseInt($fs.css('margin-right'));
			var ml=parseInt($slidesInner.css('margin-left'));
			if(lastDirection < 0)
				ml=Math.ceil(ml/sw)*sw;
			else
				ml=Math.floor(ml/sw)*sw;
			$slidesInner.stop(true).animate({marginLeft: ml+'px'}, 300);
			
		}

	}
	
	/***/
	
	jQuery('#big-slider .big-slider-slide').mouseenter(function(){
		
		jQuery(this).find('.text-inner').stop(true,true).animate({top: '-120px'},150, function(){
			var $text=jQuery(this).find('.text-text');
			$text.stop(true,true);
			jQuery(this).css('top','120px');
			$text.css('top','30px');
			jQuery(this).animate({top: 0},150);
			$text.animate({top: 0},350);
		});
		
	});
}

function sliderRewind() {
	var $box=jQuery('#big-slider-control .control-seek-box');
	var $slidesInner=jQuery('#big-slider .big-slider-inner');

	$box.css('left',0);
	$slidesInner.css('margin-left',0);
	
}

function sliderCheckControl() {

	var sn=jQuery('#big-slider .big-slider-slide').length;
	var w=jQuery(window).width();

	if((sn < 4 && w >=768) || (sn == 1 && w < 768)) {
		jQuery('#big-slider-control').hide();
	} else {
		jQuery('#big-slider-control').show();
	}

}

/******************************************/

function menu_init(){

	if(!!('ontouchstart' in window)) {
		jQuery('.primary-menu li ul').each(function(){
			jQuery(this).parent().addClass('touch-childs').children('a').bind('touchstart',function(e){
				if(jQuery(this).parent().hasClass('active')) {
					menu_close(jQuery(this).parent().get(0));
				} else {				
					e.preventDefault();
					e.stopPropagation();

					jQuery(this).parent().parents('li.menu-item').addClass('thouch-not-to-close');
					jQuery('.primary-menu li.touch-childs').each(function(){
						if(!jQuery(this).hasClass('thouch-not-to-close'))
							menu_close(this);
					});
					jQuery('.primary-menu li.thouch-not-to-close').removeClass('thouch-not-to-close');
					
					menu_open(jQuery(this).parent().get(0));
				}
			}).mouseleave(function(){
				menu_close(this);
			});
		});
	} else {
		jQuery('.primary-menu li ul').each(function(){
			jQuery(this).parent().mouseenter(function(){
				menu_open(this);
			}).mouseleave(function(){
				menu_close(this);
			});
		});
	}
	
}

function menu_open(obj) {
	
	var $ul=jQuery(obj).addClass('active').children('ul');
	if(jQuery('body').hasClass('no-touch')) {
		$ul.children('li').stop(true).css('opacity',0);
		$ul.stop(true,true).delay(150).slideDown(200,function(){
			var i=0;
			jQuery(this).children('li').each(function(){
				jQuery(this).fadeTo(100+100*i,1);
				i++;
			});
		});
	} else {
		$ul.stop(true,true).delay(150).slideDown(200);
	}
	
}

function menu_close(obj) {
	jQuery(obj).removeClass('active');
	jQuery(obj).children('ul').stop(true,true).fadeOut(300);
}

/****************************/

function testimonials_init()
{
	jQuery('.testimonials-block').filter(':not(.no-scroll)').each(function(){
		
		var $items=jQuery(this).find('.items');
		if($items.find('.item').length > 1) {

			jQuery(this).addClass('multi-items');

			var args={
				speed: 200,
				next: jQuery(this).find('.controls .next'),
				prev: jQuery(this).find('.controls .prev'),
				fadePrev: true
			};
			if(jQuery(this).data('timeout') > 0)
				args.timeout = jQuery(this).data('timeout');
			if(jQuery(this).data('pause') == 1)
				args.pause = 1;

			$items.omSlider(args);
		
		} else {
			jQuery(this).find('.controls').remove();
		}
		
	});
}

/****************************/

function gallery_init()
{
	if(jQuery().omSlider) {
		jQuery('.custom-gallery').each(function(){
			var $items=jQuery(this).find('.items');
			var num=$items.find('.item').length;
			if(num > 1) {
				
				var active=0;
				var hash=document.location.hash.replace('#','');
				if(hash != '') {
					var $active=$items.find('.item[rel='+hash+']');
					if($active.length)
						active=$active.index();
				}
				jQuery(this).append('<div class="controls"><a href="#" class="next"></a><div class="pager"><div class="pager-inner"></div></div></div>');
				var $pager=jQuery(this).find('.pager');
				var $pagerinner=jQuery(this).find('.pager-inner');
				if(num < 10) 
					jQuery(this).find('.controls').addClass('narrow');
				$items.omSlider({
					speed: 400,
					pager: jQuery(this).find('.controls .pager-inner'),
					next: jQuery(this).find('.controls .next'),
					active: active
				});

				var pagerTimer;				
				jQuery(this).find('.pager-inner a').click(function(){
					
					clearTimeout(pagerTimer);
					var pos=jQuery(this).position();
					var ih=jQuery(this).outerHeight();
					
					pagerTimer=setTimeout(function(){
						var pih=$pagerinner.height();
						var ph=$pager.height();
						if(pih > ph) {
							var mar=-pos.top + 2*ih;
							if(mar > 0)
								mar=0;
							if(pih + mar < ph)
								mar=ph-pih;
							$pagerinner.stop(true).animate({top: mar+'px'}, 200);
						} else {
							if(parseInt($pagerinner.css('top')) != 0)
								$pagerinner.stop(true).animate({top: '0px'}, 200);
						}
					}, 420);
					
				});
			}
		});
	}
}


/****************************/

function comments_init()
{
	if(jQuery().validate) {
		jQuery("#commentform").validate({
			errorPlacement: function(error, element) {
			},
			wrapper: 'div'
		});
	}
}

/****************************/

function isotope_init()
{
	if(jQuery().isotope)
	{
		var $container=jQuery('#portfolio-wrapper');
		if($container.length)
		{
	    var args={ 
		    itemSelector: '.isotope-item',
		    layoutMode: 'fitRows',
		    animationEngine: 'best-available'
		  };
		  
	    if($container.hasClass('isotope-masonry')) {
	    	args.layoutMode='masonry';
	    	var $tmp=jQuery('<div class="block-1" style="height:0"></div>').appendTo('body');
	    	args.masonry={columnWidth: ($tmp.outerWidth() + parseInt($tmp.css('margin-left')) + parseInt($tmp.css('margin-right'))) };
	    	$tmp.remove();
	    	args.resizable=false;
	    }
	
			var $links=jQuery('.isotope-sort-menu').find('a');
      $links.click(function(){
      	if(jQuery(this).hasClass('active'))
      		return false;
        $links.removeClass('active');
        jQuery(this).addClass('active');

        var selector = jQuery(this).attr('href').split('#');
        selector=selector[1];

				args.filter='.'+selector;
        
        $container.isotope(args);
        
        return false;
      });

			$container.isotope(args);

    }
	}
}

function isotopeCheck()
{
	if(jQuery().isotope) {
		var $container=jQuery('#portfolio-wrapper.isotope-masonry');
		if($container.length) {

    	var args={};			
    	var $tmp=jQuery('<div class="block-1" style="height:0"></div>').appendTo('body');
    	args.masonry={columnWidth: ($tmp.outerWidth() + parseInt($tmp.css('margin-left')) + parseInt($tmp.css('margin-right'))) };
    	$tmp.remove();

			$container.isotope('option', args);
			$container.isotope('reLayout');
		}
	}
}

/*************************************/

function lightbox_init()
{
	//prettyPhoto
	if(jQuery().prettyPhoto) {
		jQuery('a[rel^=prettyPhoto]').addClass('pp_worked_up').prettyPhoto({deeplinking: false});
		var $tmp=jQuery('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"], a[href$=".jpeg"], a[href$=".bmp"]').not('.pp_worked_up');
		$tmp.each(function(){
			if(typeof(jQuery(this).attr('title')) == 'undefined')
				jQuery(this).attr('title',''); 
		});
		$tmp.prettyPhoto({deeplinking: false}); 
	}
}

/*************************************/

function thumbs_masonry_init()
{
	if(jQuery().isotope)
	{
		var $container=jQuery('.thumbs-masonry');
		if($container.length)
		{
	    var args={ 
		    itemSelector: '.isotope-item',
		    layoutMode: 'masonry',
		    animationEngine: 'best-available',
		    resisable: false
		  };
		  
    	var $tmp=jQuery('<div class="block-1" style="height:0"></div>').appendTo('body');
    	args.masonry={columnWidth: ($tmp.outerWidth() + parseInt($tmp.css('margin-left')) + parseInt($tmp.css('margin-right'))) };
    	$tmp.remove();

			$container.isotope(args);

    }
	}
}

function thumbs_masonry_refresh()
{
	if(jQuery().isotope)
	{
		var $container=jQuery('.thumbs-masonry');
		if($container.length) {
   		var args={};			
    	var $tmp=jQuery('<div class="block-1" style="height:0"></div>').appendTo('body');
    	args.masonry={columnWidth: ($tmp.outerWidth() + parseInt($tmp.css('margin-left')) + parseInt($tmp.css('margin-right'))) };
    	$tmp.remove();

			$container.isotope('option', args);
			$container.isotope('reLayout');
		}
	}
}

/*********************************/

function tooltips_init()
{
	var tt_id=1;
	jQuery('.add-tooltip').each(function(){
		var title=jQuery(this).attr('title');
		if(typeof(title) == 'undefined')
			return;
		jQuery(this).data('tooltip_id',tt_id);
		
		jQuery(this).mouseenter(function(){
			jQuery(this).attr('title','');
			var id=jQuery(this).data('tooltip_id');
			var $tt=jQuery('#tooltip_'+id).stop();
			if(!$tt.length)
			{
				var pos=jQuery(this).offset();
				$tt=jQuery('<div class="tooltip" id="tooltip_'+id+'">'+title+'</div>');
				$tt.appendTo('body');
				$tt.css('left',pos.left + Math.round(jQuery(this).outerWidth()/2));
				$tt.css('top',pos.top - $tt.outerHeight());
			}
			$tt.show();
			$tt.animate({opacity:1, marginTop: '-6px'}, 200);
		});

		jQuery(this).mouseleave(function(){
			jQuery(this).attr('title',title);
			var id=jQuery(this).data('tooltip_id');
			jQuery('#tooltip_'+id).stop().animate({opacity:0, marginTop: '-15px'}, 200, function(){
				jQuery(this).remove();
			});
		});

		tt_id++;
	});
}

/**********************************/

function toggle_init()
{

	jQuery('.accordion .toggle-title').addClass('in-accordion').click(function(){
		if(jQuery(this).hasClass('expanded'))
			return false;

		var $acc=jQuery(this).parents('.accordion');
		$acc.find('.toggle-title').removeClass('expanded');
		$acc.find('.toggle-inner').slideUp(300);

		jQuery(this).parent().find('.toggle-inner').slideDown(300).find('iframe[src*="maps.google"]').each(function(){
			jQuery(this).attr('src',jQuery(this).attr('src'));
		});
		jQuery(this).addClass('expanded');
		
	});
	
	jQuery('.toggle-title').not('.in-accordion').click(function(){
		var $inner=jQuery(this).parent().find('.toggle-inner');
		if(!$inner.length)
			return false;
		if($inner.is(':animated'))
			return false;
		
		jQuery(this).toggleClass('expanded');
		$inner.slideToggle(300);
		if(jQuery(this).hasClass('expanded')) {
			$inner.find('iframe[src*="maps.google"]').each(function(){
				jQuery(this).attr('src',jQuery(this).attr('src'));
			});
		}
		
		return false;
	});
}

function tabs_init()
{
	var hash=document.location.hash.replace('#','');
	jQuery('.tabs').each(function(){
		if(hash != '' && jQuery(this).find('.tabs-tabs .tabs-tab.'+hash).length ) {
			jQuery(this).find('.tabs-control a[href$=#'+hash+']').addClass('active');
			jQuery(this).find('.tabs-tabs .tabs-tab').hide().filter('.'+hash).addClass('active').show();
		} else {
			jQuery(this).find('.tabs-control a:first').addClass('active');
			jQuery(this).find('.tabs-tabs .tabs-tab:first').addClass('active').show();
		}
	});
	
	jQuery('.tabs .tabs-control a').click(function(){
		var $tabs=jQuery(this).parents('.tabs');
		if(!$tabs.length)
			return false;
			
		var tabname=jQuery(this).attr('href').split('#');
		tabname=tabname[(tabname.length-1)];
		
		$tabs.find('.tabs-control a').removeClass('active');
		jQuery(this).addClass('active');
		
		var $newtab=$tabs.find('.tabs-tabs .tabs-tab.'+tabname);
		
		$tabs.stop(true);
		var cur_h=$tabs.height();
		$tabs.css('height',cur_h+'px');
		
		$tabs.find('.tabs-tabs .tabs-tab.active').hide().removeClass('active');
		$newtab.addClass('active').fadeIn(300);
		
		$newtab.find('iframe[src*="maps.google"]').each(function(){
			jQuery(this).attr('src',jQuery(this).attr('src'));
		});

		var new_h=$newtab.outerHeight() + $tabs.find('.tabs-control').outerHeight();
		new_h++; // only for current template
		if(Math.abs(cur_h - new_h) > 4) {
			$tabs.animate({height: new_h + 'px'}, 300, function(){
				jQuery(this).css('height','auto');
			});
		} else {
			$tabs.css('height','auto');
		}
		
		
		return false;
	});

}

/**********************************/

function contact_form_init() {
	
	if( jQuery().validate && jQuery().ajaxSubmit ) {
		
	  var options = {
			success: contact_form_success,
			beforeSubmit: contact_form_before
		}; 	
		
		jQuery("#contact-form").validate({
			submitHandler: function(form) {
				jQuery(form).ajaxSubmit(options);
			},
			errorPlacement: function(error, element) {
				if(jQuery(element).attr('type') == 'checkbox')
					error.insertAfter(element);
			},
			errorClass: 'error'
		});
	}
}

function contact_form_before()
{
	var $obj=jQuery('#contact-form');
	$obj.fadeTo(300,0.5);
	$obj.before('<div id="contact-form-blocker" style="position:absolute;width:'+$obj.outerWidth()+'px;height:'+$obj.outerHeight()+'px;z-index:9999;"></div>');
}

function contact_form_success(resp)
{
	jQuery('#contact-form-blocker').remove();
	if(jQuery.trim(resp) == '0')
	{
		jQuery('#contact-form').fadeOut(300,function(){
			jQuery('#contact-form').remove();
			jQuery('#contact-form-success').fadeIn(200);
		});
	}
	else
	{
		jQuery('#contact-form').fadeOut(300,function(){
			jQuery('#contact-form').remove();
			jQuery('#contact-form-error').fadeIn(200);
		});		
	}
}

/************************************/

function logos_init()
{
	jQuery('.logos img').addClass('to_process');
	jQuery('.logos a').wrap('<div class="item" />').find('img').removeClass('to_process');
	jQuery('.logos img.to_process').removeClass('to_process').wrap('<div class="item" />');
}

/************************************/

function sidebar_slide_init()
{
	var $content=jQuery('.content-with-sidebar:first');
	var $sidebar=jQuery('.sidebar:first');
	
	$sidebar.mouseenter(function(){
		if(jQuery(this).is(':animated'))
			jQuery(this).stop(true);
	});
	
	if($content.length && $sidebar.length)
	{
		var sidebar_timer=false;
		var ie8=jQuery.browser.msie && (jQuery.browser.version == 8);
		
		jQuery(window).scroll(function(){

			if(sidebar_timer)
				clearTimeout(sidebar_timer);
				
			if(jQuery(window).data('mobile-view'))
			{
				$sidebar.stop(true).css({marginTop: 0});
				return;
			}

			sidebar_timer=setTimeout(function(){
				$sidebar.stop(true);
				
				var sh=$sidebar.height();
				var ch=$content.height();
				
				if(ch > sh)
				{
					var top=$sidebar.offset();
					var ws=jQuery(window).scrollTop();

					var cur_mar=parseInt($sidebar.css('margin-top'));
					var max=ch-sh;
					var new_mar=ws-(top.top-cur_mar)+6;
					if(new_mar > max)
						new_mar = max;
					if(new_mar < 0)
						new_mar = 0;
					
					var hover=false;
					if(!ie8)
						hover = $sidebar.is(':hover');
						
					if(new_mar != cur_mar && !hover) 
						$sidebar.stop(true).animate({marginTop: new_mar+'px'}, 800, 'easeInOutExpo');
				}
				
			}, 1290);
			
		});
	}
}

function sort_menu_init()
{
	
	jQuery('.sort-menu li a .count').wrapInner('<span />');
	jQuery('.sort-menu li a').mouseenter(function(){
		var $count=jQuery(this).find('.count span');
		if($count.is(':animated'))
			return;
		$count.stop(true).animate({top: '24px'}, 150, function(){
			jQuery(this).css('top','-24px').animate({top: 0}, 200);
		})
	});
	
}
    </script>
    </body>
    </html>