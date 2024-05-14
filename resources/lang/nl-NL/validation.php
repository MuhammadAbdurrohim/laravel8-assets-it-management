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

    'accepted'             => ':attribute moet geaccepteerd worden.',
    'active_url'           => ':attribute is geen geldige URL.',
    'after'                => ':attribute moet een datum zijn later dan :date.',
    'after_or_equal'       => ':attribute moet een datum zijn later dan of gelijk aan :date.',
    'alpha'                => ':attribute mag enkel letters bevatten.',
    'alpha_dash'           => ':attribute mag enkel letters, cijfers of koppeltekens bevatten.',
    'alpha_num'            => ':attribute mag enkel letters en cijfers bevatten.',
    'array'                => ':attribute moet een array zijn.',
    'before'               => ':attribute moet een datum zijn voor :date.',
    'before_or_equal'      => ':attribute moet een datum zijn voor of gelijk aan :date.',
    'between'              => [
        'numeric' => ':attribute moet een waarde hebben tussen :min en :max.',
        'file'    => ':attribute moet een waarde hebben tussen :min en :max kilobytes.',
        'string'  => ':attribute moet tussen de :min en :max aantal karakters lang zijn.',
        'array'   => ':attribute moet tussen de :min en :max items bevatten.',
    ],
    'boolean'              => ':attribute moet waar of onwaar zijn.',
    'confirmed'            => ':attribute bevestiging komt niet overeen.',
    'date'                 => ':attribute is geen geldige datum.',
    'date_format'          => ':attribute komt niet overeen met het volgende formaat :format.',
    'different'            => ':attribute en :other moeten verschillend zijn.',
    'digits'               => ':attribute moet :digits cijfers lang zijn.',
    'digits_between'       => ':attribute moet tussen de :min en :max cijfers bevatten.',
    'dimensions'           => ':attribute heeft ongeldige afbeelding afmetingen.',
    'distinct'             => ':attribute veld heeft een duplicaat waarde.',
    'email'                => 'Het formaat van :attribute is ongeldig.',
    'exists'               => 'Het geselecteerde kenmerk :attribute is ongeldig.',
    'file'                 => ':attribute moet een bestand zijn.',
    'filled'               => ':attribute veld moet een waarde hebben.',
    'image'                => ':attribute moet een afbeelding zijn.',
    'import_field_empty'    => 'De waarde voor :fieldname kan niet leeg zijn.',
    'in'                   => 'Het geselecteerde kenmerk :attribute is ongeldig.',
    'in_array'             => ':attribute veld bestaat niet in :other.',
    'integer'              => ':attribute moet van het type integer zijn.',
    'ip'                   => ':attribute moet een geldig IP-adres zijn.',
    'ipv4'                 => ':attribute moet een geldig IP-adres zijn.',
    'ipv6'                 => ':attribute moet een geldig IPv6-adres zijn.',
    'is_unique_department' => ':attribute moet uniek zijn voor deze bedrijfslocatie',
    'json'                 => ':attribute moet valide JSON code zijn.',
    'max'                  => [
        'numeric' => ':attribute moet groter zijn dan :max.',
        'file'    => ':attribute mag niet groter zijn dan :max kilobytes.',
        'string'  => ':attribute mag niet langer zijn dan :max karakters.',
        'array'   => ':attribute mag niet meer dan :max items bevatten.',
    ],
    'mimes'                => ':attribute moet een bestand zijn van het type: :values.',
    'mimetypes'            => ':attribute moet een bestand zijn van het type: :values.',
    'min'                  => [
        'numeric' => ':attribute moet minimum :min zijn.',
        'file'    => ':attribute moet minstens :min kilobytes groot zijn.',
        'string'  => ':attribute moet tenminste :min karakters bevatten.',
        'array'   => ':attribute moet minimaal :min items bevatten.',
    ],
    'starts_with'          => ':attribute moet met één van de volgende waarden eindigen: :values.',
    'ends_with'            => ':attribute moet met één van de volgende waarden eindigen: :values.',

    'not_in'               => 'Het geselecteerde kenmerk :attribute is ongeldig.',
    'numeric'              => ':attribute moet een getal zijn.',
    'present'              => ':attribute veld moet aanwezig zijn.',
    'valid_regex'          => 'Dit is geen geldige regex. ',
    'regex'                => 'Het formaat van :attribute is ongeldig.',
    'required'             => 'Het veld :attribute is verplicht.',
    'required_if'          => 'het veld :attribute is verplicht als :other gelijk is aan :value.',
    'required_unless'      => ':attribute veld is vereist tenzij :other is in :values.',
    'required_with'        => 'Het veld :attribute is verplicht als :values ingesteld staan.',
    'required_with_all'    => ':attribute veld is vereist wanneer :values aanwezig is.',
    'required_without'     => 'Het veld :attribute is verplicht als :values niet ingesteld staan.',
    'required_without_all' => ':attribute veld is vereist wanneer geen van :values aanwezig zijn.',
    'same'                 => ':attribute en :other moeten gelijk zijn.',
    'size'                 => [
        'numeric' => ':attribute moet :size zijn.',
        'file'    => ':attribute moet :size kilobytes groot zijn.',
        'string'  => ':attribute moet :size karakters zijn.',
        'array'   => ':attribute moet :size items bevatten.',
    ],
    'string'               => ':attribute moet een string zijn.',
    'timezone'             => ':attribute moet een geldige zone zijn.',
    'two_column_unique_undeleted' => ':attribute moet uniek zijn in :table1 en :table2. ',
    'unique'               => 'Het veld :attribute is reeds in gebruik.',
    'uploaded'             => 'Uploaden van :attribute is mislukt.',
    'url'                  => 'Het formaat van :attribute is ongeldig.',
    'unique_undeleted'     => 'De :attribute moet uniek zijn. ',
    'non_circular'         => ':attribute mag geen circulaire referentie aanmaken.',
    'not_array'            => ':attribute kan geen array zijn.',
    'disallow_same_pwd_as_user_fields' => 'Wachtwoord kan niet hetzelfde zijn als de gebruikersnaam.',
    'letters'              => 'Wachtwoord moet ten minste één letter bevatten.',
    'numbers'              => 'Wachtwoord moet ten minste één cijfer bevatten.',
    'case_diff'            => 'Wachtwoord moet kleine letters en hoofdletters bevatten.',
    'symbols'              => 'Wachtwoord moet symbolen bevatten.',
    'gte'                  => [
        'numeric'          => 'Waarde mag niet negatief zijn'
    ],
    'checkboxes'           => ':attribute bevat ongeldige opties.',
    'radio_buttons'        => ':attribute is ongeldig.',


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
        'alpha_space' => ':attribute veld bevat een karakter wat niet is toegestaan.',
        'email_array'      => 'één of meer e-mail adressen kloppen niet.',
        'hashed_pass'      => 'Je huidige wachtwoord is incorrect',
        'dumbpwd'          => 'Dat wachtwoord is te veelvoorkomend.',
        'statuslabel_type' => 'Selecteer een valide status label',

        // date_format validation with slightly less stupid messages. It duplicates a lot, but it gets the job done :(
        // We use this because the default error message for date_format is reflects php Y-m-d, which non-PHP
        // people won't know how to format. 
        'purchase_date.date_format'     => ':attribute moet een geldige datum zijn in JJJJ-MM-DD formaat',
        'last_audit_date.date_format'   =>  ':attribute moet een geldige datum zijn in JJJJ-MM-DD uu:mm:ss formaat',
        'expiration_date.date_format'   =>  ':attribute moet een geldige datum zijn in JJJJ-MM-DD formaat',
        'termination_date.date_format'  =>  ':attribute moet een geldige datum zijn in JJJJ-MM-DD formaat',
        'expected_checkin.date_format'  =>  ':attribute moet een geldige datum zijn in JJJJ-MM-DD formaat',
        'start_date.date_format'        =>  ':attribute moet een geldige datum zijn in JJJJ-MM-DD formaat',
        'end_date.date_format'          =>  ':attribute moet een geldige datum zijn in JJJJ-MM-DD formaat',

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
    'invalid_value_in_field' => 'Ongeldige waarde ingevoerd in dit veld',
];
