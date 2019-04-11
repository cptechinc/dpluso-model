<?php

namespace Base;

use \Im as ChildIm;
use \ImQuery as ChildImQuery;
use \Exception;
use \PDO;
use Map\ImTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'im' table.
 *
 *
 *
 * @method     ChildImQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildImQuery orderByRecordno($order = Criteria::ASC) Order by the recordno column
 * @method     ChildImQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildImQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildImQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildImQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildImQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildImQuery orderByPriceqty1($order = Criteria::ASC) Order by the priceqty1 column
 * @method     ChildImQuery orderByPriceqty2($order = Criteria::ASC) Order by the priceqty2 column
 * @method     ChildImQuery orderByPriceqty3($order = Criteria::ASC) Order by the priceqty3 column
 * @method     ChildImQuery orderByPriceqty4($order = Criteria::ASC) Order by the priceqty4 column
 * @method     ChildImQuery orderByPriceqty5($order = Criteria::ASC) Order by the priceqty5 column
 * @method     ChildImQuery orderByPriceqty6($order = Criteria::ASC) Order by the priceqty6 column
 * @method     ChildImQuery orderByPriceprice1($order = Criteria::ASC) Order by the priceprice1 column
 * @method     ChildImQuery orderByPriceprice2($order = Criteria::ASC) Order by the priceprice2 column
 * @method     ChildImQuery orderByPriceprice3($order = Criteria::ASC) Order by the priceprice3 column
 * @method     ChildImQuery orderByPriceprice4($order = Criteria::ASC) Order by the priceprice4 column
 * @method     ChildImQuery orderByPriceprice5($order = Criteria::ASC) Order by the priceprice5 column
 * @method     ChildImQuery orderByPriceprice6($order = Criteria::ASC) Order by the priceprice6 column
 * @method     ChildImQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildImQuery orderByListprice($order = Criteria::ASC) Order by the listprice column
 * @method     ChildImQuery orderByName1($order = Criteria::ASC) Order by the name1 column
 * @method     ChildImQuery orderByName2($order = Criteria::ASC) Order by the name2 column
 * @method     ChildImQuery orderByShortdesc($order = Criteria::ASC) Order by the shortdesc column
 * @method     ChildImQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildImQuery orderByFamilyid($order = Criteria::ASC) Order by the familyid column
 * @method     ChildImQuery orderByErmes($order = Criteria::ASC) Order by the ermes column
 * @method     ChildImQuery orderBySpeca($order = Criteria::ASC) Order by the speca column
 * @method     ChildImQuery orderBySpecb($order = Criteria::ASC) Order by the specb column
 * @method     ChildImQuery orderBySpecc($order = Criteria::ASC) Order by the specc column
 * @method     ChildImQuery orderBySpecd($order = Criteria::ASC) Order by the specd column
 * @method     ChildImQuery orderBySpece($order = Criteria::ASC) Order by the spece column
 * @method     ChildImQuery orderBySpecf($order = Criteria::ASC) Order by the specf column
 * @method     ChildImQuery orderBySpecg($order = Criteria::ASC) Order by the specg column
 * @method     ChildImQuery orderBySpech($order = Criteria::ASC) Order by the spech column
 * @method     ChildImQuery orderByLongdesc($order = Criteria::ASC) Order by the longdesc column
 * @method     ChildImQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildImQuery orderByName3($order = Criteria::ASC) Order by the name3 column
 * @method     ChildImQuery orderByName4($order = Criteria::ASC) Order by the name4 column
 * @method     ChildImQuery orderByThumb($order = Criteria::ASC) Order by the thumb column
 * @method     ChildImQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildImQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildImQuery orderByFamilydes($order = Criteria::ASC) Order by the familydes column
 * @method     ChildImQuery orderByKeywords($order = Criteria::ASC) Order by the keywords column
 * @method     ChildImQuery orderByVpn($order = Criteria::ASC) Order by the vpn column
 * @method     ChildImQuery orderByUomdesc($order = Criteria::ASC) Order by the uomdesc column
 * @method     ChildImQuery orderByVidinffg($order = Criteria::ASC) Order by the vidinffg column
 * @method     ChildImQuery orderByVidinflk($order = Criteria::ASC) Order by the vidinflk column
 * @method     ChildImQuery orderByAdditemflag($order = Criteria::ASC) Order by the additemflag column
 * @method     ChildImQuery orderBySchemafam($order = Criteria::ASC) Order by the schemafam column
 * @method     ChildImQuery orderByProp65($order = Criteria::ASC) Order by the prop65 column
 * @method     ChildImQuery orderByLeadfree($order = Criteria::ASC) Order by the leadfree column
 * @method     ChildImQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildImQuery groupBySessionid() Group by the sessionid column
 * @method     ChildImQuery groupByRecordno() Group by the recordno column
 * @method     ChildImQuery groupByDate() Group by the date column
 * @method     ChildImQuery groupByTime() Group by the time column
 * @method     ChildImQuery groupByItemid() Group by the itemid column
 * @method     ChildImQuery groupByPrice() Group by the price column
 * @method     ChildImQuery groupByQty() Group by the qty column
 * @method     ChildImQuery groupByPriceqty1() Group by the priceqty1 column
 * @method     ChildImQuery groupByPriceqty2() Group by the priceqty2 column
 * @method     ChildImQuery groupByPriceqty3() Group by the priceqty3 column
 * @method     ChildImQuery groupByPriceqty4() Group by the priceqty4 column
 * @method     ChildImQuery groupByPriceqty5() Group by the priceqty5 column
 * @method     ChildImQuery groupByPriceqty6() Group by the priceqty6 column
 * @method     ChildImQuery groupByPriceprice1() Group by the priceprice1 column
 * @method     ChildImQuery groupByPriceprice2() Group by the priceprice2 column
 * @method     ChildImQuery groupByPriceprice3() Group by the priceprice3 column
 * @method     ChildImQuery groupByPriceprice4() Group by the priceprice4 column
 * @method     ChildImQuery groupByPriceprice5() Group by the priceprice5 column
 * @method     ChildImQuery groupByPriceprice6() Group by the priceprice6 column
 * @method     ChildImQuery groupByUnit() Group by the unit column
 * @method     ChildImQuery groupByListprice() Group by the listprice column
 * @method     ChildImQuery groupByName1() Group by the name1 column
 * @method     ChildImQuery groupByName2() Group by the name2 column
 * @method     ChildImQuery groupByShortdesc() Group by the shortdesc column
 * @method     ChildImQuery groupByImage() Group by the image column
 * @method     ChildImQuery groupByFamilyid() Group by the familyid column
 * @method     ChildImQuery groupByErmes() Group by the ermes column
 * @method     ChildImQuery groupBySpeca() Group by the speca column
 * @method     ChildImQuery groupBySpecb() Group by the specb column
 * @method     ChildImQuery groupBySpecc() Group by the specc column
 * @method     ChildImQuery groupBySpecd() Group by the specd column
 * @method     ChildImQuery groupBySpece() Group by the spece column
 * @method     ChildImQuery groupBySpecf() Group by the specf column
 * @method     ChildImQuery groupBySpecg() Group by the specg column
 * @method     ChildImQuery groupBySpech() Group by the spech column
 * @method     ChildImQuery groupByLongdesc() Group by the longdesc column
 * @method     ChildImQuery groupByOrderno() Group by the orderno column
 * @method     ChildImQuery groupByName3() Group by the name3 column
 * @method     ChildImQuery groupByName4() Group by the name4 column
 * @method     ChildImQuery groupByThumb() Group by the thumb column
 * @method     ChildImQuery groupByWidth() Group by the width column
 * @method     ChildImQuery groupByHeight() Group by the height column
 * @method     ChildImQuery groupByFamilydes() Group by the familydes column
 * @method     ChildImQuery groupByKeywords() Group by the keywords column
 * @method     ChildImQuery groupByVpn() Group by the vpn column
 * @method     ChildImQuery groupByUomdesc() Group by the uomdesc column
 * @method     ChildImQuery groupByVidinffg() Group by the vidinffg column
 * @method     ChildImQuery groupByVidinflk() Group by the vidinflk column
 * @method     ChildImQuery groupByAdditemflag() Group by the additemflag column
 * @method     ChildImQuery groupBySchemafam() Group by the schemafam column
 * @method     ChildImQuery groupByProp65() Group by the prop65 column
 * @method     ChildImQuery groupByLeadfree() Group by the leadfree column
 * @method     ChildImQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildImQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildImQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildImQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildImQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildImQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildImQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildIm findOne(ConnectionInterface $con = null) Return the first ChildIm matching the query
 * @method     ChildIm findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIm matching the query, or a new ChildIm object populated from the query conditions when no match is found
 *
 * @method     ChildIm findOneBySessionid(string $sessionid) Return the first ChildIm filtered by the sessionid column
 * @method     ChildIm findOneByRecordno(int $recordno) Return the first ChildIm filtered by the recordno column
 * @method     ChildIm findOneByDate(int $date) Return the first ChildIm filtered by the date column
 * @method     ChildIm findOneByTime(int $time) Return the first ChildIm filtered by the time column
 * @method     ChildIm findOneByItemid(string $itemid) Return the first ChildIm filtered by the itemid column
 * @method     ChildIm findOneByPrice(string $price) Return the first ChildIm filtered by the price column
 * @method     ChildIm findOneByQty(int $qty) Return the first ChildIm filtered by the qty column
 * @method     ChildIm findOneByPriceqty1(int $priceqty1) Return the first ChildIm filtered by the priceqty1 column
 * @method     ChildIm findOneByPriceqty2(int $priceqty2) Return the first ChildIm filtered by the priceqty2 column
 * @method     ChildIm findOneByPriceqty3(int $priceqty3) Return the first ChildIm filtered by the priceqty3 column
 * @method     ChildIm findOneByPriceqty4(int $priceqty4) Return the first ChildIm filtered by the priceqty4 column
 * @method     ChildIm findOneByPriceqty5(int $priceqty5) Return the first ChildIm filtered by the priceqty5 column
 * @method     ChildIm findOneByPriceqty6(int $priceqty6) Return the first ChildIm filtered by the priceqty6 column
 * @method     ChildIm findOneByPriceprice1(string $priceprice1) Return the first ChildIm filtered by the priceprice1 column
 * @method     ChildIm findOneByPriceprice2(string $priceprice2) Return the first ChildIm filtered by the priceprice2 column
 * @method     ChildIm findOneByPriceprice3(string $priceprice3) Return the first ChildIm filtered by the priceprice3 column
 * @method     ChildIm findOneByPriceprice4(string $priceprice4) Return the first ChildIm filtered by the priceprice4 column
 * @method     ChildIm findOneByPriceprice5(string $priceprice5) Return the first ChildIm filtered by the priceprice5 column
 * @method     ChildIm findOneByPriceprice6(string $priceprice6) Return the first ChildIm filtered by the priceprice6 column
 * @method     ChildIm findOneByUnit(string $unit) Return the first ChildIm filtered by the unit column
 * @method     ChildIm findOneByListprice(string $listprice) Return the first ChildIm filtered by the listprice column
 * @method     ChildIm findOneByName1(string $name1) Return the first ChildIm filtered by the name1 column
 * @method     ChildIm findOneByName2(string $name2) Return the first ChildIm filtered by the name2 column
 * @method     ChildIm findOneByShortdesc(string $shortdesc) Return the first ChildIm filtered by the shortdesc column
 * @method     ChildIm findOneByImage(string $image) Return the first ChildIm filtered by the image column
 * @method     ChildIm findOneByFamilyid(string $familyid) Return the first ChildIm filtered by the familyid column
 * @method     ChildIm findOneByErmes(string $ermes) Return the first ChildIm filtered by the ermes column
 * @method     ChildIm findOneBySpeca(string $speca) Return the first ChildIm filtered by the speca column
 * @method     ChildIm findOneBySpecb(string $specb) Return the first ChildIm filtered by the specb column
 * @method     ChildIm findOneBySpecc(string $specc) Return the first ChildIm filtered by the specc column
 * @method     ChildIm findOneBySpecd(string $specd) Return the first ChildIm filtered by the specd column
 * @method     ChildIm findOneBySpece(string $spece) Return the first ChildIm filtered by the spece column
 * @method     ChildIm findOneBySpecf(string $specf) Return the first ChildIm filtered by the specf column
 * @method     ChildIm findOneBySpecg(string $specg) Return the first ChildIm filtered by the specg column
 * @method     ChildIm findOneBySpech(string $spech) Return the first ChildIm filtered by the spech column
 * @method     ChildIm findOneByLongdesc(string $longdesc) Return the first ChildIm filtered by the longdesc column
 * @method     ChildIm findOneByOrderno(string $orderno) Return the first ChildIm filtered by the orderno column
 * @method     ChildIm findOneByName3(string $name3) Return the first ChildIm filtered by the name3 column
 * @method     ChildIm findOneByName4(string $name4) Return the first ChildIm filtered by the name4 column
 * @method     ChildIm findOneByThumb(string $thumb) Return the first ChildIm filtered by the thumb column
 * @method     ChildIm findOneByWidth(string $width) Return the first ChildIm filtered by the width column
 * @method     ChildIm findOneByHeight(string $height) Return the first ChildIm filtered by the height column
 * @method     ChildIm findOneByFamilydes(string $familydes) Return the first ChildIm filtered by the familydes column
 * @method     ChildIm findOneByKeywords(string $keywords) Return the first ChildIm filtered by the keywords column
 * @method     ChildIm findOneByVpn(string $vpn) Return the first ChildIm filtered by the vpn column
 * @method     ChildIm findOneByUomdesc(string $uomdesc) Return the first ChildIm filtered by the uomdesc column
 * @method     ChildIm findOneByVidinffg(string $vidinffg) Return the first ChildIm filtered by the vidinffg column
 * @method     ChildIm findOneByVidinflk(string $vidinflk) Return the first ChildIm filtered by the vidinflk column
 * @method     ChildIm findOneByAdditemflag(string $additemflag) Return the first ChildIm filtered by the additemflag column
 * @method     ChildIm findOneBySchemafam(string $schemafam) Return the first ChildIm filtered by the schemafam column
 * @method     ChildIm findOneByProp65(string $prop65) Return the first ChildIm filtered by the prop65 column
 * @method     ChildIm findOneByLeadfree(string $leadfree) Return the first ChildIm filtered by the leadfree column
 * @method     ChildIm findOneByDummy(string $dummy) Return the first ChildIm filtered by the dummy column *

 * @method     ChildIm requirePk($key, ConnectionInterface $con = null) Return the ChildIm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOne(ConnectionInterface $con = null) Return the first ChildIm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIm requireOneBySessionid(string $sessionid) Return the first ChildIm filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByRecordno(int $recordno) Return the first ChildIm filtered by the recordno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByDate(int $date) Return the first ChildIm filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByTime(int $time) Return the first ChildIm filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByItemid(string $itemid) Return the first ChildIm filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPrice(string $price) Return the first ChildIm filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByQty(int $qty) Return the first ChildIm filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceqty1(int $priceqty1) Return the first ChildIm filtered by the priceqty1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceqty2(int $priceqty2) Return the first ChildIm filtered by the priceqty2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceqty3(int $priceqty3) Return the first ChildIm filtered by the priceqty3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceqty4(int $priceqty4) Return the first ChildIm filtered by the priceqty4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceqty5(int $priceqty5) Return the first ChildIm filtered by the priceqty5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceqty6(int $priceqty6) Return the first ChildIm filtered by the priceqty6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceprice1(string $priceprice1) Return the first ChildIm filtered by the priceprice1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceprice2(string $priceprice2) Return the first ChildIm filtered by the priceprice2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceprice3(string $priceprice3) Return the first ChildIm filtered by the priceprice3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceprice4(string $priceprice4) Return the first ChildIm filtered by the priceprice4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceprice5(string $priceprice5) Return the first ChildIm filtered by the priceprice5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByPriceprice6(string $priceprice6) Return the first ChildIm filtered by the priceprice6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByUnit(string $unit) Return the first ChildIm filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByListprice(string $listprice) Return the first ChildIm filtered by the listprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByName1(string $name1) Return the first ChildIm filtered by the name1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByName2(string $name2) Return the first ChildIm filtered by the name2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByShortdesc(string $shortdesc) Return the first ChildIm filtered by the shortdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByImage(string $image) Return the first ChildIm filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByFamilyid(string $familyid) Return the first ChildIm filtered by the familyid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByErmes(string $ermes) Return the first ChildIm filtered by the ermes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySpeca(string $speca) Return the first ChildIm filtered by the speca column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySpecb(string $specb) Return the first ChildIm filtered by the specb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySpecc(string $specc) Return the first ChildIm filtered by the specc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySpecd(string $specd) Return the first ChildIm filtered by the specd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySpece(string $spece) Return the first ChildIm filtered by the spece column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySpecf(string $specf) Return the first ChildIm filtered by the specf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySpecg(string $specg) Return the first ChildIm filtered by the specg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySpech(string $spech) Return the first ChildIm filtered by the spech column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByLongdesc(string $longdesc) Return the first ChildIm filtered by the longdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByOrderno(string $orderno) Return the first ChildIm filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByName3(string $name3) Return the first ChildIm filtered by the name3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByName4(string $name4) Return the first ChildIm filtered by the name4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByThumb(string $thumb) Return the first ChildIm filtered by the thumb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByWidth(string $width) Return the first ChildIm filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByHeight(string $height) Return the first ChildIm filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByFamilydes(string $familydes) Return the first ChildIm filtered by the familydes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByKeywords(string $keywords) Return the first ChildIm filtered by the keywords column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByVpn(string $vpn) Return the first ChildIm filtered by the vpn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByUomdesc(string $uomdesc) Return the first ChildIm filtered by the uomdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByVidinffg(string $vidinffg) Return the first ChildIm filtered by the vidinffg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByVidinflk(string $vidinflk) Return the first ChildIm filtered by the vidinflk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByAdditemflag(string $additemflag) Return the first ChildIm filtered by the additemflag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneBySchemafam(string $schemafam) Return the first ChildIm filtered by the schemafam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByProp65(string $prop65) Return the first ChildIm filtered by the prop65 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByLeadfree(string $leadfree) Return the first ChildIm filtered by the leadfree column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIm requireOneByDummy(string $dummy) Return the first ChildIm filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIm[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIm objects based on current ModelCriteria
 * @method     ChildIm[]|ObjectCollection findBySessionid(string $sessionid) Return ChildIm objects filtered by the sessionid column
 * @method     ChildIm[]|ObjectCollection findByRecordno(int $recordno) Return ChildIm objects filtered by the recordno column
 * @method     ChildIm[]|ObjectCollection findByDate(int $date) Return ChildIm objects filtered by the date column
 * @method     ChildIm[]|ObjectCollection findByTime(int $time) Return ChildIm objects filtered by the time column
 * @method     ChildIm[]|ObjectCollection findByItemid(string $itemid) Return ChildIm objects filtered by the itemid column
 * @method     ChildIm[]|ObjectCollection findByPrice(string $price) Return ChildIm objects filtered by the price column
 * @method     ChildIm[]|ObjectCollection findByQty(int $qty) Return ChildIm objects filtered by the qty column
 * @method     ChildIm[]|ObjectCollection findByPriceqty1(int $priceqty1) Return ChildIm objects filtered by the priceqty1 column
 * @method     ChildIm[]|ObjectCollection findByPriceqty2(int $priceqty2) Return ChildIm objects filtered by the priceqty2 column
 * @method     ChildIm[]|ObjectCollection findByPriceqty3(int $priceqty3) Return ChildIm objects filtered by the priceqty3 column
 * @method     ChildIm[]|ObjectCollection findByPriceqty4(int $priceqty4) Return ChildIm objects filtered by the priceqty4 column
 * @method     ChildIm[]|ObjectCollection findByPriceqty5(int $priceqty5) Return ChildIm objects filtered by the priceqty5 column
 * @method     ChildIm[]|ObjectCollection findByPriceqty6(int $priceqty6) Return ChildIm objects filtered by the priceqty6 column
 * @method     ChildIm[]|ObjectCollection findByPriceprice1(string $priceprice1) Return ChildIm objects filtered by the priceprice1 column
 * @method     ChildIm[]|ObjectCollection findByPriceprice2(string $priceprice2) Return ChildIm objects filtered by the priceprice2 column
 * @method     ChildIm[]|ObjectCollection findByPriceprice3(string $priceprice3) Return ChildIm objects filtered by the priceprice3 column
 * @method     ChildIm[]|ObjectCollection findByPriceprice4(string $priceprice4) Return ChildIm objects filtered by the priceprice4 column
 * @method     ChildIm[]|ObjectCollection findByPriceprice5(string $priceprice5) Return ChildIm objects filtered by the priceprice5 column
 * @method     ChildIm[]|ObjectCollection findByPriceprice6(string $priceprice6) Return ChildIm objects filtered by the priceprice6 column
 * @method     ChildIm[]|ObjectCollection findByUnit(string $unit) Return ChildIm objects filtered by the unit column
 * @method     ChildIm[]|ObjectCollection findByListprice(string $listprice) Return ChildIm objects filtered by the listprice column
 * @method     ChildIm[]|ObjectCollection findByName1(string $name1) Return ChildIm objects filtered by the name1 column
 * @method     ChildIm[]|ObjectCollection findByName2(string $name2) Return ChildIm objects filtered by the name2 column
 * @method     ChildIm[]|ObjectCollection findByShortdesc(string $shortdesc) Return ChildIm objects filtered by the shortdesc column
 * @method     ChildIm[]|ObjectCollection findByImage(string $image) Return ChildIm objects filtered by the image column
 * @method     ChildIm[]|ObjectCollection findByFamilyid(string $familyid) Return ChildIm objects filtered by the familyid column
 * @method     ChildIm[]|ObjectCollection findByErmes(string $ermes) Return ChildIm objects filtered by the ermes column
 * @method     ChildIm[]|ObjectCollection findBySpeca(string $speca) Return ChildIm objects filtered by the speca column
 * @method     ChildIm[]|ObjectCollection findBySpecb(string $specb) Return ChildIm objects filtered by the specb column
 * @method     ChildIm[]|ObjectCollection findBySpecc(string $specc) Return ChildIm objects filtered by the specc column
 * @method     ChildIm[]|ObjectCollection findBySpecd(string $specd) Return ChildIm objects filtered by the specd column
 * @method     ChildIm[]|ObjectCollection findBySpece(string $spece) Return ChildIm objects filtered by the spece column
 * @method     ChildIm[]|ObjectCollection findBySpecf(string $specf) Return ChildIm objects filtered by the specf column
 * @method     ChildIm[]|ObjectCollection findBySpecg(string $specg) Return ChildIm objects filtered by the specg column
 * @method     ChildIm[]|ObjectCollection findBySpech(string $spech) Return ChildIm objects filtered by the spech column
 * @method     ChildIm[]|ObjectCollection findByLongdesc(string $longdesc) Return ChildIm objects filtered by the longdesc column
 * @method     ChildIm[]|ObjectCollection findByOrderno(string $orderno) Return ChildIm objects filtered by the orderno column
 * @method     ChildIm[]|ObjectCollection findByName3(string $name3) Return ChildIm objects filtered by the name3 column
 * @method     ChildIm[]|ObjectCollection findByName4(string $name4) Return ChildIm objects filtered by the name4 column
 * @method     ChildIm[]|ObjectCollection findByThumb(string $thumb) Return ChildIm objects filtered by the thumb column
 * @method     ChildIm[]|ObjectCollection findByWidth(string $width) Return ChildIm objects filtered by the width column
 * @method     ChildIm[]|ObjectCollection findByHeight(string $height) Return ChildIm objects filtered by the height column
 * @method     ChildIm[]|ObjectCollection findByFamilydes(string $familydes) Return ChildIm objects filtered by the familydes column
 * @method     ChildIm[]|ObjectCollection findByKeywords(string $keywords) Return ChildIm objects filtered by the keywords column
 * @method     ChildIm[]|ObjectCollection findByVpn(string $vpn) Return ChildIm objects filtered by the vpn column
 * @method     ChildIm[]|ObjectCollection findByUomdesc(string $uomdesc) Return ChildIm objects filtered by the uomdesc column
 * @method     ChildIm[]|ObjectCollection findByVidinffg(string $vidinffg) Return ChildIm objects filtered by the vidinffg column
 * @method     ChildIm[]|ObjectCollection findByVidinflk(string $vidinflk) Return ChildIm objects filtered by the vidinflk column
 * @method     ChildIm[]|ObjectCollection findByAdditemflag(string $additemflag) Return ChildIm objects filtered by the additemflag column
 * @method     ChildIm[]|ObjectCollection findBySchemafam(string $schemafam) Return ChildIm objects filtered by the schemafam column
 * @method     ChildIm[]|ObjectCollection findByProp65(string $prop65) Return ChildIm objects filtered by the prop65 column
 * @method     ChildIm[]|ObjectCollection findByLeadfree(string $leadfree) Return ChildIm objects filtered by the leadfree column
 * @method     ChildIm[]|ObjectCollection findByDummy(string $dummy) Return ChildIm objects filtered by the dummy column
 * @method     ChildIm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ImQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ImQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Im', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildImQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildImQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildImQuery) {
            return $criteria;
        }
        $query = new ChildImQuery();
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
     * @param array[$sessionid, $recordno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildIm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ImTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ImTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildIm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recordno, date, time, itemid, price, qty, priceqty1, priceqty2, priceqty3, priceqty4, priceqty5, priceqty6, priceprice1, priceprice2, priceprice3, priceprice4, priceprice5, priceprice6, unit, listprice, name1, name2, shortdesc, image, familyid, ermes, speca, specb, specc, specd, spece, specf, specg, spech, longdesc, orderno, name3, name4, thumb, width, height, familydes, keywords, vpn, uomdesc, vidinffg, vidinflk, additemflag, schemafam, prop65, leadfree, dummy FROM im WHERE sessionid = :p0 AND recordno = :p1';
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
            /** @var ChildIm $obj */
            $obj = new ChildIm();
            $obj->hydrate($row);
            ImTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildIm|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ImTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ImTableMap::COL_RECORDNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ImTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ImTableMap::COL_RECORDNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the recordno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecordno(1234); // WHERE recordno = 1234
     * $query->filterByRecordno(array(12, 34)); // WHERE recordno IN (12, 34)
     * $query->filterByRecordno(array('min' => 12)); // WHERE recordno > 12
     * </code>
     *
     * @param     mixed $recordno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByRecordno($recordno = null, $comparison = null)
    {
        if (is_array($recordno)) {
            $useMinMax = false;
            if (isset($recordno['min'])) {
                $this->addUsingAlias(ImTableMap::COL_RECORDNO, $recordno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recordno['max'])) {
                $this->addUsingAlias(ImTableMap::COL_RECORDNO, $recordno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_RECORDNO, $recordno, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ImTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ImTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(ImTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(ImTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(ImTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(ImTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceqty1($priceqty1 = null, $comparison = null)
    {
        if (is_array($priceqty1)) {
            $useMinMax = false;
            if (isset($priceqty1['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY1, $priceqty1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty1['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY1, $priceqty1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEQTY1, $priceqty1, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceqty2($priceqty2 = null, $comparison = null)
    {
        if (is_array($priceqty2)) {
            $useMinMax = false;
            if (isset($priceqty2['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY2, $priceqty2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty2['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY2, $priceqty2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEQTY2, $priceqty2, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceqty3($priceqty3 = null, $comparison = null)
    {
        if (is_array($priceqty3)) {
            $useMinMax = false;
            if (isset($priceqty3['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY3, $priceqty3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty3['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY3, $priceqty3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEQTY3, $priceqty3, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceqty4($priceqty4 = null, $comparison = null)
    {
        if (is_array($priceqty4)) {
            $useMinMax = false;
            if (isset($priceqty4['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY4, $priceqty4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty4['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY4, $priceqty4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEQTY4, $priceqty4, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceqty5($priceqty5 = null, $comparison = null)
    {
        if (is_array($priceqty5)) {
            $useMinMax = false;
            if (isset($priceqty5['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY5, $priceqty5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty5['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY5, $priceqty5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEQTY5, $priceqty5, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceqty6($priceqty6 = null, $comparison = null)
    {
        if (is_array($priceqty6)) {
            $useMinMax = false;
            if (isset($priceqty6['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY6, $priceqty6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty6['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEQTY6, $priceqty6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEQTY6, $priceqty6, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceprice1($priceprice1 = null, $comparison = null)
    {
        if (is_array($priceprice1)) {
            $useMinMax = false;
            if (isset($priceprice1['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE1, $priceprice1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice1['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE1, $priceprice1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEPRICE1, $priceprice1, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceprice2($priceprice2 = null, $comparison = null)
    {
        if (is_array($priceprice2)) {
            $useMinMax = false;
            if (isset($priceprice2['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE2, $priceprice2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice2['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE2, $priceprice2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEPRICE2, $priceprice2, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceprice3($priceprice3 = null, $comparison = null)
    {
        if (is_array($priceprice3)) {
            $useMinMax = false;
            if (isset($priceprice3['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE3, $priceprice3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice3['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE3, $priceprice3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEPRICE3, $priceprice3, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceprice4($priceprice4 = null, $comparison = null)
    {
        if (is_array($priceprice4)) {
            $useMinMax = false;
            if (isset($priceprice4['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE4, $priceprice4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice4['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE4, $priceprice4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEPRICE4, $priceprice4, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceprice5($priceprice5 = null, $comparison = null)
    {
        if (is_array($priceprice5)) {
            $useMinMax = false;
            if (isset($priceprice5['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE5, $priceprice5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice5['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE5, $priceprice5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEPRICE5, $priceprice5, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByPriceprice6($priceprice6 = null, $comparison = null)
    {
        if (is_array($priceprice6)) {
            $useMinMax = false;
            if (isset($priceprice6['min'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE6, $priceprice6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice6['max'])) {
                $this->addUsingAlias(ImTableMap::COL_PRICEPRICE6, $priceprice6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PRICEPRICE6, $priceprice6, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_UNIT, $unit, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByListprice($listprice = null, $comparison = null)
    {
        if (is_array($listprice)) {
            $useMinMax = false;
            if (isset($listprice['min'])) {
                $this->addUsingAlias(ImTableMap::COL_LISTPRICE, $listprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($listprice['max'])) {
                $this->addUsingAlias(ImTableMap::COL_LISTPRICE, $listprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_LISTPRICE, $listprice, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByName1($name1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_NAME1, $name1, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByName2($name2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_NAME2, $name2, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByShortdesc($shortdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SHORTDESC, $shortdesc, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_IMAGE, $image, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByFamilyid($familyid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($familyid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_FAMILYID, $familyid, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByErmes($ermes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ermes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_ERMES, $ermes, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySpeca($speca = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($speca)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SPECA, $speca, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySpecb($specb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specb)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SPECB, $specb, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySpecc($specc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SPECC, $specc, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySpecd($specd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SPECD, $specd, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySpece($spece = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spece)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SPECE, $spece, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySpecf($specf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SPECF, $specf, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySpecg($specg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SPECG, $specg, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySpech($spech = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spech)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SPECH, $spech, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByLongdesc($longdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_LONGDESC, $longdesc, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_ORDERNO, $orderno, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByName3($name3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_NAME3, $name3, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByName4($name4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_NAME4, $name4, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByThumb($thumb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumb)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_THUMB, $thumb, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($width)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_WIDTH, $width, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($height)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_HEIGHT, $height, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByFamilydes($familydes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($familydes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_FAMILYDES, $familydes, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByKeywords($keywords = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keywords)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_KEYWORDS, $keywords, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByVpn($vpn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vpn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_VPN, $vpn, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByUomdesc($uomdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uomdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_UOMDESC, $uomdesc, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByVidinffg($vidinffg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vidinffg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_VIDINFFG, $vidinffg, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByVidinflk($vidinflk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vidinflk)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_VIDINFLK, $vidinflk, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByAdditemflag($additemflag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($additemflag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_ADDITEMFLAG, $additemflag, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterBySchemafam($schemafam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($schemafam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_SCHEMAFAM, $schemafam, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByProp65($prop65 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prop65)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_PROP65, $prop65, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByLeadfree($leadfree = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($leadfree)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_LEADFREE, $leadfree, $comparison);
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
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIm $im Object to remove from the list of results
     *
     * @return $this|ChildImQuery The current query, for fluid interface
     */
    public function prune($im = null)
    {
        if ($im) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ImTableMap::COL_SESSIONID), $im->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ImTableMap::COL_RECORDNO), $im->getRecordno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the im table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ImTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ImTableMap::clearInstancePool();
            ImTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ImTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ImTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ImTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ImTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ImQuery
