const edit_button = document.getElementById("editbutton");
const done_button = document.getElementById("end-editing");
var list = document.querySelectorAll(".infos li");
var i;

    

function edit(){
    for(i = 0 ; i < list.length; i++)
{
        list[i].contentEditable = true;
        list[i].style.backgroundColor =  "#ffffff";
        list[i].style.color = "Black";
        list[i].style.margin = "1px";
}
    done_button.style.display = "Block";
};

done_button.addEventListener("click",function(){
    for(i = 0 ; i < list.length; i++)
    {
        list[i].contentEditable = false;
        list[i].style.backgroundColor =  "transparent";
        list[i].style.color = "White";
        list[i].style.margin = "0px";
    }
    done_button.style.display = "none";
})