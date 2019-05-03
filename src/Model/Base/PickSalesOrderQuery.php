<?php

namespace Base;

use \PickSalesOrder as ChildPickSalesOrder;
use \PickSalesOrderQuery as ChildPickSalesOrderQuery;
use \Exception;
use \PDO;
use Map\PickSalesOrderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'wmpickhed' table.
 *
 *
 *
 * @method     ChildPickSalesOrderQuery orderByOrdernbr($order = Criteria::ASC) Order by the ordernbr column
 * @method     ChildPickSalesOrderQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildPickSalesOrderQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildPickSalesOrderQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildPickSalesOrderQuery orderByCustomerid($order = Criteria::ASC) Order by the customerid column
 * @method     ChildPickSalesOrderQuery orderByCustomername($order = Criteria::ASC) Order by the customername column
 * @method     ChildPickSalesOrderQuery orderByStatusmsg($order = Criteria::ASC) Order by the statusmsg column
 * @method     ChildPickSalesOrderQuery orderByLastpalletnbr($order = Criteria::ASC) Order by the lastpalletnbr column
 * @method     ChildPickSalesOrderQuery orderByFunction($order = Criteria::ASC) Order by the function column
 * @method     ChildPickSalesOrderQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildPickSalesOrderQuery groupByOrdernbr() Group by the ordernbr column
 * @method     ChildPickSalesOrderQuery groupByRecno() Group by the recno column
 * @method     ChildPickSalesOrderQuery groupByDate() Group by the date column
 * @method     ChildPickSalesOrderQuery groupByTime() Group by the time column
 * @method     ChildPickSalesOrderQuery groupByCustomerid() Group by the customerid column
 * @method     ChildPickSalesOrderQuery groupByCustomername() Group by the customername column
 * @method     ChildPickSalesOrderQuery groupByStatusmsg() Group by the statusmsg column
 * @method     ChildPickSalesOrderQuery groupByLastpalletnbr() Group by the lastpalletnbr column
 * @method     ChildPickSalesOrderQuery groupByFunction() Group by the function column
 * @method     ChildPickSalesOrderQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildPickSalesOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPickSalesOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPickSalesOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPickSalesOrderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPickSalesOrderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPickSalesOrderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPickSalesOrder findOne(ConnectionInterface $con = null) Return the first ChildPickSalesOrder matching the query
 * @method     ChildPickSalesOrder findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPickSalesOrder matching the query, or a new ChildPickSalesOrder object populated from the query conditions when no match is found
 *
 * @method     ChildPickSalesOrder findOneByOrdernbr(string $ordernbr) Return the first ChildPickSalesOrder filtered by the ordernbr column
 * @method     ChildPickSalesOrder findOneByRecno(int $recno) Return the first ChildPickSalesOrder filtered by the recno column
 * @method     ChildPickSalesOrder findOneByDate(int $date) Return the first ChildPickSalesOrder filtered by the date column
 * @method     ChildPickSalesOrder findOneByTime(int $time) Return the first ChildPickSalesOrder filtered by the time column
 * @method     ChildPickSalesOrder findOneByCustomerid(string $customerid) Return the first ChildPickSalesOrder filtered by the customerid column
 * @method     ChildPickSalesOrder findOneByCustomername(string $customername) Return the first ChildPickSalesOrder filtered by the customername column
 * @method     ChildPickSalesOrder findOneByStatusmsg(string $statusmsg) Return the first ChildPickSalesOrder filtered by the statusmsg column
 * @method     ChildPickSalesOrder findOneByLastpalletnbr(int $lastpalletnbr) Return the first ChildPickSalesOrder filtered by the lastpalletnbr column
 * @method     ChildPickSalesOrder findOneByFunction(string $function) Return the first ChildPickSalesOrder filtered by the function column
 * @method     ChildPickSalesOrder findOneByDummy(string $dummy) Return the first ChildPickSalesOrder filtered by the dummy column *

 * @method     ChildPickSalesOrder requirePk($key, ConnectionInterface $con = null) Return the ChildPickSalesOrder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOne(ConnectionInterface $con = null) Return the first ChildPickSalesOrder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPickSalesOrder requireOneByOrdernbr(string $ordernbr) Return the first ChildPickSalesOrder filtered by the ordernbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByRecno(int $recno) Return the first ChildPickSalesOrder filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByDate(int $date) Return the first ChildPickSalesOrder filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByTime(int $time) Return the first ChildPickSalesOrder filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByCustomerid(string $customerid) Return the first ChildPickSalesOrder filtered by the customerid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByCustomername(string $customername) Return the first ChildPickSalesOrder filtered by the customername column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByStatusmsg(string $statusmsg) Return the first ChildPickSalesOrder filtered by the statusmsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByLastpalletnbr(int $lastpalletnbr) Return the first ChildPickSalesOrder filtered by the lastpalletnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByFunction(string $function) Return the first ChildPickSalesOrder filtered by the function column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPickSalesOrder requireOneByDummy(string $dummy) Return the first ChildPickSalesOrder filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPickSalesOrder[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPickSalesOrder objects based on current ModelCriteria
 * @method     ChildPickSalesOrder[]|ObjectCollection findByOrdernbr(string $ordernbr) Return ChildPickSalesOrder objects filtered by the ordernbr column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByRecno(int $recno) Return ChildPickSalesOrder objects filtered by the recno column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByDate(int $date) Return ChildPickSalesOrder objects filtered by the date column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByTime(int $time) Return ChildPickSalesOrder objects filtered by the time column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByCustomerid(string $customerid) Return ChildPickSalesOrder objects filtered by the customerid column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByCustomername(string $customername) Return ChildPickSalesOrder objects filtered by the customername column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByStatusmsg(string $statusmsg) Return ChildPickSalesOrder objects filtered by the statusmsg column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByLastpalletnbr(int $lastpalletnbr) Return ChildPickSalesOrder objects filtered by the lastpalletnbr column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByFunction(string $function) Return ChildPickSalesOrder objects filtered by the function column
 * @method     ChildPickSalesOrder[]|ObjectCollection findByDummy(string $dummy) Return ChildPickSalesOrder objects filtered by the dummy column
 * @method     ChildPickSalesOrder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PickSalesOrderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PickSalesOrderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\PickSalesOrder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPickSalesOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPickSalesOrderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPickSalesOrderQuery) {
            return $criteria;
        }
        $query = new ChildPickSalesOrderQuery();
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
     * @param array[$ordernbr, $recno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPickSalesOrder|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PickSalesOrderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PickSalesOrderTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildPickSalesOrder A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ordernbr, recno, date, time, customerid, customername, statusmsg, lastpalletnbr, function, dummy FROM wmpickhed WHERE ordernbr = :p0 AND recno = :p1';
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
            /** @var ChildPickSalesOrder $obj */
            $obj = new ChildPickSalesOrder();
            $obj->hydrate($row);
            PickSalesOrderTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildPickSalesOrder|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PickSalesOrderTableMap::COL_ORDERNBR, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PickSalesOrderTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PickSalesOrderTableMap::COL_ORDERNBR, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PickSalesOrderTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByOrdernbr($ordernbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordernbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_ORDERNBR, $ordernbr, $comparison);
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
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(PickSalesOrderTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(PickSalesOrderTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(PickSalesOrderTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(PickSalesOrderTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(PickSalesOrderTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(PickSalesOrderTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the customerid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerid('fooValue');   // WHERE customerid = 'fooValue'
     * $query->filterByCustomerid('%fooValue%', Criteria::LIKE); // WHERE customerid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customerid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByCustomerid($customerid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_CUSTOMERID, $customerid, $comparison);
    }

    /**
     * Filter the query on the customername column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomername('fooValue');   // WHERE customername = 'fooValue'
     * $query->filterByCustomername('%fooValue%', Criteria::LIKE); // WHERE customername LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customername The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByCustomername($customername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customername)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_CUSTOMERNAME, $customername, $comparison);
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
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByStatusmsg($statusmsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusmsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_STATUSMSG, $statusmsg, $comparison);
    }

    /**
     * Filter the query on the lastpalletnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByLastpalletnbr(1234); // WHERE lastpalletnbr = 1234
     * $query->filterByLastpalletnbr(array(12, 34)); // WHERE lastpalletnbr IN (12, 34)
     * $query->filterByLastpalletnbr(array('min' => 12)); // WHERE lastpalletnbr > 12
     * </code>
     *
     * @param     mixed $lastpalletnbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByLastpalletnbr($lastpalletnbr = null, $comparison = null)
    {
        if (is_array($lastpalletnbr)) {
            $useMinMax = false;
            if (isset($lastpalletnbr['min'])) {
                $this->addUsingAlias(PickSalesOrderTableMap::COL_LASTPALLETNBR, $lastpalletnbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastpalletnbr['max'])) {
                $this->addUsingAlias(PickSalesOrderTableMap::COL_LASTPALLETNBR, $lastpalletnbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_LASTPALLETNBR, $lastpalletnbr, $comparison);
    }

    /**
     * Filter the query on the function column
     *
     * Example usage:
     * <code>
     * $query->filterByFunction('fooValue');   // WHERE function = 'fooValue'
     * $query->filterByFunction('%fooValue%', Criteria::LIKE); // WHERE function LIKE '%fooValue%'
     * </code>
     *
     * @param     string $function The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByFunction($function = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($function)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_FUNCTION, $function, $comparison);
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
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PickSalesOrderTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPickSalesOrder $pickSalesOrder Object to remove from the list of results
     *
     * @return $this|ChildPickSalesOrderQuery The current query, for fluid interface
     */
    public function prune($pickSalesOrder = null)
    {
        if ($pickSalesOrder) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PickSalesOrderTableMap::COL_ORDERNBR), $pickSalesOrder->getOrdernbr(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PickSalesOrderTableMap::COL_RECNO), $pickSalesOrder->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the wmpickhed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PickSalesOrderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PickSalesOrderTableMap::clearInstancePool();
            PickSalesOrderTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PickSalesOrderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PickSalesOrderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PickSalesOrderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PickSalesOrderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PickSalesOrderQuery
