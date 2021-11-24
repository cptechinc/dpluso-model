<?php

namespace Base;

use \CartLot as ChildCartLot;
use \CartLotQuery as ChildCartLotQuery;
use \Exception;
use \PDO;
use Map\CartLotTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cartlots' table.
 *
 *
 *
 * @method     ChildCartLotQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCartLotQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildCartLotQuery orderBySequence($order = Criteria::ASC) Order by the sequence column
 * @method     ChildCartLotQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildCartLotQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildCartLotQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildCartLotQuery orderByErrormes($order = Criteria::ASC) Order by the errormes column
 * @method     ChildCartLotQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCartLotQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCartLotQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCartLotQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCartLotQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildCartLotQuery groupBySequence() Group by the sequence column
 * @method     ChildCartLotQuery groupByItemid() Group by the itemid column
 * @method     ChildCartLotQuery groupByLotserial() Group by the lotserial column
 * @method     ChildCartLotQuery groupByQty() Group by the qty column
 * @method     ChildCartLotQuery groupByErrormes() Group by the errormes column
 * @method     ChildCartLotQuery groupByDate() Group by the date column
 * @method     ChildCartLotQuery groupByTime() Group by the time column
 * @method     ChildCartLotQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCartLotQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCartLotQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCartLotQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCartLotQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCartLotQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCartLotQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCartLot findOne(ConnectionInterface $con = null) Return the first ChildCartLot matching the query
 * @method     ChildCartLot findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCartLot matching the query, or a new ChildCartLot object populated from the query conditions when no match is found
 *
 * @method     ChildCartLot findOneBySessionid(string $sessionid) Return the first ChildCartLot filtered by the sessionid column
 * @method     ChildCartLot findOneByLinenbr(int $linenbr) Return the first ChildCartLot filtered by the linenbr column
 * @method     ChildCartLot findOneBySequence(int $sequence) Return the first ChildCartLot filtered by the sequence column
 * @method     ChildCartLot findOneByItemid(string $itemid) Return the first ChildCartLot filtered by the itemid column
 * @method     ChildCartLot findOneByLotserial(string $lotserial) Return the first ChildCartLot filtered by the lotserial column
 * @method     ChildCartLot findOneByQty(int $qty) Return the first ChildCartLot filtered by the qty column
 * @method     ChildCartLot findOneByErrormes(string $errormes) Return the first ChildCartLot filtered by the errormes column
 * @method     ChildCartLot findOneByDate(string $date) Return the first ChildCartLot filtered by the date column
 * @method     ChildCartLot findOneByTime(int $time) Return the first ChildCartLot filtered by the time column
 * @method     ChildCartLot findOneByDummy(string $dummy) Return the first ChildCartLot filtered by the dummy column *

 * @method     ChildCartLot requirePk($key, ConnectionInterface $con = null) Return the ChildCartLot by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOne(ConnectionInterface $con = null) Return the first ChildCartLot matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCartLot requireOneBySessionid(string $sessionid) Return the first ChildCartLot filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneByLinenbr(int $linenbr) Return the first ChildCartLot filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneBySequence(int $sequence) Return the first ChildCartLot filtered by the sequence column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneByItemid(string $itemid) Return the first ChildCartLot filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneByLotserial(string $lotserial) Return the first ChildCartLot filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneByQty(int $qty) Return the first ChildCartLot filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneByErrormes(string $errormes) Return the first ChildCartLot filtered by the errormes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneByDate(string $date) Return the first ChildCartLot filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneByTime(int $time) Return the first ChildCartLot filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartLot requireOneByDummy(string $dummy) Return the first ChildCartLot filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCartLot[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCartLot objects based on current ModelCriteria
 * @method     ChildCartLot[]|ObjectCollection findBySessionid(string $sessionid) Return ChildCartLot objects filtered by the sessionid column
 * @method     ChildCartLot[]|ObjectCollection findByLinenbr(int $linenbr) Return ChildCartLot objects filtered by the linenbr column
 * @method     ChildCartLot[]|ObjectCollection findBySequence(int $sequence) Return ChildCartLot objects filtered by the sequence column
 * @method     ChildCartLot[]|ObjectCollection findByItemid(string $itemid) Return ChildCartLot objects filtered by the itemid column
 * @method     ChildCartLot[]|ObjectCollection findByLotserial(string $lotserial) Return ChildCartLot objects filtered by the lotserial column
 * @method     ChildCartLot[]|ObjectCollection findByQty(int $qty) Return ChildCartLot objects filtered by the qty column
 * @method     ChildCartLot[]|ObjectCollection findByErrormes(string $errormes) Return ChildCartLot objects filtered by the errormes column
 * @method     ChildCartLot[]|ObjectCollection findByDate(string $date) Return ChildCartLot objects filtered by the date column
 * @method     ChildCartLot[]|ObjectCollection findByTime(int $time) Return ChildCartLot objects filtered by the time column
 * @method     ChildCartLot[]|ObjectCollection findByDummy(string $dummy) Return ChildCartLot objects filtered by the dummy column
 * @method     ChildCartLot[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CartLotQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CartLotQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\CartLot', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCartLotQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCartLotQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCartLotQuery) {
            return $criteria;
        }
        $query = new ChildCartLotQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$sessionid, $linenbr, $sequence] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCartLot|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CartLotTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CartLotTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildCartLot A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, linenbr, sequence, itemid, lotserial, qty, errormes, date, time, dummy FROM cartlots WHERE sessionid = :p0 AND linenbr = :p1 AND sequence = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCartLot $obj */
            $obj = new ChildCartLot();
            $obj->hydrate($row);
            CartLotTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildCartLot|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CartLotTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CartLotTableMap::COL_LINENBR, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(CartLotTableMap::COL_SEQUENCE, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CartLotTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CartLotTableMap::COL_LINENBR, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(CartLotTableMap::COL_SEQUENCE, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
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
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, $comparison = null)
    {
        if (is_array($linenbr)) {
            $useMinMax = false;
            if (isset($linenbr['min'])) {
                $this->addUsingAlias(CartLotTableMap::COL_LINENBR, $linenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($linenbr['max'])) {
                $this->addUsingAlias(CartLotTableMap::COL_LINENBR, $linenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_LINENBR, $linenbr, $comparison);
    }

    /**
     * Filter the query on the sequence column
     *
     * Example usage:
     * <code>
     * $query->filterBySequence(1234); // WHERE sequence = 1234
     * $query->filterBySequence(array(12, 34)); // WHERE sequence IN (12, 34)
     * $query->filterBySequence(array('min' => 12)); // WHERE sequence > 12
     * </code>
     *
     * @param     mixed $sequence The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterBySequence($sequence = null, $comparison = null)
    {
        if (is_array($sequence)) {
            $useMinMax = false;
            if (isset($sequence['min'])) {
                $this->addUsingAlias(CartLotTableMap::COL_SEQUENCE, $sequence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sequence['max'])) {
                $this->addUsingAlias(CartLotTableMap::COL_SEQUENCE, $sequence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_SEQUENCE, $sequence, $comparison);
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
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_LOTSERIAL, $lotserial, $comparison);
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
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(CartLotTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(CartLotTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the errormes column
     *
     * Example usage:
     * <code>
     * $query->filterByErrormes('fooValue');   // WHERE errormes = 'fooValue'
     * $query->filterByErrormes('%fooValue%', Criteria::LIKE); // WHERE errormes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errormes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByErrormes($errormes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_ERRORMES, $errormes, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('fooValue');   // WHERE date = 'fooValue'
     * $query->filterByDate('%fooValue%', Criteria::LIKE); // WHERE date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $date The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(CartLotTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CartLotTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartLotTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCartLot $cartLot Object to remove from the list of results
     *
     * @return $this|ChildCartLotQuery The current query, for fluid interface
     */
    public function prune($cartLot = null)
    {
        if ($cartLot) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CartLotTableMap::COL_SESSIONID), $cartLot->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CartLotTableMap::COL_LINENBR), $cartLot->getLinenbr(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(CartLotTableMap::COL_SEQUENCE), $cartLot->getSequence(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cartlots table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CartLotTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CartLotTableMap::clearInstancePool();
            CartLotTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CartLotTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CartLotTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CartLotTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CartLotTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CartLotQuery
