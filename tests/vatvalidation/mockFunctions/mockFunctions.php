<?php
function get_cust_status_from_country($country_id, $table)
{
    
    $database = [
        81 => [
            'customers_status_id' => 2,
            'customers_guest_status_id' => 1
        ],
        97 => [
            'customers_status_id' => 12,
            'customers_guest_status_id' => 11
        ] ,   
        197 => [
            'customers_status_id' => null,
            'customers_guest_status_id' => null
        ],
        195 => [
            'customers_status_id' => 12,
            'customers_guest_status_id' => 11
        ],
        21 => [
            'customers_status_id' => 12,
            'customers_guest_status_id' => 11
        ],
    ];
    
    if (isset($database[$country_id]) && isset($database[$country_id][$table])) {
        if ($database[$country_id][$table] > 0) {
            
            return $database[$country_id][$table];
        }
    }
            
    return false;
}
function xtc_not_null($value)
{
    if ($value == '' || $value == 'NULL' || (is_array($value) ? empty($value) : trim($value) == '')) {
        return false;
    }
    return true;
}

function xtc_get_countriesList(int $country_id, $bool)
{
    $result = [
        81 => ['countries_iso_code_2' => 'DE'],
        97 => ['countries_iso_code_2' => 'HR'],
        197 => ['countries_iso_code_2' => 'SH'],
        195 => ['countries_iso_code_2' => 'ES'],
        21 => ['countries_iso_code_2' => 'BE'],
        73 => ['countries_iso_code_2' => 'FR']
    ];
    
    if (isset($result[$country_id])) {
        return $result[$country_id];
    }
    
    return false;
}
