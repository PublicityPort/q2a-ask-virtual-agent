<?php
/*
Setting up the admin page options.
*/
class qa_ask_va_admin_config
{
  function admin_form(&$qa_content)
  {
    $saved=false;

    if (qa_clicked('ask_va_save_button')) {
      qa_opt('ask_va_on', (bool) qa_post_text('ask_va_on_cb'));
      qa_opt('ask_va_header_text', qa_post_text('ask_va_header_text_field'));
      qa_opt('ask_va_body_text', qa_post_text('ask_va_body_text_field'));
      $saved=true;
    }

    return array(
      'ok' => $saved ? 'Virtual Agent settings saved' : null,

      'fields' => array(
        array(
          'label' => 'Do you want to enable Virtual Agent?',
          'type' => 'checkbox',
          'value' => (bool)qa_opt('ask_va_on'),
          'tags' => 'NAME="ask_va_on_cb"',
        ),
        array(
            'label' => 'Header Text',
            'value' => qa_html(qa_opt('ask_va_header_text')),
            'tags' => 'name="ask_va_header_text_field"',
          ),
          array(
            'label' => 'Body Text: (HTML allowed)',
            'value' => qa_html(qa_opt('ask_va_body_text')),
            'tags' => 'name="ask_va_body_text_field"',
          ),
      ),

      'buttons' => array(
        array(
          'label' => 'Save Changes',
          'tags' => 'name="ask_va_save_button"',
        ),
      ),
    );
  }
}