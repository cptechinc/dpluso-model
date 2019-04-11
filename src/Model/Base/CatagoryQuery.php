<?php

namespace Base;

use \Catagory as ChildCatagory;
use \CatagoryQuery as ChildCatagoryQuery;
use \Exception;
use \PDO;
use Map\CatagoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'catagory' table.
 *
 *
 *
 * @method     ChildCatagoryQuery orderByCatid($order = Criteria::ASC) Order by the catid column
 * @method     ChildCatagoryQuery orderByCatdesc($order = Criteria::ASC) Order by the catdesc column
 * @method     ChildCatagoryQuery orderByDisplayorder($order = Criteria::ASC) Order by the displayOrder column
 * @method     ChildCatagoryQuery orderBySub($order = Criteria::ASC) Order by the sub column
 * @method     ChildCatagoryQuery orderByParent($order = Criteria::ASC) Order by the parent column
 * @method     ChildCatagoryQuery orderByCf($order = Criteria::ASC) Order by the cf column
 * @method     ChildCatagoryQuery orderByPf($order = Criteria::ASC) Order by the pf column
 * @method     ChildCatagoryQuery orderByCat1($order = Criteria::ASC) Order by the cat1 column
 * @method     ChildCatagoryQuery orderByFulcat($order = Criteria::ASC) Order by the fulcat column
 * @method     ChildCatagoryQuery orderBySdis($order = Criteria::ASC) Order by the sdis column
 * @method     ChildCatagoryQuery orderByCata($order = Criteria::ASC) Order by the cata column
 * @method     ChildCatagoryQuery orderByCatb($order = Criteria::ASC) Order by the catb column
 * @method     ChildCatagoryQuery orderByCatc($order = Criteria::ASC) Order by the catc column
 * @method     ChildCatagoryQuery orderByCatd($order = Criteria::ASC) Order by the catd column
 * @method     ChildCatagoryQuery orderByCate($order = Criteria::ASC) Order by the cate column
 * @method     ChildCatagoryQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildCatagoryQuery orderByShortdesc($order = Criteria::ASC) Order by the shortdesc column
 * @method     ChildCatagoryQuery orderByLongdesc($order = Criteria::ASC) Order by the longdesc column
 * @method     ChildCatagoryQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCatagoryQuery groupByCatid() Group by the catid column
 * @method     ChildCatagoryQuery groupByCatdesc() Group by the catdesc column
 * @method     ChildCatagoryQuery groupByDisplayorder() Group by the displayOrder column
 * @method     ChildCatagoryQuery groupBySub() Group by the sub column
 * @method     ChildCatagoryQuery groupByParent() Group by the parent column
 * @method     ChildCatagoryQuery groupByCf() Group by the cf column
 * @method     ChildCatagoryQuery groupByPf() Group by the pf column
 * @method     ChildCatagoryQuery groupByCat1() Group by the cat1 column
 * @method     ChildCatagoryQuery groupByFulcat() Group by the fulcat column
 * @method     ChildCatagoryQuery groupBySdis() Group by the sdis column
 * @method     ChildCatagoryQuery groupByCata() Group by the cata column
 * @method     ChildCatagoryQuery groupByCatb() Group by the catb column
 * @method     ChildCatagoryQuery groupByCatc() Group by the catc column
 * @method     ChildCatagoryQuery groupByCatd() Group by the catd column
 * @method     ChildCatagoryQuery groupByCate() Group by the cate column
 * @method     ChildCatagoryQuery groupByImage() Group by the image column
 * @method     ChildCatagoryQuery groupByShortdesc() Group by the shortdesc column
 * @method     ChildCatagoryQuery groupByLongdesc() Group by the longdesc column
 * @method     ChildCatagoryQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCatagoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCatagoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCatagoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCatagoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCatagoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCatagoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCatagory findOne(ConnectionInterface $con = null) Return the first ChildCatagory matching the query
 * @method     ChildCatagory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCatagory matching the query, or a new ChildCatagory object populated from the query conditions when no match is found
 *
 * @method     ChildCatagory findOneByCatid(string $catid) Return the first ChildCatagory filtered by the catid column
 * @method     ChildCatagory findOneByCatdesc(string $catdesc) Return the first ChildCatagory filtered by the catdesc column
 * @method     ChildCatagory findOneByDisplayorder(int $displayOrder) Return the first ChildCatagory filtered by the displayOrder column
 * @method     ChildCatagory findOneBySub(string $sub) Return the first ChildCatagory filtered by the sub column
 * @method     ChildCatagory findOneByParent(string $parent) Return the first ChildCatagory filtered by the parent column
 * @method     ChildCatagory findOneByCf(string $cf) Return the first ChildCatagory filtered by the cf column
 * @method     ChildCatagory findOneByPf(string $pf) Return the first ChildCatagory filtered by the pf column
 * @method     ChildCatagory findOneByCat1(string $cat1) Return the first ChildCatagory filtered by the cat1 column
 * @method     ChildCatagory findOneByFulcat(string $fulcat) Return the first ChildCatagory filtered by the fulcat column
 * @method     ChildCatagory findOneBySdis(string $sdis) Return the first ChildCatagory filtered by the sdis column
 * @method     ChildCatagory findOneByCata(string $cata) Return the first ChildCatagory filtered by the cata column
 * @method     ChildCatagory findOneByCatb(string $catb) Return the first ChildCatagory filtered by the catb column
 * @method     ChildCatagory findOneByCatc(string $catc) Return the first ChildCatagory filtered by the catc column
 * @method     ChildCatagory findOneByCatd(string $catd) Return the first ChildCatagory filtered by the catd column
 * @method     ChildCatagory findOneByCate(string $cate) Return the first ChildCatagory filtered by the cate column
 * @method     ChildCatagory findOneByImage(string $image) Return the first ChildCatagory filtered by the image column
 * @method     ChildCatagory findOneByShortdesc(string $shortdesc) Return the first ChildCatagory filtered by the shortdesc column
 * @method     ChildCatagory findOneByLongdesc(string $longdesc) Return the first ChildCatagory filtered by the longdesc column
 * @method     ChildCatagory findOneByDummy(string $dummy) Return the first ChildCatagory filtered by the dummy column *

 * @method     ChildCatagory requirePk($key, ConnectionInterface $con = null) Return the ChildCatagory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOne(ConnectionInterface $con = null) Return the first ChildCatagory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCatagory requireOneByCatid(string $catid) Return the first ChildCatagory filtered by the catid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByCatdesc(string $catdesc) Return the first ChildCatagory filtered by the catdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByDisplayorder(int $displayOrder) Return the first ChildCatagory filtered by the displayOrder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneBySub(string $sub) Return the first ChildCatagory filtered by the sub column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByParent(string $parent) Return the first ChildCatagory filtered by the parent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByCf(string $cf) Return the first ChildCatagory filtered by the cf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByPf(string $pf) Return the first ChildCatagory filtered by the pf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByCat1(string $cat1) Return the first ChildCatagory filtered by the cat1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByFulcat(string $fulcat) Return the first ChildCatagory filtered by the fulcat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneBySdis(string $sdis) Return the first ChildCatagory filtered by the sdis column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByCata(string $cata) Return the first ChildCatagory filtered by the cata column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByCatb(string $catb) Return the first ChildCatagory filtered by the catb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByCatc(string $catc) Return the first ChildCatagory filtered by the catc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByCatd(string $catd) Return the first ChildCatagory filtered by the catd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByCate(string $cate) Return the first ChildCatagory filtered by the cate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByImage(string $image) Return the first ChildCatagory filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByShortdesc(string $shortdesc) Return the first ChildCatagory filtered by the shortdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByLongdesc(string $longdesc) Return the first ChildCatagory filtered by the longdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatagory requireOneByDummy(string $dummy) Return the first ChildCatagory filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCatagory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCatagory objects based on current ModelCriteria
 * @method     ChildCatagory[]|ObjectCollection findByCatid(string $catid) Return ChildCatagory objects filtered by the catid column
 * @method     ChildCatagory[]|ObjectCollection findByCatdesc(string $catdesc) Return ChildCatagory objects filtered by the catdesc column
 * @method     ChildCatagory[]|ObjectCollection findByDisplayorder(int $displayOrder) Return ChildCatagory objects filtered by the displayOrder column
 * @method     ChildCatagory[]|ObjectCollection findBySub(string $sub) Return ChildCatagory objects filtered by the sub column
 * @method     ChildCatagory[]|ObjectCollection findByParent(string $parent) Return ChildCatagory objects filtered by the parent column
 * @method     ChildCatagory[]|ObjectCollection findByCf(string $cf) Return ChildCatagory objects filtered by the cf column
 * @method     ChildCatagory[]|ObjectCollection findByPf(string $pf) Return ChildCatagory objects filtered by the pf column
 * @method     ChildCatagory[]|ObjectCollection findByCat1(string $cat1) Return ChildCatagory objects filtered by the cat1 column
 * @method     ChildCatagory[]|ObjectCollection findByFulcat(string $fulcat) Return ChildCatagory objects filtered by the fulcat column
 * @method     ChildCatagory[]|ObjectCollection findBySdis(string $sdis) Return ChildCatagory objects filtered by the sdis column
 * @method     ChildCatagory[]|ObjectCollection findByCata(string $cata) Return ChildCatagory objects filtered by the cata column
 * @method     ChildCatagory[]|ObjectCollection findByCatb(string $catb) Return ChildCatagory objects filtered by the catb column
 * @method     ChildCatagory[]|ObjectCollection findByCatc(string $catc) Return ChildCatagory objects filtered by the catc column
 * @method     ChildCatagory[]|ObjectCollection findByCatd(string $catd) Return ChildCatagory objects filtered by the catd column
 * @method     ChildCatagory[]|ObjectCollection findByCate(string $cate) Return ChildCatagory objects filtered by the cate column
 * @method     ChildCatagory[]|ObjectCollection findByImage(string $image) Return ChildCatagory objects filtered by the image column
 * @method     ChildCatagory[]|ObjectCollection findByShortdesc(string $shortdesc) Return ChildCatagory objects filtered by the shortdesc column
 * @method     ChildCatagory[]|ObjectCollection findByLongdesc(string $longdesc) Return ChildCatagory objects filtered by the longdesc column
 * @method     ChildCatagory[]|ObjectCollection findByDummy(string $dummy) Return ChildCatagory objects filtered by the dummy column
 * @method     ChildCatagory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CatagoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CatagoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Catagory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCatagoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCatagoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCatagoryQuery) {
            return $criteria;
        }
        $query = new ChildCatagoryQuery();
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
     * @param array[$catid, $displayOrder] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCatagory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CatagoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CatagoryTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCatagory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT catid, catdesc, displayOrder, sub, parent, cf, pf, cat1, fulcat, sdis, cata, catb, catc, catd, cate, image, shortdesc, longdesc, dummy FROM catagory WHERE catid = :p0 AND displayOrder = :p1';
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
            /** @var ChildCatagory $obj */
            $obj = new ChildCatagory();
            $obj->hydrate($row);
            CatagoryTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCatagory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CatagoryTableMap::COL_CATID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CatagoryTableMap::COL_DISPLAYORDER, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CatagoryTableMap::COL_CATID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CatagoryTableMap::COL_DISPLAYORDER, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the catid column
     *
     * Example usage:
     * <code>
     * $query->filterByCatid('fooValue');   // WHERE catid = 'fooValue'
     * $query->filterByCatid('%fooValue%', Criteria::LIKE); // WHERE catid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $catid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCatid($catid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CATID, $catid, $comparison);
    }

    /**
     * Filter the query on the catdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByCatdesc('fooValue');   // WHERE catdesc = 'fooValue'
     * $query->filterByCatdesc('%fooValue%', Criteria::LIKE); // WHERE catdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $catdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCatdesc($catdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CATDESC, $catdesc, $comparison);
    }

    /**
     * Filter the query on the displayOrder column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplayorder(1234); // WHERE displayOrder = 1234
     * $query->filterByDisplayorder(array(12, 34)); // WHERE displayOrder IN (12, 34)
     * $query->filterByDisplayorder(array('min' => 12)); // WHERE displayOrder > 12
     * </code>
     *
     * @param     mixed $displayorder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByDisplayorder($displayorder = null, $comparison = null)
    {
        if (is_array($displayorder)) {
            $useMinMax = false;
            if (isset($displayorder['min'])) {
                $this->addUsingAlias(CatagoryTableMap::COL_DISPLAYORDER, $displayorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($displayorder['max'])) {
                $this->addUsingAlias(CatagoryTableMap::COL_DISPLAYORDER, $displayorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_DISPLAYORDER, $displayorder, $comparison);
    }

    /**
     * Filter the query on the sub column
     *
     * Example usage:
     * <code>
     * $query->filterBySub('fooValue');   // WHERE sub = 'fooValue'
     * $query->filterBySub('%fooValue%', Criteria::LIKE); // WHERE sub LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sub The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterBySub($sub = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sub)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_SUB, $sub, $comparison);
    }

    /**
     * Filter the query on the parent column
     *
     * Example usage:
     * <code>
     * $query->filterByParent('fooValue');   // WHERE parent = 'fooValue'
     * $query->filterByParent('%fooValue%', Criteria::LIKE); // WHERE parent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $parent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByParent($parent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($parent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_PARENT, $parent, $comparison);
    }

    /**
     * Filter the query on the cf column
     *
     * Example usage:
     * <code>
     * $query->filterByCf('fooValue');   // WHERE cf = 'fooValue'
     * $query->filterByCf('%fooValue%', Criteria::LIKE); // WHERE cf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cf The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCf($cf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CF, $cf, $comparison);
    }

    /**
     * Filter the query on the pf column
     *
     * Example usage:
     * <code>
     * $query->filterByPf('fooValue');   // WHERE pf = 'fooValue'
     * $query->filterByPf('%fooValue%', Criteria::LIKE); // WHERE pf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pf The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByPf($pf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_PF, $pf, $comparison);
    }

    /**
     * Filter the query on the cat1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCat1('fooValue');   // WHERE cat1 = 'fooValue'
     * $query->filterByCat1('%fooValue%', Criteria::LIKE); // WHERE cat1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cat1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCat1($cat1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CAT1, $cat1, $comparison);
    }

    /**
     * Filter the query on the fulcat column
     *
     * Example usage:
     * <code>
     * $query->filterByFulcat('fooValue');   // WHERE fulcat = 'fooValue'
     * $query->filterByFulcat('%fooValue%', Criteria::LIKE); // WHERE fulcat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fulcat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByFulcat($fulcat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fulcat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_FULCAT, $fulcat, $comparison);
    }

    /**
     * Filter the query on the sdis column
     *
     * Example usage:
     * <code>
     * $query->filterBySdis('fooValue');   // WHERE sdis = 'fooValue'
     * $query->filterBySdis('%fooValue%', Criteria::LIKE); // WHERE sdis LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sdis The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterBySdis($sdis = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sdis)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_SDIS, $sdis, $comparison);
    }

    /**
     * Filter the query on the cata column
     *
     * Example usage:
     * <code>
     * $query->filterByCata('fooValue');   // WHERE cata = 'fooValue'
     * $query->filterByCata('%fooValue%', Criteria::LIKE); // WHERE cata LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cata The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCata($cata = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cata)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CATA, $cata, $comparison);
    }

    /**
     * Filter the query on the catb column
     *
     * Example usage:
     * <code>
     * $query->filterByCatb('fooValue');   // WHERE catb = 'fooValue'
     * $query->filterByCatb('%fooValue%', Criteria::LIKE); // WHERE catb LIKE '%fooValue%'
     * </code>
     *
     * @param     string $catb The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCatb($catb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catb)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CATB, $catb, $comparison);
    }

    /**
     * Filter the query on the catc column
     *
     * Example usage:
     * <code>
     * $query->filterByCatc('fooValue');   // WHERE catc = 'fooValue'
     * $query->filterByCatc('%fooValue%', Criteria::LIKE); // WHERE catc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $catc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCatc($catc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CATC, $catc, $comparison);
    }

    /**
     * Filter the query on the catd column
     *
     * Example usage:
     * <code>
     * $query->filterByCatd('fooValue');   // WHERE catd = 'fooValue'
     * $query->filterByCatd('%fooValue%', Criteria::LIKE); // WHERE catd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $catd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCatd($catd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CATD, $catd, $comparison);
    }

    /**
     * Filter the query on the cate column
     *
     * Example usage:
     * <code>
     * $query->filterByCate('fooValue');   // WHERE cate = 'fooValue'
     * $query->filterByCate('%fooValue%', Criteria::LIKE); // WHERE cate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByCate($cate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_CATE, $cate, $comparison);
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
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_IMAGE, $image, $comparison);
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
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByShortdesc($shortdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_SHORTDESC, $shortdesc, $comparison);
    }

    /**
     * Filter the query on the longdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByLongdesc('fooValue');   // WHERE longdesc = 'fooValue'
     * $query->filterByLongdesc('%fooValue%', Criteria::LIKE); // WHERE longdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $longdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByLongdesc($longdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_LONGDESC, $longdesc, $comparison);
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
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatagoryTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCatagory $catagory Object to remove from the list of results
     *
     * @return $this|ChildCatagoryQuery The current query, for fluid interface
     */
    public function prune($catagory = null)
    {
        if ($catagory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CatagoryTableMap::COL_CATID), $catagory->getCatid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CatagoryTableMap::COL_DISPLAYORDER), $catagory->getDisplayorder(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the catagory table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CatagoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CatagoryTableMap::clearInstancePool();
            CatagoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CatagoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CatagoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CatagoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CatagoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CatagoryQuery
