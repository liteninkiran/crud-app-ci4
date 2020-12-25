<?php

    /**
    *  build_array_from_object
    *
    *  Takes an object and returns an array with a specified field as the key and value
    *
    *  @param   $object     This should be an object populated with the rows you wish to be in the array.
    *  @param   $value      This is the field you want as the value
    *  @param   $key        This is the field you want as the key
    *  @return  array
    */

    function build_array_from_object($object, $value, $none = FALSE, $none_txt = 'ALL', $key = 'id', $none_val = null)
    {
        $array = array();

        if($none)
        {
            $array[$none_val] = $none_txt;
        }

        foreach($object as $o)
        {
            $array[$o->$key] = $o->$value;
        }

        return $array;
    }

    // Identical to form_dropdown from form_helper.php, but makes the selected options disabled
    function form_dropdown_2($data = '', $options = [], $selected = [], $extra = '', $disabled = []): string
    {
        $selAttr = ' selected';
        $disAttr = ' disabled';

        $defaults = [];
        if (is_array($data))
        {
            if (isset($data['selected']))
            {
                $selected = $data['selected'];
                unset($data['selected']); // select tags don't have a selected attribute
            }
            if (isset($data['options']))
            {
                $options = $data['options'];
                unset($data['options']); // select tags don't use an options attribute
            }
        }
        else
        {
            $defaults = ['name' => $data];
        }

        is_array($selected) || $selected = [$selected];
        is_array($options) || $options   = [$options];
        is_array($disabled) || $disabled   = [$disabled];

        // If no selected state was submitted we will attempt to set it automatically
        if (empty($selected))
        {
            if (is_array($data))
            {
                if (isset($data['name'], $_POST[$data['name']]))
                {
                    $selected = [$_POST[$data['name']]];
                }
            }
            elseif (isset($_POST[$data]))
            {
                $selected = [$_POST[$data]];
            }
        }

        $extra    = stringify_attributes($extra);
        $multiple = (count($selected) > 1 && stripos($extra, 'multiple') === false) ? ' multiple="multiple"' : '';
        $form     = '<select ' . rtrim(parse_form_attributes($data, $defaults)) . $extra . $multiple . ">\n";
        foreach ($options as $key => $val)
        {
            $key = (string) $key;
            if (is_array($val))
            {
                if (empty($val))
                {
                    continue;
                }
                $form .= '<optgroup label="' . $key . "\">\n";
                foreach ($val as $optgroup_key => $optgroup_val)
                {
                    $sel   = in_array($optgroup_key, $selected) ? $selAttr : '';
                    $dis   = in_array($optgroup_key, $disabled) ? $disAttr : '';
                    $form .= '<option value="' . htmlspecialchars($optgroup_key) . '"' . $sel . $dis . '>'
                            . $optgroup_val . "</option>\n";
                }
                $form .= "</optgroup>\n";
            }
            else
            {
                $form .= '<option value="' . htmlspecialchars($key) . '"'
                        . (in_array($key, $selected) ? $selAttr : '')
                        . (in_array($key, $disabled) ? $disAttr : '') . '>'
                        . $val . "</option>\n";
            }
        }

        return $form . "</select>\n";
    }

    function valueToNull($val)
    {
        $newVal = $val;

        if($newVal == '' || $newVal == '0')
        {
            $newVal = null;
        }

        return $newVal;
    }
?>
