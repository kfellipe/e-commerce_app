
function pass(){
    this.new_pass = document.getElementById("new-pass").addEventListener("change", function(){
    console.log(document.getElementById("new-pass").value);
    if(document.getElementById('new-pass').value != ""){
        document.getElementsByClassName("pass")[0].setAttribute("style", "animation-name: pass;animation-duration: 1s;animation-fill-mode: forwards;");
        } 
    if(document.getElementById("new-pass").value == ""){
        console.log("chegou aqui");
        document.getElementsByClassName("pass")[0].setAttribute("style", "animation-name: passback;animation-duration: 1s;animation-fill-mode: forwards;");
        }
    });
}
var pass = new pass();