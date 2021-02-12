<?php
declare(strict_types=1);

namespace modified\vatvalidation;

/**
 * @author Frank Markwort
 * @version 1.0.0
 *
 * @copyright Frank Markwort
 *
 */
require_once __DIR__ . '/defineConstants.php';
      
use PHPUnit\Framework\TestCase;
use poseidon\vatvalidation\message\Request;
use poseidon\vatvalidation\message\ResponseSerializable;
use poseidon\vatvalidation\mocks\RequestControllerMock;
use modified\vatvalidation\mockClass\vat_validation_mock;
use poseidon\vatvalidation\RequestController;
use modified\vatvalidation\NameInterface;

class vat_validation_frankTest extends TestCase implements NameInterface
{
    /**
     * 
     * @var vat_validation_frank
     */
    protected $vatValidationFrank;
    /**
     * 
     * @var RequestControllerMock
     */
    protected $queryCall;
    
    /**
     * @dataProvider dataOffLineProvider
     */
    public function testOffLineCalls(
        string $testDescription,
        bool $skipped,
        array $expected,
        array $expected_response,
        array $setvalues,
        array $setter,
        array $constants,
        array $cust_vatid_status,
        $mockFile
        )
    {
        $this->dataProvider($testDescription, $skipped, $expected, $expected_response, $setvalues, $setter, $constants, $cust_vatid_status, $mockFile);
    }
    
    /**
     * @dataProvider dataCurlCallProvider
     */
    public function testCurlCalls(
        string $testDescription,
        bool $skipped,
        array $expected,
        array $expected_response,
        array $setvalues,
        array $setter,
        array $constants,
        array $cust_vatid_status,
        $mockFile
    )
    {
        $this->dataProvider($testDescription, $skipped, $expected, $expected_response, $setvalues, $setter, $constants, $cust_vatid_status, $mockFile);
    }
    
    /**
     * @dataProvider dataSoapCallProvider
     */
    public function testSoapCalls(
        string $testDescription,
        bool $skipped,
        array $expected,
        array $expected_response,
        array $setvalues,
        array $setter,
        array $constants,
        array $cust_vatid_status,
        $mockFile
    )
    {
        #$this->markTestSkipped();
        $this->dataProvider($testDescription, $skipped, $expected, $expected_response, $setvalues, $setter, $constants, $cust_vatid_status, $mockFile);
    }
    
