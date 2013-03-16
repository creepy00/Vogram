var req;
var token;
var liid = 0;
var uslov;
// Get an XMLHttpRequest object in a portable way.
function newRequest()
{
  req = false;
  // For Safari, Firefox, and other non-MS browsers
  if (window.XMLHttpRequest) {
    try {
      req = new XMLHttpRequest();
    } catch (e) {
      req = false;
    } 
  } else if (window.ActiveXObject) {
    // For Internet Explorer on Windows
    try {
      req = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        req = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        req = false;
      }
    }
  }
}
function updatePage() {
try{
  //if (req.readyState == 3)
    if (req.status == 200){
	  var a = req.responseText.split("kukulele");
	  if (a[0]==token){
		sul = document.getElementById("searchul");
		box = document.getElementById("searchbox");
		sul.style.top = box.offsetTop + box.clientHeight + "px";
		sul.style.left = box.offsetLeft + "px";
		document.getElementById("searchul").innerHTML=a[1]; //req.responseText;
		selectone(0);
	  }
	 }
}catch(e){}
}
function randomString() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 8;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	return randomstring;
}


			function createli(value, event){
				searchul = document.getElementById("searchul");
				searchbox = document.getElementById("searchbox");
				//if (event.type=="keypress"){
				if (event.keyCode==40){
					liid++;
					if (liid>searchul.childNodes.length-1){liid=searchul.childNodes.length-1;}
				}
				if (event.keyCode==38){
					liid--;
					if (liid<0){liid=0;}
				}
				if (event.keyCode==13){
					clickon(liid);
				}
				selectone(liid);
				//newli = document.createElement("span");
				//alert(event.keyCode + "   " + keycode.keyCodeMap[event.keyCode]);
				//if (event.keyCode>0){
				if ((keycode.keyCodeMap[event.keyCode]) != undefined){
				//newli.innerHTML = event.charCode; // searchbox.value;
				//newli.setAttribute("text-overflow", "ellipsis");
				//newli.setAttribute("style", "display: block;");
				if (event.charCode>0){
					value = value + String.fromCharCode(event.charCode);
				}
				if (document.getElementById('stra').checked){uslov=document.getElementById('stra').value;}
				if (document.getElementById('pred').checked){uslov=document.getElementById('pred').value;}
				if (document.getElementById('roci').checked){uslov=document.getElementById('roci').value;}
				trazi(value,uslov);
								
				//document.body.insertBefore(newli, searchul);
				//searchul.insertBefore(newli);
				//searchul.appendChild(newli);
				//}
				}
				selectone(liid);
			}
			function uslovpretrage(kliknuto){
				selectone(liid);
				uslov = kliknuto;
				trazi(document.getElementById("searchbox").value,kliknuto);
				setFocus();
				selectone(liid);
			}
			function selectone(one){
				for (var i =0; i< searchul.childNodes.length; i++){
					if (i==one){
						searchul.childNodes[i].setAttribute("style", "display: block; background-color:gray;");
						liid=one;
					} else {
						searchul.childNodes[i].setAttribute("style", "display: block; background-color:lightgray;");
					}
				}
			}
function clickon(id){
	window.location = searchul.childNodes[id].href;
}
			
function setFocus() {
			document.getElementById("searchbox").focus();
}
		
function mouseover(id){
	selectone(id);
}

keycode = {
    getKeyCode : function(e) {
        var keycode = null;
        if(window.event) {
            keycode = window.event.keyCode;
        }else if(e) {
            keycode = e.which;
        }
        return keycode;
    },
    getKeyCodeValue : function(keyCode, shiftKey) {
        shiftKey = shiftKey || false;
        var value = null;
        if(shiftKey === true) {
            value = this.modifiedByShift[keyCode];
        }else {
            value = this.keyCodeMap[keyCode];
        }
        return value;
    },
    getValueByEvent : function(e) {
        return this.getKeyCodeValue(this.getKeyCode(e), e.shiftKey);
    },
    keyCodeMap : {
        8:"backspace", 13:"return", 32:" ", 43:"+", 46:"delete",
        48:"0", 49:"1", 50:"2", 51:"3", 52:"4", 53:"5", 54:"6", 55:"7", 56:"8", 57:"9", 59:";",
        61:"=", 65:"a", 66:"b", 67:"c", 68:"d", 69:"e", 70:"f", 71:"g", 72:"h", 73:"i", 74:"j", 75:"k", 76:"l",
        77:"m", 78:"n", 79:"o", 80:"p", 81:"q", 82:"r", 83:"s", 84:"t", 85:"u", 86:"v", 87:"w", 88:"x", 89:"y", 90:"z",
        96:"0", 97:"1", 98:"2", 99:"3", 100:"4", 101:"5", 102:"6", 103:"7", 104:"8", 105:"9",
        106: "*", 107:"+", 109:"-", 110:".", 111: "/",
        186:";", 187:"=", 188:",", 189:"-", 190:".", 191:"/", 192:"`", 219:"[", 220:"\\", 221:"]", 222:"'"
    },
    modifiedByShift : {
        192:"~", 48:")", 49:"!", 50:"@", 51:"#", 52:"$", 53:"%", 54:"^", 55:"&", 56:"*", 57:"(", 109:"_", 61:"+",
        219:"{", 221:"}", 220:"|", 59:":", 222:"\"", 188:"<", 189:">", 191:"?",
        96:"insert", 97:"end", 98:"down", 99:"pagedown", 100:"left", 102:"right", 103:"home", 104:"up", 105:"pageup"
    }
};