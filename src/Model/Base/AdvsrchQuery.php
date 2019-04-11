<?php

namespace Base;

use \Advsrch as ChildAdvsrch;
use \AdvsrchQuery as ChildAdvsrchQuery;
use \Exception;
use \PDO;
use Map\AdvsrchTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'advsrch' table.
 *
 *
 *
 * @method     ChildAdvsrchQuery orderByRecordno($order = Criteria::ASC) Order by the recordno column
 * @method     ChildAdvsrchQuery orderByCatid($order = Criteria::ASC) Order by the catid column
 * @method     ChildAdvsrchQuery orderByCat1($order = Criteria::ASC) Order by the cat1 column
 * @method     ChildAdvsrchQuery orderByCat2($order = Criteria::ASC) Order by the cat2 column
 * @method     ChildAdvsrchQuery orderByCat3($order = Criteria::ASC) Order by the cat3 column
 * @method     ChildAdvsrchQuery orderByCat4($order = Criteria::ASC) Order by the cat4 column
 * @method     ChildAdvsrchQuery orderByCat5($order = Criteria::ASC) Order by the cat5 column
 * @method     ChildAdvsrchQuery orderByOptcode($order = Criteria::ASC) Order by the optcode column
 * @method     ChildAdvsrchQuery orderByAdsrchfield($order = Criteria::ASC) Order by the adsrchfield column
 * @method     ChildAdvsrchQuery orderByOptcodedesc1($order = Criteria::ASC) Order by the optcodedesc1 column
 * @method     ChildAdvsrchQuery orderByOptcodedesc2($order = Criteria::ASC) Order by the optcodedesc2 column
 * @method     ChildAdvsrchQuery orderByAdsrchtype($order = Criteria::ASC) Order by the adsrchtype column
 * @method     ChildAdvsrchQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildAdvsrchQuery groupByRecordno() Group by the recordno column
 * @method     ChildAdvsrchQuery groupByCatid() Group by the catid column
 * @method     ChildAdvsrchQuery groupByCat1() Group by the cat1 column
 * @method     ChildAdvsrchQuery groupByCat2() Group by the cat2 column
 * @method     ChildAdvsrchQuery groupByCat3() Group by the cat3 column
 * @method     ChildAdvsrchQuery groupByCat4() Group by the cat4 column
 * @method     ChildAdvsrchQuery groupByCat5() Group by the cat5 column
 * @method     ChildAdvsrchQuery groupByOptcode() Group by the optcode column
 * @method     ChildAdvsrchQuery groupByAdsrchfield() Group by the adsrchfield column
 * @method     ChildAdvsrchQuery groupByOptcodedesc1() Group by the optcodedesc1 column
 * @method     ChildAdvsrchQuery groupByOptcodedesc2() Group by the optcodedesc2 column
 * @method     ChildAdvsrchQuery groupByAdsrchtype() Group by the adsrchtype column
 * @method     ChildAdvsrchQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildAdvsrchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdvsrchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdvsrchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdvsrchQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdvsrchQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdvsrchQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAdvsrch findOne(ConnectionInterface $con = null) Return the first ChildAdvsrch matching the query
 * @method     ChildAdvsrch findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAdvsrch matching the query, or a new ChildAdvsrch object populated from the query conditions when no match is found
 *
 * @method     ChildAdvsrch findOneByRecordno(int $recordno) Return the first ChildAdvsrch filtered by the recordno column
 * @method     ChildAdvsrch findOneByCatid(string $catid) Return the first ChildAdvsrch filtered by the catid column
 * @method     ChildAdvsrch findOneByCat1(string $cat1) Return the first ChildAdvsrch filtered by the cat1 column
 * @method     ChildAdvsrch findOneByCat2(string $cat2) Return the first ChildAdvsrch filtered by the cat2 column
 * @method     ChildAdvsrch findOneByCat3(string $cat3) Return the first ChildAdvsrch filtered by the cat3 column
 * @method     ChildAdvsrch findOneByCat4(string $cat4) Return the first ChildAdvsrch filtered by the cat4 column
 * @method     ChildAdvsrch findOneByCat5(string $cat5) Return the first ChildAdvsrch filtered by the cat5 column
 * @method     ChildAdvsrch findOneByOptcode(string $optcode) Return the first ChildAdvsrch filtered by the optcode column
 * @method     ChildAdvsrch findOneByAdsrchfield(string $adsrchfield) Return the first ChildAdvsrch filtered by the adsrchfield column
 * @method     ChildAdvsrch findOneByOptcodedesc1(string $optcodedesc1) Return the first ChildAdvsrch filtered by the optcodedesc1 column
 * @method     ChildAdvsrch findOneByOptcodedesc2(string $optcodedesc2) Return the first ChildAdvsrch filtered by the optcodedesc2 column
 * @method     ChildAdvsrch findOneByAdsrchtype(string $adsrchtype) Return the first ChildAdvsrch filtered by the adsrchtype column
 * @method     ChildAdvsrch findOneByDummy(string $dummy) Return the first ChildAdvsrch filtered by the dummy column *

 * @method     ChildAdvsrch requirePk($key, ConnectionInterface $con = null) Return the ChildAdvsrch by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOne(ConnectionInterface $con = null) Return the first ChildAdvsrch matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdvsrch requireOneByRecordno(int $recordno) Return the first ChildAdvsrch filtered by the recordno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByCatid(string $catid) Return the first ChildAdvsrch filtered by the catid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByCat1(string $cat1) Return the first ChildAdvsrch filtered by the cat1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByCat2(string $cat2) Return the first ChildAdvsrch filtered by the cat2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByCat3(string $cat3) Return the first ChildAdvsrch filtered by the cat3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByCat4(string $cat4) Return the first ChildAdvsrch filtered by the cat4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByCat5(string $cat5) Return the first ChildAdvsrch filtered by the cat5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByOptcode(string $optcode) Return the first ChildAdvsrch filtered by the optcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByAdsrchfield(string $adsrchfield) Return the first ChildAdvsrch filtered by the adsrchfield column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByOptcodedesc1(string $optcodedesc1) Return the first ChildAdvsrch filtered by the optcodedesc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByOptcodedesc2(string $optcodedesc2) Return the first ChildAdvsrch filtered by the optcodedesc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByAdsrchtype(string $adsrchtype) Return the first ChildAdvsrch filtered by the adsrchtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdvsrch requireOneByDummy(string $dummy) Return the first ChildAdvsrch filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdvsrch[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAdvsrch objects based on current ModelCriteria
 * @method     ChildAdvsrch[]|ObjectCollection findByRecordno(int $recordno) Return ChildAdvsrch objects filtered by the recordno column
 * @method     ChildAdvsrch[]|ObjectCollection findByCatid(string $catid) Return ChildAdvsrch objects filtered by the catid column
 * @method     ChildAdvsrch[]|ObjectCollection findByCat1(string $cat1) Return ChildAdvsrch objects filtered by the cat1 column
 * @method     ChildAdvsrch[]|ObjectCollection findByCat2(string $cat2) Return ChildAdvsrch objects filtered by the cat2 column
 * @method     ChildAdvsrch[]|ObjectCollection findByCat3(string $cat3) Return ChildAdvsrch objects filtered by the cat3 column
 * @method     ChildAdvsrch[]|ObjectCollection findByCat4(string $cat4) Return ChildAdvsrch objects filtered by the cat4 column
 * @method     ChildAdvsrch[]|ObjectCollection findByCat5(string $cat5) Return ChildAdvsrch objects filtered by the cat5 column
 * @method     ChildAdvsrch[]|ObjectCollection findByOptcode(string $optcode) Return ChildAdvsrch objects filtered by the optcode column
 * @method     ChildAdvsrch[]|ObjectCollection findByAdsrchfield(string $adsrchfield) Return ChildAdvsrch objects filtered by the adsrchfield column
 * @method     ChildAdvsrch[]|ObjectCollection findByOptcodedesc1(string $optcodedesc1) Return ChildAdvsrch objects filtered by the optcodedesc1 column
 * @method     ChildAdvsrch[]|ObjectCollection findByOptcodedesc2(string $optcodedesc2) Return ChildAdvsrch objects filtered by the optcodedesc2 column
 * @method     ChildAdvsrch[]|ObjectCollection findByAdsrchtype(string $adsrchtype) Return ChildAdvsrch objects filtered by the adsrchtype column
 * @method     ChildAdvsrch[]|ObjectCollection findByDummy(string $dummy) Return ChildAdvsrch objects filtered by the dummy column
 * @method     ChildAdvsrch[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AdvsrchQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AdvsrchQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Advsrch', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdvsrchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdvsrchQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAdvsrchQuery) {
            return $criteria;
        }
        $query = new ChildAdvsrchQuery();
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
     * @param array[$recordno, $catid, $cat1, $cat2, $cat3, $cat4, $cat5, $optcode, $adsrchfield] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAdvsrch|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdvsrchTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdvsrchTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4]), (null === $key[5] || is_scalar($key[5]) || is_callable([$key[5], '__toString']) ? (string) $key[5] : $key[5]), (null === $key[6] || is_scalar($key[6]) || is_callable([$key[6], '__toString']) ? (string) $key[6] : $key[6]), (null === $key[7] || is_scalar($key[7]) || is_callable([$key[7], '__toString']) ? (string) $key[7] : $key[7]), (null === $key[8] || is_scalar($key[8]) || is_callable([$key[8], '__toString']) ? (string) $key[8] : $key[8])]))))) {
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
     * @return ChildAdvsrch A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT recordno, catid, cat1, cat2, cat3, cat4, cat5, optcode, adsrchfield, optcodedesc1, optcodedesc2, adsrchtype, dummy FROM advsrch WHERE recordno = :p0 AND catid = :p1 AND cat1 = :p2 AND cat2 = :p3 AND cat3 = :p4 AND cat4 = :p5 AND cat5 = :p6 AND optcode = :p7 AND adsrchfield = :p8';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_STR);
            $stmt->bindValue(':p4', $key[4], PDO::PARAM_STR);
            $stmt->bindValue(':p5', $key[5], PDO::PARAM_STR);
            $stmt->bindValue(':p6', $key[6], PDO::PARAM_STR);
            $stmt->bindValue(':p7', $key[7], PDO::PARAM_STR);
            $stmt->bindValue(':p8', $key[8], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAdvsrch $obj */
            $obj = new ChildAdvsrch();
            $obj->hydrate($row);
            AdvsrchTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4]), (null === $key[5] || is_scalar($key[5]) || is_callable([$key[5], '__toString']) ? (string) $key[5] : $key[5]), (null === $key[6] || is_scalar($key[6]) || is_callable([$key[6], '__toString']) ? (string) $key[6] : $key[6]), (null === $key[7] || is_scalar($key[7]) || is_callable([$key[7], '__toString']) ? (string) $key[7] : $key[7]), (null === $key[8] || is_scalar($key[8]) || is_callable([$key[8], '__toString']) ? (string) $key[8] : $key[8])]));
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
     * @return ChildAdvsrch|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AdvsrchTableMap::COL_RECORDNO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AdvsrchTableMap::COL_CATID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(AdvsrchTableMap::COL_CAT1, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(AdvsrchTableMap::COL_CAT2, $key[3], Criteria::EQUAL);
        $this->addUsingAlias(AdvsrchTableMap::COL_CAT3, $key[4], Criteria::EQUAL);
        $this->addUsingAlias(AdvsrchTableMap::COL_CAT4, $key[5], Criteria::EQUAL);
        $this->addUsingAlias(AdvsrchTableMap::COL_CAT5, $key[6], Criteria::EQUAL);
        $this->addUsingAlias(AdvsrchTableMap::COL_OPTCODE, $key[7], Criteria::EQUAL);
        $this->addUsingAlias(AdvsrchTableMap::COL_ADSRCHFIELD, $key[8], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AdvsrchTableMap::COL_RECORDNO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AdvsrchTableMap::COL_CATID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(AdvsrchTableMap::COL_CAT1, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(AdvsrchTableMap::COL_CAT2, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $cton4 = $this->getNewCriterion(AdvsrchTableMap::COL_CAT3, $key[4], Criteria::EQUAL);
            $cton0->addAnd($cton4);
            $cton5 = $this->getNewCriterion(AdvsrchTableMap::COL_CAT4, $key[5], Criteria::EQUAL);
            $cton0->addAnd($cton5);
            $cton6 = $this->getNewCriterion(AdvsrchTableMap::COL_CAT5, $key[6], Criteria::EQUAL);
            $cton0->addAnd($cton6);
            $cton7 = $this->getNewCriterion(AdvsrchTableMap::COL_OPTCODE, $key[7], Criteria::EQUAL);
            $cton0->addAnd($cton7);
            $cton8 = $this->getNewCriterion(AdvsrchTableMap::COL_ADSRCHFIELD, $key[8], Criteria::EQUAL);
            $cton0->addAnd($cton8);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByRecordno($recordno = null, $comparison = null)
    {
        if (is_array($recordno)) {
            $useMinMax = false;
            if (isset($recordno['min'])) {
                $this->addUsingAlias(AdvsrchTableMap::COL_RECORDNO, $recordno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recordno['max'])) {
                $this->addUsingAlias(AdvsrchTableMap::COL_RECORDNO, $recordno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_RECORDNO, $recordno, $comparison);
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
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByCatid($catid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_CATID, $catid, $comparison);
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
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByCat1($cat1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_CAT1, $cat1, $comparison);
    }

    /**
     * Filter the query on the cat2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCat2('fooValue');   // WHERE cat2 = 'fooValue'
     * $query->filterByCat2('%fooValue%', Criteria::LIKE); // WHERE cat2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cat2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByCat2($cat2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_CAT2, $cat2, $comparison);
    }

    /**
     * Filter the query on the cat3 column
     *
     * Example usage:
     * <code>
     * $query->filterByCat3('fooValue');   // WHERE cat3 = 'fooValue'
     * $query->filterByCat3('%fooValue%', Criteria::LIKE); // WHERE cat3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cat3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByCat3($cat3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_CAT3, $cat3, $comparison);
    }

    /**
     * Filter the query on the cat4 column
     *
     * Example usage:
     * <code>
     * $query->filterByCat4('fooValue');   // WHERE cat4 = 'fooValue'
     * $query->filterByCat4('%fooValue%', Criteria::LIKE); // WHERE cat4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cat4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByCat4($cat4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_CAT4, $cat4, $comparison);
    }

    /**
     * Filter the query on the cat5 column
     *
     * Example usage:
     * <code>
     * $query->filterByCat5('fooValue');   // WHERE cat5 = 'fooValue'
     * $query->filterByCat5('%fooValue%', Criteria::LIKE); // WHERE cat5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cat5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByCat5($cat5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_CAT5, $cat5, $comparison);
    }

    /**
     * Filter the query on the optcode column
     *
     * Example usage:
     * <code>
     * $query->filterByOptcode('fooValue');   // WHERE optcode = 'fooValue'
     * $query->filterByOptcode('%fooValue%', Criteria::LIKE); // WHERE optcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByOptcode($optcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_OPTCODE, $optcode, $comparison);
    }

    /**
     * Filter the query on the adsrchfield column
     *
     * Example usage:
     * <code>
     * $query->filterByAdsrchfield('fooValue');   // WHERE adsrchfield = 'fooValue'
     * $query->filterByAdsrchfield('%fooValue%', Criteria::LIKE); // WHERE adsrchfield LIKE '%fooValue%'
     * </code>
     *
     * @param     string $adsrchfield The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByAdsrchfield($adsrchfield = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($adsrchfield)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_ADSRCHFIELD, $adsrchfield, $comparison);
    }

    /**
     * Filter the query on the optcodedesc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptcodedesc1('fooValue');   // WHERE optcodedesc1 = 'fooValue'
     * $query->filterByOptcodedesc1('%fooValue%', Criteria::LIKE); // WHERE optcodedesc1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optcodedesc1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByOptcodedesc1($optcodedesc1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optcodedesc1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_OPTCODEDESC1, $optcodedesc1, $comparison);
    }

    /**
     * Filter the query on the optcodedesc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptcodedesc2('fooValue');   // WHERE optcodedesc2 = 'fooValue'
     * $query->filterByOptcodedesc2('%fooValue%', Criteria::LIKE); // WHERE optcodedesc2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optcodedesc2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByOptcodedesc2($optcodedesc2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optcodedesc2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_OPTCODEDESC2, $optcodedesc2, $comparison);
    }

    /**
     * Filter the query on the adsrchtype column
     *
     * Example usage:
     * <code>
     * $query->filterByAdsrchtype('fooValue');   // WHERE adsrchtype = 'fooValue'
     * $query->filterByAdsrchtype('%fooValue%', Criteria::LIKE); // WHERE adsrchtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $adsrchtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByAdsrchtype($adsrchtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($adsrchtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_ADSRCHTYPE, $adsrchtype, $comparison);
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
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdvsrchTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAdvsrch $advsrch Object to remove from the list of results
     *
     * @return $this|ChildAdvsrchQuery The current query, for fluid interface
     */
    public function prune($advsrch = null)
    {
        if ($advsrch) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AdvsrchTableMap::COL_RECORDNO), $advsrch->getRecordno(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AdvsrchTableMap::COL_CATID), $advsrch->getCatid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(AdvsrchTableMap::COL_CAT1), $advsrch->getCat1(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(AdvsrchTableMap::COL_CAT2), $advsrch->getCat2(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond4', $this->getAliasedColName(AdvsrchTableMap::COL_CAT3), $advsrch->getCat3(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond5', $this->getAliasedColName(AdvsrchTableMap::COL_CAT4), $advsrch->getCat4(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond6', $this->getAliasedColName(AdvsrchTableMap::COL_CAT5), $advsrch->getCat5(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond7', $this->getAliasedColName(AdvsrchTableMap::COL_OPTCODE), $advsrch->getOptcode(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond8', $this->getAliasedColName(AdvsrchTableMap::COL_ADSRCHFIELD), $advsrch->getAdsrchfield(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3', 'pruneCond4', 'pruneCond5', 'pruneCond6', 'pruneCond7', 'pruneCond8'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the advsrch table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdvsrchTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdvsrchTableMap::clearInstancePool();
            AdvsrchTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AdvsrchTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdvsrchTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdvsrchTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdvsrchTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AdvsrchQuery
