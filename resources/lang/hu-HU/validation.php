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

    'accepted'             => 'A :attribute el kell fogadni.',
    'active_url'           => 'A :attribute nem valós URL.',
    'after'                => 'Az :attribute ezután a dátum után kell, hogy legyen :date.',
    'after_or_equal'       => 'A: attribútumnak dátumnak kell lennie, vagy egyenlőnek kell lennie: dátummal.',
    'alpha'                => 'A :attribute csak betűket tartalmazhat.',
    'alpha_dash'           => 'A :attribute csak betűket, számokat és perjelet tartalmazhat.',
    'alpha_num'            => 'A :attribute csak betűket, számokat tartalmazhat.',
    'array'                => 'A: attribútumnak tömbnek kell lennie.',
    'before'               => 'A :attribute csak :date elötti dátum lehet.',
    'before_or_equal'      => 'A: attribútumnak dátumnak kell lennie, vagy egyenlőnek kell lennie: dátummal.',
    'between'              => [
        'numeric' => 'A :attribute az érték között kell lennie :min -:max.',
        'file'    => 'A :attribute :min - :max kilobájt között kell lenni.',
        'string'  => 'A :attribute :min - :max karakter között kell lenni.',
        'array'   => 'A: attribútumnak rendelkeznie kell: min és max elem között.',
    ],
    'boolean'              => 'Az attribútumnak igaznak, vagy hamisnak kell lennie (true/false).',
    'confirmed'            => 'A :attribute ellenörzés nem egyezik.',
    'date'                 => 'A :attribute nem egy valós dátum.',
    'date_format'          => 'A :attribute nem egyezik a formátummal :format.',
    'different'            => 'A :attribute és :other különböznie kell.',
    'digits'               => 'A :attribute :digits számjegynek kell lenni.',
    'digits_between'       => 'A :attribute :min - :max számjegy között kell lenni.',
    'dimensions'           => 'A: attribútum érvénytelen képmérettel rendelkezik.',
    'distinct'             => 'A: attribútum mező duplikált értéket tartalmaz.',
    'email'                => 'Az :attribute formátuma érvénytelen.',
    'exists'               => 'A kiválasztott :attribute étvénytelen.',
    'file'                 => 'A: attribútumnak fájlnak kell lennie.',
    'filled'               => 'A: attribútum mezőnek értéket kell tartalmaznia.',
    'image'                => 'A :attribute képnek kell lenni.',
    'import_field_empty'    => 'A :fieldname mező értéke nem lehet üres.',
    'in'                   => 'A kiválasztott :attribute étvénytelen.',
    'in_array'             => 'A: attribútum mező nem létezik: más.',
    'integer'              => 'A :attribute számnak kell lennie.',
    'ip'                   => 'A :attribute érvényes IP címnek kell lenni.',
    'ipv4'                 => 'A: attribútumnak érvényes IPv4-címnek kell lennie.',
    'ipv6'                 => 'A: attribútumnak érvényes IPv6-címnek kell lennie.',
    'is_unique_department' => ':attribute egyedi kell, hogy legyen ehhez a helyhez',
    'json'                 => 'A: attribútumnak érvényes JSON-karakterláncnak kell lennie.',
    'max'                  => [
        'numeric' => 'A :attribute nem lehet nagyobb, mint :max.',
        'file'    => 'A :attribute nem lehet nagyobb, mint :max kilobájt.',
        'string'  => 'A :attribute nem lehet nagyobb, mint :max karakter.',
        'array'   => 'A: attribútumnak nem lehet több: max eleme.',
    ],
    'mimes'                => 'A :attribute ilyen fájl típusnak kell lennie: :values.',
    'mimetypes'            => 'A: attribútumnak a következő típusú fájlnak kell lennie:: values.',
    'min'                  => [
        'numeric' => 'A :attribute legalább :min kell lenni.',
        'file'    => 'A :attribute legalább :min kilobájt kell lenni.',
        'string'  => 'A :attribute legalább :min karakter kell lenni.',
        'array'   => 'A: attribútumnak rendelkeznie kell legalább: min elemekkel.',
    ],
    'starts_with'          => 'A(z) :attribute a következővel kell kezdődnie: :values.',
    'ends_with'            => 'A(z) :attribute a következővel kell végződjön: :values.',

    'not_in'               => 'A kiválasztott :attribute étvénytelen.',
    'numeric'              => 'A :attribute csak szám lehet.',
    'present'              => 'A: attribútum mezőnek jelen kell lennie.',
    'valid_regex'          => 'Ez nem érvényes regex kifejezés. ',
    'regex'                => 'Az :attribute formátuma érvénytelen.',
    'required'             => 'A :attribute mező kötelező.',
    'required_if'          => 'A :attribute mező kötelező ha :other egy :value.',
    'required_unless'      => 'A: attribútummezőt csak akkor kell megadni, ha: az egyéb értéke: értéke.',
    'required_with'        => 'A :attribute mező kötelező ha :value jelen van.',
    'required_with_all'    => 'A: attribútum mező akkor szükséges, ha: értékek vannak jelen.',
    'required_without'     => 'A :attribute mező kötelező ha :value nincs jelen.',
    'required_without_all' => 'A: attribútummező akkor szükséges, ha egyik sem: értéke nincs.',
    'same'                 => 'A :attribute és :other egyeznie kell.',
    'size'                 => [
        'numeric' => 'A :attribute kötelező mérete :size.',
        'file'    => 'A :attribute kötelező mérete :size kilobájt.',
        'string'  => 'A :attribute kötelező mérete :size karakter.',
        'array'   => 'A: attribútumnak tartalmaznia kell: méretű elemeket.',
    ],
    'string'               => 'A: attribútumnak stringnek kell lennie.',
    'timezone'             => 'A: attribútumnak érvényes zónának kell lennie.',
    'two_column_unique_undeleted' => 'The :attribute must be unique across :table1 and :table2. ',
    'unique'               => 'A :attribute már foglalt.',
    'uploaded'             => 'A: attribútum nem sikerült feltölteni.',
    'url'                  => 'Az :attribute formátuma érvénytelen.',
    'unique_undeleted'     => 'A(z) :attribute egyedinek kell lennie.',
    'non_circular'         => 'A(z) :attribute nem hozhat létre körkörös hivatkozást.',
    'not_array'            => ':attribute cannot be an array.',
    'disallow_same_pwd_as_user_fields' => 'A jelszó nem lehet azonos a felhasználónévvel.',
    'letters'              => 'A jelszónak tartalmaznia kell legalább egy betűt.',
    'numbers'              => 'A jelszónak tartalmaznia kell legalább egy számot.',
    'case_diff'            => 'A jelszónak tartalmaznia kell kis- és nagybetűket.',
    'symbols'              => 'A jelszónak tartalmaznia kell legalább egy szimbólumot.',
    'gte'                  => [
        'numeric'          => 'Az érték nem lehet negatív'
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
        'alpha_space' => 'A: attribútum mező olyan karaktert tartalmaz, amely nem megengedett.',
        'email_array'      => 'Egy vagy több e-mail cím érvénytelen.',
        'hashed_pass'      => 'A jelenlegi jelszava helytelen',
        'dumbpwd'          => 'Ez a jelszó túl gyakori.',
        'statuslabel_type' => 'Meg kell határoznia egy érvényes állapotcímke típust',

        // date_format validation with slightly less stupid messages. It duplicates a lot, but it gets the job done :(
        // We use this because the default error message for date_format is reflects php Y-m-d, which non-PHP
        // people won't know how to format. 
        'purchase_date.date_format'     => ':attribute mező értékének érvényes dátumnak kell lennie YYYY-MM-DD formátumban',
        'last_audit_date.date_format'   =>  ':attribute mező értékének érvényes dátumnak kell lennie YYYY-MM-DD hh:mm:ss formátumban',
        'expiration_date.date_format'   =>  ':attribute mező értékének érvényes dátumnak kell lennie YYYY-MM-DD formátumban',
        'termination_date.date_format'  =>  ':attribute mező értékének érvényes dátumnak kell lennie YYYY-MM-DD formátumban',
        'expected_checkin.date_format'  =>  ':attribute mező értékének érvényes dátumnak kell lennie YYYY-MM-DD formátumban',
        'start_date.date_format'        =>  ':attribute mező értékének érvényes dátumnak kell lennie YYYY-MM-DD formátumban',
        'end_date.date_format'          =>  ':attribute mező értékének érvényes dátumnak kell lennie YYYY-MM-DD formátumban',

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
