<?php

namespace Base;

use \CustomerQuery as ChildCustomerQuery;
use \Exception;
use \PDO;
use Map\CustomerTableMap;
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
 * Base class that represents a row from the 'customer' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Customer implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CustomerTableMap';


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
     * @var        string
     */
    protected $sessionid;

    /**
     * The value for the recno field.
     *
     * @var        int
     */
    protected $recno;

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
     * The value for the custid field.
     *
     * @var        string
     */
    protected $custid;

    /**
     * The value for the custname field.
     *
     * @var        string
     */
    protected $custname;

    /**
     * The value for the caddress field.
     *
     * @var        string
     */
    protected $caddress;

    /**
     * The value for the caddress2 field.
     *
     * @var        string
     */
    protected $caddress2;

    /**
     * The value for the caddress3 field.
     *
     * @var        string
     */
    protected $caddress3;

    /**
     * The value for the ccity field.
     *
     * @var        string
     */
    protected $ccity;

    /**
     * The value for the cst field.
     *
     * @var        string
     */
    protected $cst;

    /**
     * The value for the czip field.
     *
     * @var        string
     */
    protected $czip;

    /**
     * The value for the ccountry field.
     *
     * @var        string
     */
    protected $ccountry;

    /**
     * The value for the cphone field.
     *
     * @var        string
     */
    protected $cphone;

    /**
     * The value for the csalesrep field.
     *
     * @var        string
     */
    protected $csalesrep;

    /**
     * The value for the csalesrepname field.
     *
     * @var        string
     */
    protected $csalesrepname;

    /**
     * The value for the ctype field.
     *
     * @var        string
     */
    protected $ctype;

    /**
     * The value for the nbrshipto field.
     *
     * @var        int
     */
    protected $nbrshipto;

    /**
     * The value for the dateentered field.
     *
     * @var        string
     */
    protected $dateentered;

    /**
     * The value for the lastsaledate field.
     *
     * @var        string
     */
    protected $lastsaledate;

    /**
     * The value for the errormsg field.
     *
     * @var        string
     */
    protected $errormsg;

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
     * Initializes internal state of Base\Customer object.
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
     * Compares this with another <code>Customer</code> instance.  If
     * <code>obj</code> is an instance of <code>Customer</code>, delegates to
     * <code>equals(Customer)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Customer The current object, for fluid interface
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
     * @return int
     */
    public function getRecno()
    {
        return $this->recno;
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
     * Get the [custid] column value.
     *
     * @return string
     */
    public function getCustid()
    {
        return $this->custid;
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
     * Get the [caddress] column value.
     *
     * @return string
     */
    public function getCaddress()
    {
        return $this->caddress;
    }

    /**
     * Get the [caddress2] column value.
     *
     * @return string
     */
    public function getCaddress2()
    {
        return $this->caddress2;
    }

    /**
     * Get the [caddress3] column value.
     *
     * @return string
     */
    public function getCaddress3()
    {
        return $this->caddress3;
    }

    /**
     * Get the [ccity] column value.
     *
     * @return string
     */
    public function getCcity()
    {
        return $this->ccity;
    }

    /**
     * Get the [cst] column value.
     *
     * @return string
     */
    public function getCst()
    {
        return $this->cst;
    }

    /**
     * Get the [czip] column value.
     *
     * @return string
     */
    public function getCzip()
    {
        return $this->czip;
    }

    /**
     * Get the [ccountry] column value.
     *
     * @return string
     */
    public function getCcountry()
    {
        return $this->ccountry;
    }

    /**
     * Get the [cphone] column value.
     *
     * @return string
     */
    public function getCphone()
    {
        return $this->cphone;
    }

    /**
     * Get the [csalesrep] column value.
     *
     * @return string
     */
    public function getCsalesrep()
    {
        return $this->csalesrep;
    }

    /**
     * Get the [csalesrepname] column value.
     *
     * @return string
     */
    public function getCsalesrepname()
    {
        return $this->csalesrepname;
    }

    /**
     * Get the [ctype] column value.
     *
     * @return string
     */
    public function getCtype()
    {
        return $this->ctype;
    }

    /**
     * Get the [nbrshipto] column value.
     *
     * @return int
     */
    public function getNbrshipto()
    {
        return $this->nbrshipto;
    }

    /**
     * Get the [dateentered] column value.
     *
     * @return string
     */
    public function getDateentered()
    {
        return $this->dateentered;
    }

    /**
     * Get the [lastsaledate] column value.
     *
     * @return string
     */
    public function getLastsaledate()
    {
        return $this->lastsaledate;
    }

    /**
     * Get the [errormsg] column value.
     *
     * @return string
     */
    public function getErrormsg()
    {
        return $this->errormsg;
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
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[CustomerTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[CustomerTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[CustomerTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[CustomerTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [custname] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCustname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custname !== $v) {
            $this->custname = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CUSTNAME] = true;
        }

        return $this;
    } // setCustname()

    /**
     * Set the value of [caddress] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caddress !== $v) {
            $this->caddress = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CADDRESS] = true;
        }

        return $this;
    } // setCaddress()

    /**
     * Set the value of [caddress2] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCaddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caddress2 !== $v) {
            $this->caddress2 = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CADDRESS2] = true;
        }

        return $this;
    } // setCaddress2()

    /**
     * Set the value of [caddress3] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCaddress3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caddress3 !== $v) {
            $this->caddress3 = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CADDRESS3] = true;
        }

        return $this;
    } // setCaddress3()

    /**
     * Set the value of [ccity] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCcity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ccity !== $v) {
            $this->ccity = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CCITY] = true;
        }

        return $this;
    } // setCcity()

    /**
     * Set the value of [cst] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCst($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cst !== $v) {
            $this->cst = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CST] = true;
        }

        return $this;
    } // setCst()

    /**
     * Set the value of [czip] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCzip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->czip !== $v) {
            $this->czip = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CZIP] = true;
        }

        return $this;
    } // setCzip()

    /**
     * Set the value of [ccountry] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCcountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ccountry !== $v) {
            $this->ccountry = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CCOUNTRY] = true;
        }

        return $this;
    } // setCcountry()

    /**
     * Set the value of [cphone] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCphone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cphone !== $v) {
            $this->cphone = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CPHONE] = true;
        }

        return $this;
    } // setCphone()

    /**
     * Set the value of [csalesrep] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCsalesrep($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->csalesrep !== $v) {
            $this->csalesrep = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CSALESREP] = true;
        }

        return $this;
    } // setCsalesrep()

    /**
     * Set the value of [csalesrepname] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCsalesrepname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->csalesrepname !== $v) {
            $this->csalesrepname = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CSALESREPNAME] = true;
        }

        return $this;
    } // setCsalesrepname()

    /**
     * Set the value of [ctype] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setCtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ctype !== $v) {
            $this->ctype = $v;
            $this->modifiedColumns[CustomerTableMap::COL_CTYPE] = true;
        }

        return $this;
    } // setCtype()

    /**
     * Set the value of [nbrshipto] column.
     *
     * @param int $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setNbrshipto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->nbrshipto !== $v) {
            $this->nbrshipto = $v;
            $this->modifiedColumns[CustomerTableMap::COL_NBRSHIPTO] = true;
        }

        return $this;
    } // setNbrshipto()

    /**
     * Set the value of [dateentered] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setDateentered($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dateentered !== $v) {
            $this->dateentered = $v;
            $this->modifiedColumns[CustomerTableMap::COL_DATEENTERED] = true;
        }

        return $this;
    } // setDateentered()

    /**
     * Set the value of [lastsaledate] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setLastsaledate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastsaledate !== $v) {
            $this->lastsaledate = $v;
            $this->modifiedColumns[CustomerTableMap::COL_LASTSALEDATE] = true;
        }

        return $this;
    } // setLastsaledate()

    /**
     * Set the value of [errormsg] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setErrormsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->errormsg !== $v) {
            $this->errormsg = $v;
            $this->modifiedColumns[CustomerTableMap::COL_ERRORMSG] = true;
        }

        return $this;
    } // setErrormsg()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Customer The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[CustomerTableMap::COL_DUMMY] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CustomerTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CustomerTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CustomerTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CustomerTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CustomerTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CustomerTableMap::translateFieldName('Custname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CustomerTableMap::translateFieldName('Caddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CustomerTableMap::translateFieldName('Caddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caddress2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CustomerTableMap::translateFieldName('Caddress3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caddress3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CustomerTableMap::translateFieldName('Ccity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ccity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CustomerTableMap::translateFieldName('Cst', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cst = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CustomerTableMap::translateFieldName('Czip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->czip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CustomerTableMap::translateFieldName('Ccountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ccountry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CustomerTableMap::translateFieldName('Cphone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cphone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CustomerTableMap::translateFieldName('Csalesrep', TableMap::TYPE_PHPNAME, $indexType)];
            $this->csalesrep = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CustomerTableMap::translateFieldName('Csalesrepname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->csalesrepname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CustomerTableMap::translateFieldName('Ctype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ctype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CustomerTableMap::translateFieldName('Nbrshipto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nbrshipto = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : CustomerTableMap::translateFieldName('Dateentered', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dateentered = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : CustomerTableMap::translateFieldName('Lastsaledate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastsaledate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : CustomerTableMap::translateFieldName('Errormsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->errormsg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : CustomerTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 22; // 22 = CustomerTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Customer'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(CustomerTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCustomerQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Customer::setDeleted()
     * @see Customer::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCustomerQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
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
                CustomerTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(CustomerTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CUSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'custname';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'caddress';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'caddress2';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = 'caddress3';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CCITY)) {
            $modifiedColumns[':p' . $index++]  = 'ccity';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CST)) {
            $modifiedColumns[':p' . $index++]  = 'cst';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CZIP)) {
            $modifiedColumns[':p' . $index++]  = 'czip';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CCOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'ccountry';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'cphone';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CSALESREP)) {
            $modifiedColumns[':p' . $index++]  = 'csalesrep';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CSALESREPNAME)) {
            $modifiedColumns[':p' . $index++]  = 'csalesrepname';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'ctype';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_NBRSHIPTO)) {
            $modifiedColumns[':p' . $index++]  = 'nbrshipto';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_DATEENTERED)) {
            $modifiedColumns[':p' . $index++]  = 'dateentered';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_LASTSALEDATE)) {
            $modifiedColumns[':p' . $index++]  = 'lastsaledate';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_ERRORMSG)) {
            $modifiedColumns[':p' . $index++]  = 'errormsg';
        }
        if ($this->isColumnModified(CustomerTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO customer (%s) VALUES (%s)',
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
                        $stmt->bindValue($identifier, $this->recno, PDO::PARAM_INT);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);
                        break;
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
                        break;
                    case 'custname':
                        $stmt->bindValue($identifier, $this->custname, PDO::PARAM_STR);
                        break;
                    case 'caddress':
                        $stmt->bindValue($identifier, $this->caddress, PDO::PARAM_STR);
                        break;
                    case 'caddress2':
                        $stmt->bindValue($identifier, $this->caddress2, PDO::PARAM_STR);
                        break;
                    case 'caddress3':
                        $stmt->bindValue($identifier, $this->caddress3, PDO::PARAM_STR);
                        break;
                    case 'ccity':
                        $stmt->bindValue($identifier, $this->ccity, PDO::PARAM_STR);
                        break;
                    case 'cst':
                        $stmt->bindValue($identifier, $this->cst, PDO::PARAM_STR);
                        break;
                    case 'czip':
                        $stmt->bindValue($identifier, $this->czip, PDO::PARAM_STR);
                        break;
                    case 'ccountry':
                        $stmt->bindValue($identifier, $this->ccountry, PDO::PARAM_STR);
                        break;
                    case 'cphone':
                        $stmt->bindValue($identifier, $this->cphone, PDO::PARAM_STR);
                        break;
                    case 'csalesrep':
                        $stmt->bindValue($identifier, $this->csalesrep, PDO::PARAM_STR);
                        break;
                    case 'csalesrepname':
                        $stmt->bindValue($identifier, $this->csalesrepname, PDO::PARAM_STR);
                        break;
                    case 'ctype':
                        $stmt->bindValue($identifier, $this->ctype, PDO::PARAM_STR);
                        break;
                    case 'nbrshipto':
                        $stmt->bindValue($identifier, $this->nbrshipto, PDO::PARAM_INT);
                        break;
                    case 'dateentered':
                        $stmt->bindValue($identifier, $this->dateentered, PDO::PARAM_STR);
                        break;
                    case 'lastsaledate':
                        $stmt->bindValue($identifier, $this->lastsaledate, PDO::PARAM_STR);
                        break;
                    case 'errormsg':
                        $stmt->bindValue($identifier, $this->errormsg, PDO::PARAM_STR);
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
        $pos = CustomerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCustid();
                break;
            case 5:
                return $this->getCustname();
                break;
            case 6:
                return $this->getCaddress();
                break;
            case 7:
                return $this->getCaddress2();
                break;
            case 8:
                return $this->getCaddress3();
                break;
            case 9:
                return $this->getCcity();
                break;
            case 10:
                return $this->getCst();
                break;
            case 11:
                return $this->getCzip();
                break;
            case 12:
                return $this->getCcountry();
                break;
            case 13:
                return $this->getCphone();
                break;
            case 14:
                return $this->getCsalesrep();
                break;
            case 15:
                return $this->getCsalesrepname();
                break;
            case 16:
                return $this->getCtype();
                break;
            case 17:
                return $this->getNbrshipto();
                break;
            case 18:
                return $this->getDateentered();
                break;
            case 19:
                return $this->getLastsaledate();
                break;
            case 20:
                return $this->getErrormsg();
                break;
            case 21:
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

        if (isset($alreadyDumpedObjects['Customer'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Customer'][$this->hashCode()] = true;
        $keys = CustomerTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getCustid(),
            $keys[5] => $this->getCustname(),
            $keys[6] => $this->getCaddress(),
            $keys[7] => $this->getCaddress2(),
            $keys[8] => $this->getCaddress3(),
            $keys[9] => $this->getCcity(),
            $keys[10] => $this->getCst(),
            $keys[11] => $this->getCzip(),
            $keys[12] => $this->getCcountry(),
            $keys[13] => $this->getCphone(),
            $keys[14] => $this->getCsalesrep(),
            $keys[15] => $this->getCsalesrepname(),
            $keys[16] => $this->getCtype(),
            $keys[17] => $this->getNbrshipto(),
            $keys[18] => $this->getDateentered(),
            $keys[19] => $this->getLastsaledate(),
            $keys[20] => $this->getErrormsg(),
            $keys[21] => $this->getDummy(),
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
     * @return $this|\Customer
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CustomerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Customer
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
                $this->setCustid($value);
                break;
            case 5:
                $this->setCustname($value);
                break;
            case 6:
                $this->setCaddress($value);
                break;
            case 7:
                $this->setCaddress2($value);
                break;
            case 8:
                $this->setCaddress3($value);
                break;
            case 9:
                $this->setCcity($value);
                break;
            case 10:
                $this->setCst($value);
                break;
            case 11:
                $this->setCzip($value);
                break;
            case 12:
                $this->setCcountry($value);
                break;
            case 13:
                $this->setCphone($value);
                break;
            case 14:
                $this->setCsalesrep($value);
                break;
            case 15:
                $this->setCsalesrepname($value);
                break;
            case 16:
                $this->setCtype($value);
                break;
            case 17:
                $this->setNbrshipto($value);
                break;
            case 18:
                $this->setDateentered($value);
                break;
            case 19:
                $this->setLastsaledate($value);
                break;
            case 20:
                $this->setErrormsg($value);
                break;
            case 21:
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
        $keys = CustomerTableMap::getFieldNames($keyType);

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
            $this->setCustid($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCustname($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCaddress($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCaddress2($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCaddress3($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCcity($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCst($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCzip($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCcountry($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCphone($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCsalesrep($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCsalesrepname($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCtype($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setNbrshipto($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDateentered($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setLastsaledate($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setErrormsg($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setDummy($arr[$keys[21]]);
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
     * @return $this|\Customer The current object, for fluid interface
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
        $criteria = new Criteria(CustomerTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CustomerTableMap::COL_SESSIONID)) {
            $criteria->add(CustomerTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_RECNO)) {
            $criteria->add(CustomerTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_DATE)) {
            $criteria->add(CustomerTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_TIME)) {
            $criteria->add(CustomerTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CUSTID)) {
            $criteria->add(CustomerTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CUSTNAME)) {
            $criteria->add(CustomerTableMap::COL_CUSTNAME, $this->custname);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CADDRESS)) {
            $criteria->add(CustomerTableMap::COL_CADDRESS, $this->caddress);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CADDRESS2)) {
            $criteria->add(CustomerTableMap::COL_CADDRESS2, $this->caddress2);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CADDRESS3)) {
            $criteria->add(CustomerTableMap::COL_CADDRESS3, $this->caddress3);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CCITY)) {
            $criteria->add(CustomerTableMap::COL_CCITY, $this->ccity);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CST)) {
            $criteria->add(CustomerTableMap::COL_CST, $this->cst);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CZIP)) {
            $criteria->add(CustomerTableMap::COL_CZIP, $this->czip);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CCOUNTRY)) {
            $criteria->add(CustomerTableMap::COL_CCOUNTRY, $this->ccountry);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CPHONE)) {
            $criteria->add(CustomerTableMap::COL_CPHONE, $this->cphone);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CSALESREP)) {
            $criteria->add(CustomerTableMap::COL_CSALESREP, $this->csalesrep);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CSALESREPNAME)) {
            $criteria->add(CustomerTableMap::COL_CSALESREPNAME, $this->csalesrepname);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_CTYPE)) {
            $criteria->add(CustomerTableMap::COL_CTYPE, $this->ctype);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_NBRSHIPTO)) {
            $criteria->add(CustomerTableMap::COL_NBRSHIPTO, $this->nbrshipto);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_DATEENTERED)) {
            $criteria->add(CustomerTableMap::COL_DATEENTERED, $this->dateentered);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_LASTSALEDATE)) {
            $criteria->add(CustomerTableMap::COL_LASTSALEDATE, $this->lastsaledate);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_ERRORMSG)) {
            $criteria->add(CustomerTableMap::COL_ERRORMSG, $this->errormsg);
        }
        if ($this->isColumnModified(CustomerTableMap::COL_DUMMY)) {
            $criteria->add(CustomerTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildCustomerQuery::create();
        $criteria->add(CustomerTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(CustomerTableMap::COL_RECNO, $this->recno);

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
     * @param      object $copyObj An object of \Customer (or compatible) type.
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
        $copyObj->setCustid($this->getCustid());
        $copyObj->setCustname($this->getCustname());
        $copyObj->setCaddress($this->getCaddress());
        $copyObj->setCaddress2($this->getCaddress2());
        $copyObj->setCaddress3($this->getCaddress3());
        $copyObj->setCcity($this->getCcity());
        $copyObj->setCst($this->getCst());
        $copyObj->setCzip($this->getCzip());
        $copyObj->setCcountry($this->getCcountry());
        $copyObj->setCphone($this->getCphone());
        $copyObj->setCsalesrep($this->getCsalesrep());
        $copyObj->setCsalesrepname($this->getCsalesrepname());
        $copyObj->setCtype($this->getCtype());
        $copyObj->setNbrshipto($this->getNbrshipto());
        $copyObj->setDateentered($this->getDateentered());
        $copyObj->setLastsaledate($this->getLastsaledate());
        $copyObj->setErrormsg($this->getErrormsg());
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
     * @return \Customer Clone of current object.
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
        $this->custid = null;
        $this->custname = null;
        $this->caddress = null;
        $this->caddress2 = null;
        $this->caddress3 = null;
        $this->ccity = null;
        $this->cst = null;
        $this->czip = null;
        $this->ccountry = null;
        $this->cphone = null;
        $this->csalesrep = null;
        $this->csalesrepname = null;
        $this->ctype = null;
        $this->nbrshipto = null;
        $this->dateentered = null;
        $this->lastsaledate = null;
        $this->errormsg = null;
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
        return (string) $this->exportTo(CustomerTableMap::DEFAULT_STRING_FORMAT);
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
