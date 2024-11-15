<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo :attribute debe ser aceptado.',
'accepted_if' => 'El campo :attribute debe ser aceptado cuando :other es :value.',
'active_url' => 'El campo :attribute debe ser una URL válida.',
'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
'alpha' => 'El campo :attribute solo debe contener letras.',
'alpha_dash' => 'El campo :attribute solo debe contener letras, números, guiones y guiones bajos.',
'alpha_num' => 'El campo :attribute solo debe contener letras y números.',
'array' => 'El campo :attribute debe ser un arreglo.',
'ascii' => 'El campo :attribute solo debe contener caracteres alfanuméricos y símbolos de un solo byte.',
'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
'between' => [
    'array' => 'El campo :attribute debe tener entre :min y :max elementos.',
    'file' => 'El campo :attribute debe tener entre :min y :max kilobytes.',
    'numeric' => 'El campo :attribute debe estar entre :min y :max.',
    'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
],
'boolean' => 'El campo :attribute debe ser verdadero o falso.',
'confirmed' => 'La confirmación de :attribute no coincide.',
'date' => 'El campo :attribute debe ser una fecha válida.',
'email' => 'El campo :attribute debe ser una dirección de correo válida.',
'filled' => 'El campo :attribute debe tener un valor.',
'integer' => 'El campo :attribute debe ser un número entero.',
'max' => [
    'array' => 'El campo :attribute no debe tener más de :max elementos.',
    'file' => 'El campo :attribute no debe ser mayor que :max kilobytes.',
    'numeric' => 'El campo :attribute no debe ser mayor que :max.',
    'string' => 'El campo :attribute no debe ser mayor que :max caracteres.',
],
'min' => [
    'array' => 'El campo :attribute debe tener al menos :min elementos.',
    'file' => 'El campo :attribute debe tener al menos :min kilobytes.',
    'numeric' => 'El campo :attribute debe ser al menos :min.',
    'string' => 'El campo :attribute debe tener al menos :min caracteres.',
],
'required' => 'El campo :attribute es obligatorio.',
'unique' => 'El campo :attribute ya ha sido registrado.',
'url' => 'El campo :attribute debe ser una URL válida.',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
