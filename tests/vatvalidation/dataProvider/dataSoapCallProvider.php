<?php
return [
    array( // data provider #0
        static::TEST_DESCRIPTION   => 'Call SoapClient: OnLine with valid vat_id, wrong county_id => invalid Result.',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 9,
            static::VAT_ID_STATUS => 0,
            static::ERROR         => true,
            static::VALIDATE      => 0
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => null,
            static::GET_RESPONSE_RESULT_CHECKED_TIME => null,
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => null,
            static::GET_RESPONSE_ERROR_MESSAGE       => null
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE263721827',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 100,
            static::GUEST            => false
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => '',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => '',
            static::SET_REQUEST_STREET => ''
        ],    
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => 'HR20543250589'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => unserialize(file_get_contents( __DIR__ . '/../mockResults/soap/resultTest0.txt'))
    ),
    array( // data provider #1
        static::TEST_DESCRIPTION   => 'Online call SoapClient: with vat_is and valid result',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 2,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => false,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02-02-2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '00:00:00',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE263721827',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 81,
            static::GUEST            => false
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => '',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => '',
            static::SET_REQUEST_STREET => ''
        ],    
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => 'HR20543250589'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => unserialize(file_get_contents( __DIR__ . '/../mockResults/soap/resultTest1.txt'))
    ),       
    array( // data provider #2
        static::TEST_DESCRIPTION   => 'Online call SoapClient: ACCOUNT_COMPANY_VAT_GROUP=true, with valid val_id => valid Result',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 2,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => false,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02-02-2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '00:00:00',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE263721827',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 81,
            static::GUEST            => false
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => '',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => '',
            static::SET_REQUEST_STREET => ''
        ],    
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => 'true',
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => 'HR20543250589'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => unserialize(file_get_contents( __DIR__ . '/../mockResults/soap/resultTest2.txt'))
    ),       
    array( // data provider #3
        static::TEST_DESCRIPTION   => 'Online call SoapClient: ACCOUNT_COMPANY_VAT_GROUP=false with valid vat_id => valid result',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 2,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => false,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02-02-2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '00:00:00',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE263721827',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 81,
            static::GUEST            => false
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => '',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => '',
            static::SET_REQUEST_STREET => ''
        ],    
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => 'false',
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => 'HR20543250589'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => unserialize(file_get_contents( __DIR__ . '/../mockResults/soap/resultTest3.txt'))
    ),    
    array( // data provider #4
        static::TEST_DESCRIPTION   => 'Online call SoapClient: ACCOUNT_COMPANY_VAT_GROUP=false guest=true valid vat_id => valid result',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 1,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => false,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02-02-2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '00:00:00',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE263721827',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 81,
            static::GUEST            => true
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => '',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => '',
            static::SET_REQUEST_STREET => ''
        ],    
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => 'false',
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => 'HR20543250589'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => unserialize(file_get_contents( __DIR__ . '/../mockResults/soap/resultTest4.txt'))
    ),        
    array( // data provider #5
        static::TEST_DESCRIPTION   => 'Online call SoapClient: ACCOUNT_COMPANY_VAT_GROUP=false guest=true no valid vat_id => invalid resulz',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 1,
            static::VAT_ID_STATUS => null,
            static::ERROR         => false,
            static::VALIDATE      => null
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => null,
            static::GET_RESPONSE_RESULT_CHECKED_TIME => null,
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => null,
            static::GET_RESPONSE_ERROR_MESSAGE       => null
        ],
        static::SET_VALUES => [
            static::VAT_ID           => '',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 81,
            static::GUEST            => true
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => '',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => '',
            static::SET_REQUEST_STREET => ''
        ],    
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => 'false',
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => 'HR20543250589'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),    
    array( // data provider #6
        static::TEST_DESCRIPTION   => 'Online call SoapClient: with vat_id => invalid result',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 2,
            static::VAT_ID_STATUS => 0,
            static::ERROR         => true,
            static::VALIDATE      => '0'
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02-02-2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '00:00:00',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 201,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist ungültig. Die angefragte USt-IdNr. ist ungültig. Sie ist nicht in der Unternehmerdatei des betreffenden EU-Mitgliedstaates registriert.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE26372182',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 81,
            static::GUEST            => false
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => '',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => '',
            static::SET_REQUEST_STREET => ''
        ],    
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => 'HR20543250589'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => unserialize(file_get_contents( __DIR__ . '/../mockResults/soap/resultTest6.txt'))
    ),  
    
    array(  // data provider #7
        static::TEST_DESCRIPTION   => 'Online call SoapClient: customers_status_id in $cust_vatid_status',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 9,
            static::VAT_ID_STATUS => 0,
            static::ERROR         => true,
            static::VALIDATE      => 0
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => null,
            static::GET_RESPONSE_RESULT_CHECKED_TIME => null,
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => null,
            static::GET_RESPONSE_ERROR_MESSAGE       => null
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE26372182',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 100,
            static::GUEST            => false
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => '',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => '',
            static::SET_REQUEST_STREET => ''
        ],    
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => 'HR20543250589'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),  
];
