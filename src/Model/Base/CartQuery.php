<?php

namespace Base;

use \Cart as ChildCart;
use \CartQuery as ChildCartQuery;
use \Exception;
use \PDO;
use Map\CartTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cart' table.
 *
 *
 *
 * @method     ChildCartQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCartQuery orderByRecordno($order = Criteria::ASC) Order by the recordno column
 * @method     ChildCartQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCartQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCartQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildCartQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildCartQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildCartQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildCartQuery orderByDesc1($order = Criteria::ASC) Order by the desc1 column
 * @method     ChildCartQuery orderByDesc2($order = Criteria::ASC) Order by the desc2 column
 * @method     ChildCartQuery orderByErrormes($order = Criteria::ASC) Order by the errormes column
 * @method     ChildCartQuery orderByEntitemid($order = Criteria::ASC) Order by the entitemid column
 * @method     ChildCartQuery orderByUomdesc($order = Criteria::ASC) Order by the uomdesc column
 * @method     ChildCartQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCartQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCartQuery groupByRecordno() Group by the recordno column
 * @method     ChildCartQuery groupByDate() Group by the date column
 * @method     ChildCartQuery groupByTime() Group by the time column
 * @method     ChildCartQuery groupByItemid() Group by the itemid column
 * @method     ChildCartQuery groupByPrice() Group by the price column
 * @method     ChildCartQuery groupByQty() Group by the qty column
 * @method     ChildCartQuery groupByAmount() Group by the amount column
 * @method     ChildCartQuery groupByDesc1() Group by the desc1 column
 * @method     ChildCartQuery groupByDesc2() Group by the desc2 column
 * @method     ChildCartQuery groupByErrormes() Group by the errormes column
 * @method     ChildCartQuery groupByEntitemid() Group by the entitemid column
 * @method     ChildCartQuery groupByUomdesc() Group by the uomdesc column
 * @method     ChildCartQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCartQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCartQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCartQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCartQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCartQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCartQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCart findOne(ConnectionInterface $con = null) Return the first ChildCart matching the query
 * @method     ChildCart findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCart matching the query, or a new ChildCart object populated from the query conditions when no match is found
 *
 * @method     ChildCart findOneBySessionid(string $sessionid) Return the first ChildCart filtered by the sessionid column
 * @method     ChildCart findOneByRecordno(int $recordno) Return the first ChildCart filtered by the recordno column
 * @method     ChildCart findOneByDate(string $date) Return the first ChildCart filtered by the date column
 * @method     ChildCart findOneByTime(int $time) Return the first ChildCart filtered by the time column
 * @method     ChildCart findOneByItemid(string $itemid) Return the first ChildCart filtered by the itemid column
 * @method     ChildCart findOneByPrice(string $price) Return the first ChildCart filtered by the price column
 * @method     ChildCart findOneByQty(int $qty) Return the first ChildCart filtered by the qty column
 * @method     ChildCart findOneByAmount(string $amount) Return the first ChildCart filtered by the amount column
 * @method     ChildCart findOneByDesc1(string $desc1) Return the first ChildCart filtered by the desc1 column
 * @method     ChildCart findOneByDesc2(string $desc2) Return the first ChildCart filtered by the desc2 column
 * @method     ChildCart findOneByErrormes(string $errormes) Return the first ChildCart filtered by the errormes column
 * @method     ChildCart findOneByEntitemid(string $entitemid) Return the first ChildCart filtered by the entitemid column
 * @method     ChildCart findOneByUomdesc(string $uomdesc) Return the first ChildCart filtered by the uomdesc column
 * @method     ChildCart findOneByDummy(string $dummy) Return the first ChildCart filtered by the dummy column *

 * @method     ChildCart requirePk($key, ConnectionInterface $con = null) Return the ChildCart by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOne(ConnectionInterface $con = null) Return the first ChildCart matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCart requireOneBySessionid(string $sessionid) Return the first ChildCart filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByRecordno(int $recordno) Return the first ChildCart filtered by the recordno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByDate(string $date) Return the first ChildCart filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByTime(int $time) Return the first ChildCart filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByItemid(string $itemid) Return the first ChildCart filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByPrice(string $price) Return the first ChildCart filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByQty(int $qty) Return the first ChildCart filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByAmount(string $amount) Return the first ChildCart filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByDesc1(string $desc1) Return the first ChildCart filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByDesc2(string $desc2) Return the first ChildCart filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByErrormes(string $errormes) Return the first ChildCart filtered by the errormes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByEntitemid(string $entitemid) Return the first ChildCart filtered by the entitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByUomdesc(string $uomdesc) Return the first ChildCart filtered by the uomdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByDummy(string $dummy) Return the first ChildCart filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCart[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCart objects based on current ModelCriteria
 * @method     ChildCart[]|ObjectCollection findBySessionid(string $sessionid) Return ChildCart objects filtered by the sessionid column
 * @method     ChildCart[]|ObjectCollection findByRecordno(int $recordno) Return ChildCart objects filtered by the recordno column
 * @method     ChildCart[]|ObjectCollection findByDate(string $date) Return ChildCart objects filtered by the date column
 * @method     ChildCart[]|ObjectCollection findByTime(int $time) Return ChildCart objects filtered by the time column
 * @method     ChildCart[]|ObjectCollection findByItemid(string $itemid) Return ChildCart objects filtered by the itemid column
 * @method     ChildCart[]|ObjectCollection findByPrice(string $price) Return ChildCart objects filtered by the price column
 * @method     ChildCart[]|ObjectCollection findByQty(int $qty) Return ChildCart objects filtered by the qty column
 * @method     ChildCart[]|ObjectCollection findByAmount(string $amount) Return ChildCart objects filtered by the amount column
 * @method     ChildCart[]|ObjectCollection findByDesc1(string $desc1) Return ChildCart objects filtered by the desc1 column
 * @method     ChildCart[]|ObjectCollection findByDesc2(string $desc2) Return ChildCart objects filtered by the desc2 column
 * @method     ChildCart[]|ObjectCollection findByErrormes(string $errormes) Return ChildCart objects filtered by the errormes column
 * @method     ChildCart[]|ObjectCollection findByEntitemid(string $entitemid) Return ChildCart objects filtered by the entitemid column
 * @method     ChildCart[]|ObjectCollection findByUomdesc(string $uomdesc) Return ChildCart objects filtered by the uomdesc column
 * @method     ChildCart[]|ObjectCollection findByDummy(string $dummy) Return ChildCart objects filtered by the dummy column
 * @method     ChildCart[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CartQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CartQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Cart', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCartQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCartQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCartQuery) {
            return $criteria;
        }
        $query = new ChildCartQuery();
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
     * @param array[$sessionid, $recordno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCart|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CartTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CartTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCart A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recordno, date, time, itemid, price, qty, amount, desc1, desc2, errormes, entitemid, uomdesc, dummy FROM cart WHERE sessionid = :p0 AND recordno = :p1';
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
            /** @var ChildCart $obj */
            $obj = new ChildCart();
            $obj->hydrate($row);
            CartTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCart|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CartTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CartTableMap::COL_RECORDNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CartTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CartTableMap::COL_RECORDNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the recordno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecordno(1234); // WHERE recordno = 1234
     * $query->filterByRecordno(array(12, 34)); // WHERE recordno IN (12, 34)
     * $query->filterByRecordno(array('min' => 12)); // WHERE recordno > 12
     * </code>
     *
     * @param     mixed $recordno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByRecordno($recordno = null, $comparison = null)
    {
        if (is_array($recordno)) {
            $useMinMax = false;
            if (isset($recordno['min'])) {
                $this->addUsingAlias(CartTableMap::COL_RECORDNO, $recordno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recordno['max'])) {
                $this->addUsingAlias(CartTableMap::COL_RECORDNO, $recordno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_RECORDNO, $recordno, $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(CartTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CartTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(CartTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(CartTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(CartTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(CartTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(CartTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(CartTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the desc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc1('fooValue');   // WHERE desc1 = 'fooValue'
     * $query->filterByDesc1('%fooValue%', Criteria::LIKE); // WHERE desc1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desc1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByDesc1($desc1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_DESC1, $desc1, $comparison);
    }

    /**
     * Filter the query on the desc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc2('fooValue');   // WHERE desc2 = 'fooValue'
     * $query->filterByDesc2('%fooValue%', Criteria::LIKE); // WHERE desc2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desc2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByDesc2($desc2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_DESC2, $desc2, $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByErrormes($errormes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_ERRORMES, $errormes, $comparison);
    }

    /**
     * Filter the query on the entitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByEntitemid('fooValue');   // WHERE entitemid = 'fooValue'
     * $query->filterByEntitemid('%fooValue%', Criteria::LIKE); // WHERE entitemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $entitemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByEntitemid($entitemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($entitemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_ENTITEMID, $entitemid, $comparison);
    }

    /**
     * Filter the query on the uomdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByUomdesc('fooValue');   // WHERE uomdesc = 'fooValue'
     * $query->filterByUomdesc('%fooValue%', Criteria::LIKE); // WHERE uomdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uomdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByUomdesc($uomdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uomdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_UOMDESC, $uomdesc, $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCart $cart Object to remove from the list of results
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function prune($cart = null)
    {
        if ($cart) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CartTableMap::COL_SESSIONID), $cart->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CartTableMap::COL_RECORDNO), $cart->getRecordno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cart table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CartTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CartTableMap::clearInstancePool();
            CartTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CartTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CartTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CartTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CartTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CartQuery
