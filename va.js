//this function can remove a array element.
Array.remove = function(array, from, to) {
    var rest = array.slice((to || from) + 1 || array.length);
    array.length = from < 0 ? array.length + from : from;
    return array.push.apply(array, rest);
};

//this variable represents the total number of popups can be displayed according to the viewport width
var total_popups = 0;
var popup_heading = "";
var va_icon_image = "";
var popup_elements = "";
//arrays of popups ids
var popups = [];

//this is used to close a popup
function close_popup(id)
{
    for(var iii = 0; iii < popups.length; iii++)
    {
        if(id == popups[iii])
        {
            Array.remove(popups, iii);
            
            document.getElementById(id).style.display = "none";
            
            calculate_popups();
            display_virtual_agent_icon();
            return;
        }
    }
     
}

//displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
function display_popups()
{
    var right = 10;
    
    var iii = 0;
    for(iii; iii < total_popups; iii++)
    {
        if(popups[iii] != undefined)
        {
            var element = document.getElementById(popups[iii]);
            element.style.right = right + "px";
            right = right + 320;
            element.style.display = "block";
        }
    }
    
    for(var jjj = iii; jjj < popups.length; jjj++)
    {
        var element = document.getElementById(popups[jjj]);
        element.style.display = "none";
    }
}

//creates markup for a new popup. Adds the id to popups array.
function register_popup(popup_heading)
{
    var id = "ask-va-popup";
    remove_virtual_agent_icon();
    for(var iii = 0; iii < popups.length; iii++)
    {   
        //already registered. Bring it to front.
        if(id == popups[iii])
        {
            Array.remove(popups, iii);
        
            popups.unshift(id);
            
            calculate_popups();
            
            
            return;
        }
    }               
    
    var element = '<div class="popup-box chat-popup" id="'+ id +'">';
    element = element + '<div class="popup-head">';
    element = element + '<div class="popup-head-left">'+ popup_heading +'</div>';
    element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
    element = element + '<div style="clear: both"></div></div><div class="popup-messages">';

    //element = element + popup_elements;
    element = element + '</div></div>';
    
    document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  

    popups.unshift(id);
            
    calculate_popups();
    
}

function display_virtual_agent_icon(){
    var element = '<div class="virtual-agent-icon">';
    element = element + '<a href="javascript:register_popup(popup_heading);">';
    element = element + '<img src="'+va_icon_image+'" />';
    element = element + '</a>';
    element = element + '</div>';
    document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  
}

function change_popup_elements(popup_elements){
    document.getElementsByClassName('popup-messages')[0].innerHTML += popup_elements;
}


function remove_virtual_agent_icon(){
    var element = document.getElementsByClassName("virtual-agent-icon")[0];
    if(element != null){
        element.remove();
    }
}

//calculate the total number of popups suitable and then populate the toatal_popups variable.
function calculate_popups()
{
    var width = window.innerWidth;
    if(width < 540)
    {
        total_popups = 0;
    }
    else
    {
        width = width - 200;
        //320 is width of a single popup box
        total_popups = parseInt(width/320);
    }
    
    display_popups();
    
}

//recalculate when window is loaded and also when window is resized.
window.addEventListener("resize", calculate_popups);
window.addEventListener("load", calculate_popups);