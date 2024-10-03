  alert("This game has a time limit of 1 min for each step.\n As you click 'OK' , your time will start")
        window.onload = function(){
    var w = window.innerWidth ;
    var h = window.innerHeight ;
    
    var tsw = (w > h) ? h : w;
    
    var sw = (tsw-16)/8;
    var kw =(tsw-16)/8;
    var count=0;
    
    //making chess board

    var container = document.getElementById("container");
    var contains = document.getElementById("contains");
    var contains = document.getElementById("containss");

    for(var n = 0; n < 64; n++){
        var square = document.createElement("div");
        square.classList.add("square");
        square.classList.add("s"+n);
        square.style.height = sw + 'px';
        square.style.width = sw + 'px';
        square.style.top = 7+(h-tsw)/2+sw*(Math.floor(n/8)) + 'px';
        square.style.left = 7+(w-tsw)/2+sw*(Math.floor(n%8)) + 'px';
        square.style.fontSize = sw*3/4 + 'px';
        container.appendChild(square);
    }
    for(var n = 0; n < 16; n++){
        var rect = document.createElement("div");
        rect.classList.add("rect");
        rect.classList.add("r"+n);
        rect.style.height = kw + 'px';
        rect.style.width = kw + 'px';
        rect.style.top = 10+  (h-tsw)/2+kw*3/4*(Math.floor(n/5)) + 'px';
        rect.style.left = (w-tsw)/2+kw*3/4 *(Math.floor(n%5)) -325 + 'px';
        rect.style.fontSize = kw*3/4 + 'px';
        contains.appendChild(rect);
    }
    for(var n = 0; n < 16; n++){
        var rect1 = document.createElement("div");
        rect1.classList.add("rect1");
        rect1.classList.add("r"+n);
        rect1.style.height = kw + 'px';
        rect1.style.width = kw + 'px';
        rect1.style.top =400+  (h-tsw)/2+kw*3/4*(Math.floor(n/5)) + 'px';
        rect1.style.left = (w-tsw)/2+kw*3/4*(Math.floor(n%5)) -325 + 'px';
        rect1.style.fontSize = kw*3/4 + 'px';
        containss.appendChild(rect1);
    }

    var fonts = {
        'l' : '&#9812;',   //white king
        'w' : '&#9813;',   //white queen
        't' : '&#9814',    //white rock
        'v' : '&#9815',     //white bishop
        'm' : '&#9816',     //white knight
        'o' : '&#9817',     //white pawn
        'k' : '&#9818;',    //black king
        'q' : '&#9819;',    //black queen
        'r' : '&#9820',     //black rock
        'b' : '&#9821',     //black bishop
        'n' : '&#9822',     //black knight
        'p' : '&#9823',    //black pawn
    }
    
    var values = ['r','n','b','q','k','b','n','r','p','p','p','p','p','p','p','p',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'o','o','o','o','o','o','o','o','t','m','v','w','l','v','m','t'];
    var ck = false;
    var cr1 = false;
    var cr2 = false;
    var cl;
     var ck_ = false;
    var cr1_ = false;
    var cr2_ = false;
    var cl_;
    
    var sqs = document.getElementsByClassName("square");
    var rts = document.getElementsByClassName("rect");
    var rts1 = document.getElementsByClassName("rect1");
    for(var n = 0; n < 64; n++){
        if(values[n] !== 0){
           sqs[n].innerHTML = fonts[values[n]];
        }
        sqs[n].addEventListener("click",check);
    }
    
    function updateSquarecolor(){
        for(var n = 0; n < 64; n++){
            if(Math.floor(n/8)%2 === 0){
                if(n%2 === 0){
                    sqs[n].style.background = '#D2691E';
                }
                else {
                    sqs[n].style.background = '#FF7F50';
                }
            }
            else {
                if(n%2 === 1){
                    sqs[n].style.background = '#D2691E';
                }
                else {
                    sqs[n].style.background = '#FF7F50';
                }
            }
        }
    }
    startTime()
    start()
    updateSquarecolor();

    var moveable = 0;
    var moveTarget = "";
    var moveScopes = [];
    var these = [];
    var those = [];


    function checkBlack(n,values){
        var target = values[n];
        var scopes = [];
        var x = n;
       
        if(target === "o"){
            x -= 8;
            if("prnbkq".indexOf(values[x-1]) >= 0 && x%8 != 0){
                scopes.push(x-1);
            }
            if("prnbkq".indexOf(values[x+1]) >= 0 && x%8 != 7){
                scopes.push(x+1);
            }
            if(x >= 0 && values[x] === 0){
                scopes.push(x);
                if(x >= 40){
                    if(x-8 >= 0 && values[x-8] === 0){
                        scopes.push(x-8);
                    }
                }
            }
        }
       
        else if(target === "t"){
            x = n;
            x -= 8;
            while(x >= 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 8;
            }
            x = n;
            x += 8;
            while(x < 64){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 8;
            }
            x = n;
            x++;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x++;
            }
            x = n;
            x--;
            while(x%8 != 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x--;
            }
        }
        
        else if(target === "m"){
            x = n;
            if(x%8 > 1 && x%8 < 6){
                x -= 17;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 15;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }

                x = n;
                x -= 10;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 6;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 6;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 10;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 15;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 17;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            else {
                x = n;
                if(x%8 <= 1){
                    x = n;
                    x -= 15;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x -= 6;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 10;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 17;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                x = n;
                if(x%8 === 1){
                    x -= 17;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 15;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                if(x%8 >= 6){
                    x = n;
                    x -= 17;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x -= 10;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 6;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 15;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                x = n;
                if(x%8 === 6){
                    x = n;
                    x -= 15;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 17;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
            }
        }
        
        else if(target === "v"){
            x = n;
            x -= 9;
            while(x >= 0 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 9;
            }
            x = n;
            x += 7;
            while(x < 64 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 7;
            }
            x = n;
            x += 9;
            while(x%8 != 0 && x%8 !== 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 9;
            }
            x = n;
            x -= 7;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 7;
            }
        }
       
        else if(target === "w"){
            x = n;
            x -= 8;
            while(x >= 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 8;
            }
            x = n;
            x += 8;
            while(x < 64){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 8;
            }
            x = n;
            x++;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x++;
            }
            x = n;
            x--;
            while(x%8 != 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x--;
            }
            x = n;
            x -= 9;
            while(x >= 0 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 9;
            }
            x = n;
            x += 7;
            while(x < 64 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 7;
            }
            x = n;
            x += 9;
            while(x%8 != 0 && x%8 !== 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 9;
            }
            x = n;
            x -= 7;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 7;
            }
        }
        
        else if(target === "l"){
            x = n;
            x += 8;
            if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                scopes.push(x);
            }
            x = n;
            x -= 8;
            if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                scopes.push(x);
            }
            x = n;
            if(x%8 > 0){
                x = n;
                x -= 1;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 9;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }

                x = n;
                x += 7;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            x = n;
            if(x%8 < 7){
                x = n;
                x += 1;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 9;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 7;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            x = n;
            if(!ck){
                cl = false;
                if(!cr2){
                //    cl = false;
                    if(values[n+1] === 0 && values[n+2] === 0 && values[n+3] === "t"){
                        scopes.push(x+2);
                        cl = true;
                    }
                }
                if(!cr1){
                //    cl = false;
                    if(values[n-1] === 0 && values[n-2] === 0 && values[n-3] === 0 && values[n-4] === "t"){
                        scopes.push(x-2);
                        cl = true;
                    }
                }
            }
        }
        if(scopes.length) return scopes;
    }

    function checkWhite(n,values){
        var target = values[n];
        var scopes = [];
        var x = n;
        if(target === "p"){
            x += 8;
            if("otmvlw".indexOf(values[x-1]) >= 0 && x%8 != 0){
                scopes.push(x-1);
            }
            if("otmvlw".indexOf(values[x+1]) >= 0 && x%8 != 7){
                scopes.push(x+1);
            }
            if(x < 64 && values[x] === 0){
                scopes.push(x);
                if(x <= 23){
                    if(x+8 >= 0 && values[x+8] === 0){
                        scopes.push(x+8);
                    }
                }
            }
        }
        
        else if(target === "r"){
            x = n;
            x -= 8;
            while(x >= 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 8;
            }
            x = n;
            x += 8;
            while(x < 64){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 8;
            }
            x = n;
            x++;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x++;
            }
            x = n;
            x--;
            while(x%8 != 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x--;
            }
        }
        
        else if(target === "n"){
            x = n;
            if(x%8 > 1 && x%8 < 6){
                x -= 17;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 15;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }

                x = n;
                x -= 10;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 6;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 6;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 10;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 15;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 17;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            else {
                x = n;
                if(x%8 <= 1){
                    x = n;
                    x -= 15;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x -= 6;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 10;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 17;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                x = n;
                if(x%8 === 1){
                    x -= 17;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 15;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                if(x%8 >= 6){
                    x = n;
                    x -= 17;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x -= 10;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 6;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 15;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                x = n;
                if(x%8 === 6){
                    x = n;
                    x -= 15;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 17;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
            }
        }
     
        else if(target === "b"){
            x = n;
            x -= 9;
            while(x >= 0 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 9;
            }
            x = n;
            x += 7;
            while(x < 64 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 7;
            }
            x = n;
            x += 9;
            while(x%8 != 0 && x%8 !== 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 9;
            }
            x = n;
            x -= 7;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 7;
            }
        }
        
        else if(target === "q"){
            x = n;
            x -= 8;
            while(x >= 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 8;
            }
            x = n;
            x += 8;
            while(x < 64){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 8;
            }
            x = n;
            x++;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x++;
            }
            x = n;
            x--;
            while(x%8 != 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x--;
            }
            x = n;
            x -= 9;
            while(x >= 0 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 9;
            }
            x = n;
            x += 7;
            while(x < 64 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 7;
            }
            x = n;
            x += 9;
            while(x%8 != 0 && x%8 !== 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 9;
            }
            x = n;
            x -= 7;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 7;
            }
        }
        
        else if(target === "k"){
            x = n;
            x += 8;
            if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                scopes.push(x);
            }
            x = n;
            x -= 8;
            if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                scopes.push(x);
            }
            x = n;
            if(x%8 > 0){
                x = n;
                x -= 1;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 9;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }

                x = n;
                x += 7;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            x = n;
            if(x%8 < 7){
                x = n;
                x += 1;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 9;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 7;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            x = n;
            if(!ck_){
                cl_ = false;
                if(!cr2_){
                //    cl_ = false;
                    if(values[n+1] === 0 && values[n+2] === 0 && values[n+3] === "r"){
                        scopes.push(x+2);
                        cl_ = true;
                    }
                }
                if(!cr1_){
                //    cl_ = false;
                    if(values[n-1] === 0 && values[n-2] === 0 && values[n-3] === 0 && values[n-4] === "r"){
                        scopes.push(x-2);
                        cl_ = true;
                    }
                }
            }
        }
        if(scopes.length) return scopes;
    }

    var myTurn = 0;

    function checkmate(){
        if(myTurn==0){
            var many=0;
            var total=0;
            for(var x=0;x<64;x++){
                if(values[x]=='l' || values[x]=='w' || values[x]=='t' || values[x]=='v' || values[x]=='m' || values[x]=='o'){
                    var n = x;

                    var scopes= checkBlack(n,values) || [];
                    total = total + scopes.length;
                    var moveT=n;
                    if(scopes.length>0){
                        for(var z=0; z<scopes.length;z++){
                            n=scopes[z];
                            var checkArr = [];
                            for(var y = 0; y < 64; y++){
                                checkArr[y] = values[y];
                            }    
                            checkArr[n] = checkArr[moveT];
                            checkArr[moveT] = 0;
                            
                            var arrr = [];
                            for(var g=0;g<64;g++){
                                if(checkArr[g]=='p' || checkArr[g]=='k' || checkArr[g]=='q' || checkArr[g]=='r' || checkArr[g]=='n' || checkArr[g]=='b'){
                                    arrr.push(g);
                                }
                            }
                            for(var p=0;p<arrr.length;p++){
                                var scope = checkWhite(arrr[p],checkArr) || [];
                                var temp = many;
                                for(var k = 0; k < scope.length; k++){
                                    if(checkArr[scope[k]] === 'l'){
                                        many = many + 1;
                                        break;
                                    }
                                }
                                if(many==temp+1){
                                    break;
                                }
                            }
                        }
                    }
                }
            }

            if(many==total){
                alert('Player II Wins! ');
                window.location="index.html";
            }
        }
        
        else{
            var many=0;
            var total=0;
            for(var x=0;x<64;x++){
                if(values[x]=='k' || values[x]=='q' || values[x]=='r' || values[x]=='b' || values[x]=='n' || values[x]=='p'){
                    var n = x;

                    var scopes= checkWhite(n,values) || [];
                    total = total + scopes.length;
                    var moveT=n;
                    if(scopes.length>0){
                        for(var z=0; z<scopes.length;z++){
                            n=scopes[z];
                            var checkArr = [];
                            for(var y = 0; y < 64; y++){
                                checkArr[y] = values[y];
                            }    
                            checkArr[n] = checkArr[moveT];
                            checkArr[moveT] = 0;
                            
                            var arrr = [];
                            for(var g=0;g<64;g++){
                                if(checkArr[g]=='o' || checkArr[g]=='l' || checkArr[g]=='w' || checkArr[g]=='t' || checkArr[g]=='m' || checkArr[g]=='v'){
                                    arrr.push(g);
                                }
                            }
                            for(var p=0;p<arrr.length;p++){
                                var scope = checkBlack(arrr[p],checkArr) || [];
                                var temp = many;
                                for(var k = 0; k < scope.length; k++){
                                    if(checkArr[scope[k]] === 'k'){
                                        many = many + 1;
                                        break;
                                    }
                                }
                                if(many==temp+1){
                                    break;
                                }
                            }
                        }
                    }
                }
            }
            if(many==total){
                alert('Player I Wins! ');
                window.location="index.html";
            }
        }
    }

    function check(){

        if(myTurn==0){
            var n = Number(this.classList[1].slice(1));
            var target = values[n];

            var scopes = checkBlack(n,values) || [];

            var x = n;

            if(moveable==0){
                if(scopes.length > 0){
                    moveable = 1;
                    moveTarget = n;
                    moveScopes = scopes.join(",").split(",");
                }
                
            }
            else if(moveable==1) {
                if(moveScopes.indexOf(String(n)) >= 0){
                    var checkArr = [];
                    var saveKing = false;
                    for(var z = 0; z < 64; z++){
                        checkArr[z] = values[z];
                    }
                    
                    checkArr[n] = checkArr[moveTarget];
                    checkArr[moveTarget] = 0;
                    
                    for(var y = 0; y < 64; y++){
                        if("prnbkq".indexOf(checkArr[y]) >= 0){
                            var checkScp = checkWhite(y,checkArr) || [];
                            for(var z = 0; z < checkScp.length; z++){
                                if(checkArr[checkScp[z]] === 'l'){
                                    if(!saveKing){
                                        alert('Player I, protect Your King');
                                        
                                        saveKing = true;
                                    }
                                }
                            }
                        }
                    }
                    
                    if(!saveKing){
                        restart();
                        var temp = values[n];
                        if(temp!==0){
                            these.push(temp);
                        }
                        values[n] = values[moveTarget];
                        values[moveTarget] = 0;
                        if(cl){
                            if(n === 62 && moveTarget === 60){
                                values[63] = 0;
                                values[61] = "t";
                            }
                            else if(n === 58 && moveTarget === 60){
                                values[59] = "t";
                                values[56] = 0;
                            }
                        }
                        if(moveTarget === 60){
                            ck = true;
                        }
                        else if(moveTarget === 63){
                            cr2 = true;
                        }
                        else if(moveTarget === 56){
                            cr1 = true;
                        }
                        if(values[n] === "o" && n < 8){
                            values[n] = "w";
                        }
                        moveable = 2;
                        scopes = [];
                        myTurn = 1;
                        document.getElementById("turn").innerHTML="Black's Turn";

                    }
                }
                else {
                    moveScopes = [];
                    moveable = 0;
                }
            }

            updateSquarecolor();
            
            
            for(var x = 0; x < 64; x++){
                sqs[x].innerHTML = fonts[values[x]];
                if(values[x] === 0){
                    sqs[x].innerHTML = "";
                }
            }

            for(var x=0;x<these.length; x++ ){
                rts[x].innerHTML = fonts [these[x]] ;


            }

            for(var x = 0; x < scopes.length; x++){
                sqs[scopes[x]].style.background = "#aaf";
            }
        }

        else if (myTurn==1) {
            var n = Number(this.classList[1].slice(1));
            var target = values[n];

            var scopes = checkWhite(n,values) || [];

            var x = n;

            if(moveable==2){
                if(scopes.length > 0){
                    moveable = 3;
                    moveTarget = n;
                    moveScopes = scopes.join(",").split(",");
                }
                
            }
            else if(moveable == 3) {
                if(moveScopes.indexOf(String(n)) >= 0){
                    var checkArr = [];
                    var saveKing = false;
                    for(var z = 0; z < 64; z++){
                        checkArr[z] = values[z];
                    }
                    
                    checkArr[n] = checkArr[moveTarget];
                    checkArr[moveTarget] = 0;
                    
                    for(var y = 0; y < 64; y++){
                        if("omvtlw".indexOf(checkArr[y]) >= 0){
                            var checkScp = checkBlack(y,checkArr) || [];
                            for(var z = 0; z < checkScp.length; z++){
                                if(checkArr[checkScp[z]] === 'k'){
                                    if(!saveKing){
                                        alert('Player II, Protect Your King');
                                        
                                        saveKing = true;
                                    }
                                }
                            }
                        }
                    }
                    
                    if(!saveKing){
                        restart();
                        var temp = values[n];
                        if(temp!==0){
                            those.push(temp);
                        }
                        values[n] = values[moveTarget];
                        values[moveTarget] = 0;
                        if(cl_){
                            if(n === 2 && moveTarget === 4){
                                values[0] = 0;
                                values[3] = "r";
                            }
                            else if(n === 6 && moveTarget === 4){
                                values[5] = "r";
                                values[7] = 0;
                            }
                        }
                        if(moveTarget === 4){
                            ck_ = true;
                        }
                        else if(moveTarget === 1){
                            cr2_ = true;
                        }
                        else if(moveTarget === 8){
                            cr1_ = true;
                        }
                        if(values[n] === "p" && n > 55){
                            values[n] = "q";
                        }
                        moveable = 0;
                        scopes = [];
                        myTurn = 0;
                        document.getElementById("turn").innerHTML="White's Turn";
        
                    }
                }
                else {
                    moveScopes = [];
                    moveable = 2;
                }
            }

            updateSquarecolor();

            
            for(var x = 0; x < 64; x++){
                sqs[x].innerHTML = fonts[values[x]];
                if(values[x] === 0){
                    sqs[x].innerHTML = "";
                }
            }

            for(var x=0;x<those.length; x++ ){
                rts1[x].innerHTML = fonts [those[x]] ;


            }

            for(var x = 0; x < scopes.length; x++){
                sqs[scopes[x]].style.background = "#aaf";
            }
        }
        setTimeout(checkmate,500);
    }



}















