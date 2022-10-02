class Pixel{
    constructor(x, y, r, g, b){
        this.x = round((x-res/2)/res);
        this.y = round((y-res/2)/res);
        this.r = r;
        this.g = g;
        this.b = b;
    }

    render(){
        push();
        noStroke();
        fill(this.r, this.g, this.b);
        rect(this.x*res, this.y*res, res, res);
        pop();
    }
}


var pixels = [];
var res = 8;
function setup() {
    var myCanvas = createCanvas(256, 256);
    myCanvas.parent("canvasContainer");

    rSlider = createSlider(0, 255, 0, 1);
    rSlider.parent("rSliderContainer");
    rSlider.size(200);
    gSlider = createSlider(0, 255, 0, 1);
    gSlider.parent("gSliderContainer");
    gSlider.size(200);
    bSlider = createSlider(0, 255, 0, 1);
    bSlider.parent("bSliderContainer");
    bSlider.size(200);

    gridButton = document.getElementById("btncheck1");
}
  
function draw() {
    if(keyIsDown(87)){
        resizeCanvas(32, 32);
        res = 1;
        for (let element of document.getElementsByClassName("p5Canvas")) {
            element.removeEventListener("contextmenu", preventContextMenu);
        }
    }
    if(keyIsDown(83)){
        resizeCanvas(256, 256);
        res = 8;
        for (let element of document.getElementsByClassName("p5Canvas")) {
            element.addEventListener("contextmenu", preventContextMenu);
        }
    }
    background(255);
    for(let i = 0; i < pixels.length; i++){
        pixels[i].render();
    }
    if(res == 8 && gridButton.checked){
        for(let i = 1; i<(256/8); i++){
            push();
            strokeWeight(1);
            stroke(0);
            line(i*8, 0, i*8, height);
            line(0, i*8, width, i*8);
            pop();
        }
    }
    if(mouseIsPressed){
        if(mouseButton == LEFT){
            pixels.push(new Pixel(mouseX, mouseY, rSlider.value(), gSlider.value(), bSlider.value()));
        }
        if(mouseButton == RIGHT){
            let c = get(mouseX, mouseY);
            rSlider.value(c[0]);
            gSlider.value(c[1]);
            bSlider.value(c[2]);
        }
    }
}

var preventContextMenu = function(event){
    event.preventDefault();
}


