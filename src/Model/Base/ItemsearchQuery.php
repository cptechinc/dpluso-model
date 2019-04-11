<?php

namespace Base;

use \Itemsearch as ChildItemsearch;
use \ItemsearchQuery as ChildItemsearchQuery;
use \Exception;
use \PDO;
use Map\ItemsearchTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'itemsearch' table.
 *
 *
 *
 * @method     ChildItemsearchQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildItemsearchQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildItemsearchQuery orderByOrigintype($order = Criteria::ASC) Order by the origintype column
 * @method     ChildItemsearchQuery orderByOriginid($order = Criteria::ASC) Order by the originid column
 * @method     ChildItemsearchQuery orderByRefitemid($order = Criteria::ASC) Order by the refitemid column
 * @method     ChildItemsearchQuery orderByDesc1($order = Criteria::ASC) Order by the desc1 column
 * @method     ChildItemsearchQuery orderByDesc2($order = Criteria::ASC) Order by the desc2 column
 * @method     ChildItemsearchQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildItemsearchQuery orderByQtyPercase($order = Criteria::ASC) Order by the qty_percase column
 * @method     ChildItemsearchQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method     ChildItemsearchQuery orderByCreateTime($order = Criteria::ASC) Order by the create_time column
 * @method     ChildItemsearchQuery orderByItemstatus($order = Criteria::ASC) Order by the itemstatus column
 * @method     ChildItemsearchQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildItemsearchQuery groupByRecno() Group by the recno column
 * @method     ChildItemsearchQuery groupByItemid() Group by the itemid column
 * @method     ChildItemsearchQuery groupByOrigintype() Group by the origintype column
 * @method     ChildItemsearchQuery groupByOriginid() Group by the originid column
 * @method     ChildItemsearchQuery groupByRefitemid() Group by the refitemid column
 * @method     ChildItemsearchQuery groupByDesc1() Group by the desc1 column
 * @method     ChildItemsearchQuery groupByDesc2() Group by the desc2 column
 * @method     ChildItemsearchQuery groupByImage() Group by the image column
 * @method     ChildItemsearchQuery groupByQtyPercase() Group by the qty_percase column
 * @method     ChildItemsearchQuery groupByCreateDate() Group by the create_date column
 * @method     ChildItemsearchQuery groupByCreateTime() Group by the create_time column
 * @method     ChildItemsearchQuery groupByItemstatus() Group by the itemstatus column
 * @method     ChildItemsearchQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildItemsearchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildItemsearchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildItemsearchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildItemsearchQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildItemsearchQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildItemsearchQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildItemsearch findOne(ConnectionInterface $con = null) Return the first ChildItemsearch matching the query
 * @method     ChildItemsearch findOneOrCreate(ConnectionInterface $con = null) Return the first ChildItemsearch matching the query, or a new ChildItemsearch object populated from the query conditions when no match is found
 *
 * @method     ChildItemsearch findOneByRecno(int $recno) Return the first ChildItemsearch filtered by the recno column
 * @method     ChildItemsearch findOneByItemid(string $itemid) Return the first ChildItemsearch filtered by the itemid column
 * @method     ChildItemsearch findOneByOrigintype(string $origintype) Return the first ChildItemsearch filtered by the origintype column
 * @method     ChildItemsearch findOneByOriginid(string $originid) Return the first ChildItemsearch filtered by the originid column
 * @method     ChildItemsearch findOneByRefitemid(string $refitemid) Return the first ChildItemsearch filtered by the refitemid column
 * @method     ChildItemsearch findOneByDesc1(string $desc1) Return the first ChildItemsearch filtered by the desc1 column
 * @method     ChildItemsearch findOneByDesc2(string $desc2) Return the first ChildItemsearch filtered by the desc2 column
 * @method     ChildItemsearch findOneByImage(string $image) Return the first ChildItemsearch filtered by the image column
 * @method     ChildItemsearch findOneByQtyPercase(int $qty_percase) Return the first ChildItemsearch filtered by the qty_percase column
 * @method     ChildItemsearch findOneByCreateDate(string $create_date) Return the first ChildItemsearch filtered by the create_date column
 * @method     ChildItemsearch findOneByCreateTime(string $create_time) Return the first ChildItemsearch filtered by the create_time column
 * @method     ChildItemsearch findOneByItemstatus(string $itemstatus) Return the first ChildItemsearch filtered by the itemstatus column
 * @method     ChildItemsearch findOneByDummy(string $dummy) Return the first ChildItemsearch filtered by the dummy column *

 * @method     ChildItemsearch requirePk($key, ConnectionInterface $con = null) Return the ChildItemsearch by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOne(ConnectionInterface $con = null) Return the first ChildItemsearch matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemsearch requireOneByRecno(int $recno) Return the first ChildItemsearch filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByItemid(string $itemid) Return the first ChildItemsearch filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByOrigintype(string $origintype) Return the first ChildItemsearch filtered by the origintype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByOriginid(string $originid) Return the first ChildItemsearch filtered by the originid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByRefitemid(string $refitemid) Return the first ChildItemsearch filtered by the refitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByDesc1(string $desc1) Return the first ChildItemsearch filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByDesc2(string $desc2) Return the first ChildItemsearch filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByImage(string $image) Return the first ChildItemsearch filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByQtyPercase(int $qty_percase) Return the first ChildItemsearch filtered by the qty_percase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByCreateDate(string $create_date) Return the first ChildItemsearch filtered by the create_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByCreateTime(string $create_time) Return the first ChildItemsearch filtered by the create_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByItemstatus(string $itemstatus) Return the first ChildItemsearch filtered by the itemstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemsearch requireOneByDummy(string $dummy) Return the first ChildItemsearch filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemsearch[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildItemsearch objects based on current ModelCriteria
 * @method     ChildItemsearch[]|ObjectCollection findByRecno(int $recno) Return ChildItemsearch objects filtered by the recno column
 * @method     ChildItemsearch[]|ObjectCollection findByItemid(string $itemid) Return ChildItemsearch objects filtered by the itemid column
 * @method     ChildItemsearch[]|ObjectCollection findByOrigintype(string $origintype) Return ChildItemsearch objects filtered by the origintype column
 * @method     ChildItemsearch[]|ObjectCollection findByOriginid(string $originid) Return ChildItemsearch objects filtered by the originid column
 * @method     ChildItemsearch[]|ObjectCollection findByRefitemid(string $refitemid) Return ChildItemsearch objects filtered by the refitemid column
 * @method     ChildItemsearch[]|ObjectCollection findByDesc1(string $desc1) Return ChildItemsearch objects filtered by the desc1 column
 * @method     ChildItemsearch[]|ObjectCollection findByDesc2(string $desc2) Return ChildItemsearch objects filtered by the desc2 column
 * @method     ChildItemsearch[]|ObjectCollection findByImage(string $image) Return ChildItemsearch objects filtered by the image column
 * @method     ChildItemsearch[]|ObjectCollection findByQtyPercase(int $qty_percase) Return ChildItemsearch objects filtered by the qty_percase column
 * @method     ChildItemsearch[]|ObjectCollection findByCreateDate(string $create_date) Return ChildItemsearch objects filtered by the create_date column
 * @method     ChildItemsearch[]|ObjectCollection findByCreateTime(string $create_time) Return ChildItemsearch objects filtered by the create_time column
 * @method     ChildItemsearch[]|ObjectCollection findByItemstatus(string $itemstatus) Return ChildItemsearch objects filtered by the itemstatus column
 * @method     ChildItemsearch[]|ObjectCollection findByDummy(string $dummy) Return ChildItemsearch objects filtered by the dummy column
 * @method     ChildItemsearch[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ItemsearchQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ItemsearchQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Itemsearch', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildItemsearchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildItemsearchQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildItemsearchQuery) {
            return $criteria;
        }
        $query = new ChildItemsearchQuery();
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
     * @param array[$itemid, $origintype, $originid, $refitemid] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildItemsearch|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ItemsearchTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ItemsearchTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3])]))))) {
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
     * @return ChildItemsearch A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT recno, itemid, origintype, originid, refitemid, desc1, desc2, image, qty_percase, create_date, create_time, itemstatus, dummy FROM itemsearch WHERE itemid = :p0 AND origintype = :p1 AND originid = :p2 AND refitemid = :p3';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildItemsearch $obj */
            $obj = new ChildItemsearch();
            $obj->hydrate($row);
            ItemsearchTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3])]));
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
     * @return ChildItemsearch|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ItemsearchTableMap::COL_ITEMID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ItemsearchTableMap::COL_ORIGINTYPE, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(ItemsearchTableMap::COL_ORIGINID, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(ItemsearchTableMap::COL_REFITEMID, $key[3], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ItemsearchTableMap::COL_ITEMID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ItemsearchTableMap::COL_ORIGINTYPE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(ItemsearchTableMap::COL_ORIGINID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(ItemsearchTableMap::COL_REFITEMID, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(ItemsearchTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(ItemsearchTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the origintype column
     *
     * Example usage:
     * <code>
     * $query->filterByOrigintype('fooValue');   // WHERE origintype = 'fooValue'
     * $query->filterByOrigintype('%fooValue%', Criteria::LIKE); // WHERE origintype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $origintype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByOrigintype($origintype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($origintype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_ORIGINTYPE, $origintype, $comparison);
    }

    /**
     * Filter the query on the originid column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginid('fooValue');   // WHERE originid = 'fooValue'
     * $query->filterByOriginid('%fooValue%', Criteria::LIKE); // WHERE originid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $originid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByOriginid($originid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($originid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_ORIGINID, $originid, $comparison);
    }

    /**
     * Filter the query on the refitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByRefitemid('fooValue');   // WHERE refitemid = 'fooValue'
     * $query->filterByRefitemid('%fooValue%', Criteria::LIKE); // WHERE refitemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $refitemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByRefitemid($refitemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($refitemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_REFITEMID, $refitemid, $comparison);
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
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByDesc1($desc1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_DESC1, $desc1, $comparison);
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
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByDesc2($desc2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_DESC2, $desc2, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the qty_percase column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyPercase(1234); // WHERE qty_percase = 1234
     * $query->filterByQtyPercase(array(12, 34)); // WHERE qty_percase IN (12, 34)
     * $query->filterByQtyPercase(array('min' => 12)); // WHERE qty_percase > 12
     * </code>
     *
     * @param     mixed $qtyPercase The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByQtyPercase($qtyPercase = null, $comparison = null)
    {
        if (is_array($qtyPercase)) {
            $useMinMax = false;
            if (isset($qtyPercase['min'])) {
                $this->addUsingAlias(ItemsearchTableMap::COL_QTY_PERCASE, $qtyPercase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyPercase['max'])) {
                $this->addUsingAlias(ItemsearchTableMap::COL_QTY_PERCASE, $qtyPercase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_QTY_PERCASE, $qtyPercase, $comparison);
    }

    /**
     * Filter the query on the create_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateDate('fooValue');   // WHERE create_date = 'fooValue'
     * $query->filterByCreateDate('%fooValue%', Criteria::LIKE); // WHERE create_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createDate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createDate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the create_time column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateTime('fooValue');   // WHERE create_time = 'fooValue'
     * $query->filterByCreateTime('%fooValue%', Criteria::LIKE); // WHERE create_time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createTime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByCreateTime($createTime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createTime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_CREATE_TIME, $createTime, $comparison);
    }

    /**
     * Filter the query on the itemstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByItemstatus('fooValue');   // WHERE itemstatus = 'fooValue'
     * $query->filterByItemstatus('%fooValue%', Criteria::LIKE); // WHERE itemstatus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemstatus The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByItemstatus($itemstatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemstatus)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_ITEMSTATUS, $itemstatus, $comparison);
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
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsearchTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildItemsearch $itemsearch Object to remove from the list of results
     *
     * @return $this|ChildItemsearchQuery The current query, for fluid interface
     */
    public function prune($itemsearch = null)
    {
        if ($itemsearch) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ItemsearchTableMap::COL_ITEMID), $itemsearch->getItemid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ItemsearchTableMap::COL_ORIGINTYPE), $itemsearch->getOrigintype(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(ItemsearchTableMap::COL_ORIGINID), $itemsearch->getOriginid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(ItemsearchTableMap::COL_REFITEMID), $itemsearch->getRefitemid(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the itemsearch table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsearchTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ItemsearchTableMap::clearInstancePool();
            ItemsearchTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsearchTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ItemsearchTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ItemsearchTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ItemsearchTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ItemsearchQuery
