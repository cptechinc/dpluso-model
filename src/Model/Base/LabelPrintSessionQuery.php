<?php

namespace Base;

use \LabelPrintSession as ChildLabelPrintSession;
use \LabelPrintSessionQuery as ChildLabelPrintSessionQuery;
use \Exception;
use \PDO;
use Map\LabelPrintSessionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'itemcartonlabel' table.
 *
 *
 *
 * @method     ChildLabelPrintSessionQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildLabelPrintSessionQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildLabelPrintSessionQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildLabelPrintSessionQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildLabelPrintSessionQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildLabelPrintSessionQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildLabelPrintSessionQuery orderByBin($order = Criteria::ASC) Order by the bin column
 * @method     ChildLabelPrintSessionQuery orderByLabelBox($order = Criteria::ASC) Order by the label_box column
 * @method     ChildLabelPrintSessionQuery orderByPrinterBox($order = Criteria::ASC) Order by the printer_box column
 * @method     ChildLabelPrintSessionQuery orderByQtyBox($order = Criteria::ASC) Order by the qty_box column
 * @method     ChildLabelPrintSessionQuery orderByNbrBoxLabels($order = Criteria::ASC) Order by the nbr_box_labels column
 * @method     ChildLabelPrintSessionQuery orderByLabelMaster($order = Criteria::ASC) Order by the label_master column
 * @method     ChildLabelPrintSessionQuery orderByPrinterMaster($order = Criteria::ASC) Order by the printer_master column
 * @method     ChildLabelPrintSessionQuery orderByQtyMaster($order = Criteria::ASC) Order by the qty_master column
 * @method     ChildLabelPrintSessionQuery orderByNbrMasterLabels($order = Criteria::ASC) Order by the nbr_master_labels column
 *
 * @method     ChildLabelPrintSessionQuery groupBySessionid() Group by the sessionid column
 * @method     ChildLabelPrintSessionQuery groupByDate() Group by the date column
 * @method     ChildLabelPrintSessionQuery groupByTime() Group by the time column
 * @method     ChildLabelPrintSessionQuery groupByItemid() Group by the itemid column
 * @method     ChildLabelPrintSessionQuery groupByWhse() Group by the whse column
 * @method     ChildLabelPrintSessionQuery groupByLotserial() Group by the lotserial column
 * @method     ChildLabelPrintSessionQuery groupByBin() Group by the bin column
 * @method     ChildLabelPrintSessionQuery groupByLabelBox() Group by the label_box column
 * @method     ChildLabelPrintSessionQuery groupByPrinterBox() Group by the printer_box column
 * @method     ChildLabelPrintSessionQuery groupByQtyBox() Group by the qty_box column
 * @method     ChildLabelPrintSessionQuery groupByNbrBoxLabels() Group by the nbr_box_labels column
 * @method     ChildLabelPrintSessionQuery groupByLabelMaster() Group by the label_master column
 * @method     ChildLabelPrintSessionQuery groupByPrinterMaster() Group by the printer_master column
 * @method     ChildLabelPrintSessionQuery groupByQtyMaster() Group by the qty_master column
 * @method     ChildLabelPrintSessionQuery groupByNbrMasterLabels() Group by the nbr_master_labels column
 *
 * @method     ChildLabelPrintSessionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLabelPrintSessionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLabelPrintSessionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLabelPrintSessionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLabelPrintSessionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLabelPrintSessionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLabelPrintSession findOne(ConnectionInterface $con = null) Return the first ChildLabelPrintSession matching the query
 * @method     ChildLabelPrintSession findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLabelPrintSession matching the query, or a new ChildLabelPrintSession object populated from the query conditions when no match is found
 *
 * @method     ChildLabelPrintSession findOneBySessionid(string $sessionid) Return the first ChildLabelPrintSession filtered by the sessionid column
 * @method     ChildLabelPrintSession findOneByDate(int $date) Return the first ChildLabelPrintSession filtered by the date column
 * @method     ChildLabelPrintSession findOneByTime(int $time) Return the first ChildLabelPrintSession filtered by the time column
 * @method     ChildLabelPrintSession findOneByItemid(string $itemid) Return the first ChildLabelPrintSession filtered by the itemid column
 * @method     ChildLabelPrintSession findOneByWhse(string $whse) Return the first ChildLabelPrintSession filtered by the whse column
 * @method     ChildLabelPrintSession findOneByLotserial(string $lotserial) Return the first ChildLabelPrintSession filtered by the lotserial column
 * @method     ChildLabelPrintSession findOneByBin(string $bin) Return the first ChildLabelPrintSession filtered by the bin column
 * @method     ChildLabelPrintSession findOneByLabelBox(string $label_box) Return the first ChildLabelPrintSession filtered by the label_box column
 * @method     ChildLabelPrintSession findOneByPrinterBox(string $printer_box) Return the first ChildLabelPrintSession filtered by the printer_box column
 * @method     ChildLabelPrintSession findOneByQtyBox(int $qty_box) Return the first ChildLabelPrintSession filtered by the qty_box column
 * @method     ChildLabelPrintSession findOneByNbrBoxLabels(int $nbr_box_labels) Return the first ChildLabelPrintSession filtered by the nbr_box_labels column
 * @method     ChildLabelPrintSession findOneByLabelMaster(string $label_master) Return the first ChildLabelPrintSession filtered by the label_master column
 * @method     ChildLabelPrintSession findOneByPrinterMaster(string $printer_master) Return the first ChildLabelPrintSession filtered by the printer_master column
 * @method     ChildLabelPrintSession findOneByQtyMaster(int $qty_master) Return the first ChildLabelPrintSession filtered by the qty_master column
 * @method     ChildLabelPrintSession findOneByNbrMasterLabels(int $nbr_master_labels) Return the first ChildLabelPrintSession filtered by the nbr_master_labels column *

 * @method     ChildLabelPrintSession requirePk($key, ConnectionInterface $con = null) Return the ChildLabelPrintSession by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOne(ConnectionInterface $con = null) Return the first ChildLabelPrintSession matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLabelPrintSession requireOneBySessionid(string $sessionid) Return the first ChildLabelPrintSession filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByDate(int $date) Return the first ChildLabelPrintSession filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByTime(int $time) Return the first ChildLabelPrintSession filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByItemid(string $itemid) Return the first ChildLabelPrintSession filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByWhse(string $whse) Return the first ChildLabelPrintSession filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByLotserial(string $lotserial) Return the first ChildLabelPrintSession filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByBin(string $bin) Return the first ChildLabelPrintSession filtered by the bin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByLabelBox(string $label_box) Return the first ChildLabelPrintSession filtered by the label_box column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByPrinterBox(string $printer_box) Return the first ChildLabelPrintSession filtered by the printer_box column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByQtyBox(int $qty_box) Return the first ChildLabelPrintSession filtered by the qty_box column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByNbrBoxLabels(int $nbr_box_labels) Return the first ChildLabelPrintSession filtered by the nbr_box_labels column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByLabelMaster(string $label_master) Return the first ChildLabelPrintSession filtered by the label_master column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByPrinterMaster(string $printer_master) Return the first ChildLabelPrintSession filtered by the printer_master column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByQtyMaster(int $qty_master) Return the first ChildLabelPrintSession filtered by the qty_master column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabelPrintSession requireOneByNbrMasterLabels(int $nbr_master_labels) Return the first ChildLabelPrintSession filtered by the nbr_master_labels column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLabelPrintSession[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLabelPrintSession objects based on current ModelCriteria
 * @method     ChildLabelPrintSession[]|ObjectCollection findBySessionid(string $sessionid) Return ChildLabelPrintSession objects filtered by the sessionid column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByDate(int $date) Return ChildLabelPrintSession objects filtered by the date column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByTime(int $time) Return ChildLabelPrintSession objects filtered by the time column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByItemid(string $itemid) Return ChildLabelPrintSession objects filtered by the itemid column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByWhse(string $whse) Return ChildLabelPrintSession objects filtered by the whse column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByLotserial(string $lotserial) Return ChildLabelPrintSession objects filtered by the lotserial column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByBin(string $bin) Return ChildLabelPrintSession objects filtered by the bin column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByLabelBox(string $label_box) Return ChildLabelPrintSession objects filtered by the label_box column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByPrinterBox(string $printer_box) Return ChildLabelPrintSession objects filtered by the printer_box column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByQtyBox(int $qty_box) Return ChildLabelPrintSession objects filtered by the qty_box column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByNbrBoxLabels(int $nbr_box_labels) Return ChildLabelPrintSession objects filtered by the nbr_box_labels column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByLabelMaster(string $label_master) Return ChildLabelPrintSession objects filtered by the label_master column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByPrinterMaster(string $printer_master) Return ChildLabelPrintSession objects filtered by the printer_master column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByQtyMaster(int $qty_master) Return ChildLabelPrintSession objects filtered by the qty_master column
 * @method     ChildLabelPrintSession[]|ObjectCollection findByNbrMasterLabels(int $nbr_master_labels) Return ChildLabelPrintSession objects filtered by the nbr_master_labels column
 * @method     ChildLabelPrintSession[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LabelPrintSessionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LabelPrintSessionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\LabelPrintSession', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLabelPrintSessionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLabelPrintSessionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLabelPrintSessionQuery) {
            return $criteria;
        }
        $query = new ChildLabelPrintSessionQuery();
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
     * @return ChildLabelPrintSession|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LabelPrintSessionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LabelPrintSessionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLabelPrintSession A model object, or null if the key is not found
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
            /** @var ChildLabelPrintSession $obj */
            $obj = new ChildLabelPrintSession();
            $obj->hydrate($row);
            LabelPrintSessionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLabelPrintSession|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_SESSIONID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_SESSIONID, $keys, Criteria::IN);
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
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_DATE, $date, $comparison);
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
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the whse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhse('fooValue');   // WHERE whse = 'fooValue'
     * $query->filterByWhse('%fooValue%', Criteria::LIKE); // WHERE whse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_WHSE, $whse, $comparison);
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
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_LOTSERIAL, $lotserial, $comparison);
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
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByBin($bin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_BIN, $bin, $comparison);
    }

    /**
     * Filter the query on the label_box column
     *
     * Example usage:
     * <code>
     * $query->filterByLabelBox('fooValue');   // WHERE label_box = 'fooValue'
     * $query->filterByLabelBox('%fooValue%', Criteria::LIKE); // WHERE label_box LIKE '%fooValue%'
     * </code>
     *
     * @param     string $labelBox The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByLabelBox($labelBox = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labelBox)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_LABEL_BOX, $labelBox, $comparison);
    }

    /**
     * Filter the query on the printer_box column
     *
     * Example usage:
     * <code>
     * $query->filterByPrinterBox('fooValue');   // WHERE printer_box = 'fooValue'
     * $query->filterByPrinterBox('%fooValue%', Criteria::LIKE); // WHERE printer_box LIKE '%fooValue%'
     * </code>
     *
     * @param     string $printerBox The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByPrinterBox($printerBox = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($printerBox)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_PRINTER_BOX, $printerBox, $comparison);
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
     * @param     mixed $qtyBox The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByQtyBox($qtyBox = null, $comparison = null)
    {
        if (is_array($qtyBox)) {
            $useMinMax = false;
            if (isset($qtyBox['min'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_QTY_BOX, $qtyBox['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyBox['max'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_QTY_BOX, $qtyBox['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_QTY_BOX, $qtyBox, $comparison);
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
     * @param     mixed $nbrBoxLabels The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByNbrBoxLabels($nbrBoxLabels = null, $comparison = null)
    {
        if (is_array($nbrBoxLabels)) {
            $useMinMax = false;
            if (isset($nbrBoxLabels['min'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_NBR_BOX_LABELS, $nbrBoxLabels['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nbrBoxLabels['max'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_NBR_BOX_LABELS, $nbrBoxLabels['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_NBR_BOX_LABELS, $nbrBoxLabels, $comparison);
    }

    /**
     * Filter the query on the label_master column
     *
     * Example usage:
     * <code>
     * $query->filterByLabelMaster('fooValue');   // WHERE label_master = 'fooValue'
     * $query->filterByLabelMaster('%fooValue%', Criteria::LIKE); // WHERE label_master LIKE '%fooValue%'
     * </code>
     *
     * @param     string $labelMaster The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByLabelMaster($labelMaster = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labelMaster)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_LABEL_MASTER, $labelMaster, $comparison);
    }

    /**
     * Filter the query on the printer_master column
     *
     * Example usage:
     * <code>
     * $query->filterByPrinterMaster('fooValue');   // WHERE printer_master = 'fooValue'
     * $query->filterByPrinterMaster('%fooValue%', Criteria::LIKE); // WHERE printer_master LIKE '%fooValue%'
     * </code>
     *
     * @param     string $printerMaster The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByPrinterMaster($printerMaster = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($printerMaster)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_PRINTER_MASTER, $printerMaster, $comparison);
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
     * @param     mixed $qtyMaster The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByQtyMaster($qtyMaster = null, $comparison = null)
    {
        if (is_array($qtyMaster)) {
            $useMinMax = false;
            if (isset($qtyMaster['min'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_QTY_MASTER, $qtyMaster['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyMaster['max'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_QTY_MASTER, $qtyMaster['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_QTY_MASTER, $qtyMaster, $comparison);
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
     * @param     mixed $nbrMasterLabels The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function filterByNbrMasterLabels($nbrMasterLabels = null, $comparison = null)
    {
        if (is_array($nbrMasterLabels)) {
            $useMinMax = false;
            if (isset($nbrMasterLabels['min'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_NBR_MASTER_LABELS, $nbrMasterLabels['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nbrMasterLabels['max'])) {
                $this->addUsingAlias(LabelPrintSessionTableMap::COL_NBR_MASTER_LABELS, $nbrMasterLabels['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelPrintSessionTableMap::COL_NBR_MASTER_LABELS, $nbrMasterLabels, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLabelPrintSession $labelPrintSession Object to remove from the list of results
     *
     * @return $this|ChildLabelPrintSessionQuery The current query, for fluid interface
     */
    public function prune($labelPrintSession = null)
    {
        if ($labelPrintSession) {
            $this->addUsingAlias(LabelPrintSessionTableMap::COL_SESSIONID, $labelPrintSession->getSessionid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the itemcartonlabel table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LabelPrintSessionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LabelPrintSessionTableMap::clearInstancePool();
            LabelPrintSessionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LabelPrintSessionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LabelPrintSessionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LabelPrintSessionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LabelPrintSessionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LabelPrintSessionQuery
