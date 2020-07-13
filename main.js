jQuery(document).ready(function() {
    jQuery(".prouct-list").click(function() {
    $this = jQuery(this).closest(".dropdown-list");
    if ($this.hasClass("active")) {
        $this.removeClass("active");
        $this.find(".product-container").slideUp();
    } else {
        $this.siblings(".dropdown-list").removeClass("active");
        $this.siblings(".dropdown-list").find(".product-container").slideUp();
        $this.addClass("active");
        $this.find(".product-container").stop(true, true).slideDown();
    }
});
});
var total=0;


function up(max,j) {
    var tot=document.getElementById("total");
    var val = document.getElementById("myNumber"+j);
    var num = val.innerHTML;
    num++;
    total++;
    val.innerHTML=num;
    tot.innerHTML=total;
    if (val.innerHTML >= parseInt(max)) {
        val.innerHTML = max;
    }
}
function down(min,j) {
    var tot=document.getElementById("total");
    var val = document.getElementById("myNumber"+j);
    var num = val.innerHTML;
    if(val.innerHTML > parseInt(min)){
        total--;
        tot.innerHTML=total;
    }
    num--;
    val.innerHTML=num;
    if (val.innerHTML <= parseInt(min)) {
        val.innerHTML = min;
    }  
}

function GetRandom(){
    var myElement = document.getElementById("pwbx");
    var Element = myElement.innerHTML;
    var value = Math.floor(1000 + Math.random() * 9000);
    myElement.innerHTML=value;
}

function done(nu,otp){
    window.alert('hi');
}
