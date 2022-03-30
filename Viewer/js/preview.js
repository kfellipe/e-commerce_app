let upload = window.document.getElementById("arquivo");
let preview = window.document.getElementById("preview");
let text = window.document.getElementById("preview-text");
let button = window.document.getElementById("btn-upload");

upload.addEventListener("change", function(){
    let reader = new FileReader();
    let file = this.files[0];
    reader.addEventListener("load", function(){
        text.style = "display: none";
        preview.style = "display: flex";
        button.style = "border: 1px solid green; background: rgba(0, 150, 0, .6);";
        preview.setAttribute("src", this.result);
    });
    reader.readAsDataURL(file);
})