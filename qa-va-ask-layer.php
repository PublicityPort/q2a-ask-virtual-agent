<?php


class qa_html_theme_layer extends qa_html_theme_base {
    
    function head_script(){
        qa_html_theme_base::head_script();
        // only load if enabled
        if(qa_opt('ask_va_on')) {
            $this->output('<script type="text/javascript" charset="utf-8" async="async" src="'.QA_HTML_THEME_LAYER_URLTOROOT.'va.js"></script>');
            $this->output('<link rel="stylesheet" type="text/css" href="'.QA_HTML_THEME_LAYER_URLTOROOT.'va.css">');

            $this->output('<script type="text/javascript" charset="utf-8" async="async">
                window.onload = function(){
                    popup_heading = "'.qa_opt('ask_va_header_text').'";
                    va_icon_image = "http://www.nohold.com/images/channelsvirtualassistant.png?crc=4129436398";
                    popup_elements = "<p>'.qa_opt('ask_va_body_text').'</p>";
                    popup_elements += "<input class=\"askbox\" type=\"text\" name=\"askbox\" />";
                    register_popup(popup_heading);
                    change_popup_elements(popup_elements);
                };
            </script>');  
            
            
        } // end enabled
    } // end head_script
}
