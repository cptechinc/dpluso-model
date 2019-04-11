<?php

namespace Base;

use \Pricing as ChildPricing;
use \PricingQuery as ChildPricingQuery;
use \Exception;
use \PDO;
use Map\PricingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'pricing' table.
 *
 *
 *
 * @method     ChildPricingQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildPricingQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildPricingQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildPricingQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildPricingQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildPricingQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildPricingQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildPricingQuery orderByPriceqty1($order = Criteria::ASC) Order by the priceqty1 column
 * @method     ChildPricingQuery orderByPriceqty2($order = Criteria::ASC) Order by the priceqty2 column
 * @method     ChildPricingQuery orderByPriceqty3($order = Criteria::ASC) Order by the priceqty3 column
 * @method     ChildPricingQuery orderByPriceqty4($order = Criteria::ASC) Order by the priceqty4 column
 * @method     ChildPricingQuery orderByPriceqty5($order = Criteria::ASC) Order by the priceqty5 column
 * @method     ChildPricingQuery orderByPriceqty6($order = Criteria::ASC) Order by the priceqty6 column
 * @method     ChildPricingQuery orderByPriceprice1($order = Criteria::ASC) Order by the priceprice1 column
 * @method     ChildPricingQuery orderByPriceprice2($order = Criteria::ASC) Order by the priceprice2 column
 * @method     ChildPricingQuery orderByPriceprice3($order = Criteria::ASC) Order by the priceprice3 column
 * @method     ChildPricingQuery orderByPriceprice4($order = Criteria::ASC) Order by the priceprice4 column
 * @method     ChildPricingQuery orderByPriceprice5($order = Criteria::ASC) Order by the priceprice5 column
 * @method     ChildPricingQuery orderByPriceprice6($order = Criteria::ASC) Order by the priceprice6 column
 * @method     ChildPricingQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildPricingQuery orderByListprice($order = Criteria::ASC) Order by the listprice column
 * @method     ChildPricingQuery orderByName1($order = Criteria::ASC) Order by the name1 column
 * @method     ChildPricingQuery orderByName2($order = Criteria::ASC) Order by the name2 column
 * @method     ChildPricingQuery orderByShortdesc($order = Criteria::ASC) Order by the shortdesc column
 * @method     ChildPricingQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildPricingQuery orderByFamilyid($order = Criteria::ASC) Order by the familyid column
 * @method     ChildPricingQuery orderByErmes($order = Criteria::ASC) Order by the ermes column
 * @method     ChildPricingQuery orderBySpeca($order = Criteria::ASC) Order by the speca column
 * @method     ChildPricingQuery orderBySpecb($order = Criteria::ASC) Order by the specb column
 * @method     ChildPricingQuery orderBySpecc($order = Criteria::ASC) Order by the specc column
 * @method     ChildPricingQuery orderBySpecd($order = Criteria::ASC) Order by the specd column
 * @method     ChildPricingQuery orderBySpece($order = Criteria::ASC) Order by the spece column
 * @method     ChildPricingQuery orderBySpecf($order = Criteria::ASC) Order by the specf column
 * @method     ChildPricingQuery orderBySpecg($order = Criteria::ASC) Order by the specg column
 * @method     ChildPricingQuery orderBySpech($order = Criteria::ASC) Order by the spech column
 * @method     ChildPricingQuery orderByLongdesc($order = Criteria::ASC) Order by the longdesc column
 * @method     ChildPricingQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildPricingQuery orderByName3($order = Criteria::ASC) Order by the name3 column
 * @method     ChildPricingQuery orderByName4($order = Criteria::ASC) Order by the name4 column
 * @method     ChildPricingQuery orderByThumb($order = Criteria::ASC) Order by the thumb column
 * @method     ChildPricingQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildPricingQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildPricingQuery orderByFamilydes($order = Criteria::ASC) Order by the familydes column
 * @method     ChildPricingQuery orderByKeywords($order = Criteria::ASC) Order by the keywords column
 * @method     ChildPricingQuery orderByVpn($order = Criteria::ASC) Order by the vpn column
 * @method     ChildPricingQuery orderByUomdesc($order = Criteria::ASC) Order by the uomdesc column
 * @method     ChildPricingQuery orderByVidinffg($order = Criteria::ASC) Order by the vidinffg column
 * @method     ChildPricingQuery orderByVidinflk($order = Criteria::ASC) Order by the vidinflk column
 * @method     ChildPricingQuery orderByAdditemflag($order = Criteria::ASC) Order by the additemflag column
 * @method     ChildPricingQuery orderBySchemafam($order = Criteria::ASC) Order by the schemafam column
 * @method     ChildPricingQuery orderByOrigitemid($order = Criteria::ASC) Order by the origitemid column
 * @method     ChildPricingQuery orderByTechspecflg($order = Criteria::ASC) Order by the techspecflg column
 * @method     ChildPricingQuery orderByTechspecname($order = Criteria::ASC) Order by the techspecname column
 * @method     ChildPricingQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method     ChildPricingQuery orderByProp65($order = Criteria::ASC) Order by the prop65 column
 * @method     ChildPricingQuery orderByLeadfree($order = Criteria::ASC) Order by the leadfree column
 * @method     ChildPricingQuery orderByExtendesc($order = Criteria::ASC) Order by the extendesc column
 * @method     ChildPricingQuery orderByMinprice($order = Criteria::ASC) Order by the minprice column
 * @method     ChildPricingQuery orderBySpcord($order = Criteria::ASC) Order by the spcord column
 * @method     ChildPricingQuery orderByVendorid($order = Criteria::ASC) Order by the vendorid column
 * @method     ChildPricingQuery orderByVendoritemid($order = Criteria::ASC) Order by the vendoritemid column
 * @method     ChildPricingQuery orderByShipfromid($order = Criteria::ASC) Order by the shipfromid column
 * @method     ChildPricingQuery orderByNsitemgroup($order = Criteria::ASC) Order by the nsitemgroup column
 * @method     ChildPricingQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildPricingQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildPricingQuery groupBySessionid() Group by the sessionid column
 * @method     ChildPricingQuery groupByRecno() Group by the recno column
 * @method     ChildPricingQuery groupByDate() Group by the date column
 * @method     ChildPricingQuery groupByTime() Group by the time column
 * @method     ChildPricingQuery groupByItemid() Group by the itemid column
 * @method     ChildPricingQuery groupByPrice() Group by the price column
 * @method     ChildPricingQuery groupByQty() Group by the qty column
 * @method     ChildPricingQuery groupByPriceqty1() Group by the priceqty1 column
 * @method     ChildPricingQuery groupByPriceqty2() Group by the priceqty2 column
 * @method     ChildPricingQuery groupByPriceqty3() Group by the priceqty3 column
 * @method     ChildPricingQuery groupByPriceqty4() Group by the priceqty4 column
 * @method     ChildPricingQuery groupByPriceqty5() Group by the priceqty5 column
 * @method     ChildPricingQuery groupByPriceqty6() Group by the priceqty6 column
 * @method     ChildPricingQuery groupByPriceprice1() Group by the priceprice1 column
 * @method     ChildPricingQuery groupByPriceprice2() Group by the priceprice2 column
 * @method     ChildPricingQuery groupByPriceprice3() Group by the priceprice3 column
 * @method     ChildPricingQuery groupByPriceprice4() Group by the priceprice4 column
 * @method     ChildPricingQuery groupByPriceprice5() Group by the priceprice5 column
 * @method     ChildPricingQuery groupByPriceprice6() Group by the priceprice6 column
 * @method     ChildPricingQuery groupByUnit() Group by the unit column
 * @method     ChildPricingQuery groupByListprice() Group by the listprice column
 * @method     ChildPricingQuery groupByName1() Group by the name1 column
 * @method     ChildPricingQuery groupByName2() Group by the name2 column
 * @method     ChildPricingQuery groupByShortdesc() Group by the shortdesc column
 * @method     ChildPricingQuery groupByImage() Group by the image column
 * @method     ChildPricingQuery groupByFamilyid() Group by the familyid column
 * @method     ChildPricingQuery groupByErmes() Group by the ermes column
 * @method     ChildPricingQuery groupBySpeca() Group by the speca column
 * @method     ChildPricingQuery groupBySpecb() Group by the specb column
 * @method     ChildPricingQuery groupBySpecc() Group by the specc column
 * @method     ChildPricingQuery groupBySpecd() Group by the specd column
 * @method     ChildPricingQuery groupBySpece() Group by the spece column
 * @method     ChildPricingQuery groupBySpecf() Group by the specf column
 * @method     ChildPricingQuery groupBySpecg() Group by the specg column
 * @method     ChildPricingQuery groupBySpech() Group by the spech column
 * @method     ChildPricingQuery groupByLongdesc() Group by the longdesc column
 * @method     ChildPricingQuery groupByOrderno() Group by the orderno column
 * @method     ChildPricingQuery groupByName3() Group by the name3 column
 * @method     ChildPricingQuery groupByName4() Group by the name4 column
 * @method     ChildPricingQuery groupByThumb() Group by the thumb column
 * @method     ChildPricingQuery groupByWidth() Group by the width column
 * @method     ChildPricingQuery groupByHeight() Group by the height column
 * @method     ChildPricingQuery groupByFamilydes() Group by the familydes column
 * @method     ChildPricingQuery groupByKeywords() Group by the keywords column
 * @method     ChildPricingQuery groupByVpn() Group by the vpn column
 * @method     ChildPricingQuery groupByUomdesc() Group by the uomdesc column
 * @method     ChildPricingQuery groupByVidinffg() Group by the vidinffg column
 * @method     ChildPricingQuery groupByVidinflk() Group by the vidinflk column
 * @method     ChildPricingQuery groupByAdditemflag() Group by the additemflag column
 * @method     ChildPricingQuery groupBySchemafam() Group by the schemafam column
 * @method     ChildPricingQuery groupByOrigitemid() Group by the origitemid column
 * @method     ChildPricingQuery groupByTechspecflg() Group by the techspecflg column
 * @method     ChildPricingQuery groupByTechspecname() Group by the techspecname column
 * @method     ChildPricingQuery groupByCost() Group by the cost column
 * @method     ChildPricingQuery groupByProp65() Group by the prop65 column
 * @method     ChildPricingQuery groupByLeadfree() Group by the leadfree column
 * @method     ChildPricingQuery groupByExtendesc() Group by the extendesc column
 * @method     ChildPricingQuery groupByMinprice() Group by the minprice column
 * @method     ChildPricingQuery groupBySpcord() Group by the spcord column
 * @method     ChildPricingQuery groupByVendorid() Group by the vendorid column
 * @method     ChildPricingQuery groupByVendoritemid() Group by the vendoritemid column
 * @method     ChildPricingQuery groupByShipfromid() Group by the shipfromid column
 * @method     ChildPricingQuery groupByNsitemgroup() Group by the nsitemgroup column
 * @method     ChildPricingQuery groupByItemtype() Group by the itemtype column
 * @method     ChildPricingQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildPricingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPricingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPricingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPricingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPricingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPricingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPricing findOne(ConnectionInterface $con = null) Return the first ChildPricing matching the query
 * @method     ChildPricing findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPricing matching the query, or a new ChildPricing object populated from the query conditions when no match is found
 *
 * @method     ChildPricing findOneBySessionid(string $sessionid) Return the first ChildPricing filtered by the sessionid column
 * @method     ChildPricing findOneByRecno(int $recno) Return the first ChildPricing filtered by the recno column
 * @method     ChildPricing findOneByDate(int $date) Return the first ChildPricing filtered by the date column
 * @method     ChildPricing findOneByTime(int $time) Return the first ChildPricing filtered by the time column
 * @method     ChildPricing findOneByItemid(string $itemid) Return the first ChildPricing filtered by the itemid column
 * @method     ChildPricing findOneByPrice(string $price) Return the first ChildPricing filtered by the price column
 * @method     ChildPricing findOneByQty(int $qty) Return the first ChildPricing filtered by the qty column
 * @method     ChildPricing findOneByPriceqty1(int $priceqty1) Return the first ChildPricing filtered by the priceqty1 column
 * @method     ChildPricing findOneByPriceqty2(int $priceqty2) Return the first ChildPricing filtered by the priceqty2 column
 * @method     ChildPricing findOneByPriceqty3(int $priceqty3) Return the first ChildPricing filtered by the priceqty3 column
 * @method     ChildPricing findOneByPriceqty4(int $priceqty4) Return the first ChildPricing filtered by the priceqty4 column
 * @method     ChildPricing findOneByPriceqty5(int $priceqty5) Return the first ChildPricing filtered by the priceqty5 column
 * @method     ChildPricing findOneByPriceqty6(int $priceqty6) Return the first ChildPricing filtered by the priceqty6 column
 * @method     ChildPricing findOneByPriceprice1(string $priceprice1) Return the first ChildPricing filtered by the priceprice1 column
 * @method     ChildPricing findOneByPriceprice2(string $priceprice2) Return the first ChildPricing filtered by the priceprice2 column
 * @method     ChildPricing findOneByPriceprice3(string $priceprice3) Return the first ChildPricing filtered by the priceprice3 column
 * @method     ChildPricing findOneByPriceprice4(string $priceprice4) Return the first ChildPricing filtered by the priceprice4 column
 * @method     ChildPricing findOneByPriceprice5(string $priceprice5) Return the first ChildPricing filtered by the priceprice5 column
 * @method     ChildPricing findOneByPriceprice6(string $priceprice6) Return the first ChildPricing filtered by the priceprice6 column
 * @method     ChildPricing findOneByUnit(string $unit) Return the first ChildPricing filtered by the unit column
 * @method     ChildPricing findOneByListprice(string $listprice) Return the first ChildPricing filtered by the listprice column
 * @method     ChildPricing findOneByName1(string $name1) Return the first ChildPricing filtered by the name1 column
 * @method     ChildPricing findOneByName2(string $name2) Return the first ChildPricing filtered by the name2 column
 * @method     ChildPricing findOneByShortdesc(string $shortdesc) Return the first ChildPricing filtered by the shortdesc column
 * @method     ChildPricing findOneByImage(string $image) Return the first ChildPricing filtered by the image column
 * @method     ChildPricing findOneByFamilyid(string $familyid) Return the first ChildPricing filtered by the familyid column
 * @method     ChildPricing findOneByErmes(string $ermes) Return the first ChildPricing filtered by the ermes column
 * @method     ChildPricing findOneBySpeca(string $speca) Return the first ChildPricing filtered by the speca column
 * @method     ChildPricing findOneBySpecb(string $specb) Return the first ChildPricing filtered by the specb column
 * @method     ChildPricing findOneBySpecc(string $specc) Return the first ChildPricing filtered by the specc column
 * @method     ChildPricing findOneBySpecd(string $specd) Return the first ChildPricing filtered by the specd column
 * @method     ChildPricing findOneBySpece(string $spece) Return the first ChildPricing filtered by the spece column
 * @method     ChildPricing findOneBySpecf(string $specf) Return the first ChildPricing filtered by the specf column
 * @method     ChildPricing findOneBySpecg(string $specg) Return the first ChildPricing filtered by the specg column
 * @method     ChildPricing findOneBySpech(string $spech) Return the first ChildPricing filtered by the spech column
 * @method     ChildPricing findOneByLongdesc(string $longdesc) Return the first ChildPricing filtered by the longdesc column
 * @method     ChildPricing findOneByOrderno(string $orderno) Return the first ChildPricing filtered by the orderno column
 * @method     ChildPricing findOneByName3(string $name3) Return the first ChildPricing filtered by the name3 column
 * @method     ChildPricing findOneByName4(string $name4) Return the first ChildPricing filtered by the name4 column
 * @method     ChildPricing findOneByThumb(string $thumb) Return the first ChildPricing filtered by the thumb column
 * @method     ChildPricing findOneByWidth(string $width) Return the first ChildPricing filtered by the width column
 * @method     ChildPricing findOneByHeight(string $height) Return the first ChildPricing filtered by the height column
 * @method     ChildPricing findOneByFamilydes(string $familydes) Return the first ChildPricing filtered by the familydes column
 * @method     ChildPricing findOneByKeywords(string $keywords) Return the first ChildPricing filtered by the keywords column
 * @method     ChildPricing findOneByVpn(string $vpn) Return the first ChildPricing filtered by the vpn column
 * @method     ChildPricing findOneByUomdesc(string $uomdesc) Return the first ChildPricing filtered by the uomdesc column
 * @method     ChildPricing findOneByVidinffg(string $vidinffg) Return the first ChildPricing filtered by the vidinffg column
 * @method     ChildPricing findOneByVidinflk(string $vidinflk) Return the first ChildPricing filtered by the vidinflk column
 * @method     ChildPricing findOneByAdditemflag(string $additemflag) Return the first ChildPricing filtered by the additemflag column
 * @method     ChildPricing findOneBySchemafam(string $schemafam) Return the first ChildPricing filtered by the schemafam column
 * @method     ChildPricing findOneByOrigitemid(string $origitemid) Return the first ChildPricing filtered by the origitemid column
 * @method     ChildPricing findOneByTechspecflg(string $techspecflg) Return the first ChildPricing filtered by the techspecflg column
 * @method     ChildPricing findOneByTechspecname(string $techspecname) Return the first ChildPricing filtered by the techspecname column
 * @method     ChildPricing findOneByCost(string $cost) Return the first ChildPricing filtered by the cost column
 * @method     ChildPricing findOneByProp65(string $prop65) Return the first ChildPricing filtered by the prop65 column
 * @method     ChildPricing findOneByLeadfree(string $leadfree) Return the first ChildPricing filtered by the leadfree column
 * @method     ChildPricing findOneByExtendesc(string $extendesc) Return the first ChildPricing filtered by the extendesc column
 * @method     ChildPricing findOneByMinprice(string $minprice) Return the first ChildPricing filtered by the minprice column
 * @method     ChildPricing findOneBySpcord(string $spcord) Return the first ChildPricing filtered by the spcord column
 * @method     ChildPricing findOneByVendorid(string $vendorid) Return the first ChildPricing filtered by the vendorid column
 * @method     ChildPricing findOneByVendoritemid(string $vendoritemid) Return the first ChildPricing filtered by the vendoritemid column
 * @method     ChildPricing findOneByShipfromid(string $shipfromid) Return the first ChildPricing filtered by the shipfromid column
 * @method     ChildPricing findOneByNsitemgroup(string $nsitemgroup) Return the first ChildPricing filtered by the nsitemgroup column
 * @method     ChildPricing findOneByItemtype(string $itemtype) Return the first ChildPricing filtered by the itemtype column
 * @method     ChildPricing findOneByDummy(string $dummy) Return the first ChildPricing filtered by the dummy column *

 * @method     ChildPricing requirePk($key, ConnectionInterface $con = null) Return the ChildPricing by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOne(ConnectionInterface $con = null) Return the first ChildPricing matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPricing requireOneBySessionid(string $sessionid) Return the first ChildPricing filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByRecno(int $recno) Return the first ChildPricing filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByDate(int $date) Return the first ChildPricing filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByTime(int $time) Return the first ChildPricing filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByItemid(string $itemid) Return the first ChildPricing filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPrice(string $price) Return the first ChildPricing filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByQty(int $qty) Return the first ChildPricing filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceqty1(int $priceqty1) Return the first ChildPricing filtered by the priceqty1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceqty2(int $priceqty2) Return the first ChildPricing filtered by the priceqty2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceqty3(int $priceqty3) Return the first ChildPricing filtered by the priceqty3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceqty4(int $priceqty4) Return the first ChildPricing filtered by the priceqty4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceqty5(int $priceqty5) Return the first ChildPricing filtered by the priceqty5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceqty6(int $priceqty6) Return the first ChildPricing filtered by the priceqty6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceprice1(string $priceprice1) Return the first ChildPricing filtered by the priceprice1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceprice2(string $priceprice2) Return the first ChildPricing filtered by the priceprice2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceprice3(string $priceprice3) Return the first ChildPricing filtered by the priceprice3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceprice4(string $priceprice4) Return the first ChildPricing filtered by the priceprice4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceprice5(string $priceprice5) Return the first ChildPricing filtered by the priceprice5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByPriceprice6(string $priceprice6) Return the first ChildPricing filtered by the priceprice6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByUnit(string $unit) Return the first ChildPricing filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByListprice(string $listprice) Return the first ChildPricing filtered by the listprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByName1(string $name1) Return the first ChildPricing filtered by the name1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByName2(string $name2) Return the first ChildPricing filtered by the name2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByShortdesc(string $shortdesc) Return the first ChildPricing filtered by the shortdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByImage(string $image) Return the first ChildPricing filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByFamilyid(string $familyid) Return the first ChildPricing filtered by the familyid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByErmes(string $ermes) Return the first ChildPricing filtered by the ermes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpeca(string $speca) Return the first ChildPricing filtered by the speca column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpecb(string $specb) Return the first ChildPricing filtered by the specb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpecc(string $specc) Return the first ChildPricing filtered by the specc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpecd(string $specd) Return the first ChildPricing filtered by the specd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpece(string $spece) Return the first ChildPricing filtered by the spece column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpecf(string $specf) Return the first ChildPricing filtered by the specf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpecg(string $specg) Return the first ChildPricing filtered by the specg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpech(string $spech) Return the first ChildPricing filtered by the spech column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByLongdesc(string $longdesc) Return the first ChildPricing filtered by the longdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByOrderno(string $orderno) Return the first ChildPricing filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByName3(string $name3) Return the first ChildPricing filtered by the name3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByName4(string $name4) Return the first ChildPricing filtered by the name4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByThumb(string $thumb) Return the first ChildPricing filtered by the thumb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByWidth(string $width) Return the first ChildPricing filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByHeight(string $height) Return the first ChildPricing filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByFamilydes(string $familydes) Return the first ChildPricing filtered by the familydes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByKeywords(string $keywords) Return the first ChildPricing filtered by the keywords column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByVpn(string $vpn) Return the first ChildPricing filtered by the vpn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByUomdesc(string $uomdesc) Return the first ChildPricing filtered by the uomdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByVidinffg(string $vidinffg) Return the first ChildPricing filtered by the vidinffg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByVidinflk(string $vidinflk) Return the first ChildPricing filtered by the vidinflk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByAdditemflag(string $additemflag) Return the first ChildPricing filtered by the additemflag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySchemafam(string $schemafam) Return the first ChildPricing filtered by the schemafam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByOrigitemid(string $origitemid) Return the first ChildPricing filtered by the origitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByTechspecflg(string $techspecflg) Return the first ChildPricing filtered by the techspecflg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByTechspecname(string $techspecname) Return the first ChildPricing filtered by the techspecname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByCost(string $cost) Return the first ChildPricing filtered by the cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByProp65(string $prop65) Return the first ChildPricing filtered by the prop65 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByLeadfree(string $leadfree) Return the first ChildPricing filtered by the leadfree column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByExtendesc(string $extendesc) Return the first ChildPricing filtered by the extendesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByMinprice(string $minprice) Return the first ChildPricing filtered by the minprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneBySpcord(string $spcord) Return the first ChildPricing filtered by the spcord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByVendorid(string $vendorid) Return the first ChildPricing filtered by the vendorid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByVendoritemid(string $vendoritemid) Return the first ChildPricing filtered by the vendoritemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByShipfromid(string $shipfromid) Return the first ChildPricing filtered by the shipfromid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByNsitemgroup(string $nsitemgroup) Return the first ChildPricing filtered by the nsitemgroup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByItemtype(string $itemtype) Return the first ChildPricing filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPricing requireOneByDummy(string $dummy) Return the first ChildPricing filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPricing[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPricing objects based on current ModelCriteria
 * @method     ChildPricing[]|ObjectCollection findBySessionid(string $sessionid) Return ChildPricing objects filtered by the sessionid column
 * @method     ChildPricing[]|ObjectCollection findByRecno(int $recno) Return ChildPricing objects filtered by the recno column
 * @method     ChildPricing[]|ObjectCollection findByDate(int $date) Return ChildPricing objects filtered by the date column
 * @method     ChildPricing[]|ObjectCollection findByTime(int $time) Return ChildPricing objects filtered by the time column
 * @method     ChildPricing[]|ObjectCollection findByItemid(string $itemid) Return ChildPricing objects filtered by the itemid column
 * @method     ChildPricing[]|ObjectCollection findByPrice(string $price) Return ChildPricing objects filtered by the price column
 * @method     ChildPricing[]|ObjectCollection findByQty(int $qty) Return ChildPricing objects filtered by the qty column
 * @method     ChildPricing[]|ObjectCollection findByPriceqty1(int $priceqty1) Return ChildPricing objects filtered by the priceqty1 column
 * @method     ChildPricing[]|ObjectCollection findByPriceqty2(int $priceqty2) Return ChildPricing objects filtered by the priceqty2 column
 * @method     ChildPricing[]|ObjectCollection findByPriceqty3(int $priceqty3) Return ChildPricing objects filtered by the priceqty3 column
 * @method     ChildPricing[]|ObjectCollection findByPriceqty4(int $priceqty4) Return ChildPricing objects filtered by the priceqty4 column
 * @method     ChildPricing[]|ObjectCollection findByPriceqty5(int $priceqty5) Return ChildPricing objects filtered by the priceqty5 column
 * @method     ChildPricing[]|ObjectCollection findByPriceqty6(int $priceqty6) Return ChildPricing objects filtered by the priceqty6 column
 * @method     ChildPricing[]|ObjectCollection findByPriceprice1(string $priceprice1) Return ChildPricing objects filtered by the priceprice1 column
 * @method     ChildPricing[]|ObjectCollection findByPriceprice2(string $priceprice2) Return ChildPricing objects filtered by the priceprice2 column
 * @method     ChildPricing[]|ObjectCollection findByPriceprice3(string $priceprice3) Return ChildPricing objects filtered by the priceprice3 column
 * @method     ChildPricing[]|ObjectCollection findByPriceprice4(string $priceprice4) Return ChildPricing objects filtered by the priceprice4 column
 * @method     ChildPricing[]|ObjectCollection findByPriceprice5(string $priceprice5) Return ChildPricing objects filtered by the priceprice5 column
 * @method     ChildPricing[]|ObjectCollection findByPriceprice6(string $priceprice6) Return ChildPricing objects filtered by the priceprice6 column
 * @method     ChildPricing[]|ObjectCollection findByUnit(string $unit) Return ChildPricing objects filtered by the unit column
 * @method     ChildPricing[]|ObjectCollection findByListprice(string $listprice) Return ChildPricing objects filtered by the listprice column
 * @method     ChildPricing[]|ObjectCollection findByName1(string $name1) Return ChildPricing objects filtered by the name1 column
 * @method     ChildPricing[]|ObjectCollection findByName2(string $name2) Return ChildPricing objects filtered by the name2 column
 * @method     ChildPricing[]|ObjectCollection findByShortdesc(string $shortdesc) Return ChildPricing objects filtered by the shortdesc column
 * @method     ChildPricing[]|ObjectCollection findByImage(string $image) Return ChildPricing objects filtered by the image column
 * @method     ChildPricing[]|ObjectCollection findByFamilyid(string $familyid) Return ChildPricing objects filtered by the familyid column
 * @method     ChildPricing[]|ObjectCollection findByErmes(string $ermes) Return ChildPricing objects filtered by the ermes column
 * @method     ChildPricing[]|ObjectCollection findBySpeca(string $speca) Return ChildPricing objects filtered by the speca column
 * @method     ChildPricing[]|ObjectCollection findBySpecb(string $specb) Return ChildPricing objects filtered by the specb column
 * @method     ChildPricing[]|ObjectCollection findBySpecc(string $specc) Return ChildPricing objects filtered by the specc column
 * @method     ChildPricing[]|ObjectCollection findBySpecd(string $specd) Return ChildPricing objects filtered by the specd column
 * @method     ChildPricing[]|ObjectCollection findBySpece(string $spece) Return ChildPricing objects filtered by the spece column
 * @method     ChildPricing[]|ObjectCollection findBySpecf(string $specf) Return ChildPricing objects filtered by the specf column
 * @method     ChildPricing[]|ObjectCollection findBySpecg(string $specg) Return ChildPricing objects filtered by the specg column
 * @method     ChildPricing[]|ObjectCollection findBySpech(string $spech) Return ChildPricing objects filtered by the spech column
 * @method     ChildPricing[]|ObjectCollection findByLongdesc(string $longdesc) Return ChildPricing objects filtered by the longdesc column
 * @method     ChildPricing[]|ObjectCollection findByOrderno(string $orderno) Return ChildPricing objects filtered by the orderno column
 * @method     ChildPricing[]|ObjectCollection findByName3(string $name3) Return ChildPricing objects filtered by the name3 column
 * @method     ChildPricing[]|ObjectCollection findByName4(string $name4) Return ChildPricing objects filtered by the name4 column
 * @method     ChildPricing[]|ObjectCollection findByThumb(string $thumb) Return ChildPricing objects filtered by the thumb column
 * @method     ChildPricing[]|ObjectCollection findByWidth(string $width) Return ChildPricing objects filtered by the width column
 * @method     ChildPricing[]|ObjectCollection findByHeight(string $height) Return ChildPricing objects filtered by the height column
 * @method     ChildPricing[]|ObjectCollection findByFamilydes(string $familydes) Return ChildPricing objects filtered by the familydes column
 * @method     ChildPricing[]|ObjectCollection findByKeywords(string $keywords) Return ChildPricing objects filtered by the keywords column
 * @method     ChildPricing[]|ObjectCollection findByVpn(string $vpn) Return ChildPricing objects filtered by the vpn column
 * @method     ChildPricing[]|ObjectCollection findByUomdesc(string $uomdesc) Return ChildPricing objects filtered by the uomdesc column
 * @method     ChildPricing[]|ObjectCollection findByVidinffg(string $vidinffg) Return ChildPricing objects filtered by the vidinffg column
 * @method     ChildPricing[]|ObjectCollection findByVidinflk(string $vidinflk) Return ChildPricing objects filtered by the vidinflk column
 * @method     ChildPricing[]|ObjectCollection findByAdditemflag(string $additemflag) Return ChildPricing objects filtered by the additemflag column
 * @method     ChildPricing[]|ObjectCollection findBySchemafam(string $schemafam) Return ChildPricing objects filtered by the schemafam column
 * @method     ChildPricing[]|ObjectCollection findByOrigitemid(string $origitemid) Return ChildPricing objects filtered by the origitemid column
 * @method     ChildPricing[]|ObjectCollection findByTechspecflg(string $techspecflg) Return ChildPricing objects filtered by the techspecflg column
 * @method     ChildPricing[]|ObjectCollection findByTechspecname(string $techspecname) Return ChildPricing objects filtered by the techspecname column
 * @method     ChildPricing[]|ObjectCollection findByCost(string $cost) Return ChildPricing objects filtered by the cost column
 * @method     ChildPricing[]|ObjectCollection findByProp65(string $prop65) Return ChildPricing objects filtered by the prop65 column
 * @method     ChildPricing[]|ObjectCollection findByLeadfree(string $leadfree) Return ChildPricing objects filtered by the leadfree column
 * @method     ChildPricing[]|ObjectCollection findByExtendesc(string $extendesc) Return ChildPricing objects filtered by the extendesc column
 * @method     ChildPricing[]|ObjectCollection findByMinprice(string $minprice) Return ChildPricing objects filtered by the minprice column
 * @method     ChildPricing[]|ObjectCollection findBySpcord(string $spcord) Return ChildPricing objects filtered by the spcord column
 * @method     ChildPricing[]|ObjectCollection findByVendorid(string $vendorid) Return ChildPricing objects filtered by the vendorid column
 * @method     ChildPricing[]|ObjectCollection findByVendoritemid(string $vendoritemid) Return ChildPricing objects filtered by the vendoritemid column
 * @method     ChildPricing[]|ObjectCollection findByShipfromid(string $shipfromid) Return ChildPricing objects filtered by the shipfromid column
 * @method     ChildPricing[]|ObjectCollection findByNsitemgroup(string $nsitemgroup) Return ChildPricing objects filtered by the nsitemgroup column
 * @method     ChildPricing[]|ObjectCollection findByItemtype(string $itemtype) Return ChildPricing objects filtered by the itemtype column
 * @method     ChildPricing[]|ObjectCollection findByDummy(string $dummy) Return ChildPricing objects filtered by the dummy column
 * @method     ChildPricing[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PricingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PricingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Pricing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPricingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPricingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPricingQuery) {
            return $criteria;
        }
        $query = new ChildPricingQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$sessionid, $recno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPricing|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PricingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PricingTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildPricing A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, itemid, price, qty, priceqty1, priceqty2, priceqty3, priceqty4, priceqty5, priceqty6, priceprice1, priceprice2, priceprice3, priceprice4, priceprice5, priceprice6, unit, listprice, name1, name2, shortdesc, image, familyid, ermes, speca, specb, specc, specd, spece, specf, specg, spech, longdesc, orderno, name3, name4, thumb, width, height, familydes, keywords, vpn, uomdesc, vidinffg, vidinflk, additemflag, schemafam, origitemid, techspecflg, techspecname, cost, prop65, leadfree, extendesc, minprice, spcord, vendorid, vendoritemid, shipfromid, nsitemgroup, itemtype, dummy FROM pricing WHERE sessionid = :p0 AND recno = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPricing $obj */
            $obj = new ChildPricing();
            $obj->hydrate($row);
            PricingTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildPricing|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PricingTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PricingTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PricingTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PricingTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the sessionid column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionid('fooValue');   // WHERE sessionid = 'fooValue'
     * $query->filterBySessionid('%fooValue%', Criteria::LIKE); // WHERE sessionid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the recno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecno(1234); // WHERE recno = 1234
     * $query->filterByRecno(array(12, 34)); // WHERE recno IN (12, 34)
     * $query->filterByRecno(array('min' => 12)); // WHERE recno > 12
     * </code>
     *
     * @param     mixed $recno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty(1234); // WHERE qty = 1234
     * $query->filterByQty(array(12, 34)); // WHERE qty IN (12, 34)
     * $query->filterByQty(array('min' => 12)); // WHERE qty > 12
     * </code>
     *
     * @param     mixed $qty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the priceqty1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty1(1234); // WHERE priceqty1 = 1234
     * $query->filterByPriceqty1(array(12, 34)); // WHERE priceqty1 IN (12, 34)
     * $query->filterByPriceqty1(array('min' => 12)); // WHERE priceqty1 > 12
     * </code>
     *
     * @param     mixed $priceqty1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceqty1($priceqty1 = null, $comparison = null)
    {
        if (is_array($priceqty1)) {
            $useMinMax = false;
            if (isset($priceqty1['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY1, $priceqty1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty1['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY1, $priceqty1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEQTY1, $priceqty1, $comparison);
    }

    /**
     * Filter the query on the priceqty2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty2(1234); // WHERE priceqty2 = 1234
     * $query->filterByPriceqty2(array(12, 34)); // WHERE priceqty2 IN (12, 34)
     * $query->filterByPriceqty2(array('min' => 12)); // WHERE priceqty2 > 12
     * </code>
     *
     * @param     mixed $priceqty2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceqty2($priceqty2 = null, $comparison = null)
    {
        if (is_array($priceqty2)) {
            $useMinMax = false;
            if (isset($priceqty2['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY2, $priceqty2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty2['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY2, $priceqty2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEQTY2, $priceqty2, $comparison);
    }

    /**
     * Filter the query on the priceqty3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty3(1234); // WHERE priceqty3 = 1234
     * $query->filterByPriceqty3(array(12, 34)); // WHERE priceqty3 IN (12, 34)
     * $query->filterByPriceqty3(array('min' => 12)); // WHERE priceqty3 > 12
     * </code>
     *
     * @param     mixed $priceqty3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceqty3($priceqty3 = null, $comparison = null)
    {
        if (is_array($priceqty3)) {
            $useMinMax = false;
            if (isset($priceqty3['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY3, $priceqty3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty3['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY3, $priceqty3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEQTY3, $priceqty3, $comparison);
    }

    /**
     * Filter the query on the priceqty4 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty4(1234); // WHERE priceqty4 = 1234
     * $query->filterByPriceqty4(array(12, 34)); // WHERE priceqty4 IN (12, 34)
     * $query->filterByPriceqty4(array('min' => 12)); // WHERE priceqty4 > 12
     * </code>
     *
     * @param     mixed $priceqty4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceqty4($priceqty4 = null, $comparison = null)
    {
        if (is_array($priceqty4)) {
            $useMinMax = false;
            if (isset($priceqty4['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY4, $priceqty4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty4['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY4, $priceqty4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEQTY4, $priceqty4, $comparison);
    }

    /**
     * Filter the query on the priceqty5 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty5(1234); // WHERE priceqty5 = 1234
     * $query->filterByPriceqty5(array(12, 34)); // WHERE priceqty5 IN (12, 34)
     * $query->filterByPriceqty5(array('min' => 12)); // WHERE priceqty5 > 12
     * </code>
     *
     * @param     mixed $priceqty5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceqty5($priceqty5 = null, $comparison = null)
    {
        if (is_array($priceqty5)) {
            $useMinMax = false;
            if (isset($priceqty5['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY5, $priceqty5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty5['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY5, $priceqty5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEQTY5, $priceqty5, $comparison);
    }

    /**
     * Filter the query on the priceqty6 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty6(1234); // WHERE priceqty6 = 1234
     * $query->filterByPriceqty6(array(12, 34)); // WHERE priceqty6 IN (12, 34)
     * $query->filterByPriceqty6(array('min' => 12)); // WHERE priceqty6 > 12
     * </code>
     *
     * @param     mixed $priceqty6 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceqty6($priceqty6 = null, $comparison = null)
    {
        if (is_array($priceqty6)) {
            $useMinMax = false;
            if (isset($priceqty6['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY6, $priceqty6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty6['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEQTY6, $priceqty6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEQTY6, $priceqty6, $comparison);
    }

    /**
     * Filter the query on the priceprice1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice1(1234); // WHERE priceprice1 = 1234
     * $query->filterByPriceprice1(array(12, 34)); // WHERE priceprice1 IN (12, 34)
     * $query->filterByPriceprice1(array('min' => 12)); // WHERE priceprice1 > 12
     * </code>
     *
     * @param     mixed $priceprice1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceprice1($priceprice1 = null, $comparison = null)
    {
        if (is_array($priceprice1)) {
            $useMinMax = false;
            if (isset($priceprice1['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE1, $priceprice1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice1['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE1, $priceprice1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE1, $priceprice1, $comparison);
    }

    /**
     * Filter the query on the priceprice2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice2(1234); // WHERE priceprice2 = 1234
     * $query->filterByPriceprice2(array(12, 34)); // WHERE priceprice2 IN (12, 34)
     * $query->filterByPriceprice2(array('min' => 12)); // WHERE priceprice2 > 12
     * </code>
     *
     * @param     mixed $priceprice2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceprice2($priceprice2 = null, $comparison = null)
    {
        if (is_array($priceprice2)) {
            $useMinMax = false;
            if (isset($priceprice2['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE2, $priceprice2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice2['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE2, $priceprice2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE2, $priceprice2, $comparison);
    }

    /**
     * Filter the query on the priceprice3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice3(1234); // WHERE priceprice3 = 1234
     * $query->filterByPriceprice3(array(12, 34)); // WHERE priceprice3 IN (12, 34)
     * $query->filterByPriceprice3(array('min' => 12)); // WHERE priceprice3 > 12
     * </code>
     *
     * @param     mixed $priceprice3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceprice3($priceprice3 = null, $comparison = null)
    {
        if (is_array($priceprice3)) {
            $useMinMax = false;
            if (isset($priceprice3['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE3, $priceprice3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice3['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE3, $priceprice3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE3, $priceprice3, $comparison);
    }

    /**
     * Filter the query on the priceprice4 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice4(1234); // WHERE priceprice4 = 1234
     * $query->filterByPriceprice4(array(12, 34)); // WHERE priceprice4 IN (12, 34)
     * $query->filterByPriceprice4(array('min' => 12)); // WHERE priceprice4 > 12
     * </code>
     *
     * @param     mixed $priceprice4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceprice4($priceprice4 = null, $comparison = null)
    {
        if (is_array($priceprice4)) {
            $useMinMax = false;
            if (isset($priceprice4['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE4, $priceprice4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice4['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE4, $priceprice4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE4, $priceprice4, $comparison);
    }

    /**
     * Filter the query on the priceprice5 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice5(1234); // WHERE priceprice5 = 1234
     * $query->filterByPriceprice5(array(12, 34)); // WHERE priceprice5 IN (12, 34)
     * $query->filterByPriceprice5(array('min' => 12)); // WHERE priceprice5 > 12
     * </code>
     *
     * @param     mixed $priceprice5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceprice5($priceprice5 = null, $comparison = null)
    {
        if (is_array($priceprice5)) {
            $useMinMax = false;
            if (isset($priceprice5['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE5, $priceprice5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice5['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE5, $priceprice5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE5, $priceprice5, $comparison);
    }

    /**
     * Filter the query on the priceprice6 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice6(1234); // WHERE priceprice6 = 1234
     * $query->filterByPriceprice6(array(12, 34)); // WHERE priceprice6 IN (12, 34)
     * $query->filterByPriceprice6(array('min' => 12)); // WHERE priceprice6 > 12
     * </code>
     *
     * @param     mixed $priceprice6 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByPriceprice6($priceprice6 = null, $comparison = null)
    {
        if (is_array($priceprice6)) {
            $useMinMax = false;
            if (isset($priceprice6['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE6, $priceprice6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice6['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE6, $priceprice6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PRICEPRICE6, $priceprice6, $comparison);
    }

    /**
     * Filter the query on the unit column
     *
     * Example usage:
     * <code>
     * $query->filterByUnit('fooValue');   // WHERE unit = 'fooValue'
     * $query->filterByUnit('%fooValue%', Criteria::LIKE); // WHERE unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_UNIT, $unit, $comparison);
    }

    /**
     * Filter the query on the listprice column
     *
     * Example usage:
     * <code>
     * $query->filterByListprice(1234); // WHERE listprice = 1234
     * $query->filterByListprice(array(12, 34)); // WHERE listprice IN (12, 34)
     * $query->filterByListprice(array('min' => 12)); // WHERE listprice > 12
     * </code>
     *
     * @param     mixed $listprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByListprice($listprice = null, $comparison = null)
    {
        if (is_array($listprice)) {
            $useMinMax = false;
            if (isset($listprice['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_LISTPRICE, $listprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($listprice['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_LISTPRICE, $listprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_LISTPRICE, $listprice, $comparison);
    }

    /**
     * Filter the query on the name1 column
     *
     * Example usage:
     * <code>
     * $query->filterByName1('fooValue');   // WHERE name1 = 'fooValue'
     * $query->filterByName1('%fooValue%', Criteria::LIKE); // WHERE name1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByName1($name1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_NAME1, $name1, $comparison);
    }

    /**
     * Filter the query on the name2 column
     *
     * Example usage:
     * <code>
     * $query->filterByName2('fooValue');   // WHERE name2 = 'fooValue'
     * $query->filterByName2('%fooValue%', Criteria::LIKE); // WHERE name2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByName2($name2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_NAME2, $name2, $comparison);
    }

    /**
     * Filter the query on the shortdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByShortdesc('fooValue');   // WHERE shortdesc = 'fooValue'
     * $query->filterByShortdesc('%fooValue%', Criteria::LIKE); // WHERE shortdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shortdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByShortdesc($shortdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SHORTDESC, $shortdesc, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the familyid column
     *
     * Example usage:
     * <code>
     * $query->filterByFamilyid('fooValue');   // WHERE familyid = 'fooValue'
     * $query->filterByFamilyid('%fooValue%', Criteria::LIKE); // WHERE familyid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $familyid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByFamilyid($familyid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($familyid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_FAMILYID, $familyid, $comparison);
    }

    /**
     * Filter the query on the ermes column
     *
     * Example usage:
     * <code>
     * $query->filterByErmes('fooValue');   // WHERE ermes = 'fooValue'
     * $query->filterByErmes('%fooValue%', Criteria::LIKE); // WHERE ermes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ermes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByErmes($ermes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ermes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_ERMES, $ermes, $comparison);
    }

    /**
     * Filter the query on the speca column
     *
     * Example usage:
     * <code>
     * $query->filterBySpeca('fooValue');   // WHERE speca = 'fooValue'
     * $query->filterBySpeca('%fooValue%', Criteria::LIKE); // WHERE speca LIKE '%fooValue%'
     * </code>
     *
     * @param     string $speca The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpeca($speca = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($speca)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPECA, $speca, $comparison);
    }

    /**
     * Filter the query on the specb column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecb('fooValue');   // WHERE specb = 'fooValue'
     * $query->filterBySpecb('%fooValue%', Criteria::LIKE); // WHERE specb LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specb The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpecb($specb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specb)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPECB, $specb, $comparison);
    }

    /**
     * Filter the query on the specc column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecc('fooValue');   // WHERE specc = 'fooValue'
     * $query->filterBySpecc('%fooValue%', Criteria::LIKE); // WHERE specc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpecc($specc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPECC, $specc, $comparison);
    }

    /**
     * Filter the query on the specd column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecd('fooValue');   // WHERE specd = 'fooValue'
     * $query->filterBySpecd('%fooValue%', Criteria::LIKE); // WHERE specd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpecd($specd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPECD, $specd, $comparison);
    }

    /**
     * Filter the query on the spece column
     *
     * Example usage:
     * <code>
     * $query->filterBySpece('fooValue');   // WHERE spece = 'fooValue'
     * $query->filterBySpece('%fooValue%', Criteria::LIKE); // WHERE spece LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spece The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpece($spece = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spece)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPECE, $spece, $comparison);
    }

    /**
     * Filter the query on the specf column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecf('fooValue');   // WHERE specf = 'fooValue'
     * $query->filterBySpecf('%fooValue%', Criteria::LIKE); // WHERE specf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specf The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpecf($specf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPECF, $specf, $comparison);
    }

    /**
     * Filter the query on the specg column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecg('fooValue');   // WHERE specg = 'fooValue'
     * $query->filterBySpecg('%fooValue%', Criteria::LIKE); // WHERE specg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpecg($specg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPECG, $specg, $comparison);
    }

    /**
     * Filter the query on the spech column
     *
     * Example usage:
     * <code>
     * $query->filterBySpech('fooValue');   // WHERE spech = 'fooValue'
     * $query->filterBySpech('%fooValue%', Criteria::LIKE); // WHERE spech LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spech The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpech($spech = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spech)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPECH, $spech, $comparison);
    }

    /**
     * Filter the query on the longdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByLongdesc('fooValue');   // WHERE longdesc = 'fooValue'
     * $query->filterByLongdesc('%fooValue%', Criteria::LIKE); // WHERE longdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $longdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByLongdesc($longdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_LONGDESC, $longdesc, $comparison);
    }

    /**
     * Filter the query on the orderno column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderno('fooValue');   // WHERE orderno = 'fooValue'
     * $query->filterByOrderno('%fooValue%', Criteria::LIKE); // WHERE orderno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_ORDERNO, $orderno, $comparison);
    }

    /**
     * Filter the query on the name3 column
     *
     * Example usage:
     * <code>
     * $query->filterByName3('fooValue');   // WHERE name3 = 'fooValue'
     * $query->filterByName3('%fooValue%', Criteria::LIKE); // WHERE name3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByName3($name3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_NAME3, $name3, $comparison);
    }

    /**
     * Filter the query on the name4 column
     *
     * Example usage:
     * <code>
     * $query->filterByName4('fooValue');   // WHERE name4 = 'fooValue'
     * $query->filterByName4('%fooValue%', Criteria::LIKE); // WHERE name4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByName4($name4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_NAME4, $name4, $comparison);
    }

    /**
     * Filter the query on the thumb column
     *
     * Example usage:
     * <code>
     * $query->filterByThumb('fooValue');   // WHERE thumb = 'fooValue'
     * $query->filterByThumb('%fooValue%', Criteria::LIKE); // WHERE thumb LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thumb The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByThumb($thumb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumb)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_THUMB, $thumb, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth('fooValue');   // WHERE width = 'fooValue'
     * $query->filterByWidth('%fooValue%', Criteria::LIKE); // WHERE width LIKE '%fooValue%'
     * </code>
     *
     * @param     string $width The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($width)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight('fooValue');   // WHERE height = 'fooValue'
     * $query->filterByHeight('%fooValue%', Criteria::LIKE); // WHERE height LIKE '%fooValue%'
     * </code>
     *
     * @param     string $height The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($height)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the familydes column
     *
     * Example usage:
     * <code>
     * $query->filterByFamilydes('fooValue');   // WHERE familydes = 'fooValue'
     * $query->filterByFamilydes('%fooValue%', Criteria::LIKE); // WHERE familydes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $familydes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByFamilydes($familydes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($familydes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_FAMILYDES, $familydes, $comparison);
    }

    /**
     * Filter the query on the keywords column
     *
     * Example usage:
     * <code>
     * $query->filterByKeywords('fooValue');   // WHERE keywords = 'fooValue'
     * $query->filterByKeywords('%fooValue%', Criteria::LIKE); // WHERE keywords LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keywords The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByKeywords($keywords = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keywords)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_KEYWORDS, $keywords, $comparison);
    }

    /**
     * Filter the query on the vpn column
     *
     * Example usage:
     * <code>
     * $query->filterByVpn('fooValue');   // WHERE vpn = 'fooValue'
     * $query->filterByVpn('%fooValue%', Criteria::LIKE); // WHERE vpn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vpn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByVpn($vpn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vpn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_VPN, $vpn, $comparison);
    }

    /**
     * Filter the query on the uomdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByUomdesc('fooValue');   // WHERE uomdesc = 'fooValue'
     * $query->filterByUomdesc('%fooValue%', Criteria::LIKE); // WHERE uomdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uomdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByUomdesc($uomdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uomdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_UOMDESC, $uomdesc, $comparison);
    }

    /**
     * Filter the query on the vidinffg column
     *
     * Example usage:
     * <code>
     * $query->filterByVidinffg('fooValue');   // WHERE vidinffg = 'fooValue'
     * $query->filterByVidinffg('%fooValue%', Criteria::LIKE); // WHERE vidinffg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vidinffg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByVidinffg($vidinffg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vidinffg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_VIDINFFG, $vidinffg, $comparison);
    }

    /**
     * Filter the query on the vidinflk column
     *
     * Example usage:
     * <code>
     * $query->filterByVidinflk('fooValue');   // WHERE vidinflk = 'fooValue'
     * $query->filterByVidinflk('%fooValue%', Criteria::LIKE); // WHERE vidinflk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vidinflk The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByVidinflk($vidinflk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vidinflk)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_VIDINFLK, $vidinflk, $comparison);
    }

    /**
     * Filter the query on the additemflag column
     *
     * Example usage:
     * <code>
     * $query->filterByAdditemflag('fooValue');   // WHERE additemflag = 'fooValue'
     * $query->filterByAdditemflag('%fooValue%', Criteria::LIKE); // WHERE additemflag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $additemflag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByAdditemflag($additemflag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($additemflag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_ADDITEMFLAG, $additemflag, $comparison);
    }

    /**
     * Filter the query on the schemafam column
     *
     * Example usage:
     * <code>
     * $query->filterBySchemafam('fooValue');   // WHERE schemafam = 'fooValue'
     * $query->filterBySchemafam('%fooValue%', Criteria::LIKE); // WHERE schemafam LIKE '%fooValue%'
     * </code>
     *
     * @param     string $schemafam The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySchemafam($schemafam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($schemafam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SCHEMAFAM, $schemafam, $comparison);
    }

    /**
     * Filter the query on the origitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByOrigitemid('fooValue');   // WHERE origitemid = 'fooValue'
     * $query->filterByOrigitemid('%fooValue%', Criteria::LIKE); // WHERE origitemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $origitemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByOrigitemid($origitemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($origitemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_ORIGITEMID, $origitemid, $comparison);
    }

    /**
     * Filter the query on the techspecflg column
     *
     * Example usage:
     * <code>
     * $query->filterByTechspecflg('fooValue');   // WHERE techspecflg = 'fooValue'
     * $query->filterByTechspecflg('%fooValue%', Criteria::LIKE); // WHERE techspecflg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $techspecflg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByTechspecflg($techspecflg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($techspecflg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_TECHSPECFLG, $techspecflg, $comparison);
    }

    /**
     * Filter the query on the techspecname column
     *
     * Example usage:
     * <code>
     * $query->filterByTechspecname('fooValue');   // WHERE techspecname = 'fooValue'
     * $query->filterByTechspecname('%fooValue%', Criteria::LIKE); // WHERE techspecname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $techspecname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByTechspecname($techspecname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($techspecname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_TECHSPECNAME, $techspecname, $comparison);
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE cost > 12
     * </code>
     *
     * @param     mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_COST, $cost, $comparison);
    }

    /**
     * Filter the query on the prop65 column
     *
     * Example usage:
     * <code>
     * $query->filterByProp65('fooValue');   // WHERE prop65 = 'fooValue'
     * $query->filterByProp65('%fooValue%', Criteria::LIKE); // WHERE prop65 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prop65 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByProp65($prop65 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prop65)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_PROP65, $prop65, $comparison);
    }

    /**
     * Filter the query on the leadfree column
     *
     * Example usage:
     * <code>
     * $query->filterByLeadfree('fooValue');   // WHERE leadfree = 'fooValue'
     * $query->filterByLeadfree('%fooValue%', Criteria::LIKE); // WHERE leadfree LIKE '%fooValue%'
     * </code>
     *
     * @param     string $leadfree The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByLeadfree($leadfree = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($leadfree)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_LEADFREE, $leadfree, $comparison);
    }

    /**
     * Filter the query on the extendesc column
     *
     * Example usage:
     * <code>
     * $query->filterByExtendesc('fooValue');   // WHERE extendesc = 'fooValue'
     * $query->filterByExtendesc('%fooValue%', Criteria::LIKE); // WHERE extendesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $extendesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByExtendesc($extendesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($extendesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_EXTENDESC, $extendesc, $comparison);
    }

    /**
     * Filter the query on the minprice column
     *
     * Example usage:
     * <code>
     * $query->filterByMinprice(1234); // WHERE minprice = 1234
     * $query->filterByMinprice(array(12, 34)); // WHERE minprice IN (12, 34)
     * $query->filterByMinprice(array('min' => 12)); // WHERE minprice > 12
     * </code>
     *
     * @param     mixed $minprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByMinprice($minprice = null, $comparison = null)
    {
        if (is_array($minprice)) {
            $useMinMax = false;
            if (isset($minprice['min'])) {
                $this->addUsingAlias(PricingTableMap::COL_MINPRICE, $minprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minprice['max'])) {
                $this->addUsingAlias(PricingTableMap::COL_MINPRICE, $minprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_MINPRICE, $minprice, $comparison);
    }

    /**
     * Filter the query on the spcord column
     *
     * Example usage:
     * <code>
     * $query->filterBySpcord('fooValue');   // WHERE spcord = 'fooValue'
     * $query->filterBySpcord('%fooValue%', Criteria::LIKE); // WHERE spcord LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spcord The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterBySpcord($spcord = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spcord)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SPCORD, $spcord, $comparison);
    }

    /**
     * Filter the query on the vendorid column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorid('fooValue');   // WHERE vendorid = 'fooValue'
     * $query->filterByVendorid('%fooValue%', Criteria::LIKE); // WHERE vendorid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendorid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByVendorid($vendorid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_VENDORID, $vendorid, $comparison);
    }

    /**
     * Filter the query on the vendoritemid column
     *
     * Example usage:
     * <code>
     * $query->filterByVendoritemid('fooValue');   // WHERE vendoritemid = 'fooValue'
     * $query->filterByVendoritemid('%fooValue%', Criteria::LIKE); // WHERE vendoritemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendoritemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByVendoritemid($vendoritemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendoritemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_VENDORITEMID, $vendoritemid, $comparison);
    }

    /**
     * Filter the query on the shipfromid column
     *
     * Example usage:
     * <code>
     * $query->filterByShipfromid('fooValue');   // WHERE shipfromid = 'fooValue'
     * $query->filterByShipfromid('%fooValue%', Criteria::LIKE); // WHERE shipfromid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipfromid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByShipfromid($shipfromid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipfromid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_SHIPFROMID, $shipfromid, $comparison);
    }

    /**
     * Filter the query on the nsitemgroup column
     *
     * Example usage:
     * <code>
     * $query->filterByNsitemgroup('fooValue');   // WHERE nsitemgroup = 'fooValue'
     * $query->filterByNsitemgroup('%fooValue%', Criteria::LIKE); // WHERE nsitemgroup LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nsitemgroup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByNsitemgroup($nsitemgroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nsitemgroup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_NSITEMGROUP, $nsitemgroup, $comparison);
    }

    /**
     * Filter the query on the itemtype column
     *
     * Example usage:
     * <code>
     * $query->filterByItemtype('fooValue');   // WHERE itemtype = 'fooValue'
     * $query->filterByItemtype('%fooValue%', Criteria::LIKE); // WHERE itemtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByItemtype($itemtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_ITEMTYPE, $itemtype, $comparison);
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
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PricingTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPricing $pricing Object to remove from the list of results
     *
     * @return $this|ChildPricingQuery The current query, for fluid interface
     */
    public function prune($pricing = null)
    {
        if ($pricing) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PricingTableMap::COL_SESSIONID), $pricing->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PricingTableMap::COL_RECNO), $pricing->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pricing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PricingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PricingTableMap::clearInstancePool();
            PricingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PricingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PricingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PricingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PricingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PricingQuery
