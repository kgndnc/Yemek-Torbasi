function changeVisibility(id) {
    let element = document.getElementById(id);
    if (element.getAttribute("type") === 'text') {
        element.setAttribute('type','password')
        document.querySelector("#" + id + " + input").setAttribute("value", 'Show password');
        return;
    }
    element.setAttribute('type','text')
    document.querySelector("#" + id + " + input").setAttribute("value", 'Hide password');
}

let check = function() {
    document.getElementById("message").setAttribute("style","visibility:visible")
    if (document.getElementById('password').value ===
        document.getElementById('password_rpt').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
    }
}
