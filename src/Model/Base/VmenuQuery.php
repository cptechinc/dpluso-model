<?php

namespace Base;

use \Vmenu as ChildVmenu;
use \VmenuQuery as ChildVmenuQuery;
use \Exception;
use \PDO;
use Map\VmenuTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'vmenu' table.
 *
 *
 *
 * @method     ChildVmenuQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildVmenuQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildVmenuQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildVmenuQuery orderByCata($order = Criteria::ASC) Order by the cata column
 * @method     ChildVmenuQuery orderByCatb($order = Criteria::ASC) Order by the catb column
 * @method     ChildVmenuQuery orderByCatc($order = Criteria::ASC) Order by the catc column
 * @method     ChildVmenuQuery orderByCatd($order = Criteria::ASC) Order by the catd column
 * @method     ChildVmenuQuery orderByCate($order = Criteria::ASC) Order by the cate column
 * @method     ChildVmenuQuery orderByCatid($order = Criteria::ASC) Order by the catid column
 * @method     ChildVmenuQuery orderByDispord($order = Criteria::ASC) Order by the dispord column
 * @method     ChildVmenuQuery orderByCat1($order = Criteria::ASC) Order by the cat1 column
 * @method     ChildVmenuQuery orderByCatdesc($order = Criteria::ASC) Order by the catdesc column
 *
 * @method     ChildVmenuQuery groupBySessionid() Group by the sessionid column
 * @method     ChildVmenuQuery groupByRecno() Group by the recno column
 * @method     ChildVmenuQuery groupByDate() Group by the date column
 * @method     ChildVmenuQuery groupByCata() Group by the cata column
 * @method     ChildVmenuQuery groupByCatb() Group by the catb column
 * @method     ChildVmenuQuery groupByCatc() Group by the catc column
 * @method     ChildVmenuQuery groupByCatd() Group by the catd column
 * @method     ChildVmenuQuery groupByCate() Group by the cate column
 * @method     ChildVmenuQuery groupByCatid() Group by the catid column
 * @method     ChildVmenuQuery groupByDispord() Group by the dispord column
 * @method     ChildVmenuQuery groupByCat1() Group by the cat1 column
 * @method     ChildVmenuQuery groupByCatdesc() Group by the catdesc column
 *
 * @method     ChildVmenuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVmenuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVmenuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVmenuQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVmenuQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVmenuQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVmenu findOne(ConnectionInterface $con = null) Return the first ChildVmenu matching the query
 * @method     ChildVmenu findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVmenu matching the query, or a new ChildVmenu object populated from the query conditions when no match is found
 *
 * @method     ChildVmenu findOneBySessionid(string $sessionid) Return the first ChildVmenu filtered by the sessionid column
 * @method     ChildVmenu findOneByRecno(int $recno) Return the first ChildVmenu filtered by the recno column
 * @method     ChildVmenu findOneByDate(string $date) Return the first ChildVmenu filtered by the date column
 * @method     ChildVmenu findOneByCata(string $cata) Return the first ChildVmenu filtered by the cata column
 * @method     ChildVmenu findOneByCatb(string $catb) Return the first ChildVmenu filtered by the catb column
 * @method     ChildVmenu findOneByCatc(string $catc) Return the first ChildVmenu filtered by the catc column
 * @method     ChildVmenu findOneByCatd(string $catd) Return the first ChildVmenu filtered by the catd column
 * @method     ChildVmenu findOneByCate(string $cate) Return the first ChildVmenu filtered by the cate column
 * @method     ChildVmenu findOneByCatid(string $catid) Return the first ChildVmenu filtered by the catid column
 * @method     ChildVmenu findOneByDispord(int $dispord) Return the first ChildVmenu filtered by the dispord column
 * @method     ChildVmenu findOneByCat1(string $cat1) Return the first ChildVmenu filtered by the cat1 column
 * @method     ChildVmenu findOneByCatdesc(string $catdesc) Return the first ChildVmenu filtered by the catdesc column *

 * @method     ChildVmenu requirePk($key, ConnectionInterface $con = null) Return the ChildVmenu by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOne(ConnectionInterface $con = null) Return the first ChildVmenu matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVmenu requireOneBySessionid(string $sessionid) Return the first ChildVmenu filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByRecno(int $recno) Return the first ChildVmenu filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByDate(string $date) Return the first ChildVmenu filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByCata(string $cata) Return the first ChildVmenu filtered by the cata column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByCatb(string $catb) Return the first ChildVmenu filtered by the catb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByCatc(string $catc) Return the first ChildVmenu filtered by the catc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByCatd(string $catd) Return the first ChildVmenu filtered by the catd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByCate(string $cate) Return the first ChildVmenu filtered by the cate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByCatid(string $catid) Return the first ChildVmenu filtered by the catid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByDispord(int $dispord) Return the first ChildVmenu filtered by the dispord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByCat1(string $cat1) Return the first ChildVmenu filtered by the cat1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVmenu requireOneByCatdesc(string $catdesc) Return the first ChildVmenu filtered by the catdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVmenu[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVmenu objects based on current ModelCriteria
 * @method     ChildVmenu[]|ObjectCollection findBySessionid(string $sessionid) Return ChildVmenu objects filtered by the sessionid column
 * @method     ChildVmenu[]|ObjectCollection findByRecno(int $recno) Return ChildVmenu objects filtered by the recno column
 * @method     ChildVmenu[]|ObjectCollection findByDate(string $date) Return ChildVmenu objects filtered by the date column
 * @method     ChildVmenu[]|ObjectCollection findByCata(string $cata) Return ChildVmenu objects filtered by the cata column
 * @method     ChildVmenu[]|ObjectCollection findByCatb(string $catb) Return ChildVmenu objects filtered by the catb column
 * @method     ChildVmenu[]|ObjectCollection findByCatc(string $catc) Return ChildVmenu objects filtered by the catc column
 * @method     ChildVmenu[]|ObjectCollection findByCatd(string $catd) Return ChildVmenu objects filtered by the catd column
 * @method     ChildVmenu[]|ObjectCollection findByCate(string $cate) Return ChildVmenu objects filtered by the cate column
 * @method     ChildVmenu[]|ObjectCollection findByCatid(string $catid) Return ChildVmenu objects filtered by the catid column
 * @method     ChildVmenu[]|ObjectCollection findByDispord(int $dispord) Return ChildVmenu objects filtered by the dispord column
 * @method     ChildVmenu[]|ObjectCollection findByCat1(string $cat1) Return ChildVmenu objects filtered by the cat1 column
 * @method     ChildVmenu[]|ObjectCollection findByCatdesc(string $catdesc) Return ChildVmenu objects filtered by the catdesc column
 * @method     ChildVmenu[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VmenuQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\VmenuQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Vmenu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVmenuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVmenuQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVmenuQuery) {
            return $criteria;
        }
        $query = new ChildVmenuQuery();
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
     * @return ChildVmenu|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VmenuTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VmenuTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildVmenu A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, cata, catb, catc, catd, cate, catid, dispord, cat1, catdesc FROM vmenu WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildVmenu $obj */
            $obj = new ChildVmenu();
            $obj->hydrate($row);
            VmenuTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildVmenu|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(VmenuTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(VmenuTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(VmenuTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(VmenuTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(VmenuTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(VmenuTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByCata($cata = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cata)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_CATA, $cata, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByCatb($catb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catb)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_CATB, $catb, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByCatc($catc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_CATC, $catc, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByCatd($catd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_CATD, $catd, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByCate($cate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_CATE, $cate, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByCatid($catid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_CATID, $catid, $comparison);
    }

    /**
     * Filter the query on the dispord column
     *
     * Example usage:
     * <code>
     * $query->filterByDispord(1234); // WHERE dispord = 1234
     * $query->filterByDispord(array(12, 34)); // WHERE dispord IN (12, 34)
     * $query->filterByDispord(array('min' => 12)); // WHERE dispord > 12
     * </code>
     *
     * @param     mixed $dispord The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByDispord($dispord = null, $comparison = null)
    {
        if (is_array($dispord)) {
            $useMinMax = false;
            if (isset($dispord['min'])) {
                $this->addUsingAlias(VmenuTableMap::COL_DISPORD, $dispord['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dispord['max'])) {
                $this->addUsingAlias(VmenuTableMap::COL_DISPORD, $dispord['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_DISPORD, $dispord, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByCat1($cat1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_CAT1, $cat1, $comparison);
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
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function filterByCatdesc($catdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VmenuTableMap::COL_CATDESC, $catdesc, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVmenu $vmenu Object to remove from the list of results
     *
     * @return $this|ChildVmenuQuery The current query, for fluid interface
     */
    public function prune($vmenu = null)
    {
        if ($vmenu) {
            $this->addCond('pruneCond0', $this->getAliasedColName(VmenuTableMap::COL_SESSIONID), $vmenu->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(VmenuTableMap::COL_RECNO), $vmenu->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the vmenu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VmenuTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VmenuTableMap::clearInstancePool();
            VmenuTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(VmenuTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VmenuTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VmenuTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VmenuTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // VmenuQuery
