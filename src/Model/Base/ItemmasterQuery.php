<?php

namespace Base;

use \Itemmaster as ChildItemmaster;
use \ItemmasterQuery as ChildItemmasterQuery;
use \Exception;
use \PDO;
use Map\ItemmasterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'itemmaster' table.
 *
 *
 *
 * @method     ChildItemmasterQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildItemmasterQuery orderByName1($order = Criteria::ASC) Order by the name1 column
 * @method     ChildItemmasterQuery orderByName2($order = Criteria::ASC) Order by the name2 column
 * @method     ChildItemmasterQuery orderByShortdesc($order = Criteria::ASC) Order by the shortdesc column
 * @method     ChildItemmasterQuery orderByFamilyid($order = Criteria::ASC) Order by the familyid column
 * @method     ChildItemmasterQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildItemmasterQuery orderByCatagory($order = Criteria::ASC) Order by the catagory column
 * @method     ChildItemmasterQuery orderByTview($order = Criteria::ASC) Order by the tview column
 * @method     ChildItemmasterQuery orderByItemgroup($order = Criteria::ASC) Order by the itemgroup column
 * @method     ChildItemmasterQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildItemmasterQuery orderByInnerpackqty($order = Criteria::ASC) Order by the innerpackqty column
 * @method     ChildItemmasterQuery orderByOuterpackqty($order = Criteria::ASC) Order by the outerpackqty column
 * @method     ChildItemmasterQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildItemmasterQuery groupByItemid() Group by the itemid column
 * @method     ChildItemmasterQuery groupByName1() Group by the name1 column
 * @method     ChildItemmasterQuery groupByName2() Group by the name2 column
 * @method     ChildItemmasterQuery groupByShortdesc() Group by the shortdesc column
 * @method     ChildItemmasterQuery groupByFamilyid() Group by the familyid column
 * @method     ChildItemmasterQuery groupByImage() Group by the image column
 * @method     ChildItemmasterQuery groupByCatagory() Group by the catagory column
 * @method     ChildItemmasterQuery groupByTview() Group by the tview column
 * @method     ChildItemmasterQuery groupByItemgroup() Group by the itemgroup column
 * @method     ChildItemmasterQuery groupByItemtype() Group by the itemtype column
 * @method     ChildItemmasterQuery groupByInnerpackqty() Group by the innerpackqty column
 * @method     ChildItemmasterQuery groupByOuterpackqty() Group by the outerpackqty column
 * @method     ChildItemmasterQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildItemmasterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildItemmasterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildItemmasterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildItemmasterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildItemmasterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildItemmasterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildItemmaster findOne(ConnectionInterface $con = null) Return the first ChildItemmaster matching the query
 * @method     ChildItemmaster findOneOrCreate(ConnectionInterface $con = null) Return the first ChildItemmaster matching the query, or a new ChildItemmaster object populated from the query conditions when no match is found
 *
 * @method     ChildItemmaster findOneByItemid(string $itemid) Return the first ChildItemmaster filtered by the itemid column
 * @method     ChildItemmaster findOneByName1(string $name1) Return the first ChildItemmaster filtered by the name1 column
 * @method     ChildItemmaster findOneByName2(string $name2) Return the first ChildItemmaster filtered by the name2 column
 * @method     ChildItemmaster findOneByShortdesc(string $shortdesc) Return the first ChildItemmaster filtered by the shortdesc column
 * @method     ChildItemmaster findOneByFamilyid(string $familyid) Return the first ChildItemmaster filtered by the familyid column
 * @method     ChildItemmaster findOneByImage(string $image) Return the first ChildItemmaster filtered by the image column
 * @method     ChildItemmaster findOneByCatagory(string $catagory) Return the first ChildItemmaster filtered by the catagory column
 * @method     ChildItemmaster findOneByTview(string $tview) Return the first ChildItemmaster filtered by the tview column
 * @method     ChildItemmaster findOneByItemgroup(string $itemgroup) Return the first ChildItemmaster filtered by the itemgroup column
 * @method     ChildItemmaster findOneByItemtype(string $itemtype) Return the first ChildItemmaster filtered by the itemtype column
 * @method     ChildItemmaster findOneByInnerpackqty(string $innerpackqty) Return the first ChildItemmaster filtered by the innerpackqty column
 * @method     ChildItemmaster findOneByOuterpackqty(string $outerpackqty) Return the first ChildItemmaster filtered by the outerpackqty column
 * @method     ChildItemmaster findOneByDummy(string $dummy) Return the first ChildItemmaster filtered by the dummy column *

 * @method     ChildItemmaster requirePk($key, ConnectionInterface $con = null) Return the ChildItemmaster by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOne(ConnectionInterface $con = null) Return the first ChildItemmaster matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemmaster requireOneByItemid(string $itemid) Return the first ChildItemmaster filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByName1(string $name1) Return the first ChildItemmaster filtered by the name1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByName2(string $name2) Return the first ChildItemmaster filtered by the name2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByShortdesc(string $shortdesc) Return the first ChildItemmaster filtered by the shortdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByFamilyid(string $familyid) Return the first ChildItemmaster filtered by the familyid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByImage(string $image) Return the first ChildItemmaster filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByCatagory(string $catagory) Return the first ChildItemmaster filtered by the catagory column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByTview(string $tview) Return the first ChildItemmaster filtered by the tview column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByItemgroup(string $itemgroup) Return the first ChildItemmaster filtered by the itemgroup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByItemtype(string $itemtype) Return the first ChildItemmaster filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByInnerpackqty(string $innerpackqty) Return the first ChildItemmaster filtered by the innerpackqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByOuterpackqty(string $outerpackqty) Return the first ChildItemmaster filtered by the outerpackqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemmaster requireOneByDummy(string $dummy) Return the first ChildItemmaster filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemmaster[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildItemmaster objects based on current ModelCriteria
 * @method     ChildItemmaster[]|ObjectCollection findByItemid(string $itemid) Return ChildItemmaster objects filtered by the itemid column
 * @method     ChildItemmaster[]|ObjectCollection findByName1(string $name1) Return ChildItemmaster objects filtered by the name1 column
 * @method     ChildItemmaster[]|ObjectCollection findByName2(string $name2) Return ChildItemmaster objects filtered by the name2 column
 * @method     ChildItemmaster[]|ObjectCollection findByShortdesc(string $shortdesc) Return ChildItemmaster objects filtered by the shortdesc column
 * @method     ChildItemmaster[]|ObjectCollection findByFamilyid(string $familyid) Return ChildItemmaster objects filtered by the familyid column
 * @method     ChildItemmaster[]|ObjectCollection findByImage(string $image) Return ChildItemmaster objects filtered by the image column
 * @method     ChildItemmaster[]|ObjectCollection findByCatagory(string $catagory) Return ChildItemmaster objects filtered by the catagory column
 * @method     ChildItemmaster[]|ObjectCollection findByTview(string $tview) Return ChildItemmaster objects filtered by the tview column
 * @method     ChildItemmaster[]|ObjectCollection findByItemgroup(string $itemgroup) Return ChildItemmaster objects filtered by the itemgroup column
 * @method     ChildItemmaster[]|ObjectCollection findByItemtype(string $itemtype) Return ChildItemmaster objects filtered by the itemtype column
 * @method     ChildItemmaster[]|ObjectCollection findByInnerpackqty(string $innerpackqty) Return ChildItemmaster objects filtered by the innerpackqty column
 * @method     ChildItemmaster[]|ObjectCollection findByOuterpackqty(string $outerpackqty) Return ChildItemmaster objects filtered by the outerpackqty column
 * @method     ChildItemmaster[]|ObjectCollection findByDummy(string $dummy) Return ChildItemmaster objects filtered by the dummy column
 * @method     ChildItemmaster[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ItemmasterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ItemmasterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Itemmaster', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildItemmasterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildItemmasterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildItemmasterQuery) {
            return $criteria;
        }
        $query = new ChildItemmasterQuery();
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
     * @return ChildItemmaster|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ItemmasterTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ItemmasterTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildItemmaster A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT itemid, name1, name2, shortdesc, familyid, image, catagory, tview, itemgroup, itemtype, innerpackqty, outerpackqty, dummy FROM itemmaster WHERE itemid = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildItemmaster $obj */
            $obj = new ChildItemmaster();
            $obj->hydrate($row);
            ItemmasterTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildItemmaster|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ItemmasterTableMap::COL_ITEMID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ItemmasterTableMap::COL_ITEMID, $keys, Criteria::IN);
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
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the name1 column
     *
     * Example usage:
     * <code>
     * $query->filterByName1('fooValue');   // WHERE name1 = 'fooValue'
     * $query->filterByName1('%fooValue%', Criteria::LIKE); // WHERE name1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByName1($name1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_NAME1, $name1, $comparison);
    }

    /**
     * Filter the query on the name2 column
     *
     * Example usage:
     * <code>
     * $query->filterByName2('fooValue');   // WHERE name2 = 'fooValue'
     * $query->filterByName2('%fooValue%', Criteria::LIKE); // WHERE name2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByName2($name2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_NAME2, $name2, $comparison);
    }

    /**
     * Filter the query on the shortdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByShortdesc('fooValue');   // WHERE shortdesc = 'fooValue'
     * $query->filterByShortdesc('%fooValue%', Criteria::LIKE); // WHERE shortdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shortdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByShortdesc($shortdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_SHORTDESC, $shortdesc, $comparison);
    }

    /**
     * Filter the query on the familyid column
     *
     * Example usage:
     * <code>
     * $query->filterByFamilyid('fooValue');   // WHERE familyid = 'fooValue'
     * $query->filterByFamilyid('%fooValue%', Criteria::LIKE); // WHERE familyid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $familyid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByFamilyid($familyid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($familyid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_FAMILYID, $familyid, $comparison);
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
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the catagory column
     *
     * Example usage:
     * <code>
     * $query->filterByCatagory('fooValue');   // WHERE catagory = 'fooValue'
     * $query->filterByCatagory('%fooValue%', Criteria::LIKE); // WHERE catagory LIKE '%fooValue%'
     * </code>
     *
     * @param     string $catagory The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByCatagory($catagory = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catagory)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_CATAGORY, $catagory, $comparison);
    }

    /**
     * Filter the query on the tview column
     *
     * Example usage:
     * <code>
     * $query->filterByTview('fooValue');   // WHERE tview = 'fooValue'
     * $query->filterByTview('%fooValue%', Criteria::LIKE); // WHERE tview LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tview The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByTview($tview = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tview)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_TVIEW, $tview, $comparison);
    }

    /**
     * Filter the query on the itemgroup column
     *
     * Example usage:
     * <code>
     * $query->filterByItemgroup('fooValue');   // WHERE itemgroup = 'fooValue'
     * $query->filterByItemgroup('%fooValue%', Criteria::LIKE); // WHERE itemgroup LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemgroup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByItemgroup($itemgroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemgroup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_ITEMGROUP, $itemgroup, $comparison);
    }

    /**
     * Filter the query on the itemtype column
     *
     * Example usage:
     * <code>
     * $query->filterByItemtype('fooValue');   // WHERE itemtype = 'fooValue'
     * $query->filterByItemtype('%fooValue%', Criteria::LIKE); // WHERE itemtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByItemtype($itemtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_ITEMTYPE, $itemtype, $comparison);
    }

    /**
     * Filter the query on the innerpackqty column
     *
     * Example usage:
     * <code>
     * $query->filterByInnerpackqty('fooValue');   // WHERE innerpackqty = 'fooValue'
     * $query->filterByInnerpackqty('%fooValue%', Criteria::LIKE); // WHERE innerpackqty LIKE '%fooValue%'
     * </code>
     *
     * @param     string $innerpackqty The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByInnerpackqty($innerpackqty = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($innerpackqty)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_INNERPACKQTY, $innerpackqty, $comparison);
    }

    /**
     * Filter the query on the outerpackqty column
     *
     * Example usage:
     * <code>
     * $query->filterByOuterpackqty('fooValue');   // WHERE outerpackqty = 'fooValue'
     * $query->filterByOuterpackqty('%fooValue%', Criteria::LIKE); // WHERE outerpackqty LIKE '%fooValue%'
     * </code>
     *
     * @param     string $outerpackqty The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByOuterpackqty($outerpackqty = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($outerpackqty)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_OUTERPACKQTY, $outerpackqty, $comparison);
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
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemmasterTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildItemmaster $itemmaster Object to remove from the list of results
     *
     * @return $this|ChildItemmasterQuery The current query, for fluid interface
     */
    public function prune($itemmaster = null)
    {
        if ($itemmaster) {
            $this->addUsingAlias(ItemmasterTableMap::COL_ITEMID, $itemmaster->getItemid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the itemmaster table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemmasterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ItemmasterTableMap::clearInstancePool();
            ItemmasterTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemmasterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ItemmasterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ItemmasterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ItemmasterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ItemmasterQuery
