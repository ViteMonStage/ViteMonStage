const edit_button = document.getElementById("editbutton");
const done_button = document.getElementById("end-editing");
const edit_profile = document.getElementById("uploadbtn");
const file = document.querySelector("#file");
var list = document.querySelectorAll(".infos li input");
const birthday = document.querySelector(".infos .datepicker");
const age = document.getElementById("calendar");
const promo = document.getElementById("listboxpromo")
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
    list[4].style.display = "None";
    list[6].style.display = "none";
    age.style.display = "block";
    done_button.style.display = "Block";
    edit_profile.style.display = "flex";
    age.style.margintop = "2.5px";
    age.style.marginbottom= "2.5px";
    promo.style.display = "block";
};

done_button.addEventListener("click",function(){
    for(i = 0 ; i < list.length; i++)
    {
        list[i].setAttribute("readonly", "readonly");
        list[i].style.backgroundColor =  "transparent";
        list[i].style.color = "White";
        list[i].style.margin = "2px";
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

  

  
