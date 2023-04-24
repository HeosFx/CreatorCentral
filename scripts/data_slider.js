/* Variable that stock the last slide shown on the screen */
let last_slide = 1;

/*
Function used to show the data corresponding to the first slide
 */
function showData1() {
    let str = "slide" + last_slide + "-container";
    document.getElementById(str).classList.remove('show');
    document.getElementById('slide1-container').classList.add('show');
    last_slide = 1;
}

/*
Function used to show the data corresponding to the second slide
 */
function showData2() {
    let str = "slide" + last_slide + "-container";
    document.getElementById(str).classList.remove('show');
    document.getElementById('slide2-container').classList.add('show');
    last_slide = 2;
}

/*
Function used to show the data corresponding to the third slide
 */
function showData3() {
    let str = "slide" + last_slide + "-container";
    document.getElementById(str).classList.remove('show');
    document.getElementById('slide3-container').classList.add('show');
    last_slide = 3;
}

/*
Function used to show the data corresponding to the fourth slide
 */
function showData4() {
    let str = "slide" + last_slide + "-container";
    document.getElementById(str).classList.remove('show');
    document.getElementById('slide4-container').classList.add('show');
    last_slide = 4;
}

/*
Clear search bar
*/

function clearSearchBar() {
    document.getElementById("search-input").value = "";
}