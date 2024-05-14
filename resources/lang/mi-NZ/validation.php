<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => 'Ko te: me whakaae te huanga.',
    'active_url'           => 'Ko: ko te huanga ehara i te URL whaimana.',
    'after'                => 'Ko: ko te huanga me te ra i muri i: ra.',
    'after_or_equal'       => 'Ko: ko te huanga me te ra i muri i te waa ranei: te ra.',
    'alpha'                => 'Ko te: ko te huanga anake he reta.',
    'alpha_dash'           => 'Ko te: ko te huanga anake he reta, he tau, he panga.',
    'alpha_num'            => 'Ko te: ko te huanga anake he reta me nga tau.',
    'array'                => 'Ko te: me tohu he huanga.',
    'before'               => 'Ko: ko te huanga me te ra i mua i: ra.',
    'before_or_equal'      => 'Ko: ko te huanga me he ra i mua atu i te wa ranei: te ra.',
    'between'              => [
        'numeric' => 'Te: ko te tohu i waenganui i: min me te: max.',
        'file'    => 'Ko: ko te tohu i waenganui i: min me te: max kilobytes.',
        'string'  => 'Ko te: ko te tohu i waenganui i: min me te: max.',
        'array'   => 'Ko te: ko te tohu i waenganui i: min me te: max max.',
    ],
    'boolean'              => 'Ko: Ko te waahi tohu he pono, he teka ranei.',
    'confirmed'            => 'Ko: ko te tohu whakatairanga kaore e taurite.',
    'date'                 => 'Ko: ko te huanga ehara i te ra whaimana.',
    'date_format'          => 'Ko: ko te huanga kaore e rite ki te horopaki: te whakatakotoranga.',
    'different'            => 'Ko: te huanga me: me wehe ke atu.',
    'digits'               => 'Ko: ko te tohu: ko nga nama tau.',
    'digits_between'       => 'Ko te: ko te tohu i waenganui i: min me te: max tohu.',
    'dimensions'           => 'Ko te: ko te ahuatanga o te ahua o te ahua o te whakapakoko.',
    'distinct'             => 'Ko te: ko te tahua huanga ko te uara taapiri.',
    'email'                => 'Ko te: ko te huanga he wahitau īmēra tika.',
    'exists'               => 'Ko te mea i tīpakohia: he muhu te huanga.',
    'file'                 => 'Ko: ko te huanga he kōnae.',
    'filled'               => 'Ko: Ko te waahi tohu ka whai hua.',
    'image'                => 'Ko te: me kii he huanga.',
    'import_field_empty'    => 'The value for :fieldname cannot be null.',
    'in'                   => 'Ko te mea i tīpakohia: he muhu te huanga.',
    'in_array'             => 'Ko te: ko te waahi huanga kaore i roto i: atu.',
    'integer'              => 'Ko te: ko te huanga me he tau.',
    'ip'                   => 'Ko: ko te huanga me waiho he wāhitau IP tika.',
    'ipv4'                 => 'Ko: ko te huanga me waiho he wāhitau IPv4 tika.',
    'ipv6'                 => 'Ko te: me tohu he huanga IPv6 tika.',
    'is_unique_department' => 'The :attribute must be unique to this Company Location',
    'json'                 => 'Ko: he tohu JSON tika te huanga.',
    'max'                  => [
        'numeric' => 'Ko te: ko te huanga ka nui atu i te: max.',
        'file'    => 'Ko te: ko te huanga ka nui atu i te: max kilobytes.',
        'string'  => 'Ko te: ko te huanga kaore e nui atu i: max tohu.',
        'array'   => 'Ko te: ko te huanga kaore i nui atu i: te maha o nga mea.',
    ],
    'mimes'                => 'Ko: ko te huanga he kōnae o te momo:: uara.',
    'mimetypes'            => 'Ko: ko te huanga he kōnae o te momo:: uara.',
    'min'                  => [
        'numeric' => 'Ko: ko te tikanga kia iti ake: min.',
        'file'    => 'Ko te: ko te tikanga kia iti ake: min kilobytes.',
        'string'  => 'Ko te: ko te tohu ko te iti rawa: min.',
        'array'   => 'Ko te: me whai i te huanga: iti rawa nga taonga.',
    ],
    'starts_with'          => 'The :attribute must start with one of the following: :values.',
    'ends_with'            => 'The :attribute must end with one of the following: :values.',

    'not_in'               => 'Ko te mea i tīpakohia: he muhu te huanga.',
    'numeric'              => 'Ko te: me tohu he huanga.',
    'present'              => 'Ko te: ko te waahi tohu kia noho.',
    'valid_regex'          => 'That is not a valid regex. ',
    'regex'                => 'Ko te: ko te hōputu huanga he muhu.',
    'required'             => 'Ko te: e hiahiatia ana te waahi huanga.',
    'required_if'          => 'Ko te: ka hiahiatia te waahi huanga ina: ko etahi atu: te uara.',
    'required_unless'      => 'Ko: E hiahiatia ana te waahi huanga engari: ko etahi atu kei roto: nga uara.',
    'required_with'        => 'Ko: e hiahiatia ana te waahi huanga ina: kei te waahi nga uara.',
    'required_with_all'    => 'Ko: e hiahiatia ana te waahi huanga ina: kei te waahi nga uara.',
    'required_without'     => 'Ko: e hiahiatia ana te waahi huanga ka: kaore nga uara i te wa.',
    'required_without_all' => 'Ko te: ka hiahiatia te waahi huanga kaore he: ko nga uara kei reira.',
    'same'                 => 'Ko: te huanga me te: me uru atu tetahi atu.',
    'size'                 => [
        'numeric' => 'Ko: ko te huanga: te rahi.',
        'file'    => 'Ko te: ko te tohu: ko te rahi o nga kaitao.',
        'string'  => 'Ko: ko te tohu: ko te rahi o te kaituhi.',
        'array'   => 'Ko te: me whai kohinga: nga taonga rahi.',
    ],
    'string'               => 'Ko te: me tohu he huanga.',
    'timezone'             => 'Ko: ko te huanga he waa whaimana.',
    'two_column_unique_undeleted' => 'The :attribute must be unique across :table1 and :table2. ',
    'unique'               => 'Ko te: kua tangohia te huanga.',
    'uploaded'             => 'Ko te: ko te huanga i rahua te tuku.',
    'url'                  => 'Ko te: ko te hōputu huanga he muhu.',
    'unique_undeleted'     => 'Ko te: me tino ahurei te huanga.',
    'non_circular'         => 'The :attribute must not create a circular reference.',
    'not_array'            => ':attribute cannot be an array.',
    'disallow_same_pwd_as_user_fields' => 'Password cannot be the same as the username.',
    'letters'              => 'Password must contain at least one letter.',
    'numbers'              => 'Password must contain at least one number.',
    'case_diff'            => 'Password must use mixed case.',
    'symbols'              => 'Password must contain symbols.',
    'gte'                  => [
        'numeric'          => 'Value cannot be negative'
    ],
    'checkboxes'           => ':attribute contains invalid options.',
    'radio_buttons'        => ':attribute is invalid.',


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
        'alpha_space' => 'Ko te: kei roto i te waahi tohu he momo e kore e whakaaetia.',
        'email_array'      => 'Kotahi, neke atu ranei nga wahitau īmēra he muhu.',
        'hashed_pass'      => 'He hē tō kupuhipa o nāianei',
        'dumbpwd'          => 'He noa rawa te kupuhipa.',
        'statuslabel_type' => 'Me tīpako i te momo tahua tohu whaimana',

        // date_format validation with slightly less stupid messages. It duplicates a lot, but it gets the job done :(
        // We use this because the default error message for date_format is reflects php Y-m-d, which non-PHP
        // people won't know how to format. 
        'purchase_date.date_format'     => 'The :attribute must be a valid date in YYYY-MM-DD format',
        'last_audit_date.date_format'   =>  'The :attribute must be a valid date in YYYY-MM-DD hh:mm:ss format',
        'expiration_date.date_format'   =>  'The :attribute must be a valid date in YYYY-MM-DD format',
        'termination_date.date_format'  =>  'The :attribute must be a valid date in YYYY-MM-DD format',
        'expected_checkin.date_format'  =>  'The :attribute must be a valid date in YYYY-MM-DD format',
        'start_date.date_format'        =>  'The :attribute must be a valid date in YYYY-MM-DD format',
        'end_date.date_format'          =>  'The :attribute must be a valid date in YYYY-MM-DD format',

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

    /*
    |--------------------------------------------------------------------------
    | Generic Validation Messages
    |--------------------------------------------------------------------------
    */
    'invalid_value_in_field' => 'Invalid value included in this field',
];
