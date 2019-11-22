<?php
/**
 * Autocomplete Helper
 *
 * @author  Nik Chankov
 * @website http://nik.chankov.net
 * @version 1.0.0
 *
 * @updated   2008-02-13
 * @author    Abdullah
 * @website   http://abdullahsolutions.com
 * @changes   Used helpers array. Also used beforeRender so that the javascripts and theme is automatically loaded
 *
 * @updated   2008-02-17
 * @author    Abdullah
 * @website   http://abdullahsolutions.com
 * @changes   Used classregistry getobject to get a view and addscript function of view to set javascript load in header
 */

class DatePickerHelper extends FormHelper {

    var $format = '%Y-%m-%d';
    var $helpers = array('Javascript','Html');

    /**
     *Setup the format if exist in Configure class
     */
    function _setup(){
        $format = Configure::read('DatePicker.format');
        if($format != null){
            $this->format = $format;
        }
        else{
            $this->format = '%d/%m/%Y';
        }
    }

    function beforeRender(){
        $view = ClassRegistry::getObject('view');
        $view->addScript($this->Javascript->link('jscalendar/calendar.js'));
        $view->addScript($this->Javascript->link('jscalendar/lang/calendar-fr.js'));
        $view->addScript($this->Javascript->link('common.js'));
        $view->addScript($this->Html->css('../js/jscalendar/skins/aqua/theme'));
    }

    /**
     * The Main Function - picker
     *
     * @param string $field Name of the database field. Possible usage with Model.
     * @param array $options Optional Array. Options are the same as in the usual text input field.
     */  
    function picker($fieldName, $options = array()) {
        $this->_setup();
       // $this->setFormTag($fieldName);
        $this->setEntity($fieldName);
        $htmlAttributes = $this->domId($options);      
        $divOptions['class'] = 'date';
        $options['type'] = 'text';
        $options['div']['class'] = 'date';
        $time='';
        if(isset($options['showstime'])){
            if($options['showstime']===true) {
                $time=',"24"';
                $this->format.=" %k:%M";
            }
            unset($options['showstime']);
        }
        $options['after'] = $this->Html->link($this->Html->image('../js/jscalendar/img.gif'), '#', array('onClick'=>"return showCalendar('".$htmlAttributes['id']."', '".$this->format."'$time); return false;"), null, false);
        $output = $this->input($fieldName, $options);

        return $output;
    }

    function flat($fieldName, $options = array()){
        $this->_setup();
        $this->setFormTag($fieldName);
        $htmlAttributes = $this->domId($options);      
        $divOptions['class'] = 'date';
        $options['type'] = 'hidden';
        $options['div']['class'] = 'date';
        $hoder = '
';
        $output = $this->input($fieldName, $options).$hoder;

        return $output;
    }
}
?>