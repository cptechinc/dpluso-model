<?php

namespace Base;

use \BookingdQuery as ChildBookingdQuery;
use \Exception;
use \PDO;
use Map\BookingdTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'bookingd' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Bookingd implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\BookingdTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the bookdate field.
     *
     * @var        string
     */
    protected $bookdate;

    /**
     * The value for the custid field.
     *
     * @var        string
     */
    protected $custid;

    /**
     * The value for the shiptoid field.
     *
     * @var        string
     */
    protected $shiptoid;

    /**
     * The value for the salesorderbase field.
     *
     * @var        int
     */
    protected $salesorderbase;

    /**
     * The value for the origorderline field.
     *
     * @var        int
     */
    protected $origorderline;

    /**
     * The value for the itemid field.
     *
     * @var        string
     */
    protected $itemid;

    /**
     * The value for the salesordernbr field.
     *
     * @var        int
     */
    protected $salesordernbr;

    /**
     * The value for the salesperson1 field.
     *
     * @var        string
     */
    protected $salesperson1;

    /**
     * The value for the b4qty field.
     *
     * Note: this column has a database default value of: '0.000'
     * @var        string
     */
    protected $b4qty;

    /**
     * The value for the b4price field.
     *
     * Note: this column has a database default value of: '0.000'
     * @var        string
     */
    protected $b4price;

    /**
     * The value for the b4uom field.
     *
     * @var        string
     */
    protected $b4uom;

    /**
     * The value for the afterqty field.
     *
     * Note: this column has a database default value of: '0.000'
     * @var        string
     */
    protected $afterqty;

    /**
     * The value for the afterprice field.
     *
     * Note: this column has a database default value of: '0.000'
     * @var        string
     */
    protected $afterprice;

    /**
     * The value for the afteruom field.
     *
     * @var        string
     */
    protected $afteruom;

    /**
     * The value for the netamount field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $netamount;

    /**
     * The value for the createdate field.
     *
     * @var        string
     */
    protected $createdate;

    /**
     * The value for the createtime field.
     *
     * @var        string
     */
    protected $createtime;

    /**
     * The value for the dummy field.
     *
     * @var        string
     */
    protected $dummy;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->b4qty = '0.000';
        $this->b4price = '0.000';
        $this->afterqty = '0.000';
        $this->afterprice = '0.000';
        $this->netamount = '0.00';
    }

    /**
     * Initializes internal state of Base\Bookingd object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Bookingd</code> instance.  If
     * <code>obj</code> is an instance of <code>Bookingd</code>, delegates to
     * <code>equals(Bookingd)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Bookingd The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [bookdate] column value.
     *
     * @return string
     */
    public function getBookdate()
    {
        return $this->bookdate;
    }

    /**
     * Get the [custid] column value.
     *
     * @return string
     */
    public function getCustid()
    {
        return $this->custid;
    }

    /**
     * Get the [shiptoid] column value.
     *
     * @return string
     */
    public function getShiptoid()
    {
        return $this->shiptoid;
    }

    /**
     * Get the [salesorderbase] column value.
     *
     * @return int
     */
    public function getSalesorderbase()
    {
        return $this->salesorderbase;
    }

    /**
     * Get the [origorderline] column value.
     *
     * @return int
     */
    public function getOrigorderline()
    {
        return $this->origorderline;
    }

    /**
     * Get the [itemid] column value.
     *
     * @return string
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * Get the [salesordernbr] column value.
     *
     * @return int
     */
    public function getSalesordernbr()
    {
        return $this->salesordernbr;
    }

    /**
     * Get the [salesperson1] column value.
     *
     * @return string
     */
    public function getSalesperson1()
    {
        return $this->salesperson1;
    }

    /**
     * Get the [b4qty] column value.
     *
     * @return string
     */
    public function getB4qty()
    {
        return $this->b4qty;
    }

    /**
     * Get the [b4price] column value.
     *
     * @return string
     */
    public function getB4price()
    {
        return $this->b4price;
    }

    /**
     * Get the [b4uom] column value.
     *
     * @return string
     */
    public function getB4uom()
    {
        return $this->b4uom;
    }

    /**
     * Get the [afterqty] column value.
     *
     * @return string
     */
    public function getAfterqty()
    {
        return $this->afterqty;
    }

    /**
     * Get the [afterprice] column value.
     *
     * @return string
     */
    public function getAfterprice()
    {
        return $this->afterprice;
    }

    /**
     * Get the [afteruom] column value.
     *
     * @return string
     */
    public function getAfteruom()
    {
        return $this->afteruom;
    }

    /**
     * Get the [netamount] column value.
     *
     * @return string
     */
    public function getNetamount()
    {
        return $this->netamount;
    }

    /**
     * Get the [createdate] column value.
     *
     * @return string
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * Get the [createtime] column value.
     *
     * @return string
     */
    public function getCreatetime()
    {
        return $this->createtime;
    }

    /**
     * Get the [dummy] column value.
     *
     * @return string
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * Set the value of [bookdate] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setBookdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bookdate !== $v) {
            $this->bookdate = $v;
            $this->modifiedColumns[BookingdTableMap::COL_BOOKDATE] = true;
        }

        return $this;
    } // setBookdate()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[BookingdTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[BookingdTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    } // setShiptoid()

    /**
     * Set the value of [salesorderbase] column.
     *
     * @param int $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setSalesorderbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->salesorderbase !== $v) {
            $this->salesorderbase = $v;
            $this->modifiedColumns[BookingdTableMap::COL_SALESORDERBASE] = true;
        }

        return $this;
    } // setSalesorderbase()

    /**
     * Set the value of [origorderline] column.
     *
     * @param int $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setOrigorderline($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->origorderline !== $v) {
            $this->origorderline = $v;
            $this->modifiedColumns[BookingdTableMap::COL_ORIGORDERLINE] = true;
        }

        return $this;
    } // setOrigorderline()

    /**
     * Set the value of [itemid] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[BookingdTableMap::COL_ITEMID] = true;
        }

        return $this;
    } // setItemid()

    /**
     * Set the value of [salesordernbr] column.
     *
     * @param int $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setSalesordernbr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->salesordernbr !== $v) {
            $this->salesordernbr = $v;
            $this->modifiedColumns[BookingdTableMap::COL_SALESORDERNBR] = true;
        }

        return $this;
    } // setSalesordernbr()

    /**
     * Set the value of [salesperson1] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setSalesperson1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesperson1 !== $v) {
            $this->salesperson1 = $v;
            $this->modifiedColumns[BookingdTableMap::COL_SALESPERSON1] = true;
        }

        return $this;
    } // setSalesperson1()

    /**
     * Set the value of [b4qty] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setB4qty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->b4qty !== $v) {
            $this->b4qty = $v;
            $this->modifiedColumns[BookingdTableMap::COL_B4QTY] = true;
        }

        return $this;
    } // setB4qty()

    /**
     * Set the value of [b4price] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setB4price($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->b4price !== $v) {
            $this->b4price = $v;
            $this->modifiedColumns[BookingdTableMap::COL_B4PRICE] = true;
        }

        return $this;
    } // setB4price()

    /**
     * Set the value of [b4uom] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setB4uom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->b4uom !== $v) {
            $this->b4uom = $v;
            $this->modifiedColumns[BookingdTableMap::COL_B4UOM] = true;
        }

        return $this;
    } // setB4uom()

    /**
     * Set the value of [afterqty] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setAfterqty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->afterqty !== $v) {
            $this->afterqty = $v;
            $this->modifiedColumns[BookingdTableMap::COL_AFTERQTY] = true;
        }

        return $this;
    } // setAfterqty()

    /**
     * Set the value of [afterprice] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setAfterprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->afterprice !== $v) {
            $this->afterprice = $v;
            $this->modifiedColumns[BookingdTableMap::COL_AFTERPRICE] = true;
        }

        return $this;
    } // setAfterprice()

    /**
     * Set the value of [afteruom] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setAfteruom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->afteruom !== $v) {
            $this->afteruom = $v;
            $this->modifiedColumns[BookingdTableMap::COL_AFTERUOM] = true;
        }

        return $this;
    } // setAfteruom()

    /**
     * Set the value of [netamount] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setNetamount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->netamount !== $v) {
            $this->netamount = $v;
            $this->modifiedColumns[BookingdTableMap::COL_NETAMOUNT] = true;
        }

        return $this;
    } // setNetamount()

    /**
     * Set the value of [createdate] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setCreatedate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->createdate !== $v) {
            $this->createdate = $v;
            $this->modifiedColumns[BookingdTableMap::COL_CREATEDATE] = true;
        }

        return $this;
    } // setCreatedate()

    /**
     * Set the value of [createtime] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setCreatetime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->createtime !== $v) {
            $this->createtime = $v;
            $this->modifiedColumns[BookingdTableMap::COL_CREATETIME] = true;
        }

        return $this;
    } // setCreatetime()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Bookingd The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[BookingdTableMap::COL_DUMMY] = true;
        }

        return $this;
    } // setDummy()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->b4qty !== '0.000') {
                return false;
            }

            if ($this->b4price !== '0.000') {
                return false;
            }

            if ($this->afterqty !== '0.000') {
                return false;
            }

            if ($this->afterprice !== '0.000') {
                return false;
            }

            if ($this->netamount !== '0.00') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : BookingdTableMap::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bookdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : BookingdTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : BookingdTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : BookingdTableMap::translateFieldName('Salesorderbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesorderbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : BookingdTableMap::translateFieldName('Origorderline', TableMap::TYPE_PHPNAME, $indexType)];
            $this->origorderline = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : BookingdTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : BookingdTableMap::translateFieldName('Salesordernbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesordernbr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : BookingdTableMap::translateFieldName('Salesperson1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesperson1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : BookingdTableMap::translateFieldName('B4qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->b4qty = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : BookingdTableMap::translateFieldName('B4price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->b4price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : BookingdTableMap::translateFieldName('B4uom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->b4uom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : BookingdTableMap::translateFieldName('Afterqty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->afterqty = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : BookingdTableMap::translateFieldName('Afterprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->afterprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : BookingdTableMap::translateFieldName('Afteruom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->afteruom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : BookingdTableMap::translateFieldName('Netamount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->netamount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : BookingdTableMap::translateFieldName('Createdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->createdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : BookingdTableMap::translateFieldName('Createtime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->createtime = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : BookingdTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 18; // 18 = BookingdTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Bookingd'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookingdTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildBookingdQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Bookingd::setDeleted()
     * @see Bookingd::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingdTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildBookingdQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingdTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                BookingdTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BookingdTableMap::COL_BOOKDATE)) {
            $modifiedColumns[':p' . $index++]  = 'bookdate';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_SALESORDERBASE)) {
            $modifiedColumns[':p' . $index++]  = 'salesorderbase';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_ORIGORDERLINE)) {
            $modifiedColumns[':p' . $index++]  = 'origorderline';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_SALESORDERNBR)) {
            $modifiedColumns[':p' . $index++]  = 'salesordernbr';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_SALESPERSON1)) {
            $modifiedColumns[':p' . $index++]  = 'salesperson1';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_B4QTY)) {
            $modifiedColumns[':p' . $index++]  = 'b4qty';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_B4PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'b4price';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_B4UOM)) {
            $modifiedColumns[':p' . $index++]  = 'b4uom';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_AFTERQTY)) {
            $modifiedColumns[':p' . $index++]  = 'afterqty';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_AFTERPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'afterprice';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_AFTERUOM)) {
            $modifiedColumns[':p' . $index++]  = 'afteruom';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_NETAMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'netamount';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_CREATEDATE)) {
            $modifiedColumns[':p' . $index++]  = 'createdate';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_CREATETIME)) {
            $modifiedColumns[':p' . $index++]  = 'createtime';
        }
        if ($this->isColumnModified(BookingdTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO bookingd (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'bookdate':
                        $stmt->bindValue($identifier, $this->bookdate, PDO::PARAM_STR);
                        break;
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
                        break;
                    case 'shiptoid':
                        $stmt->bindValue($identifier, $this->shiptoid, PDO::PARAM_STR);
                        break;
                    case 'salesorderbase':
                        $stmt->bindValue($identifier, $this->salesorderbase, PDO::PARAM_INT);
                        break;
                    case 'origorderline':
                        $stmt->bindValue($identifier, $this->origorderline, PDO::PARAM_INT);
                        break;
                    case 'itemid':
                        $stmt->bindValue($identifier, $this->itemid, PDO::PARAM_STR);
                        break;
                    case 'salesordernbr':
                        $stmt->bindValue($identifier, $this->salesordernbr, PDO::PARAM_INT);
                        break;
                    case 'salesperson1':
                        $stmt->bindValue($identifier, $this->salesperson1, PDO::PARAM_STR);
                        break;
                    case 'b4qty':
                        $stmt->bindValue($identifier, $this->b4qty, PDO::PARAM_STR);
                        break;
                    case 'b4price':
                        $stmt->bindValue($identifier, $this->b4price, PDO::PARAM_STR);
                        break;
                    case 'b4uom':
                        $stmt->bindValue($identifier, $this->b4uom, PDO::PARAM_STR);
                        break;
                    case 'afterqty':
                        $stmt->bindValue($identifier, $this->afterqty, PDO::PARAM_STR);
                        break;
                    case 'afterprice':
                        $stmt->bindValue($identifier, $this->afterprice, PDO::PARAM_STR);
                        break;
                    case 'afteruom':
                        $stmt->bindValue($identifier, $this->afteruom, PDO::PARAM_STR);
                        break;
                    case 'netamount':
                        $stmt->bindValue($identifier, $this->netamount, PDO::PARAM_STR);
                        break;
                    case 'createdate':
                        $stmt->bindValue($identifier, $this->createdate, PDO::PARAM_STR);
                        break;
                    case 'createtime':
                        $stmt->bindValue($identifier, $this->createtime, PDO::PARAM_STR);
                        break;
                    case 'dummy':
                        $stmt->bindValue($identifier, $this->dummy, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = BookingdTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getBookdate();
                break;
            case 1:
                return $this->getCustid();
                break;
            case 2:
                return $this->getShiptoid();
                break;
            case 3:
                return $this->getSalesorderbase();
                break;
            case 4:
                return $this->getOrigorderline();
                break;
            case 5:
                return $this->getItemid();
                break;
            case 6:
                return $this->getSalesordernbr();
                break;
            case 7:
                return $this->getSalesperson1();
                break;
            case 8:
                return $this->getB4qty();
                break;
            case 9:
                return $this->getB4price();
                break;
            case 10:
                return $this->getB4uom();
                break;
            case 11:
                return $this->getAfterqty();
                break;
            case 12:
                return $this->getAfterprice();
                break;
            case 13:
                return $this->getAfteruom();
                break;
            case 14:
                return $this->getNetamount();
                break;
            case 15:
                return $this->getCreatedate();
                break;
            case 16:
                return $this->getCreatetime();
                break;
            case 17:
                return $this->getDummy();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Bookingd'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Bookingd'][$this->hashCode()] = true;
        $keys = BookingdTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getBookdate(),
            $keys[1] => $this->getCustid(),
            $keys[2] => $this->getShiptoid(),
            $keys[3] => $this->getSalesorderbase(),
            $keys[4] => $this->getOrigorderline(),
            $keys[5] => $this->getItemid(),
            $keys[6] => $this->getSalesordernbr(),
            $keys[7] => $this->getSalesperson1(),
            $keys[8] => $this->getB4qty(),
            $keys[9] => $this->getB4price(),
            $keys[10] => $this->getB4uom(),
            $keys[11] => $this->getAfterqty(),
            $keys[12] => $this->getAfterprice(),
            $keys[13] => $this->getAfteruom(),
            $keys[14] => $this->getNetamount(),
            $keys[15] => $this->getCreatedate(),
            $keys[16] => $this->getCreatetime(),
            $keys[17] => $this->getDummy(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Bookingd
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = BookingdTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Bookingd
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setBookdate($value);
                break;
            case 1:
                $this->setCustid($value);
                break;
            case 2:
                $this->setShiptoid($value);
                break;
            case 3:
                $this->setSalesorderbase($value);
                break;
            case 4:
                $this->setOrigorderline($value);
                break;
            case 5:
                $this->setItemid($value);
                break;
            case 6:
                $this->setSalesordernbr($value);
                break;
            case 7:
                $this->setSalesperson1($value);
                break;
            case 8:
                $this->setB4qty($value);
                break;
            case 9:
                $this->setB4price($value);
                break;
            case 10:
                $this->setB4uom($value);
                break;
            case 11:
                $this->setAfterqty($value);
                break;
            case 12:
                $this->setAfterprice($value);
                break;
            case 13:
                $this->setAfteruom($value);
                break;
            case 14:
                $this->setNetamount($value);
                break;
            case 15:
                $this->setCreatedate($value);
                break;
            case 16:
                $this->setCreatetime($value);
                break;
            case 17:
                $this->setDummy($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = BookingdTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setBookdate($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCustid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setShiptoid($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSalesorderbase($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setOrigorderline($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setItemid($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSalesordernbr($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSalesperson1($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setB4qty($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setB4price($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setB4uom($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setAfterqty($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setAfterprice($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setAfteruom($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setNetamount($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCreatedate($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCreatetime($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setDummy($arr[$keys[17]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Bookingd The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BookingdTableMap::DATABASE_NAME);

        if ($this->isColumnModified(BookingdTableMap::COL_BOOKDATE)) {
            $criteria->add(BookingdTableMap::COL_BOOKDATE, $this->bookdate);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_CUSTID)) {
            $criteria->add(BookingdTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_SHIPTOID)) {
            $criteria->add(BookingdTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_SALESORDERBASE)) {
            $criteria->add(BookingdTableMap::COL_SALESORDERBASE, $this->salesorderbase);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_ORIGORDERLINE)) {
            $criteria->add(BookingdTableMap::COL_ORIGORDERLINE, $this->origorderline);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_ITEMID)) {
            $criteria->add(BookingdTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_SALESORDERNBR)) {
            $criteria->add(BookingdTableMap::COL_SALESORDERNBR, $this->salesordernbr);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_SALESPERSON1)) {
            $criteria->add(BookingdTableMap::COL_SALESPERSON1, $this->salesperson1);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_B4QTY)) {
            $criteria->add(BookingdTableMap::COL_B4QTY, $this->b4qty);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_B4PRICE)) {
            $criteria->add(BookingdTableMap::COL_B4PRICE, $this->b4price);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_B4UOM)) {
            $criteria->add(BookingdTableMap::COL_B4UOM, $this->b4uom);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_AFTERQTY)) {
            $criteria->add(BookingdTableMap::COL_AFTERQTY, $this->afterqty);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_AFTERPRICE)) {
            $criteria->add(BookingdTableMap::COL_AFTERPRICE, $this->afterprice);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_AFTERUOM)) {
            $criteria->add(BookingdTableMap::COL_AFTERUOM, $this->afteruom);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_NETAMOUNT)) {
            $criteria->add(BookingdTableMap::COL_NETAMOUNT, $this->netamount);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_CREATEDATE)) {
            $criteria->add(BookingdTableMap::COL_CREATEDATE, $this->createdate);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_CREATETIME)) {
            $criteria->add(BookingdTableMap::COL_CREATETIME, $this->createtime);
        }
        if ($this->isColumnModified(BookingdTableMap::COL_DUMMY)) {
            $criteria->add(BookingdTableMap::COL_DUMMY, $this->dummy);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildBookingdQuery::create();
        $criteria->add(BookingdTableMap::COL_BOOKDATE, $this->bookdate);
        $criteria->add(BookingdTableMap::COL_CUSTID, $this->custid);
        $criteria->add(BookingdTableMap::COL_SHIPTOID, $this->shiptoid);
        $criteria->add(BookingdTableMap::COL_SALESORDERBASE, $this->salesorderbase);
        $criteria->add(BookingdTableMap::COL_ORIGORDERLINE, $this->origorderline);
        $criteria->add(BookingdTableMap::COL_ITEMID, $this->itemid);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getBookdate() &&
            null !== $this->getCustid() &&
            null !== $this->getShiptoid() &&
            null !== $this->getSalesorderbase() &&
            null !== $this->getOrigorderline() &&
            null !== $this->getItemid();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getBookdate();
        $pks[1] = $this->getCustid();
        $pks[2] = $this->getShiptoid();
        $pks[3] = $this->getSalesorderbase();
        $pks[4] = $this->getOrigorderline();
        $pks[5] = $this->getItemid();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param      array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setBookdate($keys[0]);
        $this->setCustid($keys[1]);
        $this->setShiptoid($keys[2]);
        $this->setSalesorderbase($keys[3]);
        $this->setOrigorderline($keys[4]);
        $this->setItemid($keys[5]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getBookdate()) && (null === $this->getCustid()) && (null === $this->getShiptoid()) && (null === $this->getSalesorderbase()) && (null === $this->getOrigorderline()) && (null === $this->getItemid());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Bookingd (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setBookdate($this->getBookdate());
        $copyObj->setCustid($this->getCustid());
        $copyObj->setShiptoid($this->getShiptoid());
        $copyObj->setSalesorderbase($this->getSalesorderbase());
        $copyObj->setOrigorderline($this->getOrigorderline());
        $copyObj->setItemid($this->getItemid());
        $copyObj->setSalesordernbr($this->getSalesordernbr());
        $copyObj->setSalesperson1($this->getSalesperson1());
        $copyObj->setB4qty($this->getB4qty());
        $copyObj->setB4price($this->getB4price());
        $copyObj->setB4uom($this->getB4uom());
        $copyObj->setAfterqty($this->getAfterqty());
        $copyObj->setAfterprice($this->getAfterprice());
        $copyObj->setAfteruom($this->getAfteruom());
        $copyObj->setNetamount($this->getNetamount());
        $copyObj->setCreatedate($this->getCreatedate());
        $copyObj->setCreatetime($this->getCreatetime());
        $copyObj->setDummy($this->getDummy());
        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Bookingd Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->bookdate = null;
        $this->custid = null;
        $this->shiptoid = null;
        $this->salesorderbase = null;
        $this->origorderline = null;
        $this->itemid = null;
        $this->salesordernbr = null;
        $this->salesperson1 = null;
        $this->b4qty = null;
        $this->b4price = null;
        $this->b4uom = null;
        $this->afterqty = null;
        $this->afterprice = null;
        $this->afteruom = null;
        $this->netamount = null;
        $this->createdate = null;
        $this->createtime = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BookingdTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
