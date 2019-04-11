<?php

namespace Base;

use \SaleschartQuery as ChildSaleschartQuery;
use \Exception;
use \PDO;
use Map\SaleschartTableMap;
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
 * Base class that represents a row from the 'saleschart' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Saleschart implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\SaleschartTableMap';


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
     * Note: this column has a database default value of: 0
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
     * The value for the shiptoid field.
     *
     * @var        string
     */
    protected $shiptoid;

    /**
     * The value for the lastsaledate field.
     *
     * @var        string
     */
    protected $lastsaledate;

    /**
     * The value for the salesmtd field.
     *
     * @var        string
     */
    protected $salesmtd;

    /**
     * The value for the salesmth1 field.
     *
     * @var        string
     */
    protected $salesmth1;

    /**
     * The value for the salesmth2 field.
     *
     * @var        string
     */
    protected $salesmth2;

    /**
     * The value for the salesmth3 field.
     *
     * @var        string
     */
    protected $salesmth3;

    /**
     * The value for the salesmth4 field.
     *
     * @var        string
     */
    protected $salesmth4;

    /**
     * The value for the salesmth5 field.
     *
     * @var        string
     */
    protected $salesmth5;

    /**
     * The value for the salesmth6 field.
     *
     * @var        string
     */
    protected $salesmth6;

    /**
     * The value for the salesmth7 field.
     *
     * @var        string
     */
    protected $salesmth7;

    /**
     * The value for the salesmth8 field.
     *
     * @var        string
     */
    protected $salesmth8;

    /**
     * The value for the salesmth9 field.
     *
     * @var        string
     */
    protected $salesmth9;

    /**
     * The value for the salesmth10 field.
     *
     * @var        string
     */
    protected $salesmth10;

    /**
     * The value for the salesmth11 field.
     *
     * @var        string
     */
    protected $salesmth11;

    /**
     * The value for the salesmth12 field.
     *
     * @var        string
     */
    protected $salesmth12;

    /**
     * The value for the salesmth13 field.
     *
     * @var        string
     */
    protected $salesmth13;

    /**
     * The value for the salesmth14 field.
     *
     * @var        string
     */
    protected $salesmth14;

    /**
     * The value for the salesmth15 field.
     *
     * @var        string
     */
    protected $salesmth15;

    /**
     * The value for the salesmth16 field.
     *
     * @var        string
     */
    protected $salesmth16;

    /**
     * The value for the salesmth17 field.
     *
     * @var        string
     */
    protected $salesmth17;

    /**
     * The value for the salesmth18 field.
     *
     * @var        string
     */
    protected $salesmth18;

    /**
     * The value for the salesmth19 field.
     *
     * @var        string
     */
    protected $salesmth19;

    /**
     * The value for the salesmth20 field.
     *
     * @var        string
     */
    protected $salesmth20;

    /**
     * The value for the salesmth21 field.
     *
     * @var        string
     */
    protected $salesmth21;

    /**
     * The value for the salesmth22 field.
     *
     * @var        string
     */
    protected $salesmth22;

    /**
     * The value for the salesmth23 field.
     *
     * @var        string
     */
    protected $salesmth23;

    /**
     * The value for the salesmth24 field.
     *
     * @var        string
     */
    protected $salesmth24;

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
        $this->recno = 0;
    }

    /**
     * Initializes internal state of Base\Saleschart object.
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
     * Compares this with another <code>Saleschart</code> instance.  If
     * <code>obj</code> is an instance of <code>Saleschart</code>, delegates to
     * <code>equals(Saleschart)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Saleschart The current object, for fluid interface
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
     * Get the [shiptoid] column value.
     *
     * @return string
     */
    public function getShiptoid()
    {
        return $this->shiptoid;
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
     * Get the [salesmtd] column value.
     *
     * @return string
     */
    public function getSalesmtd()
    {
        return $this->salesmtd;
    }

    /**
     * Get the [salesmth1] column value.
     *
     * @return string
     */
    public function getSalesmth1()
    {
        return $this->salesmth1;
    }

    /**
     * Get the [salesmth2] column value.
     *
     * @return string
     */
    public function getSalesmth2()
    {
        return $this->salesmth2;
    }

    /**
     * Get the [salesmth3] column value.
     *
     * @return string
     */
    public function getSalesmth3()
    {
        return $this->salesmth3;
    }

    /**
     * Get the [salesmth4] column value.
     *
     * @return string
     */
    public function getSalesmth4()
    {
        return $this->salesmth4;
    }

    /**
     * Get the [salesmth5] column value.
     *
     * @return string
     */
    public function getSalesmth5()
    {
        return $this->salesmth5;
    }

    /**
     * Get the [salesmth6] column value.
     *
     * @return string
     */
    public function getSalesmth6()
    {
        return $this->salesmth6;
    }

    /**
     * Get the [salesmth7] column value.
     *
     * @return string
     */
    public function getSalesmth7()
    {
        return $this->salesmth7;
    }

    /**
     * Get the [salesmth8] column value.
     *
     * @return string
     */
    public function getSalesmth8()
    {
        return $this->salesmth8;
    }

    /**
     * Get the [salesmth9] column value.
     *
     * @return string
     */
    public function getSalesmth9()
    {
        return $this->salesmth9;
    }

    /**
     * Get the [salesmth10] column value.
     *
     * @return string
     */
    public function getSalesmth10()
    {
        return $this->salesmth10;
    }

    /**
     * Get the [salesmth11] column value.
     *
     * @return string
     */
    public function getSalesmth11()
    {
        return $this->salesmth11;
    }

    /**
     * Get the [salesmth12] column value.
     *
     * @return string
     */
    public function getSalesmth12()
    {
        return $this->salesmth12;
    }

    /**
     * Get the [salesmth13] column value.
     *
     * @return string
     */
    public function getSalesmth13()
    {
        return $this->salesmth13;
    }

    /**
     * Get the [salesmth14] column value.
     *
     * @return string
     */
    public function getSalesmth14()
    {
        return $this->salesmth14;
    }

    /**
     * Get the [salesmth15] column value.
     *
     * @return string
     */
    public function getSalesmth15()
    {
        return $this->salesmth15;
    }

    /**
     * Get the [salesmth16] column value.
     *
     * @return string
     */
    public function getSalesmth16()
    {
        return $this->salesmth16;
    }

    /**
     * Get the [salesmth17] column value.
     *
     * @return string
     */
    public function getSalesmth17()
    {
        return $this->salesmth17;
    }

    /**
     * Get the [salesmth18] column value.
     *
     * @return string
     */
    public function getSalesmth18()
    {
        return $this->salesmth18;
    }

    /**
     * Get the [salesmth19] column value.
     *
     * @return string
     */
    public function getSalesmth19()
    {
        return $this->salesmth19;
    }

    /**
     * Get the [salesmth20] column value.
     *
     * @return string
     */
    public function getSalesmth20()
    {
        return $this->salesmth20;
    }

    /**
     * Get the [salesmth21] column value.
     *
     * @return string
     */
    public function getSalesmth21()
    {
        return $this->salesmth21;
    }

    /**
     * Get the [salesmth22] column value.
     *
     * @return string
     */
    public function getSalesmth22()
    {
        return $this->salesmth22;
    }

    /**
     * Get the [salesmth23] column value.
     *
     * @return string
     */
    public function getSalesmth23()
    {
        return $this->salesmth23;
    }

    /**
     * Get the [salesmth24] column value.
     *
     * @return string
     */
    public function getSalesmth24()
    {
        return $this->salesmth24;
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
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    } // setShiptoid()

    /**
     * Set the value of [lastsaledate] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setLastsaledate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastsaledate !== $v) {
            $this->lastsaledate = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_LASTSALEDATE] = true;
        }

        return $this;
    } // setLastsaledate()

    /**
     * Set the value of [salesmtd] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmtd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmtd !== $v) {
            $this->salesmtd = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTD] = true;
        }

        return $this;
    } // setSalesmtd()

    /**
     * Set the value of [salesmth1] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth1 !== $v) {
            $this->salesmth1 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH1] = true;
        }

        return $this;
    } // setSalesmth1()

    /**
     * Set the value of [salesmth2] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth2 !== $v) {
            $this->salesmth2 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH2] = true;
        }

        return $this;
    } // setSalesmth2()

    /**
     * Set the value of [salesmth3] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth3 !== $v) {
            $this->salesmth3 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH3] = true;
        }

        return $this;
    } // setSalesmth3()

    /**
     * Set the value of [salesmth4] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth4 !== $v) {
            $this->salesmth4 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH4] = true;
        }

        return $this;
    } // setSalesmth4()

    /**
     * Set the value of [salesmth5] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth5 !== $v) {
            $this->salesmth5 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH5] = true;
        }

        return $this;
    } // setSalesmth5()

    /**
     * Set the value of [salesmth6] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth6($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth6 !== $v) {
            $this->salesmth6 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH6] = true;
        }

        return $this;
    } // setSalesmth6()

    /**
     * Set the value of [salesmth7] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth7($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth7 !== $v) {
            $this->salesmth7 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH7] = true;
        }

        return $this;
    } // setSalesmth7()

    /**
     * Set the value of [salesmth8] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth8($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth8 !== $v) {
            $this->salesmth8 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH8] = true;
        }

        return $this;
    } // setSalesmth8()

    /**
     * Set the value of [salesmth9] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth9($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth9 !== $v) {
            $this->salesmth9 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH9] = true;
        }

        return $this;
    } // setSalesmth9()

    /**
     * Set the value of [salesmth10] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth10($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth10 !== $v) {
            $this->salesmth10 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH10] = true;
        }

        return $this;
    } // setSalesmth10()

    /**
     * Set the value of [salesmth11] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth11($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth11 !== $v) {
            $this->salesmth11 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH11] = true;
        }

        return $this;
    } // setSalesmth11()

    /**
     * Set the value of [salesmth12] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth12($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth12 !== $v) {
            $this->salesmth12 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH12] = true;
        }

        return $this;
    } // setSalesmth12()

    /**
     * Set the value of [salesmth13] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth13($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth13 !== $v) {
            $this->salesmth13 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH13] = true;
        }

        return $this;
    } // setSalesmth13()

    /**
     * Set the value of [salesmth14] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth14($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth14 !== $v) {
            $this->salesmth14 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH14] = true;
        }

        return $this;
    } // setSalesmth14()

    /**
     * Set the value of [salesmth15] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth15($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth15 !== $v) {
            $this->salesmth15 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH15] = true;
        }

        return $this;
    } // setSalesmth15()

    /**
     * Set the value of [salesmth16] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth16($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth16 !== $v) {
            $this->salesmth16 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH16] = true;
        }

        return $this;
    } // setSalesmth16()

    /**
     * Set the value of [salesmth17] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth17($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth17 !== $v) {
            $this->salesmth17 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH17] = true;
        }

        return $this;
    } // setSalesmth17()

    /**
     * Set the value of [salesmth18] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth18($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth18 !== $v) {
            $this->salesmth18 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH18] = true;
        }

        return $this;
    } // setSalesmth18()

    /**
     * Set the value of [salesmth19] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth19($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth19 !== $v) {
            $this->salesmth19 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH19] = true;
        }

        return $this;
    } // setSalesmth19()

    /**
     * Set the value of [salesmth20] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth20($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth20 !== $v) {
            $this->salesmth20 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH20] = true;
        }

        return $this;
    } // setSalesmth20()

    /**
     * Set the value of [salesmth21] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth21($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth21 !== $v) {
            $this->salesmth21 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH21] = true;
        }

        return $this;
    } // setSalesmth21()

    /**
     * Set the value of [salesmth22] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth22($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth22 !== $v) {
            $this->salesmth22 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH22] = true;
        }

        return $this;
    } // setSalesmth22()

    /**
     * Set the value of [salesmth23] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth23($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth23 !== $v) {
            $this->salesmth23 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH23] = true;
        }

        return $this;
    } // setSalesmth23()

    /**
     * Set the value of [salesmth24] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setSalesmth24($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesmth24 !== $v) {
            $this->salesmth24 = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_SALESMTH24] = true;
        }

        return $this;
    } // setSalesmth24()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Saleschart The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[SaleschartTableMap::COL_DUMMY] = true;
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

            if ($this->recno !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SaleschartTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SaleschartTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SaleschartTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SaleschartTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SaleschartTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SaleschartTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SaleschartTableMap::translateFieldName('Lastsaledate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastsaledate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SaleschartTableMap::translateFieldName('Salesmtd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmtd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SaleschartTableMap::translateFieldName('Salesmth1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SaleschartTableMap::translateFieldName('Salesmth2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SaleschartTableMap::translateFieldName('Salesmth3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SaleschartTableMap::translateFieldName('Salesmth4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SaleschartTableMap::translateFieldName('Salesmth5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SaleschartTableMap::translateFieldName('Salesmth6', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth6 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SaleschartTableMap::translateFieldName('Salesmth7', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth7 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SaleschartTableMap::translateFieldName('Salesmth8', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth8 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SaleschartTableMap::translateFieldName('Salesmth9', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth9 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SaleschartTableMap::translateFieldName('Salesmth10', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth10 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : SaleschartTableMap::translateFieldName('Salesmth11', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth11 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : SaleschartTableMap::translateFieldName('Salesmth12', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth12 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : SaleschartTableMap::translateFieldName('Salesmth13', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth13 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : SaleschartTableMap::translateFieldName('Salesmth14', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth14 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : SaleschartTableMap::translateFieldName('Salesmth15', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth15 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : SaleschartTableMap::translateFieldName('Salesmth16', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth16 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : SaleschartTableMap::translateFieldName('Salesmth17', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth17 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : SaleschartTableMap::translateFieldName('Salesmth18', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth18 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : SaleschartTableMap::translateFieldName('Salesmth19', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth19 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : SaleschartTableMap::translateFieldName('Salesmth20', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth20 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : SaleschartTableMap::translateFieldName('Salesmth21', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth21 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : SaleschartTableMap::translateFieldName('Salesmth22', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth22 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : SaleschartTableMap::translateFieldName('Salesmth23', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth23 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : SaleschartTableMap::translateFieldName('Salesmth24', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesmth24 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : SaleschartTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 33; // 33 = SaleschartTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Saleschart'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SaleschartTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSaleschartQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Saleschart::setDeleted()
     * @see Saleschart::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SaleschartTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSaleschartQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SaleschartTableMap::DATABASE_NAME);
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
                SaleschartTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(SaleschartTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_LASTSALEDATE)) {
            $modifiedColumns[':p' . $index++]  = 'lastsaledate';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTD)) {
            $modifiedColumns[':p' . $index++]  = 'salesmtd';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH1)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth1';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH2)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth2';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH3)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth3';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH4)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth4';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH5)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth5';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH6)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth6';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH7)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth7';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH8)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth8';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH9)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth9';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH10)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth10';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH11)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth11';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH12)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth12';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH13)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth13';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH14)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth14';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH15)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth15';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH16)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth16';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH17)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth17';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH18)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth18';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH19)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth19';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH20)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth20';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH21)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth21';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH22)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth22';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH23)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth23';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH24)) {
            $modifiedColumns[':p' . $index++]  = 'salesmth24';
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO saleschart (%s) VALUES (%s)',
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
                    case 'shiptoid':
                        $stmt->bindValue($identifier, $this->shiptoid, PDO::PARAM_STR);
                        break;
                    case 'lastsaledate':
                        $stmt->bindValue($identifier, $this->lastsaledate, PDO::PARAM_STR);
                        break;
                    case 'salesmtd':
                        $stmt->bindValue($identifier, $this->salesmtd, PDO::PARAM_STR);
                        break;
                    case 'salesmth1':
                        $stmt->bindValue($identifier, $this->salesmth1, PDO::PARAM_STR);
                        break;
                    case 'salesmth2':
                        $stmt->bindValue($identifier, $this->salesmth2, PDO::PARAM_STR);
                        break;
                    case 'salesmth3':
                        $stmt->bindValue($identifier, $this->salesmth3, PDO::PARAM_STR);
                        break;
                    case 'salesmth4':
                        $stmt->bindValue($identifier, $this->salesmth4, PDO::PARAM_STR);
                        break;
                    case 'salesmth5':
                        $stmt->bindValue($identifier, $this->salesmth5, PDO::PARAM_STR);
                        break;
                    case 'salesmth6':
                        $stmt->bindValue($identifier, $this->salesmth6, PDO::PARAM_STR);
                        break;
                    case 'salesmth7':
                        $stmt->bindValue($identifier, $this->salesmth7, PDO::PARAM_STR);
                        break;
                    case 'salesmth8':
                        $stmt->bindValue($identifier, $this->salesmth8, PDO::PARAM_STR);
                        break;
                    case 'salesmth9':
                        $stmt->bindValue($identifier, $this->salesmth9, PDO::PARAM_STR);
                        break;
                    case 'salesmth10':
                        $stmt->bindValue($identifier, $this->salesmth10, PDO::PARAM_STR);
                        break;
                    case 'salesmth11':
                        $stmt->bindValue($identifier, $this->salesmth11, PDO::PARAM_STR);
                        break;
                    case 'salesmth12':
                        $stmt->bindValue($identifier, $this->salesmth12, PDO::PARAM_STR);
                        break;
                    case 'salesmth13':
                        $stmt->bindValue($identifier, $this->salesmth13, PDO::PARAM_STR);
                        break;
                    case 'salesmth14':
                        $stmt->bindValue($identifier, $this->salesmth14, PDO::PARAM_STR);
                        break;
                    case 'salesmth15':
                        $stmt->bindValue($identifier, $this->salesmth15, PDO::PARAM_STR);
                        break;
                    case 'salesmth16':
                        $stmt->bindValue($identifier, $this->salesmth16, PDO::PARAM_STR);
                        break;
                    case 'salesmth17':
                        $stmt->bindValue($identifier, $this->salesmth17, PDO::PARAM_STR);
                        break;
                    case 'salesmth18':
                        $stmt->bindValue($identifier, $this->salesmth18, PDO::PARAM_STR);
                        break;
                    case 'salesmth19':
                        $stmt->bindValue($identifier, $this->salesmth19, PDO::PARAM_STR);
                        break;
                    case 'salesmth20':
                        $stmt->bindValue($identifier, $this->salesmth20, PDO::PARAM_STR);
                        break;
                    case 'salesmth21':
                        $stmt->bindValue($identifier, $this->salesmth21, PDO::PARAM_STR);
                        break;
                    case 'salesmth22':
                        $stmt->bindValue($identifier, $this->salesmth22, PDO::PARAM_STR);
                        break;
                    case 'salesmth23':
                        $stmt->bindValue($identifier, $this->salesmth23, PDO::PARAM_STR);
                        break;
                    case 'salesmth24':
                        $stmt->bindValue($identifier, $this->salesmth24, PDO::PARAM_STR);
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
        $pos = SaleschartTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getShiptoid();
                break;
            case 6:
                return $this->getLastsaledate();
                break;
            case 7:
                return $this->getSalesmtd();
                break;
            case 8:
                return $this->getSalesmth1();
                break;
            case 9:
                return $this->getSalesmth2();
                break;
            case 10:
                return $this->getSalesmth3();
                break;
            case 11:
                return $this->getSalesmth4();
                break;
            case 12:
                return $this->getSalesmth5();
                break;
            case 13:
                return $this->getSalesmth6();
                break;
            case 14:
                return $this->getSalesmth7();
                break;
            case 15:
                return $this->getSalesmth8();
                break;
            case 16:
                return $this->getSalesmth9();
                break;
            case 17:
                return $this->getSalesmth10();
                break;
            case 18:
                return $this->getSalesmth11();
                break;
            case 19:
                return $this->getSalesmth12();
                break;
            case 20:
                return $this->getSalesmth13();
                break;
            case 21:
                return $this->getSalesmth14();
                break;
            case 22:
                return $this->getSalesmth15();
                break;
            case 23:
                return $this->getSalesmth16();
                break;
            case 24:
                return $this->getSalesmth17();
                break;
            case 25:
                return $this->getSalesmth18();
                break;
            case 26:
                return $this->getSalesmth19();
                break;
            case 27:
                return $this->getSalesmth20();
                break;
            case 28:
                return $this->getSalesmth21();
                break;
            case 29:
                return $this->getSalesmth22();
                break;
            case 30:
                return $this->getSalesmth23();
                break;
            case 31:
                return $this->getSalesmth24();
                break;
            case 32:
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

        if (isset($alreadyDumpedObjects['Saleschart'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Saleschart'][$this->hashCode()] = true;
        $keys = SaleschartTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getCustid(),
            $keys[5] => $this->getShiptoid(),
            $keys[6] => $this->getLastsaledate(),
            $keys[7] => $this->getSalesmtd(),
            $keys[8] => $this->getSalesmth1(),
            $keys[9] => $this->getSalesmth2(),
            $keys[10] => $this->getSalesmth3(),
            $keys[11] => $this->getSalesmth4(),
            $keys[12] => $this->getSalesmth5(),
            $keys[13] => $this->getSalesmth6(),
            $keys[14] => $this->getSalesmth7(),
            $keys[15] => $this->getSalesmth8(),
            $keys[16] => $this->getSalesmth9(),
            $keys[17] => $this->getSalesmth10(),
            $keys[18] => $this->getSalesmth11(),
            $keys[19] => $this->getSalesmth12(),
            $keys[20] => $this->getSalesmth13(),
            $keys[21] => $this->getSalesmth14(),
            $keys[22] => $this->getSalesmth15(),
            $keys[23] => $this->getSalesmth16(),
            $keys[24] => $this->getSalesmth17(),
            $keys[25] => $this->getSalesmth18(),
            $keys[26] => $this->getSalesmth19(),
            $keys[27] => $this->getSalesmth20(),
            $keys[28] => $this->getSalesmth21(),
            $keys[29] => $this->getSalesmth22(),
            $keys[30] => $this->getSalesmth23(),
            $keys[31] => $this->getSalesmth24(),
            $keys[32] => $this->getDummy(),
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
     * @return $this|\Saleschart
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SaleschartTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Saleschart
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
                $this->setShiptoid($value);
                break;
            case 6:
                $this->setLastsaledate($value);
                break;
            case 7:
                $this->setSalesmtd($value);
                break;
            case 8:
                $this->setSalesmth1($value);
                break;
            case 9:
                $this->setSalesmth2($value);
                break;
            case 10:
                $this->setSalesmth3($value);
                break;
            case 11:
                $this->setSalesmth4($value);
                break;
            case 12:
                $this->setSalesmth5($value);
                break;
            case 13:
                $this->setSalesmth6($value);
                break;
            case 14:
                $this->setSalesmth7($value);
                break;
            case 15:
                $this->setSalesmth8($value);
                break;
            case 16:
                $this->setSalesmth9($value);
                break;
            case 17:
                $this->setSalesmth10($value);
                break;
            case 18:
                $this->setSalesmth11($value);
                break;
            case 19:
                $this->setSalesmth12($value);
                break;
            case 20:
                $this->setSalesmth13($value);
                break;
            case 21:
                $this->setSalesmth14($value);
                break;
            case 22:
                $this->setSalesmth15($value);
                break;
            case 23:
                $this->setSalesmth16($value);
                break;
            case 24:
                $this->setSalesmth17($value);
                break;
            case 25:
                $this->setSalesmth18($value);
                break;
            case 26:
                $this->setSalesmth19($value);
                break;
            case 27:
                $this->setSalesmth20($value);
                break;
            case 28:
                $this->setSalesmth21($value);
                break;
            case 29:
                $this->setSalesmth22($value);
                break;
            case 30:
                $this->setSalesmth23($value);
                break;
            case 31:
                $this->setSalesmth24($value);
                break;
            case 32:
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
        $keys = SaleschartTableMap::getFieldNames($keyType);

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
            $this->setShiptoid($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setLastsaledate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSalesmtd($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSalesmth1($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSalesmth2($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSalesmth3($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSalesmth4($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSalesmth5($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSalesmth6($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setSalesmth7($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setSalesmth8($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setSalesmth9($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setSalesmth10($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setSalesmth11($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setSalesmth12($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setSalesmth13($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setSalesmth14($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setSalesmth15($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setSalesmth16($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setSalesmth17($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setSalesmth18($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setSalesmth19($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setSalesmth20($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setSalesmth21($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setSalesmth22($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setSalesmth23($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setSalesmth24($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setDummy($arr[$keys[32]]);
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
     * @return $this|\Saleschart The current object, for fluid interface
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
        $criteria = new Criteria(SaleschartTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SaleschartTableMap::COL_SESSIONID)) {
            $criteria->add(SaleschartTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_RECNO)) {
            $criteria->add(SaleschartTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_DATE)) {
            $criteria->add(SaleschartTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_TIME)) {
            $criteria->add(SaleschartTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_CUSTID)) {
            $criteria->add(SaleschartTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SHIPTOID)) {
            $criteria->add(SaleschartTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_LASTSALEDATE)) {
            $criteria->add(SaleschartTableMap::COL_LASTSALEDATE, $this->lastsaledate);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTD)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTD, $this->salesmtd);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH1)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH1, $this->salesmth1);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH2)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH2, $this->salesmth2);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH3)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH3, $this->salesmth3);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH4)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH4, $this->salesmth4);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH5)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH5, $this->salesmth5);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH6)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH6, $this->salesmth6);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH7)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH7, $this->salesmth7);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH8)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH8, $this->salesmth8);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH9)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH9, $this->salesmth9);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH10)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH10, $this->salesmth10);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH11)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH11, $this->salesmth11);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH12)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH12, $this->salesmth12);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH13)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH13, $this->salesmth13);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH14)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH14, $this->salesmth14);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH15)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH15, $this->salesmth15);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH16)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH16, $this->salesmth16);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH17)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH17, $this->salesmth17);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH18)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH18, $this->salesmth18);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH19)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH19, $this->salesmth19);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH20)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH20, $this->salesmth20);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH21)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH21, $this->salesmth21);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH22)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH22, $this->salesmth22);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH23)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH23, $this->salesmth23);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_SALESMTH24)) {
            $criteria->add(SaleschartTableMap::COL_SALESMTH24, $this->salesmth24);
        }
        if ($this->isColumnModified(SaleschartTableMap::COL_DUMMY)) {
            $criteria->add(SaleschartTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildSaleschartQuery::create();
        $criteria->add(SaleschartTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(SaleschartTableMap::COL_RECNO, $this->recno);

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
     * @param      object $copyObj An object of \Saleschart (or compatible) type.
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
        $copyObj->setShiptoid($this->getShiptoid());
        $copyObj->setLastsaledate($this->getLastsaledate());
        $copyObj->setSalesmtd($this->getSalesmtd());
        $copyObj->setSalesmth1($this->getSalesmth1());
        $copyObj->setSalesmth2($this->getSalesmth2());
        $copyObj->setSalesmth3($this->getSalesmth3());
        $copyObj->setSalesmth4($this->getSalesmth4());
        $copyObj->setSalesmth5($this->getSalesmth5());
        $copyObj->setSalesmth6($this->getSalesmth6());
        $copyObj->setSalesmth7($this->getSalesmth7());
        $copyObj->setSalesmth8($this->getSalesmth8());
        $copyObj->setSalesmth9($this->getSalesmth9());
        $copyObj->setSalesmth10($this->getSalesmth10());
        $copyObj->setSalesmth11($this->getSalesmth11());
        $copyObj->setSalesmth12($this->getSalesmth12());
        $copyObj->setSalesmth13($this->getSalesmth13());
        $copyObj->setSalesmth14($this->getSalesmth14());
        $copyObj->setSalesmth15($this->getSalesmth15());
        $copyObj->setSalesmth16($this->getSalesmth16());
        $copyObj->setSalesmth17($this->getSalesmth17());
        $copyObj->setSalesmth18($this->getSalesmth18());
        $copyObj->setSalesmth19($this->getSalesmth19());
        $copyObj->setSalesmth20($this->getSalesmth20());
        $copyObj->setSalesmth21($this->getSalesmth21());
        $copyObj->setSalesmth22($this->getSalesmth22());
        $copyObj->setSalesmth23($this->getSalesmth23());
        $copyObj->setSalesmth24($this->getSalesmth24());
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
     * @return \Saleschart Clone of current object.
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
        $this->shiptoid = null;
        $this->lastsaledate = null;
        $this->salesmtd = null;
        $this->salesmth1 = null;
        $this->salesmth2 = null;
        $this->salesmth3 = null;
        $this->salesmth4 = null;
        $this->salesmth5 = null;
        $this->salesmth6 = null;
        $this->salesmth7 = null;
        $this->salesmth8 = null;
        $this->salesmth9 = null;
        $this->salesmth10 = null;
        $this->salesmth11 = null;
        $this->salesmth12 = null;
        $this->salesmth13 = null;
        $this->salesmth14 = null;
        $this->salesmth15 = null;
        $this->salesmth16 = null;
        $this->salesmth17 = null;
        $this->salesmth18 = null;
        $this->salesmth19 = null;
        $this->salesmth20 = null;
        $this->salesmth21 = null;
        $this->salesmth22 = null;
        $this->salesmth23 = null;
        $this->salesmth24 = null;
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
        return (string) $this->exportTo(SaleschartTableMap::DEFAULT_STRING_FORMAT);
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
