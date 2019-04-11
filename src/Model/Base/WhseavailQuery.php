<?php

namespace Base;

use \Whseavail as ChildWhseavail;
use \WhseavailQuery as ChildWhseavailQuery;
use \Exception;
use \PDO;
use Map\WhseavailTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'whseavail' table.
 *
 *
 *
 * @method     ChildWhseavailQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildWhseavailQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildWhseavailQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildWhseavailQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildWhseavailQuery orderByWhsecd($order = Criteria::ASC) Order by the whsecd column
 * @method     ChildWhseavailQuery orderByWhsename($order = Criteria::ASC) Order by the whsename column
 * @method     ChildWhseavailQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildWhseavailQuery orderByItemavail($order = Criteria::ASC) Order by the itemavail column
 * @method     ChildWhseavailQuery orderByItemonord($order = Criteria::ASC) Order by the itemonord column
 * @method     ChildWhseavailQuery orderByItemetadt($order = Criteria::ASC) Order by the itemetadt column
 * @method     ChildWhseavailQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildWhseavailQuery groupBySessionid() Group by the sessionid column
 * @method     ChildWhseavailQuery groupByRecno() Group by the recno column
 * @method     ChildWhseavailQuery groupByDate() Group by the date column
 * @method     ChildWhseavailQuery groupByTime() Group by the time column
 * @method     ChildWhseavailQuery groupByWhsecd() Group by the whsecd column
 * @method     ChildWhseavailQuery groupByWhsename() Group by the whsename column
 * @method     ChildWhseavailQuery groupByItemid() Group by the itemid column
 * @method     ChildWhseavailQuery groupByItemavail() Group by the itemavail column
 * @method     ChildWhseavailQuery groupByItemonord() Group by the itemonord column
 * @method     ChildWhseavailQuery groupByItemetadt() Group by the itemetadt column
 * @method     ChildWhseavailQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildWhseavailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWhseavailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWhseavailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWhseavailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWhseavailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWhseavailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWhseavail findOne(ConnectionInterface $con = null) Return the first ChildWhseavail matching the query
 * @method     ChildWhseavail findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWhseavail matching the query, or a new ChildWhseavail object populated from the query conditions when no match is found
 *
 * @method     ChildWhseavail findOneBySessionid(string $sessionid) Return the first ChildWhseavail filtered by the sessionid column
 * @method     ChildWhseavail findOneByRecno(int $recno) Return the first ChildWhseavail filtered by the recno column
 * @method     ChildWhseavail findOneByDate(int $date) Return the first ChildWhseavail filtered by the date column
 * @method     ChildWhseavail findOneByTime(int $time) Return the first ChildWhseavail filtered by the time column
 * @method     ChildWhseavail findOneByWhsecd(string $whsecd) Return the first ChildWhseavail filtered by the whsecd column
 * @method     ChildWhseavail findOneByWhsename(string $whsename) Return the first ChildWhseavail filtered by the whsename column
 * @method     ChildWhseavail findOneByItemid(string $itemid) Return the first ChildWhseavail filtered by the itemid column
 * @method     ChildWhseavail findOneByItemavail(int $itemavail) Return the first ChildWhseavail filtered by the itemavail column
 * @method     ChildWhseavail findOneByItemonord(int $itemonord) Return the first ChildWhseavail filtered by the itemonord column
 * @method     ChildWhseavail findOneByItemetadt(string $itemetadt) Return the first ChildWhseavail filtered by the itemetadt column
 * @method     ChildWhseavail findOneByDummy(string $dummy) Return the first ChildWhseavail filtered by the dummy column *

 * @method     ChildWhseavail requirePk($key, ConnectionInterface $con = null) Return the ChildWhseavail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOne(ConnectionInterface $con = null) Return the first ChildWhseavail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseavail requireOneBySessionid(string $sessionid) Return the first ChildWhseavail filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByRecno(int $recno) Return the first ChildWhseavail filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByDate(int $date) Return the first ChildWhseavail filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByTime(int $time) Return the first ChildWhseavail filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByWhsecd(string $whsecd) Return the first ChildWhseavail filtered by the whsecd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByWhsename(string $whsename) Return the first ChildWhseavail filtered by the whsename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByItemid(string $itemid) Return the first ChildWhseavail filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByItemavail(int $itemavail) Return the first ChildWhseavail filtered by the itemavail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByItemonord(int $itemonord) Return the first ChildWhseavail filtered by the itemonord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByItemetadt(string $itemetadt) Return the first ChildWhseavail filtered by the itemetadt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseavail requireOneByDummy(string $dummy) Return the first ChildWhseavail filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseavail[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWhseavail objects based on current ModelCriteria
 * @method     ChildWhseavail[]|ObjectCollection findBySessionid(string $sessionid) Return ChildWhseavail objects filtered by the sessionid column
 * @method     ChildWhseavail[]|ObjectCollection findByRecno(int $recno) Return ChildWhseavail objects filtered by the recno column
 * @method     ChildWhseavail[]|ObjectCollection findByDate(int $date) Return ChildWhseavail objects filtered by the date column
 * @method     ChildWhseavail[]|ObjectCollection findByTime(int $time) Return ChildWhseavail objects filtered by the time column
 * @method     ChildWhseavail[]|ObjectCollection findByWhsecd(string $whsecd) Return ChildWhseavail objects filtered by the whsecd column
 * @method     ChildWhseavail[]|ObjectCollection findByWhsename(string $whsename) Return ChildWhseavail objects filtered by the whsename column
 * @method     ChildWhseavail[]|ObjectCollection findByItemid(string $itemid) Return ChildWhseavail objects filtered by the itemid column
 * @method     ChildWhseavail[]|ObjectCollection findByItemavail(int $itemavail) Return ChildWhseavail objects filtered by the itemavail column
 * @method     ChildWhseavail[]|ObjectCollection findByItemonord(int $itemonord) Return ChildWhseavail objects filtered by the itemonord column
 * @method     ChildWhseavail[]|ObjectCollection findByItemetadt(string $itemetadt) Return ChildWhseavail objects filtered by the itemetadt column
 * @method     ChildWhseavail[]|ObjectCollection findByDummy(string $dummy) Return ChildWhseavail objects filtered by the dummy column
 * @method     ChildWhseavail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WhseavailQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WhseavailQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Whseavail', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWhseavailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWhseavailQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWhseavailQuery) {
            return $criteria;
        }
        $query = new ChildWhseavailQuery();
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
     * @return ChildWhseavail|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WhseavailTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WhseavailTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildWhseavail A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, whsecd, whsename, itemid, itemavail, itemonord, itemetadt, dummy FROM whseavail WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildWhseavail $obj */
            $obj = new ChildWhseavail();
            $obj->hydrate($row);
            WhseavailTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildWhseavail|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(WhseavailTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(WhseavailTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(WhseavailTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(WhseavailTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the whsecd column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsecd('fooValue');   // WHERE whsecd = 'fooValue'
     * $query->filterByWhsecd('%fooValue%', Criteria::LIKE); // WHERE whsecd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsecd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByWhsecd($whsecd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsecd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_WHSECD, $whsecd, $comparison);
    }

    /**
     * Filter the query on the whsename column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsename('fooValue');   // WHERE whsename = 'fooValue'
     * $query->filterByWhsename('%fooValue%', Criteria::LIKE); // WHERE whsename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsename The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByWhsename($whsename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_WHSENAME, $whsename, $comparison);
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
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the itemavail column
     *
     * Example usage:
     * <code>
     * $query->filterByItemavail(1234); // WHERE itemavail = 1234
     * $query->filterByItemavail(array(12, 34)); // WHERE itemavail IN (12, 34)
     * $query->filterByItemavail(array('min' => 12)); // WHERE itemavail > 12
     * </code>
     *
     * @param     mixed $itemavail The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByItemavail($itemavail = null, $comparison = null)
    {
        if (is_array($itemavail)) {
            $useMinMax = false;
            if (isset($itemavail['min'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_ITEMAVAIL, $itemavail['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($itemavail['max'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_ITEMAVAIL, $itemavail['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_ITEMAVAIL, $itemavail, $comparison);
    }

    /**
     * Filter the query on the itemonord column
     *
     * Example usage:
     * <code>
     * $query->filterByItemonord(1234); // WHERE itemonord = 1234
     * $query->filterByItemonord(array(12, 34)); // WHERE itemonord IN (12, 34)
     * $query->filterByItemonord(array('min' => 12)); // WHERE itemonord > 12
     * </code>
     *
     * @param     mixed $itemonord The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByItemonord($itemonord = null, $comparison = null)
    {
        if (is_array($itemonord)) {
            $useMinMax = false;
            if (isset($itemonord['min'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_ITEMONORD, $itemonord['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($itemonord['max'])) {
                $this->addUsingAlias(WhseavailTableMap::COL_ITEMONORD, $itemonord['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_ITEMONORD, $itemonord, $comparison);
    }

    /**
     * Filter the query on the itemetadt column
     *
     * Example usage:
     * <code>
     * $query->filterByItemetadt('fooValue');   // WHERE itemetadt = 'fooValue'
     * $query->filterByItemetadt('%fooValue%', Criteria::LIKE); // WHERE itemetadt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemetadt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByItemetadt($itemetadt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemetadt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_ITEMETADT, $itemetadt, $comparison);
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
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseavailTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWhseavail $whseavail Object to remove from the list of results
     *
     * @return $this|ChildWhseavailQuery The current query, for fluid interface
     */
    public function prune($whseavail = null)
    {
        if ($whseavail) {
            $this->addCond('pruneCond0', $this->getAliasedColName(WhseavailTableMap::COL_SESSIONID), $whseavail->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(WhseavailTableMap::COL_RECNO), $whseavail->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the whseavail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseavailTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WhseavailTableMap::clearInstancePool();
            WhseavailTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseavailTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WhseavailTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WhseavailTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WhseavailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WhseavailQuery
