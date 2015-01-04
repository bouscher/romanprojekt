<header class="header-container">
	<div id="logo">
		<a href="<?php echo $baseurl; ?>" title="Der rote Faden">Der rote Faden</a>
	</div>
	
	<nav class="navbar navbar-reverse" role="navigation">	  		
		  <ul class="nav navbar-nav navbar-right">
			  <?php if ('review' == $this->dispatcher->getControllerName()) { ?>
              <li class="dropdown active">
              <?php } else { ?>
			 <li class="dropdown">
              <?php } ?><?php echo $this->tag->linkTo(array('/files', 'die Sitzungen')); ?></li>	
                        
                        
              
			 <li class="dropdown"><?php echo $this->tag->linkTo(array('/session/logout', 'Logout')); ?></li>	
               </ul>
	  
	</nav>
	
	<div class="clearfix"></div>
</header>