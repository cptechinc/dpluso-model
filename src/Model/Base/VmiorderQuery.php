<?php

namespace Base;

use \Vmiorder as ChildVmiorder;
use \VmiorderQuery as ChildVmiorderQuery;
use \Exception;
use \PDO;
use Map\VmiorderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'vmiorder' table.
 *
 *
 *
 * @method     ChildVmiorderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildVmiorderQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildVmiorderQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 * @method     ChildVmiorderQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildVmiorderQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildVmiorderQuery orderByCell($order = Criteria::ASC) Order by the cell column
 * @method     ChildVmiorderQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildVmiorderQuery orderByCustitemid($order = Criteria::ASC) Order by the custitemid column
 * @method     ChildVmiorderQuery orderByCases($order = Criteria::ASC) Order by the cases column
 * @method     ChildVmiorderQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildVmiorderQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildVmiorderQuery orderByTime($order = Criteria::ASC) Order by the time column
 *
 * @method     ChildVmiorderQuery groupById() Group by the id column
 * @method     ChildVmiorderQuery groupBySessionid() Group by the sessionid column
 * @method     ChildVmiorderQuery groupByUserid() Group by the userid column
 * @method     ChildVmiorderQuery groupByCustid() Group by the custid column
 * @method     ChildVmiorderQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildVmiorderQuery groupByCell() Group by the cell column
 * @method     ChildVmiorderQuery groupByItemid() Group by the itemid column
 * @method     ChildVmiorderQuery groupByCustitemid() Group by the custitemid column
 * @method     ChildVmiorderQuery groupByCases() Group by the cases column
 * @method     ChildVmiorderQuery groupByQty() Group by the qty column
 * @method     ChildVmiorderQuery groupByDate() Group by the date column
 * @method     ChildVmiorderQuery groupByTime() Group by the time column
 *
 * @method     ChildVmiorderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVmiorderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVmiorderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVmiorderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVmiorderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVmiorderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVmiorder findOne(ConnectionInterface $con = null) Return the first ChildVmiorder matching the query
 * @method     ChildVmiorder findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVmiorder matching the query, or a new ChildVmiorder object populated from the query conditions when no match is found
 *
 * @method     ChildVmiorder findOneById(int $id) Return the first ChildVmiorder filtered by the id column
 * @method     ChildVmiorder findOneBySessionid(string $sessionid) Return the first ChildVmiorder filtered by the sessionid column
 * @method     ChildVmiorder findOneByUserid(string $userid) Return the first ChildVmiorder filtered by the userid column
 * @method     ChildVmiorder findOneByCustid(string $custid) Return the first ChildVmiorder filtered by the custid column
 * @method     ChildVmiorder findOneByShiptoid(string $shiptoid) Return the first ChildVmiorder filtered by the shiptoid column
 * @method     ChildVmiorder findOneByCell(string $cell) Return the first ChildVmiorder filtered by the cell column
 * @method     ChildVmiorder findOneByItemid(string $itemid) Return the first ChildVmiorder filtered by the itemid column
 * @method     ChildVmiorder findOneByCustitemid(string $custitemid) Return the first ChildVmiorder filtered by the custitemid column
 * @method     ChildVmiorder findOneByCases(int $cases) Return the first ChildVmiorder filtered by the cases column
 * @method     ChildVmiorder findOneByQty(int $qty) Return the first ChildVmiorder filtered by the qty column
 * @method     ChildVmiorder findOneByDate(int $date) Return the first ChildVmiorder filtered by the date column
 * @method     ChildVmiorder findOneByTime(int $time) Return the first ChildVmiorder filtered by the time column *

 * @method     ChildVmiorder requirePk($key, ConnectionInterface $con = null) Return the ChildVmiorder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOne(ConnectionInterface $con = null) Return the first ChildVmiorder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVmiorder requireOneById(int $id) Return the first ChildVmiorder filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneBySessionid(string $sessionid) Return the first ChildVmiorder filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByUserid(string $userid) Return the first ChildVmiorder filtered by the userid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByCustid(string $custid) Return the first ChildVmiorder filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByShiptoid(string $shiptoid) Return the first ChildVmiorder filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByCell(string $cell) Return the first ChildVmiorder filtered by the cell column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByItemid(string $itemid) Return the first ChildVmiorder filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByCustitemid(string $custitemid) Return the first ChildVmiorder filtered by the custitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByCases(int $cases) Return the first ChildVmiorder filtered by the cases column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByQty(int $qty) Return the first ChildVmiorder filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByDate(int $date) Return the first ChildVmiorder filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmiorder requireOneByTime(int $time) Return the first ChildVmiorder filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVmiorder[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVmiorder objects based on current ModelCriteria
 * @method     ChildVmiorder[]|ObjectCollection findById(int $id) Return ChildVmiorder objects filtered by the id column
 * @method     ChildVmiorder[]|ObjectCollection findBySessionid(string $sessionid) Return ChildVmiorder objects filtered by the sessionid column
 * @method     ChildVmiorder[]|ObjectCollection findByUserid(string $userid) Return ChildVmiorder objects filtered by the userid column
 * @method     ChildVmiorder[]|ObjectCollection findByCustid(string $custid) Return ChildVmiorder objects filtered by the custid column
 * @method     ChildVmiorder[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildVmiorder objects filtered by the shiptoid column
 * @method     ChildVmiorder[]|ObjectCollection findByCell(string $cell) Return ChildVmiorder objects filtered by the cell column
 * @method     ChildVmiorder[]|ObjectCollection findByItemid(string $itemid) Return ChildVmiorder objects filtered by the itemid column
 * @method     ChildVmiorder[]|ObjectCollection findByCustitemid(string $custitemid) Return ChildVmiorder objects filtered by the custitemid column
 * @method     ChildVmiorder[]|ObjectCollection findByCases(int $cases) Return ChildVmiorder objects filtered by the cases column
 * @method     ChildVmiorder[]|ObjectCollection findByQty(int $qty) Return ChildVmiorder objects filtered by the qty column
 * @method     ChildVmiorder[]|ObjectCollection findByDate(int $date) Return ChildVmiorder objects filtered by the date column
 * @method     ChildVmiorder[]|ObjectCollection findByTime(int $time) Return ChildVmiorder objects filtered by the time column
 * @method     ChildVmiorder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VmiorderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\VmiorderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Vmiorder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVmiorderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVmiorderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVmiorderQuery) {
            return $criteria;
        }
        $query = new ChildVmiorderQuery();
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
     * @return ChildVmiorder|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VmiorderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VmiorderTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildVmiorder A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sessionid, userid, custid, shiptoid, cell, itemid, custitemid, cases, qty, date, time FROM vmiorder WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildVmiorder $obj */
            $obj = new ChildVmiorder();
            $obj->hydrate($row);
            VmiorderTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildVmiorder|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VmiorderTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VmiorderTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the userid column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid('fooValue');   // WHERE userid = 'fooValue'
     * $query->filterByUserid('%fooValue%', Criteria::LIKE); // WHERE userid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_USERID, $userid, $comparison);
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
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the cell column
     *
     * Example usage:
     * <code>
     * $query->filterByCell('fooValue');   // WHERE cell = 'fooValue'
     * $query->filterByCell('%fooValue%', Criteria::LIKE); // WHERE cell LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cell The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByCell($cell = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cell)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_CELL, $cell, $comparison);
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
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the custitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustitemid('fooValue');   // WHERE custitemid = 'fooValue'
     * $query->filterByCustitemid('%fooValue%', Criteria::LIKE); // WHERE custitemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custitemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByCustitemid($custitemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custitemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_CUSTITEMID, $custitemid, $comparison);
    }

    /**
     * Filter the query on the cases column
     *
     * Example usage:
     * <code>
     * $query->filterByCases(1234); // WHERE cases = 1234
     * $query->filterByCases(array(12, 34)); // WHERE cases IN (12, 34)
     * $query->filterByCases(array('min' => 12)); // WHERE cases > 12
     * </code>
     *
     * @param     mixed $cases The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByCases($cases = null, $comparison = null)
    {
        if (is_array($cases)) {
            $useMinMax = false;
            if (isset($cases['min'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_CASES, $cases['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cases['max'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_CASES, $cases['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_CASES, $cases, $comparison);
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
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(VmiorderTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmiorderTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVmiorder $vmiorder Object to remove from the list of results
     *
     * @return $this|ChildVmiorderQuery The current query, for fluid interface
     */
    public function prune($vmiorder = null)
    {
        if ($vmiorder) {
            $this->addUsingAlias(VmiorderTableMap::COL_ID, $vmiorder->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the vmiorder table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VmiorderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VmiorderTableMap::clearInstancePool();
            VmiorderTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(VmiorderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VmiorderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VmiorderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VmiorderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // VmiorderQuery
