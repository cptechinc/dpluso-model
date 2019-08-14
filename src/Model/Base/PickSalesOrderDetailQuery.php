<?php

namespace Base;

use \PickSalesOrderDetail as ChildPickSalesOrderDetail;
use \PickSalesOrderDetailQuery as ChildPickSalesOrderDetailQuery;
use \Exception;
use \PDO;
use Map\PickSalesOrderDetailTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'wmpickdet' table.
 *
 *
 *
 * @method     ChildPickSalesOrderDetailQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildPickSalesOrderDetailQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildPickSalesOrderDetailQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildPickSalesOrderDetailQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildPickSalesOrderDetailQuery orderByOrdernbr($order = Criteria::ASC) Order by the ordernbr column
 * @method     ChildPickSalesOrderDetailQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildPickSalesOrderDetailQuery orderBySublinenbr($order = Criteria::ASC) Order by the sublinenbr column
 * @method     ChildPickSalesOrderDetailQuery orderByItemnbr($order = Criteria::ASC) Order by the itemnbr column
 * @method     ChildPickSalesOrderDetailQuery orderByItemdesc1($order = Criteria::ASC) Order by the itemdesc1 column
 * @method     ChildPickSalesOrderDetailQuery orderByItemdesc2($order = Criteria::ASC) Order by the itemdesc2 column
 * @method     ChildPickSalesOrderDetailQuery orderByQtyordered($order = Criteria::ASC) Order by the qtyordered column
 * @method     ChildPickSalesOrderDetailQuery orderByQtypulled($order = Criteria::ASC) Order by the qtypulled column
 * @method     ChildPickSalesOrderDetailQuery orderByQtyremaining($order = Criteria::ASC) Order by the qtyremaining column
 * @method     ChildPickSalesOrderDetailQuery orderByBinnbr($order = Criteria::ASC) Order by the binnbr column
 * @method     ChildPickSalesOrderDetailQuery orderByCaseqty($order = Criteria::ASC) Order by the caseqty column
 * @method     ChildPickSalesOrderDetailQuery orderByInnerpack($order = Criteria::ASC) Order by the innerpack column
 * @method     ChildPickSalesOrderDetailQuery orderByBinqty($order = Criteria::ASC) Order by the binqty column
 * @method     ChildPickSalesOrderDetailQuery orderByOverbin1($order = Criteria::ASC) Order by the overbin1 column
 * @method     ChildPickSalesOrderDetailQuery orderByOverbinqty1($order = Criteria::ASC) Order by the overbinqty1 column
 * @method     ChildPickSalesOrderDetailQuery orderByOverbin2($order = Criteria::ASC) Order by the overbin2 column
 * @method     ChildPickSalesOrderDetailQuery orderByOverbinqty2($order = Criteria::ASC) Order by the overbinqty2 column
 * @method     ChildPickSalesOrderDetailQuery orderByStatusmsg($order = Criteria::ASC) Order by the statusmsg column
 * @method     ChildPickSalesOrderDetailQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildPickSalesOrderDetailQuery groupBySessionid() Group by the sessionid column
 * @method     ChildPickSalesOrderDetailQuery groupByRecno() Group by the recno column
 * @method     ChildPickSalesOrderDetailQuery groupByDate() Group by the date column
 * @method     ChildPickSalesOrderDetailQuery groupByTime() Group by the time column
 * @method     ChildPickSalesOrderDetailQuery groupByOrdernbr() Group by the ordernbr column
 * @method     ChildPickSalesOrderDetailQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildPickSalesOrderDetailQuery groupBySublinenbr() Group by the sublinenbr column
 * @method     ChildPickSalesOrderDetailQuery groupByItemnbr() Group by the itemnbr column
 * @method     ChildPickSalesOrderDetailQuery groupByItemdesc1() Group by the itemdesc1 column
 * @method     ChildPickSalesOrderDetailQuery groupByItemdesc2() Group by the itemdesc2 column
 * @method     ChildPickSalesOrderDetailQuery groupByQtyordered() Group by the qtyordered column
 * @method     ChildPickSalesOrderDetailQuery groupByQtypulled() Group by the qtypulled column
 * @method     ChildPickSalesOrderDetailQuery groupByQtyremaining() Group by the qtyremaining column
 * @method     ChildPickSalesOrderDetailQuery groupByBinnbr() Group by the binnbr column
 * @method     ChildPickSalesOrderDetailQuery groupByCaseqty() Group by the caseqty column
 * @method     ChildPickSalesOrderDetailQuery groupByInnerpack() Group by the innerpack column
 * @method     ChildPickSalesOrderDetailQuery groupByBinqty() Group by the binqty column
 * @method     ChildPickSalesOrderDetailQuery groupByOverbin1() Group by the overbin1 column
 * @method     ChildPickSalesOrderDetailQuery groupByOverbinqty1() Group by the overbinqty1 column
 * @method     ChildPickSalesOrderDetailQuery groupByOverbin2() Group by the overbin2 column
 * @method     ChildPickSalesOrderDetailQuery groupByOverbinqty2() Group by the overbinqty2 column
 * @method     ChildPickSalesOrderDetailQuery groupByStatusmsg() Group by the statusmsg column
 * @method     ChildPickSalesOrderDetailQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildPickSalesOrderDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPickSalesOrderDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPickSalesOrderDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPickSalesOrderDetailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPickSalesOrderDetailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPickSalesOrderDetailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPickSalesOrderDetail findOne(ConnectionInterface $con = null) Return the first ChildPickSalesOrderDetail matching the query
 * @method     ChildPickSalesOrderDetail findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPickSalesOrderDetail matching the query, or a new ChildPickSalesOrderDetail object populated from the query conditions when no match is found
 *
 * @method     ChildPickSalesOrderDetail findOneBySessionid(string $sessionid) Return the first ChildPickSalesOrderDetail filtered by the sessionid column
 * @method     ChildPickSalesOrderDetail findOneByRecno(int $recno) Return the first ChildPickSalesOrderDetail filtered by the recno column
 * @method     ChildPickSalesOrderDetail findOneByDate(int $date) Return the first ChildPickSalesOrderDetail filtered by the date column
 * @method     ChildPickSalesOrderDetail findOneByTime(int $time) Return the first ChildPickSalesOrderDetail filtered by the time column
 * @method     ChildPickSalesOrderDetail findOneByOrdernbr(string $ordernbr) Return the first ChildPickSalesOrderDetail filtered by the ordernbr column
 * @method     ChildPickSalesOrderDetail findOneByLinenbr(int $linenbr) Return the first ChildPickSalesOrderDetail filtered by the linenbr column
 * @method     ChildPickSalesOrderDetail findOneBySublinenbr(int $sublinenbr) Return the first ChildPickSalesOrderDetail filtered by the sublinenbr column
 * @method     ChildPickSalesOrderDetail findOneByItemnbr(string $itemnbr) Return the first ChildPickSalesOrderDetail filtered by the itemnbr column
 * @method     ChildPickSalesOrderDetail findOneByItemdesc1(string $itemdesc1) Return the first ChildPickSalesOrderDetail filtered by the itemdesc1 column
 * @method     ChildPickSalesOrderDetail findOneByItemdesc2(string $itemdesc2) Return the first ChildPickSalesOrderDetail filtered by the itemdesc2 column
 * @method     ChildPickSalesOrderDetail findOneByQtyordered(int $qtyordered) Return the first ChildPickSalesOrderDetail filtered by the qtyordered column
 * @method     ChildPickSalesOrderDetail findOneByQtypulled(int $qtypulled) Return the first ChildPickSalesOrderDetail filtered by the qtypulled column
 * @method     ChildPickSalesOrderDetail findOneByQtyremaining(int $qtyremaining) Return the first ChildPickSalesOrderDetail filtered by the qtyremaining column
 * @method     ChildPickSalesOrderDetail findOneByBinnbr(string $binnbr) Return the first ChildPickSalesOrderDetail filtered by the binnbr column
 * @method     ChildPickSalesOrderDetail findOneByCaseqty(int $caseqty) Return the first ChildPickSalesOrderDetail filtered by the caseqty column
 * @method     ChildPickSalesOrderDetail findOneByInnerpack(int $innerpack) Return the first ChildPickSalesOrderDetail filtered by the innerpack column
 * @method     ChildPickSalesOrderDetail findOneByBinqty(int $binqty) Return the first ChildPickSalesOrderDetail filtered by the binqty column
 * @method     ChildPickSalesOrderDetail findOneByOverbin1(string $overbin1) Return the first ChildPickSalesOrderDetail filtered by the overbin1 column
 * @method     ChildPickSalesOrderDetail findOneByOverbinqty1(int $overbinqty1) Return the first ChildPickSalesOrderDetail filtered by the overbinqty1 column
 * @method     ChildPickSalesOrderDetail findOneByOverbin2(string $overbin2) Return the first ChildPickSalesOrderDetail filtered by the overbin2 column
 * @method     ChildPickSalesOrderDetail findOneByOverbinqty2(int $overbinqty2) Return the first ChildPickSalesOrderDetail filtered by the overbinqty2 column
 * @method     ChildPickSalesOrderDetail findOneByStatusmsg(string $statusmsg) Return the first ChildPickSalesOrderDetail filtered by the statusmsg column
 * @method     ChildPickSalesOrderDetail findOneByDummy(string $dummy) Return the first ChildPickSalesOrderDetail filtered by the dummy column *

 * @method     ChildPickSalesOrderDetail requirePk($key, ConnectionInterface $con = null) Return the ChildPickSalesOrderDetail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOne(ConnectionInterface $con = null) Return the first ChildPickSalesOrderDetail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPickSalesOrderDetail requireOneBySessionid(string $sessionid) Return the first ChildPickSalesOrderDetail filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByRecno(int $recno) Return the first ChildPickSalesOrderDetail filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByDate(int $date) Return the first ChildPickSalesOrderDetail filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByTime(int $time) Return the first ChildPickSalesOrderDetail filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByOrdernbr(string $ordernbr) Return the first ChildPickSalesOrderDetail filtered by the ordernbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByLinenbr(int $linenbr) Return the first ChildPickSalesOrderDetail filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneBySublinenbr(int $sublinenbr) Return the first ChildPickSalesOrderDetail filtered by the sublinenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByItemnbr(string $itemnbr) Return the first ChildPickSalesOrderDetail filtered by the itemnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByItemdesc1(string $itemdesc1) Return the first ChildPickSalesOrderDetail filtered by the itemdesc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByItemdesc2(string $itemdesc2) Return the first ChildPickSalesOrderDetail filtered by the itemdesc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByQtyordered(int $qtyordered) Return the first ChildPickSalesOrderDetail filtered by the qtyordered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByQtypulled(int $qtypulled) Return the first ChildPickSalesOrderDetail filtered by the qtypulled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByQtyremaining(int $qtyremaining) Return the first ChildPickSalesOrderDetail filtered by the qtyremaining column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByBinnbr(string $binnbr) Return the first ChildPickSalesOrderDetail filtered by the binnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByCaseqty(int $caseqty) Return the first ChildPickSalesOrderDetail filtered by the caseqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByInnerpack(int $innerpack) Return the first ChildPickSalesOrderDetail filtered by the innerpack column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByBinqty(int $binqty) Return the first ChildPickSalesOrderDetail filtered by the binqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByOverbin1(string $overbin1) Return the first ChildPickSalesOrderDetail filtered by the overbin1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByOverbinqty1(int $overbinqty1) Return the first ChildPickSalesOrderDetail filtered by the overbinqty1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByOverbin2(string $overbin2) Return the first ChildPickSalesOrderDetail filtered by the overbin2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByOverbinqty2(int $overbinqty2) Return the first ChildPickSalesOrderDetail filtered by the overbinqty2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByStatusmsg(string $statusmsg) Return the first ChildPickSalesOrderDetail filtered by the statusmsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrderDetail requireOneByDummy(string $dummy) Return the first ChildPickSalesOrderDetail filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPickSalesOrderDetail objects based on current ModelCriteria
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findBySessionid(string $sessionid) Return ChildPickSalesOrderDetail objects filtered by the sessionid column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByRecno(int $recno) Return ChildPickSalesOrderDetail objects filtered by the recno column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByDate(int $date) Return ChildPickSalesOrderDetail objects filtered by the date column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByTime(int $time) Return ChildPickSalesOrderDetail objects filtered by the time column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByOrdernbr(string $ordernbr) Return ChildPickSalesOrderDetail objects filtered by the ordernbr column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByLinenbr(int $linenbr) Return ChildPickSalesOrderDetail objects filtered by the linenbr column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findBySublinenbr(int $sublinenbr) Return ChildPickSalesOrderDetail objects filtered by the sublinenbr column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByItemnbr(string $itemnbr) Return ChildPickSalesOrderDetail objects filtered by the itemnbr column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByItemdesc1(string $itemdesc1) Return ChildPickSalesOrderDetail objects filtered by the itemdesc1 column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByItemdesc2(string $itemdesc2) Return ChildPickSalesOrderDetail objects filtered by the itemdesc2 column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByQtyordered(int $qtyordered) Return ChildPickSalesOrderDetail objects filtered by the qtyordered column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByQtypulled(int $qtypulled) Return ChildPickSalesOrderDetail objects filtered by the qtypulled column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByQtyremaining(int $qtyremaining) Return ChildPickSalesOrderDetail objects filtered by the qtyremaining column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByBinnbr(string $binnbr) Return ChildPickSalesOrderDetail objects filtered by the binnbr column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByCaseqty(int $caseqty) Return ChildPickSalesOrderDetail objects filtered by the caseqty column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByInnerpack(int $innerpack) Return ChildPickSalesOrderDetail objects filtered by the innerpack column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByBinqty(int $binqty) Return ChildPickSalesOrderDetail objects filtered by the binqty column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByOverbin1(string $overbin1) Return ChildPickSalesOrderDetail objects filtered by the overbin1 column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByOverbinqty1(int $overbinqty1) Return ChildPickSalesOrderDetail objects filtered by the overbinqty1 column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByOverbin2(string $overbin2) Return ChildPickSalesOrderDetail objects filtered by the overbin2 column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByOverbinqty2(int $overbinqty2) Return ChildPickSalesOrderDetail objects filtered by the overbinqty2 column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByStatusmsg(string $statusmsg) Return ChildPickSalesOrderDetail objects filtered by the statusmsg column
 * @method     ChildPickSalesOrderDetail[]|ObjectCollection findByDummy(string $dummy) Return ChildPickSalesOrderDetail objects filtered by the dummy column
 * @method     ChildPickSalesOrderDetail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PickSalesOrderDetailQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PickSalesOrderDetailQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\PickSalesOrderDetail', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPickSalesOrderDetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPickSalesOrderDetailQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPickSalesOrderDetailQuery) {
            return $criteria;
        }
        $query = new ChildPickSalesOrderDetailQuery();
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
     * @return ChildPickSalesOrderDetail|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PickSalesOrderDetailTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PickSalesOrderDetailTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildPickSalesOrderDetail A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, ordernbr, linenbr, sublinenbr, itemnbr, itemdesc1, itemdesc2, qtyordered, qtypulled, qtyremaining, binnbr, caseqty, innerpack, binqty, overbin1, overbinqty1, overbin2, overbinqty2, statusmsg, dummy FROM wmpickdet WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildPickSalesOrderDetail $obj */
            $obj = new ChildPickSalesOrderDetail();
            $obj->hydrate($row);
            PickSalesOrderDetailTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildPickSalesOrderDetail|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PickSalesOrderDetailTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PickSalesOrderDetailTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the ordernbr column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdernbr('fooValue');   // WHERE ordernbr = 'fooValue'
     * $query->filterByOrdernbr('%fooValue%', Criteria::LIKE); // WHERE ordernbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ordernbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByOrdernbr($ordernbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordernbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_ORDERNBR, $ordernbr, $comparison);
    }

    /**
     * Filter the query on the linenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByLinenbr(1234); // WHERE linenbr = 1234
     * $query->filterByLinenbr(array(12, 34)); // WHERE linenbr IN (12, 34)
     * $query->filterByLinenbr(array('min' => 12)); // WHERE linenbr > 12
     * </code>
     *
     * @param     mixed $linenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, $comparison = null)
    {
        if (is_array($linenbr)) {
            $useMinMax = false;
            if (isset($linenbr['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_LINENBR, $linenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($linenbr['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_LINENBR, $linenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_LINENBR, $linenbr, $comparison);
    }

    /**
     * Filter the query on the sublinenbr column
     *
     * Example usage:
     * <code>
     * $query->filterBySublinenbr(1234); // WHERE sublinenbr = 1234
     * $query->filterBySublinenbr(array(12, 34)); // WHERE sublinenbr IN (12, 34)
     * $query->filterBySublinenbr(array('min' => 12)); // WHERE sublinenbr > 12
     * </code>
     *
     * @param     mixed $sublinenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterBySublinenbr($sublinenbr = null, $comparison = null)
    {
        if (is_array($sublinenbr)) {
            $useMinMax = false;
            if (isset($sublinenbr['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_SUBLINENBR, $sublinenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sublinenbr['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_SUBLINENBR, $sublinenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_SUBLINENBR, $sublinenbr, $comparison);
    }

    /**
     * Filter the query on the itemnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByItemnbr('fooValue');   // WHERE itemnbr = 'fooValue'
     * $query->filterByItemnbr('%fooValue%', Criteria::LIKE); // WHERE itemnbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByItemnbr($itemnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_ITEMNBR, $itemnbr, $comparison);
    }

    /**
     * Filter the query on the itemdesc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByItemdesc1('fooValue');   // WHERE itemdesc1 = 'fooValue'
     * $query->filterByItemdesc1('%fooValue%', Criteria::LIKE); // WHERE itemdesc1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemdesc1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByItemdesc1($itemdesc1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemdesc1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_ITEMDESC1, $itemdesc1, $comparison);
    }

    /**
     * Filter the query on the itemdesc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByItemdesc2('fooValue');   // WHERE itemdesc2 = 'fooValue'
     * $query->filterByItemdesc2('%fooValue%', Criteria::LIKE); // WHERE itemdesc2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemdesc2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByItemdesc2($itemdesc2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemdesc2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_ITEMDESC2, $itemdesc2, $comparison);
    }

    /**
     * Filter the query on the qtyordered column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyordered(1234); // WHERE qtyordered = 1234
     * $query->filterByQtyordered(array(12, 34)); // WHERE qtyordered IN (12, 34)
     * $query->filterByQtyordered(array('min' => 12)); // WHERE qtyordered > 12
     * </code>
     *
     * @param     mixed $qtyordered The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByQtyordered($qtyordered = null, $comparison = null)
    {
        if (is_array($qtyordered)) {
            $useMinMax = false;
            if (isset($qtyordered['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYORDERED, $qtyordered['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyordered['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYORDERED, $qtyordered['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYORDERED, $qtyordered, $comparison);
    }

    /**
     * Filter the query on the qtypulled column
     *
     * Example usage:
     * <code>
     * $query->filterByQtypulled(1234); // WHERE qtypulled = 1234
     * $query->filterByQtypulled(array(12, 34)); // WHERE qtypulled IN (12, 34)
     * $query->filterByQtypulled(array('min' => 12)); // WHERE qtypulled > 12
     * </code>
     *
     * @param     mixed $qtypulled The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByQtypulled($qtypulled = null, $comparison = null)
    {
        if (is_array($qtypulled)) {
            $useMinMax = false;
            if (isset($qtypulled['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYPULLED, $qtypulled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtypulled['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYPULLED, $qtypulled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYPULLED, $qtypulled, $comparison);
    }

    /**
     * Filter the query on the qtyremaining column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyremaining(1234); // WHERE qtyremaining = 1234
     * $query->filterByQtyremaining(array(12, 34)); // WHERE qtyremaining IN (12, 34)
     * $query->filterByQtyremaining(array('min' => 12)); // WHERE qtyremaining > 12
     * </code>
     *
     * @param     mixed $qtyremaining The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByQtyremaining($qtyremaining = null, $comparison = null)
    {
        if (is_array($qtyremaining)) {
            $useMinMax = false;
            if (isset($qtyremaining['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYREMAINING, $qtyremaining['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyremaining['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYREMAINING, $qtyremaining['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_QTYREMAINING, $qtyremaining, $comparison);
    }

    /**
     * Filter the query on the binnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByBinnbr('fooValue');   // WHERE binnbr = 'fooValue'
     * $query->filterByBinnbr('%fooValue%', Criteria::LIKE); // WHERE binnbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $binnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByBinnbr($binnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($binnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_BINNBR, $binnbr, $comparison);
    }

    /**
     * Filter the query on the caseqty column
     *
     * Example usage:
     * <code>
     * $query->filterByCaseqty(1234); // WHERE caseqty = 1234
     * $query->filterByCaseqty(array(12, 34)); // WHERE caseqty IN (12, 34)
     * $query->filterByCaseqty(array('min' => 12)); // WHERE caseqty > 12
     * </code>
     *
     * @param     mixed $caseqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByCaseqty($caseqty = null, $comparison = null)
    {
        if (is_array($caseqty)) {
            $useMinMax = false;
            if (isset($caseqty['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_CASEQTY, $caseqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($caseqty['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_CASEQTY, $caseqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_CASEQTY, $caseqty, $comparison);
    }

    /**
     * Filter the query on the innerpack column
     *
     * Example usage:
     * <code>
     * $query->filterByInnerpack(1234); // WHERE innerpack = 1234
     * $query->filterByInnerpack(array(12, 34)); // WHERE innerpack IN (12, 34)
     * $query->filterByInnerpack(array('min' => 12)); // WHERE innerpack > 12
     * </code>
     *
     * @param     mixed $innerpack The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByInnerpack($innerpack = null, $comparison = null)
    {
        if (is_array($innerpack)) {
            $useMinMax = false;
            if (isset($innerpack['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_INNERPACK, $innerpack['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($innerpack['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_INNERPACK, $innerpack['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_INNERPACK, $innerpack, $comparison);
    }

    /**
     * Filter the query on the binqty column
     *
     * Example usage:
     * <code>
     * $query->filterByBinqty(1234); // WHERE binqty = 1234
     * $query->filterByBinqty(array(12, 34)); // WHERE binqty IN (12, 34)
     * $query->filterByBinqty(array('min' => 12)); // WHERE binqty > 12
     * </code>
     *
     * @param     mixed $binqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByBinqty($binqty = null, $comparison = null)
    {
        if (is_array($binqty)) {
            $useMinMax = false;
            if (isset($binqty['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_BINQTY, $binqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($binqty['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_BINQTY, $binqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_BINQTY, $binqty, $comparison);
    }

    /**
     * Filter the query on the overbin1 column
     *
     * Example usage:
     * <code>
     * $query->filterByOverbin1('fooValue');   // WHERE overbin1 = 'fooValue'
     * $query->filterByOverbin1('%fooValue%', Criteria::LIKE); // WHERE overbin1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $overbin1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByOverbin1($overbin1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($overbin1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_OVERBIN1, $overbin1, $comparison);
    }

    /**
     * Filter the query on the overbinqty1 column
     *
     * Example usage:
     * <code>
     * $query->filterByOverbinqty1(1234); // WHERE overbinqty1 = 1234
     * $query->filterByOverbinqty1(array(12, 34)); // WHERE overbinqty1 IN (12, 34)
     * $query->filterByOverbinqty1(array('min' => 12)); // WHERE overbinqty1 > 12
     * </code>
     *
     * @param     mixed $overbinqty1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByOverbinqty1($overbinqty1 = null, $comparison = null)
    {
        if (is_array($overbinqty1)) {
            $useMinMax = false;
            if (isset($overbinqty1['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_OVERBINQTY1, $overbinqty1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($overbinqty1['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_OVERBINQTY1, $overbinqty1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_OVERBINQTY1, $overbinqty1, $comparison);
    }

    /**
     * Filter the query on the overbin2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOverbin2('fooValue');   // WHERE overbin2 = 'fooValue'
     * $query->filterByOverbin2('%fooValue%', Criteria::LIKE); // WHERE overbin2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $overbin2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByOverbin2($overbin2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($overbin2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_OVERBIN2, $overbin2, $comparison);
    }

    /**
     * Filter the query on the overbinqty2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOverbinqty2(1234); // WHERE overbinqty2 = 1234
     * $query->filterByOverbinqty2(array(12, 34)); // WHERE overbinqty2 IN (12, 34)
     * $query->filterByOverbinqty2(array('min' => 12)); // WHERE overbinqty2 > 12
     * </code>
     *
     * @param     mixed $overbinqty2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByOverbinqty2($overbinqty2 = null, $comparison = null)
    {
        if (is_array($overbinqty2)) {
            $useMinMax = false;
            if (isset($overbinqty2['min'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_OVERBINQTY2, $overbinqty2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($overbinqty2['max'])) {
                $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_OVERBINQTY2, $overbinqty2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_OVERBINQTY2, $overbinqty2, $comparison);
    }

    /**
     * Filter the query on the statusmsg column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusmsg('fooValue');   // WHERE statusmsg = 'fooValue'
     * $query->filterByStatusmsg('%fooValue%', Criteria::LIKE); // WHERE statusmsg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusmsg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByStatusmsg($statusmsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusmsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_STATUSMSG, $statusmsg, $comparison);
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
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderDetailTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPickSalesOrderDetail $pickSalesOrderDetail Object to remove from the list of results
     *
     * @return $this|ChildPickSalesOrderDetailQuery The current query, for fluid interface
     */
    public function prune($pickSalesOrderDetail = null)
    {
        if ($pickSalesOrderDetail) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PickSalesOrderDetailTableMap::COL_SESSIONID), $pickSalesOrderDetail->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PickSalesOrderDetailTableMap::COL_RECNO), $pickSalesOrderDetail->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the wmpickdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PickSalesOrderDetailTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PickSalesOrderDetailTableMap::clearInstancePool();
            PickSalesOrderDetailTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PickSalesOrderDetailTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PickSalesOrderDetailTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PickSalesOrderDetailTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PickSalesOrderDetailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PickSalesOrderDetailQuery
