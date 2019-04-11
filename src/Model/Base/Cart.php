<?php

namespace Base;

use \CartQuery as ChildCartQuery;
use \Exception;
use \PDO;
use Map\CartTableMap;
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
 * Base class that represents a row from the 'cart' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Cart implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CartTableMap';


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
     * The value for the sessionid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sessionid;

    /**
     * The value for the recordno field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $recordno;

    /**
     * The value for the date field.
     *
     * @var        string
     */
    protected $date;

    /**
     * The value for the time field.
     *
     * @var        int
     */
    protected $time;

    /**
     * The value for the itemid field.
     *
     * @var        string
     */
    protected $itemid;

    /**
     * The value for the price field.
     *
     * @var        string
     */
    protected $price;

    /**
     * The value for the qty field.
     *
     * @var        int
     */
    protected $qty;

    /**
     * The value for the amount field.
     *
     * @var        string
     */
    protected $amount;

    /**
     * The value for the desc1 field.
     *
     * @var        string
     */
    protected $desc1;

    /**
     * The value for the desc2 field.
     *
     * @var        string
     */
    protected $desc2;

    /**
     * The value for the errormes field.
     *
     * @var        string
     */
    protected $errormes;

    /**
     * The value for the entitemid field.
     *
     * @var        string
     */
    protected $entitemid;

    /**
     * The value for the uomdesc field.
     *
     * @var        string
     */
    protected $uomdesc;

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
        $this->sessionid = '';
        $this->recordno = 0;
    }

    /**
     * Initializes internal state of Base\Cart object.
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
     * Compares this with another <code>Cart</code> instance.  If
     * <code>obj</code> is an instance of <code>Cart</code>, delegates to
     * <code>equals(Cart)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Cart The current object, for fluid interface
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
     * Get the [sessionid] column value.
     *
     * @return string
     */
    public function getSessionid()
    {
        return $this->sessionid;
    }

    /**
     * Get the [recordno] column value.
     *
     * @return int
     */
    public function getRecordno()
    {
        return $this->recordno;
    }

    /**
     * Get the [date] column value.
     *
     * @return string
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
     * Get the [itemid] column value.
     *
     * @return string
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * Get the [price] column value.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [qty] column value.
     *
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Get the [amount] column value.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [desc1] column value.
     *
     * @return string
     */
    public function getDesc1()
    {
        return $this->desc1;
    }

    /**
     * Get the [desc2] column value.
     *
     * @return string
     */
    public function getDesc2()
    {
        return $this->desc2;
    }

    /**
     * Get the [errormes] column value.
     *
     * @return string
     */
    public function getErrormes()
    {
        return $this->errormes;
    }

    /**
     * Get the [entitemid] column value.
     *
     * @return string
     */
    public function getEntitemid()
    {
        return $this->entitemid;
    }

    /**
     * Get the [uomdesc] column value.
     *
     * @return string
     */
    public function getUomdesc()
    {
        return $this->uomdesc;
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
     * Set the value of [sessionid] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[CartTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recordno] column.
     *
     * @param int $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setRecordno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recordno !== $v) {
            $this->recordno = $v;
            $this->modifiedColumns[CartTableMap::COL_RECORDNO] = true;
        }

        return $this;
    } // setRecordno()

    /**
     * Set the value of [date] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[CartTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[CartTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [itemid] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[CartTableMap::COL_ITEMID] = true;
        }

        return $this;
    } // setItemid()

    /**
     * Set the value of [price] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[CartTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [qty] column.
     *
     * @param int $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setQty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qty !== $v) {
            $this->qty = $v;
            $this->modifiedColumns[CartTableMap::COL_QTY] = true;
        }

        return $this;
    } // setQty()

    /**
     * Set the value of [amount] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[CartTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Set the value of [desc1] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setDesc1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc1 !== $v) {
            $this->desc1 = $v;
            $this->modifiedColumns[CartTableMap::COL_DESC1] = true;
        }

        return $this;
    } // setDesc1()

    /**
     * Set the value of [desc2] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setDesc2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc2 !== $v) {
            $this->desc2 = $v;
            $this->modifiedColumns[CartTableMap::COL_DESC2] = true;
        }

        return $this;
    } // setDesc2()

    /**
     * Set the value of [errormes] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setErrormes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->errormes !== $v) {
            $this->errormes = $v;
            $this->modifiedColumns[CartTableMap::COL_ERRORMES] = true;
        }

        return $this;
    } // setErrormes()

    /**
     * Set the value of [entitemid] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setEntitemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->entitemid !== $v) {
            $this->entitemid = $v;
            $this->modifiedColumns[CartTableMap::COL_ENTITEMID] = true;
        }

        return $this;
    } // setEntitemid()

    /**
     * Set the value of [uomdesc] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setUomdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uomdesc !== $v) {
            $this->uomdesc = $v;
            $this->modifiedColumns[CartTableMap::COL_UOMDESC] = true;
        }

        return $this;
    } // setUomdesc()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Cart The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[CartTableMap::COL_DUMMY] = true;
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
            if ($this->sessionid !== '') {
                return false;
            }

            if ($this->recordno !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CartTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CartTableMap::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recordno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CartTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CartTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CartTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CartTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CartTableMap::translateFieldName('Qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CartTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CartTableMap::translateFieldName('Desc1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CartTableMap::translateFieldName('Desc2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CartTableMap::translateFieldName('Errormes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->errormes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CartTableMap::translateFieldName('Entitemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->entitemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CartTableMap::translateFieldName('Uomdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uomdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CartTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 14; // 14 = CartTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Cart'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(CartTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCartQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Cart::setDeleted()
     * @see Cart::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CartTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCartQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CartTableMap::DATABASE_NAME);
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
                CartTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(CartTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(CartTableMap::COL_RECORDNO)) {
            $modifiedColumns[':p' . $index++]  = 'recordno';
        }
        if ($this->isColumnModified(CartTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(CartTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(CartTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(CartTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(CartTableMap::COL_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'qty';
        }
        if ($this->isColumnModified(CartTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(CartTableMap::COL_DESC1)) {
            $modifiedColumns[':p' . $index++]  = 'desc1';
        }
        if ($this->isColumnModified(CartTableMap::COL_DESC2)) {
            $modifiedColumns[':p' . $index++]  = 'desc2';
        }
        if ($this->isColumnModified(CartTableMap::COL_ERRORMES)) {
            $modifiedColumns[':p' . $index++]  = 'errormes';
        }
        if ($this->isColumnModified(CartTableMap::COL_ENTITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'entitemid';
        }
        if ($this->isColumnModified(CartTableMap::COL_UOMDESC)) {
            $modifiedColumns[':p' . $index++]  = 'uomdesc';
        }
        if ($this->isColumnModified(CartTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO cart (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'sessionid':
                        $stmt->bindValue($identifier, $this->sessionid, PDO::PARAM_STR);
                        break;
                    case 'recordno':
                        $stmt->bindValue($identifier, $this->recordno, PDO::PARAM_INT);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);
                        break;
                    case 'itemid':
                        $stmt->bindValue($identifier, $this->itemid, PDO::PARAM_STR);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case 'qty':
                        $stmt->bindValue($identifier, $this->qty, PDO::PARAM_INT);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case 'desc1':
                        $stmt->bindValue($identifier, $this->desc1, PDO::PARAM_STR);
                        break;
                    case 'desc2':
                        $stmt->bindValue($identifier, $this->desc2, PDO::PARAM_STR);
                        break;
                    case 'errormes':
                        $stmt->bindValue($identifier, $this->errormes, PDO::PARAM_STR);
                        break;
                    case 'entitemid':
                        $stmt->bindValue($identifier, $this->entitemid, PDO::PARAM_STR);
                        break;
                    case 'uomdesc':
                        $stmt->bindValue($identifier, $this->uomdesc, PDO::PARAM_STR);
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
        $pos = CartTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getSessionid();
                break;
            case 1:
                return $this->getRecordno();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getTime();
                break;
            case 4:
                return $this->getItemid();
                break;
            case 5:
                return $this->getPrice();
                break;
            case 6:
                return $this->getQty();
                break;
            case 7:
                return $this->getAmount();
                break;
            case 8:
                return $this->getDesc1();
                break;
            case 9:
                return $this->getDesc2();
                break;
            case 10:
                return $this->getErrormes();
                break;
            case 11:
                return $this->getEntitemid();
                break;
            case 12:
                return $this->getUomdesc();
                break;
            case 13:
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

        if (isset($alreadyDumpedObjects['Cart'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cart'][$this->hashCode()] = true;
        $keys = CartTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecordno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getItemid(),
            $keys[5] => $this->getPrice(),
            $keys[6] => $this->getQty(),
            $keys[7] => $this->getAmount(),
            $keys[8] => $this->getDesc1(),
            $keys[9] => $this->getDesc2(),
            $keys[10] => $this->getErrormes(),
            $keys[11] => $this->getEntitemid(),
            $keys[12] => $this->getUomdesc(),
            $keys[13] => $this->getDummy(),
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
     * @return $this|\Cart
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CartTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Cart
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSessionid($value);
                break;
            case 1:
                $this->setRecordno($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setTime($value);
                break;
            case 4:
                $this->setItemid($value);
                break;
            case 5:
                $this->setPrice($value);
                break;
            case 6:
                $this->setQty($value);
                break;
            case 7:
                $this->setAmount($value);
                break;
            case 8:
                $this->setDesc1($value);
                break;
            case 9:
                $this->setDesc2($value);
                break;
            case 10:
                $this->setErrormes($value);
                break;
            case 11:
                $this->setEntitemid($value);
                break;
            case 12:
                $this->setUomdesc($value);
                break;
            case 13:
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
        $keys = CartTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSessionid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRecordno($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setItemid($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPrice($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setQty($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAmount($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDesc1($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDesc2($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setErrormes($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setEntitemid($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setUomdesc($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setDummy($arr[$keys[13]]);
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
     * @return $this|\Cart The current object, for fluid interface
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
        $criteria = new Criteria(CartTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CartTableMap::COL_SESSIONID)) {
            $criteria->add(CartTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(CartTableMap::COL_RECORDNO)) {
            $criteria->add(CartTableMap::COL_RECORDNO, $this->recordno);
        }
        if ($this->isColumnModified(CartTableMap::COL_DATE)) {
            $criteria->add(CartTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(CartTableMap::COL_TIME)) {
            $criteria->add(CartTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(CartTableMap::COL_ITEMID)) {
            $criteria->add(CartTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(CartTableMap::COL_PRICE)) {
            $criteria->add(CartTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(CartTableMap::COL_QTY)) {
            $criteria->add(CartTableMap::COL_QTY, $this->qty);
        }
        if ($this->isColumnModified(CartTableMap::COL_AMOUNT)) {
            $criteria->add(CartTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(CartTableMap::COL_DESC1)) {
            $criteria->add(CartTableMap::COL_DESC1, $this->desc1);
        }
        if ($this->isColumnModified(CartTableMap::COL_DESC2)) {
            $criteria->add(CartTableMap::COL_DESC2, $this->desc2);
        }
        if ($this->isColumnModified(CartTableMap::COL_ERRORMES)) {
            $criteria->add(CartTableMap::COL_ERRORMES, $this->errormes);
        }
        if ($this->isColumnModified(CartTableMap::COL_ENTITEMID)) {
            $criteria->add(CartTableMap::COL_ENTITEMID, $this->entitemid);
        }
        if ($this->isColumnModified(CartTableMap::COL_UOMDESC)) {
            $criteria->add(CartTableMap::COL_UOMDESC, $this->uomdesc);
        }
        if ($this->isColumnModified(CartTableMap::COL_DUMMY)) {
            $criteria->add(CartTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildCartQuery::create();
        $criteria->add(CartTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(CartTableMap::COL_RECORDNO, $this->recordno);

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
        $validPk = null !== $this->getSessionid() &&
            null !== $this->getRecordno();

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
        $pks[0] = $this->getSessionid();
        $pks[1] = $this->getRecordno();

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
        $this->setSessionid($keys[0]);
        $this->setRecordno($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getSessionid()) && (null === $this->getRecordno());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Cart (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSessionid($this->getSessionid());
        $copyObj->setRecordno($this->getRecordno());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setItemid($this->getItemid());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setQty($this->getQty());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setDesc1($this->getDesc1());
        $copyObj->setDesc2($this->getDesc2());
        $copyObj->setErrormes($this->getErrormes());
        $copyObj->setEntitemid($this->getEntitemid());
        $copyObj->setUomdesc($this->getUomdesc());
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
     * @return \Cart Clone of current object.
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
        $this->sessionid = null;
        $this->recordno = null;
        $this->date = null;
        $this->time = null;
        $this->itemid = null;
        $this->price = null;
        $this->qty = null;
        $this->amount = null;
        $this->desc1 = null;
        $this->desc2 = null;
        $this->errormes = null;
        $this->entitemid = null;
        $this->uomdesc = null;
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
        return (string) $this->exportTo(CartTableMap::DEFAULT_STRING_FORMAT);
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
