uc_extra_fields_pane module
------------------------
by blackice78, MegaChriz and panthar

This modules allows an administrator to define additional (billing and 
shipping) address fields (i.e. VAT) in Ubercart e-commerce suite. These
fields will be available during checkout process and in order handling
pages.

With this module an administrator has a flexible way to define one or
more address fields at
/admin/store/settings/countries/fields

These fields will appear to customers during the checkout process and
will be saved at the end of this process on a separate database table for
later use.
The additional address fields will appear in the original delivery 
and billing pane, provided by Ubercart.

DEPENDENCIES
------------
This module requires Ubercart 7.x-3.0-rc3 or higher.

INSTALLATION
------------
  * Copy the module's directory to your modules directory
    and activate it.
  * Go to /admin/store/settings/countries/fields
    for defining extra address fields

The module will add two tables: uc_extra_fields and uc_extra_fields_values.

ABOUT THE FIELD TYPES
------------
  * Textfield
    This field type adds a simple text field to the form. This field can be
    pre-filled with a default value.
  * Select list
    This field type adds a selection field to the form (users can select a value
    from a dropdown menu). In the value section you can define the available
    options in the format "safe_key|readable part". The *safe_key* part is the
    part that will be saved in the database. The *readable* part is what will be
    presented to the user. IMPORTANT NOTE: if you want to make this field
    required, make sure that the first option of the list has an *empty* safe key.
    You can insert an empty safe key by typing a space.
    Example:
     |Please select
    option1|Option 1
    option2|Option 2
  * Checkbox
    This field type adds a checkbox to the form.
  * Constant
    This field type adds a value to the form which can not be changed
    by the customer. It is just displayed as plain text. However, admins who
    can change the Ubercart order are able to adjust the value of this field, 
    because then it's displayed as a text field.
  * PHP string
    This field type is similar to the constant field type. The difference is that
    the shown value can be defined with PHP code, which means you could get this
    value from everywhere. In the value section you should return a string, for
    example:
    <?php return "A string"; ?>
  * PHP select list
    This field type is similar to the select list field type. The difference is that
    you can build the option list with PHP. Be sure to return an array with 'key' => 'value'.
    IMPORTANT NOTE: if you want to make this field required, make sure that the first
    option has an *empty* key. This may be a space, but it can also be an empty string.
    Example:
    <?php
      return array(
        '' => 'Please select',
        'option1' => 'Option 1',
        'option2' => 'Option 2',
      );
    ?>


VIEWS INTEGRATION
------------
Views integration for Extra Fields Pane 7.x-1.x is planned, but it's not available
yet.

MAINTAINERS
------------
MegaChriz
blackice78
panthar