// date and day
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var d = today.getDate();
    var mo = today.getMonth() + 1;
    var y = today.getFullYear();
    m = checkTime(m);
    s = checkTime(s);
    
    // عرض الوقت فقط
   // document.getElementById('clock').innerHTML =
   //     h + ":" + m + ":" + s; 
    // إزالة عرض التاريخ
    // document.getElementById('day').innerHTML =
    // day + ", " + d + "." + mo + "." + y; 
    
  //  var t = setTimeout(startTime, 1000); // تعديل الوقت إلى 1000ms
}

function checkTime(i) {
    if (i < 10) { i = "0" + i; }
    return i;
}

// stopwatch code remains unchanged
var msvv = 0, svv = 0, mvv = 0;
var msvv2 = 0, svv2 = 0, mvv2 = 0;

var timervv;
var countsec = 0;
var countsec2 = 0;
var countmin = 0;

var stopwatchEl = document.querySelector('.stopwatch');

function start() {
    if (!timervv) {
        timervv = setInterval(run, 10);
    }
}

function pausee() {
    var ubb = document.getElementById("container");
    if (ubb.style.display === "none") {
        ubb.style.display = "block";
        start();
    } else {
        ubb.style.display = "none";
        pause();
    }
}

function run() {
    stopwatchEl.textContent = getTimer();
    maxxTime2();
    maxxTime();
    msvv++;
    msvv2++;
    if (msvv == 100) {
        msvv = 0;
        msvv2 = 0;
        svv++;
        svv2++;
    }
    if (svv2 == 60) {
        svv2 = 0;
        mvv2++;
    }
    if (svv == 60) {
        svv = 0;
        mvv++;
    }
}

