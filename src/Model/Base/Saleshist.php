<?php

namespace Base;

use \SaleshistQuery as ChildSaleshistQuery;
use \Exception;
use \PDO;
use Map\SaleshistTableMap;
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
 * Base class that represents a row from the 'saleshist' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Saleshist implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\SaleshistTableMap';


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
     * The value for the ordernumber field.
     *
     * @var        string
     */
    protected $ordernumber;

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
     * The value for the custname field.
     *
     * @var        string
     */
    protected $custname;

    /**
     * The value for the custpo field.
     *
     * @var        string
     */
    protected $custpo;

    /**
     * The value for the order_date field.
     *
     * @var        int
     */
    protected $order_date;

    /**
     * The value for the invoice_date field.
     *
     * @var        int
     */
    protected $invoice_date;

    /**
     * The value for the salesperson_1 field.
     *
     * @var        string
     */
    protected $salesperson_1;

    /**
     * The value for the sp1login field.
     *
     * @var        string
     */
    protected $sp1login;

    /**
     * The value for the has_tracking field.
     *
     * @var        string
     */
    protected $has_tracking;

    /**
     * The value for the subtotal_nontax field.
     *
     * @var        string
     */
    protected $subtotal_nontax;

    /**
     * The value for the total_tax field.
     *
     * @var        string
     */
    protected $total_tax;

    /**
     * The value for the total_freight field.
     *
     * @var        string
     */
    protected $total_freight;

    /**
     * The value for the total_misc field.
     *
     * @var        string
     */
    protected $total_misc;

    /**
     * The value for the total_order field.
     *
     * @var        string
     */
    protected $total_order;

    /**
     * The value for the has_documents field.
     *
     * @var        string
     */
    protected $has_documents;

    /**
     * The value for the has_notes field.
     *
     * @var        string
     */
    protected $has_notes;

    /**
     * The value for the date field.
     *
     * @var        int
     */
    protected $date;

    /**
     * The value for the time field.
     *
     * @var        int
     */
    protected $time;

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
     * Initializes internal state of Base\Saleshist object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>Saleshist</code> instance.  If
     * <code>obj</code> is an instance of <code>Saleshist</code>, delegates to
     * <code>equals(Saleshist)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Saleshist The current object, for fluid interface
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
     * Get the [ordernumber] column value.
     *
     * @return string
     */
    public function getOrdernumber()
    {
        return $this->ordernumber;
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
     * Get the [custname] column value.
     *
     * @return string
     */
    public function getCustname()
    {
        return $this->custname;
    }

    /**
     * Get the [custpo] column value.
     *
     * @return string
     */
    public function getCustpo()
    {
        return $this->custpo;
    }

    /**
     * Get the [order_date] column value.
     *
     * @return int
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * Get the [invoice_date] column value.
     *
     * @return int
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * Get the [salesperson_1] column value.
     *
     * @return string
     */
    public function getSalesperson1()
    {
        return $this->salesperson_1;
    }

    /**
     * Get the [sp1login] column value.
     *
     * @return string
     */
    public function getSp1login()
    {
        return $this->sp1login;
    }

    /**
     * Get the [has_tracking] column value.
     *
     * @return string
     */
    public function getHasTracking()
    {
        return $this->has_tracking;
    }

    /**
     * Get the [subtotal_nontax] column value.
     *
     * @return string
     */
    public function getSubtotalNontax()
    {
        return $this->subtotal_nontax;
    }

    /**
     * Get the [total_tax] column value.
     *
     * @return string
     */
    public function getTotalTax()
    {
        return $this->total_tax;
    }

    /**
     * Get the [total_freight] column value.
     *
     * @return string
     */
    public function getTotalFreight()
    {
        return $this->total_freight;
    }

    /**
     * Get the [total_misc] column value.
     *
     * @return string
     */
    public function getTotalMisc()
    {
        return $this->total_misc;
    }

    /**
     * Get the [total_order] column value.
     *
     * @return string
     */
    public function getTotalOrder()
    {
        return $this->total_order;
    }

    /**
     * Get the [has_documents] column value.
     *
     * @return string
     */
    public function getHasDocuments()
    {
        return $this->has_documents;
    }

    /**
     * Get the [has_notes] column value.
     *
     * @return string
     */
    public function getHasNotes()
    {
        return $this->has_notes;
    }

    /**
     * Get the [date] column value.
     *
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the [time] column value.
     *
     * @return int
     */
    public function getTime()
    {
        return $this->time;
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
     * Set the value of [ordernumber] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setOrdernumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordernumber !== $v) {
            $this->ordernumber = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_ORDERNUMBER] = true;
        }

        return $this;
    } // setOrdernumber()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    } // setShiptoid()

    /**
     * Set the value of [custname] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setCustname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custname !== $v) {
            $this->custname = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_CUSTNAME] = true;
        }

        return $this;
    } // setCustname()

    /**
     * Set the value of [custpo] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setCustpo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custpo !== $v) {
            $this->custpo = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_CUSTPO] = true;
        }

        return $this;
    } // setCustpo()

    /**
     * Set the value of [order_date] column.
     *
     * @param int $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setOrderDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->order_date !== $v) {
            $this->order_date = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_ORDER_DATE] = true;
        }

        return $this;
    } // setOrderDate()

    /**
     * Set the value of [invoice_date] column.
     *
     * @param int $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setInvoiceDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->invoice_date !== $v) {
            $this->invoice_date = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_INVOICE_DATE] = true;
        }

        return $this;
    } // setInvoiceDate()

    /**
     * Set the value of [salesperson_1] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setSalesperson1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesperson_1 !== $v) {
            $this->salesperson_1 = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_SALESPERSON_1] = true;
        }

        return $this;
    } // setSalesperson1()

    /**
     * Set the value of [sp1login] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setSp1login($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp1login !== $v) {
            $this->sp1login = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_SP1LOGIN] = true;
        }

        return $this;
    } // setSp1login()

    /**
     * Set the value of [has_tracking] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setHasTracking($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->has_tracking !== $v) {
            $this->has_tracking = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_HAS_TRACKING] = true;
        }

        return $this;
    } // setHasTracking()

    /**
     * Set the value of [subtotal_nontax] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setSubtotalNontax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->subtotal_nontax !== $v) {
            $this->subtotal_nontax = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_SUBTOTAL_NONTAX] = true;
        }

        return $this;
    } // setSubtotalNontax()

    /**
     * Set the value of [total_tax] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setTotalTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_tax !== $v) {
            $this->total_tax = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_TOTAL_TAX] = true;
        }

        return $this;
    } // setTotalTax()

    /**
     * Set the value of [total_freight] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setTotalFreight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_freight !== $v) {
            $this->total_freight = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_TOTAL_FREIGHT] = true;
        }

        return $this;
    } // setTotalFreight()

    /**
     * Set the value of [total_misc] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setTotalMisc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_misc !== $v) {
            $this->total_misc = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_TOTAL_MISC] = true;
        }

        return $this;
    } // setTotalMisc()

    /**
     * Set the value of [total_order] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setTotalOrder($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_order !== $v) {
            $this->total_order = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_TOTAL_ORDER] = true;
        }

        return $this;
    } // setTotalOrder()

    /**
     * Set the value of [has_documents] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setHasDocuments($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->has_documents !== $v) {
            $this->has_documents = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_HAS_DOCUMENTS] = true;
        }

        return $this;
    } // setHasDocuments()

    /**
     * Set the value of [has_notes] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setHasNotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->has_notes !== $v) {
            $this->has_notes = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_HAS_NOTES] = true;
        }

        return $this;
    } // setHasNotes()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Saleshist The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[SaleshistTableMap::COL_DUMMY] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SaleshistTableMap::translateFieldName('Ordernumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordernumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SaleshistTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SaleshistTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SaleshistTableMap::translateFieldName('Custname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SaleshistTableMap::translateFieldName('Custpo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custpo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SaleshistTableMap::translateFieldName('OrderDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->order_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SaleshistTableMap::translateFieldName('InvoiceDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SaleshistTableMap::translateFieldName('Salesperson1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesperson_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SaleshistTableMap::translateFieldName('Sp1login', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp1login = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SaleshistTableMap::translateFieldName('HasTracking', TableMap::TYPE_PHPNAME, $indexType)];
            $this->has_tracking = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SaleshistTableMap::translateFieldName('SubtotalNontax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->subtotal_nontax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SaleshistTableMap::translateFieldName('TotalTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SaleshistTableMap::translateFieldName('TotalFreight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_freight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SaleshistTableMap::translateFieldName('TotalMisc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_misc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SaleshistTableMap::translateFieldName('TotalOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_order = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SaleshistTableMap::translateFieldName('HasDocuments', TableMap::TYPE_PHPNAME, $indexType)];
            $this->has_documents = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SaleshistTableMap::translateFieldName('HasNotes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->has_notes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SaleshistTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : SaleshistTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : SaleshistTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 20; // 20 = SaleshistTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Saleshist'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SaleshistTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSaleshistQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Saleshist::setDeleted()
     * @see Saleshist::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SaleshistTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSaleshistQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SaleshistTableMap::DATABASE_NAME);
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
                SaleshistTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(SaleshistTableMap::COL_ORDERNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'ordernumber';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_CUSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'custname';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_CUSTPO)) {
            $modifiedColumns[':p' . $index++]  = 'custpo';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_ORDER_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'order_date';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_INVOICE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_date';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_SALESPERSON_1)) {
            $modifiedColumns[':p' . $index++]  = 'salesperson_1';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_SP1LOGIN)) {
            $modifiedColumns[':p' . $index++]  = 'sp1login';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_HAS_TRACKING)) {
            $modifiedColumns[':p' . $index++]  = 'has_tracking';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_SUBTOTAL_NONTAX)) {
            $modifiedColumns[':p' . $index++]  = 'subtotal_nontax';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TOTAL_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'total_tax';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TOTAL_FREIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'total_freight';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TOTAL_MISC)) {
            $modifiedColumns[':p' . $index++]  = 'total_misc';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TOTAL_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'total_order';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_HAS_DOCUMENTS)) {
            $modifiedColumns[':p' . $index++]  = 'has_documents';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_HAS_NOTES)) {
            $modifiedColumns[':p' . $index++]  = 'has_notes';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO saleshist (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ordernumber':
                        $stmt->bindValue($identifier, $this->ordernumber, PDO::PARAM_STR);
                        break;
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
                        break;
                    case 'shiptoid':
                        $stmt->bindValue($identifier, $this->shiptoid, PDO::PARAM_STR);
                        break;
                    case 'custname':
                        $stmt->bindValue($identifier, $this->custname, PDO::PARAM_STR);
                        break;
                    case 'custpo':
                        $stmt->bindValue($identifier, $this->custpo, PDO::PARAM_STR);
                        break;
                    case 'order_date':
                        $stmt->bindValue($identifier, $this->order_date, PDO::PARAM_INT);
                        break;
                    case 'invoice_date':
                        $stmt->bindValue($identifier, $this->invoice_date, PDO::PARAM_INT);
                        break;
                    case 'salesperson_1':
                        $stmt->bindValue($identifier, $this->salesperson_1, PDO::PARAM_STR);
                        break;
                    case 'sp1login':
                        $stmt->bindValue($identifier, $this->sp1login, PDO::PARAM_STR);
                        break;
                    case 'has_tracking':
                        $stmt->bindValue($identifier, $this->has_tracking, PDO::PARAM_STR);
                        break;
                    case 'subtotal_nontax':
                        $stmt->bindValue($identifier, $this->subtotal_nontax, PDO::PARAM_STR);
                        break;
                    case 'total_tax':
                        $stmt->bindValue($identifier, $this->total_tax, PDO::PARAM_STR);
                        break;
                    case 'total_freight':
                        $stmt->bindValue($identifier, $this->total_freight, PDO::PARAM_STR);
                        break;
                    case 'total_misc':
                        $stmt->bindValue($identifier, $this->total_misc, PDO::PARAM_STR);
                        break;
                    case 'total_order':
                        $stmt->bindValue($identifier, $this->total_order, PDO::PARAM_STR);
                        break;
                    case 'has_documents':
                        $stmt->bindValue($identifier, $this->has_documents, PDO::PARAM_STR);
                        break;
                    case 'has_notes':
                        $stmt->bindValue($identifier, $this->has_notes, PDO::PARAM_STR);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);
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
        $pos = SaleshistTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getOrdernumber();
                break;
            case 1:
                return $this->getCustid();
                break;
            case 2:
                return $this->getShiptoid();
                break;
            case 3:
                return $this->getCustname();
                break;
            case 4:
                return $this->getCustpo();
                break;
            case 5:
                return $this->getOrderDate();
                break;
            case 6:
                return $this->getInvoiceDate();
                break;
            case 7:
                return $this->getSalesperson1();
                break;
            case 8:
                return $this->getSp1login();
                break;
            case 9:
                return $this->getHasTracking();
                break;
            case 10:
                return $this->getSubtotalNontax();
                break;
            case 11:
                return $this->getTotalTax();
                break;
            case 12:
                return $this->getTotalFreight();
                break;
            case 13:
                return $this->getTotalMisc();
                break;
            case 14:
                return $this->getTotalOrder();
                break;
            case 15:
                return $this->getHasDocuments();
                break;
            case 16:
                return $this->getHasNotes();
                break;
            case 17:
                return $this->getDate();
                break;
            case 18:
                return $this->getTime();
                break;
            case 19:
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

        if (isset($alreadyDumpedObjects['Saleshist'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Saleshist'][$this->hashCode()] = true;
        $keys = SaleshistTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getOrdernumber(),
            $keys[1] => $this->getCustid(),
            $keys[2] => $this->getShiptoid(),
            $keys[3] => $this->getCustname(),
            $keys[4] => $this->getCustpo(),
            $keys[5] => $this->getOrderDate(),
            $keys[6] => $this->getInvoiceDate(),
            $keys[7] => $this->getSalesperson1(),
            $keys[8] => $this->getSp1login(),
            $keys[9] => $this->getHasTracking(),
            $keys[10] => $this->getSubtotalNontax(),
            $keys[11] => $this->getTotalTax(),
            $keys[12] => $this->getTotalFreight(),
            $keys[13] => $this->getTotalMisc(),
            $keys[14] => $this->getTotalOrder(),
            $keys[15] => $this->getHasDocuments(),
            $keys[16] => $this->getHasNotes(),
            $keys[17] => $this->getDate(),
            $keys[18] => $this->getTime(),
            $keys[19] => $this->getDummy(),
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
     * @return $this|\Saleshist
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SaleshistTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Saleshist
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setOrdernumber($value);
                break;
            case 1:
                $this->setCustid($value);
                break;
            case 2:
                $this->setShiptoid($value);
                break;
            case 3:
                $this->setCustname($value);
                break;
            case 4:
                $this->setCustpo($value);
                break;
            case 5:
                $this->setOrderDate($value);
                break;
            case 6:
                $this->setInvoiceDate($value);
                break;
            case 7:
                $this->setSalesperson1($value);
                break;
            case 8:
                $this->setSp1login($value);
                break;
            case 9:
                $this->setHasTracking($value);
                break;
            case 10:
                $this->setSubtotalNontax($value);
                break;
            case 11:
                $this->setTotalTax($value);
                break;
            case 12:
                $this->setTotalFreight($value);
                break;
            case 13:
                $this->setTotalMisc($value);
                break;
            case 14:
                $this->setTotalOrder($value);
                break;
            case 15:
                $this->setHasDocuments($value);
                break;
            case 16:
                $this->setHasNotes($value);
                break;
            case 17:
                $this->setDate($value);
                break;
            case 18:
                $this->setTime($value);
                break;
            case 19:
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
        $keys = SaleshistTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setOrdernumber($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCustid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setShiptoid($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCustname($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCustpo($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setOrderDate($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setInvoiceDate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSalesperson1($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSp1login($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setHasTracking($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSubtotalNontax($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTotalTax($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTotalFreight($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTotalMisc($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTotalOrder($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setHasDocuments($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setHasNotes($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setDate($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTime($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setDummy($arr[$keys[19]]);
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
     * @return $this|\Saleshist The current object, for fluid interface
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
        $criteria = new Criteria(SaleshistTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SaleshistTableMap::COL_ORDERNUMBER)) {
            $criteria->add(SaleshistTableMap::COL_ORDERNUMBER, $this->ordernumber);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_CUSTID)) {
            $criteria->add(SaleshistTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_SHIPTOID)) {
            $criteria->add(SaleshistTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_CUSTNAME)) {
            $criteria->add(SaleshistTableMap::COL_CUSTNAME, $this->custname);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_CUSTPO)) {
            $criteria->add(SaleshistTableMap::COL_CUSTPO, $this->custpo);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_ORDER_DATE)) {
            $criteria->add(SaleshistTableMap::COL_ORDER_DATE, $this->order_date);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_INVOICE_DATE)) {
            $criteria->add(SaleshistTableMap::COL_INVOICE_DATE, $this->invoice_date);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_SALESPERSON_1)) {
            $criteria->add(SaleshistTableMap::COL_SALESPERSON_1, $this->salesperson_1);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_SP1LOGIN)) {
            $criteria->add(SaleshistTableMap::COL_SP1LOGIN, $this->sp1login);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_HAS_TRACKING)) {
            $criteria->add(SaleshistTableMap::COL_HAS_TRACKING, $this->has_tracking);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_SUBTOTAL_NONTAX)) {
            $criteria->add(SaleshistTableMap::COL_SUBTOTAL_NONTAX, $this->subtotal_nontax);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TOTAL_TAX)) {
            $criteria->add(SaleshistTableMap::COL_TOTAL_TAX, $this->total_tax);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TOTAL_FREIGHT)) {
            $criteria->add(SaleshistTableMap::COL_TOTAL_FREIGHT, $this->total_freight);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TOTAL_MISC)) {
            $criteria->add(SaleshistTableMap::COL_TOTAL_MISC, $this->total_misc);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TOTAL_ORDER)) {
            $criteria->add(SaleshistTableMap::COL_TOTAL_ORDER, $this->total_order);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_HAS_DOCUMENTS)) {
            $criteria->add(SaleshistTableMap::COL_HAS_DOCUMENTS, $this->has_documents);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_HAS_NOTES)) {
            $criteria->add(SaleshistTableMap::COL_HAS_NOTES, $this->has_notes);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_DATE)) {
            $criteria->add(SaleshistTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_TIME)) {
            $criteria->add(SaleshistTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(SaleshistTableMap::COL_DUMMY)) {
            $criteria->add(SaleshistTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildSaleshistQuery::create();
        $criteria->add(SaleshistTableMap::COL_ORDERNUMBER, $this->ordernumber);

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
        $validPk = null !== $this->getOrdernumber();

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
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getOrdernumber();
    }

    /**
     * Generic method to set the primary key (ordernumber column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setOrdernumber($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getOrdernumber();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Saleshist (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setOrdernumber($this->getOrdernumber());
        $copyObj->setCustid($this->getCustid());
        $copyObj->setShiptoid($this->getShiptoid());
        $copyObj->setCustname($this->getCustname());
        $copyObj->setCustpo($this->getCustpo());
        $copyObj->setOrderDate($this->getOrderDate());
        $copyObj->setInvoiceDate($this->getInvoiceDate());
        $copyObj->setSalesperson1($this->getSalesperson1());
        $copyObj->setSp1login($this->getSp1login());
        $copyObj->setHasTracking($this->getHasTracking());
        $copyObj->setSubtotalNontax($this->getSubtotalNontax());
        $copyObj->setTotalTax($this->getTotalTax());
        $copyObj->setTotalFreight($this->getTotalFreight());
        $copyObj->setTotalMisc($this->getTotalMisc());
        $copyObj->setTotalOrder($this->getTotalOrder());
        $copyObj->setHasDocuments($this->getHasDocuments());
        $copyObj->setHasNotes($this->getHasNotes());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
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
     * @return \Saleshist Clone of current object.
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
        $this->ordernumber = null;
        $this->custid = null;
        $this->shiptoid = null;
        $this->custname = null;
        $this->custpo = null;
        $this->order_date = null;
        $this->invoice_date = null;
        $this->salesperson_1 = null;
        $this->sp1login = null;
        $this->has_tracking = null;
        $this->subtotal_nontax = null;
        $this->total_tax = null;
        $this->total_freight = null;
        $this->total_misc = null;
        $this->total_order = null;
        $this->has_documents = null;
        $this->has_notes = null;
        $this->date = null;
        $this->time = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
        return (string) $this->exportTo(SaleshistTableMap::DEFAULT_STRING_FORMAT);
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
