<?php
namespace modified\vatvalidation;

/* @TODO rename vat_validation_modiefied
 * Require hier da is kein autoloader gibt
 * @TODO types are not consistent
 */
if (!defined('PHPUNIT')) {
    require_once (DIR_FS_INC . 'xtc_get_countries.inc.php');
    require_once (DIR_FS_INC . 'get_cust_status_from_country.inc.php'); 
}
require_once __DIR__ . '/../autoload.php';

use poseidon\vatvalidation\message\Request;
use poseidon\vatvalidation\RequestController;
use poseidon\vatvalidation\message\ResponseSerializable;
use poseidon\vatvalidation\validate\VatNumberFormat;
use poseidon\vatvalidation\clients\QueryInterface;
use poseidon\vatvalidation\message\RequestInterface;
use poseidon\vatvalidation\message\ResponseSerializableInterface;

class vat_validation_frank
{
    private const INVALID = 0;
    private const VALID = 1 ;   
    private const UNKNOWN_COUNTRY = 8;  
    private const UNKNOWN_ALGORITHM = 9;
    private const INVALID_INPUT = 94;        // => 'The provided CountryCode is invalid or the VAT number is empty',
    private const SERVICE_UNAVAILABLE = 95;  // => 'The SOAP service is unavailable, try again later',
    private const MS_UNAVAILABLE = 96;       // => 'The Member State service is unavailable, try again later or with another Member State',
    private const TIMEOUT = 97;              // => 'The Member State service could not be reached in time, try again later or with another Member State',
    private const SERVER_BUSY = 98;          // => 'The service cannot process your request. Try again later.'
    private const NO_PHP5_SOAP_SUPPORT = 99;  // 'no PHP5 SOAP support'
    
    private const STATUS = 'status';
    private const VAT_ID_STATUS = 'vat_id_status';
    private const ERROR = 'error';
    private const VALIDATE = 'validate';
    
    protected static $DEFAULT_CUSTOMERS_STATUS_ID;
    protected static $DEFAULT_CUSTOMERS_VAT_STATUS_ID;
    protected static $DEFAULT_CUSTOMERS_STATUS_ID_GUEST;
    protected static $DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL;
    protected static $ACCOUNT_COMPANY_VAT_GROUP;
    protected static $STORE_COUNTRY;
    protected static $ACCOUNT_VAT_BLOCK_ERROR;
    protected static $STORE_OWNER_VAT_ID;   
    
    protected $vat_info = [
        self::STATUS => null,
        self::VAT_ID_STATUS => null,
        self::ERROR => false,
        self::VALIDATE => null
    ];
    protected $live_check;
    protected $temp_cust_status;
    protected $temp_guest_status;
    protected $vat_id;
    protected $customers_id; 
    protected $customers_status; 
    protected $country_id;
    protected $guest;
    protected $requestController;
    
    public function __construct(string $vat_id = '', ?int $customers_id = null, ?int $customers_status = null, ?int $country_id = null, bool $guest = false)
    {
        $this->set_global_defines();
        $this->vat_id = $vat_id;
        $this->customers_id = $customers_id;
        $this->customers_status = $customers_status;
        $this->country_id = $country_id ;
        $this->guest = $guest;
        $vat_id = str_replace(' ', '', $vat_id); //TODO funktioniert nicht wenn vatid aus blöcken besteht
        $this->temp_cust_status = get_cust_status_from_country($this->country_id, 'customers_status_id');
        $this->temp_guest_status = get_cust_status_from_country($this->country_id, 'customers_guest_status_id');
        if (!defined('PHPUNIT')) {
            // @codeCoverageIgnoreStart
            $this->setRequestController(new RequestController(new Request(), new ResponseSerializable()));
            // @codeCoverageIgnoreEnd
        }
    }
    
    public function get_response_serialized(): string
    {
        return $this->getResponse()->serialize();
    }
    
    /**
     * @desc Is required for unit tests. Otherwise the method is called in the constructor.
     */
    public function setRequestController(QueryInterface $query): self
    {
        $this->requestController = $query;
        
        return $this;
    }
    
    /**
     * @desc sets data in the request object
     */
    public function set_request_print(bool $value = false) :self
    {
        $this->getRequest()->setDruck($value);
        
        return $this;
    }
    
    /**
     * @desc sets data in the request object
     */
    public function set_request_company_name(string $value) :self
    {
        $this->getRequest()->setFirmenname($value);
        
        return $this;
    }
    
    /**
     * @desc sets data in the request object
     */
    public function set_request_city_name(string $value) :self
    {
        $this->getRequest()->setOrt($value);
        
        return $this;
    }
    
