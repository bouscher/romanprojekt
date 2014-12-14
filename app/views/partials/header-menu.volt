<header class="header-container">
	<div id="logo">
		<a href="{{ baseurl }}" title="Der rote Faden">Der rote Faden</a>
	</div>
	
	<nav class="navbar navbar-reverse" role="navigation">	  		
		  <ul class="nav navbar-nav navbar-right">
			  {% if 'review' == dispatcher.getControllerName() %}
              <li class="dropdown active">
              {% else %}
			 <li class="dropdown">
              {% endif %}
			{{- link_to('/files', 'die Sitzungen') -}}				
			</li>	
               </ul>
	  
	</nav>
	
	<div class="clearfix"></div>
</header>