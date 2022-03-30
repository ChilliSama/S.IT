window.onload = () => {
  var session;
  $.ajaxSetup({cache: false})
  $.get('ressources/php/getsession.php', function (data) { 
    session = JSON.parse(data);

    if (session['username']){
      var user_name = session['username'];
      let btn = document.getElementById("auth");

      btn.innerHTML = '<a class="btn btn-outline-success my-2 my-sm-0" href="../../../index.php">'+ user_name +'</a>';
    }
  });
}