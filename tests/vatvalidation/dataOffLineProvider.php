<?php
return [
    array( // data provider #0
        static::TEST_DESCRIPTION   => 'Offline Test all parameters Empty.',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 9,
            static::VAT_ID_STATUS => '',
            static::ERROR         => '',
            static::VALIDATE      => ''
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
            static::COUNTRY_ID       => null,
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
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => ACCOUNT_COMPANY_VAT_LIVE_CHECK,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),    
    array( // data provider #1
        static::TEST_DESCRIPTION   => 'Offline Test: with valid vat_idI all others parameters Empty.',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => '2',
            static::VAT_ID_STATUS => '1',
            static::ERROR         => false,
            static::VALIDATE      => '1'
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => null,
            static::GET_RESPONSE_RESULT_CHECKED_TIME => null,
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => null,
            static::GET_RESPONSE_ERROR_MESSAGE       => ''
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE123456789',
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
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => ACCOUNT_COMPANY_VAT_LIVE_CHECK,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => [],
        static::MOCK_FILE => false
    ), 
    
    array( // data provider #2
        static::TEST_DESCRIPTION   => 'Offline Test: test fix_old_belgien_vat_id',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => '6',
            static::VAT_ID_STATUS => 1,
            static::ERROR         => 0,
            static::VALIDATE      => '1'
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => null,
            static::GET_RESPONSE_RESULT_CHECKED_TIME => null,
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => null,
            static::GET_RESPONSE_ERROR_MESSAGE       => ''
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'BE123456789',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 21,
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
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => ACCOUNT_COMPANY_VAT_LIVE_CHECK,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),   
    
    array( // data provider #3
        static::TEST_DESCRIPTION   => 'Offline Test: $customers_id != ""' ,
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => '0',
            static::VAT_ID_STATUS => '0',
            static::ERROR         => '1',
            static::VALIDATE      => '0'
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => null,
            static::GET_RESPONSE_RESULT_CHECKED_TIME => null,
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => null,
            static::GET_RESPONSE_ERROR_MESSAGE       => ''
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'DE278341275',
            static::CUSTOMERS_ID     => 10,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 0,
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
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => ACCOUNT_COMPANY_VAT_LIVE_CHECK,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),    
    
    array( // data provider #4
        static::TEST_DESCRIPTION   => 'Offline Test all parameters Empty.',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => '9',
            static::VAT_ID_STATUS => '',
            static::ERROR         => false,
            static::VALIDATE      => ''
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => null,
            static::GET_RESPONSE_RESULT_CHECKED_TIME => null,
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => null,
            static::GET_RESPONSE_ERROR_MESSAGE       => ''
        ],
        static::SET_VALUES => [
            static::VAT_ID           => '',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => null,
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
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => ACCOUNT_COMPANY_VAT_LIVE_CHECK,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => ''
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),    
];
