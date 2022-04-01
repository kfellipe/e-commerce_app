function aside(){
    this.show_view = show_view;
    this.on_click = on_change;

    function hide_all_views(){
        var views = window.document.querySelectorAll(".container-view > .view");
        views.forEach(function(element){
            element.removeAttribute("style");
        })
    }

    function show_view(query){
        var int = query;
        hide_all_views();
        console.log("chegou aqui");
        var teste = window.document.querySelectorAll(".container-view > .view")[int];
        teste.setAttribute("style", "display: block");
        console.log(int);
    }

    function on_change(x){
        var int = x;
        window.document.querySelectorAll("aside > .menu")[int].addEventListener("click", function(){
            //hide_all_views();
            //window.document.querySelectorAll(".container-view > .view")[int].setAttribute("style", "display: block");
            document.querySelectorAll(".container-view > .view")[0].setAttribute("style", "display: block;animation-name: fadeout;animation-duration: 1s;animation-fill-mode: forwards;");
            //document.querySelectorAll(".container-view > .view")[1].setAttribute("style", "display: block");
        

        })  
        
    }
}
var view = new aside();

view.on_click(0);
view.on_click(1);