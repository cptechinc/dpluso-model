<?php

namespace Base;

use \Binrsession as ChildBinrsession;
use \BinrsessionQuery as ChildBinrsessionQuery;
use \Exception;
use \PDO;
use Map\BinrsessionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'binrsession' table.
 *
 *
 *
 * @method     ChildBinrsessionQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildBinrsessionQuery orderByLoginid($order = Criteria::ASC) Order by the loginid column
 * @method     ChildBinrsessionQuery orderByWhseid($order = Criteria::ASC) Order by the whseid column
 * @method     ChildBinrsessionQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildBinrsessionQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildBinrsessionQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildBinrsessionQuery orderByFrombin($order = Criteria::ASC) Order by the frombin column
 * @method     ChildBinrsessionQuery orderByFrombinqty($order = Criteria::ASC) Order by the frombinqty column
 * @method     ChildBinrsessionQuery orderByTobin($order = Criteria::ASC) Order by the tobin column
 * @method     ChildBinrsessionQuery orderByTobinqty($order = Criteria::ASC) Order by the tobinqty column
 * @method     ChildBinrsessionQuery orderByFunction($order = Criteria::ASC) Order by the function column
 * @method     ChildBinrsessionQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildBinrsessionQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildBinrsessionQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildBinrsessionQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildBinrsessionQuery groupBySessionid() Group by the sessionid column
 * @method     ChildBinrsessionQuery groupByLoginid() Group by the loginid column
 * @method     ChildBinrsessionQuery groupByWhseid() Group by the whseid column
 * @method     ChildBinrsessionQuery groupByItemid() Group by the itemid column
 * @method     ChildBinrsessionQuery groupByItemtype() Group by the itemtype column
 * @method     ChildBinrsessionQuery groupByLotserial() Group by the lotserial column
 * @method     ChildBinrsessionQuery groupByFrombin() Group by the frombin column
 * @method     ChildBinrsessionQuery groupByFrombinqty() Group by the frombinqty column
 * @method     ChildBinrsessionQuery groupByTobin() Group by the tobin column
 * @method     ChildBinrsessionQuery groupByTobinqty() Group by the tobinqty column
 * @method     ChildBinrsessionQuery groupByFunction() Group by the function column
 * @method     ChildBinrsessionQuery groupByStatus() Group by the status column
 * @method     ChildBinrsessionQuery groupByDate() Group by the date column
 * @method     ChildBinrsessionQuery groupByTime() Group by the time column
 * @method     ChildBinrsessionQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildBinrsessionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBinrsessionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBinrsessionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBinrsessionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBinrsessionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBinrsessionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBinrsession findOne(ConnectionInterface $con = null) Return the first ChildBinrsession matching the query
 * @method     ChildBinrsession findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBinrsession matching the query, or a new ChildBinrsession object populated from the query conditions when no match is found
 *
 * @method     ChildBinrsession findOneBySessionid(string $sessionid) Return the first ChildBinrsession filtered by the sessionid column
 * @method     ChildBinrsession findOneByLoginid(string $loginid) Return the first ChildBinrsession filtered by the loginid column
 * @method     ChildBinrsession findOneByWhseid(string $whseid) Return the first ChildBinrsession filtered by the whseid column
 * @method     ChildBinrsession findOneByItemid(string $itemid) Return the first ChildBinrsession filtered by the itemid column
 * @method     ChildBinrsession findOneByItemtype(string $itemtype) Return the first ChildBinrsession filtered by the itemtype column
 * @method     ChildBinrsession findOneByLotserial(string $lotserial) Return the first ChildBinrsession filtered by the lotserial column
 * @method     ChildBinrsession findOneByFrombin(string $frombin) Return the first ChildBinrsession filtered by the frombin column
 * @method     ChildBinrsession findOneByFrombinqty(int $frombinqty) Return the first ChildBinrsession filtered by the frombinqty column
 * @method     ChildBinrsession findOneByTobin(string $tobin) Return the first ChildBinrsession filtered by the tobin column
 * @method     ChildBinrsession findOneByTobinqty(int $tobinqty) Return the first ChildBinrsession filtered by the tobinqty column
 * @method     ChildBinrsession findOneByFunction(string $function) Return the first ChildBinrsession filtered by the function column
 * @method     ChildBinrsession findOneByStatus(string $status) Return the first ChildBinrsession filtered by the status column
 * @method     ChildBinrsession findOneByDate(int $date) Return the first ChildBinrsession filtered by the date column
 * @method     ChildBinrsession findOneByTime(int $time) Return the first ChildBinrsession filtered by the time column
 * @method     ChildBinrsession findOneByDummy(string $dummy) Return the first ChildBinrsession filtered by the dummy column *

 * @method     ChildBinrsession requirePk($key, ConnectionInterface $con = null) Return the ChildBinrsession by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOne(ConnectionInterface $con = null) Return the first ChildBinrsession matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBinrsession requireOneBySessionid(string $sessionid) Return the first ChildBinrsession filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByLoginid(string $loginid) Return the first ChildBinrsession filtered by the loginid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByWhseid(string $whseid) Return the first ChildBinrsession filtered by the whseid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByItemid(string $itemid) Return the first ChildBinrsession filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByItemtype(string $itemtype) Return the first ChildBinrsession filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByLotserial(string $lotserial) Return the first ChildBinrsession filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByFrombin(string $frombin) Return the first ChildBinrsession filtered by the frombin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByFrombinqty(int $frombinqty) Return the first ChildBinrsession filtered by the frombinqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByTobin(string $tobin) Return the first ChildBinrsession filtered by the tobin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByTobinqty(int $tobinqty) Return the first ChildBinrsession filtered by the tobinqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByFunction(string $function) Return the first ChildBinrsession filtered by the function column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByStatus(string $status) Return the first ChildBinrsession filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByDate(int $date) Return the first ChildBinrsession filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByTime(int $time) Return the first ChildBinrsession filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBinrsession requireOneByDummy(string $dummy) Return the first ChildBinrsession filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBinrsession[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBinrsession objects based on current ModelCriteria
 * @method     ChildBinrsession[]|ObjectCollection findBySessionid(string $sessionid) Return ChildBinrsession objects filtered by the sessionid column
 * @method     ChildBinrsession[]|ObjectCollection findByLoginid(string $loginid) Return ChildBinrsession objects filtered by the loginid column
 * @method     ChildBinrsession[]|ObjectCollection findByWhseid(string $whseid) Return ChildBinrsession objects filtered by the whseid column
 * @method     ChildBinrsession[]|ObjectCollection findByItemid(string $itemid) Return ChildBinrsession objects filtered by the itemid column
 * @method     ChildBinrsession[]|ObjectCollection findByItemtype(string $itemtype) Return ChildBinrsession objects filtered by the itemtype column
 * @method     ChildBinrsession[]|ObjectCollection findByLotserial(string $lotserial) Return ChildBinrsession objects filtered by the lotserial column
 * @method     ChildBinrsession[]|ObjectCollection findByFrombin(string $frombin) Return ChildBinrsession objects filtered by the frombin column
 * @method     ChildBinrsession[]|ObjectCollection findByFrombinqty(int $frombinqty) Return ChildBinrsession objects filtered by the frombinqty column
 * @method     ChildBinrsession[]|ObjectCollection findByTobin(string $tobin) Return ChildBinrsession objects filtered by the tobin column
 * @method     ChildBinrsession[]|ObjectCollection findByTobinqty(int $tobinqty) Return ChildBinrsession objects filtered by the tobinqty column
 * @method     ChildBinrsession[]|ObjectCollection findByFunction(string $function) Return ChildBinrsession objects filtered by the function column
 * @method     ChildBinrsession[]|ObjectCollection findByStatus(string $status) Return ChildBinrsession objects filtered by the status column
 * @method     ChildBinrsession[]|ObjectCollection findByDate(int $date) Return ChildBinrsession objects filtered by the date column
 * @method     ChildBinrsession[]|ObjectCollection findByTime(int $time) Return ChildBinrsession objects filtered by the time column
 * @method     ChildBinrsession[]|ObjectCollection findByDummy(string $dummy) Return ChildBinrsession objects filtered by the dummy column
 * @method     ChildBinrsession[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BinrsessionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BinrsessionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Binrsession', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBinrsessionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBinrsessionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBinrsessionQuery) {
            return $criteria;
        }
        $query = new ChildBinrsessionQuery();
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
     * @return ChildBinrsession|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BinrsessionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BinrsessionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBinrsession A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, loginid, whseid, itemid, itemtype, lotserial, frombin, frombinqty, tobin, tobinqty, function, status, date, time, dummy FROM binrsession WHERE sessionid = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildBinrsession $obj */
            $obj = new ChildBinrsession();
            $obj->hydrate($row);
            BinrsessionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBinrsession|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BinrsessionTableMap::COL_SESSIONID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BinrsessionTableMap::COL_SESSIONID, $keys, Criteria::IN);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the loginid column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginid('fooValue');   // WHERE loginid = 'fooValue'
     * $query->filterByLoginid('%fooValue%', Criteria::LIKE); // WHERE loginid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $loginid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByLoginid($loginid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($loginid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_LOGINID, $loginid, $comparison);
    }

    /**
     * Filter the query on the whseid column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseid('fooValue');   // WHERE whseid = 'fooValue'
     * $query->filterByWhseid('%fooValue%', Criteria::LIKE); // WHERE whseid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByWhseid($whseid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_WHSEID, $whseid, $comparison);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByItemtype($itemtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_ITEMTYPE, $itemtype, $comparison);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_LOTSERIAL, $lotserial, $comparison);
    }

    /**
     * Filter the query on the frombin column
     *
     * Example usage:
     * <code>
     * $query->filterByFrombin('fooValue');   // WHERE frombin = 'fooValue'
     * $query->filterByFrombin('%fooValue%', Criteria::LIKE); // WHERE frombin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $frombin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByFrombin($frombin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($frombin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_FROMBIN, $frombin, $comparison);
    }

    /**
     * Filter the query on the frombinqty column
     *
     * Example usage:
     * <code>
     * $query->filterByFrombinqty(1234); // WHERE frombinqty = 1234
     * $query->filterByFrombinqty(array(12, 34)); // WHERE frombinqty IN (12, 34)
     * $query->filterByFrombinqty(array('min' => 12)); // WHERE frombinqty > 12
     * </code>
     *
     * @param     mixed $frombinqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByFrombinqty($frombinqty = null, $comparison = null)
    {
        if (is_array($frombinqty)) {
            $useMinMax = false;
            if (isset($frombinqty['min'])) {
                $this->addUsingAlias(BinrsessionTableMap::COL_FROMBINQTY, $frombinqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($frombinqty['max'])) {
                $this->addUsingAlias(BinrsessionTableMap::COL_FROMBINQTY, $frombinqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_FROMBINQTY, $frombinqty, $comparison);
    }

    /**
     * Filter the query on the tobin column
     *
     * Example usage:
     * <code>
     * $query->filterByTobin('fooValue');   // WHERE tobin = 'fooValue'
     * $query->filterByTobin('%fooValue%', Criteria::LIKE); // WHERE tobin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tobin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByTobin($tobin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tobin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_TOBIN, $tobin, $comparison);
    }

    /**
     * Filter the query on the tobinqty column
     *
     * Example usage:
     * <code>
     * $query->filterByTobinqty(1234); // WHERE tobinqty = 1234
     * $query->filterByTobinqty(array(12, 34)); // WHERE tobinqty IN (12, 34)
     * $query->filterByTobinqty(array('min' => 12)); // WHERE tobinqty > 12
     * </code>
     *
     * @param     mixed $tobinqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByTobinqty($tobinqty = null, $comparison = null)
    {
        if (is_array($tobinqty)) {
            $useMinMax = false;
            if (isset($tobinqty['min'])) {
                $this->addUsingAlias(BinrsessionTableMap::COL_TOBINQTY, $tobinqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tobinqty['max'])) {
                $this->addUsingAlias(BinrsessionTableMap::COL_TOBINQTY, $tobinqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_TOBINQTY, $tobinqty, $comparison);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByFunction($function = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($function)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_FUNCTION, $function, $comparison);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BinrsessionTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BinrsessionTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(BinrsessionTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(BinrsessionTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BinrsessionTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBinrsession $binrsession Object to remove from the list of results
     *
     * @return $this|ChildBinrsessionQuery The current query, for fluid interface
     */
    public function prune($binrsession = null)
    {
        if ($binrsession) {
            $this->addUsingAlias(BinrsessionTableMap::COL_SESSIONID, $binrsession->getSessionid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the binrsession table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BinrsessionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BinrsessionTableMap::clearInstancePool();
            BinrsessionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BinrsessionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BinrsessionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BinrsessionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BinrsessionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BinrsessionQuery
