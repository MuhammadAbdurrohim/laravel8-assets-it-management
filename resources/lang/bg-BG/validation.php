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

    'accepted'             => ':attribute трябва да бъде потвърден.',
    'active_url'           => ':attribute не е валиден URL адрес.',
    'after'                => ':attribute трябва да бъде дата след :date.',
    'after_or_equal'       => 'Атрибутът: трябва да бъде дата след или равна на: дата.',
    'alpha'                => ':attribute може да съдържа единствено букви.',
    'alpha_dash'           => ':attribute може да съдържа единствено букви, числа и тире.',
    'alpha_num'            => ':attribute може да съдържа единствено букви и числа.',
    'array'                => 'Атрибутът: трябва да бъде масив.',
    'before'               => ':attribute трябва да бъде дата преди :date.',
    'before_or_equal'      => 'Атрибутът: трябва да бъде дата преди или равна на: дата.',
    'between'              => [
        'numeric' => ':attribute трябва да бъде между :min и :max.',
        'file'    => ':attribute трябва да бъде с големина между :min и :max KB.',
        'string'  => ':attribute трябва да бъде с дължина между :min и :max символа.',
        'array'   => 'Атрибутът: трябва да има между: min и: max items.',
    ],
    'boolean'              => ':attribute трябва да е верен или грешен.',
    'confirmed'            => ':attribute потвърждение не съвпада.',
    'date'                 => ':attribute не е валидна дата.',
    'date_format'          => ':attribute не съвпада с формата :format.',
    'different'            => ':attribute и :other трябва да се различават.',
    'digits'               => ':attribute трябва да бъде с дължина :digits цифри.',
    'digits_between'       => ':attribute трябва да бъде с дължина между :min и :max цифри.',
    'dimensions'           => 'Атрибутът: има невалидни величини на изображението.',
    'distinct'             => 'Полето: atribut има дублираща се стойност.',
    'email'                => ':attribute е с невалиден формат.',
    'exists'               => 'Избраният :attribute е невалиден.',
    'file'                 => 'Атрибутът: трябва да е файл.',
    'filled'               => 'Полето на атрибута: трябва да има стойност.',
    'image'                => ':attribute трябва да бъде изображение.',
    'import_field_empty'    => 'Стойността за :fieldname не може да бъде празна.',
    'in'                   => 'Избраният :attribute е невалиден.',
    'in_array'             => 'Полето: atribut не съществува в: други.',
    'integer'              => ':attribute трябва да бъде целочислен.',
    'ip'                   => ':attribute трябва да бъде валиден IP адрес.',
    'ipv4'                 => 'Атрибутът: трябва да е валиден IPv4 адрес.',
    'ipv6'                 => 'Атрибутът: трябва да е валиден IPv6 адрес.',
    'is_unique_department' => ':attribute трябва да бъде уникален за тази локация на фирмата.',
    'json'                 => 'Атрибутът: трябва да е валиден низ на JSON.',
    'max'                  => [
        'numeric' => ':attribute не може да бъде по-дълъг от :max.',
        'file'    => ':attribute не може да бъде по-голям от :max KB.',
        'string'  => ':attribute не може да бъде по-дълъг от :max символа.',
        'array'   => 'Атрибутът: не може да има повече от: max items.',
    ],
    'mimes'                => ':attribute трябва да бъде файл с един от следните типове: :values.',
    'mimetypes'            => 'Атрибутът: трябва да бъде файл от тип:: стойности.',
    'min'                  => [
        'numeric' => ':attribute трябва да бъде минимум :min.',
        'file'    => ':attribute трябва да бъде с големина минимум :min KB.',
        'string'  => ':attribute трябва да бъде минимум :min символа.',
        'array'   => 'Атрибутът: трябва да има поне: min елементи.',
    ],
    'starts_with'          => ':attribute трябва да започва с една от следните стойности: :values',
    'ends_with'            => ':attribute трябва да завършва с една от следните стойности: :values',

    'not_in'               => 'Избраният :attribute е невалиден.',
    'numeric'              => ':attribute трябва да бъде число.',
    'present'              => 'Полето на атрибута трябва да е налице.',
    'valid_regex'          => 'Това не е валиден регулярен израз.',
    'regex'                => 'Форматът на :attribute е невалиден.',
    'required'             => 'Полето :attribute е задължително.',
    'required_if'          => 'Полето :attribute е задължително, когато :other е :value.',
    'required_unless'      => 'Полето: атрибут се изисква, освен ако: другият не е в: стойности.',
    'required_with'        => ':attribute е задължителен, когато са избрани :values.',
    'required_with_all'    => 'Полето: атрибут се изисква, когато: стойностите са налице.',
    'required_without'     => ':attribute е задължителен, когато не са избрани :values.',
    'required_without_all' => 'Полето: атрибут се изисква, когато няма стойности: стойности.',
    'same'                 => ':attribute и :other трябва да съвпадат.',
    'size'                 => [
        'numeric' => ':attribute трябва да бъде с дължина :size.',
        'file'    => ':attribute трябва да бъде с големина :size KB.',
        'string'  => ':attribute трябва да бъде с дължина :size символа.',
        'array'   => 'Атрибутът: трябва да съдържа: размерни елементи.',
    ],
    'string'               => 'Атрибутът: трябва да е низ.',
    'timezone'             => 'Атрибутът: трябва да е валидна зона.',
    'two_column_unique_undeleted' => ':attribute трябва да бъде уникален за :table1 и :table2. ',
    'unique'               => ':attribute вече е вписан.',
    'uploaded'             => 'Атрибутът: не успя да качи.',
    'url'                  => 'Форматът на :attribute е невалиден.',
    'unique_undeleted'     => ':attribute трябва да бъде уникален.',
    'non_circular'         => ':attribute не трябва да създава препрадка към себе си.',
    'not_array'            => ':attribute не може да бъде масив.',
    'disallow_same_pwd_as_user_fields' => 'Паролата не може да бъде същата, като потребителското име.',
    'letters'              => 'Паролата трябва да съдържа поне една буква.',
    'numbers'              => 'Паролата трябва да съдържа поне една цифра.',
    'case_diff'            => 'Паролата трябва да съдържа главни и малки букви.',
    'symbols'              => 'Паролата трябва да съдържа символи.',
    'gte'                  => [
        'numeric'          => 'Стойността не може да бъде отрицателна'
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
        'alpha_space' => 'Полето атрибут: съдържа знак, който не е разрешен.',
        'email_array'      => 'Един или повече имейл адреси са невалидни.',
        'hashed_pass'      => 'Текущата ви парола е неправилна',
        'dumbpwd'          => 'Тази парола е твърде често срещана.',
        'statuslabel_type' => 'Трябва да изберете валиден тип етикет на състоянието',

        // date_format validation with slightly less stupid messages. It duplicates a lot, but it gets the job done :(
        // We use this because the default error message for date_format is reflects php Y-m-d, which non-PHP
        // people won't know how to format. 
        'purchase_date.date_format'     => ':values трябва да бъде валидна дата в YYYY-MM-DD формат',
        'last_audit_date.date_format'   =>  ':attribute трябва да бъде валидна дата в YYYY-MM-DD hh:mm:ss формат',
        'expiration_date.date_format'   =>  ':attribute трябва да бъде валидна дата в YYYY-MM-DD формат',
        'termination_date.date_format'  =>  ':attribute трябва да бъде валидна дата в YYYY-MM-DD формат',
        'expected_checkin.date_format'  =>  ':attribute трябва да бъде валидна дата в YYYY-MM-DD формат',
        'start_date.date_format'        =>  ':attribute трябва да бъде валидна дата в YYYY-MM-DD формат',
        'end_date.date_format'          =>  ':attribute трябва да бъде валидна дата в YYYY-MM-DD формат',

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
