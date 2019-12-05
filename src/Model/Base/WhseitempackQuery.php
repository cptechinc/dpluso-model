<?php

namespace Base;

use \Whseitempack as ChildWhseitempack;
use \WhseitempackQuery as ChildWhseitempackQuery;
use \Exception;
use \PDO;
use Map\WhseitempackTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'whseitempack' table.
 *
 *
 *
 * @method     ChildWhseitempackQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildWhseitempackQuery orderByOrdn($order = Criteria::ASC) Order by the ordn column
 * @method     ChildWhseitempackQuery orderByLinenumber($order = Criteria::ASC) Order by the linenumber column
 * @method     ChildWhseitempackQuery orderByCarton($order = Criteria::ASC) Order by the carton column
 * @method     ChildWhseitempackQuery orderByRecordnumber($order = Criteria::ASC) Order by the recordnumber column
 * @method     ChildWhseitempackQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildWhseitempackQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildWhseitempackQuery orderByLotserialref($order = Criteria::ASC) Order by the lotserialref column
 * @method     ChildWhseitempackQuery orderByQty($order = Criteria::ASC) Order by the qty column
 *
 * @method     ChildWhseitempackQuery groupBySessionid() Group by the sessionid column
 * @method     ChildWhseitempackQuery groupByOrdn() Group by the ordn column
 * @method     ChildWhseitempackQuery groupByLinenumber() Group by the linenumber column
 * @method     ChildWhseitempackQuery groupByCarton() Group by the carton column
 * @method     ChildWhseitempackQuery groupByRecordnumber() Group by the recordnumber column
 * @method     ChildWhseitempackQuery groupByItemid() Group by the itemid column
 * @method     ChildWhseitempackQuery groupByLotserial() Group by the lotserial column
 * @method     ChildWhseitempackQuery groupByLotserialref() Group by the lotserialref column
 * @method     ChildWhseitempackQuery groupByQty() Group by the qty column
 *
 * @method     ChildWhseitempackQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWhseitempackQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWhseitempackQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWhseitempackQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWhseitempackQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWhseitempackQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWhseitempack findOne(ConnectionInterface $con = null) Return the first ChildWhseitempack matching the query
 * @method     ChildWhseitempack findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWhseitempack matching the query, or a new ChildWhseitempack object populated from the query conditions when no match is found
 *
 * @method     ChildWhseitempack findOneBySessionid(string $sessionid) Return the first ChildWhseitempack filtered by the sessionid column
 * @method     ChildWhseitempack findOneByOrdn(string $ordn) Return the first ChildWhseitempack filtered by the ordn column
 * @method     ChildWhseitempack findOneByLinenumber(int $linenumber) Return the first ChildWhseitempack filtered by the linenumber column
 * @method     ChildWhseitempack findOneByCarton(int $carton) Return the first ChildWhseitempack filtered by the carton column
 * @method     ChildWhseitempack findOneByRecordnumber(int $recordnumber) Return the first ChildWhseitempack filtered by the recordnumber column
 * @method     ChildWhseitempack findOneByItemid(string $itemid) Return the first ChildWhseitempack filtered by the itemid column
 * @method     ChildWhseitempack findOneByLotserial(string $lotserial) Return the first ChildWhseitempack filtered by the lotserial column
 * @method     ChildWhseitempack findOneByLotserialref(string $lotserialref) Return the first ChildWhseitempack filtered by the lotserialref column
 * @method     ChildWhseitempack findOneByQty(string $qty) Return the first ChildWhseitempack filtered by the qty column *

 * @method     ChildWhseitempack requirePk($key, ConnectionInterface $con = null) Return the ChildWhseitempack by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOne(ConnectionInterface $con = null) Return the first ChildWhseitempack matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseitempack requireOneBySessionid(string $sessionid) Return the first ChildWhseitempack filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOneByOrdn(string $ordn) Return the first ChildWhseitempack filtered by the ordn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOneByLinenumber(int $linenumber) Return the first ChildWhseitempack filtered by the linenumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOneByCarton(int $carton) Return the first ChildWhseitempack filtered by the carton column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOneByRecordnumber(int $recordnumber) Return the first ChildWhseitempack filtered by the recordnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOneByItemid(string $itemid) Return the first ChildWhseitempack filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOneByLotserial(string $lotserial) Return the first ChildWhseitempack filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOneByLotserialref(string $lotserialref) Return the first ChildWhseitempack filtered by the lotserialref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempack requireOneByQty(string $qty) Return the first ChildWhseitempack filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseitempack[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWhseitempack objects based on current ModelCriteria
 * @method     ChildWhseitempack[]|ObjectCollection findBySessionid(string $sessionid) Return ChildWhseitempack objects filtered by the sessionid column
 * @method     ChildWhseitempack[]|ObjectCollection findByOrdn(string $ordn) Return ChildWhseitempack objects filtered by the ordn column
 * @method     ChildWhseitempack[]|ObjectCollection findByLinenumber(int $linenumber) Return ChildWhseitempack objects filtered by the linenumber column
 * @method     ChildWhseitempack[]|ObjectCollection findByCarton(int $carton) Return ChildWhseitempack objects filtered by the carton column
 * @method     ChildWhseitempack[]|ObjectCollection findByRecordnumber(int $recordnumber) Return ChildWhseitempack objects filtered by the recordnumber column
 * @method     ChildWhseitempack[]|ObjectCollection findByItemid(string $itemid) Return ChildWhseitempack objects filtered by the itemid column
 * @method     ChildWhseitempack[]|ObjectCollection findByLotserial(string $lotserial) Return ChildWhseitempack objects filtered by the lotserial column
 * @method     ChildWhseitempack[]|ObjectCollection findByLotserialref(string $lotserialref) Return ChildWhseitempack objects filtered by the lotserialref column
 * @method     ChildWhseitempack[]|ObjectCollection findByQty(string $qty) Return ChildWhseitempack objects filtered by the qty column
 * @method     ChildWhseitempack[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WhseitempackQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WhseitempackQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Whseitempack', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWhseitempackQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWhseitempackQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWhseitempackQuery) {
            return $criteria;
        }
        $query = new ChildWhseitempackQuery();
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
     * @param array[$sessionid, $ordn, $linenumber, $carton, $recordnumber] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildWhseitempack|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WhseitempackTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WhseitempackTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4])]))))) {
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
     * @return ChildWhseitempack A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, ordn, linenumber, carton, recordnumber, itemid, lotserial, lotserialref, qty FROM whseitempack WHERE sessionid = :p0 AND ordn = :p1 AND linenumber = :p2 AND carton = :p3 AND recordnumber = :p4';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_INT);
            $stmt->bindValue(':p4', $key[4], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildWhseitempack $obj */
            $obj = new ChildWhseitempack();
            $obj->hydrate($row);
            WhseitempackTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4])]));
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
     * @return ChildWhseitempack|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(WhseitempackTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(WhseitempackTableMap::COL_ORDN, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(WhseitempackTableMap::COL_LINENUMBER, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(WhseitempackTableMap::COL_CARTON, $key[3], Criteria::EQUAL);
        $this->addUsingAlias(WhseitempackTableMap::COL_RECORDNUMBER, $key[4], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(WhseitempackTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(WhseitempackTableMap::COL_ORDN, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(WhseitempackTableMap::COL_LINENUMBER, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(WhseitempackTableMap::COL_CARTON, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $cton4 = $this->getNewCriterion(WhseitempackTableMap::COL_RECORDNUMBER, $key[4], Criteria::EQUAL);
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
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the ordn column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdn('fooValue');   // WHERE ordn = 'fooValue'
     * $query->filterByOrdn('%fooValue%', Criteria::LIKE); // WHERE ordn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ordn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByOrdn($ordn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_ORDN, $ordn, $comparison);
    }

    /**
     * Filter the query on the linenumber column
     *
     * Example usage:
     * <code>
     * $query->filterByLinenumber(1234); // WHERE linenumber = 1234
     * $query->filterByLinenumber(array(12, 34)); // WHERE linenumber IN (12, 34)
     * $query->filterByLinenumber(array('min' => 12)); // WHERE linenumber > 12
     * </code>
     *
     * @param     mixed $linenumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByLinenumber($linenumber = null, $comparison = null)
    {
        if (is_array($linenumber)) {
            $useMinMax = false;
            if (isset($linenumber['min'])) {
                $this->addUsingAlias(WhseitempackTableMap::COL_LINENUMBER, $linenumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($linenumber['max'])) {
                $this->addUsingAlias(WhseitempackTableMap::COL_LINENUMBER, $linenumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_LINENUMBER, $linenumber, $comparison);
    }

    /**
     * Filter the query on the carton column
     *
     * Example usage:
     * <code>
     * $query->filterByCarton(1234); // WHERE carton = 1234
     * $query->filterByCarton(array(12, 34)); // WHERE carton IN (12, 34)
     * $query->filterByCarton(array('min' => 12)); // WHERE carton > 12
     * </code>
     *
     * @param     mixed $carton The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByCarton($carton = null, $comparison = null)
    {
        if (is_array($carton)) {
            $useMinMax = false;
            if (isset($carton['min'])) {
                $this->addUsingAlias(WhseitempackTableMap::COL_CARTON, $carton['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carton['max'])) {
                $this->addUsingAlias(WhseitempackTableMap::COL_CARTON, $carton['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_CARTON, $carton, $comparison);
    }

    /**
     * Filter the query on the recordnumber column
     *
     * Example usage:
     * <code>
     * $query->filterByRecordnumber(1234); // WHERE recordnumber = 1234
     * $query->filterByRecordnumber(array(12, 34)); // WHERE recordnumber IN (12, 34)
     * $query->filterByRecordnumber(array('min' => 12)); // WHERE recordnumber > 12
     * </code>
     *
     * @param     mixed $recordnumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByRecordnumber($recordnumber = null, $comparison = null)
    {
        if (is_array($recordnumber)) {
            $useMinMax = false;
            if (isset($recordnumber['min'])) {
                $this->addUsingAlias(WhseitempackTableMap::COL_RECORDNUMBER, $recordnumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recordnumber['max'])) {
                $this->addUsingAlias(WhseitempackTableMap::COL_RECORDNUMBER, $recordnumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_RECORDNUMBER, $recordnumber, $comparison);
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
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_LOTSERIAL, $lotserial, $comparison);
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
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByLotserialref($lotserialref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserialref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_LOTSERIALREF, $lotserialref, $comparison);
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
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(WhseitempackTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(WhseitempackTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempackTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWhseitempack $whseitempack Object to remove from the list of results
     *
     * @return $this|ChildWhseitempackQuery The current query, for fluid interface
     */
    public function prune($whseitempack = null)
    {
        if ($whseitempack) {
            $this->addCond('pruneCond0', $this->getAliasedColName(WhseitempackTableMap::COL_SESSIONID), $whseitempack->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(WhseitempackTableMap::COL_ORDN), $whseitempack->getOrdn(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(WhseitempackTableMap::COL_LINENUMBER), $whseitempack->getLinenumber(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(WhseitempackTableMap::COL_CARTON), $whseitempack->getCarton(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond4', $this->getAliasedColName(WhseitempackTableMap::COL_RECORDNUMBER), $whseitempack->getRecordnumber(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3', 'pruneCond4'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the whseitempack table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitempackTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WhseitempackTableMap::clearInstancePool();
            WhseitempackTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitempackTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WhseitempackTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WhseitempackTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WhseitempackTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WhseitempackQuery
