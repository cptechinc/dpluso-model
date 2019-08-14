<?php

namespace Base;

use \Whseitemphysicalcount as ChildWhseitemphysicalcount;
use \WhseitemphysicalcountQuery as ChildWhseitemphysicalcountQuery;
use \Exception;
use \PDO;
use Map\WhseitemphysicalcountTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'whseitemphysicalcount' table.
 *
 *
 *
 * @method     ChildWhseitemphysicalcountQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildWhseitemphysicalcountQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildWhseitemphysicalcountQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildWhseitemphysicalcountQuery orderByScan($order = Criteria::ASC) Order by the scan column
 * @method     ChildWhseitemphysicalcountQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildWhseitemphysicalcountQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildWhseitemphysicalcountQuery orderByLotserialref($order = Criteria::ASC) Order by the lotserialref column
 * @method     ChildWhseitemphysicalcountQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildWhseitemphysicalcountQuery orderByComplete($order = Criteria::ASC) Order by the complete column
 * @method     ChildWhseitemphysicalcountQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildWhseitemphysicalcountQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildWhseitemphysicalcountQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildWhseitemphysicalcountQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildWhseitemphysicalcountQuery groupBySessionid() Group by the sessionid column
 * @method     ChildWhseitemphysicalcountQuery groupByRecno() Group by the recno column
 * @method     ChildWhseitemphysicalcountQuery groupByItemid() Group by the itemid column
 * @method     ChildWhseitemphysicalcountQuery groupByScan() Group by the scan column
 * @method     ChildWhseitemphysicalcountQuery groupByType() Group by the type column
 * @method     ChildWhseitemphysicalcountQuery groupByLotserial() Group by the lotserial column
 * @method     ChildWhseitemphysicalcountQuery groupByLotserialref() Group by the lotserialref column
 * @method     ChildWhseitemphysicalcountQuery groupByQty() Group by the qty column
 * @method     ChildWhseitemphysicalcountQuery groupByComplete() Group by the complete column
 * @method     ChildWhseitemphysicalcountQuery groupByStatus() Group by the status column
 * @method     ChildWhseitemphysicalcountQuery groupByDate() Group by the date column
 * @method     ChildWhseitemphysicalcountQuery groupByTime() Group by the time column
 * @method     ChildWhseitemphysicalcountQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildWhseitemphysicalcountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWhseitemphysicalcountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWhseitemphysicalcountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWhseitemphysicalcountQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWhseitemphysicalcountQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWhseitemphysicalcountQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWhseitemphysicalcount findOne(ConnectionInterface $con = null) Return the first ChildWhseitemphysicalcount matching the query
 * @method     ChildWhseitemphysicalcount findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWhseitemphysicalcount matching the query, or a new ChildWhseitemphysicalcount object populated from the query conditions when no match is found
 *
 * @method     ChildWhseitemphysicalcount findOneBySessionid(string $sessionid) Return the first ChildWhseitemphysicalcount filtered by the sessionid column
 * @method     ChildWhseitemphysicalcount findOneByRecno(int $recno) Return the first ChildWhseitemphysicalcount filtered by the recno column
 * @method     ChildWhseitemphysicalcount findOneByItemid(string $itemid) Return the first ChildWhseitemphysicalcount filtered by the itemid column
 * @method     ChildWhseitemphysicalcount findOneByScan(string $scan) Return the first ChildWhseitemphysicalcount filtered by the scan column
 * @method     ChildWhseitemphysicalcount findOneByType(string $type) Return the first ChildWhseitemphysicalcount filtered by the type column
 * @method     ChildWhseitemphysicalcount findOneByLotserial(string $lotserial) Return the first ChildWhseitemphysicalcount filtered by the lotserial column
 * @method     ChildWhseitemphysicalcount findOneByLotserialref(string $lotserialref) Return the first ChildWhseitemphysicalcount filtered by the lotserialref column
 * @method     ChildWhseitemphysicalcount findOneByQty(string $qty) Return the first ChildWhseitemphysicalcount filtered by the qty column
 * @method     ChildWhseitemphysicalcount findOneByComplete(string $complete) Return the first ChildWhseitemphysicalcount filtered by the complete column
 * @method     ChildWhseitemphysicalcount findOneByStatus(string $status) Return the first ChildWhseitemphysicalcount filtered by the status column
 * @method     ChildWhseitemphysicalcount findOneByDate(int $date) Return the first ChildWhseitemphysicalcount filtered by the date column
 * @method     ChildWhseitemphysicalcount findOneByTime(int $time) Return the first ChildWhseitemphysicalcount filtered by the time column
 * @method     ChildWhseitemphysicalcount findOneByDummy(string $dummy) Return the first ChildWhseitemphysicalcount filtered by the dummy column *

 * @method     ChildWhseitemphysicalcount requirePk($key, ConnectionInterface $con = null) Return the ChildWhseitemphysicalcount by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOne(ConnectionInterface $con = null) Return the first ChildWhseitemphysicalcount matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseitemphysicalcount requireOneBySessionid(string $sessionid) Return the first ChildWhseitemphysicalcount filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByRecno(int $recno) Return the first ChildWhseitemphysicalcount filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByItemid(string $itemid) Return the first ChildWhseitemphysicalcount filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByScan(string $scan) Return the first ChildWhseitemphysicalcount filtered by the scan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByType(string $type) Return the first ChildWhseitemphysicalcount filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByLotserial(string $lotserial) Return the first ChildWhseitemphysicalcount filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByLotserialref(string $lotserialref) Return the first ChildWhseitemphysicalcount filtered by the lotserialref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByQty(string $qty) Return the first ChildWhseitemphysicalcount filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByComplete(string $complete) Return the first ChildWhseitemphysicalcount filtered by the complete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByStatus(string $status) Return the first ChildWhseitemphysicalcount filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByDate(int $date) Return the first ChildWhseitemphysicalcount filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByTime(int $time) Return the first ChildWhseitemphysicalcount filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByDummy(string $dummy) Return the first ChildWhseitemphysicalcount filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWhseitemphysicalcount objects based on current ModelCriteria
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findBySessionid(string $sessionid) Return ChildWhseitemphysicalcount objects filtered by the sessionid column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByRecno(int $recno) Return ChildWhseitemphysicalcount objects filtered by the recno column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByItemid(string $itemid) Return ChildWhseitemphysicalcount objects filtered by the itemid column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByScan(string $scan) Return ChildWhseitemphysicalcount objects filtered by the scan column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByType(string $type) Return ChildWhseitemphysicalcount objects filtered by the type column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByLotserial(string $lotserial) Return ChildWhseitemphysicalcount objects filtered by the lotserial column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByLotserialref(string $lotserialref) Return ChildWhseitemphysicalcount objects filtered by the lotserialref column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByQty(string $qty) Return ChildWhseitemphysicalcount objects filtered by the qty column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByComplete(string $complete) Return ChildWhseitemphysicalcount objects filtered by the complete column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByStatus(string $status) Return ChildWhseitemphysicalcount objects filtered by the status column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByDate(int $date) Return ChildWhseitemphysicalcount objects filtered by the date column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByTime(int $time) Return ChildWhseitemphysicalcount objects filtered by the time column
 * @method     ChildWhseitemphysicalcount[]|ObjectCollection findByDummy(string $dummy) Return ChildWhseitemphysicalcount objects filtered by the dummy column
 * @method     ChildWhseitemphysicalcount[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WhseitemphysicalcountQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WhseitemphysicalcountQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Whseitemphysicalcount', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWhseitemphysicalcountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWhseitemphysicalcountQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWhseitemphysicalcountQuery) {
            return $criteria;
        }
        $query = new ChildWhseitemphysicalcountQuery();
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
     * @return ChildWhseitemphysicalcount|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WhseitemphysicalcountTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WhseitemphysicalcountTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildWhseitemphysicalcount A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, itemid, scan, type, lotserial, lotserialref, qty, complete, status, date, time, dummy FROM whseitemphysicalcount WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildWhseitemphysicalcount $obj */
            $obj = new ChildWhseitemphysicalcount();
            $obj->hydrate($row);
            WhseitemphysicalcountTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildWhseitemphysicalcount|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(WhseitemphysicalcountTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(WhseitemphysicalcountTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the scan column
     *
     * Example usage:
     * <code>
     * $query->filterByScan('fooValue');   // WHERE scan = 'fooValue'
     * $query->filterByScan('%fooValue%', Criteria::LIKE); // WHERE scan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $scan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByScan($scan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_SCAN, $scan, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the lotserial column
     *
     * Example usage:
     * <code>
     * $query->filterByLotserial('fooValue');   // WHERE lotserial = 'fooValue'
     * $query->filterByLotserial('%fooValue%', Criteria::LIKE); // WHERE lotserial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lotserial The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_LOTSERIAL, $lotserial, $comparison);
    }

    /**
     * Filter the query on the lotserialref column
     *
     * Example usage:
     * <code>
     * $query->filterByLotserialref('fooValue');   // WHERE lotserialref = 'fooValue'
     * $query->filterByLotserialref('%fooValue%', Criteria::LIKE); // WHERE lotserialref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lotserialref The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByLotserialref($lotserialref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserialref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_LOTSERIALREF, $lotserialref, $comparison);
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty('fooValue');   // WHERE qty = 'fooValue'
     * $query->filterByQty('%fooValue%', Criteria::LIKE); // WHERE qty LIKE '%fooValue%'
     * </code>
     *
     * @param     string $qty The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qty)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the complete column
     *
     * Example usage:
     * <code>
     * $query->filterByComplete('fooValue');   // WHERE complete = 'fooValue'
     * $query->filterByComplete('%fooValue%', Criteria::LIKE); // WHERE complete LIKE '%fooValue%'
     * </code>
     *
     * @param     string $complete The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByComplete($complete = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($complete)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_COMPLETE, $complete, $comparison);
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
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWhseitemphysicalcount $whseitemphysicalcount Object to remove from the list of results
     *
     * @return $this|ChildWhseitemphysicalcountQuery The current query, for fluid interface
     */
    public function prune($whseitemphysicalcount = null)
    {
        if ($whseitemphysicalcount) {
            $this->addCond('pruneCond0', $this->getAliasedColName(WhseitemphysicalcountTableMap::COL_SESSIONID), $whseitemphysicalcount->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(WhseitemphysicalcountTableMap::COL_RECNO), $whseitemphysicalcount->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the whseitemphysicalcount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitemphysicalcountTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WhseitemphysicalcountTableMap::clearInstancePool();
            WhseitemphysicalcountTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitemphysicalcountTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WhseitemphysicalcountTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WhseitemphysicalcountTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WhseitemphysicalcountTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WhseitemphysicalcountQuery
