<?php
	function display_nav()
	{
?>		
		<script type="text/javascript"  src="/project/scripts/nav.js"></script>
		<style type="text/css">
			.nav .tabs{  width:420px; float:left; height:40px; margin-left:60px;}
			.nav .tabs .tab{  display:inline-block; width:100px; height:20px; padding:10px 0; color:#FFF; font:20px calibri;  background:#444; text-align:center; cursor:pointer;}
			.nav .tabs .tab:hover{background:#888;}
			.nav .tabs .tab .menu{position:absolute; display:none; width:auto; height:auto; padding:10px; background:#888; color:#777; z-index:99; top:42px; cursor:default;}
			
			.menu  h3{font: 18px 'century gothic'; color:#04F55F; margin:3px 0 7px 0;}
			
			.menu .categories{height:170px; width:190px; float:left; text-align:left; border-right:1px dashed #DDD;}
				.menu .categories a{text-decoration:none; display:block;  height:25px; font:17px calibri; color:#FFF;}
				.menu .categories a:hover{color:#04B45F;}
			.menu .sort{height:170px; width:150px; float:left; text-align:left; margin-left:20px;}
				.menu .sort a{text-decoration:none; display:block;  height:20px; font:15px calibri; color:#BBB;}
				.menu .sort a:hover{color:#EEE;}
				
			.menu .tut{height:200px; width:220px; float:left; text-align:left; border-right:1px dashed #DDD;}
				.menu .tut a{text-decoration:none; height:25px; display:block;font:17px calibri; color:#FFF;}
				.menu .tut a:hover{color:#04B45F;}
			.menu .document{height:200px; width:200px; float:left; text-align:left; margin-left:20px;}
				.menu .document a{text-decoration:none;  height:20px; display:block; font:15px calibri; color:#BBB;}
				.menu .document a:hover{color:#EEE;}
			
			.menu .grp{height:300px;  float:left; text-align:left; border-right:1px dashed #DDD; }
				.menu .grp .videos{height:150px; }
					.menu .grp .med{margin:0 5px; height:100px; width:180px; }
					/*.menu .grp .med:hover{color:#FFF;}*/
				.menu .grp .pod{height:150px; width:200px;}
			.menu .feature{height:300px; width:100px; float:left; text-align:left; margin-left:20px;}
				
		</style>
			
		<div class="tabs">
			<div class = "tab" id="explore">
				Explore
				<div class="menu">
					<div class="categories">
						<h3>Categories</h3>
						<a href="#" >Electronics</a>
						<a href="#" >Software</a>
						<a href="#">Mechanical</a>
						<a href="#">Civil</a>
						<a href="#">Electrical</a>
					</div>
					<div class = "sort">
						<h3>Sort by</h3>
						<a href="#">Featured</a>
						<a href="#">Most Active</a>
						<a href="#">Popular</a>
					</div>
				</div>
			</div>
			<div class="tab" id="learn">
				Learn
				<div class="menu">
					<div class="tut">
						<h3>Tutorials</h3>
						<a href="#">What is epselon?</a>
						<a href="#">How can it help me?</a>
						<a href="#">Getting Started</a>
						<a href="#">Step-by-step guide</a>
						<a href="#">Advanced Guide</a>
					</div>
					<div class="document">
						<h3>Documentation</h3>
						<a href="#">Official Documentation</a>
						<a href="#">User Guide</a>
						<a href="#">Developer's Guide</a>
						<a href="#">Tutorial</a>
					</div>
				</div>
			</div>
			<div class ="tab" id="media">
				Media
				<div class="menu">
					<div class="grp">
						<div class="videos">
							<h3>Videos</h3>
							<iframe class="med"  src="//www.youtube.com/embed/HIN4JB66_Kg?rel=0" frameborder="0" allowfullscreen></iframe>
							
						</div>
						<div class="pod">
							<h3>Poscasts</h3>
							
						</div>
					</div>
					<div class="feature">
						<h3>Featured</h3>
						
					</div>
				</div>
			</div>
			<div  class="tab" id="help">
				Help
				<div class="menu">
				</div>
			</div>
		</div>
	
<?php
	}
?>