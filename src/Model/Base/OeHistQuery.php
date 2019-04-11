<?php

namespace Base;

use \OeHist as ChildOeHist;
use \OeHistQuery as ChildOeHistQuery;
use \Exception;
use \PDO;
use Map\OeHistTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oe_hist' table.
 *
 *
 *
 * @method     ChildOeHistQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildOeHistQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOeHistQuery orderByHoldstatus($order = Criteria::ASC) Order by the holdstatus column
 * @method     ChildOeHistQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildOeHistQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildOeHistQuery orderByShiptoName($order = Criteria::ASC) Order by the shipto_name column
 * @method     ChildOeHistQuery orderByShiptoAddress1($order = Criteria::ASC) Order by the shipto_address1 column
 * @method     ChildOeHistQuery orderByShiptoAddress2($order = Criteria::ASC) Order by the shipto_address2 column
 * @method     ChildOeHistQuery orderByShiptoAddress3($order = Criteria::ASC) Order by the shipto_address3 column
 * @method     ChildOeHistQuery orderByShiptoAddress4($order = Criteria::ASC) Order by the shipto_address4 column
 * @method     ChildOeHistQuery orderByShiptoCity($order = Criteria::ASC) Order by the shipto_city column
 * @method     ChildOeHistQuery orderByShiptoState($order = Criteria::ASC) Order by the shipto_state column
 * @method     ChildOeHistQuery orderByShiptoZip($order = Criteria::ASC) Order by the shipto_zip column
 * @method     ChildOeHistQuery orderByCustpo($order = Criteria::ASC) Order by the custpo column
 * @method     ChildOeHistQuery orderByOrderdate($order = Criteria::ASC) Order by the orderdate column
 * @method     ChildOeHistQuery orderByTermcode($order = Criteria::ASC) Order by the termcode column
 * @method     ChildOeHistQuery orderByShipviacode($order = Criteria::ASC) Order by the shipviacode column
 * @method     ChildOeHistQuery orderByInvoiceNumber($order = Criteria::ASC) Order by the invoice_number column
 * @method     ChildOeHistQuery orderByInvoiceDate($order = Criteria::ASC) Order by the invoice_date column
 * @method     ChildOeHistQuery orderByGenledgerPeriod($order = Criteria::ASC) Order by the genledger_period column
 * @method     ChildOeHistQuery orderBySalesperson1($order = Criteria::ASC) Order by the salesperson_1 column
 * @method     ChildOeHistQuery orderBySalesperson1pct($order = Criteria::ASC) Order by the salesperson_1pct column
 * @method     ChildOeHistQuery orderBySalesperson2($order = Criteria::ASC) Order by the salesperson_2 column
 * @method     ChildOeHistQuery orderBySalesperson2pct($order = Criteria::ASC) Order by the salesperson_2pct column
 * @method     ChildOeHistQuery orderBySalesperson3($order = Criteria::ASC) Order by the salesperson_3 column
 * @method     ChildOeHistQuery orderBySalesperson3pct($order = Criteria::ASC) Order by the salesperson_3pct column
 * @method     ChildOeHistQuery orderByContractNbr($order = Criteria::ASC) Order by the contract_nbr column
 * @method     ChildOeHistQuery orderByBatchNbr($order = Criteria::ASC) Order by the batch_nbr column
 * @method     ChildOeHistQuery orderByDropreleasehold($order = Criteria::ASC) Order by the dropreleasehold column
 * @method     ChildOeHistQuery orderBySubtotalTax($order = Criteria::ASC) Order by the subtotal_tax column
 * @method     ChildOeHistQuery orderBySubtotalNontax($order = Criteria::ASC) Order by the subtotal_nontax column
 * @method     ChildOeHistQuery orderByTotalTax($order = Criteria::ASC) Order by the total_tax column
 * @method     ChildOeHistQuery orderByTotalFreight($order = Criteria::ASC) Order by the total_freight column
 * @method     ChildOeHistQuery orderByTotalMisc($order = Criteria::ASC) Order by the total_misc column
 * @method     ChildOeHistQuery orderByTotalOrder($order = Criteria::ASC) Order by the total_order column
 * @method     ChildOeHistQuery orderByTotalCost($order = Criteria::ASC) Order by the total_cost column
 * @method     ChildOeHistQuery orderByLock($order = Criteria::ASC) Order by the lock column
 * @method     ChildOeHistQuery orderByTakenDate($order = Criteria::ASC) Order by the taken_date column
 * @method     ChildOeHistQuery orderByTakenTime($order = Criteria::ASC) Order by the taken_time column
 * @method     ChildOeHistQuery orderByPickDate($order = Criteria::ASC) Order by the pick_date column
 * @method     ChildOeHistQuery orderByPickTime($order = Criteria::ASC) Order by the pick_time column
 * @method     ChildOeHistQuery orderByPackDate($order = Criteria::ASC) Order by the pack_date column
 * @method     ChildOeHistQuery orderByPackTime($order = Criteria::ASC) Order by the pack_time column
 * @method     ChildOeHistQuery orderByVerifyDate($order = Criteria::ASC) Order by the verify_date column
 * @method     ChildOeHistQuery orderByVerifyTime($order = Criteria::ASC) Order by the verify_time column
 * @method     ChildOeHistQuery orderByCreditmemo($order = Criteria::ASC) Order by the creditmemo column
 * @method     ChildOeHistQuery orderByBooked($order = Criteria::ASC) Order by the booked column
 * @method     ChildOeHistQuery orderByOriginalWhse($order = Criteria::ASC) Order by the original_whse column
 * @method     ChildOeHistQuery orderByBilltoState($order = Criteria::ASC) Order by the billto_state column
 * @method     ChildOeHistQuery orderByShipcomplete($order = Criteria::ASC) Order by the shipcomplete column
 * @method     ChildOeHistQuery orderByCwoFlag($order = Criteria::ASC) Order by the cwo_flag column
 * @method     ChildOeHistQuery orderByDivision($order = Criteria::ASC) Order by the division column
 * @method     ChildOeHistQuery orderByTakenCode($order = Criteria::ASC) Order by the taken_code column
 * @method     ChildOeHistQuery orderByPackCode($order = Criteria::ASC) Order by the pack_code column
 * @method     ChildOeHistQuery orderByPickCode($order = Criteria::ASC) Order by the pick_code column
 * @method     ChildOeHistQuery orderByVerifyCode($order = Criteria::ASC) Order by the verify_code column
 * @method     ChildOeHistQuery orderByTotalDiscount($order = Criteria::ASC) Order by the total_discount column
 * @method     ChildOeHistQuery orderByEdiRefererencenbr($order = Criteria::ASC) Order by the edi_refererencenbr column
 * @method     ChildOeHistQuery orderByUserCode1($order = Criteria::ASC) Order by the user_code1 column
 * @method     ChildOeHistQuery orderByUserCode2($order = Criteria::ASC) Order by the user_code2 column
 * @method     ChildOeHistQuery orderByUserCode3($order = Criteria::ASC) Order by the user_code3 column
 * @method     ChildOeHistQuery orderByUserCode4($order = Criteria::ASC) Order by the user_code4 column
 * @method     ChildOeHistQuery orderByExchangeCountry($order = Criteria::ASC) Order by the exchange_country column
 * @method     ChildOeHistQuery orderByExchangeRate($order = Criteria::ASC) Order by the exchange_rate column
 * @method     ChildOeHistQuery orderByWeightTotal($order = Criteria::ASC) Order by the weight_total column
 * @method     ChildOeHistQuery orderByWeightOverride($order = Criteria::ASC) Order by the weight_override column
 * @method     ChildOeHistQuery orderByBoxCount($order = Criteria::ASC) Order by the box_count column
 * @method     ChildOeHistQuery orderByRequestDate($order = Criteria::ASC) Order by the request_date column
 * @method     ChildOeHistQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildOeHistQuery orderByLockedby($order = Criteria::ASC) Order by the lockedby column
 * @method     ChildOeHistQuery orderByReleaseNumber($order = Criteria::ASC) Order by the release_number column
 * @method     ChildOeHistQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildOeHistQuery orderByBackorderDate($order = Criteria::ASC) Order by the backorder_date column
 * @method     ChildOeHistQuery orderByDeptcode($order = Criteria::ASC) Order by the deptcode column
 * @method     ChildOeHistQuery orderByFreightInEntered($order = Criteria::ASC) Order by the freight_in_entered column
 * @method     ChildOeHistQuery orderByDropshipEntered($order = Criteria::ASC) Order by the dropship_entered column
 * @method     ChildOeHistQuery orderByErFlag($order = Criteria::ASC) Order by the er_flag column
 * @method     ChildOeHistQuery orderByFreightIn($order = Criteria::ASC) Order by the freight_in column
 * @method     ChildOeHistQuery orderByDropship($order = Criteria::ASC) Order by the dropship column
 * @method     ChildOeHistQuery orderByMinorder($order = Criteria::ASC) Order by the minorder column
 * @method     ChildOeHistQuery orderByContractTerms($order = Criteria::ASC) Order by the contract_terms column
 * @method     ChildOeHistQuery orderByDropshipBilled($order = Criteria::ASC) Order by the dropship_billed column
 * @method     ChildOeHistQuery orderByOrderType($order = Criteria::ASC) Order by the order_type column
 * @method     ChildOeHistQuery orderByTrackingEdinumber($order = Criteria::ASC) Order by the tracking_edinumber column
 * @method     ChildOeHistQuery orderBySource($order = Criteria::ASC) Order by the source column
 * @method     ChildOeHistQuery orderByPickFormat($order = Criteria::ASC) Order by the pick_format column
 * @method     ChildOeHistQuery orderByInvoiceFormat($order = Criteria::ASC) Order by the invoice_format column
 * @method     ChildOeHistQuery orderByCashAmount($order = Criteria::ASC) Order by the cash_amount column
 * @method     ChildOeHistQuery orderByCheckAmount($order = Criteria::ASC) Order by the check_amount column
 * @method     ChildOeHistQuery orderByCheckNumber($order = Criteria::ASC) Order by the check_number column
 * @method     ChildOeHistQuery orderByDepositAmount($order = Criteria::ASC) Order by the deposit_amount column
 * @method     ChildOeHistQuery orderByDepositNumber($order = Criteria::ASC) Order by the deposit_number column
 * @method     ChildOeHistQuery orderByOriginalSubtotalTax($order = Criteria::ASC) Order by the original_subtotal_tax column
 * @method     ChildOeHistQuery orderByOriginalSubtotalNontax($order = Criteria::ASC) Order by the original_subtotal_nontax column
 * @method     ChildOeHistQuery orderByOriginalTotalTax($order = Criteria::ASC) Order by the original_total_tax column
 * @method     ChildOeHistQuery orderByOriginalTotal($order = Criteria::ASC) Order by the original_total column
 * @method     ChildOeHistQuery orderByPickPrintdate($order = Criteria::ASC) Order by the pick_printdate column
 * @method     ChildOeHistQuery orderByPickPrinttime($order = Criteria::ASC) Order by the pick_printtime column
 * @method     ChildOeHistQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildOeHistQuery orderByPhoneIntl($order = Criteria::ASC) Order by the phone_intl column
 * @method     ChildOeHistQuery orderByPhoneAccesscode($order = Criteria::ASC) Order by the phone_accesscode column
 * @method     ChildOeHistQuery orderByPhoneCountrycode($order = Criteria::ASC) Order by the phone_countrycode column
 * @method     ChildOeHistQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildOeHistQuery orderByPhoneExt($order = Criteria::ASC) Order by the phone_ext column
 * @method     ChildOeHistQuery orderByFaxIntl($order = Criteria::ASC) Order by the fax_intl column
 * @method     ChildOeHistQuery orderByFaxAccesscode($order = Criteria::ASC) Order by the fax_accesscode column
 * @method     ChildOeHistQuery orderByFaxCountrycode($order = Criteria::ASC) Order by the fax_countrycode column
 * @method     ChildOeHistQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildOeHistQuery orderByShipAccount($order = Criteria::ASC) Order by the ship_account column
 * @method     ChildOeHistQuery orderByChangeDue($order = Criteria::ASC) Order by the change_due column
 * @method     ChildOeHistQuery orderByDiscountAdditional($order = Criteria::ASC) Order by the discount_additional column
 * @method     ChildOeHistQuery orderByAllShip($order = Criteria::ASC) Order by the all_ship column
 * @method     ChildOeHistQuery orderByCreditApplied($order = Criteria::ASC) Order by the credit_applied column
 * @method     ChildOeHistQuery orderByInvoicePrintdate($order = Criteria::ASC) Order by the invoice_printdate column
 * @method     ChildOeHistQuery orderByInvoicePrinttime($order = Criteria::ASC) Order by the invoice_printtime column
 * @method     ChildOeHistQuery orderByDiscountFreight($order = Criteria::ASC) Order by the discount_freight column
 * @method     ChildOeHistQuery orderByShipCompleteoverride($order = Criteria::ASC) Order by the ship_completeoverride column
 * @method     ChildOeHistQuery orderByContactEmail($order = Criteria::ASC) Order by the contact_email column
 * @method     ChildOeHistQuery orderByManualFreight($order = Criteria::ASC) Order by the manual_freight column
 * @method     ChildOeHistQuery orderByInternalFreight($order = Criteria::ASC) Order by the internal_freight column
 * @method     ChildOeHistQuery orderByCostFreight($order = Criteria::ASC) Order by the cost_freight column
 * @method     ChildOeHistQuery orderByRoute($order = Criteria::ASC) Order by the route column
 * @method     ChildOeHistQuery orderByRouteSeq($order = Criteria::ASC) Order by the route_seq column
 * @method     ChildOeHistQuery orderByEdi855sent($order = Criteria::ASC) Order by the edi_855sent column
 * @method     ChildOeHistQuery orderByFreight3rdparty($order = Criteria::ASC) Order by the freight_3rdparty column
 * @method     ChildOeHistQuery orderByFob($order = Criteria::ASC) Order by the fob column
 * @method     ChildOeHistQuery orderByConfirmImage($order = Criteria::ASC) Order by the confirm_image column
 * @method     ChildOeHistQuery orderByCstkConsign($order = Criteria::ASC) Order by the cstk_consign column
 * @method     ChildOeHistQuery orderByManufacturer($order = Criteria::ASC) Order by the manufacturer column
 * @method     ChildOeHistQuery orderByPickQueue($order = Criteria::ASC) Order by the pick_queue column
 * @method     ChildOeHistQuery orderByArriveDate($order = Criteria::ASC) Order by the arrive_date column
 * @method     ChildOeHistQuery orderBySurchargeStatus($order = Criteria::ASC) Order by the surcharge_status column
 * @method     ChildOeHistQuery orderByFreightGroup($order = Criteria::ASC) Order by the freight_group column
 * @method     ChildOeHistQuery orderByCommOverride($order = Criteria::ASC) Order by the comm_override column
 * @method     ChildOeHistQuery orderByChargeSplit($order = Criteria::ASC) Order by the charge_split column
 * @method     ChildOeHistQuery orderByCreditcartApproved($order = Criteria::ASC) Order by the creditcart_approved column
 * @method     ChildOeHistQuery orderByOriginalOrdernumber($order = Criteria::ASC) Order by the original_ordernumber column
 * @method     ChildOeHistQuery orderByHasNotes($order = Criteria::ASC) Order by the has_notes column
 * @method     ChildOeHistQuery orderByHasDocuments($order = Criteria::ASC) Order by the has_documents column
 * @method     ChildOeHistQuery orderByHasTracking($order = Criteria::ASC) Order by the has_tracking column
 * @method     ChildOeHistQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOeHistQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildOeHistQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildOeHistQuery groupByOrderno() Group by the orderno column
 * @method     ChildOeHistQuery groupByStatus() Group by the status column
 * @method     ChildOeHistQuery groupByHoldstatus() Group by the holdstatus column
 * @method     ChildOeHistQuery groupByCustid() Group by the custid column
 * @method     ChildOeHistQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildOeHistQuery groupByShiptoName() Group by the shipto_name column
 * @method     ChildOeHistQuery groupByShiptoAddress1() Group by the shipto_address1 column
 * @method     ChildOeHistQuery groupByShiptoAddress2() Group by the shipto_address2 column
 * @method     ChildOeHistQuery groupByShiptoAddress3() Group by the shipto_address3 column
 * @method     ChildOeHistQuery groupByShiptoAddress4() Group by the shipto_address4 column
 * @method     ChildOeHistQuery groupByShiptoCity() Group by the shipto_city column
 * @method     ChildOeHistQuery groupByShiptoState() Group by the shipto_state column
 * @method     ChildOeHistQuery groupByShiptoZip() Group by the shipto_zip column
 * @method     ChildOeHistQuery groupByCustpo() Group by the custpo column
 * @method     ChildOeHistQuery groupByOrderdate() Group by the orderdate column
 * @method     ChildOeHistQuery groupByTermcode() Group by the termcode column
 * @method     ChildOeHistQuery groupByShipviacode() Group by the shipviacode column
 * @method     ChildOeHistQuery groupByInvoiceNumber() Group by the invoice_number column
 * @method     ChildOeHistQuery groupByInvoiceDate() Group by the invoice_date column
 * @method     ChildOeHistQuery groupByGenledgerPeriod() Group by the genledger_period column
 * @method     ChildOeHistQuery groupBySalesperson1() Group by the salesperson_1 column
 * @method     ChildOeHistQuery groupBySalesperson1pct() Group by the salesperson_1pct column
 * @method     ChildOeHistQuery groupBySalesperson2() Group by the salesperson_2 column
 * @method     ChildOeHistQuery groupBySalesperson2pct() Group by the salesperson_2pct column
 * @method     ChildOeHistQuery groupBySalesperson3() Group by the salesperson_3 column
 * @method     ChildOeHistQuery groupBySalesperson3pct() Group by the salesperson_3pct column
 * @method     ChildOeHistQuery groupByContractNbr() Group by the contract_nbr column
 * @method     ChildOeHistQuery groupByBatchNbr() Group by the batch_nbr column
 * @method     ChildOeHistQuery groupByDropreleasehold() Group by the dropreleasehold column
 * @method     ChildOeHistQuery groupBySubtotalTax() Group by the subtotal_tax column
 * @method     ChildOeHistQuery groupBySubtotalNontax() Group by the subtotal_nontax column
 * @method     ChildOeHistQuery groupByTotalTax() Group by the total_tax column
 * @method     ChildOeHistQuery groupByTotalFreight() Group by the total_freight column
 * @method     ChildOeHistQuery groupByTotalMisc() Group by the total_misc column
 * @method     ChildOeHistQuery groupByTotalOrder() Group by the total_order column
 * @method     ChildOeHistQuery groupByTotalCost() Group by the total_cost column
 * @method     ChildOeHistQuery groupByLock() Group by the lock column
 * @method     ChildOeHistQuery groupByTakenDate() Group by the taken_date column
 * @method     ChildOeHistQuery groupByTakenTime() Group by the taken_time column
 * @method     ChildOeHistQuery groupByPickDate() Group by the pick_date column
 * @method     ChildOeHistQuery groupByPickTime() Group by the pick_time column
 * @method     ChildOeHistQuery groupByPackDate() Group by the pack_date column
 * @method     ChildOeHistQuery groupByPackTime() Group by the pack_time column
 * @method     ChildOeHistQuery groupByVerifyDate() Group by the verify_date column
 * @method     ChildOeHistQuery groupByVerifyTime() Group by the verify_time column
 * @method     ChildOeHistQuery groupByCreditmemo() Group by the creditmemo column
 * @method     ChildOeHistQuery groupByBooked() Group by the booked column
 * @method     ChildOeHistQuery groupByOriginalWhse() Group by the original_whse column
 * @method     ChildOeHistQuery groupByBilltoState() Group by the billto_state column
 * @method     ChildOeHistQuery groupByShipcomplete() Group by the shipcomplete column
 * @method     ChildOeHistQuery groupByCwoFlag() Group by the cwo_flag column
 * @method     ChildOeHistQuery groupByDivision() Group by the division column
 * @method     ChildOeHistQuery groupByTakenCode() Group by the taken_code column
 * @method     ChildOeHistQuery groupByPackCode() Group by the pack_code column
 * @method     ChildOeHistQuery groupByPickCode() Group by the pick_code column
 * @method     ChildOeHistQuery groupByVerifyCode() Group by the verify_code column
 * @method     ChildOeHistQuery groupByTotalDiscount() Group by the total_discount column
 * @method     ChildOeHistQuery groupByEdiRefererencenbr() Group by the edi_refererencenbr column
 * @method     ChildOeHistQuery groupByUserCode1() Group by the user_code1 column
 * @method     ChildOeHistQuery groupByUserCode2() Group by the user_code2 column
 * @method     ChildOeHistQuery groupByUserCode3() Group by the user_code3 column
 * @method     ChildOeHistQuery groupByUserCode4() Group by the user_code4 column
 * @method     ChildOeHistQuery groupByExchangeCountry() Group by the exchange_country column
 * @method     ChildOeHistQuery groupByExchangeRate() Group by the exchange_rate column
 * @method     ChildOeHistQuery groupByWeightTotal() Group by the weight_total column
 * @method     ChildOeHistQuery groupByWeightOverride() Group by the weight_override column
 * @method     ChildOeHistQuery groupByBoxCount() Group by the box_count column
 * @method     ChildOeHistQuery groupByRequestDate() Group by the request_date column
 * @method     ChildOeHistQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildOeHistQuery groupByLockedby() Group by the lockedby column
 * @method     ChildOeHistQuery groupByReleaseNumber() Group by the release_number column
 * @method     ChildOeHistQuery groupByWhse() Group by the whse column
 * @method     ChildOeHistQuery groupByBackorderDate() Group by the backorder_date column
 * @method     ChildOeHistQuery groupByDeptcode() Group by the deptcode column
 * @method     ChildOeHistQuery groupByFreightInEntered() Group by the freight_in_entered column
 * @method     ChildOeHistQuery groupByDropshipEntered() Group by the dropship_entered column
 * @method     ChildOeHistQuery groupByErFlag() Group by the er_flag column
 * @method     ChildOeHistQuery groupByFreightIn() Group by the freight_in column
 * @method     ChildOeHistQuery groupByDropship() Group by the dropship column
 * @method     ChildOeHistQuery groupByMinorder() Group by the minorder column
 * @method     ChildOeHistQuery groupByContractTerms() Group by the contract_terms column
 * @method     ChildOeHistQuery groupByDropshipBilled() Group by the dropship_billed column
 * @method     ChildOeHistQuery groupByOrderType() Group by the order_type column
 * @method     ChildOeHistQuery groupByTrackingEdinumber() Group by the tracking_edinumber column
 * @method     ChildOeHistQuery groupBySource() Group by the source column
 * @method     ChildOeHistQuery groupByPickFormat() Group by the pick_format column
 * @method     ChildOeHistQuery groupByInvoiceFormat() Group by the invoice_format column
 * @method     ChildOeHistQuery groupByCashAmount() Group by the cash_amount column
 * @method     ChildOeHistQuery groupByCheckAmount() Group by the check_amount column
 * @method     ChildOeHistQuery groupByCheckNumber() Group by the check_number column
 * @method     ChildOeHistQuery groupByDepositAmount() Group by the deposit_amount column
 * @method     ChildOeHistQuery groupByDepositNumber() Group by the deposit_number column
 * @method     ChildOeHistQuery groupByOriginalSubtotalTax() Group by the original_subtotal_tax column
 * @method     ChildOeHistQuery groupByOriginalSubtotalNontax() Group by the original_subtotal_nontax column
 * @method     ChildOeHistQuery groupByOriginalTotalTax() Group by the original_total_tax column
 * @method     ChildOeHistQuery groupByOriginalTotal() Group by the original_total column
 * @method     ChildOeHistQuery groupByPickPrintdate() Group by the pick_printdate column
 * @method     ChildOeHistQuery groupByPickPrinttime() Group by the pick_printtime column
 * @method     ChildOeHistQuery groupByContact() Group by the contact column
 * @method     ChildOeHistQuery groupByPhoneIntl() Group by the phone_intl column
 * @method     ChildOeHistQuery groupByPhoneAccesscode() Group by the phone_accesscode column
 * @method     ChildOeHistQuery groupByPhoneCountrycode() Group by the phone_countrycode column
 * @method     ChildOeHistQuery groupByPhone() Group by the phone column
 * @method     ChildOeHistQuery groupByPhoneExt() Group by the phone_ext column
 * @method     ChildOeHistQuery groupByFaxIntl() Group by the fax_intl column
 * @method     ChildOeHistQuery groupByFaxAccesscode() Group by the fax_accesscode column
 * @method     ChildOeHistQuery groupByFaxCountrycode() Group by the fax_countrycode column
 * @method     ChildOeHistQuery groupByFax() Group by the fax column
 * @method     ChildOeHistQuery groupByShipAccount() Group by the ship_account column
 * @method     ChildOeHistQuery groupByChangeDue() Group by the change_due column
 * @method     ChildOeHistQuery groupByDiscountAdditional() Group by the discount_additional column
 * @method     ChildOeHistQuery groupByAllShip() Group by the all_ship column
 * @method     ChildOeHistQuery groupByCreditApplied() Group by the credit_applied column
 * @method     ChildOeHistQuery groupByInvoicePrintdate() Group by the invoice_printdate column
 * @method     ChildOeHistQuery groupByInvoicePrinttime() Group by the invoice_printtime column
 * @method     ChildOeHistQuery groupByDiscountFreight() Group by the discount_freight column
 * @method     ChildOeHistQuery groupByShipCompleteoverride() Group by the ship_completeoverride column
 * @method     ChildOeHistQuery groupByContactEmail() Group by the contact_email column
 * @method     ChildOeHistQuery groupByManualFreight() Group by the manual_freight column
 * @method     ChildOeHistQuery groupByInternalFreight() Group by the internal_freight column
 * @method     ChildOeHistQuery groupByCostFreight() Group by the cost_freight column
 * @method     ChildOeHistQuery groupByRoute() Group by the route column
 * @method     ChildOeHistQuery groupByRouteSeq() Group by the route_seq column
 * @method     ChildOeHistQuery groupByEdi855sent() Group by the edi_855sent column
 * @method     ChildOeHistQuery groupByFreight3rdparty() Group by the freight_3rdparty column
 * @method     ChildOeHistQuery groupByFob() Group by the fob column
 * @method     ChildOeHistQuery groupByConfirmImage() Group by the confirm_image column
 * @method     ChildOeHistQuery groupByCstkConsign() Group by the cstk_consign column
 * @method     ChildOeHistQuery groupByManufacturer() Group by the manufacturer column
 * @method     ChildOeHistQuery groupByPickQueue() Group by the pick_queue column
 * @method     ChildOeHistQuery groupByArriveDate() Group by the arrive_date column
 * @method     ChildOeHistQuery groupBySurchargeStatus() Group by the surcharge_status column
 * @method     ChildOeHistQuery groupByFreightGroup() Group by the freight_group column
 * @method     ChildOeHistQuery groupByCommOverride() Group by the comm_override column
 * @method     ChildOeHistQuery groupByChargeSplit() Group by the charge_split column
 * @method     ChildOeHistQuery groupByCreditcartApproved() Group by the creditcart_approved column
 * @method     ChildOeHistQuery groupByOriginalOrdernumber() Group by the original_ordernumber column
 * @method     ChildOeHistQuery groupByHasNotes() Group by the has_notes column
 * @method     ChildOeHistQuery groupByHasDocuments() Group by the has_documents column
 * @method     ChildOeHistQuery groupByHasTracking() Group by the has_tracking column
 * @method     ChildOeHistQuery groupByDate() Group by the date column
 * @method     ChildOeHistQuery groupByTime() Group by the time column
 * @method     ChildOeHistQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildOeHistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOeHistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOeHistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOeHistQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOeHistQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOeHistQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOeHist findOne(ConnectionInterface $con = null) Return the first ChildOeHist matching the query
 * @method     ChildOeHist findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOeHist matching the query, or a new ChildOeHist object populated from the query conditions when no match is found
 *
 * @method     ChildOeHist findOneByOrderno(int $orderno) Return the first ChildOeHist filtered by the orderno column
 * @method     ChildOeHist findOneByStatus(string $status) Return the first ChildOeHist filtered by the status column
 * @method     ChildOeHist findOneByHoldstatus(string $holdstatus) Return the first ChildOeHist filtered by the holdstatus column
 * @method     ChildOeHist findOneByCustid(string $custid) Return the first ChildOeHist filtered by the custid column
 * @method     ChildOeHist findOneByShiptoid(string $shiptoid) Return the first ChildOeHist filtered by the shiptoid column
 * @method     ChildOeHist findOneByShiptoName(string $shipto_name) Return the first ChildOeHist filtered by the shipto_name column
 * @method     ChildOeHist findOneByShiptoAddress1(string $shipto_address1) Return the first ChildOeHist filtered by the shipto_address1 column
 * @method     ChildOeHist findOneByShiptoAddress2(string $shipto_address2) Return the first ChildOeHist filtered by the shipto_address2 column
 * @method     ChildOeHist findOneByShiptoAddress3(string $shipto_address3) Return the first ChildOeHist filtered by the shipto_address3 column
 * @method     ChildOeHist findOneByShiptoAddress4(string $shipto_address4) Return the first ChildOeHist filtered by the shipto_address4 column
 * @method     ChildOeHist findOneByShiptoCity(string $shipto_city) Return the first ChildOeHist filtered by the shipto_city column
 * @method     ChildOeHist findOneByShiptoState(string $shipto_state) Return the first ChildOeHist filtered by the shipto_state column
 * @method     ChildOeHist findOneByShiptoZip(string $shipto_zip) Return the first ChildOeHist filtered by the shipto_zip column
 * @method     ChildOeHist findOneByCustpo(string $custpo) Return the first ChildOeHist filtered by the custpo column
 * @method     ChildOeHist findOneByOrderdate(int $orderdate) Return the first ChildOeHist filtered by the orderdate column
 * @method     ChildOeHist findOneByTermcode(string $termcode) Return the first ChildOeHist filtered by the termcode column
 * @method     ChildOeHist findOneByShipviacode(string $shipviacode) Return the first ChildOeHist filtered by the shipviacode column
 * @method     ChildOeHist findOneByInvoiceNumber(int $invoice_number) Return the first ChildOeHist filtered by the invoice_number column
 * @method     ChildOeHist findOneByInvoiceDate(int $invoice_date) Return the first ChildOeHist filtered by the invoice_date column
 * @method     ChildOeHist findOneByGenledgerPeriod(int $genledger_period) Return the first ChildOeHist filtered by the genledger_period column
 * @method     ChildOeHist findOneBySalesperson1(string $salesperson_1) Return the first ChildOeHist filtered by the salesperson_1 column
 * @method     ChildOeHist findOneBySalesperson1pct(string $salesperson_1pct) Return the first ChildOeHist filtered by the salesperson_1pct column
 * @method     ChildOeHist findOneBySalesperson2(string $salesperson_2) Return the first ChildOeHist filtered by the salesperson_2 column
 * @method     ChildOeHist findOneBySalesperson2pct(string $salesperson_2pct) Return the first ChildOeHist filtered by the salesperson_2pct column
 * @method     ChildOeHist findOneBySalesperson3(string $salesperson_3) Return the first ChildOeHist filtered by the salesperson_3 column
 * @method     ChildOeHist findOneBySalesperson3pct(string $salesperson_3pct) Return the first ChildOeHist filtered by the salesperson_3pct column
 * @method     ChildOeHist findOneByContractNbr(int $contract_nbr) Return the first ChildOeHist filtered by the contract_nbr column
 * @method     ChildOeHist findOneByBatchNbr(int $batch_nbr) Return the first ChildOeHist filtered by the batch_nbr column
 * @method     ChildOeHist findOneByDropreleasehold(string $dropreleasehold) Return the first ChildOeHist filtered by the dropreleasehold column
 * @method     ChildOeHist findOneBySubtotalTax(string $subtotal_tax) Return the first ChildOeHist filtered by the subtotal_tax column
 * @method     ChildOeHist findOneBySubtotalNontax(string $subtotal_nontax) Return the first ChildOeHist filtered by the subtotal_nontax column
 * @method     ChildOeHist findOneByTotalTax(string $total_tax) Return the first ChildOeHist filtered by the total_tax column
 * @method     ChildOeHist findOneByTotalFreight(string $total_freight) Return the first ChildOeHist filtered by the total_freight column
 * @method     ChildOeHist findOneByTotalMisc(string $total_misc) Return the first ChildOeHist filtered by the total_misc column
 * @method     ChildOeHist findOneByTotalOrder(string $total_order) Return the first ChildOeHist filtered by the total_order column
 * @method     ChildOeHist findOneByTotalCost(string $total_cost) Return the first ChildOeHist filtered by the total_cost column
 * @method     ChildOeHist findOneByLock(string $lock) Return the first ChildOeHist filtered by the lock column
 * @method     ChildOeHist findOneByTakenDate(int $taken_date) Return the first ChildOeHist filtered by the taken_date column
 * @method     ChildOeHist findOneByTakenTime(int $taken_time) Return the first ChildOeHist filtered by the taken_time column
 * @method     ChildOeHist findOneByPickDate(int $pick_date) Return the first ChildOeHist filtered by the pick_date column
 * @method     ChildOeHist findOneByPickTime(int $pick_time) Return the first ChildOeHist filtered by the pick_time column
 * @method     ChildOeHist findOneByPackDate(int $pack_date) Return the first ChildOeHist filtered by the pack_date column
 * @method     ChildOeHist findOneByPackTime(int $pack_time) Return the first ChildOeHist filtered by the pack_time column
 * @method     ChildOeHist findOneByVerifyDate(int $verify_date) Return the first ChildOeHist filtered by the verify_date column
 * @method     ChildOeHist findOneByVerifyTime(int $verify_time) Return the first ChildOeHist filtered by the verify_time column
 * @method     ChildOeHist findOneByCreditmemo(string $creditmemo) Return the first ChildOeHist filtered by the creditmemo column
 * @method     ChildOeHist findOneByBooked(string $booked) Return the first ChildOeHist filtered by the booked column
 * @method     ChildOeHist findOneByOriginalWhse(string $original_whse) Return the first ChildOeHist filtered by the original_whse column
 * @method     ChildOeHist findOneByBilltoState(string $billto_state) Return the first ChildOeHist filtered by the billto_state column
 * @method     ChildOeHist findOneByShipcomplete(string $shipcomplete) Return the first ChildOeHist filtered by the shipcomplete column
 * @method     ChildOeHist findOneByCwoFlag(string $cwo_flag) Return the first ChildOeHist filtered by the cwo_flag column
 * @method     ChildOeHist findOneByDivision(string $division) Return the first ChildOeHist filtered by the division column
 * @method     ChildOeHist findOneByTakenCode(string $taken_code) Return the first ChildOeHist filtered by the taken_code column
 * @method     ChildOeHist findOneByPackCode(string $pack_code) Return the first ChildOeHist filtered by the pack_code column
 * @method     ChildOeHist findOneByPickCode(string $pick_code) Return the first ChildOeHist filtered by the pick_code column
 * @method     ChildOeHist findOneByVerifyCode(string $verify_code) Return the first ChildOeHist filtered by the verify_code column
 * @method     ChildOeHist findOneByTotalDiscount(string $total_discount) Return the first ChildOeHist filtered by the total_discount column
 * @method     ChildOeHist findOneByEdiRefererencenbr(string $edi_refererencenbr) Return the first ChildOeHist filtered by the edi_refererencenbr column
 * @method     ChildOeHist findOneByUserCode1(string $user_code1) Return the first ChildOeHist filtered by the user_code1 column
 * @method     ChildOeHist findOneByUserCode2(string $user_code2) Return the first ChildOeHist filtered by the user_code2 column
 * @method     ChildOeHist findOneByUserCode3(string $user_code3) Return the first ChildOeHist filtered by the user_code3 column
 * @method     ChildOeHist findOneByUserCode4(string $user_code4) Return the first ChildOeHist filtered by the user_code4 column
 * @method     ChildOeHist findOneByExchangeCountry(string $exchange_country) Return the first ChildOeHist filtered by the exchange_country column
 * @method     ChildOeHist findOneByExchangeRate(string $exchange_rate) Return the first ChildOeHist filtered by the exchange_rate column
 * @method     ChildOeHist findOneByWeightTotal(string $weight_total) Return the first ChildOeHist filtered by the weight_total column
 * @method     ChildOeHist findOneByWeightOverride(string $weight_override) Return the first ChildOeHist filtered by the weight_override column
 * @method     ChildOeHist findOneByBoxCount(int $box_count) Return the first ChildOeHist filtered by the box_count column
 * @method     ChildOeHist findOneByRequestDate(int $request_date) Return the first ChildOeHist filtered by the request_date column
 * @method     ChildOeHist findOneByCancelDate(int $cancel_date) Return the first ChildOeHist filtered by the cancel_date column
 * @method     ChildOeHist findOneByLockedby(string $lockedby) Return the first ChildOeHist filtered by the lockedby column
 * @method     ChildOeHist findOneByReleaseNumber(string $release_number) Return the first ChildOeHist filtered by the release_number column
 * @method     ChildOeHist findOneByWhse(string $whse) Return the first ChildOeHist filtered by the whse column
 * @method     ChildOeHist findOneByBackorderDate(int $backorder_date) Return the first ChildOeHist filtered by the backorder_date column
 * @method     ChildOeHist findOneByDeptcode(string $deptcode) Return the first ChildOeHist filtered by the deptcode column
 * @method     ChildOeHist findOneByFreightInEntered(string $freight_in_entered) Return the first ChildOeHist filtered by the freight_in_entered column
 * @method     ChildOeHist findOneByDropshipEntered(string $dropship_entered) Return the first ChildOeHist filtered by the dropship_entered column
 * @method     ChildOeHist findOneByErFlag(string $er_flag) Return the first ChildOeHist filtered by the er_flag column
 * @method     ChildOeHist findOneByFreightIn(string $freight_in) Return the first ChildOeHist filtered by the freight_in column
 * @method     ChildOeHist findOneByDropship(string $dropship) Return the first ChildOeHist filtered by the dropship column
 * @method     ChildOeHist findOneByMinorder(string $minorder) Return the first ChildOeHist filtered by the minorder column
 * @method     ChildOeHist findOneByContractTerms(string $contract_terms) Return the first ChildOeHist filtered by the contract_terms column
 * @method     ChildOeHist findOneByDropshipBilled(string $dropship_billed) Return the first ChildOeHist filtered by the dropship_billed column
 * @method     ChildOeHist findOneByOrderType(string $order_type) Return the first ChildOeHist filtered by the order_type column
 * @method     ChildOeHist findOneByTrackingEdinumber(string $tracking_edinumber) Return the first ChildOeHist filtered by the tracking_edinumber column
 * @method     ChildOeHist findOneBySource(string $source) Return the first ChildOeHist filtered by the source column
 * @method     ChildOeHist findOneByPickFormat(string $pick_format) Return the first ChildOeHist filtered by the pick_format column
 * @method     ChildOeHist findOneByInvoiceFormat(string $invoice_format) Return the first ChildOeHist filtered by the invoice_format column
 * @method     ChildOeHist findOneByCashAmount(string $cash_amount) Return the first ChildOeHist filtered by the cash_amount column
 * @method     ChildOeHist findOneByCheckAmount(string $check_amount) Return the first ChildOeHist filtered by the check_amount column
 * @method     ChildOeHist findOneByCheckNumber(string $check_number) Return the first ChildOeHist filtered by the check_number column
 * @method     ChildOeHist findOneByDepositAmount(string $deposit_amount) Return the first ChildOeHist filtered by the deposit_amount column
 * @method     ChildOeHist findOneByDepositNumber(string $deposit_number) Return the first ChildOeHist filtered by the deposit_number column
 * @method     ChildOeHist findOneByOriginalSubtotalTax(string $original_subtotal_tax) Return the first ChildOeHist filtered by the original_subtotal_tax column
 * @method     ChildOeHist findOneByOriginalSubtotalNontax(string $original_subtotal_nontax) Return the first ChildOeHist filtered by the original_subtotal_nontax column
 * @method     ChildOeHist findOneByOriginalTotalTax(string $original_total_tax) Return the first ChildOeHist filtered by the original_total_tax column
 * @method     ChildOeHist findOneByOriginalTotal(string $original_total) Return the first ChildOeHist filtered by the original_total column
 * @method     ChildOeHist findOneByPickPrintdate(int $pick_printdate) Return the first ChildOeHist filtered by the pick_printdate column
 * @method     ChildOeHist findOneByPickPrinttime(int $pick_printtime) Return the first ChildOeHist filtered by the pick_printtime column
 * @method     ChildOeHist findOneByContact(string $contact) Return the first ChildOeHist filtered by the contact column
 * @method     ChildOeHist findOneByPhoneIntl(string $phone_intl) Return the first ChildOeHist filtered by the phone_intl column
 * @method     ChildOeHist findOneByPhoneAccesscode(string $phone_accesscode) Return the first ChildOeHist filtered by the phone_accesscode column
 * @method     ChildOeHist findOneByPhoneCountrycode(string $phone_countrycode) Return the first ChildOeHist filtered by the phone_countrycode column
 * @method     ChildOeHist findOneByPhone(string $phone) Return the first ChildOeHist filtered by the phone column
 * @method     ChildOeHist findOneByPhoneExt(string $phone_ext) Return the first ChildOeHist filtered by the phone_ext column
 * @method     ChildOeHist findOneByFaxIntl(string $fax_intl) Return the first ChildOeHist filtered by the fax_intl column
 * @method     ChildOeHist findOneByFaxAccesscode(string $fax_accesscode) Return the first ChildOeHist filtered by the fax_accesscode column
 * @method     ChildOeHist findOneByFaxCountrycode(string $fax_countrycode) Return the first ChildOeHist filtered by the fax_countrycode column
 * @method     ChildOeHist findOneByFax(string $fax) Return the first ChildOeHist filtered by the fax column
 * @method     ChildOeHist findOneByShipAccount(string $ship_account) Return the first ChildOeHist filtered by the ship_account column
 * @method     ChildOeHist findOneByChangeDue(string $change_due) Return the first ChildOeHist filtered by the change_due column
 * @method     ChildOeHist findOneByDiscountAdditional(string $discount_additional) Return the first ChildOeHist filtered by the discount_additional column
 * @method     ChildOeHist findOneByAllShip(string $all_ship) Return the first ChildOeHist filtered by the all_ship column
 * @method     ChildOeHist findOneByCreditApplied(string $credit_applied) Return the first ChildOeHist filtered by the credit_applied column
 * @method     ChildOeHist findOneByInvoicePrintdate(int $invoice_printdate) Return the first ChildOeHist filtered by the invoice_printdate column
 * @method     ChildOeHist findOneByInvoicePrinttime(int $invoice_printtime) Return the first ChildOeHist filtered by the invoice_printtime column
 * @method     ChildOeHist findOneByDiscountFreight(string $discount_freight) Return the first ChildOeHist filtered by the discount_freight column
 * @method     ChildOeHist findOneByShipCompleteoverride(string $ship_completeoverride) Return the first ChildOeHist filtered by the ship_completeoverride column
 * @method     ChildOeHist findOneByContactEmail(string $contact_email) Return the first ChildOeHist filtered by the contact_email column
 * @method     ChildOeHist findOneByManualFreight(string $manual_freight) Return the first ChildOeHist filtered by the manual_freight column
 * @method     ChildOeHist findOneByInternalFreight(string $internal_freight) Return the first ChildOeHist filtered by the internal_freight column
 * @method     ChildOeHist findOneByCostFreight(string $cost_freight) Return the first ChildOeHist filtered by the cost_freight column
 * @method     ChildOeHist findOneByRoute(string $route) Return the first ChildOeHist filtered by the route column
 * @method     ChildOeHist findOneByRouteSeq(int $route_seq) Return the first ChildOeHist filtered by the route_seq column
 * @method     ChildOeHist findOneByEdi855sent(string $edi_855sent) Return the first ChildOeHist filtered by the edi_855sent column
 * @method     ChildOeHist findOneByFreight3rdparty(string $freight_3rdparty) Return the first ChildOeHist filtered by the freight_3rdparty column
 * @method     ChildOeHist findOneByFob(string $fob) Return the first ChildOeHist filtered by the fob column
 * @method     ChildOeHist findOneByConfirmImage(string $confirm_image) Return the first ChildOeHist filtered by the confirm_image column
 * @method     ChildOeHist findOneByCstkConsign(string $cstk_consign) Return the first ChildOeHist filtered by the cstk_consign column
 * @method     ChildOeHist findOneByManufacturer(string $manufacturer) Return the first ChildOeHist filtered by the manufacturer column
 * @method     ChildOeHist findOneByPickQueue(string $pick_queue) Return the first ChildOeHist filtered by the pick_queue column
 * @method     ChildOeHist findOneByArriveDate(int $arrive_date) Return the first ChildOeHist filtered by the arrive_date column
 * @method     ChildOeHist findOneBySurchargeStatus(string $surcharge_status) Return the first ChildOeHist filtered by the surcharge_status column
 * @method     ChildOeHist findOneByFreightGroup(string $freight_group) Return the first ChildOeHist filtered by the freight_group column
 * @method     ChildOeHist findOneByCommOverride(string $comm_override) Return the first ChildOeHist filtered by the comm_override column
 * @method     ChildOeHist findOneByChargeSplit(string $charge_split) Return the first ChildOeHist filtered by the charge_split column
 * @method     ChildOeHist findOneByCreditcartApproved(string $creditcart_approved) Return the first ChildOeHist filtered by the creditcart_approved column
 * @method     ChildOeHist findOneByOriginalOrdernumber(string $original_ordernumber) Return the first ChildOeHist filtered by the original_ordernumber column
 * @method     ChildOeHist findOneByHasNotes(string $has_notes) Return the first ChildOeHist filtered by the has_notes column
 * @method     ChildOeHist findOneByHasDocuments(string $has_documents) Return the first ChildOeHist filtered by the has_documents column
 * @method     ChildOeHist findOneByHasTracking(string $has_tracking) Return the first ChildOeHist filtered by the has_tracking column
 * @method     ChildOeHist findOneByDate(int $date) Return the first ChildOeHist filtered by the date column
 * @method     ChildOeHist findOneByTime(int $time) Return the first ChildOeHist filtered by the time column
 * @method     ChildOeHist findOneByDummy(string $dummy) Return the first ChildOeHist filtered by the dummy column *

 * @method     ChildOeHist requirePk($key, ConnectionInterface $con = null) Return the ChildOeHist by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOne(ConnectionInterface $con = null) Return the first ChildOeHist matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOeHist requireOneByOrderno(int $orderno) Return the first ChildOeHist filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByStatus(string $status) Return the first ChildOeHist filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByHoldstatus(string $holdstatus) Return the first ChildOeHist filtered by the holdstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCustid(string $custid) Return the first ChildOeHist filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoid(string $shiptoid) Return the first ChildOeHist filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoName(string $shipto_name) Return the first ChildOeHist filtered by the shipto_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoAddress1(string $shipto_address1) Return the first ChildOeHist filtered by the shipto_address1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoAddress2(string $shipto_address2) Return the first ChildOeHist filtered by the shipto_address2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoAddress3(string $shipto_address3) Return the first ChildOeHist filtered by the shipto_address3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoAddress4(string $shipto_address4) Return the first ChildOeHist filtered by the shipto_address4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoCity(string $shipto_city) Return the first ChildOeHist filtered by the shipto_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoState(string $shipto_state) Return the first ChildOeHist filtered by the shipto_state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShiptoZip(string $shipto_zip) Return the first ChildOeHist filtered by the shipto_zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCustpo(string $custpo) Return the first ChildOeHist filtered by the custpo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByOrderdate(int $orderdate) Return the first ChildOeHist filtered by the orderdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTermcode(string $termcode) Return the first ChildOeHist filtered by the termcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShipviacode(string $shipviacode) Return the first ChildOeHist filtered by the shipviacode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByInvoiceNumber(int $invoice_number) Return the first ChildOeHist filtered by the invoice_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByInvoiceDate(int $invoice_date) Return the first ChildOeHist filtered by the invoice_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByGenledgerPeriod(int $genledger_period) Return the first ChildOeHist filtered by the genledger_period column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySalesperson1(string $salesperson_1) Return the first ChildOeHist filtered by the salesperson_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySalesperson1pct(string $salesperson_1pct) Return the first ChildOeHist filtered by the salesperson_1pct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySalesperson2(string $salesperson_2) Return the first ChildOeHist filtered by the salesperson_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySalesperson2pct(string $salesperson_2pct) Return the first ChildOeHist filtered by the salesperson_2pct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySalesperson3(string $salesperson_3) Return the first ChildOeHist filtered by the salesperson_3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySalesperson3pct(string $salesperson_3pct) Return the first ChildOeHist filtered by the salesperson_3pct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByContractNbr(int $contract_nbr) Return the first ChildOeHist filtered by the contract_nbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByBatchNbr(int $batch_nbr) Return the first ChildOeHist filtered by the batch_nbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDropreleasehold(string $dropreleasehold) Return the first ChildOeHist filtered by the dropreleasehold column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySubtotalTax(string $subtotal_tax) Return the first ChildOeHist filtered by the subtotal_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySubtotalNontax(string $subtotal_nontax) Return the first ChildOeHist filtered by the subtotal_nontax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTotalTax(string $total_tax) Return the first ChildOeHist filtered by the total_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTotalFreight(string $total_freight) Return the first ChildOeHist filtered by the total_freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTotalMisc(string $total_misc) Return the first ChildOeHist filtered by the total_misc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTotalOrder(string $total_order) Return the first ChildOeHist filtered by the total_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTotalCost(string $total_cost) Return the first ChildOeHist filtered by the total_cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByLock(string $lock) Return the first ChildOeHist filtered by the lock column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTakenDate(int $taken_date) Return the first ChildOeHist filtered by the taken_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTakenTime(int $taken_time) Return the first ChildOeHist filtered by the taken_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPickDate(int $pick_date) Return the first ChildOeHist filtered by the pick_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPickTime(int $pick_time) Return the first ChildOeHist filtered by the pick_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPackDate(int $pack_date) Return the first ChildOeHist filtered by the pack_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPackTime(int $pack_time) Return the first ChildOeHist filtered by the pack_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByVerifyDate(int $verify_date) Return the first ChildOeHist filtered by the verify_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByVerifyTime(int $verify_time) Return the first ChildOeHist filtered by the verify_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCreditmemo(string $creditmemo) Return the first ChildOeHist filtered by the creditmemo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByBooked(string $booked) Return the first ChildOeHist filtered by the booked column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByOriginalWhse(string $original_whse) Return the first ChildOeHist filtered by the original_whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByBilltoState(string $billto_state) Return the first ChildOeHist filtered by the billto_state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShipcomplete(string $shipcomplete) Return the first ChildOeHist filtered by the shipcomplete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCwoFlag(string $cwo_flag) Return the first ChildOeHist filtered by the cwo_flag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDivision(string $division) Return the first ChildOeHist filtered by the division column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTakenCode(string $taken_code) Return the first ChildOeHist filtered by the taken_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPackCode(string $pack_code) Return the first ChildOeHist filtered by the pack_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPickCode(string $pick_code) Return the first ChildOeHist filtered by the pick_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByVerifyCode(string $verify_code) Return the first ChildOeHist filtered by the verify_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTotalDiscount(string $total_discount) Return the first ChildOeHist filtered by the total_discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByEdiRefererencenbr(string $edi_refererencenbr) Return the first ChildOeHist filtered by the edi_refererencenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByUserCode1(string $user_code1) Return the first ChildOeHist filtered by the user_code1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByUserCode2(string $user_code2) Return the first ChildOeHist filtered by the user_code2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByUserCode3(string $user_code3) Return the first ChildOeHist filtered by the user_code3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByUserCode4(string $user_code4) Return the first ChildOeHist filtered by the user_code4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByExchangeCountry(string $exchange_country) Return the first ChildOeHist filtered by the exchange_country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByExchangeRate(string $exchange_rate) Return the first ChildOeHist filtered by the exchange_rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByWeightTotal(string $weight_total) Return the first ChildOeHist filtered by the weight_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByWeightOverride(string $weight_override) Return the first ChildOeHist filtered by the weight_override column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByBoxCount(int $box_count) Return the first ChildOeHist filtered by the box_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByRequestDate(int $request_date) Return the first ChildOeHist filtered by the request_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCancelDate(int $cancel_date) Return the first ChildOeHist filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByLockedby(string $lockedby) Return the first ChildOeHist filtered by the lockedby column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByReleaseNumber(string $release_number) Return the first ChildOeHist filtered by the release_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByWhse(string $whse) Return the first ChildOeHist filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByBackorderDate(int $backorder_date) Return the first ChildOeHist filtered by the backorder_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDeptcode(string $deptcode) Return the first ChildOeHist filtered by the deptcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFreightInEntered(string $freight_in_entered) Return the first ChildOeHist filtered by the freight_in_entered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDropshipEntered(string $dropship_entered) Return the first ChildOeHist filtered by the dropship_entered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByErFlag(string $er_flag) Return the first ChildOeHist filtered by the er_flag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFreightIn(string $freight_in) Return the first ChildOeHist filtered by the freight_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDropship(string $dropship) Return the first ChildOeHist filtered by the dropship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByMinorder(string $minorder) Return the first ChildOeHist filtered by the minorder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByContractTerms(string $contract_terms) Return the first ChildOeHist filtered by the contract_terms column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDropshipBilled(string $dropship_billed) Return the first ChildOeHist filtered by the dropship_billed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByOrderType(string $order_type) Return the first ChildOeHist filtered by the order_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTrackingEdinumber(string $tracking_edinumber) Return the first ChildOeHist filtered by the tracking_edinumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySource(string $source) Return the first ChildOeHist filtered by the source column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPickFormat(string $pick_format) Return the first ChildOeHist filtered by the pick_format column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByInvoiceFormat(string $invoice_format) Return the first ChildOeHist filtered by the invoice_format column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCashAmount(string $cash_amount) Return the first ChildOeHist filtered by the cash_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCheckAmount(string $check_amount) Return the first ChildOeHist filtered by the check_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCheckNumber(string $check_number) Return the first ChildOeHist filtered by the check_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDepositAmount(string $deposit_amount) Return the first ChildOeHist filtered by the deposit_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDepositNumber(string $deposit_number) Return the first ChildOeHist filtered by the deposit_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByOriginalSubtotalTax(string $original_subtotal_tax) Return the first ChildOeHist filtered by the original_subtotal_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByOriginalSubtotalNontax(string $original_subtotal_nontax) Return the first ChildOeHist filtered by the original_subtotal_nontax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByOriginalTotalTax(string $original_total_tax) Return the first ChildOeHist filtered by the original_total_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByOriginalTotal(string $original_total) Return the first ChildOeHist filtered by the original_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPickPrintdate(int $pick_printdate) Return the first ChildOeHist filtered by the pick_printdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPickPrinttime(int $pick_printtime) Return the first ChildOeHist filtered by the pick_printtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByContact(string $contact) Return the first ChildOeHist filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPhoneIntl(string $phone_intl) Return the first ChildOeHist filtered by the phone_intl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPhoneAccesscode(string $phone_accesscode) Return the first ChildOeHist filtered by the phone_accesscode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPhoneCountrycode(string $phone_countrycode) Return the first ChildOeHist filtered by the phone_countrycode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPhone(string $phone) Return the first ChildOeHist filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPhoneExt(string $phone_ext) Return the first ChildOeHist filtered by the phone_ext column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFaxIntl(string $fax_intl) Return the first ChildOeHist filtered by the fax_intl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFaxAccesscode(string $fax_accesscode) Return the first ChildOeHist filtered by the fax_accesscode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFaxCountrycode(string $fax_countrycode) Return the first ChildOeHist filtered by the fax_countrycode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFax(string $fax) Return the first ChildOeHist filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShipAccount(string $ship_account) Return the first ChildOeHist filtered by the ship_account column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByChangeDue(string $change_due) Return the first ChildOeHist filtered by the change_due column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDiscountAdditional(string $discount_additional) Return the first ChildOeHist filtered by the discount_additional column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByAllShip(string $all_ship) Return the first ChildOeHist filtered by the all_ship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCreditApplied(string $credit_applied) Return the first ChildOeHist filtered by the credit_applied column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByInvoicePrintdate(int $invoice_printdate) Return the first ChildOeHist filtered by the invoice_printdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByInvoicePrinttime(int $invoice_printtime) Return the first ChildOeHist filtered by the invoice_printtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDiscountFreight(string $discount_freight) Return the first ChildOeHist filtered by the discount_freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByShipCompleteoverride(string $ship_completeoverride) Return the first ChildOeHist filtered by the ship_completeoverride column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByContactEmail(string $contact_email) Return the first ChildOeHist filtered by the contact_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByManualFreight(string $manual_freight) Return the first ChildOeHist filtered by the manual_freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByInternalFreight(string $internal_freight) Return the first ChildOeHist filtered by the internal_freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCostFreight(string $cost_freight) Return the first ChildOeHist filtered by the cost_freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByRoute(string $route) Return the first ChildOeHist filtered by the route column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByRouteSeq(int $route_seq) Return the first ChildOeHist filtered by the route_seq column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByEdi855sent(string $edi_855sent) Return the first ChildOeHist filtered by the edi_855sent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFreight3rdparty(string $freight_3rdparty) Return the first ChildOeHist filtered by the freight_3rdparty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFob(string $fob) Return the first ChildOeHist filtered by the fob column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByConfirmImage(string $confirm_image) Return the first ChildOeHist filtered by the confirm_image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCstkConsign(string $cstk_consign) Return the first ChildOeHist filtered by the cstk_consign column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByManufacturer(string $manufacturer) Return the first ChildOeHist filtered by the manufacturer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByPickQueue(string $pick_queue) Return the first ChildOeHist filtered by the pick_queue column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByArriveDate(int $arrive_date) Return the first ChildOeHist filtered by the arrive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneBySurchargeStatus(string $surcharge_status) Return the first ChildOeHist filtered by the surcharge_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByFreightGroup(string $freight_group) Return the first ChildOeHist filtered by the freight_group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCommOverride(string $comm_override) Return the first ChildOeHist filtered by the comm_override column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByChargeSplit(string $charge_split) Return the first ChildOeHist filtered by the charge_split column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByCreditcartApproved(string $creditcart_approved) Return the first ChildOeHist filtered by the creditcart_approved column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByOriginalOrdernumber(string $original_ordernumber) Return the first ChildOeHist filtered by the original_ordernumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByHasNotes(string $has_notes) Return the first ChildOeHist filtered by the has_notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByHasDocuments(string $has_documents) Return the first ChildOeHist filtered by the has_documents column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByHasTracking(string $has_tracking) Return the first ChildOeHist filtered by the has_tracking column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDate(int $date) Return the first ChildOeHist filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByTime(int $time) Return the first ChildOeHist filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOeHist requireOneByDummy(string $dummy) Return the first ChildOeHist filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOeHist[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOeHist objects based on current ModelCriteria
 * @method     ChildOeHist[]|ObjectCollection findByOrderno(int $orderno) Return ChildOeHist objects filtered by the orderno column
 * @method     ChildOeHist[]|ObjectCollection findByStatus(string $status) Return ChildOeHist objects filtered by the status column
 * @method     ChildOeHist[]|ObjectCollection findByHoldstatus(string $holdstatus) Return ChildOeHist objects filtered by the holdstatus column
 * @method     ChildOeHist[]|ObjectCollection findByCustid(string $custid) Return ChildOeHist objects filtered by the custid column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildOeHist objects filtered by the shiptoid column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoName(string $shipto_name) Return ChildOeHist objects filtered by the shipto_name column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoAddress1(string $shipto_address1) Return ChildOeHist objects filtered by the shipto_address1 column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoAddress2(string $shipto_address2) Return ChildOeHist objects filtered by the shipto_address2 column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoAddress3(string $shipto_address3) Return ChildOeHist objects filtered by the shipto_address3 column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoAddress4(string $shipto_address4) Return ChildOeHist objects filtered by the shipto_address4 column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoCity(string $shipto_city) Return ChildOeHist objects filtered by the shipto_city column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoState(string $shipto_state) Return ChildOeHist objects filtered by the shipto_state column
 * @method     ChildOeHist[]|ObjectCollection findByShiptoZip(string $shipto_zip) Return ChildOeHist objects filtered by the shipto_zip column
 * @method     ChildOeHist[]|ObjectCollection findByCustpo(string $custpo) Return ChildOeHist objects filtered by the custpo column
 * @method     ChildOeHist[]|ObjectCollection findByOrderdate(int $orderdate) Return ChildOeHist objects filtered by the orderdate column
 * @method     ChildOeHist[]|ObjectCollection findByTermcode(string $termcode) Return ChildOeHist objects filtered by the termcode column
 * @method     ChildOeHist[]|ObjectCollection findByShipviacode(string $shipviacode) Return ChildOeHist objects filtered by the shipviacode column
 * @method     ChildOeHist[]|ObjectCollection findByInvoiceNumber(int $invoice_number) Return ChildOeHist objects filtered by the invoice_number column
 * @method     ChildOeHist[]|ObjectCollection findByInvoiceDate(int $invoice_date) Return ChildOeHist objects filtered by the invoice_date column
 * @method     ChildOeHist[]|ObjectCollection findByGenledgerPeriod(int $genledger_period) Return ChildOeHist objects filtered by the genledger_period column
 * @method     ChildOeHist[]|ObjectCollection findBySalesperson1(string $salesperson_1) Return ChildOeHist objects filtered by the salesperson_1 column
 * @method     ChildOeHist[]|ObjectCollection findBySalesperson1pct(string $salesperson_1pct) Return ChildOeHist objects filtered by the salesperson_1pct column
 * @method     ChildOeHist[]|ObjectCollection findBySalesperson2(string $salesperson_2) Return ChildOeHist objects filtered by the salesperson_2 column
 * @method     ChildOeHist[]|ObjectCollection findBySalesperson2pct(string $salesperson_2pct) Return ChildOeHist objects filtered by the salesperson_2pct column
 * @method     ChildOeHist[]|ObjectCollection findBySalesperson3(string $salesperson_3) Return ChildOeHist objects filtered by the salesperson_3 column
 * @method     ChildOeHist[]|ObjectCollection findBySalesperson3pct(string $salesperson_3pct) Return ChildOeHist objects filtered by the salesperson_3pct column
 * @method     ChildOeHist[]|ObjectCollection findByContractNbr(int $contract_nbr) Return ChildOeHist objects filtered by the contract_nbr column
 * @method     ChildOeHist[]|ObjectCollection findByBatchNbr(int $batch_nbr) Return ChildOeHist objects filtered by the batch_nbr column
 * @method     ChildOeHist[]|ObjectCollection findByDropreleasehold(string $dropreleasehold) Return ChildOeHist objects filtered by the dropreleasehold column
 * @method     ChildOeHist[]|ObjectCollection findBySubtotalTax(string $subtotal_tax) Return ChildOeHist objects filtered by the subtotal_tax column
 * @method     ChildOeHist[]|ObjectCollection findBySubtotalNontax(string $subtotal_nontax) Return ChildOeHist objects filtered by the subtotal_nontax column
 * @method     ChildOeHist[]|ObjectCollection findByTotalTax(string $total_tax) Return ChildOeHist objects filtered by the total_tax column
 * @method     ChildOeHist[]|ObjectCollection findByTotalFreight(string $total_freight) Return ChildOeHist objects filtered by the total_freight column
 * @method     ChildOeHist[]|ObjectCollection findByTotalMisc(string $total_misc) Return ChildOeHist objects filtered by the total_misc column
 * @method     ChildOeHist[]|ObjectCollection findByTotalOrder(string $total_order) Return ChildOeHist objects filtered by the total_order column
 * @method     ChildOeHist[]|ObjectCollection findByTotalCost(string $total_cost) Return ChildOeHist objects filtered by the total_cost column
 * @method     ChildOeHist[]|ObjectCollection findByLock(string $lock) Return ChildOeHist objects filtered by the lock column
 * @method     ChildOeHist[]|ObjectCollection findByTakenDate(int $taken_date) Return ChildOeHist objects filtered by the taken_date column
 * @method     ChildOeHist[]|ObjectCollection findByTakenTime(int $taken_time) Return ChildOeHist objects filtered by the taken_time column
 * @method     ChildOeHist[]|ObjectCollection findByPickDate(int $pick_date) Return ChildOeHist objects filtered by the pick_date column
 * @method     ChildOeHist[]|ObjectCollection findByPickTime(int $pick_time) Return ChildOeHist objects filtered by the pick_time column
 * @method     ChildOeHist[]|ObjectCollection findByPackDate(int $pack_date) Return ChildOeHist objects filtered by the pack_date column
 * @method     ChildOeHist[]|ObjectCollection findByPackTime(int $pack_time) Return ChildOeHist objects filtered by the pack_time column
 * @method     ChildOeHist[]|ObjectCollection findByVerifyDate(int $verify_date) Return ChildOeHist objects filtered by the verify_date column
 * @method     ChildOeHist[]|ObjectCollection findByVerifyTime(int $verify_time) Return ChildOeHist objects filtered by the verify_time column
 * @method     ChildOeHist[]|ObjectCollection findByCreditmemo(string $creditmemo) Return ChildOeHist objects filtered by the creditmemo column
 * @method     ChildOeHist[]|ObjectCollection findByBooked(string $booked) Return ChildOeHist objects filtered by the booked column
 * @method     ChildOeHist[]|ObjectCollection findByOriginalWhse(string $original_whse) Return ChildOeHist objects filtered by the original_whse column
 * @method     ChildOeHist[]|ObjectCollection findByBilltoState(string $billto_state) Return ChildOeHist objects filtered by the billto_state column
 * @method     ChildOeHist[]|ObjectCollection findByShipcomplete(string $shipcomplete) Return ChildOeHist objects filtered by the shipcomplete column
 * @method     ChildOeHist[]|ObjectCollection findByCwoFlag(string $cwo_flag) Return ChildOeHist objects filtered by the cwo_flag column
 * @method     ChildOeHist[]|ObjectCollection findByDivision(string $division) Return ChildOeHist objects filtered by the division column
 * @method     ChildOeHist[]|ObjectCollection findByTakenCode(string $taken_code) Return ChildOeHist objects filtered by the taken_code column
 * @method     ChildOeHist[]|ObjectCollection findByPackCode(string $pack_code) Return ChildOeHist objects filtered by the pack_code column
 * @method     ChildOeHist[]|ObjectCollection findByPickCode(string $pick_code) Return ChildOeHist objects filtered by the pick_code column
 * @method     ChildOeHist[]|ObjectCollection findByVerifyCode(string $verify_code) Return ChildOeHist objects filtered by the verify_code column
 * @method     ChildOeHist[]|ObjectCollection findByTotalDiscount(string $total_discount) Return ChildOeHist objects filtered by the total_discount column
 * @method     ChildOeHist[]|ObjectCollection findByEdiRefererencenbr(string $edi_refererencenbr) Return ChildOeHist objects filtered by the edi_refererencenbr column
 * @method     ChildOeHist[]|ObjectCollection findByUserCode1(string $user_code1) Return ChildOeHist objects filtered by the user_code1 column
 * @method     ChildOeHist[]|ObjectCollection findByUserCode2(string $user_code2) Return ChildOeHist objects filtered by the user_code2 column
 * @method     ChildOeHist[]|ObjectCollection findByUserCode3(string $user_code3) Return ChildOeHist objects filtered by the user_code3 column
 * @method     ChildOeHist[]|ObjectCollection findByUserCode4(string $user_code4) Return ChildOeHist objects filtered by the user_code4 column
 * @method     ChildOeHist[]|ObjectCollection findByExchangeCountry(string $exchange_country) Return ChildOeHist objects filtered by the exchange_country column
 * @method     ChildOeHist[]|ObjectCollection findByExchangeRate(string $exchange_rate) Return ChildOeHist objects filtered by the exchange_rate column
 * @method     ChildOeHist[]|ObjectCollection findByWeightTotal(string $weight_total) Return ChildOeHist objects filtered by the weight_total column
 * @method     ChildOeHist[]|ObjectCollection findByWeightOverride(string $weight_override) Return ChildOeHist objects filtered by the weight_override column
 * @method     ChildOeHist[]|ObjectCollection findByBoxCount(int $box_count) Return ChildOeHist objects filtered by the box_count column
 * @method     ChildOeHist[]|ObjectCollection findByRequestDate(int $request_date) Return ChildOeHist objects filtered by the request_date column
 * @method     ChildOeHist[]|ObjectCollection findByCancelDate(int $cancel_date) Return ChildOeHist objects filtered by the cancel_date column
 * @method     ChildOeHist[]|ObjectCollection findByLockedby(string $lockedby) Return ChildOeHist objects filtered by the lockedby column
 * @method     ChildOeHist[]|ObjectCollection findByReleaseNumber(string $release_number) Return ChildOeHist objects filtered by the release_number column
 * @method     ChildOeHist[]|ObjectCollection findByWhse(string $whse) Return ChildOeHist objects filtered by the whse column
 * @method     ChildOeHist[]|ObjectCollection findByBackorderDate(int $backorder_date) Return ChildOeHist objects filtered by the backorder_date column
 * @method     ChildOeHist[]|ObjectCollection findByDeptcode(string $deptcode) Return ChildOeHist objects filtered by the deptcode column
 * @method     ChildOeHist[]|ObjectCollection findByFreightInEntered(string $freight_in_entered) Return ChildOeHist objects filtered by the freight_in_entered column
 * @method     ChildOeHist[]|ObjectCollection findByDropshipEntered(string $dropship_entered) Return ChildOeHist objects filtered by the dropship_entered column
 * @method     ChildOeHist[]|ObjectCollection findByErFlag(string $er_flag) Return ChildOeHist objects filtered by the er_flag column
 * @method     ChildOeHist[]|ObjectCollection findByFreightIn(string $freight_in) Return ChildOeHist objects filtered by the freight_in column
 * @method     ChildOeHist[]|ObjectCollection findByDropship(string $dropship) Return ChildOeHist objects filtered by the dropship column
 * @method     ChildOeHist[]|ObjectCollection findByMinorder(string $minorder) Return ChildOeHist objects filtered by the minorder column
 * @method     ChildOeHist[]|ObjectCollection findByContractTerms(string $contract_terms) Return ChildOeHist objects filtered by the contract_terms column
 * @method     ChildOeHist[]|ObjectCollection findByDropshipBilled(string $dropship_billed) Return ChildOeHist objects filtered by the dropship_billed column
 * @method     ChildOeHist[]|ObjectCollection findByOrderType(string $order_type) Return ChildOeHist objects filtered by the order_type column
 * @method     ChildOeHist[]|ObjectCollection findByTrackingEdinumber(string $tracking_edinumber) Return ChildOeHist objects filtered by the tracking_edinumber column
 * @method     ChildOeHist[]|ObjectCollection findBySource(string $source) Return ChildOeHist objects filtered by the source column
 * @method     ChildOeHist[]|ObjectCollection findByPickFormat(string $pick_format) Return ChildOeHist objects filtered by the pick_format column
 * @method     ChildOeHist[]|ObjectCollection findByInvoiceFormat(string $invoice_format) Return ChildOeHist objects filtered by the invoice_format column
 * @method     ChildOeHist[]|ObjectCollection findByCashAmount(string $cash_amount) Return ChildOeHist objects filtered by the cash_amount column
 * @method     ChildOeHist[]|ObjectCollection findByCheckAmount(string $check_amount) Return ChildOeHist objects filtered by the check_amount column
 * @method     ChildOeHist[]|ObjectCollection findByCheckNumber(string $check_number) Return ChildOeHist objects filtered by the check_number column
 * @method     ChildOeHist[]|ObjectCollection findByDepositAmount(string $deposit_amount) Return ChildOeHist objects filtered by the deposit_amount column
 * @method     ChildOeHist[]|ObjectCollection findByDepositNumber(string $deposit_number) Return ChildOeHist objects filtered by the deposit_number column
 * @method     ChildOeHist[]|ObjectCollection findByOriginalSubtotalTax(string $original_subtotal_tax) Return ChildOeHist objects filtered by the original_subtotal_tax column
 * @method     ChildOeHist[]|ObjectCollection findByOriginalSubtotalNontax(string $original_subtotal_nontax) Return ChildOeHist objects filtered by the original_subtotal_nontax column
 * @method     ChildOeHist[]|ObjectCollection findByOriginalTotalTax(string $original_total_tax) Return ChildOeHist objects filtered by the original_total_tax column
 * @method     ChildOeHist[]|ObjectCollection findByOriginalTotal(string $original_total) Return ChildOeHist objects filtered by the original_total column
 * @method     ChildOeHist[]|ObjectCollection findByPickPrintdate(int $pick_printdate) Return ChildOeHist objects filtered by the pick_printdate column
 * @method     ChildOeHist[]|ObjectCollection findByPickPrinttime(int $pick_printtime) Return ChildOeHist objects filtered by the pick_printtime column
 * @method     ChildOeHist[]|ObjectCollection findByContact(string $contact) Return ChildOeHist objects filtered by the contact column
 * @method     ChildOeHist[]|ObjectCollection findByPhoneIntl(string $phone_intl) Return ChildOeHist objects filtered by the phone_intl column
 * @method     ChildOeHist[]|ObjectCollection findByPhoneAccesscode(string $phone_accesscode) Return ChildOeHist objects filtered by the phone_accesscode column
 * @method     ChildOeHist[]|ObjectCollection findByPhoneCountrycode(string $phone_countrycode) Return ChildOeHist objects filtered by the phone_countrycode column
 * @method     ChildOeHist[]|ObjectCollection findByPhone(string $phone) Return ChildOeHist objects filtered by the phone column
 * @method     ChildOeHist[]|ObjectCollection findByPhoneExt(string $phone_ext) Return ChildOeHist objects filtered by the phone_ext column
 * @method     ChildOeHist[]|ObjectCollection findByFaxIntl(string $fax_intl) Return ChildOeHist objects filtered by the fax_intl column
 * @method     ChildOeHist[]|ObjectCollection findByFaxAccesscode(string $fax_accesscode) Return ChildOeHist objects filtered by the fax_accesscode column
 * @method     ChildOeHist[]|ObjectCollection findByFaxCountrycode(string $fax_countrycode) Return ChildOeHist objects filtered by the fax_countrycode column
 * @method     ChildOeHist[]|ObjectCollection findByFax(string $fax) Return ChildOeHist objects filtered by the fax column
 * @method     ChildOeHist[]|ObjectCollection findByShipAccount(string $ship_account) Return ChildOeHist objects filtered by the ship_account column
 * @method     ChildOeHist[]|ObjectCollection findByChangeDue(string $change_due) Return ChildOeHist objects filtered by the change_due column
 * @method     ChildOeHist[]|ObjectCollection findByDiscountAdditional(string $discount_additional) Return ChildOeHist objects filtered by the discount_additional column
 * @method     ChildOeHist[]|ObjectCollection findByAllShip(string $all_ship) Return ChildOeHist objects filtered by the all_ship column
 * @method     ChildOeHist[]|ObjectCollection findByCreditApplied(string $credit_applied) Return ChildOeHist objects filtered by the credit_applied column
 * @method     ChildOeHist[]|ObjectCollection findByInvoicePrintdate(int $invoice_printdate) Return ChildOeHist objects filtered by the invoice_printdate column
 * @method     ChildOeHist[]|ObjectCollection findByInvoicePrinttime(int $invoice_printtime) Return ChildOeHist objects filtered by the invoice_printtime column
 * @method     ChildOeHist[]|ObjectCollection findByDiscountFreight(string $discount_freight) Return ChildOeHist objects filtered by the discount_freight column
 * @method     ChildOeHist[]|ObjectCollection findByShipCompleteoverride(string $ship_completeoverride) Return ChildOeHist objects filtered by the ship_completeoverride column
 * @method     ChildOeHist[]|ObjectCollection findByContactEmail(string $contact_email) Return ChildOeHist objects filtered by the contact_email column
 * @method     ChildOeHist[]|ObjectCollection findByManualFreight(string $manual_freight) Return ChildOeHist objects filtered by the manual_freight column
 * @method     ChildOeHist[]|ObjectCollection findByInternalFreight(string $internal_freight) Return ChildOeHist objects filtered by the internal_freight column
 * @method     ChildOeHist[]|ObjectCollection findByCostFreight(string $cost_freight) Return ChildOeHist objects filtered by the cost_freight column
 * @method     ChildOeHist[]|ObjectCollection findByRoute(string $route) Return ChildOeHist objects filtered by the route column
 * @method     ChildOeHist[]|ObjectCollection findByRouteSeq(int $route_seq) Return ChildOeHist objects filtered by the route_seq column
 * @method     ChildOeHist[]|ObjectCollection findByEdi855sent(string $edi_855sent) Return ChildOeHist objects filtered by the edi_855sent column
 * @method     ChildOeHist[]|ObjectCollection findByFreight3rdparty(string $freight_3rdparty) Return ChildOeHist objects filtered by the freight_3rdparty column
 * @method     ChildOeHist[]|ObjectCollection findByFob(string $fob) Return ChildOeHist objects filtered by the fob column
 * @method     ChildOeHist[]|ObjectCollection findByConfirmImage(string $confirm_image) Return ChildOeHist objects filtered by the confirm_image column
 * @method     ChildOeHist[]|ObjectCollection findByCstkConsign(string $cstk_consign) Return ChildOeHist objects filtered by the cstk_consign column
 * @method     ChildOeHist[]|ObjectCollection findByManufacturer(string $manufacturer) Return ChildOeHist objects filtered by the manufacturer column
 * @method     ChildOeHist[]|ObjectCollection findByPickQueue(string $pick_queue) Return ChildOeHist objects filtered by the pick_queue column
 * @method     ChildOeHist[]|ObjectCollection findByArriveDate(int $arrive_date) Return ChildOeHist objects filtered by the arrive_date column
 * @method     ChildOeHist[]|ObjectCollection findBySurchargeStatus(string $surcharge_status) Return ChildOeHist objects filtered by the surcharge_status column
 * @method     ChildOeHist[]|ObjectCollection findByFreightGroup(string $freight_group) Return ChildOeHist objects filtered by the freight_group column
 * @method     ChildOeHist[]|ObjectCollection findByCommOverride(string $comm_override) Return ChildOeHist objects filtered by the comm_override column
 * @method     ChildOeHist[]|ObjectCollection findByChargeSplit(string $charge_split) Return ChildOeHist objects filtered by the charge_split column
 * @method     ChildOeHist[]|ObjectCollection findByCreditcartApproved(string $creditcart_approved) Return ChildOeHist objects filtered by the creditcart_approved column
 * @method     ChildOeHist[]|ObjectCollection findByOriginalOrdernumber(string $original_ordernumber) Return ChildOeHist objects filtered by the original_ordernumber column
 * @method     ChildOeHist[]|ObjectCollection findByHasNotes(string $has_notes) Return ChildOeHist objects filtered by the has_notes column
 * @method     ChildOeHist[]|ObjectCollection findByHasDocuments(string $has_documents) Return ChildOeHist objects filtered by the has_documents column
 * @method     ChildOeHist[]|ObjectCollection findByHasTracking(string $has_tracking) Return ChildOeHist objects filtered by the has_tracking column
 * @method     ChildOeHist[]|ObjectCollection findByDate(int $date) Return ChildOeHist objects filtered by the date column
 * @method     ChildOeHist[]|ObjectCollection findByTime(int $time) Return ChildOeHist objects filtered by the time column
 * @method     ChildOeHist[]|ObjectCollection findByDummy(string $dummy) Return ChildOeHist objects filtered by the dummy column
 * @method     ChildOeHist[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OeHistQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OeHistQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\OeHist', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOeHistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOeHistQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOeHistQuery) {
            return $criteria;
        }
        $query = new ChildOeHistQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOeHist|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OeHistTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OeHistTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOeHist A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT orderno, status, holdstatus, custid, shiptoid, shipto_name, shipto_address1, shipto_address2, shipto_address3, shipto_address4, shipto_city, shipto_state, shipto_zip, custpo, orderdate, termcode, shipviacode, invoice_number, invoice_date, genledger_period, salesperson_1, salesperson_1pct, salesperson_2, salesperson_2pct, salesperson_3, salesperson_3pct, contract_nbr, batch_nbr, dropreleasehold, subtotal_tax, subtotal_nontax, total_tax, total_freight, total_misc, total_order, total_cost, lock, taken_date, taken_time, pick_date, pick_time, pack_date, pack_time, verify_date, verify_time, creditmemo, booked, original_whse, billto_state, shipcomplete, cwo_flag, division, taken_code, pack_code, pick_code, verify_code, total_discount, edi_refererencenbr, user_code1, user_code2, user_code3, user_code4, exchange_country, exchange_rate, weight_total, weight_override, box_count, request_date, cancel_date, lockedby, release_number, whse, backorder_date, deptcode, freight_in_entered, dropship_entered, er_flag, freight_in, dropship, minorder, contract_terms, dropship_billed, order_type, tracking_edinumber, source, pick_format, invoice_format, cash_amount, check_amount, check_number, deposit_amount, deposit_number, original_subtotal_tax, original_subtotal_nontax, original_total_tax, original_total, pick_printdate, pick_printtime, contact, phone_intl, phone_accesscode, phone_countrycode, phone, phone_ext, fax_intl, fax_accesscode, fax_countrycode, fax, ship_account, change_due, discount_additional, all_ship, credit_applied, invoice_printdate, invoice_printtime, discount_freight, ship_completeoverride, contact_email, manual_freight, internal_freight, cost_freight, route, route_seq, edi_855sent, freight_3rdparty, fob, confirm_image, cstk_consign, manufacturer, pick_queue, arrive_date, surcharge_status, freight_group, comm_override, charge_split, creditcart_approved, original_ordernumber, has_notes, has_documents, has_tracking, date, time, dummy FROM oe_hist WHERE orderno = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOeHist $obj */
            $obj = new ChildOeHist();
            $obj->hydrate($row);
            OeHistTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildOeHist|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OeHistTableMap::COL_ORDERNO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OeHistTableMap::COL_ORDERNO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the orderno column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderno(1234); // WHERE orderno = 1234
     * $query->filterByOrderno(array(12, 34)); // WHERE orderno IN (12, 34)
     * $query->filterByOrderno(array('min' => 12)); // WHERE orderno > 12
     * </code>
     *
     * @param     mixed $orderno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (is_array($orderno)) {
            $useMinMax = false;
            if (isset($orderno['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORDERNO, $orderno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderno['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORDERNO, $orderno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORDERNO, $orderno, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the holdstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByHoldstatus('fooValue');   // WHERE holdstatus = 'fooValue'
     * $query->filterByHoldstatus('%fooValue%', Criteria::LIKE); // WHERE holdstatus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $holdstatus The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByHoldstatus($holdstatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($holdstatus)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_HOLDSTATUS, $holdstatus, $comparison);
    }

    /**
     * Filter the query on the custid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustid('fooValue');   // WHERE custid = 'fooValue'
     * $query->filterByCustid('%fooValue%', Criteria::LIKE); // WHERE custid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CUSTID, $custid, $comparison);
    }

    /**
     * Filter the query on the shiptoid column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoid('fooValue');   // WHERE shiptoid = 'fooValue'
     * $query->filterByShiptoid('%fooValue%', Criteria::LIKE); // WHERE shiptoid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the shipto_name column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoName('fooValue');   // WHERE shipto_name = 'fooValue'
     * $query->filterByShiptoName('%fooValue%', Criteria::LIKE); // WHERE shipto_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoName($shiptoName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTO_NAME, $shiptoName, $comparison);
    }

    /**
     * Filter the query on the shipto_address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoAddress1('fooValue');   // WHERE shipto_address1 = 'fooValue'
     * $query->filterByShiptoAddress1('%fooValue%', Criteria::LIKE); // WHERE shipto_address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoAddress1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoAddress1($shiptoAddress1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoAddress1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTO_ADDRESS1, $shiptoAddress1, $comparison);
    }

    /**
     * Filter the query on the shipto_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoAddress2('fooValue');   // WHERE shipto_address2 = 'fooValue'
     * $query->filterByShiptoAddress2('%fooValue%', Criteria::LIKE); // WHERE shipto_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoAddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoAddress2($shiptoAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoAddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTO_ADDRESS2, $shiptoAddress2, $comparison);
    }

    /**
     * Filter the query on the shipto_address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoAddress3('fooValue');   // WHERE shipto_address3 = 'fooValue'
     * $query->filterByShiptoAddress3('%fooValue%', Criteria::LIKE); // WHERE shipto_address3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoAddress3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoAddress3($shiptoAddress3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoAddress3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTO_ADDRESS3, $shiptoAddress3, $comparison);
    }

    /**
     * Filter the query on the shipto_address4 column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoAddress4('fooValue');   // WHERE shipto_address4 = 'fooValue'
     * $query->filterByShiptoAddress4('%fooValue%', Criteria::LIKE); // WHERE shipto_address4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoAddress4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoAddress4($shiptoAddress4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoAddress4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTO_ADDRESS4, $shiptoAddress4, $comparison);
    }

    /**
     * Filter the query on the shipto_city column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoCity('fooValue');   // WHERE shipto_city = 'fooValue'
     * $query->filterByShiptoCity('%fooValue%', Criteria::LIKE); // WHERE shipto_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoCity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoCity($shiptoCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoCity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTO_CITY, $shiptoCity, $comparison);
    }

    /**
     * Filter the query on the shipto_state column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoState('fooValue');   // WHERE shipto_state = 'fooValue'
     * $query->filterByShiptoState('%fooValue%', Criteria::LIKE); // WHERE shipto_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoState The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoState($shiptoState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoState)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTO_STATE, $shiptoState, $comparison);
    }

    /**
     * Filter the query on the shipto_zip column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoZip('fooValue');   // WHERE shipto_zip = 'fooValue'
     * $query->filterByShiptoZip('%fooValue%', Criteria::LIKE); // WHERE shipto_zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoZip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShiptoZip($shiptoZip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoZip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPTO_ZIP, $shiptoZip, $comparison);
    }

    /**
     * Filter the query on the custpo column
     *
     * Example usage:
     * <code>
     * $query->filterByCustpo('fooValue');   // WHERE custpo = 'fooValue'
     * $query->filterByCustpo('%fooValue%', Criteria::LIKE); // WHERE custpo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custpo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCustpo($custpo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custpo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CUSTPO, $custpo, $comparison);
    }

    /**
     * Filter the query on the orderdate column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderdate(1234); // WHERE orderdate = 1234
     * $query->filterByOrderdate(array(12, 34)); // WHERE orderdate IN (12, 34)
     * $query->filterByOrderdate(array('min' => 12)); // WHERE orderdate > 12
     * </code>
     *
     * @param     mixed $orderdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOrderdate($orderdate = null, $comparison = null)
    {
        if (is_array($orderdate)) {
            $useMinMax = false;
            if (isset($orderdate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORDERDATE, $orderdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderdate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORDERDATE, $orderdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORDERDATE, $orderdate, $comparison);
    }

    /**
     * Filter the query on the termcode column
     *
     * Example usage:
     * <code>
     * $query->filterByTermcode('fooValue');   // WHERE termcode = 'fooValue'
     * $query->filterByTermcode('%fooValue%', Criteria::LIKE); // WHERE termcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTermcode($termcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TERMCODE, $termcode, $comparison);
    }

    /**
     * Filter the query on the shipviacode column
     *
     * Example usage:
     * <code>
     * $query->filterByShipviacode('fooValue');   // WHERE shipviacode = 'fooValue'
     * $query->filterByShipviacode('%fooValue%', Criteria::LIKE); // WHERE shipviacode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipviacode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShipviacode($shipviacode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviacode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPVIACODE, $shipviacode, $comparison);
    }

    /**
     * Filter the query on the invoice_number column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoiceNumber(1234); // WHERE invoice_number = 1234
     * $query->filterByInvoiceNumber(array(12, 34)); // WHERE invoice_number IN (12, 34)
     * $query->filterByInvoiceNumber(array('min' => 12)); // WHERE invoice_number > 12
     * </code>
     *
     * @param     mixed $invoiceNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByInvoiceNumber($invoiceNumber = null, $comparison = null)
    {
        if (is_array($invoiceNumber)) {
            $useMinMax = false;
            if (isset($invoiceNumber['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_INVOICE_NUMBER, $invoiceNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invoiceNumber['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_INVOICE_NUMBER, $invoiceNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_INVOICE_NUMBER, $invoiceNumber, $comparison);
    }

    /**
     * Filter the query on the invoice_date column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoiceDate(1234); // WHERE invoice_date = 1234
     * $query->filterByInvoiceDate(array(12, 34)); // WHERE invoice_date IN (12, 34)
     * $query->filterByInvoiceDate(array('min' => 12)); // WHERE invoice_date > 12
     * </code>
     *
     * @param     mixed $invoiceDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByInvoiceDate($invoiceDate = null, $comparison = null)
    {
        if (is_array($invoiceDate)) {
            $useMinMax = false;
            if (isset($invoiceDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_INVOICE_DATE, $invoiceDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invoiceDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_INVOICE_DATE, $invoiceDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_INVOICE_DATE, $invoiceDate, $comparison);
    }

    /**
     * Filter the query on the genledger_period column
     *
     * Example usage:
     * <code>
     * $query->filterByGenledgerPeriod(1234); // WHERE genledger_period = 1234
     * $query->filterByGenledgerPeriod(array(12, 34)); // WHERE genledger_period IN (12, 34)
     * $query->filterByGenledgerPeriod(array('min' => 12)); // WHERE genledger_period > 12
     * </code>
     *
     * @param     mixed $genledgerPeriod The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByGenledgerPeriod($genledgerPeriod = null, $comparison = null)
    {
        if (is_array($genledgerPeriod)) {
            $useMinMax = false;
            if (isset($genledgerPeriod['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_GENLEDGER_PERIOD, $genledgerPeriod['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($genledgerPeriod['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_GENLEDGER_PERIOD, $genledgerPeriod['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_GENLEDGER_PERIOD, $genledgerPeriod, $comparison);
    }

    /**
     * Filter the query on the salesperson_1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesperson1('fooValue');   // WHERE salesperson_1 = 'fooValue'
     * $query->filterBySalesperson1('%fooValue%', Criteria::LIKE); // WHERE salesperson_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salesperson1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySalesperson1($salesperson1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesperson1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_1, $salesperson1, $comparison);
    }

    /**
     * Filter the query on the salesperson_1pct column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesperson1pct(1234); // WHERE salesperson_1pct = 1234
     * $query->filterBySalesperson1pct(array(12, 34)); // WHERE salesperson_1pct IN (12, 34)
     * $query->filterBySalesperson1pct(array('min' => 12)); // WHERE salesperson_1pct > 12
     * </code>
     *
     * @param     mixed $salesperson1pct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySalesperson1pct($salesperson1pct = null, $comparison = null)
    {
        if (is_array($salesperson1pct)) {
            $useMinMax = false;
            if (isset($salesperson1pct['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_1PCT, $salesperson1pct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesperson1pct['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_1PCT, $salesperson1pct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_1PCT, $salesperson1pct, $comparison);
    }

    /**
     * Filter the query on the salesperson_2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesperson2('fooValue');   // WHERE salesperson_2 = 'fooValue'
     * $query->filterBySalesperson2('%fooValue%', Criteria::LIKE); // WHERE salesperson_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salesperson2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySalesperson2($salesperson2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesperson2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_2, $salesperson2, $comparison);
    }

    /**
     * Filter the query on the salesperson_2pct column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesperson2pct(1234); // WHERE salesperson_2pct = 1234
     * $query->filterBySalesperson2pct(array(12, 34)); // WHERE salesperson_2pct IN (12, 34)
     * $query->filterBySalesperson2pct(array('min' => 12)); // WHERE salesperson_2pct > 12
     * </code>
     *
     * @param     mixed $salesperson2pct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySalesperson2pct($salesperson2pct = null, $comparison = null)
    {
        if (is_array($salesperson2pct)) {
            $useMinMax = false;
            if (isset($salesperson2pct['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_2PCT, $salesperson2pct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesperson2pct['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_2PCT, $salesperson2pct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_2PCT, $salesperson2pct, $comparison);
    }

    /**
     * Filter the query on the salesperson_3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesperson3('fooValue');   // WHERE salesperson_3 = 'fooValue'
     * $query->filterBySalesperson3('%fooValue%', Criteria::LIKE); // WHERE salesperson_3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salesperson3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySalesperson3($salesperson3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesperson3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_3, $salesperson3, $comparison);
    }

    /**
     * Filter the query on the salesperson_3pct column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesperson3pct(1234); // WHERE salesperson_3pct = 1234
     * $query->filterBySalesperson3pct(array(12, 34)); // WHERE salesperson_3pct IN (12, 34)
     * $query->filterBySalesperson3pct(array('min' => 12)); // WHERE salesperson_3pct > 12
     * </code>
     *
     * @param     mixed $salesperson3pct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySalesperson3pct($salesperson3pct = null, $comparison = null)
    {
        if (is_array($salesperson3pct)) {
            $useMinMax = false;
            if (isset($salesperson3pct['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_3PCT, $salesperson3pct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesperson3pct['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_3PCT, $salesperson3pct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SALESPERSON_3PCT, $salesperson3pct, $comparison);
    }

    /**
     * Filter the query on the contract_nbr column
     *
     * Example usage:
     * <code>
     * $query->filterByContractNbr(1234); // WHERE contract_nbr = 1234
     * $query->filterByContractNbr(array(12, 34)); // WHERE contract_nbr IN (12, 34)
     * $query->filterByContractNbr(array('min' => 12)); // WHERE contract_nbr > 12
     * </code>
     *
     * @param     mixed $contractNbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByContractNbr($contractNbr = null, $comparison = null)
    {
        if (is_array($contractNbr)) {
            $useMinMax = false;
            if (isset($contractNbr['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CONTRACT_NBR, $contractNbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contractNbr['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CONTRACT_NBR, $contractNbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CONTRACT_NBR, $contractNbr, $comparison);
    }

    /**
     * Filter the query on the batch_nbr column
     *
     * Example usage:
     * <code>
     * $query->filterByBatchNbr(1234); // WHERE batch_nbr = 1234
     * $query->filterByBatchNbr(array(12, 34)); // WHERE batch_nbr IN (12, 34)
     * $query->filterByBatchNbr(array('min' => 12)); // WHERE batch_nbr > 12
     * </code>
     *
     * @param     mixed $batchNbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByBatchNbr($batchNbr = null, $comparison = null)
    {
        if (is_array($batchNbr)) {
            $useMinMax = false;
            if (isset($batchNbr['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_BATCH_NBR, $batchNbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($batchNbr['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_BATCH_NBR, $batchNbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_BATCH_NBR, $batchNbr, $comparison);
    }

    /**
     * Filter the query on the dropreleasehold column
     *
     * Example usage:
     * <code>
     * $query->filterByDropreleasehold('fooValue');   // WHERE dropreleasehold = 'fooValue'
     * $query->filterByDropreleasehold('%fooValue%', Criteria::LIKE); // WHERE dropreleasehold LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dropreleasehold The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDropreleasehold($dropreleasehold = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dropreleasehold)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DROPRELEASEHOLD, $dropreleasehold, $comparison);
    }

    /**
     * Filter the query on the subtotal_tax column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtotalTax(1234); // WHERE subtotal_tax = 1234
     * $query->filterBySubtotalTax(array(12, 34)); // WHERE subtotal_tax IN (12, 34)
     * $query->filterBySubtotalTax(array('min' => 12)); // WHERE subtotal_tax > 12
     * </code>
     *
     * @param     mixed $subtotalTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySubtotalTax($subtotalTax = null, $comparison = null)
    {
        if (is_array($subtotalTax)) {
            $useMinMax = false;
            if (isset($subtotalTax['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SUBTOTAL_TAX, $subtotalTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subtotalTax['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SUBTOTAL_TAX, $subtotalTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SUBTOTAL_TAX, $subtotalTax, $comparison);
    }

    /**
     * Filter the query on the subtotal_nontax column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtotalNontax(1234); // WHERE subtotal_nontax = 1234
     * $query->filterBySubtotalNontax(array(12, 34)); // WHERE subtotal_nontax IN (12, 34)
     * $query->filterBySubtotalNontax(array('min' => 12)); // WHERE subtotal_nontax > 12
     * </code>
     *
     * @param     mixed $subtotalNontax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySubtotalNontax($subtotalNontax = null, $comparison = null)
    {
        if (is_array($subtotalNontax)) {
            $useMinMax = false;
            if (isset($subtotalNontax['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SUBTOTAL_NONTAX, $subtotalNontax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subtotalNontax['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_SUBTOTAL_NONTAX, $subtotalNontax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SUBTOTAL_NONTAX, $subtotalNontax, $comparison);
    }

    /**
     * Filter the query on the total_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalTax(1234); // WHERE total_tax = 1234
     * $query->filterByTotalTax(array(12, 34)); // WHERE total_tax IN (12, 34)
     * $query->filterByTotalTax(array('min' => 12)); // WHERE total_tax > 12
     * </code>
     *
     * @param     mixed $totalTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTotalTax($totalTax = null, $comparison = null)
    {
        if (is_array($totalTax)) {
            $useMinMax = false;
            if (isset($totalTax['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_TAX, $totalTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalTax['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_TAX, $totalTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TOTAL_TAX, $totalTax, $comparison);
    }

    /**
     * Filter the query on the total_freight column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalFreight(1234); // WHERE total_freight = 1234
     * $query->filterByTotalFreight(array(12, 34)); // WHERE total_freight IN (12, 34)
     * $query->filterByTotalFreight(array('min' => 12)); // WHERE total_freight > 12
     * </code>
     *
     * @param     mixed $totalFreight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTotalFreight($totalFreight = null, $comparison = null)
    {
        if (is_array($totalFreight)) {
            $useMinMax = false;
            if (isset($totalFreight['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_FREIGHT, $totalFreight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalFreight['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_FREIGHT, $totalFreight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TOTAL_FREIGHT, $totalFreight, $comparison);
    }

    /**
     * Filter the query on the total_misc column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalMisc(1234); // WHERE total_misc = 1234
     * $query->filterByTotalMisc(array(12, 34)); // WHERE total_misc IN (12, 34)
     * $query->filterByTotalMisc(array('min' => 12)); // WHERE total_misc > 12
     * </code>
     *
     * @param     mixed $totalMisc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTotalMisc($totalMisc = null, $comparison = null)
    {
        if (is_array($totalMisc)) {
            $useMinMax = false;
            if (isset($totalMisc['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_MISC, $totalMisc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalMisc['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_MISC, $totalMisc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TOTAL_MISC, $totalMisc, $comparison);
    }

    /**
     * Filter the query on the total_order column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalOrder(1234); // WHERE total_order = 1234
     * $query->filterByTotalOrder(array(12, 34)); // WHERE total_order IN (12, 34)
     * $query->filterByTotalOrder(array('min' => 12)); // WHERE total_order > 12
     * </code>
     *
     * @param     mixed $totalOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTotalOrder($totalOrder = null, $comparison = null)
    {
        if (is_array($totalOrder)) {
            $useMinMax = false;
            if (isset($totalOrder['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_ORDER, $totalOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalOrder['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_ORDER, $totalOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TOTAL_ORDER, $totalOrder, $comparison);
    }

    /**
     * Filter the query on the total_cost column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalCost(1234); // WHERE total_cost = 1234
     * $query->filterByTotalCost(array(12, 34)); // WHERE total_cost IN (12, 34)
     * $query->filterByTotalCost(array('min' => 12)); // WHERE total_cost > 12
     * </code>
     *
     * @param     mixed $totalCost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTotalCost($totalCost = null, $comparison = null)
    {
        if (is_array($totalCost)) {
            $useMinMax = false;
            if (isset($totalCost['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_COST, $totalCost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalCost['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_COST, $totalCost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TOTAL_COST, $totalCost, $comparison);
    }

    /**
     * Filter the query on the lock column
     *
     * Example usage:
     * <code>
     * $query->filterByLock('fooValue');   // WHERE lock = 'fooValue'
     * $query->filterByLock('%fooValue%', Criteria::LIKE); // WHERE lock LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lock The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByLock($lock = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lock)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_LOCK, $lock, $comparison);
    }

    /**
     * Filter the query on the taken_date column
     *
     * Example usage:
     * <code>
     * $query->filterByTakenDate(1234); // WHERE taken_date = 1234
     * $query->filterByTakenDate(array(12, 34)); // WHERE taken_date IN (12, 34)
     * $query->filterByTakenDate(array('min' => 12)); // WHERE taken_date > 12
     * </code>
     *
     * @param     mixed $takenDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTakenDate($takenDate = null, $comparison = null)
    {
        if (is_array($takenDate)) {
            $useMinMax = false;
            if (isset($takenDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TAKEN_DATE, $takenDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($takenDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TAKEN_DATE, $takenDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TAKEN_DATE, $takenDate, $comparison);
    }

    /**
     * Filter the query on the taken_time column
     *
     * Example usage:
     * <code>
     * $query->filterByTakenTime(1234); // WHERE taken_time = 1234
     * $query->filterByTakenTime(array(12, 34)); // WHERE taken_time IN (12, 34)
     * $query->filterByTakenTime(array('min' => 12)); // WHERE taken_time > 12
     * </code>
     *
     * @param     mixed $takenTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTakenTime($takenTime = null, $comparison = null)
    {
        if (is_array($takenTime)) {
            $useMinMax = false;
            if (isset($takenTime['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TAKEN_TIME, $takenTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($takenTime['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TAKEN_TIME, $takenTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TAKEN_TIME, $takenTime, $comparison);
    }

    /**
     * Filter the query on the pick_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPickDate(1234); // WHERE pick_date = 1234
     * $query->filterByPickDate(array(12, 34)); // WHERE pick_date IN (12, 34)
     * $query->filterByPickDate(array('min' => 12)); // WHERE pick_date > 12
     * </code>
     *
     * @param     mixed $pickDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPickDate($pickDate = null, $comparison = null)
    {
        if (is_array($pickDate)) {
            $useMinMax = false;
            if (isset($pickDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PICK_DATE, $pickDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pickDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PICK_DATE, $pickDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PICK_DATE, $pickDate, $comparison);
    }

    /**
     * Filter the query on the pick_time column
     *
     * Example usage:
     * <code>
     * $query->filterByPickTime(1234); // WHERE pick_time = 1234
     * $query->filterByPickTime(array(12, 34)); // WHERE pick_time IN (12, 34)
     * $query->filterByPickTime(array('min' => 12)); // WHERE pick_time > 12
     * </code>
     *
     * @param     mixed $pickTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPickTime($pickTime = null, $comparison = null)
    {
        if (is_array($pickTime)) {
            $useMinMax = false;
            if (isset($pickTime['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PICK_TIME, $pickTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pickTime['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PICK_TIME, $pickTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PICK_TIME, $pickTime, $comparison);
    }

    /**
     * Filter the query on the pack_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPackDate(1234); // WHERE pack_date = 1234
     * $query->filterByPackDate(array(12, 34)); // WHERE pack_date IN (12, 34)
     * $query->filterByPackDate(array('min' => 12)); // WHERE pack_date > 12
     * </code>
     *
     * @param     mixed $packDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPackDate($packDate = null, $comparison = null)
    {
        if (is_array($packDate)) {
            $useMinMax = false;
            if (isset($packDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PACK_DATE, $packDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($packDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PACK_DATE, $packDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PACK_DATE, $packDate, $comparison);
    }

    /**
     * Filter the query on the pack_time column
     *
     * Example usage:
     * <code>
     * $query->filterByPackTime(1234); // WHERE pack_time = 1234
     * $query->filterByPackTime(array(12, 34)); // WHERE pack_time IN (12, 34)
     * $query->filterByPackTime(array('min' => 12)); // WHERE pack_time > 12
     * </code>
     *
     * @param     mixed $packTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPackTime($packTime = null, $comparison = null)
    {
        if (is_array($packTime)) {
            $useMinMax = false;
            if (isset($packTime['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PACK_TIME, $packTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($packTime['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PACK_TIME, $packTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PACK_TIME, $packTime, $comparison);
    }

    /**
     * Filter the query on the verify_date column
     *
     * Example usage:
     * <code>
     * $query->filterByVerifyDate(1234); // WHERE verify_date = 1234
     * $query->filterByVerifyDate(array(12, 34)); // WHERE verify_date IN (12, 34)
     * $query->filterByVerifyDate(array('min' => 12)); // WHERE verify_date > 12
     * </code>
     *
     * @param     mixed $verifyDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByVerifyDate($verifyDate = null, $comparison = null)
    {
        if (is_array($verifyDate)) {
            $useMinMax = false;
            if (isset($verifyDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_VERIFY_DATE, $verifyDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($verifyDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_VERIFY_DATE, $verifyDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_VERIFY_DATE, $verifyDate, $comparison);
    }

    /**
     * Filter the query on the verify_time column
     *
     * Example usage:
     * <code>
     * $query->filterByVerifyTime(1234); // WHERE verify_time = 1234
     * $query->filterByVerifyTime(array(12, 34)); // WHERE verify_time IN (12, 34)
     * $query->filterByVerifyTime(array('min' => 12)); // WHERE verify_time > 12
     * </code>
     *
     * @param     mixed $verifyTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByVerifyTime($verifyTime = null, $comparison = null)
    {
        if (is_array($verifyTime)) {
            $useMinMax = false;
            if (isset($verifyTime['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_VERIFY_TIME, $verifyTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($verifyTime['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_VERIFY_TIME, $verifyTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_VERIFY_TIME, $verifyTime, $comparison);
    }

    /**
     * Filter the query on the creditmemo column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditmemo('fooValue');   // WHERE creditmemo = 'fooValue'
     * $query->filterByCreditmemo('%fooValue%', Criteria::LIKE); // WHERE creditmemo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $creditmemo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCreditmemo($creditmemo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($creditmemo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CREDITMEMO, $creditmemo, $comparison);
    }

    /**
     * Filter the query on the booked column
     *
     * Example usage:
     * <code>
     * $query->filterByBooked('fooValue');   // WHERE booked = 'fooValue'
     * $query->filterByBooked('%fooValue%', Criteria::LIKE); // WHERE booked LIKE '%fooValue%'
     * </code>
     *
     * @param     string $booked The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByBooked($booked = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($booked)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_BOOKED, $booked, $comparison);
    }

    /**
     * Filter the query on the original_whse column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalWhse('fooValue');   // WHERE original_whse = 'fooValue'
     * $query->filterByOriginalWhse('%fooValue%', Criteria::LIKE); // WHERE original_whse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $originalWhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOriginalWhse($originalWhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($originalWhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_WHSE, $originalWhse, $comparison);
    }

    /**
     * Filter the query on the billto_state column
     *
     * Example usage:
     * <code>
     * $query->filterByBilltoState('fooValue');   // WHERE billto_state = 'fooValue'
     * $query->filterByBilltoState('%fooValue%', Criteria::LIKE); // WHERE billto_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billtoState The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByBilltoState($billtoState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billtoState)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_BILLTO_STATE, $billtoState, $comparison);
    }

    /**
     * Filter the query on the shipcomplete column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcomplete('fooValue');   // WHERE shipcomplete = 'fooValue'
     * $query->filterByShipcomplete('%fooValue%', Criteria::LIKE); // WHERE shipcomplete LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipcomplete The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShipcomplete($shipcomplete = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcomplete)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIPCOMPLETE, $shipcomplete, $comparison);
    }

    /**
     * Filter the query on the cwo_flag column
     *
     * Example usage:
     * <code>
     * $query->filterByCwoFlag('fooValue');   // WHERE cwo_flag = 'fooValue'
     * $query->filterByCwoFlag('%fooValue%', Criteria::LIKE); // WHERE cwo_flag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cwoFlag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCwoFlag($cwoFlag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cwoFlag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CWO_FLAG, $cwoFlag, $comparison);
    }

    /**
     * Filter the query on the division column
     *
     * Example usage:
     * <code>
     * $query->filterByDivision('fooValue');   // WHERE division = 'fooValue'
     * $query->filterByDivision('%fooValue%', Criteria::LIKE); // WHERE division LIKE '%fooValue%'
     * </code>
     *
     * @param     string $division The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDivision($division = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($division)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DIVISION, $division, $comparison);
    }

    /**
     * Filter the query on the taken_code column
     *
     * Example usage:
     * <code>
     * $query->filterByTakenCode('fooValue');   // WHERE taken_code = 'fooValue'
     * $query->filterByTakenCode('%fooValue%', Criteria::LIKE); // WHERE taken_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $takenCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTakenCode($takenCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($takenCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TAKEN_CODE, $takenCode, $comparison);
    }

    /**
     * Filter the query on the pack_code column
     *
     * Example usage:
     * <code>
     * $query->filterByPackCode('fooValue');   // WHERE pack_code = 'fooValue'
     * $query->filterByPackCode('%fooValue%', Criteria::LIKE); // WHERE pack_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $packCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPackCode($packCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($packCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PACK_CODE, $packCode, $comparison);
    }

    /**
     * Filter the query on the pick_code column
     *
     * Example usage:
     * <code>
     * $query->filterByPickCode('fooValue');   // WHERE pick_code = 'fooValue'
     * $query->filterByPickCode('%fooValue%', Criteria::LIKE); // WHERE pick_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pickCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPickCode($pickCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pickCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PICK_CODE, $pickCode, $comparison);
    }

    /**
     * Filter the query on the verify_code column
     *
     * Example usage:
     * <code>
     * $query->filterByVerifyCode('fooValue');   // WHERE verify_code = 'fooValue'
     * $query->filterByVerifyCode('%fooValue%', Criteria::LIKE); // WHERE verify_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $verifyCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByVerifyCode($verifyCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($verifyCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_VERIFY_CODE, $verifyCode, $comparison);
    }

    /**
     * Filter the query on the total_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalDiscount(1234); // WHERE total_discount = 1234
     * $query->filterByTotalDiscount(array(12, 34)); // WHERE total_discount IN (12, 34)
     * $query->filterByTotalDiscount(array('min' => 12)); // WHERE total_discount > 12
     * </code>
     *
     * @param     mixed $totalDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTotalDiscount($totalDiscount = null, $comparison = null)
    {
        if (is_array($totalDiscount)) {
            $useMinMax = false;
            if (isset($totalDiscount['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_DISCOUNT, $totalDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalDiscount['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TOTAL_DISCOUNT, $totalDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TOTAL_DISCOUNT, $totalDiscount, $comparison);
    }

    /**
     * Filter the query on the edi_refererencenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByEdiRefererencenbr('fooValue');   // WHERE edi_refererencenbr = 'fooValue'
     * $query->filterByEdiRefererencenbr('%fooValue%', Criteria::LIKE); // WHERE edi_refererencenbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ediRefererencenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByEdiRefererencenbr($ediRefererencenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ediRefererencenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_EDI_REFERERENCENBR, $ediRefererencenbr, $comparison);
    }

    /**
     * Filter the query on the user_code1 column
     *
     * Example usage:
     * <code>
     * $query->filterByUserCode1('fooValue');   // WHERE user_code1 = 'fooValue'
     * $query->filterByUserCode1('%fooValue%', Criteria::LIKE); // WHERE user_code1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userCode1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByUserCode1($userCode1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userCode1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_USER_CODE1, $userCode1, $comparison);
    }

    /**
     * Filter the query on the user_code2 column
     *
     * Example usage:
     * <code>
     * $query->filterByUserCode2('fooValue');   // WHERE user_code2 = 'fooValue'
     * $query->filterByUserCode2('%fooValue%', Criteria::LIKE); // WHERE user_code2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userCode2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByUserCode2($userCode2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userCode2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_USER_CODE2, $userCode2, $comparison);
    }

    /**
     * Filter the query on the user_code3 column
     *
     * Example usage:
     * <code>
     * $query->filterByUserCode3('fooValue');   // WHERE user_code3 = 'fooValue'
     * $query->filterByUserCode3('%fooValue%', Criteria::LIKE); // WHERE user_code3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userCode3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByUserCode3($userCode3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userCode3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_USER_CODE3, $userCode3, $comparison);
    }

    /**
     * Filter the query on the user_code4 column
     *
     * Example usage:
     * <code>
     * $query->filterByUserCode4('fooValue');   // WHERE user_code4 = 'fooValue'
     * $query->filterByUserCode4('%fooValue%', Criteria::LIKE); // WHERE user_code4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userCode4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByUserCode4($userCode4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userCode4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_USER_CODE4, $userCode4, $comparison);
    }

    /**
     * Filter the query on the exchange_country column
     *
     * Example usage:
     * <code>
     * $query->filterByExchangeCountry('fooValue');   // WHERE exchange_country = 'fooValue'
     * $query->filterByExchangeCountry('%fooValue%', Criteria::LIKE); // WHERE exchange_country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $exchangeCountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByExchangeCountry($exchangeCountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($exchangeCountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_EXCHANGE_COUNTRY, $exchangeCountry, $comparison);
    }

    /**
     * Filter the query on the exchange_rate column
     *
     * Example usage:
     * <code>
     * $query->filterByExchangeRate(1234); // WHERE exchange_rate = 1234
     * $query->filterByExchangeRate(array(12, 34)); // WHERE exchange_rate IN (12, 34)
     * $query->filterByExchangeRate(array('min' => 12)); // WHERE exchange_rate > 12
     * </code>
     *
     * @param     mixed $exchangeRate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByExchangeRate($exchangeRate = null, $comparison = null)
    {
        if (is_array($exchangeRate)) {
            $useMinMax = false;
            if (isset($exchangeRate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_EXCHANGE_RATE, $exchangeRate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($exchangeRate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_EXCHANGE_RATE, $exchangeRate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_EXCHANGE_RATE, $exchangeRate, $comparison);
    }

    /**
     * Filter the query on the weight_total column
     *
     * Example usage:
     * <code>
     * $query->filterByWeightTotal(1234); // WHERE weight_total = 1234
     * $query->filterByWeightTotal(array(12, 34)); // WHERE weight_total IN (12, 34)
     * $query->filterByWeightTotal(array('min' => 12)); // WHERE weight_total > 12
     * </code>
     *
     * @param     mixed $weightTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByWeightTotal($weightTotal = null, $comparison = null)
    {
        if (is_array($weightTotal)) {
            $useMinMax = false;
            if (isset($weightTotal['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_WEIGHT_TOTAL, $weightTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weightTotal['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_WEIGHT_TOTAL, $weightTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_WEIGHT_TOTAL, $weightTotal, $comparison);
    }

    /**
     * Filter the query on the weight_override column
     *
     * Example usage:
     * <code>
     * $query->filterByWeightOverride('fooValue');   // WHERE weight_override = 'fooValue'
     * $query->filterByWeightOverride('%fooValue%', Criteria::LIKE); // WHERE weight_override LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weightOverride The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByWeightOverride($weightOverride = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weightOverride)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_WEIGHT_OVERRIDE, $weightOverride, $comparison);
    }

    /**
     * Filter the query on the box_count column
     *
     * Example usage:
     * <code>
     * $query->filterByBoxCount(1234); // WHERE box_count = 1234
     * $query->filterByBoxCount(array(12, 34)); // WHERE box_count IN (12, 34)
     * $query->filterByBoxCount(array('min' => 12)); // WHERE box_count > 12
     * </code>
     *
     * @param     mixed $boxCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByBoxCount($boxCount = null, $comparison = null)
    {
        if (is_array($boxCount)) {
            $useMinMax = false;
            if (isset($boxCount['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_BOX_COUNT, $boxCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($boxCount['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_BOX_COUNT, $boxCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_BOX_COUNT, $boxCount, $comparison);
    }

    /**
     * Filter the query on the request_date column
     *
     * Example usage:
     * <code>
     * $query->filterByRequestDate(1234); // WHERE request_date = 1234
     * $query->filterByRequestDate(array(12, 34)); // WHERE request_date IN (12, 34)
     * $query->filterByRequestDate(array('min' => 12)); // WHERE request_date > 12
     * </code>
     *
     * @param     mixed $requestDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByRequestDate($requestDate = null, $comparison = null)
    {
        if (is_array($requestDate)) {
            $useMinMax = false;
            if (isset($requestDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_REQUEST_DATE, $requestDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requestDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_REQUEST_DATE, $requestDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_REQUEST_DATE, $requestDate, $comparison);
    }

    /**
     * Filter the query on the cancel_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCancelDate(1234); // WHERE cancel_date = 1234
     * $query->filterByCancelDate(array(12, 34)); // WHERE cancel_date IN (12, 34)
     * $query->filterByCancelDate(array('min' => 12)); // WHERE cancel_date > 12
     * </code>
     *
     * @param     mixed $cancelDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
    }

    /**
     * Filter the query on the lockedby column
     *
     * Example usage:
     * <code>
     * $query->filterByLockedby('fooValue');   // WHERE lockedby = 'fooValue'
     * $query->filterByLockedby('%fooValue%', Criteria::LIKE); // WHERE lockedby LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lockedby The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByLockedby($lockedby = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lockedby)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_LOCKEDBY, $lockedby, $comparison);
    }

    /**
     * Filter the query on the release_number column
     *
     * Example usage:
     * <code>
     * $query->filterByReleaseNumber('fooValue');   // WHERE release_number = 'fooValue'
     * $query->filterByReleaseNumber('%fooValue%', Criteria::LIKE); // WHERE release_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $releaseNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByReleaseNumber($releaseNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($releaseNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_RELEASE_NUMBER, $releaseNumber, $comparison);
    }

    /**
     * Filter the query on the whse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhse('fooValue');   // WHERE whse = 'fooValue'
     * $query->filterByWhse('%fooValue%', Criteria::LIKE); // WHERE whse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_WHSE, $whse, $comparison);
    }

    /**
     * Filter the query on the backorder_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBackorderDate(1234); // WHERE backorder_date = 1234
     * $query->filterByBackorderDate(array(12, 34)); // WHERE backorder_date IN (12, 34)
     * $query->filterByBackorderDate(array('min' => 12)); // WHERE backorder_date > 12
     * </code>
     *
     * @param     mixed $backorderDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByBackorderDate($backorderDate = null, $comparison = null)
    {
        if (is_array($backorderDate)) {
            $useMinMax = false;
            if (isset($backorderDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_BACKORDER_DATE, $backorderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($backorderDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_BACKORDER_DATE, $backorderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_BACKORDER_DATE, $backorderDate, $comparison);
    }

    /**
     * Filter the query on the deptcode column
     *
     * Example usage:
     * <code>
     * $query->filterByDeptcode('fooValue');   // WHERE deptcode = 'fooValue'
     * $query->filterByDeptcode('%fooValue%', Criteria::LIKE); // WHERE deptcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $deptcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDeptcode($deptcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deptcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DEPTCODE, $deptcode, $comparison);
    }

    /**
     * Filter the query on the freight_in_entered column
     *
     * Example usage:
     * <code>
     * $query->filterByFreightInEntered('fooValue');   // WHERE freight_in_entered = 'fooValue'
     * $query->filterByFreightInEntered('%fooValue%', Criteria::LIKE); // WHERE freight_in_entered LIKE '%fooValue%'
     * </code>
     *
     * @param     string $freightInEntered The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFreightInEntered($freightInEntered = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($freightInEntered)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FREIGHT_IN_ENTERED, $freightInEntered, $comparison);
    }

    /**
     * Filter the query on the dropship_entered column
     *
     * Example usage:
     * <code>
     * $query->filterByDropshipEntered('fooValue');   // WHERE dropship_entered = 'fooValue'
     * $query->filterByDropshipEntered('%fooValue%', Criteria::LIKE); // WHERE dropship_entered LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dropshipEntered The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDropshipEntered($dropshipEntered = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dropshipEntered)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DROPSHIP_ENTERED, $dropshipEntered, $comparison);
    }

    /**
     * Filter the query on the er_flag column
     *
     * Example usage:
     * <code>
     * $query->filterByErFlag('fooValue');   // WHERE er_flag = 'fooValue'
     * $query->filterByErFlag('%fooValue%', Criteria::LIKE); // WHERE er_flag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $erFlag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByErFlag($erFlag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($erFlag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ER_FLAG, $erFlag, $comparison);
    }

    /**
     * Filter the query on the freight_in column
     *
     * Example usage:
     * <code>
     * $query->filterByFreightIn(1234); // WHERE freight_in = 1234
     * $query->filterByFreightIn(array(12, 34)); // WHERE freight_in IN (12, 34)
     * $query->filterByFreightIn(array('min' => 12)); // WHERE freight_in > 12
     * </code>
     *
     * @param     mixed $freightIn The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFreightIn($freightIn = null, $comparison = null)
    {
        if (is_array($freightIn)) {
            $useMinMax = false;
            if (isset($freightIn['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_FREIGHT_IN, $freightIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($freightIn['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_FREIGHT_IN, $freightIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FREIGHT_IN, $freightIn, $comparison);
    }

    /**
     * Filter the query on the dropship column
     *
     * Example usage:
     * <code>
     * $query->filterByDropship(1234); // WHERE dropship = 1234
     * $query->filterByDropship(array(12, 34)); // WHERE dropship IN (12, 34)
     * $query->filterByDropship(array('min' => 12)); // WHERE dropship > 12
     * </code>
     *
     * @param     mixed $dropship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDropship($dropship = null, $comparison = null)
    {
        if (is_array($dropship)) {
            $useMinMax = false;
            if (isset($dropship['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DROPSHIP, $dropship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dropship['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DROPSHIP, $dropship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DROPSHIP, $dropship, $comparison);
    }

    /**
     * Filter the query on the minorder column
     *
     * Example usage:
     * <code>
     * $query->filterByMinorder(1234); // WHERE minorder = 1234
     * $query->filterByMinorder(array(12, 34)); // WHERE minorder IN (12, 34)
     * $query->filterByMinorder(array('min' => 12)); // WHERE minorder > 12
     * </code>
     *
     * @param     mixed $minorder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByMinorder($minorder = null, $comparison = null)
    {
        if (is_array($minorder)) {
            $useMinMax = false;
            if (isset($minorder['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_MINORDER, $minorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minorder['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_MINORDER, $minorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_MINORDER, $minorder, $comparison);
    }

    /**
     * Filter the query on the contract_terms column
     *
     * Example usage:
     * <code>
     * $query->filterByContractTerms('fooValue');   // WHERE contract_terms = 'fooValue'
     * $query->filterByContractTerms('%fooValue%', Criteria::LIKE); // WHERE contract_terms LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contractTerms The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByContractTerms($contractTerms = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contractTerms)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CONTRACT_TERMS, $contractTerms, $comparison);
    }

    /**
     * Filter the query on the dropship_billed column
     *
     * Example usage:
     * <code>
     * $query->filterByDropshipBilled('fooValue');   // WHERE dropship_billed = 'fooValue'
     * $query->filterByDropshipBilled('%fooValue%', Criteria::LIKE); // WHERE dropship_billed LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dropshipBilled The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDropshipBilled($dropshipBilled = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dropshipBilled)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DROPSHIP_BILLED, $dropshipBilled, $comparison);
    }

    /**
     * Filter the query on the order_type column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderType('fooValue');   // WHERE order_type = 'fooValue'
     * $query->filterByOrderType('%fooValue%', Criteria::LIKE); // WHERE order_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOrderType($orderType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORDER_TYPE, $orderType, $comparison);
    }

    /**
     * Filter the query on the tracking_edinumber column
     *
     * Example usage:
     * <code>
     * $query->filterByTrackingEdinumber('fooValue');   // WHERE tracking_edinumber = 'fooValue'
     * $query->filterByTrackingEdinumber('%fooValue%', Criteria::LIKE); // WHERE tracking_edinumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trackingEdinumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTrackingEdinumber($trackingEdinumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trackingEdinumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TRACKING_EDINUMBER, $trackingEdinumber, $comparison);
    }

    /**
     * Filter the query on the source column
     *
     * Example usage:
     * <code>
     * $query->filterBySource('fooValue');   // WHERE source = 'fooValue'
     * $query->filterBySource('%fooValue%', Criteria::LIKE); // WHERE source LIKE '%fooValue%'
     * </code>
     *
     * @param     string $source The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySource($source = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($source)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SOURCE, $source, $comparison);
    }

    /**
     * Filter the query on the pick_format column
     *
     * Example usage:
     * <code>
     * $query->filterByPickFormat('fooValue');   // WHERE pick_format = 'fooValue'
     * $query->filterByPickFormat('%fooValue%', Criteria::LIKE); // WHERE pick_format LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pickFormat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPickFormat($pickFormat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pickFormat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PICK_FORMAT, $pickFormat, $comparison);
    }

    /**
     * Filter the query on the invoice_format column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoiceFormat('fooValue');   // WHERE invoice_format = 'fooValue'
     * $query->filterByInvoiceFormat('%fooValue%', Criteria::LIKE); // WHERE invoice_format LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invoiceFormat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByInvoiceFormat($invoiceFormat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invoiceFormat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_INVOICE_FORMAT, $invoiceFormat, $comparison);
    }

    /**
     * Filter the query on the cash_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByCashAmount(1234); // WHERE cash_amount = 1234
     * $query->filterByCashAmount(array(12, 34)); // WHERE cash_amount IN (12, 34)
     * $query->filterByCashAmount(array('min' => 12)); // WHERE cash_amount > 12
     * </code>
     *
     * @param     mixed $cashAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCashAmount($cashAmount = null, $comparison = null)
    {
        if (is_array($cashAmount)) {
            $useMinMax = false;
            if (isset($cashAmount['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CASH_AMOUNT, $cashAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cashAmount['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CASH_AMOUNT, $cashAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CASH_AMOUNT, $cashAmount, $comparison);
    }

    /**
     * Filter the query on the check_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckAmount(1234); // WHERE check_amount = 1234
     * $query->filterByCheckAmount(array(12, 34)); // WHERE check_amount IN (12, 34)
     * $query->filterByCheckAmount(array('min' => 12)); // WHERE check_amount > 12
     * </code>
     *
     * @param     mixed $checkAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCheckAmount($checkAmount = null, $comparison = null)
    {
        if (is_array($checkAmount)) {
            $useMinMax = false;
            if (isset($checkAmount['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CHECK_AMOUNT, $checkAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkAmount['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CHECK_AMOUNT, $checkAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CHECK_AMOUNT, $checkAmount, $comparison);
    }

    /**
     * Filter the query on the check_number column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckNumber('fooValue');   // WHERE check_number = 'fooValue'
     * $query->filterByCheckNumber('%fooValue%', Criteria::LIKE); // WHERE check_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $checkNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCheckNumber($checkNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($checkNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CHECK_NUMBER, $checkNumber, $comparison);
    }

    /**
     * Filter the query on the deposit_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByDepositAmount(1234); // WHERE deposit_amount = 1234
     * $query->filterByDepositAmount(array(12, 34)); // WHERE deposit_amount IN (12, 34)
     * $query->filterByDepositAmount(array('min' => 12)); // WHERE deposit_amount > 12
     * </code>
     *
     * @param     mixed $depositAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDepositAmount($depositAmount = null, $comparison = null)
    {
        if (is_array($depositAmount)) {
            $useMinMax = false;
            if (isset($depositAmount['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DEPOSIT_AMOUNT, $depositAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($depositAmount['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DEPOSIT_AMOUNT, $depositAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DEPOSIT_AMOUNT, $depositAmount, $comparison);
    }

    /**
     * Filter the query on the deposit_number column
     *
     * Example usage:
     * <code>
     * $query->filterByDepositNumber('fooValue');   // WHERE deposit_number = 'fooValue'
     * $query->filterByDepositNumber('%fooValue%', Criteria::LIKE); // WHERE deposit_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $depositNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDepositNumber($depositNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($depositNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DEPOSIT_NUMBER, $depositNumber, $comparison);
    }

    /**
     * Filter the query on the original_subtotal_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalSubtotalTax(1234); // WHERE original_subtotal_tax = 1234
     * $query->filterByOriginalSubtotalTax(array(12, 34)); // WHERE original_subtotal_tax IN (12, 34)
     * $query->filterByOriginalSubtotalTax(array('min' => 12)); // WHERE original_subtotal_tax > 12
     * </code>
     *
     * @param     mixed $originalSubtotalTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOriginalSubtotalTax($originalSubtotalTax = null, $comparison = null)
    {
        if (is_array($originalSubtotalTax)) {
            $useMinMax = false;
            if (isset($originalSubtotalTax['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX, $originalSubtotalTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($originalSubtotalTax['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX, $originalSubtotalTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX, $originalSubtotalTax, $comparison);
    }

    /**
     * Filter the query on the original_subtotal_nontax column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalSubtotalNontax(1234); // WHERE original_subtotal_nontax = 1234
     * $query->filterByOriginalSubtotalNontax(array(12, 34)); // WHERE original_subtotal_nontax IN (12, 34)
     * $query->filterByOriginalSubtotalNontax(array('min' => 12)); // WHERE original_subtotal_nontax > 12
     * </code>
     *
     * @param     mixed $originalSubtotalNontax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOriginalSubtotalNontax($originalSubtotalNontax = null, $comparison = null)
    {
        if (is_array($originalSubtotalNontax)) {
            $useMinMax = false;
            if (isset($originalSubtotalNontax['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX, $originalSubtotalNontax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($originalSubtotalNontax['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX, $originalSubtotalNontax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX, $originalSubtotalNontax, $comparison);
    }

    /**
     * Filter the query on the original_total_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalTotalTax(1234); // WHERE original_total_tax = 1234
     * $query->filterByOriginalTotalTax(array(12, 34)); // WHERE original_total_tax IN (12, 34)
     * $query->filterByOriginalTotalTax(array('min' => 12)); // WHERE original_total_tax > 12
     * </code>
     *
     * @param     mixed $originalTotalTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOriginalTotalTax($originalTotalTax = null, $comparison = null)
    {
        if (is_array($originalTotalTax)) {
            $useMinMax = false;
            if (isset($originalTotalTax['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_TOTAL_TAX, $originalTotalTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($originalTotalTax['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_TOTAL_TAX, $originalTotalTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_TOTAL_TAX, $originalTotalTax, $comparison);
    }

    /**
     * Filter the query on the original_total column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalTotal(1234); // WHERE original_total = 1234
     * $query->filterByOriginalTotal(array(12, 34)); // WHERE original_total IN (12, 34)
     * $query->filterByOriginalTotal(array('min' => 12)); // WHERE original_total > 12
     * </code>
     *
     * @param     mixed $originalTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOriginalTotal($originalTotal = null, $comparison = null)
    {
        if (is_array($originalTotal)) {
            $useMinMax = false;
            if (isset($originalTotal['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_TOTAL, $originalTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($originalTotal['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_TOTAL, $originalTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_TOTAL, $originalTotal, $comparison);
    }

    /**
     * Filter the query on the pick_printdate column
     *
     * Example usage:
     * <code>
     * $query->filterByPickPrintdate(1234); // WHERE pick_printdate = 1234
     * $query->filterByPickPrintdate(array(12, 34)); // WHERE pick_printdate IN (12, 34)
     * $query->filterByPickPrintdate(array('min' => 12)); // WHERE pick_printdate > 12
     * </code>
     *
     * @param     mixed $pickPrintdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPickPrintdate($pickPrintdate = null, $comparison = null)
    {
        if (is_array($pickPrintdate)) {
            $useMinMax = false;
            if (isset($pickPrintdate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PICK_PRINTDATE, $pickPrintdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pickPrintdate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PICK_PRINTDATE, $pickPrintdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PICK_PRINTDATE, $pickPrintdate, $comparison);
    }

    /**
     * Filter the query on the pick_printtime column
     *
     * Example usage:
     * <code>
     * $query->filterByPickPrinttime(1234); // WHERE pick_printtime = 1234
     * $query->filterByPickPrinttime(array(12, 34)); // WHERE pick_printtime IN (12, 34)
     * $query->filterByPickPrinttime(array('min' => 12)); // WHERE pick_printtime > 12
     * </code>
     *
     * @param     mixed $pickPrinttime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPickPrinttime($pickPrinttime = null, $comparison = null)
    {
        if (is_array($pickPrinttime)) {
            $useMinMax = false;
            if (isset($pickPrinttime['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PICK_PRINTTIME, $pickPrinttime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pickPrinttime['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_PICK_PRINTTIME, $pickPrinttime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PICK_PRINTTIME, $pickPrinttime, $comparison);
    }

    /**
     * Filter the query on the contact column
     *
     * Example usage:
     * <code>
     * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
     * $query->filterByContact('%fooValue%', Criteria::LIKE); // WHERE contact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the phone_intl column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneIntl('fooValue');   // WHERE phone_intl = 'fooValue'
     * $query->filterByPhoneIntl('%fooValue%', Criteria::LIKE); // WHERE phone_intl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneIntl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPhoneIntl($phoneIntl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneIntl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PHONE_INTL, $phoneIntl, $comparison);
    }

    /**
     * Filter the query on the phone_accesscode column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneAccesscode('fooValue');   // WHERE phone_accesscode = 'fooValue'
     * $query->filterByPhoneAccesscode('%fooValue%', Criteria::LIKE); // WHERE phone_accesscode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneAccesscode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPhoneAccesscode($phoneAccesscode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneAccesscode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PHONE_ACCESSCODE, $phoneAccesscode, $comparison);
    }

    /**
     * Filter the query on the phone_countrycode column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneCountrycode('fooValue');   // WHERE phone_countrycode = 'fooValue'
     * $query->filterByPhoneCountrycode('%fooValue%', Criteria::LIKE); // WHERE phone_countrycode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneCountrycode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPhoneCountrycode($phoneCountrycode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneCountrycode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PHONE_COUNTRYCODE, $phoneCountrycode, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the phone_ext column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneExt('fooValue');   // WHERE phone_ext = 'fooValue'
     * $query->filterByPhoneExt('%fooValue%', Criteria::LIKE); // WHERE phone_ext LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneExt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPhoneExt($phoneExt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneExt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PHONE_EXT, $phoneExt, $comparison);
    }

    /**
     * Filter the query on the fax_intl column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxIntl('fooValue');   // WHERE fax_intl = 'fooValue'
     * $query->filterByFaxIntl('%fooValue%', Criteria::LIKE); // WHERE fax_intl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $faxIntl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFaxIntl($faxIntl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxIntl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FAX_INTL, $faxIntl, $comparison);
    }

    /**
     * Filter the query on the fax_accesscode column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxAccesscode('fooValue');   // WHERE fax_accesscode = 'fooValue'
     * $query->filterByFaxAccesscode('%fooValue%', Criteria::LIKE); // WHERE fax_accesscode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $faxAccesscode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFaxAccesscode($faxAccesscode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxAccesscode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FAX_ACCESSCODE, $faxAccesscode, $comparison);
    }

    /**
     * Filter the query on the fax_countrycode column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxCountrycode('fooValue');   // WHERE fax_countrycode = 'fooValue'
     * $query->filterByFaxCountrycode('%fooValue%', Criteria::LIKE); // WHERE fax_countrycode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $faxCountrycode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFaxCountrycode($faxCountrycode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxCountrycode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FAX_COUNTRYCODE, $faxCountrycode, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%', Criteria::LIKE); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the ship_account column
     *
     * Example usage:
     * <code>
     * $query->filterByShipAccount('fooValue');   // WHERE ship_account = 'fooValue'
     * $query->filterByShipAccount('%fooValue%', Criteria::LIKE); // WHERE ship_account LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipAccount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShipAccount($shipAccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipAccount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIP_ACCOUNT, $shipAccount, $comparison);
    }

    /**
     * Filter the query on the change_due column
     *
     * Example usage:
     * <code>
     * $query->filterByChangeDue(1234); // WHERE change_due = 1234
     * $query->filterByChangeDue(array(12, 34)); // WHERE change_due IN (12, 34)
     * $query->filterByChangeDue(array('min' => 12)); // WHERE change_due > 12
     * </code>
     *
     * @param     mixed $changeDue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByChangeDue($changeDue = null, $comparison = null)
    {
        if (is_array($changeDue)) {
            $useMinMax = false;
            if (isset($changeDue['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CHANGE_DUE, $changeDue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeDue['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CHANGE_DUE, $changeDue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CHANGE_DUE, $changeDue, $comparison);
    }

    /**
     * Filter the query on the discount_additional column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscountAdditional(1234); // WHERE discount_additional = 1234
     * $query->filterByDiscountAdditional(array(12, 34)); // WHERE discount_additional IN (12, 34)
     * $query->filterByDiscountAdditional(array('min' => 12)); // WHERE discount_additional > 12
     * </code>
     *
     * @param     mixed $discountAdditional The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDiscountAdditional($discountAdditional = null, $comparison = null)
    {
        if (is_array($discountAdditional)) {
            $useMinMax = false;
            if (isset($discountAdditional['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DISCOUNT_ADDITIONAL, $discountAdditional['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discountAdditional['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DISCOUNT_ADDITIONAL, $discountAdditional['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DISCOUNT_ADDITIONAL, $discountAdditional, $comparison);
    }

    /**
     * Filter the query on the all_ship column
     *
     * Example usage:
     * <code>
     * $query->filterByAllShip('fooValue');   // WHERE all_ship = 'fooValue'
     * $query->filterByAllShip('%fooValue%', Criteria::LIKE); // WHERE all_ship LIKE '%fooValue%'
     * </code>
     *
     * @param     string $allShip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByAllShip($allShip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($allShip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ALL_SHIP, $allShip, $comparison);
    }

    /**
     * Filter the query on the credit_applied column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditApplied(1234); // WHERE credit_applied = 1234
     * $query->filterByCreditApplied(array(12, 34)); // WHERE credit_applied IN (12, 34)
     * $query->filterByCreditApplied(array('min' => 12)); // WHERE credit_applied > 12
     * </code>
     *
     * @param     mixed $creditApplied The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCreditApplied($creditApplied = null, $comparison = null)
    {
        if (is_array($creditApplied)) {
            $useMinMax = false;
            if (isset($creditApplied['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CREDIT_APPLIED, $creditApplied['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditApplied['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_CREDIT_APPLIED, $creditApplied['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CREDIT_APPLIED, $creditApplied, $comparison);
    }

    /**
     * Filter the query on the invoice_printdate column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoicePrintdate(1234); // WHERE invoice_printdate = 1234
     * $query->filterByInvoicePrintdate(array(12, 34)); // WHERE invoice_printdate IN (12, 34)
     * $query->filterByInvoicePrintdate(array('min' => 12)); // WHERE invoice_printdate > 12
     * </code>
     *
     * @param     mixed $invoicePrintdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByInvoicePrintdate($invoicePrintdate = null, $comparison = null)
    {
        if (is_array($invoicePrintdate)) {
            $useMinMax = false;
            if (isset($invoicePrintdate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_INVOICE_PRINTDATE, $invoicePrintdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invoicePrintdate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_INVOICE_PRINTDATE, $invoicePrintdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_INVOICE_PRINTDATE, $invoicePrintdate, $comparison);
    }

    /**
     * Filter the query on the invoice_printtime column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoicePrinttime(1234); // WHERE invoice_printtime = 1234
     * $query->filterByInvoicePrinttime(array(12, 34)); // WHERE invoice_printtime IN (12, 34)
     * $query->filterByInvoicePrinttime(array('min' => 12)); // WHERE invoice_printtime > 12
     * </code>
     *
     * @param     mixed $invoicePrinttime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByInvoicePrinttime($invoicePrinttime = null, $comparison = null)
    {
        if (is_array($invoicePrinttime)) {
            $useMinMax = false;
            if (isset($invoicePrinttime['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_INVOICE_PRINTTIME, $invoicePrinttime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invoicePrinttime['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_INVOICE_PRINTTIME, $invoicePrinttime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_INVOICE_PRINTTIME, $invoicePrinttime, $comparison);
    }

    /**
     * Filter the query on the discount_freight column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscountFreight(1234); // WHERE discount_freight = 1234
     * $query->filterByDiscountFreight(array(12, 34)); // WHERE discount_freight IN (12, 34)
     * $query->filterByDiscountFreight(array('min' => 12)); // WHERE discount_freight > 12
     * </code>
     *
     * @param     mixed $discountFreight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDiscountFreight($discountFreight = null, $comparison = null)
    {
        if (is_array($discountFreight)) {
            $useMinMax = false;
            if (isset($discountFreight['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DISCOUNT_FREIGHT, $discountFreight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discountFreight['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DISCOUNT_FREIGHT, $discountFreight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DISCOUNT_FREIGHT, $discountFreight, $comparison);
    }

    /**
     * Filter the query on the ship_completeoverride column
     *
     * Example usage:
     * <code>
     * $query->filterByShipCompleteoverride('fooValue');   // WHERE ship_completeoverride = 'fooValue'
     * $query->filterByShipCompleteoverride('%fooValue%', Criteria::LIKE); // WHERE ship_completeoverride LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipCompleteoverride The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByShipCompleteoverride($shipCompleteoverride = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipCompleteoverride)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SHIP_COMPLETEOVERRIDE, $shipCompleteoverride, $comparison);
    }

    /**
     * Filter the query on the contact_email column
     *
     * Example usage:
     * <code>
     * $query->filterByContactEmail('fooValue');   // WHERE contact_email = 'fooValue'
     * $query->filterByContactEmail('%fooValue%', Criteria::LIKE); // WHERE contact_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByContactEmail($contactEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CONTACT_EMAIL, $contactEmail, $comparison);
    }

    /**
     * Filter the query on the manual_freight column
     *
     * Example usage:
     * <code>
     * $query->filterByManualFreight('fooValue');   // WHERE manual_freight = 'fooValue'
     * $query->filterByManualFreight('%fooValue%', Criteria::LIKE); // WHERE manual_freight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $manualFreight The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByManualFreight($manualFreight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($manualFreight)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_MANUAL_FREIGHT, $manualFreight, $comparison);
    }

    /**
     * Filter the query on the internal_freight column
     *
     * Example usage:
     * <code>
     * $query->filterByInternalFreight('fooValue');   // WHERE internal_freight = 'fooValue'
     * $query->filterByInternalFreight('%fooValue%', Criteria::LIKE); // WHERE internal_freight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $internalFreight The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByInternalFreight($internalFreight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($internalFreight)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_INTERNAL_FREIGHT, $internalFreight, $comparison);
    }

    /**
     * Filter the query on the cost_freight column
     *
     * Example usage:
     * <code>
     * $query->filterByCostFreight(1234); // WHERE cost_freight = 1234
     * $query->filterByCostFreight(array(12, 34)); // WHERE cost_freight IN (12, 34)
     * $query->filterByCostFreight(array('min' => 12)); // WHERE cost_freight > 12
     * </code>
     *
     * @param     mixed $costFreight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCostFreight($costFreight = null, $comparison = null)
    {
        if (is_array($costFreight)) {
            $useMinMax = false;
            if (isset($costFreight['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_COST_FREIGHT, $costFreight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costFreight['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_COST_FREIGHT, $costFreight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_COST_FREIGHT, $costFreight, $comparison);
    }

    /**
     * Filter the query on the route column
     *
     * Example usage:
     * <code>
     * $query->filterByRoute('fooValue');   // WHERE route = 'fooValue'
     * $query->filterByRoute('%fooValue%', Criteria::LIKE); // WHERE route LIKE '%fooValue%'
     * </code>
     *
     * @param     string $route The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByRoute($route = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($route)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ROUTE, $route, $comparison);
    }

    /**
     * Filter the query on the route_seq column
     *
     * Example usage:
     * <code>
     * $query->filterByRouteSeq(1234); // WHERE route_seq = 1234
     * $query->filterByRouteSeq(array(12, 34)); // WHERE route_seq IN (12, 34)
     * $query->filterByRouteSeq(array('min' => 12)); // WHERE route_seq > 12
     * </code>
     *
     * @param     mixed $routeSeq The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByRouteSeq($routeSeq = null, $comparison = null)
    {
        if (is_array($routeSeq)) {
            $useMinMax = false;
            if (isset($routeSeq['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ROUTE_SEQ, $routeSeq['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($routeSeq['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ROUTE_SEQ, $routeSeq['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ROUTE_SEQ, $routeSeq, $comparison);
    }

    /**
     * Filter the query on the edi_855sent column
     *
     * Example usage:
     * <code>
     * $query->filterByEdi855sent('fooValue');   // WHERE edi_855sent = 'fooValue'
     * $query->filterByEdi855sent('%fooValue%', Criteria::LIKE); // WHERE edi_855sent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $edi855sent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByEdi855sent($edi855sent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($edi855sent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_EDI_855SENT, $edi855sent, $comparison);
    }

    /**
     * Filter the query on the freight_3rdparty column
     *
     * Example usage:
     * <code>
     * $query->filterByFreight3rdparty(1234); // WHERE freight_3rdparty = 1234
     * $query->filterByFreight3rdparty(array(12, 34)); // WHERE freight_3rdparty IN (12, 34)
     * $query->filterByFreight3rdparty(array('min' => 12)); // WHERE freight_3rdparty > 12
     * </code>
     *
     * @param     mixed $freight3rdparty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFreight3rdparty($freight3rdparty = null, $comparison = null)
    {
        if (is_array($freight3rdparty)) {
            $useMinMax = false;
            if (isset($freight3rdparty['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_FREIGHT_3RDPARTY, $freight3rdparty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($freight3rdparty['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_FREIGHT_3RDPARTY, $freight3rdparty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FREIGHT_3RDPARTY, $freight3rdparty, $comparison);
    }

    /**
     * Filter the query on the fob column
     *
     * Example usage:
     * <code>
     * $query->filterByFob('fooValue');   // WHERE fob = 'fooValue'
     * $query->filterByFob('%fooValue%', Criteria::LIKE); // WHERE fob LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fob The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFob($fob = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fob)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FOB, $fob, $comparison);
    }

    /**
     * Filter the query on the confirm_image column
     *
     * Example usage:
     * <code>
     * $query->filterByConfirmImage('fooValue');   // WHERE confirm_image = 'fooValue'
     * $query->filterByConfirmImage('%fooValue%', Criteria::LIKE); // WHERE confirm_image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $confirmImage The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByConfirmImage($confirmImage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($confirmImage)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CONFIRM_IMAGE, $confirmImage, $comparison);
    }

    /**
     * Filter the query on the cstk_consign column
     *
     * Example usage:
     * <code>
     * $query->filterByCstkConsign('fooValue');   // WHERE cstk_consign = 'fooValue'
     * $query->filterByCstkConsign('%fooValue%', Criteria::LIKE); // WHERE cstk_consign LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cstkConsign The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCstkConsign($cstkConsign = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cstkConsign)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CSTK_CONSIGN, $cstkConsign, $comparison);
    }

    /**
     * Filter the query on the manufacturer column
     *
     * Example usage:
     * <code>
     * $query->filterByManufacturer('fooValue');   // WHERE manufacturer = 'fooValue'
     * $query->filterByManufacturer('%fooValue%', Criteria::LIKE); // WHERE manufacturer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $manufacturer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByManufacturer($manufacturer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($manufacturer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_MANUFACTURER, $manufacturer, $comparison);
    }

    /**
     * Filter the query on the pick_queue column
     *
     * Example usage:
     * <code>
     * $query->filterByPickQueue('fooValue');   // WHERE pick_queue = 'fooValue'
     * $query->filterByPickQueue('%fooValue%', Criteria::LIKE); // WHERE pick_queue LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pickQueue The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByPickQueue($pickQueue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pickQueue)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_PICK_QUEUE, $pickQueue, $comparison);
    }

    /**
     * Filter the query on the arrive_date column
     *
     * Example usage:
     * <code>
     * $query->filterByArriveDate(1234); // WHERE arrive_date = 1234
     * $query->filterByArriveDate(array(12, 34)); // WHERE arrive_date IN (12, 34)
     * $query->filterByArriveDate(array('min' => 12)); // WHERE arrive_date > 12
     * </code>
     *
     * @param     mixed $arriveDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByArriveDate($arriveDate = null, $comparison = null)
    {
        if (is_array($arriveDate)) {
            $useMinMax = false;
            if (isset($arriveDate['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ARRIVE_DATE, $arriveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($arriveDate['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_ARRIVE_DATE, $arriveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ARRIVE_DATE, $arriveDate, $comparison);
    }

    /**
     * Filter the query on the surcharge_status column
     *
     * Example usage:
     * <code>
     * $query->filterBySurchargeStatus('fooValue');   // WHERE surcharge_status = 'fooValue'
     * $query->filterBySurchargeStatus('%fooValue%', Criteria::LIKE); // WHERE surcharge_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $surchargeStatus The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterBySurchargeStatus($surchargeStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($surchargeStatus)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_SURCHARGE_STATUS, $surchargeStatus, $comparison);
    }

    /**
     * Filter the query on the freight_group column
     *
     * Example usage:
     * <code>
     * $query->filterByFreightGroup('fooValue');   // WHERE freight_group = 'fooValue'
     * $query->filterByFreightGroup('%fooValue%', Criteria::LIKE); // WHERE freight_group LIKE '%fooValue%'
     * </code>
     *
     * @param     string $freightGroup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByFreightGroup($freightGroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($freightGroup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_FREIGHT_GROUP, $freightGroup, $comparison);
    }

    /**
     * Filter the query on the comm_override column
     *
     * Example usage:
     * <code>
     * $query->filterByCommOverride('fooValue');   // WHERE comm_override = 'fooValue'
     * $query->filterByCommOverride('%fooValue%', Criteria::LIKE); // WHERE comm_override LIKE '%fooValue%'
     * </code>
     *
     * @param     string $commOverride The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCommOverride($commOverride = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($commOverride)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_COMM_OVERRIDE, $commOverride, $comparison);
    }

    /**
     * Filter the query on the charge_split column
     *
     * Example usage:
     * <code>
     * $query->filterByChargeSplit('fooValue');   // WHERE charge_split = 'fooValue'
     * $query->filterByChargeSplit('%fooValue%', Criteria::LIKE); // WHERE charge_split LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chargeSplit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByChargeSplit($chargeSplit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chargeSplit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CHARGE_SPLIT, $chargeSplit, $comparison);
    }

    /**
     * Filter the query on the creditcart_approved column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditcartApproved('fooValue');   // WHERE creditcart_approved = 'fooValue'
     * $query->filterByCreditcartApproved('%fooValue%', Criteria::LIKE); // WHERE creditcart_approved LIKE '%fooValue%'
     * </code>
     *
     * @param     string $creditcartApproved The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByCreditcartApproved($creditcartApproved = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($creditcartApproved)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_CREDITCART_APPROVED, $creditcartApproved, $comparison);
    }

    /**
     * Filter the query on the original_ordernumber column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalOrdernumber('fooValue');   // WHERE original_ordernumber = 'fooValue'
     * $query->filterByOriginalOrdernumber('%fooValue%', Criteria::LIKE); // WHERE original_ordernumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $originalOrdernumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByOriginalOrdernumber($originalOrdernumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($originalOrdernumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_ORIGINAL_ORDERNUMBER, $originalOrdernumber, $comparison);
    }

    /**
     * Filter the query on the has_notes column
     *
     * Example usage:
     * <code>
     * $query->filterByHasNotes('fooValue');   // WHERE has_notes = 'fooValue'
     * $query->filterByHasNotes('%fooValue%', Criteria::LIKE); // WHERE has_notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hasNotes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByHasNotes($hasNotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasNotes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_HAS_NOTES, $hasNotes, $comparison);
    }

    /**
     * Filter the query on the has_documents column
     *
     * Example usage:
     * <code>
     * $query->filterByHasDocuments('fooValue');   // WHERE has_documents = 'fooValue'
     * $query->filterByHasDocuments('%fooValue%', Criteria::LIKE); // WHERE has_documents LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hasDocuments The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByHasDocuments($hasDocuments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasDocuments)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_HAS_DOCUMENTS, $hasDocuments, $comparison);
    }

    /**
     * Filter the query on the has_tracking column
     *
     * Example usage:
     * <code>
     * $query->filterByHasTracking('fooValue');   // WHERE has_tracking = 'fooValue'
     * $query->filterByHasTracking('%fooValue%', Criteria::LIKE); // WHERE has_tracking LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hasTracking The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByHasTracking($hasTracking = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasTracking)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_HAS_TRACKING, $hasTracking, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time > 12
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(OeHistTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the dummy column
     *
     * Example usage:
     * <code>
     * $query->filterByDummy('fooValue');   // WHERE dummy = 'fooValue'
     * $query->filterByDummy('%fooValue%', Criteria::LIKE); // WHERE dummy LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dummy The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OeHistTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOeHist $oeHist Object to remove from the list of results
     *
     * @return $this|ChildOeHistQuery The current query, for fluid interface
     */
    public function prune($oeHist = null)
    {
        if ($oeHist) {
            $this->addUsingAlias(OeHistTableMap::COL_ORDERNO, $oeHist->getOrderno(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oe_hist table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OeHistTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OeHistTableMap::clearInstancePool();
            OeHistTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OeHistTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OeHistTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OeHistTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OeHistTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OeHistQuery