    /**
     * @desc sets data in the request object
     */
    public function set_request_postal_code(string $value) :self
    {
        $this->getRequest()->setPlz($value);
        
        return $this;
    }
    /**
     * @desc sets data in the request object
     */
    public function set_request_street(string $value) :self
    {
        $this->getRequest()->setStrasse($value);
        
        return $this;
    }
 
    /**
     * @desc returns data from response Object
 *           Please use the send_request_to_service method beforehand. Otherwise the response object is empty.
     */   
    public function is_response_valid_result_of_the_complete_address_check() :?bool
    {
        return $this->getResponse()->isValidResultOfTheCompleteAddressCheck();
    }
    
    /**
     * @desc returns data from response Object
 *           Please use the send_request_to_service method beforehand. Otherwise the response object is empty.
     */ 
    public function get_response_result_checked_date(): ?string
    {
        return $this->getResponse()->getDatum();
    }
    
    /**
     * @desc returns data from response Object
     *       Please use the send_request_to_service method beforehand. Otherwise the response object is empty.
     */ 
    public function get_response_result_checked_time(): ?string
    {
        return $this->getResponse()->getUhrzeit();
    }
    
    /**
     * @desc returns data from response Object
     *       Please use the send_request_to_service method beforehand. Otherwise the response object is empty.
     */ 
    public function get_response_valid_from(): ?string
    {
        return $this->getResponse()->getGueltigAb();
    }
    
    /**
     * @desc returns data from response Object
     *       Please use the send_request_to_service method beforehand. Otherwise the response object is empty.
     */ 
    public function get_response_valid_to(): ?string
    {
        return $this->getResponse()->getGueltigBis();
    }
    
    /**
     * @desc returns data from response Object
     *       Please use the send_request_to_service method beforehand. Otherwise the response object is empty.
     */ 
    public function get_response_error_code(): ?int
    {
        return $this->getResponse()->getErrorCode();
    }
    
    /**
     * @desc returns data from response Object
     *       Please use the send_request_to_service method beforehand. Otherwise the response object is empty.
     */ 
    public function get_response_error_Message(): ?string
    {
        return $this->getResponse()->getErrorMessage();
    }
    
    /**
     * 
     * @desc Sends the request object to the external service
     *       and fills the response object
     */
    public function send_request_to_service() :self
    {
        if (xtc_not_null($this->vat_id)) {
            $this->initInfo($this->vat_id, $this->customers_id, $this->customers_status, $this->country_id, $this->guest);
        } else {
            if ($this->guest === true) {
                if ($this->temp_guest_status) {
                    $this->set_vat_info_status($this->temp_guest_status);
                } else {
                    $this->set_vat_info_status(static::$DEFAULT_CUSTOMERS_STATUS_ID_GUEST);
                }
            } else {
                if ($this->temp_cust_status) {
                    $this->set_vat_info_status($this->temp_cust_status);
                } else {
                    $this->set_vat_info_status(static::$DEFAULT_CUSTOMERS_STATUS_ID);
                }
            }
        }
        
        return $this;
    }
    
    /**
     * @desc returns modified internal data still needs to be checked.
     */
    public function get_vat_info():array
    {
        return $this->vat_info;
    }
    
    /**
     * @desc returns modified internal data still needs to be checked.
     */
    public function get_vat_id_status():?int
    {
        return $this->get_vat_info()[self::VAT_ID_STATUS];
    }
    
    /**
     * @desc returns modified internal data still needs to be checked.
     */
    public function get_status(): ?int
    {
        return $this->get_vat_info()[self::STATUS];
    }
    
    /**
     * @desc returns modified internal data still needs to be checked.
     */
    public function is_error():bool
    {
        return $this->get_vat_info()[self::ERROR];
    }
    
    /**
     * @desc returns modified internal data still needs to be checked.
     */
    public function get_validate():?int
    {
        return $this->get_vat_info()[self::VALIDATE];
    }
    
