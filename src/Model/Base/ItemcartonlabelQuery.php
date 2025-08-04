<?php

namespace Base;

use \Itemcartonlabel as ChildItemcartonlabel;
use \ItemcartonlabelQuery as ChildItemcartonlabelQuery;
use \Exception;
use \PDO;
use Map\ItemcartonlabelTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `itemcartonlabel` table.
 *
 * @method     ChildItemcartonlabelQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildItemcartonlabelQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildItemcartonlabelQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildItemcartonlabelQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildItemcartonlabelQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildItemcartonlabelQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildItemcartonlabelQuery orderByBin($order = Criteria::ASC) Order by the bin column
 * @method     ChildItemcartonlabelQuery orderByLabelBox($order = Criteria::ASC) Order by the label_box column
 * @method     ChildItemcartonlabelQuery orderByPrinterBox($order = Criteria::ASC) Order by the printer_box column
 * @method     ChildItemcartonlabelQuery orderByQtyBox($order = Criteria::ASC) Order by the qty_box column
 * @method     ChildItemcartonlabelQuery orderByNbrBoxLabels($order = Criteria::ASC) Order by the nbr_box_labels column
 * @method     ChildItemcartonlabelQuery orderByLabelMaster($order = Criteria::ASC) Order by the label_master column
 * @method     ChildItemcartonlabelQuery orderByPrinterMaster($order = Criteria::ASC) Order by the printer_master column
 * @method     ChildItemcartonlabelQuery orderByQtyMaster($order = Criteria::ASC) Order by the qty_master column
 * @method     ChildItemcartonlabelQuery orderByNbrMasterLabels($order = Criteria::ASC) Order by the nbr_master_labels column
 *
 * @method     ChildItemcartonlabelQuery groupBySessionid() Group by the sessionid column
 * @method     ChildItemcartonlabelQuery groupByDate() Group by the date column
 * @method     ChildItemcartonlabelQuery groupByTime() Group by the time column
 * @method     ChildItemcartonlabelQuery groupByItemid() Group by the itemid column
 * @method     ChildItemcartonlabelQuery groupByWhse() Group by the whse column
 * @method     ChildItemcartonlabelQuery groupByLotserial() Group by the lotserial column
 * @method     ChildItemcartonlabelQuery groupByBin() Group by the bin column
 * @method     ChildItemcartonlabelQuery groupByLabelBox() Group by the label_box column
 * @method     ChildItemcartonlabelQuery groupByPrinterBox() Group by the printer_box column
 * @method     ChildItemcartonlabelQuery groupByQtyBox() Group by the qty_box column
 * @method     ChildItemcartonlabelQuery groupByNbrBoxLabels() Group by the nbr_box_labels column
 * @method     ChildItemcartonlabelQuery groupByLabelMaster() Group by the label_master column
 * @method     ChildItemcartonlabelQuery groupByPrinterMaster() Group by the printer_master column
 * @method     ChildItemcartonlabelQuery groupByQtyMaster() Group by the qty_master column
 * @method     ChildItemcartonlabelQuery groupByNbrMasterLabels() Group by the nbr_master_labels column
 *
 * @method     ChildItemcartonlabelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildItemcartonlabelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildItemcartonlabelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildItemcartonlabelQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildItemcartonlabelQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildItemcartonlabelQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildItemcartonlabel|null findOne(?ConnectionInterface $con = null) Return the first ChildItemcartonlabel matching the query
 * @method     ChildItemcartonlabel findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildItemcartonlabel matching the query, or a new ChildItemcartonlabel object populated from the query conditions when no match is found
 *
 * @method     ChildItemcartonlabel|null findOneBySessionid(string $sessionid) Return the first ChildItemcartonlabel filtered by the sessionid column
 * @method     ChildItemcartonlabel|null findOneByDate(int $date) Return the first ChildItemcartonlabel filtered by the date column
 * @method     ChildItemcartonlabel|null findOneByTime(int $time) Return the first ChildItemcartonlabel filtered by the time column
 * @method     ChildItemcartonlabel|null findOneByItemid(string $itemid) Return the first ChildItemcartonlabel filtered by the itemid column
 * @method     ChildItemcartonlabel|null findOneByWhse(string $whse) Return the first ChildItemcartonlabel filtered by the whse column
 * @method     ChildItemcartonlabel|null findOneByLotserial(string $lotserial) Return the first ChildItemcartonlabel filtered by the lotserial column
 * @method     ChildItemcartonlabel|null findOneByBin(string $bin) Return the first ChildItemcartonlabel filtered by the bin column
 * @method     ChildItemcartonlabel|null findOneByLabelBox(string $label_box) Return the first ChildItemcartonlabel filtered by the label_box column
 * @method     ChildItemcartonlabel|null findOneByPrinterBox(string $printer_box) Return the first ChildItemcartonlabel filtered by the printer_box column
 * @method     ChildItemcartonlabel|null findOneByQtyBox(int $qty_box) Return the first ChildItemcartonlabel filtered by the qty_box column
 * @method     ChildItemcartonlabel|null findOneByNbrBoxLabels(int $nbr_box_labels) Return the first ChildItemcartonlabel filtered by the nbr_box_labels column
 * @method     ChildItemcartonlabel|null findOneByLabelMaster(string $label_master) Return the first ChildItemcartonlabel filtered by the label_master column
 * @method     ChildItemcartonlabel|null findOneByPrinterMaster(string $printer_master) Return the first ChildItemcartonlabel filtered by the printer_master column
 * @method     ChildItemcartonlabel|null findOneByQtyMaster(int $qty_master) Return the first ChildItemcartonlabel filtered by the qty_master column
 * @method     ChildItemcartonlabel|null findOneByNbrMasterLabels(int $nbr_master_labels) Return the first ChildItemcartonlabel filtered by the nbr_master_labels column
 *
 * @method     ChildItemcartonlabel requirePk($key, ?ConnectionInterface $con = null) Return the ChildItemcartonlabel by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOne(?ConnectionInterface $con = null) Return the first ChildItemcartonlabel matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemcartonlabel requireOneBySessionid(string $sessionid) Return the first ChildItemcartonlabel filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByDate(int $date) Return the first ChildItemcartonlabel filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByTime(int $time) Return the first ChildItemcartonlabel filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByItemid(string $itemid) Return the first ChildItemcartonlabel filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByWhse(string $whse) Return the first ChildItemcartonlabel filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByLotserial(string $lotserial) Return the first ChildItemcartonlabel filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByBin(string $bin) Return the first ChildItemcartonlabel filtered by the bin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByLabelBox(string $label_box) Return the first ChildItemcartonlabel filtered by the label_box column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByPrinterBox(string $printer_box) Return the first ChildItemcartonlabel filtered by the printer_box column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByQtyBox(int $qty_box) Return the first ChildItemcartonlabel filtered by the qty_box column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByNbrBoxLabels(int $nbr_box_labels) Return the first ChildItemcartonlabel filtered by the nbr_box_labels column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByLabelMaster(string $label_master) Return the first ChildItemcartonlabel filtered by the label_master column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByPrinterMaster(string $printer_master) Return the first ChildItemcartonlabel filtered by the printer_master column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByQtyMaster(int $qty_master) Return the first ChildItemcartonlabel filtered by the qty_master column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemcartonlabel requireOneByNbrMasterLabels(int $nbr_master_labels) Return the first ChildItemcartonlabel filtered by the nbr_master_labels column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemcartonlabel[]|Collection find(?ConnectionInterface $con = null) Return ChildItemcartonlabel objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> find(?ConnectionInterface $con = null) Return ChildItemcartonlabel objects based on current ModelCriteria
 *
 * @method     ChildItemcartonlabel[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildItemcartonlabel objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findBySessionid(string|array<string> $sessionid) Return ChildItemcartonlabel objects filtered by the sessionid column
 * @method     ChildItemcartonlabel[]|Collection findByDate(int|array<int> $date) Return ChildItemcartonlabel objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByDate(int|array<int> $date) Return ChildItemcartonlabel objects filtered by the date column
 * @method     ChildItemcartonlabel[]|Collection findByTime(int|array<int> $time) Return ChildItemcartonlabel objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByTime(int|array<int> $time) Return ChildItemcartonlabel objects filtered by the time column
 * @method     ChildItemcartonlabel[]|Collection findByItemid(string|array<string> $itemid) Return ChildItemcartonlabel objects filtered by the itemid column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByItemid(string|array<string> $itemid) Return ChildItemcartonlabel objects filtered by the itemid column
 * @method     ChildItemcartonlabel[]|Collection findByWhse(string|array<string> $whse) Return ChildItemcartonlabel objects filtered by the whse column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByWhse(string|array<string> $whse) Return ChildItemcartonlabel objects filtered by the whse column
 * @method     ChildItemcartonlabel[]|Collection findByLotserial(string|array<string> $lotserial) Return ChildItemcartonlabel objects filtered by the lotserial column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByLotserial(string|array<string> $lotserial) Return ChildItemcartonlabel objects filtered by the lotserial column
 * @method     ChildItemcartonlabel[]|Collection findByBin(string|array<string> $bin) Return ChildItemcartonlabel objects filtered by the bin column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByBin(string|array<string> $bin) Return ChildItemcartonlabel objects filtered by the bin column
 * @method     ChildItemcartonlabel[]|Collection findByLabelBox(string|array<string> $label_box) Return ChildItemcartonlabel objects filtered by the label_box column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByLabelBox(string|array<string> $label_box) Return ChildItemcartonlabel objects filtered by the label_box column
 * @method     ChildItemcartonlabel[]|Collection findByPrinterBox(string|array<string> $printer_box) Return ChildItemcartonlabel objects filtered by the printer_box column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByPrinterBox(string|array<string> $printer_box) Return ChildItemcartonlabel objects filtered by the printer_box column
 * @method     ChildItemcartonlabel[]|Collection findByQtyBox(int|array<int> $qty_box) Return ChildItemcartonlabel objects filtered by the qty_box column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByQtyBox(int|array<int> $qty_box) Return ChildItemcartonlabel objects filtered by the qty_box column
 * @method     ChildItemcartonlabel[]|Collection findByNbrBoxLabels(int|array<int> $nbr_box_labels) Return ChildItemcartonlabel objects filtered by the nbr_box_labels column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByNbrBoxLabels(int|array<int> $nbr_box_labels) Return ChildItemcartonlabel objects filtered by the nbr_box_labels column
 * @method     ChildItemcartonlabel[]|Collection findByLabelMaster(string|array<string> $label_master) Return ChildItemcartonlabel objects filtered by the label_master column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByLabelMaster(string|array<string> $label_master) Return ChildItemcartonlabel objects filtered by the label_master column
 * @method     ChildItemcartonlabel[]|Collection findByPrinterMaster(string|array<string> $printer_master) Return ChildItemcartonlabel objects filtered by the printer_master column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByPrinterMaster(string|array<string> $printer_master) Return ChildItemcartonlabel objects filtered by the printer_master column
 * @method     ChildItemcartonlabel[]|Collection findByQtyMaster(int|array<int> $qty_master) Return ChildItemcartonlabel objects filtered by the qty_master column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByQtyMaster(int|array<int> $qty_master) Return ChildItemcartonlabel objects filtered by the qty_master column
 * @method     ChildItemcartonlabel[]|Collection findByNbrMasterLabels(int|array<int> $nbr_master_labels) Return ChildItemcartonlabel objects filtered by the nbr_master_labels column
 * @psalm-method Collection&\Traversable<ChildItemcartonlabel> findByNbrMasterLabels(int|array<int> $nbr_master_labels) Return ChildItemcartonlabel objects filtered by the nbr_master_labels column
 *
 * @method     ChildItemcartonlabel[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildItemcartonlabel> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class ItemcartonlabelQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ItemcartonlabelQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Itemcartonlabel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildItemcartonlabelQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildItemcartonlabelQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildItemcartonlabelQuery) {
            return $criteria;
        }
        $query = new ChildItemcartonlabelQuery();
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
     * @return ChildItemcartonlabel|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ItemcartonlabelTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ItemcartonlabelTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildItemcartonlabel A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, date, time, itemid, whse, lotserial, bin, label_box, printer_box, qty_box, nbr_box_labels, label_master, printer_master, qty_master, nbr_master_labels FROM itemcartonlabel WHERE sessionid = :p0';
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
            /** @var ChildItemcartonlabel $obj */
            $obj = new ChildItemcartonlabel();
            $obj->hydrate($row);
            ItemcartonlabelTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildItemcartonlabel|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_SESSIONID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_SESSIONID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the sessionid column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionid('fooValue');   // WHERE sessionid = 'fooValue'
     * $query->filterBySessionid('%fooValue%', Criteria::LIKE); // WHERE sessionid LIKE '%fooValue%'
     * $query->filterBySessionid(['foo', 'bar']); // WHERE sessionid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sessionid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_SESSIONID, $sessionid, $comparison);

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
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_TIME, $time, $comparison);

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

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_ITEMID, $itemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the whse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhse('fooValue');   // WHERE whse = 'fooValue'
     * $query->filterByWhse('%fooValue%', Criteria::LIKE); // WHERE whse LIKE '%fooValue%'
     * $query->filterByWhse(['foo', 'bar']); // WHERE whse IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $whse The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByWhse($whse = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_WHSE, $whse, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lotserial column
     *
     * Example usage:
     * <code>
     * $query->filterByLotserial('fooValue');   // WHERE lotserial = 'fooValue'
     * $query->filterByLotserial('%fooValue%', Criteria::LIKE); // WHERE lotserial LIKE '%fooValue%'
     * $query->filterByLotserial(['foo', 'bar']); // WHERE lotserial IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lotserial The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_LOTSERIAL, $lotserial, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bin column
     *
     * Example usage:
     * <code>
     * $query->filterByBin('fooValue');   // WHERE bin = 'fooValue'
     * $query->filterByBin('%fooValue%', Criteria::LIKE); // WHERE bin LIKE '%fooValue%'
     * $query->filterByBin(['foo', 'bar']); // WHERE bin IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $bin The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBin($bin = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bin)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_BIN, $bin, $comparison);

        return $this;
    }

    /**
     * Filter the query on the label_box column
     *
     * Example usage:
     * <code>
     * $query->filterByLabelBox('fooValue');   // WHERE label_box = 'fooValue'
     * $query->filterByLabelBox('%fooValue%', Criteria::LIKE); // WHERE label_box LIKE '%fooValue%'
     * $query->filterByLabelBox(['foo', 'bar']); // WHERE label_box IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $labelBox The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLabelBox($labelBox = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labelBox)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_LABEL_BOX, $labelBox, $comparison);

        return $this;
    }

    /**
     * Filter the query on the printer_box column
     *
     * Example usage:
     * <code>
     * $query->filterByPrinterBox('fooValue');   // WHERE printer_box = 'fooValue'
     * $query->filterByPrinterBox('%fooValue%', Criteria::LIKE); // WHERE printer_box LIKE '%fooValue%'
     * $query->filterByPrinterBox(['foo', 'bar']); // WHERE printer_box IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $printerBox The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrinterBox($printerBox = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($printerBox)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_PRINTER_BOX, $printerBox, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qty_box column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyBox(1234); // WHERE qty_box = 1234
     * $query->filterByQtyBox(array(12, 34)); // WHERE qty_box IN (12, 34)
     * $query->filterByQtyBox(array('min' => 12)); // WHERE qty_box > 12
     * </code>
     *
     * @param mixed $qtyBox The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQtyBox($qtyBox = null, ?string $comparison = null)
    {
        if (is_array($qtyBox)) {
            $useMinMax = false;
            if (isset($qtyBox['min'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_QTY_BOX, $qtyBox['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyBox['max'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_QTY_BOX, $qtyBox['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_QTY_BOX, $qtyBox, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nbr_box_labels column
     *
     * Example usage:
     * <code>
     * $query->filterByNbrBoxLabels(1234); // WHERE nbr_box_labels = 1234
     * $query->filterByNbrBoxLabels(array(12, 34)); // WHERE nbr_box_labels IN (12, 34)
     * $query->filterByNbrBoxLabels(array('min' => 12)); // WHERE nbr_box_labels > 12
     * </code>
     *
     * @param mixed $nbrBoxLabels The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNbrBoxLabels($nbrBoxLabels = null, ?string $comparison = null)
    {
        if (is_array($nbrBoxLabels)) {
            $useMinMax = false;
            if (isset($nbrBoxLabels['min'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_NBR_BOX_LABELS, $nbrBoxLabels['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nbrBoxLabels['max'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_NBR_BOX_LABELS, $nbrBoxLabels['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_NBR_BOX_LABELS, $nbrBoxLabels, $comparison);

        return $this;
    }

    /**
     * Filter the query on the label_master column
     *
     * Example usage:
     * <code>
     * $query->filterByLabelMaster('fooValue');   // WHERE label_master = 'fooValue'
     * $query->filterByLabelMaster('%fooValue%', Criteria::LIKE); // WHERE label_master LIKE '%fooValue%'
     * $query->filterByLabelMaster(['foo', 'bar']); // WHERE label_master IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $labelMaster The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLabelMaster($labelMaster = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labelMaster)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_LABEL_MASTER, $labelMaster, $comparison);

        return $this;
    }

    /**
     * Filter the query on the printer_master column
     *
     * Example usage:
     * <code>
     * $query->filterByPrinterMaster('fooValue');   // WHERE printer_master = 'fooValue'
     * $query->filterByPrinterMaster('%fooValue%', Criteria::LIKE); // WHERE printer_master LIKE '%fooValue%'
     * $query->filterByPrinterMaster(['foo', 'bar']); // WHERE printer_master IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $printerMaster The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrinterMaster($printerMaster = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($printerMaster)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_PRINTER_MASTER, $printerMaster, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qty_master column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyMaster(1234); // WHERE qty_master = 1234
     * $query->filterByQtyMaster(array(12, 34)); // WHERE qty_master IN (12, 34)
     * $query->filterByQtyMaster(array('min' => 12)); // WHERE qty_master > 12
     * </code>
     *
     * @param mixed $qtyMaster The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQtyMaster($qtyMaster = null, ?string $comparison = null)
    {
        if (is_array($qtyMaster)) {
            $useMinMax = false;
            if (isset($qtyMaster['min'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_QTY_MASTER, $qtyMaster['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyMaster['max'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_QTY_MASTER, $qtyMaster['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_QTY_MASTER, $qtyMaster, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nbr_master_labels column
     *
     * Example usage:
     * <code>
     * $query->filterByNbrMasterLabels(1234); // WHERE nbr_master_labels = 1234
     * $query->filterByNbrMasterLabels(array(12, 34)); // WHERE nbr_master_labels IN (12, 34)
     * $query->filterByNbrMasterLabels(array('min' => 12)); // WHERE nbr_master_labels > 12
     * </code>
     *
     * @param mixed $nbrMasterLabels The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNbrMasterLabels($nbrMasterLabels = null, ?string $comparison = null)
    {
        if (is_array($nbrMasterLabels)) {
            $useMinMax = false;
            if (isset($nbrMasterLabels['min'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_NBR_MASTER_LABELS, $nbrMasterLabels['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nbrMasterLabels['max'])) {
                $this->addUsingAlias(ItemcartonlabelTableMap::COL_NBR_MASTER_LABELS, $nbrMasterLabels['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ItemcartonlabelTableMap::COL_NBR_MASTER_LABELS, $nbrMasterLabels, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildItemcartonlabel $itemcartonlabel Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($itemcartonlabel = null)
    {
        if ($itemcartonlabel) {
            $this->addUsingAlias(ItemcartonlabelTableMap::COL_SESSIONID, $itemcartonlabel->getSessionid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the itemcartonlabel table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemcartonlabelTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ItemcartonlabelTableMap::clearInstancePool();
            ItemcartonlabelTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemcartonlabelTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ItemcartonlabelTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ItemcartonlabelTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ItemcartonlabelTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
