<?php

namespace Base;

use \Family as ChildFamily;
use \FamilyQuery as ChildFamilyQuery;
use \Exception;
use \PDO;
use Map\FamilyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'family' table.
 *
 *
 *
 * @method     ChildFamilyQuery orderByFamid($order = Criteria::ASC) Order by the famID column
 * @method     ChildFamilyQuery orderByName1($order = Criteria::ASC) Order by the name1 column
 * @method     ChildFamilyQuery orderByName2($order = Criteria::ASC) Order by the name2 column
 * @method     ChildFamilyQuery orderByName3($order = Criteria::ASC) Order by the name3 column
 * @method     ChildFamilyQuery orderByLongdesc($order = Criteria::ASC) Order by the longdesc column
 * @method     ChildFamilyQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildFamilyQuery orderBySpeca($order = Criteria::ASC) Order by the speca column
 * @method     ChildFamilyQuery orderBySpecb($order = Criteria::ASC) Order by the specb column
 * @method     ChildFamilyQuery orderBySpecc($order = Criteria::ASC) Order by the specc column
 * @method     ChildFamilyQuery orderBySpecd($order = Criteria::ASC) Order by the specd column
 * @method     ChildFamilyQuery orderBySpece($order = Criteria::ASC) Order by the spece column
 * @method     ChildFamilyQuery orderBySpecf($order = Criteria::ASC) Order by the specf column
 * @method     ChildFamilyQuery orderBySpecg($order = Criteria::ASC) Order by the specg column
 * @method     ChildFamilyQuery orderBySpech($order = Criteria::ASC) Order by the spech column
 * @method     ChildFamilyQuery orderByShortdesc($order = Criteria::ASC) Order by the shortdesc column
 * @method     ChildFamilyQuery orderByCatid($order = Criteria::ASC) Order by the catid column
 * @method     ChildFamilyQuery orderByTview($order = Criteria::ASC) Order by the tview column
 * @method     ChildFamilyQuery orderByFtype($order = Criteria::ASC) Order by the ftype column
 * @method     ChildFamilyQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildFamilyQuery groupByFamid() Group by the famID column
 * @method     ChildFamilyQuery groupByName1() Group by the name1 column
 * @method     ChildFamilyQuery groupByName2() Group by the name2 column
 * @method     ChildFamilyQuery groupByName3() Group by the name3 column
 * @method     ChildFamilyQuery groupByLongdesc() Group by the longdesc column
 * @method     ChildFamilyQuery groupByImage() Group by the image column
 * @method     ChildFamilyQuery groupBySpeca() Group by the speca column
 * @method     ChildFamilyQuery groupBySpecb() Group by the specb column
 * @method     ChildFamilyQuery groupBySpecc() Group by the specc column
 * @method     ChildFamilyQuery groupBySpecd() Group by the specd column
 * @method     ChildFamilyQuery groupBySpece() Group by the spece column
 * @method     ChildFamilyQuery groupBySpecf() Group by the specf column
 * @method     ChildFamilyQuery groupBySpecg() Group by the specg column
 * @method     ChildFamilyQuery groupBySpech() Group by the spech column
 * @method     ChildFamilyQuery groupByShortdesc() Group by the shortdesc column
 * @method     ChildFamilyQuery groupByCatid() Group by the catid column
 * @method     ChildFamilyQuery groupByTview() Group by the tview column
 * @method     ChildFamilyQuery groupByFtype() Group by the ftype column
 * @method     ChildFamilyQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildFamilyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFamilyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFamilyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFamilyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFamilyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFamilyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFamily findOne(ConnectionInterface $con = null) Return the first ChildFamily matching the query
 * @method     ChildFamily findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFamily matching the query, or a new ChildFamily object populated from the query conditions when no match is found
 *
 * @method     ChildFamily findOneByFamid(string $famID) Return the first ChildFamily filtered by the famID column
 * @method     ChildFamily findOneByName1(string $name1) Return the first ChildFamily filtered by the name1 column
 * @method     ChildFamily findOneByName2(string $name2) Return the first ChildFamily filtered by the name2 column
 * @method     ChildFamily findOneByName3(string $name3) Return the first ChildFamily filtered by the name3 column
 * @method     ChildFamily findOneByLongdesc(string $longdesc) Return the first ChildFamily filtered by the longdesc column
 * @method     ChildFamily findOneByImage(string $image) Return the first ChildFamily filtered by the image column
 * @method     ChildFamily findOneBySpeca(string $speca) Return the first ChildFamily filtered by the speca column
 * @method     ChildFamily findOneBySpecb(string $specb) Return the first ChildFamily filtered by the specb column
 * @method     ChildFamily findOneBySpecc(string $specc) Return the first ChildFamily filtered by the specc column
 * @method     ChildFamily findOneBySpecd(string $specd) Return the first ChildFamily filtered by the specd column
 * @method     ChildFamily findOneBySpece(string $spece) Return the first ChildFamily filtered by the spece column
 * @method     ChildFamily findOneBySpecf(string $specf) Return the first ChildFamily filtered by the specf column
 * @method     ChildFamily findOneBySpecg(string $specg) Return the first ChildFamily filtered by the specg column
 * @method     ChildFamily findOneBySpech(string $spech) Return the first ChildFamily filtered by the spech column
 * @method     ChildFamily findOneByShortdesc(string $shortdesc) Return the first ChildFamily filtered by the shortdesc column
 * @method     ChildFamily findOneByCatid(string $catid) Return the first ChildFamily filtered by the catid column
 * @method     ChildFamily findOneByTview(string $tview) Return the first ChildFamily filtered by the tview column
 * @method     ChildFamily findOneByFtype(string $ftype) Return the first ChildFamily filtered by the ftype column
 * @method     ChildFamily findOneByDummy(string $dummy) Return the first ChildFamily filtered by the dummy column *

 * @method     ChildFamily requirePk($key, ConnectionInterface $con = null) Return the ChildFamily by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOne(ConnectionInterface $con = null) Return the first ChildFamily matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFamily requireOneByFamid(string $famID) Return the first ChildFamily filtered by the famID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByName1(string $name1) Return the first ChildFamily filtered by the name1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByName2(string $name2) Return the first ChildFamily filtered by the name2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByName3(string $name3) Return the first ChildFamily filtered by the name3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByLongdesc(string $longdesc) Return the first ChildFamily filtered by the longdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByImage(string $image) Return the first ChildFamily filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneBySpeca(string $speca) Return the first ChildFamily filtered by the speca column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneBySpecb(string $specb) Return the first ChildFamily filtered by the specb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneBySpecc(string $specc) Return the first ChildFamily filtered by the specc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneBySpecd(string $specd) Return the first ChildFamily filtered by the specd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneBySpece(string $spece) Return the first ChildFamily filtered by the spece column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneBySpecf(string $specf) Return the first ChildFamily filtered by the specf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneBySpecg(string $specg) Return the first ChildFamily filtered by the specg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneBySpech(string $spech) Return the first ChildFamily filtered by the spech column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByShortdesc(string $shortdesc) Return the first ChildFamily filtered by the shortdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByCatid(string $catid) Return the first ChildFamily filtered by the catid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByTview(string $tview) Return the first ChildFamily filtered by the tview column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByFtype(string $ftype) Return the first ChildFamily filtered by the ftype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamily requireOneByDummy(string $dummy) Return the first ChildFamily filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFamily[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFamily objects based on current ModelCriteria
 * @method     ChildFamily[]|ObjectCollection findByFamid(string $famID) Return ChildFamily objects filtered by the famID column
 * @method     ChildFamily[]|ObjectCollection findByName1(string $name1) Return ChildFamily objects filtered by the name1 column
 * @method     ChildFamily[]|ObjectCollection findByName2(string $name2) Return ChildFamily objects filtered by the name2 column
 * @method     ChildFamily[]|ObjectCollection findByName3(string $name3) Return ChildFamily objects filtered by the name3 column
 * @method     ChildFamily[]|ObjectCollection findByLongdesc(string $longdesc) Return ChildFamily objects filtered by the longdesc column
 * @method     ChildFamily[]|ObjectCollection findByImage(string $image) Return ChildFamily objects filtered by the image column
 * @method     ChildFamily[]|ObjectCollection findBySpeca(string $speca) Return ChildFamily objects filtered by the speca column
 * @method     ChildFamily[]|ObjectCollection findBySpecb(string $specb) Return ChildFamily objects filtered by the specb column
 * @method     ChildFamily[]|ObjectCollection findBySpecc(string $specc) Return ChildFamily objects filtered by the specc column
 * @method     ChildFamily[]|ObjectCollection findBySpecd(string $specd) Return ChildFamily objects filtered by the specd column
 * @method     ChildFamily[]|ObjectCollection findBySpece(string $spece) Return ChildFamily objects filtered by the spece column
 * @method     ChildFamily[]|ObjectCollection findBySpecf(string $specf) Return ChildFamily objects filtered by the specf column
 * @method     ChildFamily[]|ObjectCollection findBySpecg(string $specg) Return ChildFamily objects filtered by the specg column
 * @method     ChildFamily[]|ObjectCollection findBySpech(string $spech) Return ChildFamily objects filtered by the spech column
 * @method     ChildFamily[]|ObjectCollection findByShortdesc(string $shortdesc) Return ChildFamily objects filtered by the shortdesc column
 * @method     ChildFamily[]|ObjectCollection findByCatid(string $catid) Return ChildFamily objects filtered by the catid column
 * @method     ChildFamily[]|ObjectCollection findByTview(string $tview) Return ChildFamily objects filtered by the tview column
 * @method     ChildFamily[]|ObjectCollection findByFtype(string $ftype) Return ChildFamily objects filtered by the ftype column
 * @method     ChildFamily[]|ObjectCollection findByDummy(string $dummy) Return ChildFamily objects filtered by the dummy column
 * @method     ChildFamily[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FamilyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FamilyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Family', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFamilyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFamilyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFamilyQuery) {
            return $criteria;
        }
        $query = new ChildFamilyQuery();
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
     * @return ChildFamily|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FamilyTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FamilyTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFamily A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT famID, name1, name2, name3, longdesc, image, speca, specb, specc, specd, spece, specf, specg, spech, shortdesc, catid, tview, ftype, dummy FROM family WHERE famID = :p0';
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
            /** @var ChildFamily $obj */
            $obj = new ChildFamily();
            $obj->hydrate($row);
            FamilyTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFamily|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FamilyTableMap::COL_FAMID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FamilyTableMap::COL_FAMID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the famID column
     *
     * Example usage:
     * <code>
     * $query->filterByFamid('fooValue');   // WHERE famID = 'fooValue'
     * $query->filterByFamid('%fooValue%', Criteria::LIKE); // WHERE famID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $famid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByFamid($famid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($famid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_FAMID, $famid, $comparison);
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByName1($name1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_NAME1, $name1, $comparison);
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByName2($name2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_NAME2, $name2, $comparison);
    }

    /**
     * Filter the query on the name3 column
     *
     * Example usage:
     * <code>
     * $query->filterByName3('fooValue');   // WHERE name3 = 'fooValue'
     * $query->filterByName3('%fooValue%', Criteria::LIKE); // WHERE name3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByName3($name3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_NAME3, $name3, $comparison);
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByLongdesc($longdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_LONGDESC, $longdesc, $comparison);
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the speca column
     *
     * Example usage:
     * <code>
     * $query->filterBySpeca('fooValue');   // WHERE speca = 'fooValue'
     * $query->filterBySpeca('%fooValue%', Criteria::LIKE); // WHERE speca LIKE '%fooValue%'
     * </code>
     *
     * @param     string $speca The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterBySpeca($speca = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($speca)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SPECA, $speca, $comparison);
    }

    /**
     * Filter the query on the specb column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecb('fooValue');   // WHERE specb = 'fooValue'
     * $query->filterBySpecb('%fooValue%', Criteria::LIKE); // WHERE specb LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specb The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterBySpecb($specb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specb)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SPECB, $specb, $comparison);
    }

    /**
     * Filter the query on the specc column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecc('fooValue');   // WHERE specc = 'fooValue'
     * $query->filterBySpecc('%fooValue%', Criteria::LIKE); // WHERE specc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterBySpecc($specc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SPECC, $specc, $comparison);
    }

    /**
     * Filter the query on the specd column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecd('fooValue');   // WHERE specd = 'fooValue'
     * $query->filterBySpecd('%fooValue%', Criteria::LIKE); // WHERE specd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterBySpecd($specd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SPECD, $specd, $comparison);
    }

    /**
     * Filter the query on the spece column
     *
     * Example usage:
     * <code>
     * $query->filterBySpece('fooValue');   // WHERE spece = 'fooValue'
     * $query->filterBySpece('%fooValue%', Criteria::LIKE); // WHERE spece LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spece The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterBySpece($spece = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spece)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SPECE, $spece, $comparison);
    }

    /**
     * Filter the query on the specf column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecf('fooValue');   // WHERE specf = 'fooValue'
     * $query->filterBySpecf('%fooValue%', Criteria::LIKE); // WHERE specf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specf The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterBySpecf($specf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SPECF, $specf, $comparison);
    }

    /**
     * Filter the query on the specg column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecg('fooValue');   // WHERE specg = 'fooValue'
     * $query->filterBySpecg('%fooValue%', Criteria::LIKE); // WHERE specg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterBySpecg($specg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SPECG, $specg, $comparison);
    }

    /**
     * Filter the query on the spech column
     *
     * Example usage:
     * <code>
     * $query->filterBySpech('fooValue');   // WHERE spech = 'fooValue'
     * $query->filterBySpech('%fooValue%', Criteria::LIKE); // WHERE spech LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spech The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterBySpech($spech = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spech)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SPECH, $spech, $comparison);
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByShortdesc($shortdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_SHORTDESC, $shortdesc, $comparison);
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByCatid($catid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_CATID, $catid, $comparison);
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByTview($tview = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tview)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_TVIEW, $tview, $comparison);
    }

    /**
     * Filter the query on the ftype column
     *
     * Example usage:
     * <code>
     * $query->filterByFtype('fooValue');   // WHERE ftype = 'fooValue'
     * $query->filterByFtype('%fooValue%', Criteria::LIKE); // WHERE ftype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ftype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByFtype($ftype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ftype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_FTYPE, $ftype, $comparison);
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
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilyTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFamily $family Object to remove from the list of results
     *
     * @return $this|ChildFamilyQuery The current query, for fluid interface
     */
    public function prune($family = null)
    {
        if ($family) {
            $this->addUsingAlias(FamilyTableMap::COL_FAMID, $family->getFamid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the family table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FamilyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FamilyTableMap::clearInstancePool();
            FamilyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FamilyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FamilyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FamilyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FamilyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FamilyQuery
