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

    'accepted'             => ': attribute benzersiz olması gerekir.',
    'active_url'           => ':attribute geçersiz URL.',
    'after'                => ':attribute :date sonra olmalı.',
    'after_or_equal'       => ': Özniteliği, tarihten veya sonrasına ait bir tarih olmalıdır: date.',
    'alpha'                => ':attribute sadece harf içermeli.',
    'alpha_dash'           => ':attribute sadece harf, rakam ve noktalama işaretleri olabilir.',
    'alpha_num'            => ':attribute sadece harf ve rakam olabilir.',
    'array'                => ': Nitelik bir dizi olmalıdır.',
    'before'               => ':attribute :date den önce olmalı.',
    'before_or_equal'      => ': Özniteliği, tarihten önce veya ona eşit bir tarih olmalıdır: date.',
    'between'              => [
        'numeric' => ':attribute :min - :max arasında olmalı.',
        'file'    => ':attribute :min - :max Kb arasında olmalı.',
        'string'  => ':attribute :min - :max karakter arasında olmalı.',
        'array'   => ': Özelliği,: min ve: max öğeleri arasında olmalıdır.',
    ],
    'boolean'              => ':attribute doğru veya yanlış olabilir.',
    'confirmed'            => ':attribute doğrulama uyuşmuyor.',
    'date'                 => ':attribute geçerli bir tarih değil.',
    'date_format'          => ':attribute biçim geçersiz.',
    'different'            => ':attribute ve :other farklı olmalı.',
    'digits'               => ':attribute :digits numara olmalı.',
    'digits_between'       => ':attribute :min ve :max numara.',
    'dimensions'           => ': Özniteliği geçersiz görüntü boyutlarına sahip.',
    'distinct'             => ': Öznitelik alanı yinelenen bir değere sahip.',
    'email'                => ':attribute biçim geçersiz.',
    'exists'               => ':attribute seçim geçersiz.',
    'file'                 => ': Özniteliği bir dosya olmalıdır.',
    'filled'               => ': Attribute alanının bir değeri olmalıdır.',
    'image'                => ':attribute bir görüntü olması gerekir.',
    'import_field_empty'    => 'Bu değer için :alan adı boş olamaz.',
    'in'                   => ':attribute geçersiz.',
    'in_array'             => ': Attribute alanı yok diğeri.',
    'integer'              => ':attribute bir tamsayı olmalıdır.',
    'ip'                   => ':attribute geçerli bir IP adresi olması gerekir.',
    'ipv4'                 => ': Özniteliği geçerli bir IPv4 adresi olmalıdır.',
    'ipv6'                 => ': Özniteliği geçerli bir IPv6 adresi olmalıdır.',
    'is_unique_department' => 'Öznitelik bu Şirket Konumuna özgü olmalıdır',
    'json'                 => ': Özniteliği geçerli bir JSON dizesi olmalıdır.',
    'max'                  => [
        'numeric' => ':attribute :max dan büyük olmalı.',
        'file'    => ':attribute :max Kb tan büyük olmalı.',
        'string'  => ':attribute :max karakterden büyük olamaz.',
        'array'   => ': Özniteliği, maksimum öğelerden fazla olamaz.',
    ],
    'mimes'                => ':attribute :values türleri olmalı.',
    'mimetypes'            => ': Özniteliği,:: değerleri türünde bir dosya olmalıdır.',
    'min'                  => [
        'numeric' => ':attribute :min den küçük olmalı.',
        'file'    => ':attribute :min Kb tan küçük olmalı.',
        'string'  => ':attribute :min karakterden küçük olmalı.',
        'array'   => ': Özelliği en az: dakika öğesine sahip olmalıdır.',
    ],
    'starts_with'          => 'Özellik aşağıdaki değerlerden biriyle başlamalıdır.',
    'ends_with'            => ':attribute aşağıdakilerden biriyle bitmelidir: :values.',

    'not_in'               => ':attribute geçersiz.',
    'numeric'              => ':attribute sayı olmalıdır.',
    'present'              => ': Attribute alanı bulunmalıdır.',
    'valid_regex'          => 'Bu geçerli bir regex değildir.',
    'regex'                => ':attribute formatı geçersiz.',
    'required'             => ':attribute alanı zorunludur.',
    'required_if'          => ':attribute :other :value geçersiz.',
    'required_unless'      => ': Attribute alanı, aşağıdaki koşullar haricinde: other is in: values.',
    'required_with'        => ':attribute :values geçersiz.',
    'required_with_all'    => ': Öznitelik alanı, şu durumlarda gereklidir: değerler mevcut.',
    'required_without'     => ':attribute :values geçersiz.',
    'required_without_all' => ': Özellik alanının hiçbiri: değerleri mevcut değilse gereklidir.',
    'same'                 => ':attribute ve :other aynı olmalı.',
    'size'                 => [
        'numeric' => ':attribute :size olmalı.',
        'file'    => ':attribute :size Kb olmalı.',
        'string'  => ':attribute :size karakter olmalı.',
        'array'   => ': Özniteliği: boyut öğeleri içermelidir.',
    ],
    'string'               => ': Özniteliği bir dize olmalıdır.',
    'timezone'             => ': Özniteliği geçerli bir bölge olmalıdır.',
    'two_column_unique_undeleted' => ':attribute :table1 ve :table2 genelinde benzersiz olmalıdır. ',
    'unique'               => ':attribute zaten alınmış.',
    'uploaded'             => ': Özniteliği yüklenemedi.',
    'url'                  => ':attribute biçim geçersiz.',
    'unique_undeleted'     => ':attribute benzersiz olmalıdır.',
    'non_circular'         => ':attribute döngüsel bir başvuru oluşturmamalıdır.',
    'not_array'            => ':attribute bir dizi olamaz.',
    'disallow_same_pwd_as_user_fields' => 'Şifre kullanıcı adı ile aynı olamaz.',
    'letters'              => 'Şifre en az bir harf içermelidir.',
    'numbers'              => 'Şifre en az bir rakam içermelidir.',
    'case_diff'            => 'Şifre hem büyük hem küçük harf içermelidir.',
    'symbols'              => 'Şifre sembol içermelidir.',
    'gte'                  => [
        'numeric'          => 'Değer negatif olamaz'
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
        'alpha_space' => ': Attribute alanı, izin verilmeyen bir karakter içeriyor.',
        'email_array'      => 'Bir veya daha fazla e-posta adresi geçersiz.',
        'hashed_pass'      => 'Geçerli şifre yanlış',
        'dumbpwd'          => 'Bu şifre çok yaygındır.',
        'statuslabel_type' => 'Geçerli bir durum etiketi türü seçmelisiniz',

        // date_format validation with slightly less stupid messages. It duplicates a lot, but it gets the job done :(
        // We use this because the default error message for date_format is reflects php Y-m-d, which non-PHP
        // people won't know how to format. 
        'purchase_date.date_format'     => ':attribute YYYY-MM-DD tarih formatında olmalıdır',
        'last_audit_date.date_format'   =>  ':attribute YYYY-MM-DD hh:mm:ss tarih formatında olmalıdır',
        'expiration_date.date_format'   =>  ':attribute YYYY-MM-DD şeklinde geçerli bir tarih formatında olmalıdır',
        'termination_date.date_format'  =>  ':attribute YYYY-MM-DD şeklinde geçerli bir tarih formatında olmalıdır',
        'expected_checkin.date_format'  =>  ':attribute YYYY-MM-DD şeklinde geçerli bir tarih formatında olmalıdır',
        'start_date.date_format'        =>  ':attribute YYYY-MM-DD şeklinde geçerli bir tarih formatında olmalıdır',
        'end_date.date_format'          =>  ':attribute YYYY-MM-DD şeklinde geçerli bir tarih formatında olmalıdır',

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
