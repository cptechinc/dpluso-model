<?php

namespace Base;

use \TviewQuery as ChildTviewQuery;
use \Exception;
use \PDO;
use Map\TviewTableMap;
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
 * Base class that represents a row from the 'tview' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Tview implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TviewTableMap';


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
     * The value for the recno field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $recno;

    /**
     * The value for the date field.
     *
     * @var        string
     */
    protected $date;

    /**
     * The value for the time field.
     *
     * @var        string
     */
    protected $time;

    /**
     * The value for the c1 field.
     *
     * @var        string
     */
    protected $c1;

    /**
     * The value for the c2 field.
     *
     * @var        string
     */
    protected $c2;

    /**
     * The value for the c3 field.
     *
     * @var        string
     */
    protected $c3;

    /**
     * The value for the c4 field.
     *
     * @var        string
     */
    protected $c4;

    /**
     * The value for the c5 field.
     *
     * @var        string
     */
    protected $c5;

    /**
     * The value for the c6 field.
     *
     * @var        string
     */
    protected $c6;

    /**
     * The value for the c7 field.
     *
     * @var        string
     */
    protected $c7;

    /**
     * The value for the c8 field.
     *
     * @var        string
     */
    protected $c8;

    /**
     * The value for the c9 field.
     *
     * @var        string
     */
    protected $c9;

    /**
     * The value for the c10 field.
     *
     * @var        string
     */
    protected $c10;

    /**
     * The value for the famid field.
     *
     * @var        string
     */
    protected $famid;

    /**
     * The value for the itemid field.
     *
     * @var        string
     */
    protected $itemid;

    /**
     * The value for the picid field.
     *
     * @var        string
     */
    protected $picid;

    /**
     * The value for the vidinffg field.
     *
     * @var        string
     */
    protected $vidinffg;

    /**
     * The value for the vidinflk field.
     *
     * @var        string
     */
    protected $vidinflk;

    /**
     * The value for the message field.
     *
     * @var        string
     */
    protected $message;

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
        $this->recno = '';
    }

    /**
     * Initializes internal state of Base\Tview object.
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
     * Compares this with another <code>Tview</code> instance.  If
     * <code>obj</code> is an instance of <code>Tview</code>, delegates to
     * <code>equals(Tview)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Tview The current object, for fluid interface
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
     * Get the [recno] column value.
     *
     * @return string
     */
    public function getRecno()
    {
        return $this->recno;
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
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the [c1] column value.
     *
     * @return string
     */
    public function getC1()
    {
        return $this->c1;
    }

    /**
     * Get the [c2] column value.
     *
     * @return string
     */
    public function getC2()
    {
        return $this->c2;
    }

    /**
     * Get the [c3] column value.
     *
     * @return string
     */
    public function getC3()
    {
        return $this->c3;
    }

    /**
     * Get the [c4] column value.
     *
     * @return string
     */
    public function getC4()
    {
        return $this->c4;
    }

    /**
     * Get the [c5] column value.
     *
     * @return string
     */
    public function getC5()
    {
        return $this->c5;
    }

    /**
     * Get the [c6] column value.
     *
     * @return string
     */
    public function getC6()
    {
        return $this->c6;
    }

    /**
     * Get the [c7] column value.
     *
     * @return string
     */
    public function getC7()
    {
        return $this->c7;
    }

    /**
     * Get the [c8] column value.
     *
     * @return string
     */
    public function getC8()
    {
        return $this->c8;
    }

    /**
     * Get the [c9] column value.
     *
     * @return string
     */
    public function getC9()
    {
        return $this->c9;
    }

    /**
     * Get the [c10] column value.
     *
     * @return string
     */
    public function getC10()
    {
        return $this->c10;
    }

    /**
     * Get the [famid] column value.
     *
     * @return string
     */
    public function getFamid()
    {
        return $this->famid;
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
     * Get the [picid] column value.
     *
     * @return string
     */
    public function getPicid()
    {
        return $this->picid;
    }

    /**
     * Get the [vidinffg] column value.
     *
     * @return string
     */
    public function getVidinffg()
    {
        return $this->vidinffg;
    }

    /**
     * Get the [vidinflk] column value.
     *
     * @return string
     */
    public function getVidinflk()
    {
        return $this->vidinflk;
    }

    /**
     * Get the [message] column value.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
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
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[TviewTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[TviewTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[TviewTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[TviewTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [c1] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c1 !== $v) {
            $this->c1 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C1] = true;
        }

        return $this;
    } // setC1()

    /**
     * Set the value of [c2] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c2 !== $v) {
            $this->c2 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C2] = true;
        }

        return $this;
    } // setC2()

    /**
     * Set the value of [c3] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c3 !== $v) {
            $this->c3 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C3] = true;
        }

        return $this;
    } // setC3()

    /**
     * Set the value of [c4] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c4 !== $v) {
            $this->c4 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C4] = true;
        }

        return $this;
    } // setC4()

    /**
     * Set the value of [c5] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c5 !== $v) {
            $this->c5 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C5] = true;
        }

        return $this;
    } // setC5()

    /**
     * Set the value of [c6] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC6($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c6 !== $v) {
            $this->c6 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C6] = true;
        }

        return $this;
    } // setC6()

    /**
     * Set the value of [c7] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC7($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c7 !== $v) {
            $this->c7 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C7] = true;
        }

        return $this;
    } // setC7()

    /**
     * Set the value of [c8] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC8($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c8 !== $v) {
            $this->c8 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C8] = true;
        }

        return $this;
    } // setC8()

    /**
     * Set the value of [c9] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC9($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c9 !== $v) {
            $this->c9 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C9] = true;
        }

        return $this;
    } // setC9()

    /**
     * Set the value of [c10] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setC10($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c10 !== $v) {
            $this->c10 = $v;
            $this->modifiedColumns[TviewTableMap::COL_C10] = true;
        }

        return $this;
    } // setC10()

    /**
     * Set the value of [famid] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setFamid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->famid !== $v) {
            $this->famid = $v;
            $this->modifiedColumns[TviewTableMap::COL_FAMID] = true;
        }

        return $this;
    } // setFamid()

    /**
     * Set the value of [itemid] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[TviewTableMap::COL_ITEMID] = true;
        }

        return $this;
    } // setItemid()

    /**
     * Set the value of [picid] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setPicid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->picid !== $v) {
            $this->picid = $v;
            $this->modifiedColumns[TviewTableMap::COL_PICID] = true;
        }

        return $this;
    } // setPicid()

    /**
     * Set the value of [vidinffg] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setVidinffg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vidinffg !== $v) {
            $this->vidinffg = $v;
            $this->modifiedColumns[TviewTableMap::COL_VIDINFFG] = true;
        }

        return $this;
    } // setVidinffg()

    /**
     * Set the value of [vidinflk] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setVidinflk($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vidinflk !== $v) {
            $this->vidinflk = $v;
            $this->modifiedColumns[TviewTableMap::COL_VIDINFLK] = true;
        }

        return $this;
    } // setVidinflk()

    /**
     * Set the value of [message] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setMessage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->message !== $v) {
            $this->message = $v;
            $this->modifiedColumns[TviewTableMap::COL_MESSAGE] = true;
        }

        return $this;
    } // setMessage()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Tview The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[TviewTableMap::COL_DUMMY] = true;
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

            if ($this->recno !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TviewTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TviewTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TviewTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TviewTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TviewTableMap::translateFieldName('C1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TviewTableMap::translateFieldName('C2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TviewTableMap::translateFieldName('C3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TviewTableMap::translateFieldName('C4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TviewTableMap::translateFieldName('C5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TviewTableMap::translateFieldName('C6', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c6 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TviewTableMap::translateFieldName('C7', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c7 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : TviewTableMap::translateFieldName('C8', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c8 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : TviewTableMap::translateFieldName('C9', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c9 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : TviewTableMap::translateFieldName('C10', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c10 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : TviewTableMap::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->famid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : TviewTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : TviewTableMap::translateFieldName('Picid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->picid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : TviewTableMap::translateFieldName('Vidinffg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vidinffg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : TviewTableMap::translateFieldName('Vidinflk', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vidinflk = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : TviewTableMap::translateFieldName('Message', TableMap::TYPE_PHPNAME, $indexType)];
            $this->message = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : TviewTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = TviewTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Tview'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(TviewTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTviewQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Tview::setDeleted()
     * @see Tview::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TviewTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTviewQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TviewTableMap::DATABASE_NAME);
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
                TviewTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(TviewTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(TviewTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(TviewTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(TviewTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C1)) {
            $modifiedColumns[':p' . $index++]  = 'c1';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C2)) {
            $modifiedColumns[':p' . $index++]  = 'c2';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C3)) {
            $modifiedColumns[':p' . $index++]  = 'c3';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C4)) {
            $modifiedColumns[':p' . $index++]  = 'c4';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C5)) {
            $modifiedColumns[':p' . $index++]  = 'c5';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C6)) {
            $modifiedColumns[':p' . $index++]  = 'c6';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C7)) {
            $modifiedColumns[':p' . $index++]  = 'c7';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C8)) {
            $modifiedColumns[':p' . $index++]  = 'c8';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C9)) {
            $modifiedColumns[':p' . $index++]  = 'c9';
        }
        if ($this->isColumnModified(TviewTableMap::COL_C10)) {
            $modifiedColumns[':p' . $index++]  = 'c10';
        }
        if ($this->isColumnModified(TviewTableMap::COL_FAMID)) {
            $modifiedColumns[':p' . $index++]  = 'famid';
        }
        if ($this->isColumnModified(TviewTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(TviewTableMap::COL_PICID)) {
            $modifiedColumns[':p' . $index++]  = 'picid';
        }
        if ($this->isColumnModified(TviewTableMap::COL_VIDINFFG)) {
            $modifiedColumns[':p' . $index++]  = 'vidinffg';
        }
        if ($this->isColumnModified(TviewTableMap::COL_VIDINFLK)) {
            $modifiedColumns[':p' . $index++]  = 'vidinflk';
        }
        if ($this->isColumnModified(TviewTableMap::COL_MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = 'message';
        }
        if ($this->isColumnModified(TviewTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO tview (%s) VALUES (%s)',
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
                    case 'recno':
                        $stmt->bindValue($identifier, $this->recno, PDO::PARAM_STR);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_STR);
                        break;
                    case 'c1':
                        $stmt->bindValue($identifier, $this->c1, PDO::PARAM_STR);
                        break;
                    case 'c2':
                        $stmt->bindValue($identifier, $this->c2, PDO::PARAM_STR);
                        break;
                    case 'c3':
                        $stmt->bindValue($identifier, $this->c3, PDO::PARAM_STR);
                        break;
                    case 'c4':
                        $stmt->bindValue($identifier, $this->c4, PDO::PARAM_STR);
                        break;
                    case 'c5':
                        $stmt->bindValue($identifier, $this->c5, PDO::PARAM_STR);
                        break;
                    case 'c6':
                        $stmt->bindValue($identifier, $this->c6, PDO::PARAM_STR);
                        break;
                    case 'c7':
                        $stmt->bindValue($identifier, $this->c7, PDO::PARAM_STR);
                        break;
                    case 'c8':
                        $stmt->bindValue($identifier, $this->c8, PDO::PARAM_STR);
                        break;
                    case 'c9':
                        $stmt->bindValue($identifier, $this->c9, PDO::PARAM_STR);
                        break;
                    case 'c10':
                        $stmt->bindValue($identifier, $this->c10, PDO::PARAM_STR);
                        break;
                    case 'famid':
                        $stmt->bindValue($identifier, $this->famid, PDO::PARAM_STR);
                        break;
                    case 'itemid':
                        $stmt->bindValue($identifier, $this->itemid, PDO::PARAM_STR);
                        break;
                    case 'picid':
                        $stmt->bindValue($identifier, $this->picid, PDO::PARAM_STR);
                        break;
                    case 'vidinffg':
                        $stmt->bindValue($identifier, $this->vidinffg, PDO::PARAM_STR);
                        break;
                    case 'vidinflk':
                        $stmt->bindValue($identifier, $this->vidinflk, PDO::PARAM_STR);
                        break;
                    case 'message':
                        $stmt->bindValue($identifier, $this->message, PDO::PARAM_STR);
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
        $pos = TviewTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRecno();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getTime();
                break;
            case 4:
                return $this->getC1();
                break;
            case 5:
                return $this->getC2();
                break;
            case 6:
                return $this->getC3();
                break;
            case 7:
                return $this->getC4();
                break;
            case 8:
                return $this->getC5();
                break;
            case 9:
                return $this->getC6();
                break;
            case 10:
                return $this->getC7();
                break;
            case 11:
                return $this->getC8();
                break;
            case 12:
                return $this->getC9();
                break;
            case 13:
                return $this->getC10();
                break;
            case 14:
                return $this->getFamid();
                break;
            case 15:
                return $this->getItemid();
                break;
            case 16:
                return $this->getPicid();
                break;
            case 17:
                return $this->getVidinffg();
                break;
            case 18:
                return $this->getVidinflk();
                break;
            case 19:
                return $this->getMessage();
                break;
            case 20:
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

        if (isset($alreadyDumpedObjects['Tview'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tview'][$this->hashCode()] = true;
        $keys = TviewTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getC1(),
            $keys[5] => $this->getC2(),
            $keys[6] => $this->getC3(),
            $keys[7] => $this->getC4(),
            $keys[8] => $this->getC5(),
            $keys[9] => $this->getC6(),
            $keys[10] => $this->getC7(),
            $keys[11] => $this->getC8(),
            $keys[12] => $this->getC9(),
            $keys[13] => $this->getC10(),
            $keys[14] => $this->getFamid(),
            $keys[15] => $this->getItemid(),
            $keys[16] => $this->getPicid(),
            $keys[17] => $this->getVidinffg(),
            $keys[18] => $this->getVidinflk(),
            $keys[19] => $this->getMessage(),
            $keys[20] => $this->getDummy(),
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
     * @return $this|\Tview
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TviewTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Tview
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSessionid($value);
                break;
            case 1:
                $this->setRecno($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setTime($value);
                break;
            case 4:
                $this->setC1($value);
                break;
            case 5:
                $this->setC2($value);
                break;
            case 6:
                $this->setC3($value);
                break;
            case 7:
                $this->setC4($value);
                break;
            case 8:
                $this->setC5($value);
                break;
            case 9:
                $this->setC6($value);
                break;
            case 10:
                $this->setC7($value);
                break;
            case 11:
                $this->setC8($value);
                break;
            case 12:
                $this->setC9($value);
                break;
            case 13:
                $this->setC10($value);
                break;
            case 14:
                $this->setFamid($value);
                break;
            case 15:
                $this->setItemid($value);
                break;
            case 16:
                $this->setPicid($value);
                break;
            case 17:
                $this->setVidinffg($value);
                break;
            case 18:
                $this->setVidinflk($value);
                break;
            case 19:
                $this->setMessage($value);
                break;
            case 20:
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
        $keys = TviewTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSessionid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRecno($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setC1($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setC2($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setC3($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setC4($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setC5($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setC6($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setC7($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setC8($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setC9($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setC10($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setFamid($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setItemid($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPicid($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setVidinffg($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setVidinflk($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setMessage($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setDummy($arr[$keys[20]]);
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
     * @return $this|\Tview The current object, for fluid interface
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
        $criteria = new Criteria(TviewTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TviewTableMap::COL_SESSIONID)) {
            $criteria->add(TviewTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(TviewTableMap::COL_RECNO)) {
            $criteria->add(TviewTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(TviewTableMap::COL_DATE)) {
            $criteria->add(TviewTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(TviewTableMap::COL_TIME)) {
            $criteria->add(TviewTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C1)) {
            $criteria->add(TviewTableMap::COL_C1, $this->c1);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C2)) {
            $criteria->add(TviewTableMap::COL_C2, $this->c2);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C3)) {
            $criteria->add(TviewTableMap::COL_C3, $this->c3);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C4)) {
            $criteria->add(TviewTableMap::COL_C4, $this->c4);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C5)) {
            $criteria->add(TviewTableMap::COL_C5, $this->c5);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C6)) {
            $criteria->add(TviewTableMap::COL_C6, $this->c6);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C7)) {
            $criteria->add(TviewTableMap::COL_C7, $this->c7);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C8)) {
            $criteria->add(TviewTableMap::COL_C8, $this->c8);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C9)) {
            $criteria->add(TviewTableMap::COL_C9, $this->c9);
        }
        if ($this->isColumnModified(TviewTableMap::COL_C10)) {
            $criteria->add(TviewTableMap::COL_C10, $this->c10);
        }
        if ($this->isColumnModified(TviewTableMap::COL_FAMID)) {
            $criteria->add(TviewTableMap::COL_FAMID, $this->famid);
        }
        if ($this->isColumnModified(TviewTableMap::COL_ITEMID)) {
            $criteria->add(TviewTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(TviewTableMap::COL_PICID)) {
            $criteria->add(TviewTableMap::COL_PICID, $this->picid);
        }
        if ($this->isColumnModified(TviewTableMap::COL_VIDINFFG)) {
            $criteria->add(TviewTableMap::COL_VIDINFFG, $this->vidinffg);
        }
        if ($this->isColumnModified(TviewTableMap::COL_VIDINFLK)) {
            $criteria->add(TviewTableMap::COL_VIDINFLK, $this->vidinflk);
        }
        if ($this->isColumnModified(TviewTableMap::COL_MESSAGE)) {
            $criteria->add(TviewTableMap::COL_MESSAGE, $this->message);
        }
        if ($this->isColumnModified(TviewTableMap::COL_DUMMY)) {
            $criteria->add(TviewTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildTviewQuery::create();
        $criteria->add(TviewTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(TviewTableMap::COL_RECNO, $this->recno);

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
            null !== $this->getRecno();

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
        $pks[1] = $this->getRecno();

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
        $this->setRecno($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getSessionid()) && (null === $this->getRecno());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Tview (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSessionid($this->getSessionid());
        $copyObj->setRecno($this->getRecno());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setC1($this->getC1());
        $copyObj->setC2($this->getC2());
        $copyObj->setC3($this->getC3());
        $copyObj->setC4($this->getC4());
        $copyObj->setC5($this->getC5());
        $copyObj->setC6($this->getC6());
        $copyObj->setC7($this->getC7());
        $copyObj->setC8($this->getC8());
        $copyObj->setC9($this->getC9());
        $copyObj->setC10($this->getC10());
        $copyObj->setFamid($this->getFamid());
        $copyObj->setItemid($this->getItemid());
        $copyObj->setPicid($this->getPicid());
        $copyObj->setVidinffg($this->getVidinffg());
        $copyObj->setVidinflk($this->getVidinflk());
        $copyObj->setMessage($this->getMessage());
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
     * @return \Tview Clone of current object.
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
        $this->recno = null;
        $this->date = null;
        $this->time = null;
        $this->c1 = null;
        $this->c2 = null;
        $this->c3 = null;
        $this->c4 = null;
        $this->c5 = null;
        $this->c6 = null;
        $this->c7 = null;
        $this->c8 = null;
        $this->c9 = null;
        $this->c10 = null;
        $this->famid = null;
        $this->itemid = null;
        $this->picid = null;
        $this->vidinffg = null;
        $this->vidinflk = null;
        $this->message = null;
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
        return (string) $this->exportTo(TviewTableMap::DEFAULT_STRING_FORMAT);
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
