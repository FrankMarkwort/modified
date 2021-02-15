<?php
return [
    array( // data provider #0
        static::TEST_DESCRIPTION   => 'dataCurlProvider: OnLine with valid vat_id, wrong county_id => invalid Result.',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 6,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => false,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02.02.2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '12:35:15',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'HR20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 97,
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
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest0.xml')
    ),    
    array( // data provider #1
        static::TEST_DESCRIPTION   => 'dataCurlProvider: guest=true',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 6,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => false,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02.02.2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '12:42:50',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'HR20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 97,
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
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest1.xml')
    ),   
    array( // data provider #2
        static::TEST_DESCRIPTION   => 'dataCurlProvider: DB(custommer_status_id=null custommer_guest_status_id=null) guest=true',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 10,
            static::VAT_ID_STATUS => 8,
            static::ERROR         => true,
            static::VALIDATE      => 8
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
            static::VAT_ID           => 'SH20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 197,
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
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest2.xml')
    ),    
    array( // data provider #3
        static::TEST_DESCRIPTION   => 'dataCurlProvider: $customers_status_id not in  $cust_vatid_status_array',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 6,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => 0,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02.02.2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '12:11:53',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'HR20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 97,
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
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest3.xml')
    ),
    array( // data provider #4
        static::TEST_DESCRIPTION   => 'dataCurlProvider: [no curl request] vat_id="" DB(custommer_status_id=null custommer_guest_status_id=null) guest=true',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 11,
            static::VAT_ID_STATUS => null,
            static::ERROR         => null,
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
            static::COUNTRY_ID       => 97,
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
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => ACCOUNT_VAT_BLOCK_ERROR,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),    
    array( // data provider #5
        static::TEST_DESCRIPTION   => 'dataCurlProvider: [no curl request] vat_id="" DB(custommer_status_id=int>0 custommer_guest_status_id=int>0) guest=false',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 12,
            static::VAT_ID_STATUS => null,
            static::ERROR         => null,
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
            static::COUNTRY_ID       => 97,
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
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),   
    array( // data provider #6
        static::TEST_DESCRIPTION   => 'dataCurlProvider: [no curl request] vat_id="" DB(custommer_status_id=null custommer_guest_status_id=null) guest=false',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 9,
            static::VAT_ID_STATUS => null,
            static::ERROR         => null,
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
            static::COUNTRY_ID       => 197,
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
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => false
    ),
    array( // data provider #7
        static::TEST_DESCRIPTION   => 'dataCurlProvider:  Sollte eigendlich gueltig sein',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 6,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => 0,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02.02.2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '10:29:53',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'HR20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 97,
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
            static::STORE_OWNER_VAT_ID                    => 'DE263721827'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest7.xml')
    ),
    
    array( // data provider #8
        static::TEST_DESCRIPTION   => 'dataCurlProvider: ACCOUNT_COMPANY_VAT_GROUP=true Sollte eigendlich gueltig sein',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 12,
            static::VAT_ID_STATUS => 1,
            static::ERROR         => 0,
            static::VALIDATE      => 1
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '02.02.2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '10:29:53',
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 200,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist gültig.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'HR20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 97,
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
            static::STORE_OWNER_VAT_ID                    => 'DE263721827'
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest8.xml')#false # file_get_contents( __DIR__ . '/./mockResults/curl/resultTest7.xml')
    ),
    
    array( // data provider #9
        static::TEST_DESCRIPTION   => 'dataCurlProvider: ACCOUNT_VAT_BLOCK_ERROR=false DB(custommer_status_id=null custommer_guest_status_id=null) guest=true',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 10,
            static::VAT_ID_STATUS => 8,
            static::ERROR         => 0,
            static::VALIDATE      => 8
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
            static::VAT_ID           => 'SH20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 197,
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
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => false,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest9.xml')
    ),      
    array( // data provider #10
        static::TEST_DESCRIPTION   => 'dataCurlProvider: ACCOUNT_VAT_BLOCK_ERROR=false DB(custommer_status_id=null custommer_guest_status_id=null) guest=true',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 10,
            static::VAT_ID_STATUS => 8,
            static::ERROR         => false,
            static::VALIDATE      => 8
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
            static::VAT_ID           => 'SH20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 197,
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
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => false,
            static::STORE_OWNER_VAT_ID                    => ''
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest9.xml')
    ),     
    array( // data provider #11
        static::TEST_DESCRIPTION   => 'France',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => null,
            static::VAT_ID_STATUS => 8,
            static::ERROR         => false,
            static::VALIDATE      => 8
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '07.02.2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '12:00:31',
            static::GET_RESPONSE_VALID_FROM          => '15.07.2005',
            static::GET_RESPONSE_VALID_TO            => '31.12.2013',
            static::GET_RESPONSE_ERROR_CODE          => 204,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist ungültig. Sie war im Zeitraum von ... bis ... gültig (siehe Feld "Gueltig_ab" und "Gueltig_bis").'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'FR72483206587',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 73,
            static::GUEST            => true
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => 'PROVENÇALE AUTOMOBILES S.A.R.',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => 'TOULOUSE',
            static::SET_REQUEST_STREET => '32 B Chemin de Vallon de'
        ],
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => false,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest11.xml')
    ),   
       
    array( // data provider #12
        static::TEST_DESCRIPTION   => 'France',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => null,
            static::VAT_ID_STATUS => 8,
            static::ERROR         => false,
            static::VALIDATE      => 8
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => '07.02.2021',
            static::GET_RESPONSE_RESULT_CHECKED_TIME => '12:00:31',
            static::GET_RESPONSE_VALID_FROM          => '15.07.2005',
            static::GET_RESPONSE_VALID_TO            => '31.12.2013',
            static::GET_RESPONSE_ERROR_CODE          => 204,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die angefragte USt-IdNr. ist ungültig. Sie war im Zeitraum von ... bis ... gültig (siehe Feld "Gueltig_ab" und "Gueltig_bis").'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'FR72483206587',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 73,
            static::GUEST            => true
        ],
        static::SETTER => [
            static::SET_REQUEST_PRINT => false,
            static::SET_REQUEST_COMPANY_NAME => 'PROVENÇALE AUTOMOBILES S.A.R.',
            static::SET_REQUEST_POSTAL_CODE => '',
            static::SET_REQUEST_CITY_NAME => 'TOULOUSE',
            static::SET_REQUEST_STREET => '32 B Chemin de Vallon de'
        ],
        static::CONSTANTS => [
            static::ACCOUNT_COMPANY_VAT_LIVE_CHECK        => true,
            static::DEFAULT_CUSTOMERS_STATUS_ID           => DEFAULT_CUSTOMERS_STATUS_ID,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID       => DEFAULT_CUSTOMERS_VAT_STATUS_ID,
            static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST     => DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
            static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL => DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
            static::ACCOUNT_COMPANY_VAT_GROUP             => ACCOUNT_COMPANY_VAT_GROUP,
            static::STORE_COUNTRY                         => STORE_COUNTRY,
            static::ACCOUNT_VAT_BLOCK_ERROR               => false,
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest12.xml')
    ),    
    
    array( // data provider #13
        static::TEST_DESCRIPTION   => 'normaly valid but no connection',
        static::MARK_TEST_SKIPPED => false,
        static::EXPECTED =>   [
            static::STATUS        => 12,
            static::VAT_ID_STATUS => 95,
            static::ERROR         => true,
            static::VALIDATE      => 95
        ],
        static::EXPECTED_RESPONSE => [
            static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK => false,
            static::GET_RESPONSE_RESULT_CHECKED_DATE => null,
            static::GET_RESPONSE_RESULT_CHECKED_TIME => null,
            static::GET_RESPONSE_VALID_FROM          => null,
            static::GET_RESPONSE_VALID_TO            => null,
            static::GET_RESPONSE_ERROR_CODE          => 221,
            static::GET_RESPONSE_ERROR_MESSAGE       => 'Die Anfragedaten enthalten nicht alle notwendigen Parameter oder einen ungültigen Datentyp. Weitere Informationen erhalten Sie bei den Hinweisen zum Schnittstelle - Aufruf.'
        ],
        static::SET_VALUES => [
            static::VAT_ID           => 'HR20543250589',
            static::CUSTOMERS_ID     => null,
            static::CUSTOMERS_STATUS => null,
            static::COUNTRY_ID       => 97,
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
            static::STORE_OWNER_VAT_ID                    => STORE_OWNER_VAT_ID
        ],
        static::CUST_VATID_STATUS_ARRAY => ['2' => '2', '9' => '8', '11' => '6', '12' => '6', '13' => '8'],
        static::MOCK_FILE => file_get_contents( __DIR__ . '/../mockResults/curl/resultTest13.xml')
    ),   
    
];


//Portugal
//$vat_requ_cl_cc = 'PT';
//$vat_requ_cl_vatid = '508110009';
//$vat_requ_cl_name = 'VELHOS TRUNFOS, LDA';
//$vat_requ_cl_street = 'ZONA INDUSTRIAL TABOEIRA';

//$vat_requ_cl_cc = 'PT';
//$vat_requ_cl_vatid = '510900690';
//$vat_requ_cl_name = 'SolAna Tour Lda.';
//$vat_requ_cl_street = 'rua 3, lote 6, 2-A, Boavista';


