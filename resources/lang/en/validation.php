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

    'accepted' => 'L\' :attribute doit être accepté.',
    'active_url' => 'L\' :attribute n\'est pas une URL valide.',
    'after' => 'L\' :attribute doit être une date après :date.',
    'after_or_equal' => 'L\' :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'L\' :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'L\' :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'L\' :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'L\' :attribute doit être un tableau.',
    'before' => 'L\' :attribute doit être une date avant :date.',
    'before_or_equal' => 'L\' :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le :attribute doit être compris entre :max.',
        'file' => 'Le :attribute doit être entre :min et :max kilo-octets.',
        'string' => 'Le :attribute doit être entre :min et:max caractères.',
        'array' => 'Le :attribute doit avoir entre :min et :max éléments.',
    ],
    'boolean' => 'Le :attribute doit être vrai ou faux.',
    'confirmed' => 'Le :attribute de confirmation ne correspond pas.',
    'date' => 'Cette :attribute n\'est pas une date valide.',
    'date_equals' => 'Le :attribute doit être une date égale à :date.',
    'date_format' => 'Le :attribute ne correspond pas au format :format.',
    'different' => 'Le   :attribute et :other doit être différent.',
    'digits' => 'Le :attribute doit être :digits chiffres.',
    'digits_between' => 'Le :attribute doit être entre :min et :max chiffres.',
    'dimensions' => 'L\' :attribute a des dimensions non valides.',
    'distinct' => 'Le :attribute a une valeur en double.',
    'email' => 'L\' :attribute doit être une adresse e-mail valide.',
    'ends_with' => 'Le :attribute doit se terminer par l\'un des éléments suivants : :values',
    'exists' => 'Cet élément :attribute est invalide.',
    'file' => 'Cet :attribute doit être un fichier.',
    'filled' => 'Cet :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le :attribute doit être supérieur à :value.',
        'file' => 'Le :attribute doit être supérieur à :value Kb.',
        'string' => 'Le :attribute doit être supérieur à :value Caractères.',
        'array' => 'Le :attribute doit avoir plus de :value éléments.',
    ],
    'gte' => [
        'numeric' => 'Le :attribute doit être supérieur ou égal :value.',
        'file' => 'Le :attribute doit être supérieur ou égal à :value Kb.',
        'string' => 'Le :attribute doit être supérieur ou égal :value caractères.',
        'array' => 'Cet :attribute doit avoir :value éléments ou plus.',
    ],
    'image' => 'Le :attribute doit être une image.',
    'in' => 'La sélection :attribute est invalide.',
    'in_array' => 'Le :attribute n\'existe pas dans :other.',
    'integer' => 'Le :attribute doit être un entier.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'Le champ :attribute est obligatoire',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'Cet:attribute a déjà été pris.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
