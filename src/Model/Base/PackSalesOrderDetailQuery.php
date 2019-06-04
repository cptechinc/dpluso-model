<?php

namespace Base;

use \PackSalesOrderDetail as ChildPackSalesOrderDetail;
use \PackSalesOrderDetailQuery as ChildPackSalesOrderDetailQuery;
use \Exception;
use \PDO;
use Map\PackSalesOrderDetailTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'wmpackdet' table.
 *
 *
 *
 * @method     ChildPackSalesOrderDetailQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildPackSalesOrderDetailQuery orderByOrdernbr($order = Criteria::ASC) Order by the ordernbr column
 * @method     ChildPackSalesOrderDetailQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildPackSalesOrderDetailQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildPackSalesOrderDetailQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildPackSalesOrderDetailQuery orderByQtyToship($order = Criteria::ASC) Order by the qty_toship column
 * @method     ChildPackSalesOrderDetailQuery orderByQtyPacked($order = Criteria::ASC) Order by the qty_packed column
 * @method     ChildPackSalesOrderDetailQuery orderByQtyRemaining($order = Criteria::ASC) Order by the qty_remaining column
 * @method     ChildPackSalesOrderDetailQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildPackSalesOrderDetailQuery orderByTime($order = Criteria::ASC) Order by the time column
 *
 * @method     ChildPackSalesOrderDetailQuery groupBySessionid() Group by the sessionid column
 * @method     ChildPackSalesOrderDetailQuery groupByOrdernbr() Group by the ordernbr column
 * @method     ChildPackSalesOrderDetailQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildPackSalesOrderDetailQuery groupByItemid() Group by the itemid column
 * @method     ChildPackSalesOrderDetailQuery groupByLotserial() Group by the lotserial column
 * @method     ChildPackSalesOrderDetailQuery groupByQtyToship() Group by the qty_toship column
 * @method     ChildPackSalesOrderDetailQuery groupByQtyPacked() Group by the qty_packed column
 * @method     ChildPackSalesOrderDetailQuery groupByQtyRemaining() Group by the qty_remaining column
 * @method     ChildPackSalesOrderDetailQuery groupByDate() Group by the date column
 * @method     ChildPackSalesOrderDetailQuery groupByTime() Group by the time column
 *
 * @method     ChildPackSalesOrderDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPackSalesOrderDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPackSalesOrderDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPackSalesOrderDetailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPackSalesOrderDetailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPackSalesOrderDetailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPackSalesOrderDetail findOne(ConnectionInterface $con = null) Return the first ChildPackSalesOrderDetail matching the query
 * @method     ChildPackSalesOrderDetail findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPackSalesOrderDetail matching the query, or a new ChildPackSalesOrderDetail object populated from the query conditions when no match is found
 *
 * @method     ChildPackSalesOrderDetail findOneBySessionid(string $sessionid) Return the first ChildPackSalesOrderDetail filtered by the sessionid column
 * @method     ChildPackSalesOrderDetail findOneByOrdernbr(string $ordernbr) Return the first ChildPackSalesOrderDetail filtered by the ordernbr column
 * @method     ChildPackSalesOrderDetail findOneByLinenbr(int $linenbr) Return the first ChildPackSalesOrderDetail filtered by the linenbr column
 * @method     ChildPackSalesOrderDetail findOneByItemid(string $itemid) Return the first ChildPackSalesOrderDetail filtered by the itemid column
 * @method     ChildPackSalesOrderDetail findOneByLotserial(string $lotserial) Return the first ChildPackSalesOrderDetail filtered by the lotserial column
 * @method     ChildPackSalesOrderDetail findOneByQtyToship(int $qty_toship) Return the first ChildPackSalesOrderDetail filtered by the qty_toship column
 * @method     ChildPackSalesOrderDetail findOneByQtyPacked(int $qty_packed) Return the first ChildPackSalesOrderDetail filtered by the qty_packed column
 * @method     ChildPackSalesOrderDetail findOneByQtyRemaining(int $qty_remaining) Return the first ChildPackSalesOrderDetail filtered by the qty_remaining column
 * @method     ChildPackSalesOrderDetail findOneByDate(int $date) Return the first ChildPackSalesOrderDetail filtered by the date column
 * @method     ChildPackSalesOrderDetail findOneByTime(int $time) Return the first ChildPackSalesOrderDetail filtered by the time column *

 * @method     ChildPackSalesOrderDetail requirePk($key, ConnectionInterface $con = null) Return the ChildPackSalesOrderDetail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOne(ConnectionInterface $con = null) Return the first ChildPackSalesOrderDetail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPackSalesOrderDetail requireOneBySessionid(string $sessionid) Return the first ChildPackSalesOrderDetail filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByOrdernbr(string $ordernbr) Return the first ChildPackSalesOrderDetail filtered by the ordernbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByLinenbr(int $linenbr) Return the first ChildPackSalesOrderDetail filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByItemid(string $itemid) Return the first ChildPackSalesOrderDetail filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByLotserial(string $lotserial) Return the first ChildPackSalesOrderDetail filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByQtyToship(int $qty_toship) Return the first ChildPackSalesOrderDetail filtered by the qty_toship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByQtyPacked(int $qty_packed) Return the first ChildPackSalesOrderDetail filtered by the qty_packed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByQtyRemaining(int $qty_remaining) Return the first ChildPackSalesOrderDetail filtered by the qty_remaining column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByDate(int $date) Return the first ChildPackSalesOrderDetail filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPackSalesOrderDetail requireOneByTime(int $time) Return the first ChildPackSalesOrderDetail filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPackSalesOrderDetail objects based on current ModelCriteria
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findBySessionid(string $sessionid) Return ChildPackSalesOrderDetail objects filtered by the sessionid column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByOrdernbr(string $ordernbr) Return ChildPackSalesOrderDetail objects filtered by the ordernbr column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByLinenbr(int $linenbr) Return ChildPackSalesOrderDetail objects filtered by the linenbr column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByItemid(string $itemid) Return ChildPackSalesOrderDetail objects filtered by the itemid column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByLotserial(string $lotserial) Return ChildPackSalesOrderDetail objects filtered by the lotserial column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByQtyToship(int $qty_toship) Return ChildPackSalesOrderDetail objects filtered by the qty_toship column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByQtyPacked(int $qty_packed) Return ChildPackSalesOrderDetail objects filtered by the qty_packed column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByQtyRemaining(int $qty_remaining) Return ChildPackSalesOrderDetail objects filtered by the qty_remaining column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByDate(int $date) Return ChildPackSalesOrderDetail objects filtered by the date column
 * @method     ChildPackSalesOrderDetail[]|ObjectCollection findByTime(int $time) Return ChildPackSalesOrderDetail objects filtered by the time column
 * @method     ChildPackSalesOrderDetail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PackSalesOrderDetailQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PackSalesOrderDetailQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\PackSalesOrderDetail', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPackSalesOrderDetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPackSalesOrderDetailQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPackSalesOrderDetailQuery) {
            return $criteria;
        }
        $query = new ChildPackSalesOrderDetailQuery();
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
     * $obj = $c->findPk(array(12, 34, 56, 78, 91), $con);
     * </code>
     *
     * @param array[$sessionid, $ordernbr, $linenbr, $itemid, $lotserial] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPackSalesOrderDetail|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PackSalesOrderDetailTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PackSalesOrderDetailTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4])]))))) {
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
     * @return ChildPackSalesOrderDetail A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, ordernbr, linenbr, itemid, lotserial, qty_toship, qty_packed, qty_remaining, date, time FROM wmpackdet WHERE sessionid = :p0 AND ordernbr = :p1 AND linenbr = :p2 AND itemid = :p3 AND lotserial = :p4';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_STR);
            $stmt->bindValue(':p4', $key[4], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPackSalesOrderDetail $obj */
            $obj = new ChildPackSalesOrderDetail();
            $obj->hydrate($row);
            PackSalesOrderDetailTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4])]));
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
     * @return ChildPackSalesOrderDetail|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_ORDERNBR, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_LINENBR, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_ITEMID, $key[3], Criteria::EQUAL);
        $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_LOTSERIAL, $key[4], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PackSalesOrderDetailTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PackSalesOrderDetailTableMap::COL_ORDERNBR, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(PackSalesOrderDetailTableMap::COL_LINENBR, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(PackSalesOrderDetailTableMap::COL_ITEMID, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $cton4 = $this->getNewCriterion(PackSalesOrderDetailTableMap::COL_LOTSERIAL, $key[4], Criteria::EQUAL);
            $cton0->addAnd($cton4);
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
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByOrdernbr($ordernbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordernbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_ORDERNBR, $ordernbr, $comparison);
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
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, $comparison = null)
    {
        if (is_array($linenbr)) {
            $useMinMax = false;
            if (isset($linenbr['min'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_LINENBR, $linenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($linenbr['max'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_LINENBR, $linenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_LINENBR, $linenbr, $comparison);
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
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_LOTSERIAL, $lotserial, $comparison);
    }

    /**
     * Filter the query on the qty_toship column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyToship(1234); // WHERE qty_toship = 1234
     * $query->filterByQtyToship(array(12, 34)); // WHERE qty_toship IN (12, 34)
     * $query->filterByQtyToship(array('min' => 12)); // WHERE qty_toship > 12
     * </code>
     *
     * @param     mixed $qtyToship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByQtyToship($qtyToship = null, $comparison = null)
    {
        if (is_array($qtyToship)) {
            $useMinMax = false;
            if (isset($qtyToship['min'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_TOSHIP, $qtyToship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyToship['max'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_TOSHIP, $qtyToship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_TOSHIP, $qtyToship, $comparison);
    }

    /**
     * Filter the query on the qty_packed column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyPacked(1234); // WHERE qty_packed = 1234
     * $query->filterByQtyPacked(array(12, 34)); // WHERE qty_packed IN (12, 34)
     * $query->filterByQtyPacked(array('min' => 12)); // WHERE qty_packed > 12
     * </code>
     *
     * @param     mixed $qtyPacked The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByQtyPacked($qtyPacked = null, $comparison = null)
    {
        if (is_array($qtyPacked)) {
            $useMinMax = false;
            if (isset($qtyPacked['min'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_PACKED, $qtyPacked['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyPacked['max'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_PACKED, $qtyPacked['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_PACKED, $qtyPacked, $comparison);
    }

    /**
     * Filter the query on the qty_remaining column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyRemaining(1234); // WHERE qty_remaining = 1234
     * $query->filterByQtyRemaining(array(12, 34)); // WHERE qty_remaining IN (12, 34)
     * $query->filterByQtyRemaining(array('min' => 12)); // WHERE qty_remaining > 12
     * </code>
     *
     * @param     mixed $qtyRemaining The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByQtyRemaining($qtyRemaining = null, $comparison = null)
    {
        if (is_array($qtyRemaining)) {
            $useMinMax = false;
            if (isset($qtyRemaining['min'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_REMAINING, $qtyRemaining['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyRemaining['max'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_REMAINING, $qtyRemaining['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_QTY_REMAINING, $qtyRemaining, $comparison);
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
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PackSalesOrderDetailTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPackSalesOrderDetail $packSalesOrderDetail Object to remove from the list of results
     *
     * @return $this|ChildPackSalesOrderDetailQuery The current query, for fluid interface
     */
    public function prune($packSalesOrderDetail = null)
    {
        if ($packSalesOrderDetail) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PackSalesOrderDetailTableMap::COL_SESSIONID), $packSalesOrderDetail->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PackSalesOrderDetailTableMap::COL_ORDERNBR), $packSalesOrderDetail->getOrdernbr(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(PackSalesOrderDetailTableMap::COL_LINENBR), $packSalesOrderDetail->getLinenbr(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(PackSalesOrderDetailTableMap::COL_ITEMID), $packSalesOrderDetail->getItemid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond4', $this->getAliasedColName(PackSalesOrderDetailTableMap::COL_LOTSERIAL), $packSalesOrderDetail->getLotserial(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3', 'pruneCond4'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the wmpackdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PackSalesOrderDetailTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PackSalesOrderDetailTableMap::clearInstancePool();
            PackSalesOrderDetailTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PackSalesOrderDetailTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PackSalesOrderDetailTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PackSalesOrderDetailTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PackSalesOrderDetailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PackSalesOrderDetailQuery
