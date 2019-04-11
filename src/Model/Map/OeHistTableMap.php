<?php

namespace Map;

use \OeHist;
use \OeHistQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'oe_hist' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OeHistTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OeHistTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'oe_hist';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OeHist';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OeHist';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 143;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 143;

    /**
     * the column name for the orderno field
     */
    const COL_ORDERNO = 'oe_hist.orderno';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'oe_hist.status';

    /**
     * the column name for the holdstatus field
     */
    const COL_HOLDSTATUS = 'oe_hist.holdstatus';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'oe_hist.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'oe_hist.shiptoid';

    /**
     * the column name for the shipto_name field
     */
    const COL_SHIPTO_NAME = 'oe_hist.shipto_name';

    /**
     * the column name for the shipto_address1 field
     */
    const COL_SHIPTO_ADDRESS1 = 'oe_hist.shipto_address1';

    /**
     * the column name for the shipto_address2 field
     */
    const COL_SHIPTO_ADDRESS2 = 'oe_hist.shipto_address2';

    /**
     * the column name for the shipto_address3 field
     */
    const COL_SHIPTO_ADDRESS3 = 'oe_hist.shipto_address3';

    /**
     * the column name for the shipto_address4 field
     */
    const COL_SHIPTO_ADDRESS4 = 'oe_hist.shipto_address4';

    /**
     * the column name for the shipto_city field
     */
    const COL_SHIPTO_CITY = 'oe_hist.shipto_city';

    /**
     * the column name for the shipto_state field
     */
    const COL_SHIPTO_STATE = 'oe_hist.shipto_state';

    /**
     * the column name for the shipto_zip field
     */
    const COL_SHIPTO_ZIP = 'oe_hist.shipto_zip';

    /**
     * the column name for the custpo field
     */
    const COL_CUSTPO = 'oe_hist.custpo';

    /**
     * the column name for the orderdate field
     */
    const COL_ORDERDATE = 'oe_hist.orderdate';

    /**
     * the column name for the termcode field
     */
    const COL_TERMCODE = 'oe_hist.termcode';

    /**
     * the column name for the shipviacode field
     */
    const COL_SHIPVIACODE = 'oe_hist.shipviacode';

    /**
     * the column name for the invoice_number field
     */
    const COL_INVOICE_NUMBER = 'oe_hist.invoice_number';

    /**
     * the column name for the invoice_date field
     */
    const COL_INVOICE_DATE = 'oe_hist.invoice_date';

    /**
     * the column name for the genledger_period field
     */
    const COL_GENLEDGER_PERIOD = 'oe_hist.genledger_period';

    /**
     * the column name for the salesperson_1 field
     */
    const COL_SALESPERSON_1 = 'oe_hist.salesperson_1';

    /**
     * the column name for the salesperson_1pct field
     */
    const COL_SALESPERSON_1PCT = 'oe_hist.salesperson_1pct';

    /**
     * the column name for the salesperson_2 field
     */
    const COL_SALESPERSON_2 = 'oe_hist.salesperson_2';

    /**
     * the column name for the salesperson_2pct field
     */
    const COL_SALESPERSON_2PCT = 'oe_hist.salesperson_2pct';

    /**
     * the column name for the salesperson_3 field
     */
    const COL_SALESPERSON_3 = 'oe_hist.salesperson_3';

    /**
     * the column name for the salesperson_3pct field
     */
    const COL_SALESPERSON_3PCT = 'oe_hist.salesperson_3pct';

    /**
     * the column name for the contract_nbr field
     */
    const COL_CONTRACT_NBR = 'oe_hist.contract_nbr';

    /**
     * the column name for the batch_nbr field
     */
    const COL_BATCH_NBR = 'oe_hist.batch_nbr';

    /**
     * the column name for the dropreleasehold field
     */
    const COL_DROPRELEASEHOLD = 'oe_hist.dropreleasehold';

    /**
     * the column name for the subtotal_tax field
     */
    const COL_SUBTOTAL_TAX = 'oe_hist.subtotal_tax';

    /**
     * the column name for the subtotal_nontax field
     */
    const COL_SUBTOTAL_NONTAX = 'oe_hist.subtotal_nontax';

    /**
     * the column name for the total_tax field
     */
    const COL_TOTAL_TAX = 'oe_hist.total_tax';

    /**
     * the column name for the total_freight field
     */
    const COL_TOTAL_FREIGHT = 'oe_hist.total_freight';

    /**
     * the column name for the total_misc field
     */
    const COL_TOTAL_MISC = 'oe_hist.total_misc';

    /**
     * the column name for the total_order field
     */
    const COL_TOTAL_ORDER = 'oe_hist.total_order';

    /**
     * the column name for the total_cost field
     */
    const COL_TOTAL_COST = 'oe_hist.total_cost';

    /**
     * the column name for the lock field
     */
    const COL_LOCK = 'oe_hist.lock';

    /**
     * the column name for the taken_date field
     */
    const COL_TAKEN_DATE = 'oe_hist.taken_date';

    /**
     * the column name for the taken_time field
     */
    const COL_TAKEN_TIME = 'oe_hist.taken_time';

    /**
     * the column name for the pick_date field
     */
    const COL_PICK_DATE = 'oe_hist.pick_date';

    /**
     * the column name for the pick_time field
     */
    const COL_PICK_TIME = 'oe_hist.pick_time';

    /**
     * the column name for the pack_date field
     */
    const COL_PACK_DATE = 'oe_hist.pack_date';

    /**
     * the column name for the pack_time field
     */
    const COL_PACK_TIME = 'oe_hist.pack_time';

    /**
     * the column name for the verify_date field
     */
    const COL_VERIFY_DATE = 'oe_hist.verify_date';

    /**
     * the column name for the verify_time field
     */
    const COL_VERIFY_TIME = 'oe_hist.verify_time';

    /**
     * the column name for the creditmemo field
     */
    const COL_CREDITMEMO = 'oe_hist.creditmemo';

    /**
     * the column name for the booked field
     */
    const COL_BOOKED = 'oe_hist.booked';

    /**
     * the column name for the original_whse field
     */
    const COL_ORIGINAL_WHSE = 'oe_hist.original_whse';

    /**
     * the column name for the billto_state field
     */
    const COL_BILLTO_STATE = 'oe_hist.billto_state';

    /**
     * the column name for the shipcomplete field
     */
    const COL_SHIPCOMPLETE = 'oe_hist.shipcomplete';

    /**
     * the column name for the cwo_flag field
     */
    const COL_CWO_FLAG = 'oe_hist.cwo_flag';

    /**
     * the column name for the division field
     */
    const COL_DIVISION = 'oe_hist.division';

    /**
     * the column name for the taken_code field
     */
    const COL_TAKEN_CODE = 'oe_hist.taken_code';

    /**
     * the column name for the pack_code field
     */
    const COL_PACK_CODE = 'oe_hist.pack_code';

    /**
     * the column name for the pick_code field
     */
    const COL_PICK_CODE = 'oe_hist.pick_code';

    /**
     * the column name for the verify_code field
     */
    const COL_VERIFY_CODE = 'oe_hist.verify_code';

    /**
     * the column name for the total_discount field
     */
    const COL_TOTAL_DISCOUNT = 'oe_hist.total_discount';

    /**
     * the column name for the edi_refererencenbr field
     */
    const COL_EDI_REFERERENCENBR = 'oe_hist.edi_refererencenbr';

    /**
     * the column name for the user_code1 field
     */
    const COL_USER_CODE1 = 'oe_hist.user_code1';

    /**
     * the column name for the user_code2 field
     */
    const COL_USER_CODE2 = 'oe_hist.user_code2';

    /**
     * the column name for the user_code3 field
     */
    const COL_USER_CODE3 = 'oe_hist.user_code3';

    /**
     * the column name for the user_code4 field
     */
    const COL_USER_CODE4 = 'oe_hist.user_code4';

    /**
     * the column name for the exchange_country field
     */
    const COL_EXCHANGE_COUNTRY = 'oe_hist.exchange_country';

    /**
     * the column name for the exchange_rate field
     */
    const COL_EXCHANGE_RATE = 'oe_hist.exchange_rate';

    /**
     * the column name for the weight_total field
     */
    const COL_WEIGHT_TOTAL = 'oe_hist.weight_total';

    /**
     * the column name for the weight_override field
     */
    const COL_WEIGHT_OVERRIDE = 'oe_hist.weight_override';

    /**
     * the column name for the box_count field
     */
    const COL_BOX_COUNT = 'oe_hist.box_count';

    /**
     * the column name for the request_date field
     */
    const COL_REQUEST_DATE = 'oe_hist.request_date';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'oe_hist.cancel_date';

    /**
     * the column name for the lockedby field
     */
    const COL_LOCKEDBY = 'oe_hist.lockedby';

    /**
     * the column name for the release_number field
     */
    const COL_RELEASE_NUMBER = 'oe_hist.release_number';

    /**
     * the column name for the whse field
     */
    const COL_WHSE = 'oe_hist.whse';

    /**
     * the column name for the backorder_date field
     */
    const COL_BACKORDER_DATE = 'oe_hist.backorder_date';

    /**
     * the column name for the deptcode field
     */
    const COL_DEPTCODE = 'oe_hist.deptcode';

    /**
     * the column name for the freight_in_entered field
     */
    const COL_FREIGHT_IN_ENTERED = 'oe_hist.freight_in_entered';

    /**
     * the column name for the dropship_entered field
     */
    const COL_DROPSHIP_ENTERED = 'oe_hist.dropship_entered';

    /**
     * the column name for the er_flag field
     */
    const COL_ER_FLAG = 'oe_hist.er_flag';

    /**
     * the column name for the freight_in field
     */
    const COL_FREIGHT_IN = 'oe_hist.freight_in';

    /**
     * the column name for the dropship field
     */
    const COL_DROPSHIP = 'oe_hist.dropship';

    /**
     * the column name for the minorder field
     */
    const COL_MINORDER = 'oe_hist.minorder';

    /**
     * the column name for the contract_terms field
     */
    const COL_CONTRACT_TERMS = 'oe_hist.contract_terms';

    /**
     * the column name for the dropship_billed field
     */
    const COL_DROPSHIP_BILLED = 'oe_hist.dropship_billed';

    /**
     * the column name for the order_type field
     */
    const COL_ORDER_TYPE = 'oe_hist.order_type';

    /**
     * the column name for the tracking_edinumber field
     */
    const COL_TRACKING_EDINUMBER = 'oe_hist.tracking_edinumber';

    /**
     * the column name for the source field
     */
    const COL_SOURCE = 'oe_hist.source';

    /**
     * the column name for the pick_format field
     */
    const COL_PICK_FORMAT = 'oe_hist.pick_format';

    /**
     * the column name for the invoice_format field
     */
    const COL_INVOICE_FORMAT = 'oe_hist.invoice_format';

    /**
     * the column name for the cash_amount field
     */
    const COL_CASH_AMOUNT = 'oe_hist.cash_amount';

    /**
     * the column name for the check_amount field
     */
    const COL_CHECK_AMOUNT = 'oe_hist.check_amount';

    /**
     * the column name for the check_number field
     */
    const COL_CHECK_NUMBER = 'oe_hist.check_number';

    /**
     * the column name for the deposit_amount field
     */
    const COL_DEPOSIT_AMOUNT = 'oe_hist.deposit_amount';

    /**
     * the column name for the deposit_number field
     */
    const COL_DEPOSIT_NUMBER = 'oe_hist.deposit_number';

    /**
     * the column name for the original_subtotal_tax field
     */
    const COL_ORIGINAL_SUBTOTAL_TAX = 'oe_hist.original_subtotal_tax';

    /**
     * the column name for the original_subtotal_nontax field
     */
    const COL_ORIGINAL_SUBTOTAL_NONTAX = 'oe_hist.original_subtotal_nontax';

    /**
     * the column name for the original_total_tax field
     */
    const COL_ORIGINAL_TOTAL_TAX = 'oe_hist.original_total_tax';

    /**
     * the column name for the original_total field
     */
    const COL_ORIGINAL_TOTAL = 'oe_hist.original_total';

    /**
     * the column name for the pick_printdate field
     */
    const COL_PICK_PRINTDATE = 'oe_hist.pick_printdate';

    /**
     * the column name for the pick_printtime field
     */
    const COL_PICK_PRINTTIME = 'oe_hist.pick_printtime';

    /**
     * the column name for the contact field
     */
    const COL_CONTACT = 'oe_hist.contact';

    /**
     * the column name for the phone_intl field
     */
    const COL_PHONE_INTL = 'oe_hist.phone_intl';

    /**
     * the column name for the phone_accesscode field
     */
    const COL_PHONE_ACCESSCODE = 'oe_hist.phone_accesscode';

    /**
     * the column name for the phone_countrycode field
     */
    const COL_PHONE_COUNTRYCODE = 'oe_hist.phone_countrycode';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'oe_hist.phone';

    /**
     * the column name for the phone_ext field
     */
    const COL_PHONE_EXT = 'oe_hist.phone_ext';

    /**
     * the column name for the fax_intl field
     */
    const COL_FAX_INTL = 'oe_hist.fax_intl';

    /**
     * the column name for the fax_accesscode field
     */
    const COL_FAX_ACCESSCODE = 'oe_hist.fax_accesscode';

    /**
     * the column name for the fax_countrycode field
     */
    const COL_FAX_COUNTRYCODE = 'oe_hist.fax_countrycode';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'oe_hist.fax';

    /**
     * the column name for the ship_account field
     */
    const COL_SHIP_ACCOUNT = 'oe_hist.ship_account';

    /**
     * the column name for the change_due field
     */
    const COL_CHANGE_DUE = 'oe_hist.change_due';

    /**
     * the column name for the discount_additional field
     */
    const COL_DISCOUNT_ADDITIONAL = 'oe_hist.discount_additional';

    /**
     * the column name for the all_ship field
     */
    const COL_ALL_SHIP = 'oe_hist.all_ship';

    /**
     * the column name for the credit_applied field
     */
    const COL_CREDIT_APPLIED = 'oe_hist.credit_applied';

    /**
     * the column name for the invoice_printdate field
     */
    const COL_INVOICE_PRINTDATE = 'oe_hist.invoice_printdate';

    /**
     * the column name for the invoice_printtime field
     */
    const COL_INVOICE_PRINTTIME = 'oe_hist.invoice_printtime';

    /**
     * the column name for the discount_freight field
     */
    const COL_DISCOUNT_FREIGHT = 'oe_hist.discount_freight';

    /**
     * the column name for the ship_completeoverride field
     */
    const COL_SHIP_COMPLETEOVERRIDE = 'oe_hist.ship_completeoverride';

    /**
     * the column name for the contact_email field
     */
    const COL_CONTACT_EMAIL = 'oe_hist.contact_email';

    /**
     * the column name for the manual_freight field
     */
    const COL_MANUAL_FREIGHT = 'oe_hist.manual_freight';

    /**
     * the column name for the internal_freight field
     */
    const COL_INTERNAL_FREIGHT = 'oe_hist.internal_freight';

    /**
     * the column name for the cost_freight field
     */
    const COL_COST_FREIGHT = 'oe_hist.cost_freight';

    /**
     * the column name for the route field
     */
    const COL_ROUTE = 'oe_hist.route';

    /**
     * the column name for the route_seq field
     */
    const COL_ROUTE_SEQ = 'oe_hist.route_seq';

    /**
     * the column name for the edi_855sent field
     */
    const COL_EDI_855SENT = 'oe_hist.edi_855sent';

    /**
     * the column name for the freight_3rdparty field
     */
    const COL_FREIGHT_3RDPARTY = 'oe_hist.freight_3rdparty';

    /**
     * the column name for the fob field
     */
    const COL_FOB = 'oe_hist.fob';

    /**
     * the column name for the confirm_image field
     */
    const COL_CONFIRM_IMAGE = 'oe_hist.confirm_image';

    /**
     * the column name for the cstk_consign field
     */
    const COL_CSTK_CONSIGN = 'oe_hist.cstk_consign';

    /**
     * the column name for the manufacturer field
     */
    const COL_MANUFACTURER = 'oe_hist.manufacturer';

    /**
     * the column name for the pick_queue field
     */
    const COL_PICK_QUEUE = 'oe_hist.pick_queue';

    /**
     * the column name for the arrive_date field
     */
    const COL_ARRIVE_DATE = 'oe_hist.arrive_date';

    /**
     * the column name for the surcharge_status field
     */
    const COL_SURCHARGE_STATUS = 'oe_hist.surcharge_status';

    /**
     * the column name for the freight_group field
     */
    const COL_FREIGHT_GROUP = 'oe_hist.freight_group';

    /**
     * the column name for the comm_override field
     */
    const COL_COMM_OVERRIDE = 'oe_hist.comm_override';

    /**
     * the column name for the charge_split field
     */
    const COL_CHARGE_SPLIT = 'oe_hist.charge_split';

    /**
     * the column name for the creditcart_approved field
     */
    const COL_CREDITCART_APPROVED = 'oe_hist.creditcart_approved';

    /**
     * the column name for the original_ordernumber field
     */
    const COL_ORIGINAL_ORDERNUMBER = 'oe_hist.original_ordernumber';

    /**
     * the column name for the has_notes field
     */
    const COL_HAS_NOTES = 'oe_hist.has_notes';

    /**
     * the column name for the has_documents field
     */
    const COL_HAS_DOCUMENTS = 'oe_hist.has_documents';

    /**
     * the column name for the has_tracking field
     */
    const COL_HAS_TRACKING = 'oe_hist.has_tracking';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'oe_hist.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'oe_hist.time';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'oe_hist.dummy';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Orderno', 'Status', 'Holdstatus', 'Custid', 'Shiptoid', 'ShiptoName', 'ShiptoAddress1', 'ShiptoAddress2', 'ShiptoAddress3', 'ShiptoAddress4', 'ShiptoCity', 'ShiptoState', 'ShiptoZip', 'Custpo', 'Orderdate', 'Termcode', 'Shipviacode', 'InvoiceNumber', 'InvoiceDate', 'GenledgerPeriod', 'Salesperson1', 'Salesperson1pct', 'Salesperson2', 'Salesperson2pct', 'Salesperson3', 'Salesperson3pct', 'ContractNbr', 'BatchNbr', 'Dropreleasehold', 'SubtotalTax', 'SubtotalNontax', 'TotalTax', 'TotalFreight', 'TotalMisc', 'TotalOrder', 'TotalCost', 'Lock', 'TakenDate', 'TakenTime', 'PickDate', 'PickTime', 'PackDate', 'PackTime', 'VerifyDate', 'VerifyTime', 'Creditmemo', 'Booked', 'OriginalWhse', 'BilltoState', 'Shipcomplete', 'CwoFlag', 'Division', 'TakenCode', 'PackCode', 'PickCode', 'VerifyCode', 'TotalDiscount', 'EdiRefererencenbr', 'UserCode1', 'UserCode2', 'UserCode3', 'UserCode4', 'ExchangeCountry', 'ExchangeRate', 'WeightTotal', 'WeightOverride', 'BoxCount', 'RequestDate', 'CancelDate', 'Lockedby', 'ReleaseNumber', 'Whse', 'BackorderDate', 'Deptcode', 'FreightInEntered', 'DropshipEntered', 'ErFlag', 'FreightIn', 'Dropship', 'Minorder', 'ContractTerms', 'DropshipBilled', 'OrderType', 'TrackingEdinumber', 'Source', 'PickFormat', 'InvoiceFormat', 'CashAmount', 'CheckAmount', 'CheckNumber', 'DepositAmount', 'DepositNumber', 'OriginalSubtotalTax', 'OriginalSubtotalNontax', 'OriginalTotalTax', 'OriginalTotal', 'PickPrintdate', 'PickPrinttime', 'Contact', 'PhoneIntl', 'PhoneAccesscode', 'PhoneCountrycode', 'Phone', 'PhoneExt', 'FaxIntl', 'FaxAccesscode', 'FaxCountrycode', 'Fax', 'ShipAccount', 'ChangeDue', 'DiscountAdditional', 'AllShip', 'CreditApplied', 'InvoicePrintdate', 'InvoicePrinttime', 'DiscountFreight', 'ShipCompleteoverride', 'ContactEmail', 'ManualFreight', 'InternalFreight', 'CostFreight', 'Route', 'RouteSeq', 'Edi855sent', 'Freight3rdparty', 'Fob', 'ConfirmImage', 'CstkConsign', 'Manufacturer', 'PickQueue', 'ArriveDate', 'SurchargeStatus', 'FreightGroup', 'CommOverride', 'ChargeSplit', 'CreditcartApproved', 'OriginalOrdernumber', 'HasNotes', 'HasDocuments', 'HasTracking', 'Date', 'Time', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('orderno', 'status', 'holdstatus', 'custid', 'shiptoid', 'shiptoName', 'shiptoAddress1', 'shiptoAddress2', 'shiptoAddress3', 'shiptoAddress4', 'shiptoCity', 'shiptoState', 'shiptoZip', 'custpo', 'orderdate', 'termcode', 'shipviacode', 'invoiceNumber', 'invoiceDate', 'genledgerPeriod', 'salesperson1', 'salesperson1pct', 'salesperson2', 'salesperson2pct', 'salesperson3', 'salesperson3pct', 'contractNbr', 'batchNbr', 'dropreleasehold', 'subtotalTax', 'subtotalNontax', 'totalTax', 'totalFreight', 'totalMisc', 'totalOrder', 'totalCost', 'lock', 'takenDate', 'takenTime', 'pickDate', 'pickTime', 'packDate', 'packTime', 'verifyDate', 'verifyTime', 'creditmemo', 'booked', 'originalWhse', 'billtoState', 'shipcomplete', 'cwoFlag', 'division', 'takenCode', 'packCode', 'pickCode', 'verifyCode', 'totalDiscount', 'ediRefererencenbr', 'userCode1', 'userCode2', 'userCode3', 'userCode4', 'exchangeCountry', 'exchangeRate', 'weightTotal', 'weightOverride', 'boxCount', 'requestDate', 'cancelDate', 'lockedby', 'releaseNumber', 'whse', 'backorderDate', 'deptcode', 'freightInEntered', 'dropshipEntered', 'erFlag', 'freightIn', 'dropship', 'minorder', 'contractTerms', 'dropshipBilled', 'orderType', 'trackingEdinumber', 'source', 'pickFormat', 'invoiceFormat', 'cashAmount', 'checkAmount', 'checkNumber', 'depositAmount', 'depositNumber', 'originalSubtotalTax', 'originalSubtotalNontax', 'originalTotalTax', 'originalTotal', 'pickPrintdate', 'pickPrinttime', 'contact', 'phoneIntl', 'phoneAccesscode', 'phoneCountrycode', 'phone', 'phoneExt', 'faxIntl', 'faxAccesscode', 'faxCountrycode', 'fax', 'shipAccount', 'changeDue', 'discountAdditional', 'allShip', 'creditApplied', 'invoicePrintdate', 'invoicePrinttime', 'discountFreight', 'shipCompleteoverride', 'contactEmail', 'manualFreight', 'internalFreight', 'costFreight', 'route', 'routeSeq', 'edi855sent', 'freight3rdparty', 'fob', 'confirmImage', 'cstkConsign', 'manufacturer', 'pickQueue', 'arriveDate', 'surchargeStatus', 'freightGroup', 'commOverride', 'chargeSplit', 'creditcartApproved', 'originalOrdernumber', 'hasNotes', 'hasDocuments', 'hasTracking', 'date', 'time', 'dummy', ),
        self::TYPE_COLNAME       => array(OeHistTableMap::COL_ORDERNO, OeHistTableMap::COL_STATUS, OeHistTableMap::COL_HOLDSTATUS, OeHistTableMap::COL_CUSTID, OeHistTableMap::COL_SHIPTOID, OeHistTableMap::COL_SHIPTO_NAME, OeHistTableMap::COL_SHIPTO_ADDRESS1, OeHistTableMap::COL_SHIPTO_ADDRESS2, OeHistTableMap::COL_SHIPTO_ADDRESS3, OeHistTableMap::COL_SHIPTO_ADDRESS4, OeHistTableMap::COL_SHIPTO_CITY, OeHistTableMap::COL_SHIPTO_STATE, OeHistTableMap::COL_SHIPTO_ZIP, OeHistTableMap::COL_CUSTPO, OeHistTableMap::COL_ORDERDATE, OeHistTableMap::COL_TERMCODE, OeHistTableMap::COL_SHIPVIACODE, OeHistTableMap::COL_INVOICE_NUMBER, OeHistTableMap::COL_INVOICE_DATE, OeHistTableMap::COL_GENLEDGER_PERIOD, OeHistTableMap::COL_SALESPERSON_1, OeHistTableMap::COL_SALESPERSON_1PCT, OeHistTableMap::COL_SALESPERSON_2, OeHistTableMap::COL_SALESPERSON_2PCT, OeHistTableMap::COL_SALESPERSON_3, OeHistTableMap::COL_SALESPERSON_3PCT, OeHistTableMap::COL_CONTRACT_NBR, OeHistTableMap::COL_BATCH_NBR, OeHistTableMap::COL_DROPRELEASEHOLD, OeHistTableMap::COL_SUBTOTAL_TAX, OeHistTableMap::COL_SUBTOTAL_NONTAX, OeHistTableMap::COL_TOTAL_TAX, OeHistTableMap::COL_TOTAL_FREIGHT, OeHistTableMap::COL_TOTAL_MISC, OeHistTableMap::COL_TOTAL_ORDER, OeHistTableMap::COL_TOTAL_COST, OeHistTableMap::COL_LOCK, OeHistTableMap::COL_TAKEN_DATE, OeHistTableMap::COL_TAKEN_TIME, OeHistTableMap::COL_PICK_DATE, OeHistTableMap::COL_PICK_TIME, OeHistTableMap::COL_PACK_DATE, OeHistTableMap::COL_PACK_TIME, OeHistTableMap::COL_VERIFY_DATE, OeHistTableMap::COL_VERIFY_TIME, OeHistTableMap::COL_CREDITMEMO, OeHistTableMap::COL_BOOKED, OeHistTableMap::COL_ORIGINAL_WHSE, OeHistTableMap::COL_BILLTO_STATE, OeHistTableMap::COL_SHIPCOMPLETE, OeHistTableMap::COL_CWO_FLAG, OeHistTableMap::COL_DIVISION, OeHistTableMap::COL_TAKEN_CODE, OeHistTableMap::COL_PACK_CODE, OeHistTableMap::COL_PICK_CODE, OeHistTableMap::COL_VERIFY_CODE, OeHistTableMap::COL_TOTAL_DISCOUNT, OeHistTableMap::COL_EDI_REFERERENCENBR, OeHistTableMap::COL_USER_CODE1, OeHistTableMap::COL_USER_CODE2, OeHistTableMap::COL_USER_CODE3, OeHistTableMap::COL_USER_CODE4, OeHistTableMap::COL_EXCHANGE_COUNTRY, OeHistTableMap::COL_EXCHANGE_RATE, OeHistTableMap::COL_WEIGHT_TOTAL, OeHistTableMap::COL_WEIGHT_OVERRIDE, OeHistTableMap::COL_BOX_COUNT, OeHistTableMap::COL_REQUEST_DATE, OeHistTableMap::COL_CANCEL_DATE, OeHistTableMap::COL_LOCKEDBY, OeHistTableMap::COL_RELEASE_NUMBER, OeHistTableMap::COL_WHSE, OeHistTableMap::COL_BACKORDER_DATE, OeHistTableMap::COL_DEPTCODE, OeHistTableMap::COL_FREIGHT_IN_ENTERED, OeHistTableMap::COL_DROPSHIP_ENTERED, OeHistTableMap::COL_ER_FLAG, OeHistTableMap::COL_FREIGHT_IN, OeHistTableMap::COL_DROPSHIP, OeHistTableMap::COL_MINORDER, OeHistTableMap::COL_CONTRACT_TERMS, OeHistTableMap::COL_DROPSHIP_BILLED, OeHistTableMap::COL_ORDER_TYPE, OeHistTableMap::COL_TRACKING_EDINUMBER, OeHistTableMap::COL_SOURCE, OeHistTableMap::COL_PICK_FORMAT, OeHistTableMap::COL_INVOICE_FORMAT, OeHistTableMap::COL_CASH_AMOUNT, OeHistTableMap::COL_CHECK_AMOUNT, OeHistTableMap::COL_CHECK_NUMBER, OeHistTableMap::COL_DEPOSIT_AMOUNT, OeHistTableMap::COL_DEPOSIT_NUMBER, OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX, OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX, OeHistTableMap::COL_ORIGINAL_TOTAL_TAX, OeHistTableMap::COL_ORIGINAL_TOTAL, OeHistTableMap::COL_PICK_PRINTDATE, OeHistTableMap::COL_PICK_PRINTTIME, OeHistTableMap::COL_CONTACT, OeHistTableMap::COL_PHONE_INTL, OeHistTableMap::COL_PHONE_ACCESSCODE, OeHistTableMap::COL_PHONE_COUNTRYCODE, OeHistTableMap::COL_PHONE, OeHistTableMap::COL_PHONE_EXT, OeHistTableMap::COL_FAX_INTL, OeHistTableMap::COL_FAX_ACCESSCODE, OeHistTableMap::COL_FAX_COUNTRYCODE, OeHistTableMap::COL_FAX, OeHistTableMap::COL_SHIP_ACCOUNT, OeHistTableMap::COL_CHANGE_DUE, OeHistTableMap::COL_DISCOUNT_ADDITIONAL, OeHistTableMap::COL_ALL_SHIP, OeHistTableMap::COL_CREDIT_APPLIED, OeHistTableMap::COL_INVOICE_PRINTDATE, OeHistTableMap::COL_INVOICE_PRINTTIME, OeHistTableMap::COL_DISCOUNT_FREIGHT, OeHistTableMap::COL_SHIP_COMPLETEOVERRIDE, OeHistTableMap::COL_CONTACT_EMAIL, OeHistTableMap::COL_MANUAL_FREIGHT, OeHistTableMap::COL_INTERNAL_FREIGHT, OeHistTableMap::COL_COST_FREIGHT, OeHistTableMap::COL_ROUTE, OeHistTableMap::COL_ROUTE_SEQ, OeHistTableMap::COL_EDI_855SENT, OeHistTableMap::COL_FREIGHT_3RDPARTY, OeHistTableMap::COL_FOB, OeHistTableMap::COL_CONFIRM_IMAGE, OeHistTableMap::COL_CSTK_CONSIGN, OeHistTableMap::COL_MANUFACTURER, OeHistTableMap::COL_PICK_QUEUE, OeHistTableMap::COL_ARRIVE_DATE, OeHistTableMap::COL_SURCHARGE_STATUS, OeHistTableMap::COL_FREIGHT_GROUP, OeHistTableMap::COL_COMM_OVERRIDE, OeHistTableMap::COL_CHARGE_SPLIT, OeHistTableMap::COL_CREDITCART_APPROVED, OeHistTableMap::COL_ORIGINAL_ORDERNUMBER, OeHistTableMap::COL_HAS_NOTES, OeHistTableMap::COL_HAS_DOCUMENTS, OeHistTableMap::COL_HAS_TRACKING, OeHistTableMap::COL_DATE, OeHistTableMap::COL_TIME, OeHistTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('orderno', 'status', 'holdstatus', 'custid', 'shiptoid', 'shipto_name', 'shipto_address1', 'shipto_address2', 'shipto_address3', 'shipto_address4', 'shipto_city', 'shipto_state', 'shipto_zip', 'custpo', 'orderdate', 'termcode', 'shipviacode', 'invoice_number', 'invoice_date', 'genledger_period', 'salesperson_1', 'salesperson_1pct', 'salesperson_2', 'salesperson_2pct', 'salesperson_3', 'salesperson_3pct', 'contract_nbr', 'batch_nbr', 'dropreleasehold', 'subtotal_tax', 'subtotal_nontax', 'total_tax', 'total_freight', 'total_misc', 'total_order', 'total_cost', 'lock', 'taken_date', 'taken_time', 'pick_date', 'pick_time', 'pack_date', 'pack_time', 'verify_date', 'verify_time', 'creditmemo', 'booked', 'original_whse', 'billto_state', 'shipcomplete', 'cwo_flag', 'division', 'taken_code', 'pack_code', 'pick_code', 'verify_code', 'total_discount', 'edi_refererencenbr', 'user_code1', 'user_code2', 'user_code3', 'user_code4', 'exchange_country', 'exchange_rate', 'weight_total', 'weight_override', 'box_count', 'request_date', 'cancel_date', 'lockedby', 'release_number', 'whse', 'backorder_date', 'deptcode', 'freight_in_entered', 'dropship_entered', 'er_flag', 'freight_in', 'dropship', 'minorder', 'contract_terms', 'dropship_billed', 'order_type', 'tracking_edinumber', 'source', 'pick_format', 'invoice_format', 'cash_amount', 'check_amount', 'check_number', 'deposit_amount', 'deposit_number', 'original_subtotal_tax', 'original_subtotal_nontax', 'original_total_tax', 'original_total', 'pick_printdate', 'pick_printtime', 'contact', 'phone_intl', 'phone_accesscode', 'phone_countrycode', 'phone', 'phone_ext', 'fax_intl', 'fax_accesscode', 'fax_countrycode', 'fax', 'ship_account', 'change_due', 'discount_additional', 'all_ship', 'credit_applied', 'invoice_printdate', 'invoice_printtime', 'discount_freight', 'ship_completeoverride', 'contact_email', 'manual_freight', 'internal_freight', 'cost_freight', 'route', 'route_seq', 'edi_855sent', 'freight_3rdparty', 'fob', 'confirm_image', 'cstk_consign', 'manufacturer', 'pick_queue', 'arrive_date', 'surcharge_status', 'freight_group', 'comm_override', 'charge_split', 'creditcart_approved', 'original_ordernumber', 'has_notes', 'has_documents', 'has_tracking', 'date', 'time', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Orderno' => 0, 'Status' => 1, 'Holdstatus' => 2, 'Custid' => 3, 'Shiptoid' => 4, 'ShiptoName' => 5, 'ShiptoAddress1' => 6, 'ShiptoAddress2' => 7, 'ShiptoAddress3' => 8, 'ShiptoAddress4' => 9, 'ShiptoCity' => 10, 'ShiptoState' => 11, 'ShiptoZip' => 12, 'Custpo' => 13, 'Orderdate' => 14, 'Termcode' => 15, 'Shipviacode' => 16, 'InvoiceNumber' => 17, 'InvoiceDate' => 18, 'GenledgerPeriod' => 19, 'Salesperson1' => 20, 'Salesperson1pct' => 21, 'Salesperson2' => 22, 'Salesperson2pct' => 23, 'Salesperson3' => 24, 'Salesperson3pct' => 25, 'ContractNbr' => 26, 'BatchNbr' => 27, 'Dropreleasehold' => 28, 'SubtotalTax' => 29, 'SubtotalNontax' => 30, 'TotalTax' => 31, 'TotalFreight' => 32, 'TotalMisc' => 33, 'TotalOrder' => 34, 'TotalCost' => 35, 'Lock' => 36, 'TakenDate' => 37, 'TakenTime' => 38, 'PickDate' => 39, 'PickTime' => 40, 'PackDate' => 41, 'PackTime' => 42, 'VerifyDate' => 43, 'VerifyTime' => 44, 'Creditmemo' => 45, 'Booked' => 46, 'OriginalWhse' => 47, 'BilltoState' => 48, 'Shipcomplete' => 49, 'CwoFlag' => 50, 'Division' => 51, 'TakenCode' => 52, 'PackCode' => 53, 'PickCode' => 54, 'VerifyCode' => 55, 'TotalDiscount' => 56, 'EdiRefererencenbr' => 57, 'UserCode1' => 58, 'UserCode2' => 59, 'UserCode3' => 60, 'UserCode4' => 61, 'ExchangeCountry' => 62, 'ExchangeRate' => 63, 'WeightTotal' => 64, 'WeightOverride' => 65, 'BoxCount' => 66, 'RequestDate' => 67, 'CancelDate' => 68, 'Lockedby' => 69, 'ReleaseNumber' => 70, 'Whse' => 71, 'BackorderDate' => 72, 'Deptcode' => 73, 'FreightInEntered' => 74, 'DropshipEntered' => 75, 'ErFlag' => 76, 'FreightIn' => 77, 'Dropship' => 78, 'Minorder' => 79, 'ContractTerms' => 80, 'DropshipBilled' => 81, 'OrderType' => 82, 'TrackingEdinumber' => 83, 'Source' => 84, 'PickFormat' => 85, 'InvoiceFormat' => 86, 'CashAmount' => 87, 'CheckAmount' => 88, 'CheckNumber' => 89, 'DepositAmount' => 90, 'DepositNumber' => 91, 'OriginalSubtotalTax' => 92, 'OriginalSubtotalNontax' => 93, 'OriginalTotalTax' => 94, 'OriginalTotal' => 95, 'PickPrintdate' => 96, 'PickPrinttime' => 97, 'Contact' => 98, 'PhoneIntl' => 99, 'PhoneAccesscode' => 100, 'PhoneCountrycode' => 101, 'Phone' => 102, 'PhoneExt' => 103, 'FaxIntl' => 104, 'FaxAccesscode' => 105, 'FaxCountrycode' => 106, 'Fax' => 107, 'ShipAccount' => 108, 'ChangeDue' => 109, 'DiscountAdditional' => 110, 'AllShip' => 111, 'CreditApplied' => 112, 'InvoicePrintdate' => 113, 'InvoicePrinttime' => 114, 'DiscountFreight' => 115, 'ShipCompleteoverride' => 116, 'ContactEmail' => 117, 'ManualFreight' => 118, 'InternalFreight' => 119, 'CostFreight' => 120, 'Route' => 121, 'RouteSeq' => 122, 'Edi855sent' => 123, 'Freight3rdparty' => 124, 'Fob' => 125, 'ConfirmImage' => 126, 'CstkConsign' => 127, 'Manufacturer' => 128, 'PickQueue' => 129, 'ArriveDate' => 130, 'SurchargeStatus' => 131, 'FreightGroup' => 132, 'CommOverride' => 133, 'ChargeSplit' => 134, 'CreditcartApproved' => 135, 'OriginalOrdernumber' => 136, 'HasNotes' => 137, 'HasDocuments' => 138, 'HasTracking' => 139, 'Date' => 140, 'Time' => 141, 'Dummy' => 142, ),
        self::TYPE_CAMELNAME     => array('orderno' => 0, 'status' => 1, 'holdstatus' => 2, 'custid' => 3, 'shiptoid' => 4, 'shiptoName' => 5, 'shiptoAddress1' => 6, 'shiptoAddress2' => 7, 'shiptoAddress3' => 8, 'shiptoAddress4' => 9, 'shiptoCity' => 10, 'shiptoState' => 11, 'shiptoZip' => 12, 'custpo' => 13, 'orderdate' => 14, 'termcode' => 15, 'shipviacode' => 16, 'invoiceNumber' => 17, 'invoiceDate' => 18, 'genledgerPeriod' => 19, 'salesperson1' => 20, 'salesperson1pct' => 21, 'salesperson2' => 22, 'salesperson2pct' => 23, 'salesperson3' => 24, 'salesperson3pct' => 25, 'contractNbr' => 26, 'batchNbr' => 27, 'dropreleasehold' => 28, 'subtotalTax' => 29, 'subtotalNontax' => 30, 'totalTax' => 31, 'totalFreight' => 32, 'totalMisc' => 33, 'totalOrder' => 34, 'totalCost' => 35, 'lock' => 36, 'takenDate' => 37, 'takenTime' => 38, 'pickDate' => 39, 'pickTime' => 40, 'packDate' => 41, 'packTime' => 42, 'verifyDate' => 43, 'verifyTime' => 44, 'creditmemo' => 45, 'booked' => 46, 'originalWhse' => 47, 'billtoState' => 48, 'shipcomplete' => 49, 'cwoFlag' => 50, 'division' => 51, 'takenCode' => 52, 'packCode' => 53, 'pickCode' => 54, 'verifyCode' => 55, 'totalDiscount' => 56, 'ediRefererencenbr' => 57, 'userCode1' => 58, 'userCode2' => 59, 'userCode3' => 60, 'userCode4' => 61, 'exchangeCountry' => 62, 'exchangeRate' => 63, 'weightTotal' => 64, 'weightOverride' => 65, 'boxCount' => 66, 'requestDate' => 67, 'cancelDate' => 68, 'lockedby' => 69, 'releaseNumber' => 70, 'whse' => 71, 'backorderDate' => 72, 'deptcode' => 73, 'freightInEntered' => 74, 'dropshipEntered' => 75, 'erFlag' => 76, 'freightIn' => 77, 'dropship' => 78, 'minorder' => 79, 'contractTerms' => 80, 'dropshipBilled' => 81, 'orderType' => 82, 'trackingEdinumber' => 83, 'source' => 84, 'pickFormat' => 85, 'invoiceFormat' => 86, 'cashAmount' => 87, 'checkAmount' => 88, 'checkNumber' => 89, 'depositAmount' => 90, 'depositNumber' => 91, 'originalSubtotalTax' => 92, 'originalSubtotalNontax' => 93, 'originalTotalTax' => 94, 'originalTotal' => 95, 'pickPrintdate' => 96, 'pickPrinttime' => 97, 'contact' => 98, 'phoneIntl' => 99, 'phoneAccesscode' => 100, 'phoneCountrycode' => 101, 'phone' => 102, 'phoneExt' => 103, 'faxIntl' => 104, 'faxAccesscode' => 105, 'faxCountrycode' => 106, 'fax' => 107, 'shipAccount' => 108, 'changeDue' => 109, 'discountAdditional' => 110, 'allShip' => 111, 'creditApplied' => 112, 'invoicePrintdate' => 113, 'invoicePrinttime' => 114, 'discountFreight' => 115, 'shipCompleteoverride' => 116, 'contactEmail' => 117, 'manualFreight' => 118, 'internalFreight' => 119, 'costFreight' => 120, 'route' => 121, 'routeSeq' => 122, 'edi855sent' => 123, 'freight3rdparty' => 124, 'fob' => 125, 'confirmImage' => 126, 'cstkConsign' => 127, 'manufacturer' => 128, 'pickQueue' => 129, 'arriveDate' => 130, 'surchargeStatus' => 131, 'freightGroup' => 132, 'commOverride' => 133, 'chargeSplit' => 134, 'creditcartApproved' => 135, 'originalOrdernumber' => 136, 'hasNotes' => 137, 'hasDocuments' => 138, 'hasTracking' => 139, 'date' => 140, 'time' => 141, 'dummy' => 142, ),
        self::TYPE_COLNAME       => array(OeHistTableMap::COL_ORDERNO => 0, OeHistTableMap::COL_STATUS => 1, OeHistTableMap::COL_HOLDSTATUS => 2, OeHistTableMap::COL_CUSTID => 3, OeHistTableMap::COL_SHIPTOID => 4, OeHistTableMap::COL_SHIPTO_NAME => 5, OeHistTableMap::COL_SHIPTO_ADDRESS1 => 6, OeHistTableMap::COL_SHIPTO_ADDRESS2 => 7, OeHistTableMap::COL_SHIPTO_ADDRESS3 => 8, OeHistTableMap::COL_SHIPTO_ADDRESS4 => 9, OeHistTableMap::COL_SHIPTO_CITY => 10, OeHistTableMap::COL_SHIPTO_STATE => 11, OeHistTableMap::COL_SHIPTO_ZIP => 12, OeHistTableMap::COL_CUSTPO => 13, OeHistTableMap::COL_ORDERDATE => 14, OeHistTableMap::COL_TERMCODE => 15, OeHistTableMap::COL_SHIPVIACODE => 16, OeHistTableMap::COL_INVOICE_NUMBER => 17, OeHistTableMap::COL_INVOICE_DATE => 18, OeHistTableMap::COL_GENLEDGER_PERIOD => 19, OeHistTableMap::COL_SALESPERSON_1 => 20, OeHistTableMap::COL_SALESPERSON_1PCT => 21, OeHistTableMap::COL_SALESPERSON_2 => 22, OeHistTableMap::COL_SALESPERSON_2PCT => 23, OeHistTableMap::COL_SALESPERSON_3 => 24, OeHistTableMap::COL_SALESPERSON_3PCT => 25, OeHistTableMap::COL_CONTRACT_NBR => 26, OeHistTableMap::COL_BATCH_NBR => 27, OeHistTableMap::COL_DROPRELEASEHOLD => 28, OeHistTableMap::COL_SUBTOTAL_TAX => 29, OeHistTableMap::COL_SUBTOTAL_NONTAX => 30, OeHistTableMap::COL_TOTAL_TAX => 31, OeHistTableMap::COL_TOTAL_FREIGHT => 32, OeHistTableMap::COL_TOTAL_MISC => 33, OeHistTableMap::COL_TOTAL_ORDER => 34, OeHistTableMap::COL_TOTAL_COST => 35, OeHistTableMap::COL_LOCK => 36, OeHistTableMap::COL_TAKEN_DATE => 37, OeHistTableMap::COL_TAKEN_TIME => 38, OeHistTableMap::COL_PICK_DATE => 39, OeHistTableMap::COL_PICK_TIME => 40, OeHistTableMap::COL_PACK_DATE => 41, OeHistTableMap::COL_PACK_TIME => 42, OeHistTableMap::COL_VERIFY_DATE => 43, OeHistTableMap::COL_VERIFY_TIME => 44, OeHistTableMap::COL_CREDITMEMO => 45, OeHistTableMap::COL_BOOKED => 46, OeHistTableMap::COL_ORIGINAL_WHSE => 47, OeHistTableMap::COL_BILLTO_STATE => 48, OeHistTableMap::COL_SHIPCOMPLETE => 49, OeHistTableMap::COL_CWO_FLAG => 50, OeHistTableMap::COL_DIVISION => 51, OeHistTableMap::COL_TAKEN_CODE => 52, OeHistTableMap::COL_PACK_CODE => 53, OeHistTableMap::COL_PICK_CODE => 54, OeHistTableMap::COL_VERIFY_CODE => 55, OeHistTableMap::COL_TOTAL_DISCOUNT => 56, OeHistTableMap::COL_EDI_REFERERENCENBR => 57, OeHistTableMap::COL_USER_CODE1 => 58, OeHistTableMap::COL_USER_CODE2 => 59, OeHistTableMap::COL_USER_CODE3 => 60, OeHistTableMap::COL_USER_CODE4 => 61, OeHistTableMap::COL_EXCHANGE_COUNTRY => 62, OeHistTableMap::COL_EXCHANGE_RATE => 63, OeHistTableMap::COL_WEIGHT_TOTAL => 64, OeHistTableMap::COL_WEIGHT_OVERRIDE => 65, OeHistTableMap::COL_BOX_COUNT => 66, OeHistTableMap::COL_REQUEST_DATE => 67, OeHistTableMap::COL_CANCEL_DATE => 68, OeHistTableMap::COL_LOCKEDBY => 69, OeHistTableMap::COL_RELEASE_NUMBER => 70, OeHistTableMap::COL_WHSE => 71, OeHistTableMap::COL_BACKORDER_DATE => 72, OeHistTableMap::COL_DEPTCODE => 73, OeHistTableMap::COL_FREIGHT_IN_ENTERED => 74, OeHistTableMap::COL_DROPSHIP_ENTERED => 75, OeHistTableMap::COL_ER_FLAG => 76, OeHistTableMap::COL_FREIGHT_IN => 77, OeHistTableMap::COL_DROPSHIP => 78, OeHistTableMap::COL_MINORDER => 79, OeHistTableMap::COL_CONTRACT_TERMS => 80, OeHistTableMap::COL_DROPSHIP_BILLED => 81, OeHistTableMap::COL_ORDER_TYPE => 82, OeHistTableMap::COL_TRACKING_EDINUMBER => 83, OeHistTableMap::COL_SOURCE => 84, OeHistTableMap::COL_PICK_FORMAT => 85, OeHistTableMap::COL_INVOICE_FORMAT => 86, OeHistTableMap::COL_CASH_AMOUNT => 87, OeHistTableMap::COL_CHECK_AMOUNT => 88, OeHistTableMap::COL_CHECK_NUMBER => 89, OeHistTableMap::COL_DEPOSIT_AMOUNT => 90, OeHistTableMap::COL_DEPOSIT_NUMBER => 91, OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX => 92, OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX => 93, OeHistTableMap::COL_ORIGINAL_TOTAL_TAX => 94, OeHistTableMap::COL_ORIGINAL_TOTAL => 95, OeHistTableMap::COL_PICK_PRINTDATE => 96, OeHistTableMap::COL_PICK_PRINTTIME => 97, OeHistTableMap::COL_CONTACT => 98, OeHistTableMap::COL_PHONE_INTL => 99, OeHistTableMap::COL_PHONE_ACCESSCODE => 100, OeHistTableMap::COL_PHONE_COUNTRYCODE => 101, OeHistTableMap::COL_PHONE => 102, OeHistTableMap::COL_PHONE_EXT => 103, OeHistTableMap::COL_FAX_INTL => 104, OeHistTableMap::COL_FAX_ACCESSCODE => 105, OeHistTableMap::COL_FAX_COUNTRYCODE => 106, OeHistTableMap::COL_FAX => 107, OeHistTableMap::COL_SHIP_ACCOUNT => 108, OeHistTableMap::COL_CHANGE_DUE => 109, OeHistTableMap::COL_DISCOUNT_ADDITIONAL => 110, OeHistTableMap::COL_ALL_SHIP => 111, OeHistTableMap::COL_CREDIT_APPLIED => 112, OeHistTableMap::COL_INVOICE_PRINTDATE => 113, OeHistTableMap::COL_INVOICE_PRINTTIME => 114, OeHistTableMap::COL_DISCOUNT_FREIGHT => 115, OeHistTableMap::COL_SHIP_COMPLETEOVERRIDE => 116, OeHistTableMap::COL_CONTACT_EMAIL => 117, OeHistTableMap::COL_MANUAL_FREIGHT => 118, OeHistTableMap::COL_INTERNAL_FREIGHT => 119, OeHistTableMap::COL_COST_FREIGHT => 120, OeHistTableMap::COL_ROUTE => 121, OeHistTableMap::COL_ROUTE_SEQ => 122, OeHistTableMap::COL_EDI_855SENT => 123, OeHistTableMap::COL_FREIGHT_3RDPARTY => 124, OeHistTableMap::COL_FOB => 125, OeHistTableMap::COL_CONFIRM_IMAGE => 126, OeHistTableMap::COL_CSTK_CONSIGN => 127, OeHistTableMap::COL_MANUFACTURER => 128, OeHistTableMap::COL_PICK_QUEUE => 129, OeHistTableMap::COL_ARRIVE_DATE => 130, OeHistTableMap::COL_SURCHARGE_STATUS => 131, OeHistTableMap::COL_FREIGHT_GROUP => 132, OeHistTableMap::COL_COMM_OVERRIDE => 133, OeHistTableMap::COL_CHARGE_SPLIT => 134, OeHistTableMap::COL_CREDITCART_APPROVED => 135, OeHistTableMap::COL_ORIGINAL_ORDERNUMBER => 136, OeHistTableMap::COL_HAS_NOTES => 137, OeHistTableMap::COL_HAS_DOCUMENTS => 138, OeHistTableMap::COL_HAS_TRACKING => 139, OeHistTableMap::COL_DATE => 140, OeHistTableMap::COL_TIME => 141, OeHistTableMap::COL_DUMMY => 142, ),
        self::TYPE_FIELDNAME     => array('orderno' => 0, 'status' => 1, 'holdstatus' => 2, 'custid' => 3, 'shiptoid' => 4, 'shipto_name' => 5, 'shipto_address1' => 6, 'shipto_address2' => 7, 'shipto_address3' => 8, 'shipto_address4' => 9, 'shipto_city' => 10, 'shipto_state' => 11, 'shipto_zip' => 12, 'custpo' => 13, 'orderdate' => 14, 'termcode' => 15, 'shipviacode' => 16, 'invoice_number' => 17, 'invoice_date' => 18, 'genledger_period' => 19, 'salesperson_1' => 20, 'salesperson_1pct' => 21, 'salesperson_2' => 22, 'salesperson_2pct' => 23, 'salesperson_3' => 24, 'salesperson_3pct' => 25, 'contract_nbr' => 26, 'batch_nbr' => 27, 'dropreleasehold' => 28, 'subtotal_tax' => 29, 'subtotal_nontax' => 30, 'total_tax' => 31, 'total_freight' => 32, 'total_misc' => 33, 'total_order' => 34, 'total_cost' => 35, 'lock' => 36, 'taken_date' => 37, 'taken_time' => 38, 'pick_date' => 39, 'pick_time' => 40, 'pack_date' => 41, 'pack_time' => 42, 'verify_date' => 43, 'verify_time' => 44, 'creditmemo' => 45, 'booked' => 46, 'original_whse' => 47, 'billto_state' => 48, 'shipcomplete' => 49, 'cwo_flag' => 50, 'division' => 51, 'taken_code' => 52, 'pack_code' => 53, 'pick_code' => 54, 'verify_code' => 55, 'total_discount' => 56, 'edi_refererencenbr' => 57, 'user_code1' => 58, 'user_code2' => 59, 'user_code3' => 60, 'user_code4' => 61, 'exchange_country' => 62, 'exchange_rate' => 63, 'weight_total' => 64, 'weight_override' => 65, 'box_count' => 66, 'request_date' => 67, 'cancel_date' => 68, 'lockedby' => 69, 'release_number' => 70, 'whse' => 71, 'backorder_date' => 72, 'deptcode' => 73, 'freight_in_entered' => 74, 'dropship_entered' => 75, 'er_flag' => 76, 'freight_in' => 77, 'dropship' => 78, 'minorder' => 79, 'contract_terms' => 80, 'dropship_billed' => 81, 'order_type' => 82, 'tracking_edinumber' => 83, 'source' => 84, 'pick_format' => 85, 'invoice_format' => 86, 'cash_amount' => 87, 'check_amount' => 88, 'check_number' => 89, 'deposit_amount' => 90, 'deposit_number' => 91, 'original_subtotal_tax' => 92, 'original_subtotal_nontax' => 93, 'original_total_tax' => 94, 'original_total' => 95, 'pick_printdate' => 96, 'pick_printtime' => 97, 'contact' => 98, 'phone_intl' => 99, 'phone_accesscode' => 100, 'phone_countrycode' => 101, 'phone' => 102, 'phone_ext' => 103, 'fax_intl' => 104, 'fax_accesscode' => 105, 'fax_countrycode' => 106, 'fax' => 107, 'ship_account' => 108, 'change_due' => 109, 'discount_additional' => 110, 'all_ship' => 111, 'credit_applied' => 112, 'invoice_printdate' => 113, 'invoice_printtime' => 114, 'discount_freight' => 115, 'ship_completeoverride' => 116, 'contact_email' => 117, 'manual_freight' => 118, 'internal_freight' => 119, 'cost_freight' => 120, 'route' => 121, 'route_seq' => 122, 'edi_855sent' => 123, 'freight_3rdparty' => 124, 'fob' => 125, 'confirm_image' => 126, 'cstk_consign' => 127, 'manufacturer' => 128, 'pick_queue' => 129, 'arrive_date' => 130, 'surcharge_status' => 131, 'freight_group' => 132, 'comm_override' => 133, 'charge_split' => 134, 'creditcart_approved' => 135, 'original_ordernumber' => 136, 'has_notes' => 137, 'has_documents' => 138, 'has_tracking' => 139, 'date' => 140, 'time' => 141, 'dummy' => 142, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('oe_hist');
        $this->setPhpName('OeHist');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OeHist');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('orderno', 'Orderno', 'INTEGER', true, 12, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 1, null);
        $this->addColumn('holdstatus', 'Holdstatus', 'VARCHAR', true, 1, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', true, 6, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', true, 6, null);
        $this->addColumn('shipto_name', 'ShiptoName', 'VARCHAR', true, 30, null);
        $this->addColumn('shipto_address1', 'ShiptoAddress1', 'VARCHAR', true, 30, null);
        $this->addColumn('shipto_address2', 'ShiptoAddress2', 'VARCHAR', true, 30, null);
        $this->addColumn('shipto_address3', 'ShiptoAddress3', 'VARCHAR', true, 30, null);
        $this->addColumn('shipto_address4', 'ShiptoAddress4', 'VARCHAR', true, 30, null);
        $this->addColumn('shipto_city', 'ShiptoCity', 'VARCHAR', true, 30, null);
        $this->addColumn('shipto_state', 'ShiptoState', 'VARCHAR', true, 4, null);
        $this->addColumn('shipto_zip', 'ShiptoZip', 'VARCHAR', true, 10, null);
        $this->addColumn('custpo', 'Custpo', 'VARCHAR', true, 20, null);
        $this->addColumn('orderdate', 'Orderdate', 'INTEGER', true, 8, null);
        $this->addColumn('termcode', 'Termcode', 'VARCHAR', true, 4, null);
        $this->addColumn('shipviacode', 'Shipviacode', 'VARCHAR', true, 4, null);
        $this->addColumn('invoice_number', 'InvoiceNumber', 'INTEGER', true, 12, null);
        $this->addColumn('invoice_date', 'InvoiceDate', 'INTEGER', true, 8, null);
        $this->addColumn('genledger_period', 'GenledgerPeriod', 'INTEGER', true, 2, null);
        $this->addColumn('salesperson_1', 'Salesperson1', 'VARCHAR', true, 6, null);
        $this->addColumn('salesperson_1pct', 'Salesperson1pct', 'DECIMAL', true, 6, null);
        $this->addColumn('salesperson_2', 'Salesperson2', 'VARCHAR', true, 6, null);
        $this->addColumn('salesperson_2pct', 'Salesperson2pct', 'DECIMAL', true, 6, null);
        $this->addColumn('salesperson_3', 'Salesperson3', 'VARCHAR', true, 6, null);
        $this->addColumn('salesperson_3pct', 'Salesperson3pct', 'DECIMAL', true, 6, null);
        $this->addColumn('contract_nbr', 'ContractNbr', 'INTEGER', true, 8, null);
        $this->addColumn('batch_nbr', 'BatchNbr', 'INTEGER', true, 8, null);
        $this->addColumn('dropreleasehold', 'Dropreleasehold', 'VARCHAR', true, 1, null);
        $this->addColumn('subtotal_tax', 'SubtotalTax', 'DECIMAL', true, 12, null);
        $this->addColumn('subtotal_nontax', 'SubtotalNontax', 'DECIMAL', true, 12, null);
        $this->addColumn('total_tax', 'TotalTax', 'DECIMAL', true, 12, null);
        $this->addColumn('total_freight', 'TotalFreight', 'DECIMAL', true, 12, null);
        $this->addColumn('total_misc', 'TotalMisc', 'DECIMAL', true, 12, null);
        $this->addColumn('total_order', 'TotalOrder', 'DECIMAL', true, 12, null);
        $this->addColumn('total_cost', 'TotalCost', 'DECIMAL', true, 12, null);
        $this->addColumn('lock', 'Lock', 'VARCHAR', true, 1, null);
        $this->addColumn('taken_date', 'TakenDate', 'INTEGER', true, 8, null);
        $this->addColumn('taken_time', 'TakenTime', 'INTEGER', true, 4, null);
        $this->addColumn('pick_date', 'PickDate', 'INTEGER', true, 8, null);
        $this->addColumn('pick_time', 'PickTime', 'INTEGER', true, 4, null);
        $this->addColumn('pack_date', 'PackDate', 'INTEGER', true, 8, null);
        $this->addColumn('pack_time', 'PackTime', 'INTEGER', true, 4, null);
        $this->addColumn('verify_date', 'VerifyDate', 'INTEGER', true, 8, null);
        $this->addColumn('verify_time', 'VerifyTime', 'INTEGER', true, 4, null);
        $this->addColumn('creditmemo', 'Creditmemo', 'VARCHAR', true, 1, null);
        $this->addColumn('booked', 'Booked', 'VARCHAR', true, 1, null);
        $this->addColumn('original_whse', 'OriginalWhse', 'VARCHAR', true, 2, null);
        $this->addColumn('billto_state', 'BilltoState', 'VARCHAR', true, 2, null);
        $this->addColumn('shipcomplete', 'Shipcomplete', 'VARCHAR', true, 1, null);
        $this->addColumn('cwo_flag', 'CwoFlag', 'VARCHAR', true, 45, null);
        $this->addColumn('division', 'Division', 'VARCHAR', true, 8, null);
        $this->addColumn('taken_code', 'TakenCode', 'VARCHAR', true, 8, null);
        $this->addColumn('pack_code', 'PackCode', 'VARCHAR', true, 8, null);
        $this->addColumn('pick_code', 'PickCode', 'VARCHAR', true, 8, null);
        $this->addColumn('verify_code', 'VerifyCode', 'VARCHAR', true, 8, null);
        $this->addColumn('total_discount', 'TotalDiscount', 'DECIMAL', true, 12, null);
        $this->addColumn('edi_refererencenbr', 'EdiRefererencenbr', 'VARCHAR', true, 3, null);
        $this->addColumn('user_code1', 'UserCode1', 'VARCHAR', true, 8, null);
        $this->addColumn('user_code2', 'UserCode2', 'VARCHAR', true, 8, null);
        $this->addColumn('user_code3', 'UserCode3', 'VARCHAR', true, 8, null);
        $this->addColumn('user_code4', 'UserCode4', 'VARCHAR', true, 8, null);
        $this->addColumn('exchange_country', 'ExchangeCountry', 'VARCHAR', true, 4, null);
        $this->addColumn('exchange_rate', 'ExchangeRate', 'DECIMAL', true, 12, null);
        $this->addColumn('weight_total', 'WeightTotal', 'DECIMAL', true, 12, null);
        $this->addColumn('weight_override', 'WeightOverride', 'VARCHAR', true, 1, null);
        $this->addColumn('box_count', 'BoxCount', 'INTEGER', true, 5, null);
        $this->addColumn('request_date', 'RequestDate', 'INTEGER', true, 8, null);
        $this->addColumn('cancel_date', 'CancelDate', 'INTEGER', true, 8, null);
        $this->addColumn('lockedby', 'Lockedby', 'VARCHAR', true, 12, null);
        $this->addColumn('release_number', 'ReleaseNumber', 'VARCHAR', true, 20, null);
        $this->addColumn('whse', 'Whse', 'VARCHAR', true, 2, null);
        $this->addColumn('backorder_date', 'BackorderDate', 'INTEGER', true, 8, null);
        $this->addColumn('deptcode', 'Deptcode', 'VARCHAR', true, 8, null);
        $this->addColumn('freight_in_entered', 'FreightInEntered', 'VARCHAR', true, 1, null);
        $this->addColumn('dropship_entered', 'DropshipEntered', 'VARCHAR', true, 1, null);
        $this->addColumn('er_flag', 'ErFlag', 'VARCHAR', true, 1, null);
        $this->addColumn('freight_in', 'FreightIn', 'DECIMAL', true, 12, null);
        $this->addColumn('dropship', 'Dropship', 'DECIMAL', true, 12, null);
        $this->addColumn('minorder', 'Minorder', 'DECIMAL', true, 12, null);
        $this->addColumn('contract_terms', 'ContractTerms', 'VARCHAR', true, 1, null);
        $this->addColumn('dropship_billed', 'DropshipBilled', 'VARCHAR', true, 1, null);
        $this->addColumn('order_type', 'OrderType', 'VARCHAR', true, 1, null);
        $this->addColumn('tracking_edinumber', 'TrackingEdinumber', 'VARCHAR', true, 15, null);
        $this->addColumn('source', 'Source', 'VARCHAR', true, 1, null);
        $this->addColumn('pick_format', 'PickFormat', 'VARCHAR', true, 1, null);
        $this->addColumn('invoice_format', 'InvoiceFormat', 'VARCHAR', true, 1, null);
        $this->addColumn('cash_amount', 'CashAmount', 'DECIMAL', true, 12, null);
        $this->addColumn('check_amount', 'CheckAmount', 'DECIMAL', true, 12, null);
        $this->addColumn('check_number', 'CheckNumber', 'VARCHAR', true, 8, null);
        $this->addColumn('deposit_amount', 'DepositAmount', 'DECIMAL', true, 12, null);
        $this->addColumn('deposit_number', 'DepositNumber', 'VARCHAR', true, 8, null);
        $this->addColumn('original_subtotal_tax', 'OriginalSubtotalTax', 'DECIMAL', true, 12, null);
        $this->addColumn('original_subtotal_nontax', 'OriginalSubtotalNontax', 'DECIMAL', true, 12, null);
        $this->addColumn('original_total_tax', 'OriginalTotalTax', 'DECIMAL', true, 12, null);
        $this->addColumn('original_total', 'OriginalTotal', 'DECIMAL', true, 12, null);
        $this->addColumn('pick_printdate', 'PickPrintdate', 'INTEGER', true, 8, null);
        $this->addColumn('pick_printtime', 'PickPrinttime', 'INTEGER', true, 4, null);
        $this->addColumn('contact', 'Contact', 'VARCHAR', true, 20, null);
        $this->addColumn('phone_intl', 'PhoneIntl', 'VARCHAR', true, 1, null);
        $this->addColumn('phone_accesscode', 'PhoneAccesscode', 'VARCHAR', true, 3, null);
        $this->addColumn('phone_countrycode', 'PhoneCountrycode', 'VARCHAR', true, 4, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 15, null);
        $this->addColumn('phone_ext', 'PhoneExt', 'VARCHAR', true, 7, null);
        $this->addColumn('fax_intl', 'FaxIntl', 'VARCHAR', true, 1, null);
        $this->addColumn('fax_accesscode', 'FaxAccesscode', 'VARCHAR', true, 3, null);
        $this->addColumn('fax_countrycode', 'FaxCountrycode', 'VARCHAR', true, 4, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', true, 15, null);
        $this->addColumn('ship_account', 'ShipAccount', 'VARCHAR', true, 10, null);
        $this->addColumn('change_due', 'ChangeDue', 'DECIMAL', true, 12, null);
        $this->addColumn('discount_additional', 'DiscountAdditional', 'DECIMAL', true, 12, null);
        $this->addColumn('all_ship', 'AllShip', 'VARCHAR', true, 2, null);
        $this->addColumn('credit_applied', 'CreditApplied', 'DECIMAL', true, 12, null);
        $this->addColumn('invoice_printdate', 'InvoicePrintdate', 'INTEGER', true, 8, null);
        $this->addColumn('invoice_printtime', 'InvoicePrinttime', 'INTEGER', true, 4, null);
        $this->addColumn('discount_freight', 'DiscountFreight', 'DECIMAL', true, 12, null);
        $this->addColumn('ship_completeoverride', 'ShipCompleteoverride', 'VARCHAR', true, 1, null);
        $this->addColumn('contact_email', 'ContactEmail', 'VARCHAR', true, 50, null);
        $this->addColumn('manual_freight', 'ManualFreight', 'VARCHAR', true, 1, null);
        $this->addColumn('internal_freight', 'InternalFreight', 'VARCHAR', true, 1, null);
        $this->addColumn('cost_freight', 'CostFreight', 'DECIMAL', true, 12, null);
        $this->addColumn('route', 'Route', 'VARCHAR', true, 4, null);
        $this->addColumn('route_seq', 'RouteSeq', 'INTEGER', true, 4, null);
        $this->addColumn('edi_855sent', 'Edi855sent', 'VARCHAR', true, 1, null);
        $this->addColumn('freight_3rdparty', 'Freight3rdparty', 'DECIMAL', true, 12, null);
        $this->addColumn('fob', 'Fob', 'VARCHAR', true, 15, null);
        $this->addColumn('confirm_image', 'ConfirmImage', 'VARCHAR', true, 1, null);
        $this->addColumn('cstk_consign', 'CstkConsign', 'VARCHAR', true, 1, null);
        $this->addColumn('manufacturer', 'Manufacturer', 'VARCHAR', true, 6, null);
        $this->addColumn('pick_queue', 'PickQueue', 'VARCHAR', true, 1, null);
        $this->addColumn('arrive_date', 'ArriveDate', 'INTEGER', true, 8, null);
        $this->addColumn('surcharge_status', 'SurchargeStatus', 'VARCHAR', true, 1, null);
        $this->addColumn('freight_group', 'FreightGroup', 'VARCHAR', true, 2, null);
        $this->addColumn('comm_override', 'CommOverride', 'VARCHAR', true, 1, null);
        $this->addColumn('charge_split', 'ChargeSplit', 'VARCHAR', true, 1, null);
        $this->addColumn('creditcart_approved', 'CreditcartApproved', 'VARCHAR', true, 1, null);
        $this->addColumn('original_ordernumber', 'OriginalOrdernumber', 'VARCHAR', true, 12, null);
        $this->addColumn('has_notes', 'HasNotes', 'VARCHAR', true, 1, null);
        $this->addColumn('has_documents', 'HasDocuments', 'VARCHAR', true, 1, null);
        $this->addColumn('has_tracking', 'HasTracking', 'VARCHAR', true, 1, null);
        $this->addColumn('date', 'Date', 'INTEGER', true, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', true, 8, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', true, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? OeHistTableMap::CLASS_DEFAULT : OeHistTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (OeHist object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OeHistTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OeHistTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OeHistTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OeHistTableMap::OM_CLASS;
            /** @var OeHist $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OeHistTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = OeHistTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OeHistTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OeHist $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OeHistTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(OeHistTableMap::COL_ORDERNO);
            $criteria->addSelectColumn(OeHistTableMap::COL_STATUS);
            $criteria->addSelectColumn(OeHistTableMap::COL_HOLDSTATUS);
            $criteria->addSelectColumn(OeHistTableMap::COL_CUSTID);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTO_NAME);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTO_ADDRESS1);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTO_ADDRESS2);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTO_ADDRESS3);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTO_ADDRESS4);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTO_CITY);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTO_STATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPTO_ZIP);
            $criteria->addSelectColumn(OeHistTableMap::COL_CUSTPO);
            $criteria->addSelectColumn(OeHistTableMap::COL_ORDERDATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_TERMCODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPVIACODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_INVOICE_NUMBER);
            $criteria->addSelectColumn(OeHistTableMap::COL_INVOICE_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_GENLEDGER_PERIOD);
            $criteria->addSelectColumn(OeHistTableMap::COL_SALESPERSON_1);
            $criteria->addSelectColumn(OeHistTableMap::COL_SALESPERSON_1PCT);
            $criteria->addSelectColumn(OeHistTableMap::COL_SALESPERSON_2);
            $criteria->addSelectColumn(OeHistTableMap::COL_SALESPERSON_2PCT);
            $criteria->addSelectColumn(OeHistTableMap::COL_SALESPERSON_3);
            $criteria->addSelectColumn(OeHistTableMap::COL_SALESPERSON_3PCT);
            $criteria->addSelectColumn(OeHistTableMap::COL_CONTRACT_NBR);
            $criteria->addSelectColumn(OeHistTableMap::COL_BATCH_NBR);
            $criteria->addSelectColumn(OeHistTableMap::COL_DROPRELEASEHOLD);
            $criteria->addSelectColumn(OeHistTableMap::COL_SUBTOTAL_TAX);
            $criteria->addSelectColumn(OeHistTableMap::COL_SUBTOTAL_NONTAX);
            $criteria->addSelectColumn(OeHistTableMap::COL_TOTAL_TAX);
            $criteria->addSelectColumn(OeHistTableMap::COL_TOTAL_FREIGHT);
            $criteria->addSelectColumn(OeHistTableMap::COL_TOTAL_MISC);
            $criteria->addSelectColumn(OeHistTableMap::COL_TOTAL_ORDER);
            $criteria->addSelectColumn(OeHistTableMap::COL_TOTAL_COST);
            $criteria->addSelectColumn(OeHistTableMap::COL_LOCK);
            $criteria->addSelectColumn(OeHistTableMap::COL_TAKEN_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_TAKEN_TIME);
            $criteria->addSelectColumn(OeHistTableMap::COL_PICK_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PICK_TIME);
            $criteria->addSelectColumn(OeHistTableMap::COL_PACK_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PACK_TIME);
            $criteria->addSelectColumn(OeHistTableMap::COL_VERIFY_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_VERIFY_TIME);
            $criteria->addSelectColumn(OeHistTableMap::COL_CREDITMEMO);
            $criteria->addSelectColumn(OeHistTableMap::COL_BOOKED);
            $criteria->addSelectColumn(OeHistTableMap::COL_ORIGINAL_WHSE);
            $criteria->addSelectColumn(OeHistTableMap::COL_BILLTO_STATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIPCOMPLETE);
            $criteria->addSelectColumn(OeHistTableMap::COL_CWO_FLAG);
            $criteria->addSelectColumn(OeHistTableMap::COL_DIVISION);
            $criteria->addSelectColumn(OeHistTableMap::COL_TAKEN_CODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PACK_CODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PICK_CODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_VERIFY_CODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_TOTAL_DISCOUNT);
            $criteria->addSelectColumn(OeHistTableMap::COL_EDI_REFERERENCENBR);
            $criteria->addSelectColumn(OeHistTableMap::COL_USER_CODE1);
            $criteria->addSelectColumn(OeHistTableMap::COL_USER_CODE2);
            $criteria->addSelectColumn(OeHistTableMap::COL_USER_CODE3);
            $criteria->addSelectColumn(OeHistTableMap::COL_USER_CODE4);
            $criteria->addSelectColumn(OeHistTableMap::COL_EXCHANGE_COUNTRY);
            $criteria->addSelectColumn(OeHistTableMap::COL_EXCHANGE_RATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_WEIGHT_TOTAL);
            $criteria->addSelectColumn(OeHistTableMap::COL_WEIGHT_OVERRIDE);
            $criteria->addSelectColumn(OeHistTableMap::COL_BOX_COUNT);
            $criteria->addSelectColumn(OeHistTableMap::COL_REQUEST_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_LOCKEDBY);
            $criteria->addSelectColumn(OeHistTableMap::COL_RELEASE_NUMBER);
            $criteria->addSelectColumn(OeHistTableMap::COL_WHSE);
            $criteria->addSelectColumn(OeHistTableMap::COL_BACKORDER_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_DEPTCODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_FREIGHT_IN_ENTERED);
            $criteria->addSelectColumn(OeHistTableMap::COL_DROPSHIP_ENTERED);
            $criteria->addSelectColumn(OeHistTableMap::COL_ER_FLAG);
            $criteria->addSelectColumn(OeHistTableMap::COL_FREIGHT_IN);
            $criteria->addSelectColumn(OeHistTableMap::COL_DROPSHIP);
            $criteria->addSelectColumn(OeHistTableMap::COL_MINORDER);
            $criteria->addSelectColumn(OeHistTableMap::COL_CONTRACT_TERMS);
            $criteria->addSelectColumn(OeHistTableMap::COL_DROPSHIP_BILLED);
            $criteria->addSelectColumn(OeHistTableMap::COL_ORDER_TYPE);
            $criteria->addSelectColumn(OeHistTableMap::COL_TRACKING_EDINUMBER);
            $criteria->addSelectColumn(OeHistTableMap::COL_SOURCE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PICK_FORMAT);
            $criteria->addSelectColumn(OeHistTableMap::COL_INVOICE_FORMAT);
            $criteria->addSelectColumn(OeHistTableMap::COL_CASH_AMOUNT);
            $criteria->addSelectColumn(OeHistTableMap::COL_CHECK_AMOUNT);
            $criteria->addSelectColumn(OeHistTableMap::COL_CHECK_NUMBER);
            $criteria->addSelectColumn(OeHistTableMap::COL_DEPOSIT_AMOUNT);
            $criteria->addSelectColumn(OeHistTableMap::COL_DEPOSIT_NUMBER);
            $criteria->addSelectColumn(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX);
            $criteria->addSelectColumn(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX);
            $criteria->addSelectColumn(OeHistTableMap::COL_ORIGINAL_TOTAL_TAX);
            $criteria->addSelectColumn(OeHistTableMap::COL_ORIGINAL_TOTAL);
            $criteria->addSelectColumn(OeHistTableMap::COL_PICK_PRINTDATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PICK_PRINTTIME);
            $criteria->addSelectColumn(OeHistTableMap::COL_CONTACT);
            $criteria->addSelectColumn(OeHistTableMap::COL_PHONE_INTL);
            $criteria->addSelectColumn(OeHistTableMap::COL_PHONE_ACCESSCODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PHONE_COUNTRYCODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PHONE);
            $criteria->addSelectColumn(OeHistTableMap::COL_PHONE_EXT);
            $criteria->addSelectColumn(OeHistTableMap::COL_FAX_INTL);
            $criteria->addSelectColumn(OeHistTableMap::COL_FAX_ACCESSCODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_FAX_COUNTRYCODE);
            $criteria->addSelectColumn(OeHistTableMap::COL_FAX);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIP_ACCOUNT);
            $criteria->addSelectColumn(OeHistTableMap::COL_CHANGE_DUE);
            $criteria->addSelectColumn(OeHistTableMap::COL_DISCOUNT_ADDITIONAL);
            $criteria->addSelectColumn(OeHistTableMap::COL_ALL_SHIP);
            $criteria->addSelectColumn(OeHistTableMap::COL_CREDIT_APPLIED);
            $criteria->addSelectColumn(OeHistTableMap::COL_INVOICE_PRINTDATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_INVOICE_PRINTTIME);
            $criteria->addSelectColumn(OeHistTableMap::COL_DISCOUNT_FREIGHT);
            $criteria->addSelectColumn(OeHistTableMap::COL_SHIP_COMPLETEOVERRIDE);
            $criteria->addSelectColumn(OeHistTableMap::COL_CONTACT_EMAIL);
            $criteria->addSelectColumn(OeHistTableMap::COL_MANUAL_FREIGHT);
            $criteria->addSelectColumn(OeHistTableMap::COL_INTERNAL_FREIGHT);
            $criteria->addSelectColumn(OeHistTableMap::COL_COST_FREIGHT);
            $criteria->addSelectColumn(OeHistTableMap::COL_ROUTE);
            $criteria->addSelectColumn(OeHistTableMap::COL_ROUTE_SEQ);
            $criteria->addSelectColumn(OeHistTableMap::COL_EDI_855SENT);
            $criteria->addSelectColumn(OeHistTableMap::COL_FREIGHT_3RDPARTY);
            $criteria->addSelectColumn(OeHistTableMap::COL_FOB);
            $criteria->addSelectColumn(OeHistTableMap::COL_CONFIRM_IMAGE);
            $criteria->addSelectColumn(OeHistTableMap::COL_CSTK_CONSIGN);
            $criteria->addSelectColumn(OeHistTableMap::COL_MANUFACTURER);
            $criteria->addSelectColumn(OeHistTableMap::COL_PICK_QUEUE);
            $criteria->addSelectColumn(OeHistTableMap::COL_ARRIVE_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_SURCHARGE_STATUS);
            $criteria->addSelectColumn(OeHistTableMap::COL_FREIGHT_GROUP);
            $criteria->addSelectColumn(OeHistTableMap::COL_COMM_OVERRIDE);
            $criteria->addSelectColumn(OeHistTableMap::COL_CHARGE_SPLIT);
            $criteria->addSelectColumn(OeHistTableMap::COL_CREDITCART_APPROVED);
            $criteria->addSelectColumn(OeHistTableMap::COL_ORIGINAL_ORDERNUMBER);
            $criteria->addSelectColumn(OeHistTableMap::COL_HAS_NOTES);
            $criteria->addSelectColumn(OeHistTableMap::COL_HAS_DOCUMENTS);
            $criteria->addSelectColumn(OeHistTableMap::COL_HAS_TRACKING);
            $criteria->addSelectColumn(OeHistTableMap::COL_DATE);
            $criteria->addSelectColumn(OeHistTableMap::COL_TIME);
            $criteria->addSelectColumn(OeHistTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.orderno');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.holdstatus');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.shipto_name');
            $criteria->addSelectColumn($alias . '.shipto_address1');
            $criteria->addSelectColumn($alias . '.shipto_address2');
            $criteria->addSelectColumn($alias . '.shipto_address3');
            $criteria->addSelectColumn($alias . '.shipto_address4');
            $criteria->addSelectColumn($alias . '.shipto_city');
            $criteria->addSelectColumn($alias . '.shipto_state');
            $criteria->addSelectColumn($alias . '.shipto_zip');
            $criteria->addSelectColumn($alias . '.custpo');
            $criteria->addSelectColumn($alias . '.orderdate');
            $criteria->addSelectColumn($alias . '.termcode');
            $criteria->addSelectColumn($alias . '.shipviacode');
            $criteria->addSelectColumn($alias . '.invoice_number');
            $criteria->addSelectColumn($alias . '.invoice_date');
            $criteria->addSelectColumn($alias . '.genledger_period');
            $criteria->addSelectColumn($alias . '.salesperson_1');
            $criteria->addSelectColumn($alias . '.salesperson_1pct');
            $criteria->addSelectColumn($alias . '.salesperson_2');
            $criteria->addSelectColumn($alias . '.salesperson_2pct');
            $criteria->addSelectColumn($alias . '.salesperson_3');
            $criteria->addSelectColumn($alias . '.salesperson_3pct');
            $criteria->addSelectColumn($alias . '.contract_nbr');
            $criteria->addSelectColumn($alias . '.batch_nbr');
            $criteria->addSelectColumn($alias . '.dropreleasehold');
            $criteria->addSelectColumn($alias . '.subtotal_tax');
            $criteria->addSelectColumn($alias . '.subtotal_nontax');
            $criteria->addSelectColumn($alias . '.total_tax');
            $criteria->addSelectColumn($alias . '.total_freight');
            $criteria->addSelectColumn($alias . '.total_misc');
            $criteria->addSelectColumn($alias . '.total_order');
            $criteria->addSelectColumn($alias . '.total_cost');
            $criteria->addSelectColumn($alias . '.lock');
            $criteria->addSelectColumn($alias . '.taken_date');
            $criteria->addSelectColumn($alias . '.taken_time');
            $criteria->addSelectColumn($alias . '.pick_date');
            $criteria->addSelectColumn($alias . '.pick_time');
            $criteria->addSelectColumn($alias . '.pack_date');
            $criteria->addSelectColumn($alias . '.pack_time');
            $criteria->addSelectColumn($alias . '.verify_date');
            $criteria->addSelectColumn($alias . '.verify_time');
            $criteria->addSelectColumn($alias . '.creditmemo');
            $criteria->addSelectColumn($alias . '.booked');
            $criteria->addSelectColumn($alias . '.original_whse');
            $criteria->addSelectColumn($alias . '.billto_state');
            $criteria->addSelectColumn($alias . '.shipcomplete');
            $criteria->addSelectColumn($alias . '.cwo_flag');
            $criteria->addSelectColumn($alias . '.division');
            $criteria->addSelectColumn($alias . '.taken_code');
            $criteria->addSelectColumn($alias . '.pack_code');
            $criteria->addSelectColumn($alias . '.pick_code');
            $criteria->addSelectColumn($alias . '.verify_code');
            $criteria->addSelectColumn($alias . '.total_discount');
            $criteria->addSelectColumn($alias . '.edi_refererencenbr');
            $criteria->addSelectColumn($alias . '.user_code1');
            $criteria->addSelectColumn($alias . '.user_code2');
            $criteria->addSelectColumn($alias . '.user_code3');
            $criteria->addSelectColumn($alias . '.user_code4');
            $criteria->addSelectColumn($alias . '.exchange_country');
            $criteria->addSelectColumn($alias . '.exchange_rate');
            $criteria->addSelectColumn($alias . '.weight_total');
            $criteria->addSelectColumn($alias . '.weight_override');
            $criteria->addSelectColumn($alias . '.box_count');
            $criteria->addSelectColumn($alias . '.request_date');
            $criteria->addSelectColumn($alias . '.cancel_date');
            $criteria->addSelectColumn($alias . '.lockedby');
            $criteria->addSelectColumn($alias . '.release_number');
            $criteria->addSelectColumn($alias . '.whse');
            $criteria->addSelectColumn($alias . '.backorder_date');
            $criteria->addSelectColumn($alias . '.deptcode');
            $criteria->addSelectColumn($alias . '.freight_in_entered');
            $criteria->addSelectColumn($alias . '.dropship_entered');
            $criteria->addSelectColumn($alias . '.er_flag');
            $criteria->addSelectColumn($alias . '.freight_in');
            $criteria->addSelectColumn($alias . '.dropship');
            $criteria->addSelectColumn($alias . '.minorder');
            $criteria->addSelectColumn($alias . '.contract_terms');
            $criteria->addSelectColumn($alias . '.dropship_billed');
            $criteria->addSelectColumn($alias . '.order_type');
            $criteria->addSelectColumn($alias . '.tracking_edinumber');
            $criteria->addSelectColumn($alias . '.source');
            $criteria->addSelectColumn($alias . '.pick_format');
            $criteria->addSelectColumn($alias . '.invoice_format');
            $criteria->addSelectColumn($alias . '.cash_amount');
            $criteria->addSelectColumn($alias . '.check_amount');
            $criteria->addSelectColumn($alias . '.check_number');
            $criteria->addSelectColumn($alias . '.deposit_amount');
            $criteria->addSelectColumn($alias . '.deposit_number');
            $criteria->addSelectColumn($alias . '.original_subtotal_tax');
            $criteria->addSelectColumn($alias . '.original_subtotal_nontax');
            $criteria->addSelectColumn($alias . '.original_total_tax');
            $criteria->addSelectColumn($alias . '.original_total');
            $criteria->addSelectColumn($alias . '.pick_printdate');
            $criteria->addSelectColumn($alias . '.pick_printtime');
            $criteria->addSelectColumn($alias . '.contact');
            $criteria->addSelectColumn($alias . '.phone_intl');
            $criteria->addSelectColumn($alias . '.phone_accesscode');
            $criteria->addSelectColumn($alias . '.phone_countrycode');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.phone_ext');
            $criteria->addSelectColumn($alias . '.fax_intl');
            $criteria->addSelectColumn($alias . '.fax_accesscode');
            $criteria->addSelectColumn($alias . '.fax_countrycode');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.ship_account');
            $criteria->addSelectColumn($alias . '.change_due');
            $criteria->addSelectColumn($alias . '.discount_additional');
            $criteria->addSelectColumn($alias . '.all_ship');
            $criteria->addSelectColumn($alias . '.credit_applied');
            $criteria->addSelectColumn($alias . '.invoice_printdate');
            $criteria->addSelectColumn($alias . '.invoice_printtime');
            $criteria->addSelectColumn($alias . '.discount_freight');
            $criteria->addSelectColumn($alias . '.ship_completeoverride');
            $criteria->addSelectColumn($alias . '.contact_email');
            $criteria->addSelectColumn($alias . '.manual_freight');
            $criteria->addSelectColumn($alias . '.internal_freight');
            $criteria->addSelectColumn($alias . '.cost_freight');
            $criteria->addSelectColumn($alias . '.route');
            $criteria->addSelectColumn($alias . '.route_seq');
            $criteria->addSelectColumn($alias . '.edi_855sent');
            $criteria->addSelectColumn($alias . '.freight_3rdparty');
            $criteria->addSelectColumn($alias . '.fob');
            $criteria->addSelectColumn($alias . '.confirm_image');
            $criteria->addSelectColumn($alias . '.cstk_consign');
            $criteria->addSelectColumn($alias . '.manufacturer');
            $criteria->addSelectColumn($alias . '.pick_queue');
            $criteria->addSelectColumn($alias . '.arrive_date');
            $criteria->addSelectColumn($alias . '.surcharge_status');
            $criteria->addSelectColumn($alias . '.freight_group');
            $criteria->addSelectColumn($alias . '.comm_override');
            $criteria->addSelectColumn($alias . '.charge_split');
            $criteria->addSelectColumn($alias . '.creditcart_approved');
            $criteria->addSelectColumn($alias . '.original_ordernumber');
            $criteria->addSelectColumn($alias . '.has_notes');
            $criteria->addSelectColumn($alias . '.has_documents');
            $criteria->addSelectColumn($alias . '.has_tracking');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(OeHistTableMap::DATABASE_NAME)->getTable(OeHistTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OeHistTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OeHistTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OeHistTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OeHist or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OeHist object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OeHistTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OeHist) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OeHistTableMap::DATABASE_NAME);
            $criteria->add(OeHistTableMap::COL_ORDERNO, (array) $values, Criteria::IN);
        }

        $query = OeHistQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OeHistTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OeHistTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the oe_hist table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OeHistQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OeHist or Criteria object.
     *
     * @param mixed               $criteria Criteria or OeHist object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OeHistTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OeHist object
        }


        // Set the correct dbName
        $query = OeHistQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OeHistTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OeHistTableMap::buildTableMap();
