function color(){
    this.echo = echo;
    this.pred_button = document.getElementById("pred-color").addEventListener("change", function(){
        let color = document.getElementById("pred-color").value;
        window.document.getElementsByClassName("img-profile")[0].style = "background: radial-gradient("+color+" 40%, rgba(0, 0, 0, 0) 70%);"
    })
    this.color_right = document.getElementById("color-right").addEventListener("change", function(){
        change_back_color();
    })
    this.color_left = document.getElementById("color-left").addEventListener("change", function(){
        change_back_color();
    })
    function change_back_color(){
        let color_left = document.getElementById("color-left").value;
        let color_right = document.getElementById("color-right").value;
        document.getElementsByClassName("container-color_preview")[0].style = `background-image: linear-gradient(to left, ${color_right}, ${color_left}`;
    }
    function echo(){
        console.log("teste");
    }
}

var x = new color();

x.echo();