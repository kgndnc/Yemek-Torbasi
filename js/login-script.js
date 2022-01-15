function changeVisibility() {
    let element = document.getElementById('password');
    if (element.getAttribute("type") === 'text') {
        element.setAttribute('type','password')
        document.querySelector("#password + input").setAttribute("value", 'Show password');
        return;
    }
    element.setAttribute('type','text')
    document.querySelector("#password + input").setAttribute("value", 'Hide password');
}