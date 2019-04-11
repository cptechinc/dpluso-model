<?php

namespace Base;

use \Ordrtrk as ChildOrdrtrk;
use \OrdrtrkQuery as ChildOrdrtrkQuery;
use \Exception;
use \PDO;
use Map\OrdrtrkTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ordrtrk' table.
 *
 *
 *
 * @method     ChildOrdrtrkQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildOrdrtrkQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildOrdrtrkQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOrdrtrkQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildOrdrtrkQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildOrdrtrkQuery orderByShipdate($order = Criteria::ASC) Order by the shipdate column
 * @method     ChildOrdrtrkQuery orderByTracknbr($order = Criteria::ASC) Order by the tracknbr column
 * @method     ChildOrdrtrkQuery orderByServtype($order = Criteria::ASC) Order by the servtype column
 * @method     ChildOrdrtrkQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildOrdrtrkQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildOrdrtrkQuery groupBySessionid() Group by the sessionid column
 * @method     ChildOrdrtrkQuery groupByRecno() Group by the recno column
 * @method     ChildOrdrtrkQuery groupByDate() Group by the date column
 * @method     ChildOrdrtrkQuery groupByTime() Group by the time column
 * @method     ChildOrdrtrkQuery groupByOrderno() Group by the orderno column
 * @method     ChildOrdrtrkQuery groupByShipdate() Group by the shipdate column
 * @method     ChildOrdrtrkQuery groupByTracknbr() Group by the tracknbr column
 * @method     ChildOrdrtrkQuery groupByServtype() Group by the servtype column
 * @method     ChildOrdrtrkQuery groupByWeight() Group by the weight column
 * @method     ChildOrdrtrkQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildOrdrtrkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrdrtrkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrdrtrkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrdrtrkQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrdrtrkQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrdrtrkQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrdrtrk findOne(ConnectionInterface $con = null) Return the first ChildOrdrtrk matching the query
 * @method     ChildOrdrtrk findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrdrtrk matching the query, or a new ChildOrdrtrk object populated from the query conditions when no match is found
 *
 * @method     ChildOrdrtrk findOneBySessionid(string $sessionid) Return the first ChildOrdrtrk filtered by the sessionid column
 * @method     ChildOrdrtrk findOneByRecno(int $recno) Return the first ChildOrdrtrk filtered by the recno column
 * @method     ChildOrdrtrk findOneByDate(int $date) Return the first ChildOrdrtrk filtered by the date column
 * @method     ChildOrdrtrk findOneByTime(int $time) Return the first ChildOrdrtrk filtered by the time column
 * @method     ChildOrdrtrk findOneByOrderno(string $orderno) Return the first ChildOrdrtrk filtered by the orderno column
 * @method     ChildOrdrtrk findOneByShipdate(string $shipdate) Return the first ChildOrdrtrk filtered by the shipdate column
 * @method     ChildOrdrtrk findOneByTracknbr(string $tracknbr) Return the first ChildOrdrtrk filtered by the tracknbr column
 * @method     ChildOrdrtrk findOneByServtype(string $servtype) Return the first ChildOrdrtrk filtered by the servtype column
 * @method     ChildOrdrtrk findOneByWeight(string $weight) Return the first ChildOrdrtrk filtered by the weight column
 * @method     ChildOrdrtrk findOneByDummy(string $dummy) Return the first ChildOrdrtrk filtered by the dummy column *

 * @method     ChildOrdrtrk requirePk($key, ConnectionInterface $con = null) Return the ChildOrdrtrk by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOne(ConnectionInterface $con = null) Return the first ChildOrdrtrk matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrdrtrk requireOneBySessionid(string $sessionid) Return the first ChildOrdrtrk filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByRecno(int $recno) Return the first ChildOrdrtrk filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByDate(int $date) Return the first ChildOrdrtrk filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByTime(int $time) Return the first ChildOrdrtrk filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByOrderno(string $orderno) Return the first ChildOrdrtrk filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByShipdate(string $shipdate) Return the first ChildOrdrtrk filtered by the shipdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByTracknbr(string $tracknbr) Return the first ChildOrdrtrk filtered by the tracknbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByServtype(string $servtype) Return the first ChildOrdrtrk filtered by the servtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByWeight(string $weight) Return the first ChildOrdrtrk filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtrk requireOneByDummy(string $dummy) Return the first ChildOrdrtrk filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrdrtrk[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrdrtrk objects based on current ModelCriteria
 * @method     ChildOrdrtrk[]|ObjectCollection findBySessionid(string $sessionid) Return ChildOrdrtrk objects filtered by the sessionid column
 * @method     ChildOrdrtrk[]|ObjectCollection findByRecno(int $recno) Return ChildOrdrtrk objects filtered by the recno column
 * @method     ChildOrdrtrk[]|ObjectCollection findByDate(int $date) Return ChildOrdrtrk objects filtered by the date column
 * @method     ChildOrdrtrk[]|ObjectCollection findByTime(int $time) Return ChildOrdrtrk objects filtered by the time column
 * @method     ChildOrdrtrk[]|ObjectCollection findByOrderno(string $orderno) Return ChildOrdrtrk objects filtered by the orderno column
 * @method     ChildOrdrtrk[]|ObjectCollection findByShipdate(string $shipdate) Return ChildOrdrtrk objects filtered by the shipdate column
 * @method     ChildOrdrtrk[]|ObjectCollection findByTracknbr(string $tracknbr) Return ChildOrdrtrk objects filtered by the tracknbr column
 * @method     ChildOrdrtrk[]|ObjectCollection findByServtype(string $servtype) Return ChildOrdrtrk objects filtered by the servtype column
 * @method     ChildOrdrtrk[]|ObjectCollection findByWeight(string $weight) Return ChildOrdrtrk objects filtered by the weight column
 * @method     ChildOrdrtrk[]|ObjectCollection findByDummy(string $dummy) Return ChildOrdrtrk objects filtered by the dummy column
 * @method     ChildOrdrtrk[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrdrtrkQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrdrtrkQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Ordrtrk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdrtrkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdrtrkQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrdrtrkQuery) {
            return $criteria;
        }
        $query = new ChildOrdrtrkQuery();
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
     * @return ChildOrdrtrk|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrdrtrkTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrdrtrkTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOrdrtrk A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, orderno, shipdate, tracknbr, servtype, weight, dummy FROM ordrtrk WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildOrdrtrk $obj */
            $obj = new ChildOrdrtrk();
            $obj->hydrate($row);
            OrdrtrkTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOrdrtrk|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OrdrtrkTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OrdrtrkTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OrdrtrkTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OrdrtrkTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(OrdrtrkTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(OrdrtrkTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OrdrtrkTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OrdrtrkTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(OrdrtrkTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(OrdrtrkTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_ORDERNO, $orderno, $comparison);
    }

    /**
     * Filter the query on the shipdate column
     *
     * Example usage:
     * <code>
     * $query->filterByShipdate('fooValue');   // WHERE shipdate = 'fooValue'
     * $query->filterByShipdate('%fooValue%', Criteria::LIKE); // WHERE shipdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByShipdate($shipdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_SHIPDATE, $shipdate, $comparison);
    }

    /**
     * Filter the query on the tracknbr column
     *
     * Example usage:
     * <code>
     * $query->filterByTracknbr('fooValue');   // WHERE tracknbr = 'fooValue'
     * $query->filterByTracknbr('%fooValue%', Criteria::LIKE); // WHERE tracknbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tracknbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByTracknbr($tracknbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tracknbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_TRACKNBR, $tracknbr, $comparison);
    }

    /**
     * Filter the query on the servtype column
     *
     * Example usage:
     * <code>
     * $query->filterByServtype('fooValue');   // WHERE servtype = 'fooValue'
     * $query->filterByServtype('%fooValue%', Criteria::LIKE); // WHERE servtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $servtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByServtype($servtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($servtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_SERVTYPE, $servtype, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight('fooValue');   // WHERE weight = 'fooValue'
     * $query->filterByWeight('%fooValue%', Criteria::LIKE); // WHERE weight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weight The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weight)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_WEIGHT, $weight, $comparison);
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
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtrkTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrdrtrk $ordrtrk Object to remove from the list of results
     *
     * @return $this|ChildOrdrtrkQuery The current query, for fluid interface
     */
    public function prune($ordrtrk = null)
    {
        if ($ordrtrk) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OrdrtrkTableMap::COL_SESSIONID), $ordrtrk->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OrdrtrkTableMap::COL_RECNO), $ordrtrk->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ordrtrk table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrtrkTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrdrtrkTableMap::clearInstancePool();
            OrdrtrkTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrtrkTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrdrtrkTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrdrtrkTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrdrtrkTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrdrtrkQuery
