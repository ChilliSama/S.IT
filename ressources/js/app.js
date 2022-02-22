// window.onload = () => {
//     // créer la session user 
//     if (!localStorage.user) {
//         let user = 0

//         localStorage.user = user
//     } else {
//         var user_name = "Terence"
//         let btn = document.getElementById("auth")

//         btn.innerHTML = '<a class="btn btn-outline-success my-2 my-sm-0" href="../../index.php">'+ user_name +'</a>'
//     }

// }

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

function login_user(){
  let user_name = getCookie("user_id");
  var auth = document.getElementById("auth");
  var a = document.createElement("a");
  a.className = "btn btn-outline-success";
  a.href = "home.php"
  a.innerHTML = user_name;
  auth.parentNode.replaceChild(a, auth);
}