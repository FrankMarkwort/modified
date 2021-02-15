<?php
namespace modified\vatvalidation;

if (!defined('PHPUNIT')) {
    require_once (DIR_FS_INC . 'xtc_get_customers_country.inc.php');
}

require_once __DIR__ . '/../../vendor/autoload.php';

use poseidon\vatvalidation\message\ResponseSerializable;
use poseidon\vatvalidation\RequestController;
use poseidon\vatvalidation\message\Request;
use poseidon\vatvalidation\message\RequestInterface;

/**
 * 
 * @author frank
 *  @codeCoverageIgnore
 */
class ResponseHelper
{ 
    private const VALID = 'valid';      
    private const MESSAGGE = 'message';
    private const MAPPED_CODE = 'mapped';
    
    PUBLIC const ADDRESS_RESULT_A = 'A';
    PUBLIC const ADDRESS_RESULT_B = 'B';
    PUBLIC const ADDRESS_RESULT_C = 'C';
    PUBLIC const ADDRESS_RESULT_D = 'D';
    
    private static $addressMessage = [
        self::ADDRESS_RESULT_A => [
            self::MAPPED_CODE => 1,
            self::VALID => true,
            self::MESSAGGE =>  '<span class="messageStackSuccess">Geprüft/stimmt überein</span>',
        ],
        self::ADDRESS_RESULT_B => [
            self::MAPPED_CODE => 2,
            self::VALID => false,
            self::MESSAGGE =>  '<span class="messageStackError">Geprüft/stimmt nicht überein</span>',
        ],
        self::ADDRESS_RESULT_C => [
            self::MAPPED_CODE => 3,
            self::VALID => null,
            self::MESSAGGE =>  '<span class="messageStackWarning">nicht angefragt</span>',
        ],
        self::ADDRESS_RESULT_D => [
            self::MAPPED_CODE => 4,
            self::VALID => null,
            self::MESSAGGE =>  '<span class="messageStackWarning">vom EU-Mitgliedsstaat nicht mitgeteilt</span>',
        ],
        null => [
            self::MAPPED_CODE => 5,
            self::VALID => null,
            self::MESSAGGE =>  '<span class="messageStackWarning">kein Ergebnis</span>',
        ]
    ];
    
    public static function getAddressMessage(?string $char, ?string $vat_number = '', ?string $company_name = ''): ?string
    {
            $country = strtoupper(substr($vat_number, 0, 2));
            if (array_key_exists($char, static::$addressMessage) && ACCOUNT_COMPANY == 'true' && $country != 'DE' && !empty($company_name)) {
            
            return static::$addressMessage[$char][static::MESSAGGE];
        }
        
        return null;
    }
    
    static public function getResponseFromDataBase($customerId) :ResponseSerializable
    {
        $response = new ResponseSerializable();
        $customers_status_query = xtc_db_query(
            "SELECT customers_vatid_verified_infos FROM " . TABLE_CUSTOMERS . " WHERE customers_id = '" . $customerId . "'"
        );
        $base64serializedResponse = xtc_db_fetch_array($customers_status_query);
        if ($base64serializedResponse != false) {
            
            $response->unserialize($base64serializedResponse['customers_vatid_verified_infos']);
        }
        
        return $response;        
    }
    
    static public function updateValidateInDatabaseUseOrder(\order $order, bool $isPrint = false)
    {       
        $entry_country_id = xtc_get_customers_country($order->customer['id']);
        $requestController = new vat_validation_frank(
            $order->customer['vat_id'],
            $order->customer['id'],
            $order->customer['status'],
            $entry_country_id, 
            false
        );
        $requestController->set_request_print(false)
            ->set_request_company_name($order->customer['company'])
            ->set_request_postal_code($order->customer['postcode'])
            ->set_request_city_name($order->customer['city'])
            ->set_request_street($order->customer['street_address']);
        $requestController->send_request_to_service();
        /* @var $response ResponseSerializable */
        $serilizeResponse = $requestController->get_response_serialized();
        
        ResponseHelper::putResponseToDataBase($order->customer['id'] , $serilizeResponse, $requestController->get_vat_id_status());
        
        
    }

    static public function putResponseToDataBase(int $customerId, string $serilizeResponse, int $vat_id_status)
    {
       # $response = new ResponseSerializable();
        $customers_status_query = xtc_db_query(
            sprintf('UPDATE %s SET customers_vatid_verified_infos="%s",customers_vat_id_status=%s WHERE customers_id=%s',
                TABLE_CUSTOMERS,
                $serilizeResponse,
                $vat_id_status,
                $customerId
            )
        );
        $base64serializedResponse = xtc_db_fetch_array($customers_status_query); 
    }
}
