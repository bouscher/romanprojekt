
{% include 'partials/flash-messages.volt' %}
<div id="main-content" class="main">
    {{ content() }}
<h1>Login</h1>


<div class="loginForm">
  <form action="{{ form.getAction() }}" method="POST">
   <label for="username">Email: </label><br>
    {{form.render('username')}}<br/><br>
    

    <label for="password">Password: </label><br>
    {{form.render('password')}}<br><br>
    

    {{form.render('login')}}
  </form>
</div>
</div>

