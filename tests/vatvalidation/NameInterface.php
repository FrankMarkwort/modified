<?php
namespace modified\vatvalidation;

interface NameInterface
{
    public const MARK_TEST_SKIPPED = 'markTestSkipped';
    public const TEST_DESCRIPTION = 'testDescription';
    public const EXPECTED = 'expected';
    public const EXPECTED_RESPONSE = 'expected_response';
    public const SETTER = 'setter';
    public const STATUS = 'status';
    public const VAT_ID_STATUS = 'vat_id_status';
    public const ERROR = 'error';
    public const VALIDATE = 'validate';
    public const SET_VALUES = 'setvalues';
    public const VAT_ID = 'vat_id';
    public const CUSTOMERS_ID = 'customers_id';
    public const CUSTOMERS_STATUS = 'customers_status';
    public const COUNTRY_ID = 'country_id';
    public const GUEST = 'guest';
    public const CONSTANTS = 'constants';  
    public const MOCK_FILE = 'mock_file';  
    public const ACCOUNT_COMPANY_VAT_LIVE_CHECK = 'ACCOUNT_COMPANY_VAT_LIVE_CHECK';
    public const DEFAULT_CUSTOMERS_STATUS_ID = 'DEFAULT_CUSTOMERS_STATUS_ID';
    public const DEFAULT_CUSTOMERS_VAT_STATUS_ID = 'DEFAULT_CUSTOMERS_VAT_STATUS_ID';
    public const DEFAULT_CUSTOMERS_STATUS_ID_GUEST = 'DEFAULT_CUSTOMERS_STATUS_ID_GUEST';
    public const DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL = 'DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL';
    public const ACCOUNT_COMPANY_VAT_GROUP = 'ACCOUNT_COMPANY_VAT_GROUP';
    public const STORE_COUNTRY = 'STORE_COUNTRY';
    public const ACCOUNT_VAT_BLOCK_ERROR = 'ACCOUNT_VAT_BLOCK_ERROR';
    public const STORE_OWNER_VAT_ID = 'STORE_OWNER_VAT_ID';    
    public const CUST_VATID_STATUS_ARRAY = 'cust_vatid_status_array';
    
    public const SET_REQUEST_PRINT = 'set_request_print';
    public const SET_REQUEST_CITY_NAME = 'set_request_city_name';
    public const SET_REQUEST_COMPANY_NAME = 'set_request_company_name';
    public const SET_REQUEST_POSTAL_CODE = 'set_request_postal_code';
    public const SET_REQUEST_STREET = 'set_request_street';
    
    public const IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK = 'is_response_valid_result_of_the_complete_address_check';  
    public const GET_RESPONSE_RESULT_CHECKED_DATE = 'get_response_result_checked_date';
    public const GET_RESPONSE_RESULT_CHECKED_TIME = 'get_response_result_checked_time';
    public const GET_RESPONSE_VALID_FROM = 'get_response_valid_from';
    public const GET_RESPONSE_VALID_TO = 'get_response_valid_to';
    public const GET_RESPONSE_ERROR_CODE = 'get_response_error_code';
    public const GET_RESPONSE_ERROR_MESSAGE = 'get_response_error_Message';
}


