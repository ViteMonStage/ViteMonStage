const edit_button = document.getElementById("editbutton");
const done_button = document.getElementById("end-editing");
const edit_profile = document.getElementById("uploadbtn");
const file = document.querySelector("#file");
var list = document.querySelectorAll(".infos li input");
const li = document.getElementById("")
var i;



function edit(){
    for(i = 0 ; i < list.length; i++)
{

        
        list[i].removeAttribute('readonly');
        list[i].style.backgroundColor =  "#fff";
        list[i].style.color = "Black";
        list[i].style.margin = "2px";
        list[i].style.borderRadius = "4px";
        list[i].style.paddingLeft = "5px";
        list[i].style.paddingRight = "3px";        
}
    done_button.style.display = "Block";
    edit_profile.style.display = "flex";
};

done_button.addEventListener("click",function(){
    for(i = 0 ; i < list.length; i++)
    {
        list[i].setAttribute("readonly", "readonly");
        list[i].style.backgroundColor =  "transparent";
        list[i].style.color = "White";
        list[i].style.margin = "0px";
    }
    done_button.style.display = "none";
    edit_profile.style.display = "none";
})

var loadFile = function (event) {
    var image = document.getElementById("avatar");
    image.src = URL.createObjectURL(event.target.files[0]);
  };

  file.addEventListener("change",function(){
      const reader = new FileReader();

      reader.addEventListener("load", () =>{
          console.log(reader.result);
      });
      reader.readAsDataURL(this.files[0]);
  }) 

  

  
