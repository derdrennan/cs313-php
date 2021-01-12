function buttonClicked()
{
    alert("Clicked!");
}

function changeColor()
{
    var textbox_id = "txtColor";
    var textbox = document.getElementById(textbox_id);

    var div_id = "div1";
    var div = document.getElementById(div_id);

    var color = textbox.nodeValue;
    div.style.backgroundColor = color;
}