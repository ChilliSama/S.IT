window.onload = () => {
  var session;
  $.ajaxSetup({cache: false})
  $.get('/S.IT/ressources/php/getsession.php', function (data) { 
    session = JSON.parse(data);

    if (session['username']){
      var user_name = session['username'];
      let btn = document.getElementById("auth");

      btn.innerHTML = '<div class="dropdown">' +
                        '<button class="btn btn-outline-success dropdown-toggle my-2 my-sm-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">' +
                          user_name +
                        '</button>' +
                        '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">' +
                          '<li><hr class="dropdown-divider"></li>' +
                          '<li><a class="dropdown-item" href="/S.IT/logout.php">Déconnexion</a></li>' +
                        '</ul>' +
                      '</div>';
    }
  });

}