    /**
     * @desc Is required for unit tests. Otherwise the method is called in the constructor.
     *       set global defines
     *       never use defines it's not testable !!
     */
    public function set_global_defines(
        $account_company_vat_live_check = ACCOUNT_COMPANY_VAT_LIVE_CHECK,
        $default_customers_status_id = DEFAULT_CUSTOMERS_STATUS_ID,
        $default_customers_vat_status_id = DEFAULT_CUSTOMERS_VAT_STATUS_ID,
        $default_customers_status_id_guest = DEFAULT_CUSTOMERS_STATUS_ID_GUEST,
        $default_customers_vat_status_id_local = DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL,
        $account_company_vat_group = ACCOUNT_COMPANY_VAT_GROUP,
        $store_country = STORE_COUNTRY,
        $account_vat_block_error = ACCOUNT_VAT_BLOCK_ERROR,
        $store_owner_vat_id = STORE_OWNER_VAT_ID
    )
    {
        $this->live_check = $account_company_vat_live_check;
        static::$DEFAULT_CUSTOMERS_STATUS_ID = $default_customers_status_id;
        static::$DEFAULT_CUSTOMERS_VAT_STATUS_ID = $default_customers_vat_status_id;
        static::$DEFAULT_CUSTOMERS_STATUS_ID_GUEST = $default_customers_status_id_guest;
        static::$DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL = $default_customers_vat_status_id_local;
        static::$ACCOUNT_COMPANY_VAT_GROUP = $account_company_vat_group;
        static::$STORE_COUNTRY = $store_country;
        static::$ACCOUNT_VAT_BLOCK_ERROR = $account_vat_block_error;
        static::$STORE_OWNER_VAT_ID = str_replace(' ', '',$store_owner_vat_id);  
    }
       
    protected function getResponse() :ResponseSerializableInterface
    {
        return $this->getRequestController()->getResponse();
    }
    
    protected function getRequest() :RequestInterface
    {
        return $this->getRequestController()->getRequest();
    }
    
    protected function getRequestController(): QueryInterface
    {
        return $this->requestController;
    }
    
    protected function initInfo(string $vat_id = '', ?int $customers_id = null, ?int $customers_status = null, ?int $country_id = null, bool $guest = false): void
    {
        global $cust_vatid_status_array;
        $customers_status_id = $this->temp_cust_status ? $this->temp_cust_status : static::$DEFAULT_CUSTOMERS_STATUS_ID;
        if (array_key_exists($customers_status_id, $cust_vatid_status_array)) {
            $customers_vat_status_id = $cust_vatid_status_array[$customers_status_id];
            $customers_vat_status_id_local = $cust_vatid_status_array[$customers_status_id];
        } else {
            $customers_vat_status_id = static::$DEFAULT_CUSTOMERS_VAT_STATUS_ID;
            $customers_vat_status_id_local = static::$DEFAULT_CUSTOMERS_VAT_STATUS_ID_LOCAL;
        }

        if ($guest === true) {
            if ($this->temp_guest_status) {
                $customers_status_id = $this->temp_guest_status;
            } else {
                $customers_status_id = static::$DEFAULT_CUSTOMERS_STATUS_ID_GUEST;
            }
        }

        if ($vat_id != '') {
            $validate_vatid = $this->validate_vatid_and_get_customers_vat_status_id($vat_id, $country_id);
            switch ($validate_vatid) {
                case self::VALID:
                    $status = $this->get_customer_vat_status($country_id, $customers_vat_status_id_local, $customers_status_id, $customers_vat_status_id);
                    $error = false;
                    $vat_id_status = $validate_vatid;
                    break;
                case self::INVALID:
                case self::UNKNOWN_COUNTRY:
                case self::UNKNOWN_ALGORITHM:
                case self::NO_PHP5_SOAP_SUPPORT:
                case self::SERVER_BUSY:
                case self::TIMEOUT:
                case self::MS_UNAVAILABLE:
                case self::SERVICE_UNAVAILABLE:
                case self::INVALID_INPUT:
                    $error = $this->get_error_if_account_vat_block_error();
                    $status = $customers_status_id;
                    $vat_id_status = $validate_vatid;
                    break;
                default:
                    $status = $customers_status_id;
                    break;
            }
        }

        $this->set_vat_info(
            $this->correct_status_if_is_admin($customers_id, $status),
            $vat_id_status,
            $error,
            $validate_vatid
        );
    }
    
    protected function set_vat_info_status(?int $status) :self
    {
        $this->vat_info[self::STATUS] = $status;
        
        return $this;
    }
    
    protected function set_vat_info_vat_id_status(?int $vat_id_status) :self
    {
        $this->vat_info[self::VAT_ID_STATUS] = $vat_id_status;
        
        return $this;
    }
    
    protected function set_vat_info_error(?bool $error): self
    {
        $this->vat_info[self::ERROR] = $error;
        
        return $this;
    }
    
    protected function set_vat_info_validate(?int $validate): self
    {
        $this->vat_info[self::VALIDATE] = $validate;
        
        return $this;
    }
    
    protected function set_vat_info(?int $status = null, ?int $vat_id_status = null, ?bool $error = null, ?int $validate_vatid = null) :void
    {
        $this->set_vat_info_status($status);
        $this->set_vat_info_vat_id_status($vat_id_status);
        $this->set_vat_info_error($error);
        $this->set_vat_info_validate($validate_vatid);
    }
 
