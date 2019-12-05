<?php

namespace Base;

use \Whseitempick as ChildWhseitempick;
use \WhseitempickQuery as ChildWhseitempickQuery;
use \Exception;
use \PDO;
use Map\WhseitempickTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'whseitempick' table.
 *
 *
 *
 * @method     ChildWhseitempickQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildWhseitempickQuery orderByOrdn($order = Criteria::ASC) Order by the ordn column
 * @method     ChildWhseitempickQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildWhseitempickQuery orderBySublinenbr($order = Criteria::ASC) Order by the sublinenbr column
 * @method     ChildWhseitempickQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildWhseitempickQuery orderByRecordnumber($order = Criteria::ASC) Order by the recordnumber column
 * @method     ChildWhseitempickQuery orderByPalletnbr($order = Criteria::ASC) Order by the palletnbr column
 * @method     ChildWhseitempickQuery orderByBarcode($order = Criteria::ASC) Order by the barcode column
 * @method     ChildWhseitempickQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildWhseitempickQuery orderByLotserialref($order = Criteria::ASC) Order by the lotserialref column
 * @method     ChildWhseitempickQuery orderByBin($order = Criteria::ASC) Order by the bin column
 * @method     ChildWhseitempickQuery orderByQty($order = Criteria::ASC) Order by the qty column
 *
 * @method     ChildWhseitempickQuery groupBySessionid() Group by the sessionid column
 * @method     ChildWhseitempickQuery groupByOrdn() Group by the ordn column
 * @method     ChildWhseitempickQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildWhseitempickQuery groupBySublinenbr() Group by the sublinenbr column
 * @method     ChildWhseitempickQuery groupByItemid() Group by the itemid column
 * @method     ChildWhseitempickQuery groupByRecordnumber() Group by the recordnumber column
 * @method     ChildWhseitempickQuery groupByPalletnbr() Group by the palletnbr column
 * @method     ChildWhseitempickQuery groupByBarcode() Group by the barcode column
 * @method     ChildWhseitempickQuery groupByLotserial() Group by the lotserial column
 * @method     ChildWhseitempickQuery groupByLotserialref() Group by the lotserialref column
 * @method     ChildWhseitempickQuery groupByBin() Group by the bin column
 * @method     ChildWhseitempickQuery groupByQty() Group by the qty column
 *
 * @method     ChildWhseitempickQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWhseitempickQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWhseitempickQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWhseitempickQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWhseitempickQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWhseitempickQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWhseitempick findOne(ConnectionInterface $con = null) Return the first ChildWhseitempick matching the query
 * @method     ChildWhseitempick findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWhseitempick matching the query, or a new ChildWhseitempick object populated from the query conditions when no match is found
 *
 * @method     ChildWhseitempick findOneBySessionid(string $sessionid) Return the first ChildWhseitempick filtered by the sessionid column
 * @method     ChildWhseitempick findOneByOrdn(string $ordn) Return the first ChildWhseitempick filtered by the ordn column
 * @method     ChildWhseitempick findOneByLinenbr(int $linenbr) Return the first ChildWhseitempick filtered by the linenbr column
 * @method     ChildWhseitempick findOneBySublinenbr(int $sublinenbr) Return the first ChildWhseitempick filtered by the sublinenbr column
 * @method     ChildWhseitempick findOneByItemid(string $itemid) Return the first ChildWhseitempick filtered by the itemid column
 * @method     ChildWhseitempick findOneByRecordnumber(int $recordnumber) Return the first ChildWhseitempick filtered by the recordnumber column
 * @method     ChildWhseitempick findOneByPalletnbr(int $palletnbr) Return the first ChildWhseitempick filtered by the palletnbr column
 * @method     ChildWhseitempick findOneByBarcode(string $barcode) Return the first ChildWhseitempick filtered by the barcode column
 * @method     ChildWhseitempick findOneByLotserial(string $lotserial) Return the first ChildWhseitempick filtered by the lotserial column
 * @method     ChildWhseitempick findOneByLotserialref(string $lotserialref) Return the first ChildWhseitempick filtered by the lotserialref column
 * @method     ChildWhseitempick findOneByBin(string $bin) Return the first ChildWhseitempick filtered by the bin column
 * @method     ChildWhseitempick findOneByQty(string $qty) Return the first ChildWhseitempick filtered by the qty column *

 * @method     ChildWhseitempick requirePk($key, ConnectionInterface $con = null) Return the ChildWhseitempick by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOne(ConnectionInterface $con = null) Return the first ChildWhseitempick matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseitempick requireOneBySessionid(string $sessionid) Return the first ChildWhseitempick filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByOrdn(string $ordn) Return the first ChildWhseitempick filtered by the ordn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByLinenbr(int $linenbr) Return the first ChildWhseitempick filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneBySublinenbr(int $sublinenbr) Return the first ChildWhseitempick filtered by the sublinenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByItemid(string $itemid) Return the first ChildWhseitempick filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByRecordnumber(int $recordnumber) Return the first ChildWhseitempick filtered by the recordnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByPalletnbr(int $palletnbr) Return the first ChildWhseitempick filtered by the palletnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByBarcode(string $barcode) Return the first ChildWhseitempick filtered by the barcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByLotserial(string $lotserial) Return the first ChildWhseitempick filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByLotserialref(string $lotserialref) Return the first ChildWhseitempick filtered by the lotserialref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByBin(string $bin) Return the first ChildWhseitempick filtered by the bin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitempick requireOneByQty(string $qty) Return the first ChildWhseitempick filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseitempick[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWhseitempick objects based on current ModelCriteria
 * @method     ChildWhseitempick[]|ObjectCollection findBySessionid(string $sessionid) Return ChildWhseitempick objects filtered by the sessionid column
 * @method     ChildWhseitempick[]|ObjectCollection findByOrdn(string $ordn) Return ChildWhseitempick objects filtered by the ordn column
 * @method     ChildWhseitempick[]|ObjectCollection findByLinenbr(int $linenbr) Return ChildWhseitempick objects filtered by the linenbr column
 * @method     ChildWhseitempick[]|ObjectCollection findBySublinenbr(int $sublinenbr) Return ChildWhseitempick objects filtered by the sublinenbr column
 * @method     ChildWhseitempick[]|ObjectCollection findByItemid(string $itemid) Return ChildWhseitempick objects filtered by the itemid column
 * @method     ChildWhseitempick[]|ObjectCollection findByRecordnumber(int $recordnumber) Return ChildWhseitempick objects filtered by the recordnumber column
 * @method     ChildWhseitempick[]|ObjectCollection findByPalletnbr(int $palletnbr) Return ChildWhseitempick objects filtered by the palletnbr column
 * @method     ChildWhseitempick[]|ObjectCollection findByBarcode(string $barcode) Return ChildWhseitempick objects filtered by the barcode column
 * @method     ChildWhseitempick[]|ObjectCollection findByLotserial(string $lotserial) Return ChildWhseitempick objects filtered by the lotserial column
 * @method     ChildWhseitempick[]|ObjectCollection findByLotserialref(string $lotserialref) Return ChildWhseitempick objects filtered by the lotserialref column
 * @method     ChildWhseitempick[]|ObjectCollection findByBin(string $bin) Return ChildWhseitempick objects filtered by the bin column
 * @method     ChildWhseitempick[]|ObjectCollection findByQty(string $qty) Return ChildWhseitempick objects filtered by the qty column
 * @method     ChildWhseitempick[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WhseitempickQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WhseitempickQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Whseitempick', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWhseitempickQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWhseitempickQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWhseitempickQuery) {
            return $criteria;
        }
        $query = new ChildWhseitempickQuery();
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
     * $obj = $c->findPk(array(12, 34, 56, 78), $con);
     * </code>
     *
     * @param array[$sessionid, $ordn, $itemid, $recordnumber] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildWhseitempick|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WhseitempickTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WhseitempickTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3])]))))) {
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
     * @return ChildWhseitempick A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, ordn, linenbr, sublinenbr, itemid, recordnumber, palletnbr, barcode, lotserial, lotserialref, bin, qty FROM whseitempick WHERE sessionid = :p0 AND ordn = :p1 AND itemid = :p2 AND recordnumber = :p3';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildWhseitempick $obj */
            $obj = new ChildWhseitempick();
            $obj->hydrate($row);
            WhseitempickTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3])]));
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
     * @return ChildWhseitempick|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(WhseitempickTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(WhseitempickTableMap::COL_ORDN, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(WhseitempickTableMap::COL_ITEMID, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(WhseitempickTableMap::COL_RECORDNUMBER, $key[3], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(WhseitempickTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(WhseitempickTableMap::COL_ORDN, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(WhseitempickTableMap::COL_ITEMID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(WhseitempickTableMap::COL_RECORDNUMBER, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByOrdn($ordn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_ORDN, $ordn, $comparison);
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, $comparison = null)
    {
        if (is_array($linenbr)) {
            $useMinMax = false;
            if (isset($linenbr['min'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_LINENBR, $linenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($linenbr['max'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_LINENBR, $linenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_LINENBR, $linenbr, $comparison);
    }

    /**
     * Filter the query on the sublinenbr column
     *
     * Example usage:
     * <code>
     * $query->filterBySublinenbr(1234); // WHERE sublinenbr = 1234
     * $query->filterBySublinenbr(array(12, 34)); // WHERE sublinenbr IN (12, 34)
     * $query->filterBySublinenbr(array('min' => 12)); // WHERE sublinenbr > 12
     * </code>
     *
     * @param     mixed $sublinenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterBySublinenbr($sublinenbr = null, $comparison = null)
    {
        if (is_array($sublinenbr)) {
            $useMinMax = false;
            if (isset($sublinenbr['min'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_SUBLINENBR, $sublinenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sublinenbr['max'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_SUBLINENBR, $sublinenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_SUBLINENBR, $sublinenbr, $comparison);
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByRecordnumber($recordnumber = null, $comparison = null)
    {
        if (is_array($recordnumber)) {
            $useMinMax = false;
            if (isset($recordnumber['min'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_RECORDNUMBER, $recordnumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recordnumber['max'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_RECORDNUMBER, $recordnumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_RECORDNUMBER, $recordnumber, $comparison);
    }

    /**
     * Filter the query on the palletnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPalletnbr(1234); // WHERE palletnbr = 1234
     * $query->filterByPalletnbr(array(12, 34)); // WHERE palletnbr IN (12, 34)
     * $query->filterByPalletnbr(array('min' => 12)); // WHERE palletnbr > 12
     * </code>
     *
     * @param     mixed $palletnbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByPalletnbr($palletnbr = null, $comparison = null)
    {
        if (is_array($palletnbr)) {
            $useMinMax = false;
            if (isset($palletnbr['min'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_PALLETNBR, $palletnbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($palletnbr['max'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_PALLETNBR, $palletnbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_PALLETNBR, $palletnbr, $comparison);
    }

    /**
     * Filter the query on the barcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBarcode('fooValue');   // WHERE barcode = 'fooValue'
     * $query->filterByBarcode('%fooValue%', Criteria::LIKE); // WHERE barcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $barcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByBarcode($barcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_BARCODE, $barcode, $comparison);
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_LOTSERIAL, $lotserial, $comparison);
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByLotserialref($lotserialref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserialref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_LOTSERIALREF, $lotserialref, $comparison);
    }

    /**
     * Filter the query on the bin column
     *
     * Example usage:
     * <code>
     * $query->filterByBin('fooValue');   // WHERE bin = 'fooValue'
     * $query->filterByBin('%fooValue%', Criteria::LIKE); // WHERE bin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByBin($bin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_BIN, $bin, $comparison);
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
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(WhseitempickTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseitempickTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWhseitempick $whseitempick Object to remove from the list of results
     *
     * @return $this|ChildWhseitempickQuery The current query, for fluid interface
     */
    public function prune($whseitempick = null)
    {
        if ($whseitempick) {
            $this->addCond('pruneCond0', $this->getAliasedColName(WhseitempickTableMap::COL_SESSIONID), $whseitempick->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(WhseitempickTableMap::COL_ORDN), $whseitempick->getOrdn(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(WhseitempickTableMap::COL_ITEMID), $whseitempick->getItemid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(WhseitempickTableMap::COL_RECORDNUMBER), $whseitempick->getRecordnumber(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the whseitempick table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitempickTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WhseitempickTableMap::clearInstancePool();
            WhseitempickTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitempickTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WhseitempickTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WhseitempickTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WhseitempickTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WhseitempickQuery
