<?php

namespace Base;

use \Shipto as ChildShipto;
use \ShiptoQuery as ChildShiptoQuery;
use \Exception;
use \PDO;
use Map\ShiptoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'shipto' table.
 *
 *
 *
 * @method     ChildShiptoQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildShiptoQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildShiptoQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildShiptoQuery orderBySconame($order = Criteria::ASC) Order by the sconame column
 * @method     ChildShiptoQuery orderBySname($order = Criteria::ASC) Order by the sname column
 * @method     ChildShiptoQuery orderBySaddress($order = Criteria::ASC) Order by the saddress column
 * @method     ChildShiptoQuery orderBySaddress2($order = Criteria::ASC) Order by the saddress2 column
 * @method     ChildShiptoQuery orderByScity($order = Criteria::ASC) Order by the scity column
 * @method     ChildShiptoQuery orderBySst($order = Criteria::ASC) Order by the sst column
 * @method     ChildShiptoQuery orderBySzip($order = Criteria::ASC) Order by the szip column
 * @method     ChildShiptoQuery orderByScountry($order = Criteria::ASC) Order by the scountry column
 * @method     ChildShiptoQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildShiptoQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildShiptoQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildShiptoQuery orderBySaddress3($order = Criteria::ASC) Order by the saddress3 column
 * @method     ChildShiptoQuery orderBySphone($order = Criteria::ASC) Order by the sphone column
 * @method     ChildShiptoQuery orderBySsalesrep($order = Criteria::ASC) Order by the ssalesrep column
 * @method     ChildShiptoQuery orderBySsalesrepname($order = Criteria::ASC) Order by the ssalesrepname column
 * @method     ChildShiptoQuery orderByDateentered($order = Criteria::ASC) Order by the dateentered column
 * @method     ChildShiptoQuery orderByLastsaledate($order = Criteria::ASC) Order by the lastsaledate column
 * @method     ChildShiptoQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildShiptoQuery groupBySessionid() Group by the sessionid column
 * @method     ChildShiptoQuery groupByDate() Group by the date column
 * @method     ChildShiptoQuery groupByTime() Group by the time column
 * @method     ChildShiptoQuery groupBySconame() Group by the sconame column
 * @method     ChildShiptoQuery groupBySname() Group by the sname column
 * @method     ChildShiptoQuery groupBySaddress() Group by the saddress column
 * @method     ChildShiptoQuery groupBySaddress2() Group by the saddress2 column
 * @method     ChildShiptoQuery groupByScity() Group by the scity column
 * @method     ChildShiptoQuery groupBySst() Group by the sst column
 * @method     ChildShiptoQuery groupBySzip() Group by the szip column
 * @method     ChildShiptoQuery groupByScountry() Group by the scountry column
 * @method     ChildShiptoQuery groupByRecno() Group by the recno column
 * @method     ChildShiptoQuery groupByCustid() Group by the custid column
 * @method     ChildShiptoQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildShiptoQuery groupBySaddress3() Group by the saddress3 column
 * @method     ChildShiptoQuery groupBySphone() Group by the sphone column
 * @method     ChildShiptoQuery groupBySsalesrep() Group by the ssalesrep column
 * @method     ChildShiptoQuery groupBySsalesrepname() Group by the ssalesrepname column
 * @method     ChildShiptoQuery groupByDateentered() Group by the dateentered column
 * @method     ChildShiptoQuery groupByLastsaledate() Group by the lastsaledate column
 * @method     ChildShiptoQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildShiptoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildShiptoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildShiptoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildShiptoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildShiptoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildShiptoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildShipto findOne(ConnectionInterface $con = null) Return the first ChildShipto matching the query
 * @method     ChildShipto findOneOrCreate(ConnectionInterface $con = null) Return the first ChildShipto matching the query, or a new ChildShipto object populated from the query conditions when no match is found
 *
 * @method     ChildShipto findOneBySessionid(string $sessionid) Return the first ChildShipto filtered by the sessionid column
 * @method     ChildShipto findOneByDate(int $date) Return the first ChildShipto filtered by the date column
 * @method     ChildShipto findOneByTime(int $time) Return the first ChildShipto filtered by the time column
 * @method     ChildShipto findOneBySconame(string $sconame) Return the first ChildShipto filtered by the sconame column
 * @method     ChildShipto findOneBySname(string $sname) Return the first ChildShipto filtered by the sname column
 * @method     ChildShipto findOneBySaddress(string $saddress) Return the first ChildShipto filtered by the saddress column
 * @method     ChildShipto findOneBySaddress2(string $saddress2) Return the first ChildShipto filtered by the saddress2 column
 * @method     ChildShipto findOneByScity(string $scity) Return the first ChildShipto filtered by the scity column
 * @method     ChildShipto findOneBySst(string $sst) Return the first ChildShipto filtered by the sst column
 * @method     ChildShipto findOneBySzip(string $szip) Return the first ChildShipto filtered by the szip column
 * @method     ChildShipto findOneByScountry(string $scountry) Return the first ChildShipto filtered by the scountry column
 * @method     ChildShipto findOneByRecno(int $recno) Return the first ChildShipto filtered by the recno column
 * @method     ChildShipto findOneByCustid(string $custid) Return the first ChildShipto filtered by the custid column
 * @method     ChildShipto findOneByShiptoid(string $shiptoid) Return the first ChildShipto filtered by the shiptoid column
 * @method     ChildShipto findOneBySaddress3(string $saddress3) Return the first ChildShipto filtered by the saddress3 column
 * @method     ChildShipto findOneBySphone(string $sphone) Return the first ChildShipto filtered by the sphone column
 * @method     ChildShipto findOneBySsalesrep(string $ssalesrep) Return the first ChildShipto filtered by the ssalesrep column
 * @method     ChildShipto findOneBySsalesrepname(string $ssalesrepname) Return the first ChildShipto filtered by the ssalesrepname column
 * @method     ChildShipto findOneByDateentered(string $dateentered) Return the first ChildShipto filtered by the dateentered column
 * @method     ChildShipto findOneByLastsaledate(string $lastsaledate) Return the first ChildShipto filtered by the lastsaledate column
 * @method     ChildShipto findOneByDummy(string $dummy) Return the first ChildShipto filtered by the dummy column *

 * @method     ChildShipto requirePk($key, ConnectionInterface $con = null) Return the ChildShipto by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOne(ConnectionInterface $con = null) Return the first ChildShipto matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipto requireOneBySessionid(string $sessionid) Return the first ChildShipto filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByDate(int $date) Return the first ChildShipto filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByTime(int $time) Return the first ChildShipto filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySconame(string $sconame) Return the first ChildShipto filtered by the sconame column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySname(string $sname) Return the first ChildShipto filtered by the sname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySaddress(string $saddress) Return the first ChildShipto filtered by the saddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySaddress2(string $saddress2) Return the first ChildShipto filtered by the saddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByScity(string $scity) Return the first ChildShipto filtered by the scity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySst(string $sst) Return the first ChildShipto filtered by the sst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySzip(string $szip) Return the first ChildShipto filtered by the szip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByScountry(string $scountry) Return the first ChildShipto filtered by the scountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByRecno(int $recno) Return the first ChildShipto filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByCustid(string $custid) Return the first ChildShipto filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByShiptoid(string $shiptoid) Return the first ChildShipto filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySaddress3(string $saddress3) Return the first ChildShipto filtered by the saddress3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySphone(string $sphone) Return the first ChildShipto filtered by the sphone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySsalesrep(string $ssalesrep) Return the first ChildShipto filtered by the ssalesrep column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneBySsalesrepname(string $ssalesrepname) Return the first ChildShipto filtered by the ssalesrepname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByDateentered(string $dateentered) Return the first ChildShipto filtered by the dateentered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByLastsaledate(string $lastsaledate) Return the first ChildShipto filtered by the lastsaledate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipto requireOneByDummy(string $dummy) Return the first ChildShipto filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipto[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildShipto objects based on current ModelCriteria
 * @method     ChildShipto[]|ObjectCollection findBySessionid(string $sessionid) Return ChildShipto objects filtered by the sessionid column
 * @method     ChildShipto[]|ObjectCollection findByDate(int $date) Return ChildShipto objects filtered by the date column
 * @method     ChildShipto[]|ObjectCollection findByTime(int $time) Return ChildShipto objects filtered by the time column
 * @method     ChildShipto[]|ObjectCollection findBySconame(string $sconame) Return ChildShipto objects filtered by the sconame column
 * @method     ChildShipto[]|ObjectCollection findBySname(string $sname) Return ChildShipto objects filtered by the sname column
 * @method     ChildShipto[]|ObjectCollection findBySaddress(string $saddress) Return ChildShipto objects filtered by the saddress column
 * @method     ChildShipto[]|ObjectCollection findBySaddress2(string $saddress2) Return ChildShipto objects filtered by the saddress2 column
 * @method     ChildShipto[]|ObjectCollection findByScity(string $scity) Return ChildShipto objects filtered by the scity column
 * @method     ChildShipto[]|ObjectCollection findBySst(string $sst) Return ChildShipto objects filtered by the sst column
 * @method     ChildShipto[]|ObjectCollection findBySzip(string $szip) Return ChildShipto objects filtered by the szip column
 * @method     ChildShipto[]|ObjectCollection findByScountry(string $scountry) Return ChildShipto objects filtered by the scountry column
 * @method     ChildShipto[]|ObjectCollection findByRecno(int $recno) Return ChildShipto objects filtered by the recno column
 * @method     ChildShipto[]|ObjectCollection findByCustid(string $custid) Return ChildShipto objects filtered by the custid column
 * @method     ChildShipto[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildShipto objects filtered by the shiptoid column
 * @method     ChildShipto[]|ObjectCollection findBySaddress3(string $saddress3) Return ChildShipto objects filtered by the saddress3 column
 * @method     ChildShipto[]|ObjectCollection findBySphone(string $sphone) Return ChildShipto objects filtered by the sphone column
 * @method     ChildShipto[]|ObjectCollection findBySsalesrep(string $ssalesrep) Return ChildShipto objects filtered by the ssalesrep column
 * @method     ChildShipto[]|ObjectCollection findBySsalesrepname(string $ssalesrepname) Return ChildShipto objects filtered by the ssalesrepname column
 * @method     ChildShipto[]|ObjectCollection findByDateentered(string $dateentered) Return ChildShipto objects filtered by the dateentered column
 * @method     ChildShipto[]|ObjectCollection findByLastsaledate(string $lastsaledate) Return ChildShipto objects filtered by the lastsaledate column
 * @method     ChildShipto[]|ObjectCollection findByDummy(string $dummy) Return ChildShipto objects filtered by the dummy column
 * @method     ChildShipto[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ShiptoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ShiptoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Shipto', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildShiptoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildShiptoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildShiptoQuery) {
            return $criteria;
        }
        $query = new ChildShiptoQuery();
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
     * @return ChildShipto|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ShiptoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ShiptoTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildShipto A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, date, time, sconame, sname, saddress, saddress2, scity, sst, szip, scountry, recno, custid, shiptoid, saddress3, sphone, ssalesrep, ssalesrepname, dateentered, lastsaledate, dummy FROM shipto WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildShipto $obj */
            $obj = new ChildShipto();
            $obj->hydrate($row);
            ShiptoTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildShipto|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ShiptoTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ShiptoTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ShiptoTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ShiptoTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ShiptoTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ShiptoTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(ShiptoTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(ShiptoTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the sconame column
     *
     * Example usage:
     * <code>
     * $query->filterBySconame('fooValue');   // WHERE sconame = 'fooValue'
     * $query->filterBySconame('%fooValue%', Criteria::LIKE); // WHERE sconame LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sconame The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySconame($sconame = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sconame)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SCONAME, $sconame, $comparison);
    }

    /**
     * Filter the query on the sname column
     *
     * Example usage:
     * <code>
     * $query->filterBySname('fooValue');   // WHERE sname = 'fooValue'
     * $query->filterBySname('%fooValue%', Criteria::LIKE); // WHERE sname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySname($sname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SNAME, $sname, $comparison);
    }

    /**
     * Filter the query on the saddress column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress('fooValue');   // WHERE saddress = 'fooValue'
     * $query->filterBySaddress('%fooValue%', Criteria::LIKE); // WHERE saddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySaddress($saddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SADDRESS, $saddress, $comparison);
    }

    /**
     * Filter the query on the saddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress2('fooValue');   // WHERE saddress2 = 'fooValue'
     * $query->filterBySaddress2('%fooValue%', Criteria::LIKE); // WHERE saddress2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySaddress2($saddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SADDRESS2, $saddress2, $comparison);
    }

    /**
     * Filter the query on the scity column
     *
     * Example usage:
     * <code>
     * $query->filterByScity('fooValue');   // WHERE scity = 'fooValue'
     * $query->filterByScity('%fooValue%', Criteria::LIKE); // WHERE scity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $scity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByScity($scity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SCITY, $scity, $comparison);
    }

    /**
     * Filter the query on the sst column
     *
     * Example usage:
     * <code>
     * $query->filterBySst('fooValue');   // WHERE sst = 'fooValue'
     * $query->filterBySst('%fooValue%', Criteria::LIKE); // WHERE sst LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sst The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySst($sst = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sst)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SST, $sst, $comparison);
    }

    /**
     * Filter the query on the szip column
     *
     * Example usage:
     * <code>
     * $query->filterBySzip('fooValue');   // WHERE szip = 'fooValue'
     * $query->filterBySzip('%fooValue%', Criteria::LIKE); // WHERE szip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $szip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySzip($szip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($szip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SZIP, $szip, $comparison);
    }

    /**
     * Filter the query on the scountry column
     *
     * Example usage:
     * <code>
     * $query->filterByScountry('fooValue');   // WHERE scountry = 'fooValue'
     * $query->filterByScountry('%fooValue%', Criteria::LIKE); // WHERE scountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $scountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByScountry($scountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SCOUNTRY, $scountry, $comparison);
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(ShiptoTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(ShiptoTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the saddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress3('fooValue');   // WHERE saddress3 = 'fooValue'
     * $query->filterBySaddress3('%fooValue%', Criteria::LIKE); // WHERE saddress3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saddress3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySaddress3($saddress3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SADDRESS3, $saddress3, $comparison);
    }

    /**
     * Filter the query on the sphone column
     *
     * Example usage:
     * <code>
     * $query->filterBySphone('fooValue');   // WHERE sphone = 'fooValue'
     * $query->filterBySphone('%fooValue%', Criteria::LIKE); // WHERE sphone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sphone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySphone($sphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sphone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SPHONE, $sphone, $comparison);
    }

    /**
     * Filter the query on the ssalesrep column
     *
     * Example usage:
     * <code>
     * $query->filterBySsalesrep('fooValue');   // WHERE ssalesrep = 'fooValue'
     * $query->filterBySsalesrep('%fooValue%', Criteria::LIKE); // WHERE ssalesrep LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ssalesrep The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySsalesrep($ssalesrep = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ssalesrep)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SSALESREP, $ssalesrep, $comparison);
    }

    /**
     * Filter the query on the ssalesrepname column
     *
     * Example usage:
     * <code>
     * $query->filterBySsalesrepname('fooValue');   // WHERE ssalesrepname = 'fooValue'
     * $query->filterBySsalesrepname('%fooValue%', Criteria::LIKE); // WHERE ssalesrepname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ssalesrepname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterBySsalesrepname($ssalesrepname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ssalesrepname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_SSALESREPNAME, $ssalesrepname, $comparison);
    }

    /**
     * Filter the query on the dateentered column
     *
     * Example usage:
     * <code>
     * $query->filterByDateentered('fooValue');   // WHERE dateentered = 'fooValue'
     * $query->filterByDateentered('%fooValue%', Criteria::LIKE); // WHERE dateentered LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateentered The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByDateentered($dateentered = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateentered)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_DATEENTERED, $dateentered, $comparison);
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByLastsaledate($lastsaledate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastsaledate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_LASTSALEDATE, $lastsaledate, $comparison);
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
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShiptoTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildShipto $shipto Object to remove from the list of results
     *
     * @return $this|ChildShiptoQuery The current query, for fluid interface
     */
    public function prune($shipto = null)
    {
        if ($shipto) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ShiptoTableMap::COL_SESSIONID), $shipto->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ShiptoTableMap::COL_RECNO), $shipto->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the shipto table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShiptoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ShiptoTableMap::clearInstancePool();
            ShiptoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ShiptoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ShiptoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ShiptoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ShiptoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ShiptoQuery
