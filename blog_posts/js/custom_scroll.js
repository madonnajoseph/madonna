(function($){
    
    $(document).ready(function(){
  /*Function to Change Input File Shape*/
//    
//    $('input[type=file]').wrap('<div class="fileTypeHack" /> ');
//    $('.fileTypeHack').bind('mousemove',function(e) {
//        var offset = $(this).offset();
//        $(this).find('input').css({
//            'top': e.pageY - offset.top - ($('.fileTypeHack input').innerHeight() / 2), //centers verticaly
//            'left': e.pageX - offset.left - ($('.fileTypeHack input').innerWidth() * 0.95) // moves the right part under the cursor
//        });
//    });
//
//    $('html').on("change", 'input[type=file]', function () {
//        var input = this.outerHTML; // we save html of the current input
//        var file = this.value.split("\\"); // we split the string by "\" character
//        var imageName = file[file.length - 1]; //we get the name of the file
//        /* and if it's too long (depends on the width of your input)
//        we will truncate it and prepend "..." before the string*/
//
//        var truncLenght = 14;
//        var fileNameLength = file[file.length - 1].length;
//        if (fileNameLength > truncLenght) {
//            var truncatedName = "..." + imageName.substring((fileNameLength - truncLenght)); // shows 14 last characters of the string
//        } else {
//            var truncatedName = imageName
//        };
//        //then we recreate the content of the wrapper
//        $(this).parent().find('span').remove();
//        $('' + truncatedName + '').insertBefore(this); // posledni prvvek ze splitu, tj. jmeno souboru + prida input
//    });
//    
//    
//    
    
        var textArea=$("textarea.purple");
        textArea.wrap("<div class='textarea-wrapper' />");
      
        var textAreaWrapper=textArea.parent(".textarea-wrapper");
        textAreaWrapper.mCustomScrollbar({
            scrollInertia:0,
            advanced:{
                autoScrollOnFocus:false
            }
        });
        var hiddenDiv=$(document.createElement("div")),
        content=null;
        hiddenDiv.addClass("hiddendiv");
        $("body").prepend(hiddenDiv);
        textArea.bind("keyup",function(e){
            content=$(this).val();
            var clength=content.length;
            var cursorPosition=textArea.getCursorPosition();
            content="<span>"+content.substr(0,cursorPosition)+"</span>"+content.substr(cursorPosition,content.length);
            content=content.replace(/\n/g,"<br />");
            hiddenDiv.html(content+"<br />");
            $(this).css("height",hiddenDiv.height());
            textAreaWrapper.mCustomScrollbar("update");
            var hiddenDivSpan=hiddenDiv.children("span"),
            hiddenDivSpanOffset=0,
            viewLimitBottom=(parseInt(hiddenDiv.css("min-height")))-hiddenDivSpanOffset,
            viewLimitTop=hiddenDivSpanOffset,
            viewRatio=Math.round(hiddenDivSpan.height()+textAreaWrapper.find(".mCSB_container").position().top);
            if(viewRatio>viewLimitBottom || viewRatio<viewLimitTop){
                if((hiddenDivSpan.height()-hiddenDivSpanOffset)>0){
                    textAreaWrapper.mCustomScrollbar("scrollTo",hiddenDivSpan.height()-hiddenDivSpanOffset);
                }else{
                    textAreaWrapper.mCustomScrollbar("scrollTo","top");
                }
            }
        });
        $.fn.getCursorPosition=function(){
            var el=$(this).get(0),
            pos=0;
            if("selectionStart" in el){
                pos=el.selectionStart;
            }else if("selection" in document){
                el.focus();
                var sel=document.selection.createRange(),
                selLength=document.selection.createRange().text.length;
                sel.moveStart("character",-el.value.length);
                pos=sel.text.length-selLength;
            }
            return pos;
        }
    });
  

})(jQuery);

