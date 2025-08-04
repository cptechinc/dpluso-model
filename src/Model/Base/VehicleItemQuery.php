<?php

namespace Base;

use \VehicleItem as ChildVehicleItem;
use \VehicleItemQuery as ChildVehicleItemQuery;
use \Exception;
use \PDO;
use Map\VehicleItemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `vehicle_catalog` table.
 *
 * @method     ChildVehicleItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildVehicleItemQuery orderByCatalog($order = Criteria::ASC) Order by the catalog column
 * @method     ChildVehicleItemQuery orderByFromyear($order = Criteria::ASC) Order by the fromyear column
 * @method     ChildVehicleItemQuery orderByThroughyear($order = Criteria::ASC) Order by the throughyear column
 * @method     ChildVehicleItemQuery orderByMake($order = Criteria::ASC) Order by the make column
 * @method     ChildVehicleItemQuery orderByEngine($order = Criteria::ASC) Order by the engine column
 * @method     ChildVehicleItemQuery orderByModel($order = Criteria::ASC) Order by the model column
 * @method     ChildVehicleItemQuery orderBySubmodel($order = Criteria::ASC) Order by the submodel column
 * @method     ChildVehicleItemQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildVehicleItemQuery orderByApplication($order = Criteria::ASC) Order by the application column
 * @method     ChildVehicleItemQuery orderBynotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildVehicleItemQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildVehicleItemQuery orderByTime($order = Criteria::ASC) Order by the time column
 *
 * @method     ChildVehicleItemQuery groupById() Group by the id column
 * @method     ChildVehicleItemQuery groupByCatalog() Group by the catalog column
 * @method     ChildVehicleItemQuery groupByFromyear() Group by the fromyear column
 * @method     ChildVehicleItemQuery groupByThroughyear() Group by the throughyear column
 * @method     ChildVehicleItemQuery groupByMake() Group by the make column
 * @method     ChildVehicleItemQuery groupByEngine() Group by the engine column
 * @method     ChildVehicleItemQuery groupByModel() Group by the model column
 * @method     ChildVehicleItemQuery groupBySubmodel() Group by the submodel column
 * @method     ChildVehicleItemQuery groupByItemid() Group by the itemid column
 * @method     ChildVehicleItemQuery groupByApplication() Group by the application column
 * @method     ChildVehicleItemQuery groupBynotes() Group by the notes column
 * @method     ChildVehicleItemQuery groupByDate() Group by the date column
 * @method     ChildVehicleItemQuery groupByTime() Group by the time column
 *
 * @method     ChildVehicleItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVehicleItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVehicleItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVehicleItemQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVehicleItemQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVehicleItemQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVehicleItem|null findOne(?ConnectionInterface $con = null) Return the first ChildVehicleItem matching the query
 * @method     ChildVehicleItem findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildVehicleItem matching the query, or a new ChildVehicleItem object populated from the query conditions when no match is found
 *
 * @method     ChildVehicleItem|null findOneById(int $id) Return the first ChildVehicleItem filtered by the id column
 * @method     ChildVehicleItem|null findOneByCatalog(string $catalog) Return the first ChildVehicleItem filtered by the catalog column
 * @method     ChildVehicleItem|null findOneByFromyear(int $fromyear) Return the first ChildVehicleItem filtered by the fromyear column
 * @method     ChildVehicleItem|null findOneByThroughyear(int $throughyear) Return the first ChildVehicleItem filtered by the throughyear column
 * @method     ChildVehicleItem|null findOneByMake(string $make) Return the first ChildVehicleItem filtered by the make column
 * @method     ChildVehicleItem|null findOneByEngine(int $engine) Return the first ChildVehicleItem filtered by the engine column
 * @method     ChildVehicleItem|null findOneByModel(string $model) Return the first ChildVehicleItem filtered by the model column
 * @method     ChildVehicleItem|null findOneBySubmodel(string $submodel) Return the first ChildVehicleItem filtered by the submodel column
 * @method     ChildVehicleItem|null findOneByItemid(string $itemid) Return the first ChildVehicleItem filtered by the itemid column
 * @method     ChildVehicleItem|null findOneByApplication(string $application) Return the first ChildVehicleItem filtered by the application column
 * @method     ChildVehicleItem|null findOneBynotes(string $notes) Return the first ChildVehicleItem filtered by the notes column
 * @method     ChildVehicleItem|null findOneByDate(int $date) Return the first ChildVehicleItem filtered by the date column
 * @method     ChildVehicleItem|null findOneByTime(int $time) Return the first ChildVehicleItem filtered by the time column
 *
 * @method     ChildVehicleItem requirePk($key, ?ConnectionInterface $con = null) Return the ChildVehicleItem by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOne(?ConnectionInterface $con = null) Return the first ChildVehicleItem matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVehicleItem requireOneById(int $id) Return the first ChildVehicleItem filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByCatalog(string $catalog) Return the first ChildVehicleItem filtered by the catalog column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByFromyear(int $fromyear) Return the first ChildVehicleItem filtered by the fromyear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByThroughyear(int $throughyear) Return the first ChildVehicleItem filtered by the throughyear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByMake(string $make) Return the first ChildVehicleItem filtered by the make column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByEngine(int $engine) Return the first ChildVehicleItem filtered by the engine column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByModel(string $model) Return the first ChildVehicleItem filtered by the model column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneBySubmodel(string $submodel) Return the first ChildVehicleItem filtered by the submodel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByItemid(string $itemid) Return the first ChildVehicleItem filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByApplication(string $application) Return the first ChildVehicleItem filtered by the application column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneBynotes(string $notes) Return the first ChildVehicleItem filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByDate(int $date) Return the first ChildVehicleItem filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVehicleItem requireOneByTime(int $time) Return the first ChildVehicleItem filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVehicleItem[]|Collection find(?ConnectionInterface $con = null) Return ChildVehicleItem objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildVehicleItem> find(?ConnectionInterface $con = null) Return ChildVehicleItem objects based on current ModelCriteria
 *
 * @method     ChildVehicleItem[]|Collection findById(int|array<int> $id) Return ChildVehicleItem objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findById(int|array<int> $id) Return ChildVehicleItem objects filtered by the id column
 * @method     ChildVehicleItem[]|Collection findByCatalog(string|array<string> $catalog) Return ChildVehicleItem objects filtered by the catalog column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByCatalog(string|array<string> $catalog) Return ChildVehicleItem objects filtered by the catalog column
 * @method     ChildVehicleItem[]|Collection findByFromyear(int|array<int> $fromyear) Return ChildVehicleItem objects filtered by the fromyear column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByFromyear(int|array<int> $fromyear) Return ChildVehicleItem objects filtered by the fromyear column
 * @method     ChildVehicleItem[]|Collection findByThroughyear(int|array<int> $throughyear) Return ChildVehicleItem objects filtered by the throughyear column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByThroughyear(int|array<int> $throughyear) Return ChildVehicleItem objects filtered by the throughyear column
 * @method     ChildVehicleItem[]|Collection findByMake(string|array<string> $make) Return ChildVehicleItem objects filtered by the make column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByMake(string|array<string> $make) Return ChildVehicleItem objects filtered by the make column
 * @method     ChildVehicleItem[]|Collection findByEngine(int|array<int> $engine) Return ChildVehicleItem objects filtered by the engine column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByEngine(int|array<int> $engine) Return ChildVehicleItem objects filtered by the engine column
 * @method     ChildVehicleItem[]|Collection findByModel(string|array<string> $model) Return ChildVehicleItem objects filtered by the model column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByModel(string|array<string> $model) Return ChildVehicleItem objects filtered by the model column
 * @method     ChildVehicleItem[]|Collection findBySubmodel(string|array<string> $submodel) Return ChildVehicleItem objects filtered by the submodel column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findBySubmodel(string|array<string> $submodel) Return ChildVehicleItem objects filtered by the submodel column
 * @method     ChildVehicleItem[]|Collection findByItemid(string|array<string> $itemid) Return ChildVehicleItem objects filtered by the itemid column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByItemid(string|array<string> $itemid) Return ChildVehicleItem objects filtered by the itemid column
 * @method     ChildVehicleItem[]|Collection findByApplication(string|array<string> $application) Return ChildVehicleItem objects filtered by the application column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByApplication(string|array<string> $application) Return ChildVehicleItem objects filtered by the application column
 * @method     ChildVehicleItem[]|Collection findBynotes(string|array<string> $notes) Return ChildVehicleItem objects filtered by the notes column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findBynotes(string|array<string> $notes) Return ChildVehicleItem objects filtered by the notes column
 * @method     ChildVehicleItem[]|Collection findByDate(int|array<int> $date) Return ChildVehicleItem objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByDate(int|array<int> $date) Return ChildVehicleItem objects filtered by the date column
 * @method     ChildVehicleItem[]|Collection findByTime(int|array<int> $time) Return ChildVehicleItem objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildVehicleItem> findByTime(int|array<int> $time) Return ChildVehicleItem objects filtered by the time column
 *
 * @method     ChildVehicleItem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildVehicleItem> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class VehicleItemQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\VehicleItemQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\VehicleItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVehicleItemQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVehicleItemQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildVehicleItemQuery) {
            return $criteria;
        }
        $query = new ChildVehicleItemQuery();
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
     * @return ChildVehicleItem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VehicleItemTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VehicleItemTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVehicleItem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, catalog, fromyear, throughyear, make, engine, model, submodel, itemid, application, notes, date, time FROM vehicle_catalog WHERE id = :p0';
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
            /** @var ChildVehicleItem $obj */
            $obj = new ChildVehicleItem();
            $obj->hydrate($row);
            VehicleItemTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildVehicleItem|array|mixed the result, formatted by the current formatter
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
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(VehicleItemTableMap::COL_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(VehicleItemTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
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
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the catalog column
     *
     * Example usage:
     * <code>
     * $query->filterByCatalog('fooValue');   // WHERE catalog = 'fooValue'
     * $query->filterByCatalog('%fooValue%', Criteria::LIKE); // WHERE catalog LIKE '%fooValue%'
     * $query->filterByCatalog(['foo', 'bar']); // WHERE catalog IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $catalog The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCatalog($catalog = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catalog)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_CATALOG, $catalog, $comparison);

        return $this;
    }

    /**
     * Filter the query on the fromyear column
     *
     * Example usage:
     * <code>
     * $query->filterByFromyear(1234); // WHERE fromyear = 1234
     * $query->filterByFromyear(array(12, 34)); // WHERE fromyear IN (12, 34)
     * $query->filterByFromyear(array('min' => 12)); // WHERE fromyear > 12
     * </code>
     *
     * @param mixed $fromyear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFromyear($fromyear = null, ?string $comparison = null)
    {
        if (is_array($fromyear)) {
            $useMinMax = false;
            if (isset($fromyear['min'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_FROMYEAR, $fromyear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fromyear['max'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_FROMYEAR, $fromyear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_FROMYEAR, $fromyear, $comparison);

        return $this;
    }

    /**
     * Filter the query on the throughyear column
     *
     * Example usage:
     * <code>
     * $query->filterByThroughyear(1234); // WHERE throughyear = 1234
     * $query->filterByThroughyear(array(12, 34)); // WHERE throughyear IN (12, 34)
     * $query->filterByThroughyear(array('min' => 12)); // WHERE throughyear > 12
     * </code>
     *
     * @param mixed $throughyear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByThroughyear($throughyear = null, ?string $comparison = null)
    {
        if (is_array($throughyear)) {
            $useMinMax = false;
            if (isset($throughyear['min'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_THROUGHYEAR, $throughyear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($throughyear['max'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_THROUGHYEAR, $throughyear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_THROUGHYEAR, $throughyear, $comparison);

        return $this;
    }

    /**
     * Filter the query on the make column
     *
     * Example usage:
     * <code>
     * $query->filterByMake('fooValue');   // WHERE make = 'fooValue'
     * $query->filterByMake('%fooValue%', Criteria::LIKE); // WHERE make LIKE '%fooValue%'
     * $query->filterByMake(['foo', 'bar']); // WHERE make IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $make The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMake($make = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($make)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_MAKE, $make, $comparison);

        return $this;
    }

    /**
     * Filter the query on the engine column
     *
     * Example usage:
     * <code>
     * $query->filterByEngine(1234); // WHERE engine = 1234
     * $query->filterByEngine(array(12, 34)); // WHERE engine IN (12, 34)
     * $query->filterByEngine(array('min' => 12)); // WHERE engine > 12
     * </code>
     *
     * @param mixed $engine The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEngine($engine = null, ?string $comparison = null)
    {
        if (is_array($engine)) {
            $useMinMax = false;
            if (isset($engine['min'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_ENGINE, $engine['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($engine['max'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_ENGINE, $engine['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_ENGINE, $engine, $comparison);

        return $this;
    }

    /**
     * Filter the query on the model column
     *
     * Example usage:
     * <code>
     * $query->filterByModel('fooValue');   // WHERE model = 'fooValue'
     * $query->filterByModel('%fooValue%', Criteria::LIKE); // WHERE model LIKE '%fooValue%'
     * $query->filterByModel(['foo', 'bar']); // WHERE model IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $model The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByModel($model = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($model)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_MODEL, $model, $comparison);

        return $this;
    }

    /**
     * Filter the query on the submodel column
     *
     * Example usage:
     * <code>
     * $query->filterBySubmodel('fooValue');   // WHERE submodel = 'fooValue'
     * $query->filterBySubmodel('%fooValue%', Criteria::LIKE); // WHERE submodel LIKE '%fooValue%'
     * $query->filterBySubmodel(['foo', 'bar']); // WHERE submodel IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $submodel The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySubmodel($submodel = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($submodel)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_SUBMODEL, $submodel, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * $query->filterByItemid(['foo', 'bar']); // WHERE itemid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_ITEMID, $itemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the application column
     *
     * Example usage:
     * <code>
     * $query->filterByApplication('fooValue');   // WHERE application = 'fooValue'
     * $query->filterByApplication('%fooValue%', Criteria::LIKE); // WHERE application LIKE '%fooValue%'
     * $query->filterByApplication(['foo', 'bar']); // WHERE application IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $application The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByApplication($application = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($application)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_APPLICATION, $application, $comparison);

        return $this;
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterBynotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterBynotes('%fooValue%', Criteria::LIKE); // WHERE notes LIKE '%fooValue%'
     * $query->filterBynotes(['foo', 'bar']); // WHERE notes IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $notes The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBynotes($notes = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_NOTES, $notes, $comparison);

        return $this;
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
     * @param mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDate($date = null, ?string $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_DATE, $date, $comparison);

        return $this;
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
     * @param mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTime($time = null, ?string $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(VehicleItemTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(VehicleItemTableMap::COL_TIME, $time, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildVehicleItem $vehicleItem Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($vehicleItem = null)
    {
        if ($vehicleItem) {
            $this->addUsingAlias(VehicleItemTableMap::COL_ID, $vehicleItem->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the vehicle_catalog table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VehicleItemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VehicleItemTableMap::clearInstancePool();
            VehicleItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VehicleItemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VehicleItemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VehicleItemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VehicleItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
