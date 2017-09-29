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
      qa_opt('ask_va_api_on', (bool) qa_post_text('ask_va_api_on_cb'));
      $saved=true;
    }

    return array(
      'ok' => $saved ? 'Virtual Agent settings saved' : null,

      'fields' => array(
        array(
          'label' => 'Do you want to enable Virtual Agent?',
          'type' => 'checkbox',
          'value' => (bool)qa_opt('ask_va_api_on'),
          'tags' => 'NAME="ask_va_api_on_cb"',
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