<!---header---->
<div class="header">
	 <div class="container">
		  <div class="logo">
			  <a href="{{route('front.index')}}"><img src="{{asset('images/logo.jpg') }}" title="" /></a>
		  </div>
			 <!---start-top-nav---->
			 <div class="top-menu">
				 <!-- <div class="search">
					 <form>
					 <input type="text" placeholder="" required="">
					 <input type="submit" value=""/>
					 </form>
				 </div> -->
				  <span class="menu"> </span>
				   <ul>
						<li class="active"><a href="{{ route('front.index') }}">Inicio</a></li>
						<li><a href="{{ route('sobre-mi') }}">Sobre mí</a></li>
						<li><a href="{{route('front.softapoyo')}}">Software de apoyo</a></li>
						<li><a href="contact.html">Contacto</a></li>
						<div class="clearfix"> </div>
				 </ul>
			 </div>
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
					});
					</script>
				<!---//End-top-nav---->
	 </div>
</div>
<!--/header-->
