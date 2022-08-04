		<!-- FOOTER -->
		<div class="footer_section">
			<div class="footer_section_social">
				<ul class="footer_section_social_ul">
					   <li>
                            <a href=""><i class="fa fa-facebook-f"></i></a>
                        </li>

                        <li>
                            <a href=""><i class="fa fa-instagram"></i></a>
                        </li>

                        <li>
                            <a href=""><i class="fa fa-twitter"></i></a>
                        </li>

                        <li>
                            <a href=""><i class="fa fa-google-plus-g"></i></a>
                        </li>
				</ul>
			</div>
			<div class="footer_section_mnu">
				<ul class="footer_section_ul">
					<li>
						<a href="home.html">Home</a>
					</li>
					<li>
						<a href="gallery.html">Gallery</a>
					</li>
					<li>
						<a href="faq.html">FAQ</a>
					</li>
					<li>
						<a href="about_us.html">About</a>
					</li>
					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="footer_copy_right">
			<p>©2019 Appifylab. All rights reserved</p>
		</div>
		<!-- FOOTER -->
<script src="{{mix('/js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
	var showChar = 78;
	var ellipsestext = "...";
	var moretext = "more";
	var lesstext = "less";
	$('.more').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});</script>
