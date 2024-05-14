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

    'accepted'             => 'يجب ان يتم قبول :attribute .',
    'active_url'           => ':attribute موقع غير صحيح.',
    'after'                => ':attribute يجب ان يكون تاريخ قبل :date.',
    'after_or_equal'       => ':attribute يجب أن يكون تاريخ بعد أو يساوي :date.',
    'alpha'                => 'يجب ان تحتوي :attribute على أحرف فقط.',
    'alpha_dash'           => 'يجب ان تحتوي :attribute على أحرف وأرقام وشرطات فقط.',
    'alpha_num'            => 'يجب ان تحتوي :attribute على أحرف وأرقام فقط.',
    'array'                => 'يجب أن تكون :attribute مصفوفة.',
    'before'               => ':attribute يجب ان يكون تاريخ قبل :date.',
    'before_or_equal'      => 'يجب أن تكون :attribute عبارة عن تاريخ قبل أو يساوي :date.',
    'between'              => [
        'numeric' => ':attribute يجب ان يكون بين :min - :max.',
        'file'    => 'يجب أن تكون :attribute بين :min - :max كيلوبايت.',
        'string'  => 'يجب أن تكون :attribute بين :min - :max من الأحرف.',
        'array'   => 'يجب أن تكون :attribute ما بين: :min and :max من العناصر.',
    ],
    'boolean'              => 'يجب أن يكون :attribute صحيحا أو خاطئا.',
    'confirmed'            => 'تأكيد :attribute غير متطابق.',
    'date'                 => 'ان :attribute تاريخ غير صحيح.',
    'date_format'          => 'لا تتطابق :attribute مع التنسيق.',
    'different'            => 'يجب أن تكون :attribute و :other مختلفين.',
    'digits'               => 'يجب أن تكون السمة: أرقام الأرقام.',
    'digits_between'       => 'يجب أن تكون السمة: مين و: ماكس ديجيتس.',
    'dimensions'           => 'تحتوي :attribute على أبعاد غير صالحة للصور.',
    'distinct'             => 'يحتوي :attribute على قيمة مكررة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالحا.',
    'exists'               => ':attribute المحدد غير صالح.',
    'file'                 => 'يجب أن تكون :attribute ملف.',
    'filled'               => 'يجب أن يحتوي :attribute على قيمة.',
    'image'                => 'يجب أن تكون :attribute صورة.',
    'import_field_empty'    => 'لا يمكن أن تكون قيمة :fieldname فارغة.',
    'in'                   => ':attribute المحدد غير صالح.',
    'in_array'             => ':attribute غير موجود في :other.',
    'integer'              => 'يجب أن تكون :attribute عدد صحيح.',
    'ip'                   => 'يجب أن تكون :attribute عنوان IP صالحا.',
    'ipv4'                 => 'يجب أن تكون :attribute عنوان IPv4 صالحا.',
    'ipv6'                 => 'يجب أن تكون :attribute عنوان IPv6 صالح.',
    'is_unique_department' => 'يجب أن يكون :attribute فريداً في موقع الشركة هذا',
    'json'                 => 'يجب أن يكون :attribute نص جسون JSON صالح.',
    'max'                  => [
        'numeric' => 'يجب ان يكون :attribute أكبر من :max.',
        'file'    => 'يجب ان يكون :attribute أكبر من كيلوبايت كحد أقصى.',
        'string'  => 'يجب ان يكون :attribute أكبر من :max احرف.',
        'array'   => 'قد لا تحتوي :attribute على أكثر من :max من للعناصر.',
    ],
    'mimes'                => 'يجب أن يكون :attribute ملف من النوع :values.',
    'mimetypes'            => 'يجب أن يكون :attribute ملف من النوع :values.',
    'min'                  => [
        'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
        'file'    => 'يجب أن يكون :attribute على الأقل :min كيلوبايت.',
        'string'  => 'يجب أن يكون :attribute على الأقل :min من الاحرف.',
        'array'   => 'يجب أن تحتوي :attribute على الأقل :min من العناصر.',
    ],
    'starts_with'          => 'يجب أن تبدأ خانة :attribute بواحد مما يلي: :values.',
    'ends_with'            => 'يجب أن تنتهي خانة :attribute بواحد مما يلي: :values.',

    'not_in'               => ':attribute المحدد غير صالح.',
    'numeric'              => 'يجب أن يكون :attribute رقما.',
    'present'              => 'يجب أن يكون :attribute موجود.',
    'valid_regex'          => 'هذا ليس تعبير regex صحيح. ',
    'regex'                => 'تنسيق :attribute غير صالح.',
    'required'             => 'الحقل :attribute اجباري.',
    'required_if'          => 'الحقل :attribute اجباري عندما يكون :other يساوي :value.',
    'required_unless'      => 'الحقل :attribute اجباري ما لم يكن :other ما بين :values.',
    'required_with'        => 'الحقل :attribute اجباري عندما يكون :values موجودا.',
    'required_with_all'    => 'الحقل :attribute اجباري عندما يكون :values موجودا.',
    'required_without'     => 'الحقل :attribute اجباري عندما تكون :values غير موجودة.',
    'required_without_all' => 'الحقل :attribute اجباري عندما لا يكون اي من :values موجودة.',
    'same'                 => 'يجب ان يكون :attribute و :other متطابقين.',
    'size'                 => [
        'numeric' => 'ان :attribute يجب ان يكون :size.',
        'file'    => 'ان :attribute يجب ان يكون :size كيلوبايت.',
        'string'  => 'ان :attribute يجب ان يكون :size احرف.',
        'array'   => 'يجب أن يحتوي :attribute على :size من العناصر.',
    ],
    'string'               => 'يجب أن يكون :attribute عبارة عن سلسلة نصية.',
    'timezone'             => 'يجب أن يكون :attribute منطقة صالحة.',
    'two_column_unique_undeleted' => ':attribute يجب أن يكون فريداً عبر :table1 و :table2. ',
    'unique'               => 'لقد تم أخذ :attribute مسبقا.',
    'uploaded'             => 'لقد فشل تحميل :attribute.',
    'url'                  => 'ان تنسيق :attribute غير صالح.',
    'unique_undeleted'     => ':attribute يجب ان تكون فريدة.',
    'non_circular'         => 'يجب ألا تنشئ السمة مرجعًا دائريًا.',
    'not_array'            => ':attribute لا يمكن أن يكون مصفوف.',
    'disallow_same_pwd_as_user_fields' => 'كلمة المرور لا يمكن أن تكون نفس اسم المستخدم.',
    'letters'              => 'يجب أن تحتوي كلمة المرور على حرف واحد على الأقل.',
    'numbers'              => 'يجب أن تحتوي كلمة المرور على رقم واحد على الأقل.',
    'case_diff'            => 'كلمة المرور يجب أن تستخدم حالة مختلطة.',
    'symbols'              => 'يجب أن تحتوي كلمة المرور على رموز.',
    'gte'                  => [
        'numeric'          => 'لا يمكن أن تكون القيمة سالبة'
    ],
    'checkboxes'           => ':attribute يحتوي على خيارات غير صالحة.',
    'radio_buttons'        => ':attribute غير صالح.',


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
        'alpha_space' => 'يحتوي الحقل :attribute على حرف غير مسموح به.',
        'email_array'      => 'عنوان بريد إلكتروني واحد أو أكثر غير صالح.',
        'hashed_pass'      => 'كلمة المرور الحالية غير صحيحة',
        'dumbpwd'          => 'كلمة المرور هذه شائعة جدا.',
        'statuslabel_type' => 'يجب تحديد نوع تسمية حالة صالح',

        // date_format validation with slightly less stupid messages. It duplicates a lot, but it gets the job done :(
        // We use this because the default error message for date_format is reflects php Y-m-d, which non-PHP
        // people won't know how to format. 
        'purchase_date.date_format'     => 'يجب أن يكون :attribute تاريخ صالح بتنسيق YYY-MM-DD',
        'last_audit_date.date_format'   =>  'يجب أن يكون :attribute تاريخًا صحيحًا في تنسيق YYY-MM-DD hh:mm:ss',
        'expiration_date.date_format'   =>  'يجب أن يكون :attribute تاريخ صالح بتنسيق YYY-MM-DD',
        'termination_date.date_format'  =>  'يجب أن يكون :attribute تاريخ صالح بتنسيق YYY-MM-DD',
        'expected_checkin.date_format'  =>  'يجب أن يكون :attribute تاريخ صالح بتنسيق YYY-MM-DD',
        'start_date.date_format'        =>  'يجب أن يكون :attribute تاريخ صالح بتنسيق YYY-MM-DD',
        'end_date.date_format'          =>  'يجب أن يكون :attribute تاريخ صالح بتنسيق YYY-MM-DD',

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
    'invalid_value_in_field' => 'القيمة غير صالحة المدرجة في هذا الحقل',
];
