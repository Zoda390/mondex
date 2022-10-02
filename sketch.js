class Pixel{
    constructor(x, y, r, g, b){
        this.x = round((x-res/2)/res);
        this.y = round((y-res/2)/res);
        this.r = r;
        this.g = g;
        this.b = b;
    }

    render(){
        noStroke();
        fill(this.r, this.g, this.b);
        rect(this.x*res, this.y*res, res, res);
    }
}


var pixels = [];
var res = 8;
function setup() {
    var myCanvas = createCanvas(256, 256);
    myCanvas.parent("canvasContainer");

    for (let element of document.getElementsByClassName("p5Canvas")) {
        element.addEventListener("contextmenu", (e) => e.preventDefault());
    }

    rSlider = createSlider(0, 255, 0, 1);
    rSlider.parent("rSliderContainer");
    rSlider.size(200);
    gSlider = createSlider(0, 255, 0, 1);
    gSlider.parent("gSliderContainer");
    gSlider.size(200);
    bSlider = createSlider(0, 255, 0, 1);
    bSlider.parent("bSliderContainer");
    bSlider.size(200);
}
  
function draw() {
    if(keyIsDown(87)){
        resizeCanvas(32, 32);
        res = 1;
    }
    if(keyIsDown(83)){
        resizeCanvas(256, 256);
        res = 8;
    }
    background(255);
    for(let i = 0; i < pixels.length; i++){
        pixels[i].render();
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