    protected function dataProvider(
        string $testDescription, 
        bool $skipped, 
        array $expected, 
        array $expected_response,
        array $setvalues, 
        array $setter,
        array $constants, 
        array $cust_vatid_status,
        $mockFile
    )
    {
        if ($skipped) {
            
            $this->markTestSkipped('Skipped: ' . $testDescription);
        }
        
        global $cust_vatid_status_array;
        $cust_vatid_status_array =  $cust_vatid_status;
        $this->vatValidationFrank = new vat_validation_Mock(
            $setvalues[static::VAT_ID], 
            $setvalues[static::CUSTOMERS_ID],
            $setvalues[static::CUSTOMERS_STATUS],
            $setvalues[static::COUNTRY_ID],
            $setvalues[static::GUEST]
        );       
        $this->vatValidationFrank->set_global_defines(
            $constants[static::ACCOUNT_COMPANY_VAT_LIVE_CHECK],
            $constants[static::DEFAULT_CUSTOMERS_STATUS_ID],
            $constants[static::DEFAULT_CUSTOMERS_VAT_STATUS_ID],
            $constants[static::DEFAULT_CUSTOMERS_STATUS_ID_GUEST],
            $constants[static::DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL],
            $constants[static::ACCOUNT_COMPANY_VAT_GROUP],
            $constants[static::STORE_COUNTRY],
            $constants[static::ACCOUNT_VAT_BLOCK_ERROR],
            $constants[static::STORE_OWNER_VAT_ID]
        );
        if($mockFile) {
            $this->queryCall = new RequestControllerMock(new Request(), new ResponseSerializable());
            $this->queryCall->setMockResult($mockFile);
        } else {
            $this->queryCall = new RequestController(new Request(), new ResponseSerializable());
        }                
        $this->vatValidationFrank->setRequestController($this->queryCall);
        $this->vatValidationFrank->set_request_print($setter[static::SET_REQUEST_PRINT]);
        $this->vatValidationFrank->set_request_company_name($setter[static::SET_REQUEST_COMPANY_NAME]);
        $this->vatValidationFrank->set_request_postal_code($setter[static::SET_REQUEST_POSTAL_CODE]);
        $this->vatValidationFrank->set_request_city_name($setter[static::SET_REQUEST_CITY_NAME]);
        $this->vatValidationFrank->set_request_street($setter[static::SET_REQUEST_STREET]);
        $this->vatValidationFrank->send_request_to_service();
        $this->assertNotEquals(999, $this->queryCall->getResponse()->getErrorCode(), (string)$this->queryCall->getResponse()->getErrorMessage());
        $this->assertEquals($this->vatValidationFrank->get_status(), $this->vatValidationFrank->get_vat_info()['status']);
        $this->assertEquals($this->vatValidationFrank->is_error(), $this->vatValidationFrank->get_vat_info()['error']);
        $this->assertEquals($this->vatValidationFrank->get_validate(), $this->vatValidationFrank->get_vat_info()['validate']);
        $this->assertEquals($this->vatValidationFrank->get_vat_id_status(), $this->vatValidationFrank->get_vat_info()['vat_id_status']);  
        $this->assertIsBool($this->vatValidationFrank->is_error(), 'is_error is not an bool');
        $this->assertIsIntOrNull($this->vatValidationFrank->get_status(), 'get_status is not an int');
        $this->assertIsIntOrNull($this->vatValidationFrank->get_vat_id_status(), 'get_vat_id_status is not an int');
        $this->assertIsIntOrNull($this->vatValidationFrank->get_validate(), 'get_validate is not an int');
        
        $this->assertEquals($this->vatValidationFrank->is_response_valid_result_of_the_complete_address_check(), $expected_response[static::IS_RESPONSE_VALID_RESULT_OF_THE_COMPLETE_ADDRESS_CHECK]);
        $this->assertEquals($this->vatValidationFrank->get_response_error_code(), $expected_response[static::GET_RESPONSE_ERROR_CODE]);
        $this->assertEquals($this->vatValidationFrank->get_response_result_checked_date(), $expected_response[static::GET_RESPONSE_RESULT_CHECKED_DATE]);
        $this->assertEquals($this->vatValidationFrank->get_response_result_checked_time() , $expected_response[static::GET_RESPONSE_RESULT_CHECKED_TIME]);
        $this->assertEquals($this->vatValidationFrank->get_response_valid_from() , $expected_response[static::GET_RESPONSE_VALID_FROM]);
        $this->assertEquals($this->vatValidationFrank->get_response_valid_to() , $expected_response[static::GET_RESPONSE_VALID_TO]);
        $this->assertEquals($this->vatValidationFrank->get_response_error_Message() , $expected_response[static::GET_RESPONSE_ERROR_MESSAGE]);
    }
    
    protected function assertIsIntOrNull($value, $message = '')
    {
        $this->assertTrue(is_int($value) || is_null($value), $message);
    }
     
    public function dataOffLineProvider()
    {
        return include __DIR__ . '/dataOffLineProvider.php';
    }
    
    public function dataSoapCallProvider()
    {
        return include __DIR__ . '/dataSoapCallProvider.php';
    }
    
    public function dataCurlCallProvider()
    {
        return include __DIR__ . '/dataCurlCallProvider.php';
    }
    
    protected function mockHelperUseCurlOrSoap()
    {
        if ($this->query->isSoapMockService()) {
            $this->query->setMockResult($this->getTestSoapResultData());
        } elseif ($this->query->isCurlMockService()) {
            $this->query->setMockResult($this->getTestCurlResultData());
        }
    }
}

require_once __DIR__ . '/./mockFunctions/mockFunctions.php'; 

