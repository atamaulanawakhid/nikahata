const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
document.querySelector("hyper").onmouseover = event => {
    event.target.innertext = Math.floor(Math.random() * 26);
}