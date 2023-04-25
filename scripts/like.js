// List of all the posts' buttons present in the feed
const buttons = document.getElementsByTagName("button");
// id of the post liked
let id;
// The corresponding button
let button;

/*
Handler triggered when a like button is pressed
 */
const buttonPressed = e => {
    id=(e.target.id);  // Get ID of Clicked Element
    button = document.getElementById(id);
    doQuery(id, user);
}

/*
Add the like in the database
 */
async function doQuery(postId, user) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        // If the query is well executed
        if (this.responseText.includes('OK')) {
            // Update the button
            button.classList.contains('like-button-on') ? button.classList.remove('like-button-on') : button.classList.add('like-button-on');
        }
    }
    xhttp.open("GET", "./ajax/like-query.php?user="+user+"&postID="+postId, true); //Le booléen final dit si le chargement est asynchrone ou non
    xhttp.send();
}

/*
Initialise the buttons listeners
 */
function init() {
    for (let button of buttons) {
        button.addEventListener("click", buttonPressed);
    }
}