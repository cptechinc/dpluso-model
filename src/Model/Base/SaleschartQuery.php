<?php

namespace Base;

use \Saleschart as ChildSaleschart;
use \SaleschartQuery as ChildSaleschartQuery;
use \Exception;
use \PDO;
use Map\SaleschartTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'saleschart' table.
 *
 *
 *
 * @method     ChildSaleschartQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildSaleschartQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildSaleschartQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildSaleschartQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildSaleschartQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildSaleschartQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildSaleschartQuery orderByLastsaledate($order = Criteria::ASC) Order by the lastsaledate column
 * @method     ChildSaleschartQuery orderBySalesmtd($order = Criteria::ASC) Order by the salesmtd column
 * @method     ChildSaleschartQuery orderBySalesmth1($order = Criteria::ASC) Order by the salesmth1 column
 * @method     ChildSaleschartQuery orderBySalesmth2($order = Criteria::ASC) Order by the salesmth2 column
 * @method     ChildSaleschartQuery orderBySalesmth3($order = Criteria::ASC) Order by the salesmth3 column
 * @method     ChildSaleschartQuery orderBySalesmth4($order = Criteria::ASC) Order by the salesmth4 column
 * @method     ChildSaleschartQuery orderBySalesmth5($order = Criteria::ASC) Order by the salesmth5 column
 * @method     ChildSaleschartQuery orderBySalesmth6($order = Criteria::ASC) Order by the salesmth6 column
 * @method     ChildSaleschartQuery orderBySalesmth7($order = Criteria::ASC) Order by the salesmth7 column
 * @method     ChildSaleschartQuery orderBySalesmth8($order = Criteria::ASC) Order by the salesmth8 column
 * @method     ChildSaleschartQuery orderBySalesmth9($order = Criteria::ASC) Order by the salesmth9 column
 * @method     ChildSaleschartQuery orderBySalesmth10($order = Criteria::ASC) Order by the salesmth10 column
 * @method     ChildSaleschartQuery orderBySalesmth11($order = Criteria::ASC) Order by the salesmth11 column
 * @method     ChildSaleschartQuery orderBySalesmth12($order = Criteria::ASC) Order by the salesmth12 column
 * @method     ChildSaleschartQuery orderBySalesmth13($order = Criteria::ASC) Order by the salesmth13 column
 * @method     ChildSaleschartQuery orderBySalesmth14($order = Criteria::ASC) Order by the salesmth14 column
 * @method     ChildSaleschartQuery orderBySalesmth15($order = Criteria::ASC) Order by the salesmth15 column
 * @method     ChildSaleschartQuery orderBySalesmth16($order = Criteria::ASC) Order by the salesmth16 column
 * @method     ChildSaleschartQuery orderBySalesmth17($order = Criteria::ASC) Order by the salesmth17 column
 * @method     ChildSaleschartQuery orderBySalesmth18($order = Criteria::ASC) Order by the salesmth18 column
 * @method     ChildSaleschartQuery orderBySalesmth19($order = Criteria::ASC) Order by the salesmth19 column
 * @method     ChildSaleschartQuery orderBySalesmth20($order = Criteria::ASC) Order by the salesmth20 column
 * @method     ChildSaleschartQuery orderBySalesmth21($order = Criteria::ASC) Order by the salesmth21 column
 * @method     ChildSaleschartQuery orderBySalesmth22($order = Criteria::ASC) Order by the salesmth22 column
 * @method     ChildSaleschartQuery orderBySalesmth23($order = Criteria::ASC) Order by the salesmth23 column
 * @method     ChildSaleschartQuery orderBySalesmth24($order = Criteria::ASC) Order by the salesmth24 column
 * @method     ChildSaleschartQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildSaleschartQuery groupBySessionid() Group by the sessionid column
 * @method     ChildSaleschartQuery groupByRecno() Group by the recno column
 * @method     ChildSaleschartQuery groupByDate() Group by the date column
 * @method     ChildSaleschartQuery groupByTime() Group by the time column
 * @method     ChildSaleschartQuery groupByCustid() Group by the custid column
 * @method     ChildSaleschartQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildSaleschartQuery groupByLastsaledate() Group by the lastsaledate column
 * @method     ChildSaleschartQuery groupBySalesmtd() Group by the salesmtd column
 * @method     ChildSaleschartQuery groupBySalesmth1() Group by the salesmth1 column
 * @method     ChildSaleschartQuery groupBySalesmth2() Group by the salesmth2 column
 * @method     ChildSaleschartQuery groupBySalesmth3() Group by the salesmth3 column
 * @method     ChildSaleschartQuery groupBySalesmth4() Group by the salesmth4 column
 * @method     ChildSaleschartQuery groupBySalesmth5() Group by the salesmth5 column
 * @method     ChildSaleschartQuery groupBySalesmth6() Group by the salesmth6 column
 * @method     ChildSaleschartQuery groupBySalesmth7() Group by the salesmth7 column
 * @method     ChildSaleschartQuery groupBySalesmth8() Group by the salesmth8 column
 * @method     ChildSaleschartQuery groupBySalesmth9() Group by the salesmth9 column
 * @method     ChildSaleschartQuery groupBySalesmth10() Group by the salesmth10 column
 * @method     ChildSaleschartQuery groupBySalesmth11() Group by the salesmth11 column
 * @method     ChildSaleschartQuery groupBySalesmth12() Group by the salesmth12 column
 * @method     ChildSaleschartQuery groupBySalesmth13() Group by the salesmth13 column
 * @method     ChildSaleschartQuery groupBySalesmth14() Group by the salesmth14 column
 * @method     ChildSaleschartQuery groupBySalesmth15() Group by the salesmth15 column
 * @method     ChildSaleschartQuery groupBySalesmth16() Group by the salesmth16 column
 * @method     ChildSaleschartQuery groupBySalesmth17() Group by the salesmth17 column
 * @method     ChildSaleschartQuery groupBySalesmth18() Group by the salesmth18 column
 * @method     ChildSaleschartQuery groupBySalesmth19() Group by the salesmth19 column
 * @method     ChildSaleschartQuery groupBySalesmth20() Group by the salesmth20 column
 * @method     ChildSaleschartQuery groupBySalesmth21() Group by the salesmth21 column
 * @method     ChildSaleschartQuery groupBySalesmth22() Group by the salesmth22 column
 * @method     ChildSaleschartQuery groupBySalesmth23() Group by the salesmth23 column
 * @method     ChildSaleschartQuery groupBySalesmth24() Group by the salesmth24 column
 * @method     ChildSaleschartQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildSaleschartQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSaleschartQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSaleschartQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSaleschartQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSaleschartQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSaleschartQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSaleschart findOne(ConnectionInterface $con = null) Return the first ChildSaleschart matching the query
 * @method     ChildSaleschart findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSaleschart matching the query, or a new ChildSaleschart object populated from the query conditions when no match is found
 *
 * @method     ChildSaleschart findOneBySessionid(string $sessionid) Return the first ChildSaleschart filtered by the sessionid column
 * @method     ChildSaleschart findOneByRecno(int $recno) Return the first ChildSaleschart filtered by the recno column
 * @method     ChildSaleschart findOneByDate(int $date) Return the first ChildSaleschart filtered by the date column
 * @method     ChildSaleschart findOneByTime(int $time) Return the first ChildSaleschart filtered by the time column
 * @method     ChildSaleschart findOneByCustid(string $custid) Return the first ChildSaleschart filtered by the custid column
 * @method     ChildSaleschart findOneByShiptoid(string $shiptoid) Return the first ChildSaleschart filtered by the shiptoid column
 * @method     ChildSaleschart findOneByLastsaledate(string $lastsaledate) Return the first ChildSaleschart filtered by the lastsaledate column
 * @method     ChildSaleschart findOneBySalesmtd(string $salesmtd) Return the first ChildSaleschart filtered by the salesmtd column
 * @method     ChildSaleschart findOneBySalesmth1(string $salesmth1) Return the first ChildSaleschart filtered by the salesmth1 column
 * @method     ChildSaleschart findOneBySalesmth2(string $salesmth2) Return the first ChildSaleschart filtered by the salesmth2 column
 * @method     ChildSaleschart findOneBySalesmth3(string $salesmth3) Return the first ChildSaleschart filtered by the salesmth3 column
 * @method     ChildSaleschart findOneBySalesmth4(string $salesmth4) Return the first ChildSaleschart filtered by the salesmth4 column
 * @method     ChildSaleschart findOneBySalesmth5(string $salesmth5) Return the first ChildSaleschart filtered by the salesmth5 column
 * @method     ChildSaleschart findOneBySalesmth6(string $salesmth6) Return the first ChildSaleschart filtered by the salesmth6 column
 * @method     ChildSaleschart findOneBySalesmth7(string $salesmth7) Return the first ChildSaleschart filtered by the salesmth7 column
 * @method     ChildSaleschart findOneBySalesmth8(string $salesmth8) Return the first ChildSaleschart filtered by the salesmth8 column
 * @method     ChildSaleschart findOneBySalesmth9(string $salesmth9) Return the first ChildSaleschart filtered by the salesmth9 column
 * @method     ChildSaleschart findOneBySalesmth10(string $salesmth10) Return the first ChildSaleschart filtered by the salesmth10 column
 * @method     ChildSaleschart findOneBySalesmth11(string $salesmth11) Return the first ChildSaleschart filtered by the salesmth11 column
 * @method     ChildSaleschart findOneBySalesmth12(string $salesmth12) Return the first ChildSaleschart filtered by the salesmth12 column
 * @method     ChildSaleschart findOneBySalesmth13(string $salesmth13) Return the first ChildSaleschart filtered by the salesmth13 column
 * @method     ChildSaleschart findOneBySalesmth14(string $salesmth14) Return the first ChildSaleschart filtered by the salesmth14 column
 * @method     ChildSaleschart findOneBySalesmth15(string $salesmth15) Return the first ChildSaleschart filtered by the salesmth15 column
 * @method     ChildSaleschart findOneBySalesmth16(string $salesmth16) Return the first ChildSaleschart filtered by the salesmth16 column
 * @method     ChildSaleschart findOneBySalesmth17(string $salesmth17) Return the first ChildSaleschart filtered by the salesmth17 column
 * @method     ChildSaleschart findOneBySalesmth18(string $salesmth18) Return the first ChildSaleschart filtered by the salesmth18 column
 * @method     ChildSaleschart findOneBySalesmth19(string $salesmth19) Return the first ChildSaleschart filtered by the salesmth19 column
 * @method     ChildSaleschart findOneBySalesmth20(string $salesmth20) Return the first ChildSaleschart filtered by the salesmth20 column
 * @method     ChildSaleschart findOneBySalesmth21(string $salesmth21) Return the first ChildSaleschart filtered by the salesmth21 column
 * @method     ChildSaleschart findOneBySalesmth22(string $salesmth22) Return the first ChildSaleschart filtered by the salesmth22 column
 * @method     ChildSaleschart findOneBySalesmth23(string $salesmth23) Return the first ChildSaleschart filtered by the salesmth23 column
 * @method     ChildSaleschart findOneBySalesmth24(string $salesmth24) Return the first ChildSaleschart filtered by the salesmth24 column
 * @method     ChildSaleschart findOneByDummy(string $dummy) Return the first ChildSaleschart filtered by the dummy column *

 * @method     ChildSaleschart requirePk($key, ConnectionInterface $con = null) Return the ChildSaleschart by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOne(ConnectionInterface $con = null) Return the first ChildSaleschart matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSaleschart requireOneBySessionid(string $sessionid) Return the first ChildSaleschart filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneByRecno(int $recno) Return the first ChildSaleschart filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneByDate(int $date) Return the first ChildSaleschart filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneByTime(int $time) Return the first ChildSaleschart filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneByCustid(string $custid) Return the first ChildSaleschart filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneByShiptoid(string $shiptoid) Return the first ChildSaleschart filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneByLastsaledate(string $lastsaledate) Return the first ChildSaleschart filtered by the lastsaledate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmtd(string $salesmtd) Return the first ChildSaleschart filtered by the salesmtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth1(string $salesmth1) Return the first ChildSaleschart filtered by the salesmth1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth2(string $salesmth2) Return the first ChildSaleschart filtered by the salesmth2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth3(string $salesmth3) Return the first ChildSaleschart filtered by the salesmth3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth4(string $salesmth4) Return the first ChildSaleschart filtered by the salesmth4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth5(string $salesmth5) Return the first ChildSaleschart filtered by the salesmth5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth6(string $salesmth6) Return the first ChildSaleschart filtered by the salesmth6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth7(string $salesmth7) Return the first ChildSaleschart filtered by the salesmth7 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth8(string $salesmth8) Return the first ChildSaleschart filtered by the salesmth8 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth9(string $salesmth9) Return the first ChildSaleschart filtered by the salesmth9 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth10(string $salesmth10) Return the first ChildSaleschart filtered by the salesmth10 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth11(string $salesmth11) Return the first ChildSaleschart filtered by the salesmth11 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth12(string $salesmth12) Return the first ChildSaleschart filtered by the salesmth12 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth13(string $salesmth13) Return the first ChildSaleschart filtered by the salesmth13 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth14(string $salesmth14) Return the first ChildSaleschart filtered by the salesmth14 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth15(string $salesmth15) Return the first ChildSaleschart filtered by the salesmth15 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth16(string $salesmth16) Return the first ChildSaleschart filtered by the salesmth16 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth17(string $salesmth17) Return the first ChildSaleschart filtered by the salesmth17 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth18(string $salesmth18) Return the first ChildSaleschart filtered by the salesmth18 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth19(string $salesmth19) Return the first ChildSaleschart filtered by the salesmth19 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth20(string $salesmth20) Return the first ChildSaleschart filtered by the salesmth20 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth21(string $salesmth21) Return the first ChildSaleschart filtered by the salesmth21 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth22(string $salesmth22) Return the first ChildSaleschart filtered by the salesmth22 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth23(string $salesmth23) Return the first ChildSaleschart filtered by the salesmth23 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneBySalesmth24(string $salesmth24) Return the first ChildSaleschart filtered by the salesmth24 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSaleschart requireOneByDummy(string $dummy) Return the first ChildSaleschart filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSaleschart[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSaleschart objects based on current ModelCriteria
 * @method     ChildSaleschart[]|ObjectCollection findBySessionid(string $sessionid) Return ChildSaleschart objects filtered by the sessionid column
 * @method     ChildSaleschart[]|ObjectCollection findByRecno(int $recno) Return ChildSaleschart objects filtered by the recno column
 * @method     ChildSaleschart[]|ObjectCollection findByDate(int $date) Return ChildSaleschart objects filtered by the date column
 * @method     ChildSaleschart[]|ObjectCollection findByTime(int $time) Return ChildSaleschart objects filtered by the time column
 * @method     ChildSaleschart[]|ObjectCollection findByCustid(string $custid) Return ChildSaleschart objects filtered by the custid column
 * @method     ChildSaleschart[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildSaleschart objects filtered by the shiptoid column
 * @method     ChildSaleschart[]|ObjectCollection findByLastsaledate(string $lastsaledate) Return ChildSaleschart objects filtered by the lastsaledate column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmtd(string $salesmtd) Return ChildSaleschart objects filtered by the salesmtd column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth1(string $salesmth1) Return ChildSaleschart objects filtered by the salesmth1 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth2(string $salesmth2) Return ChildSaleschart objects filtered by the salesmth2 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth3(string $salesmth3) Return ChildSaleschart objects filtered by the salesmth3 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth4(string $salesmth4) Return ChildSaleschart objects filtered by the salesmth4 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth5(string $salesmth5) Return ChildSaleschart objects filtered by the salesmth5 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth6(string $salesmth6) Return ChildSaleschart objects filtered by the salesmth6 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth7(string $salesmth7) Return ChildSaleschart objects filtered by the salesmth7 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth8(string $salesmth8) Return ChildSaleschart objects filtered by the salesmth8 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth9(string $salesmth9) Return ChildSaleschart objects filtered by the salesmth9 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth10(string $salesmth10) Return ChildSaleschart objects filtered by the salesmth10 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth11(string $salesmth11) Return ChildSaleschart objects filtered by the salesmth11 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth12(string $salesmth12) Return ChildSaleschart objects filtered by the salesmth12 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth13(string $salesmth13) Return ChildSaleschart objects filtered by the salesmth13 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth14(string $salesmth14) Return ChildSaleschart objects filtered by the salesmth14 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth15(string $salesmth15) Return ChildSaleschart objects filtered by the salesmth15 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth16(string $salesmth16) Return ChildSaleschart objects filtered by the salesmth16 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth17(string $salesmth17) Return ChildSaleschart objects filtered by the salesmth17 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth18(string $salesmth18) Return ChildSaleschart objects filtered by the salesmth18 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth19(string $salesmth19) Return ChildSaleschart objects filtered by the salesmth19 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth20(string $salesmth20) Return ChildSaleschart objects filtered by the salesmth20 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth21(string $salesmth21) Return ChildSaleschart objects filtered by the salesmth21 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth22(string $salesmth22) Return ChildSaleschart objects filtered by the salesmth22 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth23(string $salesmth23) Return ChildSaleschart objects filtered by the salesmth23 column
 * @method     ChildSaleschart[]|ObjectCollection findBySalesmth24(string $salesmth24) Return ChildSaleschart objects filtered by the salesmth24 column
 * @method     ChildSaleschart[]|ObjectCollection findByDummy(string $dummy) Return ChildSaleschart objects filtered by the dummy column
 * @method     ChildSaleschart[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SaleschartQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SaleschartQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Saleschart', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSaleschartQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSaleschartQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSaleschartQuery) {
            return $criteria;
        }
        $query = new ChildSaleschartQuery();
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
     * @return ChildSaleschart|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SaleschartTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SaleschartTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildSaleschart A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, custid, shiptoid, lastsaledate, salesmtd, salesmth1, salesmth2, salesmth3, salesmth4, salesmth5, salesmth6, salesmth7, salesmth8, salesmth9, salesmth10, salesmth11, salesmth12, salesmth13, salesmth14, salesmth15, salesmth16, salesmth17, salesmth18, salesmth19, salesmth20, salesmth21, salesmth22, salesmth23, salesmth24, dummy FROM saleschart WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildSaleschart $obj */
            $obj = new ChildSaleschart();
            $obj->hydrate($row);
            SaleschartTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildSaleschart|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SaleschartTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SaleschartTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SaleschartTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SaleschartTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the lastsaledate column
     *
     * Example usage:
     * <code>
     * $query->filterByLastsaledate('fooValue');   // WHERE lastsaledate = 'fooValue'
     * $query->filterByLastsaledate('%fooValue%', Criteria::LIKE); // WHERE lastsaledate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastsaledate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByLastsaledate($lastsaledate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastsaledate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_LASTSALEDATE, $lastsaledate, $comparison);
    }

    /**
     * Filter the query on the salesmtd column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmtd(1234); // WHERE salesmtd = 1234
     * $query->filterBySalesmtd(array(12, 34)); // WHERE salesmtd IN (12, 34)
     * $query->filterBySalesmtd(array('min' => 12)); // WHERE salesmtd > 12
     * </code>
     *
     * @param     mixed $salesmtd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmtd($salesmtd = null, $comparison = null)
    {
        if (is_array($salesmtd)) {
            $useMinMax = false;
            if (isset($salesmtd['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTD, $salesmtd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmtd['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTD, $salesmtd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTD, $salesmtd, $comparison);
    }

    /**
     * Filter the query on the salesmth1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth1(1234); // WHERE salesmth1 = 1234
     * $query->filterBySalesmth1(array(12, 34)); // WHERE salesmth1 IN (12, 34)
     * $query->filterBySalesmth1(array('min' => 12)); // WHERE salesmth1 > 12
     * </code>
     *
     * @param     mixed $salesmth1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth1($salesmth1 = null, $comparison = null)
    {
        if (is_array($salesmth1)) {
            $useMinMax = false;
            if (isset($salesmth1['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH1, $salesmth1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth1['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH1, $salesmth1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH1, $salesmth1, $comparison);
    }

    /**
     * Filter the query on the salesmth2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth2(1234); // WHERE salesmth2 = 1234
     * $query->filterBySalesmth2(array(12, 34)); // WHERE salesmth2 IN (12, 34)
     * $query->filterBySalesmth2(array('min' => 12)); // WHERE salesmth2 > 12
     * </code>
     *
     * @param     mixed $salesmth2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth2($salesmth2 = null, $comparison = null)
    {
        if (is_array($salesmth2)) {
            $useMinMax = false;
            if (isset($salesmth2['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH2, $salesmth2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth2['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH2, $salesmth2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH2, $salesmth2, $comparison);
    }

    /**
     * Filter the query on the salesmth3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth3(1234); // WHERE salesmth3 = 1234
     * $query->filterBySalesmth3(array(12, 34)); // WHERE salesmth3 IN (12, 34)
     * $query->filterBySalesmth3(array('min' => 12)); // WHERE salesmth3 > 12
     * </code>
     *
     * @param     mixed $salesmth3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth3($salesmth3 = null, $comparison = null)
    {
        if (is_array($salesmth3)) {
            $useMinMax = false;
            if (isset($salesmth3['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH3, $salesmth3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth3['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH3, $salesmth3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH3, $salesmth3, $comparison);
    }

    /**
     * Filter the query on the salesmth4 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth4(1234); // WHERE salesmth4 = 1234
     * $query->filterBySalesmth4(array(12, 34)); // WHERE salesmth4 IN (12, 34)
     * $query->filterBySalesmth4(array('min' => 12)); // WHERE salesmth4 > 12
     * </code>
     *
     * @param     mixed $salesmth4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth4($salesmth4 = null, $comparison = null)
    {
        if (is_array($salesmth4)) {
            $useMinMax = false;
            if (isset($salesmth4['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH4, $salesmth4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth4['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH4, $salesmth4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH4, $salesmth4, $comparison);
    }

    /**
     * Filter the query on the salesmth5 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth5(1234); // WHERE salesmth5 = 1234
     * $query->filterBySalesmth5(array(12, 34)); // WHERE salesmth5 IN (12, 34)
     * $query->filterBySalesmth5(array('min' => 12)); // WHERE salesmth5 > 12
     * </code>
     *
     * @param     mixed $salesmth5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth5($salesmth5 = null, $comparison = null)
    {
        if (is_array($salesmth5)) {
            $useMinMax = false;
            if (isset($salesmth5['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH5, $salesmth5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth5['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH5, $salesmth5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH5, $salesmth5, $comparison);
    }

    /**
     * Filter the query on the salesmth6 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth6(1234); // WHERE salesmth6 = 1234
     * $query->filterBySalesmth6(array(12, 34)); // WHERE salesmth6 IN (12, 34)
     * $query->filterBySalesmth6(array('min' => 12)); // WHERE salesmth6 > 12
     * </code>
     *
     * @param     mixed $salesmth6 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth6($salesmth6 = null, $comparison = null)
    {
        if (is_array($salesmth6)) {
            $useMinMax = false;
            if (isset($salesmth6['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH6, $salesmth6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth6['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH6, $salesmth6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH6, $salesmth6, $comparison);
    }

    /**
     * Filter the query on the salesmth7 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth7(1234); // WHERE salesmth7 = 1234
     * $query->filterBySalesmth7(array(12, 34)); // WHERE salesmth7 IN (12, 34)
     * $query->filterBySalesmth7(array('min' => 12)); // WHERE salesmth7 > 12
     * </code>
     *
     * @param     mixed $salesmth7 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth7($salesmth7 = null, $comparison = null)
    {
        if (is_array($salesmth7)) {
            $useMinMax = false;
            if (isset($salesmth7['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH7, $salesmth7['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth7['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH7, $salesmth7['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH7, $salesmth7, $comparison);
    }

    /**
     * Filter the query on the salesmth8 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth8(1234); // WHERE salesmth8 = 1234
     * $query->filterBySalesmth8(array(12, 34)); // WHERE salesmth8 IN (12, 34)
     * $query->filterBySalesmth8(array('min' => 12)); // WHERE salesmth8 > 12
     * </code>
     *
     * @param     mixed $salesmth8 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth8($salesmth8 = null, $comparison = null)
    {
        if (is_array($salesmth8)) {
            $useMinMax = false;
            if (isset($salesmth8['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH8, $salesmth8['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth8['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH8, $salesmth8['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH8, $salesmth8, $comparison);
    }

    /**
     * Filter the query on the salesmth9 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth9(1234); // WHERE salesmth9 = 1234
     * $query->filterBySalesmth9(array(12, 34)); // WHERE salesmth9 IN (12, 34)
     * $query->filterBySalesmth9(array('min' => 12)); // WHERE salesmth9 > 12
     * </code>
     *
     * @param     mixed $salesmth9 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth9($salesmth9 = null, $comparison = null)
    {
        if (is_array($salesmth9)) {
            $useMinMax = false;
            if (isset($salesmth9['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH9, $salesmth9['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth9['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH9, $salesmth9['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH9, $salesmth9, $comparison);
    }

    /**
     * Filter the query on the salesmth10 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth10(1234); // WHERE salesmth10 = 1234
     * $query->filterBySalesmth10(array(12, 34)); // WHERE salesmth10 IN (12, 34)
     * $query->filterBySalesmth10(array('min' => 12)); // WHERE salesmth10 > 12
     * </code>
     *
     * @param     mixed $salesmth10 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth10($salesmth10 = null, $comparison = null)
    {
        if (is_array($salesmth10)) {
            $useMinMax = false;
            if (isset($salesmth10['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH10, $salesmth10['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth10['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH10, $salesmth10['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH10, $salesmth10, $comparison);
    }

    /**
     * Filter the query on the salesmth11 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth11(1234); // WHERE salesmth11 = 1234
     * $query->filterBySalesmth11(array(12, 34)); // WHERE salesmth11 IN (12, 34)
     * $query->filterBySalesmth11(array('min' => 12)); // WHERE salesmth11 > 12
     * </code>
     *
     * @param     mixed $salesmth11 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth11($salesmth11 = null, $comparison = null)
    {
        if (is_array($salesmth11)) {
            $useMinMax = false;
            if (isset($salesmth11['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH11, $salesmth11['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth11['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH11, $salesmth11['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH11, $salesmth11, $comparison);
    }

    /**
     * Filter the query on the salesmth12 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth12(1234); // WHERE salesmth12 = 1234
     * $query->filterBySalesmth12(array(12, 34)); // WHERE salesmth12 IN (12, 34)
     * $query->filterBySalesmth12(array('min' => 12)); // WHERE salesmth12 > 12
     * </code>
     *
     * @param     mixed $salesmth12 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth12($salesmth12 = null, $comparison = null)
    {
        if (is_array($salesmth12)) {
            $useMinMax = false;
            if (isset($salesmth12['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH12, $salesmth12['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth12['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH12, $salesmth12['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH12, $salesmth12, $comparison);
    }

    /**
     * Filter the query on the salesmth13 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth13(1234); // WHERE salesmth13 = 1234
     * $query->filterBySalesmth13(array(12, 34)); // WHERE salesmth13 IN (12, 34)
     * $query->filterBySalesmth13(array('min' => 12)); // WHERE salesmth13 > 12
     * </code>
     *
     * @param     mixed $salesmth13 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth13($salesmth13 = null, $comparison = null)
    {
        if (is_array($salesmth13)) {
            $useMinMax = false;
            if (isset($salesmth13['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH13, $salesmth13['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth13['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH13, $salesmth13['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH13, $salesmth13, $comparison);
    }

    /**
     * Filter the query on the salesmth14 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth14(1234); // WHERE salesmth14 = 1234
     * $query->filterBySalesmth14(array(12, 34)); // WHERE salesmth14 IN (12, 34)
     * $query->filterBySalesmth14(array('min' => 12)); // WHERE salesmth14 > 12
     * </code>
     *
     * @param     mixed $salesmth14 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth14($salesmth14 = null, $comparison = null)
    {
        if (is_array($salesmth14)) {
            $useMinMax = false;
            if (isset($salesmth14['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH14, $salesmth14['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth14['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH14, $salesmth14['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH14, $salesmth14, $comparison);
    }

    /**
     * Filter the query on the salesmth15 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth15(1234); // WHERE salesmth15 = 1234
     * $query->filterBySalesmth15(array(12, 34)); // WHERE salesmth15 IN (12, 34)
     * $query->filterBySalesmth15(array('min' => 12)); // WHERE salesmth15 > 12
     * </code>
     *
     * @param     mixed $salesmth15 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth15($salesmth15 = null, $comparison = null)
    {
        if (is_array($salesmth15)) {
            $useMinMax = false;
            if (isset($salesmth15['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH15, $salesmth15['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth15['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH15, $salesmth15['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH15, $salesmth15, $comparison);
    }

    /**
     * Filter the query on the salesmth16 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth16(1234); // WHERE salesmth16 = 1234
     * $query->filterBySalesmth16(array(12, 34)); // WHERE salesmth16 IN (12, 34)
     * $query->filterBySalesmth16(array('min' => 12)); // WHERE salesmth16 > 12
     * </code>
     *
     * @param     mixed $salesmth16 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth16($salesmth16 = null, $comparison = null)
    {
        if (is_array($salesmth16)) {
            $useMinMax = false;
            if (isset($salesmth16['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH16, $salesmth16['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth16['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH16, $salesmth16['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH16, $salesmth16, $comparison);
    }

    /**
     * Filter the query on the salesmth17 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth17(1234); // WHERE salesmth17 = 1234
     * $query->filterBySalesmth17(array(12, 34)); // WHERE salesmth17 IN (12, 34)
     * $query->filterBySalesmth17(array('min' => 12)); // WHERE salesmth17 > 12
     * </code>
     *
     * @param     mixed $salesmth17 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth17($salesmth17 = null, $comparison = null)
    {
        if (is_array($salesmth17)) {
            $useMinMax = false;
            if (isset($salesmth17['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH17, $salesmth17['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth17['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH17, $salesmth17['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH17, $salesmth17, $comparison);
    }

    /**
     * Filter the query on the salesmth18 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth18(1234); // WHERE salesmth18 = 1234
     * $query->filterBySalesmth18(array(12, 34)); // WHERE salesmth18 IN (12, 34)
     * $query->filterBySalesmth18(array('min' => 12)); // WHERE salesmth18 > 12
     * </code>
     *
     * @param     mixed $salesmth18 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth18($salesmth18 = null, $comparison = null)
    {
        if (is_array($salesmth18)) {
            $useMinMax = false;
            if (isset($salesmth18['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH18, $salesmth18['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth18['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH18, $salesmth18['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH18, $salesmth18, $comparison);
    }

    /**
     * Filter the query on the salesmth19 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth19(1234); // WHERE salesmth19 = 1234
     * $query->filterBySalesmth19(array(12, 34)); // WHERE salesmth19 IN (12, 34)
     * $query->filterBySalesmth19(array('min' => 12)); // WHERE salesmth19 > 12
     * </code>
     *
     * @param     mixed $salesmth19 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth19($salesmth19 = null, $comparison = null)
    {
        if (is_array($salesmth19)) {
            $useMinMax = false;
            if (isset($salesmth19['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH19, $salesmth19['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth19['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH19, $salesmth19['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH19, $salesmth19, $comparison);
    }

    /**
     * Filter the query on the salesmth20 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth20(1234); // WHERE salesmth20 = 1234
     * $query->filterBySalesmth20(array(12, 34)); // WHERE salesmth20 IN (12, 34)
     * $query->filterBySalesmth20(array('min' => 12)); // WHERE salesmth20 > 12
     * </code>
     *
     * @param     mixed $salesmth20 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth20($salesmth20 = null, $comparison = null)
    {
        if (is_array($salesmth20)) {
            $useMinMax = false;
            if (isset($salesmth20['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH20, $salesmth20['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth20['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH20, $salesmth20['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH20, $salesmth20, $comparison);
    }

    /**
     * Filter the query on the salesmth21 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth21(1234); // WHERE salesmth21 = 1234
     * $query->filterBySalesmth21(array(12, 34)); // WHERE salesmth21 IN (12, 34)
     * $query->filterBySalesmth21(array('min' => 12)); // WHERE salesmth21 > 12
     * </code>
     *
     * @param     mixed $salesmth21 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth21($salesmth21 = null, $comparison = null)
    {
        if (is_array($salesmth21)) {
            $useMinMax = false;
            if (isset($salesmth21['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH21, $salesmth21['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth21['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH21, $salesmth21['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH21, $salesmth21, $comparison);
    }

    /**
     * Filter the query on the salesmth22 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth22(1234); // WHERE salesmth22 = 1234
     * $query->filterBySalesmth22(array(12, 34)); // WHERE salesmth22 IN (12, 34)
     * $query->filterBySalesmth22(array('min' => 12)); // WHERE salesmth22 > 12
     * </code>
     *
     * @param     mixed $salesmth22 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth22($salesmth22 = null, $comparison = null)
    {
        if (is_array($salesmth22)) {
            $useMinMax = false;
            if (isset($salesmth22['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH22, $salesmth22['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth22['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH22, $salesmth22['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH22, $salesmth22, $comparison);
    }

    /**
     * Filter the query on the salesmth23 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth23(1234); // WHERE salesmth23 = 1234
     * $query->filterBySalesmth23(array(12, 34)); // WHERE salesmth23 IN (12, 34)
     * $query->filterBySalesmth23(array('min' => 12)); // WHERE salesmth23 > 12
     * </code>
     *
     * @param     mixed $salesmth23 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth23($salesmth23 = null, $comparison = null)
    {
        if (is_array($salesmth23)) {
            $useMinMax = false;
            if (isset($salesmth23['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH23, $salesmth23['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth23['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH23, $salesmth23['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH23, $salesmth23, $comparison);
    }

    /**
     * Filter the query on the salesmth24 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesmth24(1234); // WHERE salesmth24 = 1234
     * $query->filterBySalesmth24(array(12, 34)); // WHERE salesmth24 IN (12, 34)
     * $query->filterBySalesmth24(array('min' => 12)); // WHERE salesmth24 > 12
     * </code>
     *
     * @param     mixed $salesmth24 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterBySalesmth24($salesmth24 = null, $comparison = null)
    {
        if (is_array($salesmth24)) {
            $useMinMax = false;
            if (isset($salesmth24['min'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH24, $salesmth24['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesmth24['max'])) {
                $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH24, $salesmth24['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_SALESMTH24, $salesmth24, $comparison);
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
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SaleschartTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSaleschart $saleschart Object to remove from the list of results
     *
     * @return $this|ChildSaleschartQuery The current query, for fluid interface
     */
    public function prune($saleschart = null)
    {
        if ($saleschart) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SaleschartTableMap::COL_SESSIONID), $saleschart->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SaleschartTableMap::COL_RECNO), $saleschart->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the saleschart table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SaleschartTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SaleschartTableMap::clearInstancePool();
            SaleschartTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SaleschartTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SaleschartTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SaleschartTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SaleschartTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SaleschartQuery
