<?php

namespace Base;

use \Vendors as ChildVendors;
use \VendorsQuery as ChildVendorsQuery;
use \Exception;
use \PDO;
use Map\VendorsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'vendors' table.
 *
 *
 *
 * @method     ChildVendorsQuery orderByVendid($order = Criteria::ASC) Order by the vendid column
 * @method     ChildVendorsQuery orderByShipfrom($order = Criteria::ASC) Order by the shipfrom column
 * @method     ChildVendorsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildVendorsQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method     ChildVendorsQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method     ChildVendorsQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method     ChildVendorsQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildVendorsQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     ChildVendorsQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildVendorsQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method     ChildVendorsQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildVendorsQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildVendorsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildVendorsQuery orderByCreatetime($order = Criteria::ASC) Order by the createtime column
 * @method     ChildVendorsQuery orderByCreatedate($order = Criteria::ASC) Order by the createdate column
 *
 * @method     ChildVendorsQuery groupByVendid() Group by the vendid column
 * @method     ChildVendorsQuery groupByShipfrom() Group by the shipfrom column
 * @method     ChildVendorsQuery groupByName() Group by the name column
 * @method     ChildVendorsQuery groupByAddress1() Group by the address1 column
 * @method     ChildVendorsQuery groupByAddress2() Group by the address2 column
 * @method     ChildVendorsQuery groupByAddress3() Group by the address3 column
 * @method     ChildVendorsQuery groupByCity() Group by the city column
 * @method     ChildVendorsQuery groupByState() Group by the state column
 * @method     ChildVendorsQuery groupByZip() Group by the zip column
 * @method     ChildVendorsQuery groupByCountry() Group by the country column
 * @method     ChildVendorsQuery groupByPhone() Group by the phone column
 * @method     ChildVendorsQuery groupByFax() Group by the fax column
 * @method     ChildVendorsQuery groupByEmail() Group by the email column
 * @method     ChildVendorsQuery groupByCreatetime() Group by the createtime column
 * @method     ChildVendorsQuery groupByCreatedate() Group by the createdate column
 *
 * @method     ChildVendorsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVendorsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVendorsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVendorsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVendorsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVendorsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVendors findOne(ConnectionInterface $con = null) Return the first ChildVendors matching the query
 * @method     ChildVendors findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVendors matching the query, or a new ChildVendors object populated from the query conditions when no match is found
 *
 * @method     ChildVendors findOneByVendid(string $vendid) Return the first ChildVendors filtered by the vendid column
 * @method     ChildVendors findOneByShipfrom(string $shipfrom) Return the first ChildVendors filtered by the shipfrom column
 * @method     ChildVendors findOneByName(string $name) Return the first ChildVendors filtered by the name column
 * @method     ChildVendors findOneByAddress1(string $address1) Return the first ChildVendors filtered by the address1 column
 * @method     ChildVendors findOneByAddress2(string $address2) Return the first ChildVendors filtered by the address2 column
 * @method     ChildVendors findOneByAddress3(string $address3) Return the first ChildVendors filtered by the address3 column
 * @method     ChildVendors findOneByCity(string $city) Return the first ChildVendors filtered by the city column
 * @method     ChildVendors findOneByState(string $state) Return the first ChildVendors filtered by the state column
 * @method     ChildVendors findOneByZip(string $zip) Return the first ChildVendors filtered by the zip column
 * @method     ChildVendors findOneByCountry(string $country) Return the first ChildVendors filtered by the country column
 * @method     ChildVendors findOneByPhone(string $phone) Return the first ChildVendors filtered by the phone column
 * @method     ChildVendors findOneByFax(string $fax) Return the first ChildVendors filtered by the fax column
 * @method     ChildVendors findOneByEmail(string $email) Return the first ChildVendors filtered by the email column
 * @method     ChildVendors findOneByCreatetime(int $createtime) Return the first ChildVendors filtered by the createtime column
 * @method     ChildVendors findOneByCreatedate(int $createdate) Return the first ChildVendors filtered by the createdate column *

 * @method     ChildVendors requirePk($key, ConnectionInterface $con = null) Return the ChildVendors by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOne(ConnectionInterface $con = null) Return the first ChildVendors matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVendors requireOneByVendid(string $vendid) Return the first ChildVendors filtered by the vendid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByShipfrom(string $shipfrom) Return the first ChildVendors filtered by the shipfrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByName(string $name) Return the first ChildVendors filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByAddress1(string $address1) Return the first ChildVendors filtered by the address1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByAddress2(string $address2) Return the first ChildVendors filtered by the address2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByAddress3(string $address3) Return the first ChildVendors filtered by the address3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByCity(string $city) Return the first ChildVendors filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByState(string $state) Return the first ChildVendors filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByZip(string $zip) Return the first ChildVendors filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByCountry(string $country) Return the first ChildVendors filtered by the country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByPhone(string $phone) Return the first ChildVendors filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByFax(string $fax) Return the first ChildVendors filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByEmail(string $email) Return the first ChildVendors filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByCreatetime(int $createtime) Return the first ChildVendors filtered by the createtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVendors requireOneByCreatedate(int $createdate) Return the first ChildVendors filtered by the createdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVendors[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVendors objects based on current ModelCriteria
 * @method     ChildVendors[]|ObjectCollection findByVendid(string $vendid) Return ChildVendors objects filtered by the vendid column
 * @method     ChildVendors[]|ObjectCollection findByShipfrom(string $shipfrom) Return ChildVendors objects filtered by the shipfrom column
 * @method     ChildVendors[]|ObjectCollection findByName(string $name) Return ChildVendors objects filtered by the name column
 * @method     ChildVendors[]|ObjectCollection findByAddress1(string $address1) Return ChildVendors objects filtered by the address1 column
 * @method     ChildVendors[]|ObjectCollection findByAddress2(string $address2) Return ChildVendors objects filtered by the address2 column
 * @method     ChildVendors[]|ObjectCollection findByAddress3(string $address3) Return ChildVendors objects filtered by the address3 column
 * @method     ChildVendors[]|ObjectCollection findByCity(string $city) Return ChildVendors objects filtered by the city column
 * @method     ChildVendors[]|ObjectCollection findByState(string $state) Return ChildVendors objects filtered by the state column
 * @method     ChildVendors[]|ObjectCollection findByZip(string $zip) Return ChildVendors objects filtered by the zip column
 * @method     ChildVendors[]|ObjectCollection findByCountry(string $country) Return ChildVendors objects filtered by the country column
 * @method     ChildVendors[]|ObjectCollection findByPhone(string $phone) Return ChildVendors objects filtered by the phone column
 * @method     ChildVendors[]|ObjectCollection findByFax(string $fax) Return ChildVendors objects filtered by the fax column
 * @method     ChildVendors[]|ObjectCollection findByEmail(string $email) Return ChildVendors objects filtered by the email column
 * @method     ChildVendors[]|ObjectCollection findByCreatetime(int $createtime) Return ChildVendors objects filtered by the createtime column
 * @method     ChildVendors[]|ObjectCollection findByCreatedate(int $createdate) Return ChildVendors objects filtered by the createdate column
 * @method     ChildVendors[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VendorsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\VendorsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Vendors', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVendorsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVendorsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVendorsQuery) {
            return $criteria;
        }
        $query = new ChildVendorsQuery();
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
     * @param array[$vendid, $shipfrom] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildVendors|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VendorsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VendorsTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildVendors A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT vendid, shipfrom, name, address1, address2, address3, city, state, zip, country, phone, fax, email, createtime, createdate FROM vendors WHERE vendid = :p0 AND shipfrom = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildVendors $obj */
            $obj = new ChildVendors();
            $obj->hydrate($row);
            VendorsTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildVendors|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(VendorsTableMap::COL_VENDID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(VendorsTableMap::COL_SHIPFROM, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(VendorsTableMap::COL_VENDID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(VendorsTableMap::COL_SHIPFROM, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the vendid column
     *
     * Example usage:
     * <code>
     * $query->filterByVendid('fooValue');   // WHERE vendid = 'fooValue'
     * $query->filterByVendid('%fooValue%', Criteria::LIKE); // WHERE vendid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByVendid($vendid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_VENDID, $vendid, $comparison);
    }

    /**
     * Filter the query on the shipfrom column
     *
     * Example usage:
     * <code>
     * $query->filterByShipfrom('fooValue');   // WHERE shipfrom = 'fooValue'
     * $query->filterByShipfrom('%fooValue%', Criteria::LIKE); // WHERE shipfrom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipfrom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByShipfrom($shipfrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipfrom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_SHIPFROM, $shipfrom, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%', Criteria::LIKE); // WHERE address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%', Criteria::LIKE); // WHERE address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_ADDRESS2, $address2, $comparison);
    }

    /**
     * Filter the query on the address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress3('fooValue');   // WHERE address3 = 'fooValue'
     * $query->filterByAddress3('%fooValue%', Criteria::LIKE); // WHERE address3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByAddress3($address3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_ADDRESS3, $address3, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%', Criteria::LIKE); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_STATE, $state, $comparison);
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%', Criteria::LIKE); // WHERE zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE country = 'fooValue'
     * $query->filterByCountry('%fooValue%', Criteria::LIKE); // WHERE country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%', Criteria::LIKE); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the createtime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatetime(1234); // WHERE createtime = 1234
     * $query->filterByCreatetime(array(12, 34)); // WHERE createtime IN (12, 34)
     * $query->filterByCreatetime(array('min' => 12)); // WHERE createtime > 12
     * </code>
     *
     * @param     mixed $createtime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByCreatetime($createtime = null, $comparison = null)
    {
        if (is_array($createtime)) {
            $useMinMax = false;
            if (isset($createtime['min'])) {
                $this->addUsingAlias(VendorsTableMap::COL_CREATETIME, $createtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createtime['max'])) {
                $this->addUsingAlias(VendorsTableMap::COL_CREATETIME, $createtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_CREATETIME, $createtime, $comparison);
    }

    /**
     * Filter the query on the createdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedate(1234); // WHERE createdate = 1234
     * $query->filterByCreatedate(array(12, 34)); // WHERE createdate IN (12, 34)
     * $query->filterByCreatedate(array('min' => 12)); // WHERE createdate > 12
     * </code>
     *
     * @param     mixed $createdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function filterByCreatedate($createdate = null, $comparison = null)
    {
        if (is_array($createdate)) {
            $useMinMax = false;
            if (isset($createdate['min'])) {
                $this->addUsingAlias(VendorsTableMap::COL_CREATEDATE, $createdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdate['max'])) {
                $this->addUsingAlias(VendorsTableMap::COL_CREATEDATE, $createdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VendorsTableMap::COL_CREATEDATE, $createdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVendors $vendors Object to remove from the list of results
     *
     * @return $this|ChildVendorsQuery The current query, for fluid interface
     */
    public function prune($vendors = null)
    {
        if ($vendors) {
            $this->addCond('pruneCond0', $this->getAliasedColName(VendorsTableMap::COL_VENDID), $vendors->getVendid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(VendorsTableMap::COL_SHIPFROM), $vendors->getShipfrom(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the vendors table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VendorsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VendorsTableMap::clearInstancePool();
            VendorsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(VendorsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VendorsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VendorsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VendorsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // VendorsQuery
