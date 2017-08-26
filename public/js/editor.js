function iFrameOn()
{
	richTextField.document.designMode = 'On';

}
function iBold()
{
	richTextField.document.execCommand('bold',false,null);
	
}
function iUnderline()
{
	richTextField.document.execCommand('underline',false,null);
	
}
function iItalic()
{
	richTextField.document.execCommand('italic', false,null);
}
function iFontSize()
{
	var size = prompt ('Unesite veličnu 1 - 12', '');
	richTextField.document.execCommand('FontSize', false, size);
}
function iFontColor()
{
	var color = prompt('Unesite naziv boje ili hex broj:', '');
	richTextField.document.execCommand('FontColor',false,color);
	
}
function iHorizontalLine()
{
	richTextField.document.execCommand('inserthorizontalrule',false,null);
	
}
function iUnorderedList()
{
	richTextField.document.execCommand("InsertUnorderedList", false, "newUL");
}
function iOrderedList()
{
	richTextField.document.execCommand("InsertOrderedList", false, "newOL");
	
}
function iLink()
{
	var linkUrl = prompt ("Unesite URL link: ", "http://");
	richTextField.document.execCommand("CreateLink",false, linkUrl);
	
}
function iUnLink()
{
	richTextField.document.execCommand("Unlink",false, null);
}


function openedFile()
{
	var sadrzaj = document.getElementById("myTextArea").value;
   	richTextField.document.execCommand('insertHTML',false, sadrzaj);
	//nazivDoc.document.write(naziv);
}
function chosePic(objButton)
{
    var visina = prompt ("Unesite visinu slike u px: ", "");
    var duzina = prompt ("Unesite dužinu slike u px: ", "");
	
    var imgSrc = objButton.value;
    if(imgSrc != null)
    {
       richTextField.document.execCommand('insertHTML',false,'<img width="'+duzina+'" height="'+visina+'" src="'+imgSrc+'">');
    }
}
function submit_form()
{
	var theForm = document.getElementById("myform");
	theForm.elements["myTextArea"].value = window.frames['richTextField'].document.body.innerHTML;
	theForm.submit();
	
}

$(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
 
        e.preventDefault();
    });
 
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
 
        e.preventDefault();
    });
});