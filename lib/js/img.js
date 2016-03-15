leftdisabled = true
rightdisabled = true
widthLength = 640

function fp_ie4() {
	var nav = navigator.appVersion.indexOf("MSIE");
	return (nav>0) && (parseInt(navigator.appVersion.substring(nav+5, nav+6)) >= 4);
}

function fp_ns6() {
	return ((navigator.appName == "Netscape") &&
				(parseInt(navigator.appVersion.substring(0, 1)) >= 5))
}

function fp_ShowImg(src, sWidth, sHeight, sID, iIndex)
{	
	var el = document.images["setIMG_" + sID];
	if (el) {
		if(fp_ie4()) {
			el.style.visiblity = "hidden";
			el.src = src.getAttribute ? src.getAttribute("lowsrc") : src.lowsrc;
			el.width = sWidth;
			el.height = sHeight;
				
			var caption = document.all["fpGalleryCaptions_" + sID].all.tags("div")
			var sCaptionTxt;
			var sCaptionHTML;
			
			if (caption && caption[iIndex]) {
				sCaptionTxt = caption[iIndex].innerText
				sCaptionHTML = caption[iIndex].innerHTML
			} else {
				sCaptionTxt = "";
				sCaptionHTML = "";
			}
			
			el.title = sCaptionTxt;
			el.style.visiblity = "visible";
			
			var el = document.all["fpGalleryCaptionCell_" + sID];
			if (el) {
				el.innerHTML = sCaptionHTML;
			}
			
			var el = document.all["fpGalleryDescCell_" + sID];
			if (el) {
				var sDesc = document.all["fpGalleryDescriptions_" + sID].all.tags("div")
				el.innerHTML = sDesc && sDesc[iIndex]?sDesc[iIndex].innerHTML:"";
			}
		} else {
			el.src = src.getAttribute ? src.getAttribute("lowsrc") : src.lowsrc
			el.style.width = sWidth
			el.style.height = sHeight

			caption = document.getElementById("fpGalleryCaptions_" + sID).getElementsByTagName("div")			
			if (caption && caption[iIndex]) {
				sCaptionTxt = caption[iIndex].innerText
				sCaptionHTML = caption[iIndex].innerHTML
			} else {
				sCaptionTxt = ""
				sCaptionHTML = ""
			}
		
			el.title = sCaptionTxt			
			var e = document.getElementById("fpGalleryCaptionCell_" + sID)
			if (e) {
				e.innerHTML = sCaptionHTML
			}
			
			var e = document.getElementById("fpGalleryDescCell_" + sID)
			if (e) {
				var sDesc = document.getElementById("fpGalleryDescriptions_" + sID).getElementsByTagName("div")
				e.innerHTML = sDesc[iIndex]?sDesc[iIndex].innerHTML:""
			}

		}
	}
}