function maxxTime2() {
    if (mvv2 >= 45) {
        alert("The time for this game has reached 45 minutes. So the game is drawn.\n Click ok to go to our home page.");
        window.location = "index.html";
    }

    if (mvv2 >= 30 && countsec2 == 0) {
        countsec2 = 1;
        alert("There are 15 more minutes left for the game,\n and after that it will be drawn.");
    }
}

function maxxTime() {
    if (mvv >= 1) {
        if (countmin == 0) {
            alert("Time limit exceeded. You Lose\n Now you will be redirected to our home page.");
            countmin = 1;
        }
        window.location = "index.html";
    }

    if (svv >= 45 && mvv < 1 && countsec == 0) {
        countsec = 1;
        alert("Move quickly.\nYou have only 15 sec left for this move\n\n\n\n\n\n ");
    }
}

function pause() {
    stopTimer();
}

function stop() {
    stopTimer();
    msvv = 0;
    svv = 0;
    mvv = 0;
    stopwatchEl.textContent = getTimer();
}

function stopTimer() {
    clearInterval(timervv);
    timervv = false;
}

function getTimer() {
    return (mvv < 10 ? "0" + mvv : mvv) + ":" + (svv < 10 ? "0" + svv : svv) + ":" + (msvv < 10 ? "0" + msvv : msvv);
}

function restart() {
    stop();
    start();
}