    protected function get_customer_vat_status(?int $country_id, ?int $customers_vat_status_id_local, ?int $customers_status_id , ?int $customers_vat_status_id) :?int
    {
        if (static::$ACCOUNT_COMPANY_VAT_GROUP == 'true') {
            if ($country_id == self::$STORE_COUNTRY) {
                
                return $customers_vat_status_id_local;
            }
            
            return $customers_vat_status_id;
        } 
        
        return $customers_status_id;
    }
    
    protected function get_error_if_account_vat_block_error(): bool
    {
        if (static::$ACCOUNT_VAT_BLOCK_ERROR == 'true') {
            
            return true;
        }
        
        return false;
    }
    
    protected function correct_status_if_is_admin(?int $customers_id, string $status): ?int
    {
        if (! is_null($customers_id)) {
            $customers_status_value =  $this->get_customer_status_from_databas($customers_id);
            
            if ($customers_status_value == 0) {
                $status = self::INVALID;
            }
        }
        
        return $status;
    }
    
    /**
     * @codeCoverageIgnore
     */
    protected function get_customer_status_from_databas(?int $customers_id): ?int
    {
        $customers_status_query = xtc_db_query(
            "SELECT customers_status FROM " . TABLE_CUSTOMERS . " WHERE customers_id = '" . $customers_id . "'"
        );
        $customers_status_value = xtc_db_fetch_array($customers_status_query);
        
        return $customers_status_value['customers_status'];
    }

    protected function validate_vatid_and_get_customers_vat_status_id(string $vat_id, ?int $country_id): int
    {
        $vat_id = $this->remove_special_chars($vat_id);
        $vatNumber = substr($vat_id, 2);
        $country = strtolower(substr($vat_id, 0, 2));
        if (! $this->is_country_in_db($country_id, $country)) {
            
            return self::INVALID;
        }

        if ($this->is_store_vatid_equals_vatid($vatNumber)) {
            
            return self::INVALID;
        }
  
        $country = $this->fix_Greece_country_code($country);
        $country_iso_code = strtoupper($country);
        $vatNumber = $this->fix_old_belgien_vat_id($country_iso_code, $vatNumber);
        $request = $this->getRequestController()->getRequest();
        $request->setUst1(trim(chop(static::$STORE_OWNER_VAT_ID)))->setUst2($country_iso_code . $vatNumber);
        $validator = new VatNumberFormat($request); 
        if (! $validator->isCountyCodeExist($country)) {

            return self::UNKNOWN_COUNTRY;
        }
            
        if ($this->isLiveCeck()) {
            $this->getRequestController()->sendRequestToService();

            return $this->getRequestController()->getResponse()->getMappedErrorCode();

        } else {
            if ($validator->isValid()) {
                
                return self::VALID;
            }
        }

        return self::INVALID;
    }    
    
    protected function isLiveCeck(): bool
    {
        return $this->live_check;
    }
    
    protected function get_remove_chars(): array
    {
        return [' ', '-', '/', '\\', '.', ':', ',']; //TODO ' ' funktioniert nicht wenn vatid aus blöcken besteht
    }
    
    protected function remove_special_chars($vat_id): string
    {
        $vat_id = trim(chop($vat_id));
        
        return str_replace($this->get_remove_chars(), '', $vat_id);
    }
  
    protected function is_country_in_db(?int $country_id, string $country_iso_2): bool
    {
        $country_check = xtc_get_countriesList($country_id, true);
        if ($country_check['countries_iso_code_2'] == strtoupper($country_iso_2)) {
            
            return true;
        }
        
        return false;
    }
    
    protected function is_store_vatid_equals_vatid(string $vatNumber): bool
    {
        if (static::$STORE_OWNER_VAT_ID != '') {
            $vat_id_store_owner = trim(static::$STORE_OWNER_VAT_ID);
            $vat_id_store_owner = str_replace($this->get_remove_chars(), '', $vat_id_store_owner);
            $vat_id_store_owner = substr($vat_id_store_owner, 2);
            if ($vat_id_store_owner == $vatNumber) {
                
                return true;
            }
        }
        
        return false;
    }
    
    protected function fix_Greece_country_code(string $country): string
    {
        return str_replace(['gr'], ['el'], $country);
    }
    
    protected function fix_old_belgien_vat_id(string $country_iso_code, string $vatNumber): string
    {
        if ($country_iso_code == 'BE') {
            if (strlen($vatNumber) == 9) {
                
                return str_pad($vatNumber, 10, '0', STR_PAD_LEFT);
            }
        }
        
        return $vatNumber;
    }
}
