<?php

namespace Base;

use \QnoteQuery as ChildQnoteQuery;
use \Exception;
use \PDO;
use Map\QnoteTableMap;
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
 * Base class that represents a row from the 'qnote' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Qnote implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\QnoteTableMap';


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
     * The value for the rectype field.
     *
     * Note: this column has a database default value of: 'SORD'
     * @var        string
     */
    protected $rectype;

    /**
     * The value for the key1 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $key1;

    /**
     * The value for the key2 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $key2;

    /**
     * The value for the key3 field.
     *
     * @var        string
     */
    protected $key3;

    /**
     * The value for the key4 field.
     *
     * @var        string
     */
    protected $key4;

    /**
     * The value for the key5 field.
     *
     * @var        string
     */
    protected $key5;

    /**
     * The value for the form1 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $form1;

    /**
     * The value for the form2 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $form2;

    /**
     * The value for the form3 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $form3;

    /**
     * The value for the form4 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $form4;

    /**
     * The value for the form5 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $form5;

    /**
     * The value for the form6 field.
     *
     * @var        string
     */
    protected $form6;

    /**
     * The value for the form7 field.
     *
     * @var        string
     */
    protected $form7;

    /**
     * The value for the form8 field.
     *
     * @var        string
     */
    protected $form8;

    /**
     * The value for the colwidth field.
     *
     * @var        int
     */
    protected $colwidth;

    /**
     * The value for the notefld field.
     *
     * @var        string
     */
    protected $notefld;

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
        $this->recno = 0;
        $this->rectype = 'SORD';
        $this->key1 = '';
        $this->key2 = '';
        $this->form1 = '';
        $this->form2 = '';
        $this->form3 = '';
        $this->form4 = '';
        $this->form5 = '';
    }

    /**
     * Initializes internal state of Base\Qnote object.
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
     * Compares this with another <code>Qnote</code> instance.  If
     * <code>obj</code> is an instance of <code>Qnote</code>, delegates to
     * <code>equals(Qnote)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Qnote The current object, for fluid interface
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
     * Get the [rectype] column value.
     *
     * @return string
     */
    public function getRectype()
    {
        return $this->rectype;
    }

    /**
     * Get the [key1] column value.
     *
     * @return string
     */
    public function getKey1()
    {
        return $this->key1;
    }

    /**
     * Get the [key2] column value.
     *
     * @return string
     */
    public function getKey2()
    {
        return $this->key2;
    }

    /**
     * Get the [key3] column value.
     *
     * @return string
     */
    public function getKey3()
    {
        return $this->key3;
    }

    /**
     * Get the [key4] column value.
     *
     * @return string
     */
    public function getKey4()
    {
        return $this->key4;
    }

    /**
     * Get the [key5] column value.
     *
     * @return string
     */
    public function getKey5()
    {
        return $this->key5;
    }

    /**
     * Get the [form1] column value.
     *
     * @return string
     */
    public function getForm1()
    {
        return $this->form1;
    }

    /**
     * Get the [form2] column value.
     *
     * @return string
     */
    public function getForm2()
    {
        return $this->form2;
    }

    /**
     * Get the [form3] column value.
     *
     * @return string
     */
    public function getForm3()
    {
        return $this->form3;
    }

    /**
     * Get the [form4] column value.
     *
     * @return string
     */
    public function getForm4()
    {
        return $this->form4;
    }

    /**
     * Get the [form5] column value.
     *
     * @return string
     */
    public function getForm5()
    {
        return $this->form5;
    }

    /**
     * Get the [form6] column value.
     *
     * @return string
     */
    public function getForm6()
    {
        return $this->form6;
    }

    /**
     * Get the [form7] column value.
     *
     * @return string
     */
    public function getForm7()
    {
        return $this->form7;
    }

    /**
     * Get the [form8] column value.
     *
     * @return string
     */
    public function getForm8()
    {
        return $this->form8;
    }

    /**
     * Get the [colwidth] column value.
     *
     * @return int
     */
    public function getColwidth()
    {
        return $this->colwidth;
    }

    /**
     * Get the [notefld] column value.
     *
     * @return string
     */
    public function getNotefld()
    {
        return $this->notefld;
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
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[QnoteTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[QnoteTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[QnoteTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[QnoteTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [rectype] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setRectype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rectype !== $v) {
            $this->rectype = $v;
            $this->modifiedColumns[QnoteTableMap::COL_RECTYPE] = true;
        }

        return $this;
    } // setRectype()

    /**
     * Set the value of [key1] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setKey1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->key1 !== $v) {
            $this->key1 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_KEY1] = true;
        }

        return $this;
    } // setKey1()

    /**
     * Set the value of [key2] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setKey2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->key2 !== $v) {
            $this->key2 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_KEY2] = true;
        }

        return $this;
    } // setKey2()

    /**
     * Set the value of [key3] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setKey3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->key3 !== $v) {
            $this->key3 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_KEY3] = true;
        }

        return $this;
    } // setKey3()

    /**
     * Set the value of [key4] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setKey4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->key4 !== $v) {
            $this->key4 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_KEY4] = true;
        }

        return $this;
    } // setKey4()

    /**
     * Set the value of [key5] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setKey5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->key5 !== $v) {
            $this->key5 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_KEY5] = true;
        }

        return $this;
    } // setKey5()

    /**
     * Set the value of [form1] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setForm1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->form1 !== $v) {
            $this->form1 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_FORM1] = true;
        }

        return $this;
    } // setForm1()

    /**
     * Set the value of [form2] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setForm2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->form2 !== $v) {
            $this->form2 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_FORM2] = true;
        }

        return $this;
    } // setForm2()

    /**
     * Set the value of [form3] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setForm3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->form3 !== $v) {
            $this->form3 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_FORM3] = true;
        }

        return $this;
    } // setForm3()

    /**
     * Set the value of [form4] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setForm4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->form4 !== $v) {
            $this->form4 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_FORM4] = true;
        }

        return $this;
    } // setForm4()

    /**
     * Set the value of [form5] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setForm5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->form5 !== $v) {
            $this->form5 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_FORM5] = true;
        }

        return $this;
    } // setForm5()

    /**
     * Set the value of [form6] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setForm6($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->form6 !== $v) {
            $this->form6 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_FORM6] = true;
        }

        return $this;
    } // setForm6()

    /**
     * Set the value of [form7] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setForm7($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->form7 !== $v) {
            $this->form7 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_FORM7] = true;
        }

        return $this;
    } // setForm7()

    /**
     * Set the value of [form8] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setForm8($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->form8 !== $v) {
            $this->form8 = $v;
            $this->modifiedColumns[QnoteTableMap::COL_FORM8] = true;
        }

        return $this;
    } // setForm8()

    /**
     * Set the value of [colwidth] column.
     *
     * @param int $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setColwidth($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->colwidth !== $v) {
            $this->colwidth = $v;
            $this->modifiedColumns[QnoteTableMap::COL_COLWIDTH] = true;
        }

        return $this;
    } // setColwidth()

    /**
     * Set the value of [notefld] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setNotefld($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->notefld !== $v) {
            $this->notefld = $v;
            $this->modifiedColumns[QnoteTableMap::COL_NOTEFLD] = true;
        }

        return $this;
    } // setNotefld()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Qnote The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[QnoteTableMap::COL_DUMMY] = true;
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
            if ($this->recno !== 0) {
                return false;
            }

            if ($this->rectype !== 'SORD') {
                return false;
            }

            if ($this->key1 !== '') {
                return false;
            }

            if ($this->key2 !== '') {
                return false;
            }

            if ($this->form1 !== '') {
                return false;
            }

            if ($this->form2 !== '') {
                return false;
            }

            if ($this->form3 !== '') {
                return false;
            }

            if ($this->form4 !== '') {
                return false;
            }

            if ($this->form5 !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : QnoteTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : QnoteTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : QnoteTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : QnoteTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : QnoteTableMap::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rectype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : QnoteTableMap::translateFieldName('Key1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->key1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : QnoteTableMap::translateFieldName('Key2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->key2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : QnoteTableMap::translateFieldName('Key3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->key3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : QnoteTableMap::translateFieldName('Key4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->key4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : QnoteTableMap::translateFieldName('Key5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->key5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : QnoteTableMap::translateFieldName('Form1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->form1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : QnoteTableMap::translateFieldName('Form2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->form2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : QnoteTableMap::translateFieldName('Form3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->form3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : QnoteTableMap::translateFieldName('Form4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->form4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : QnoteTableMap::translateFieldName('Form5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->form5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : QnoteTableMap::translateFieldName('Form6', TableMap::TYPE_PHPNAME, $indexType)];
            $this->form6 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : QnoteTableMap::translateFieldName('Form7', TableMap::TYPE_PHPNAME, $indexType)];
            $this->form7 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : QnoteTableMap::translateFieldName('Form8', TableMap::TYPE_PHPNAME, $indexType)];
            $this->form8 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : QnoteTableMap::translateFieldName('Colwidth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->colwidth = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : QnoteTableMap::translateFieldName('Notefld', TableMap::TYPE_PHPNAME, $indexType)];
            $this->notefld = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : QnoteTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = QnoteTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Qnote'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(QnoteTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildQnoteQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Qnote::setDeleted()
     * @see Qnote::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(QnoteTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildQnoteQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(QnoteTableMap::DATABASE_NAME);
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
                QnoteTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(QnoteTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_RECTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'rectype';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY1)) {
            $modifiedColumns[':p' . $index++]  = 'key1';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY2)) {
            $modifiedColumns[':p' . $index++]  = 'key2';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY3)) {
            $modifiedColumns[':p' . $index++]  = 'key3';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY4)) {
            $modifiedColumns[':p' . $index++]  = 'key4';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY5)) {
            $modifiedColumns[':p' . $index++]  = 'key5';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM1)) {
            $modifiedColumns[':p' . $index++]  = 'form1';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM2)) {
            $modifiedColumns[':p' . $index++]  = 'form2';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM3)) {
            $modifiedColumns[':p' . $index++]  = 'form3';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM4)) {
            $modifiedColumns[':p' . $index++]  = 'form4';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM5)) {
            $modifiedColumns[':p' . $index++]  = 'form5';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM6)) {
            $modifiedColumns[':p' . $index++]  = 'form6';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM7)) {
            $modifiedColumns[':p' . $index++]  = 'form7';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM8)) {
            $modifiedColumns[':p' . $index++]  = 'form8';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_COLWIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'colwidth';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_NOTEFLD)) {
            $modifiedColumns[':p' . $index++]  = 'notefld';
        }
        if ($this->isColumnModified(QnoteTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO qnote (%s) VALUES (%s)',
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
                    case 'rectype':
                        $stmt->bindValue($identifier, $this->rectype, PDO::PARAM_STR);
                        break;
                    case 'key1':
                        $stmt->bindValue($identifier, $this->key1, PDO::PARAM_STR);
                        break;
                    case 'key2':
                        $stmt->bindValue($identifier, $this->key2, PDO::PARAM_STR);
                        break;
                    case 'key3':
                        $stmt->bindValue($identifier, $this->key3, PDO::PARAM_STR);
                        break;
                    case 'key4':
                        $stmt->bindValue($identifier, $this->key4, PDO::PARAM_STR);
                        break;
                    case 'key5':
                        $stmt->bindValue($identifier, $this->key5, PDO::PARAM_STR);
                        break;
                    case 'form1':
                        $stmt->bindValue($identifier, $this->form1, PDO::PARAM_STR);
                        break;
                    case 'form2':
                        $stmt->bindValue($identifier, $this->form2, PDO::PARAM_STR);
                        break;
                    case 'form3':
                        $stmt->bindValue($identifier, $this->form3, PDO::PARAM_STR);
                        break;
                    case 'form4':
                        $stmt->bindValue($identifier, $this->form4, PDO::PARAM_STR);
                        break;
                    case 'form5':
                        $stmt->bindValue($identifier, $this->form5, PDO::PARAM_STR);
                        break;
                    case 'form6':
                        $stmt->bindValue($identifier, $this->form6, PDO::PARAM_STR);
                        break;
                    case 'form7':
                        $stmt->bindValue($identifier, $this->form7, PDO::PARAM_STR);
                        break;
                    case 'form8':
                        $stmt->bindValue($identifier, $this->form8, PDO::PARAM_STR);
                        break;
                    case 'colwidth':
                        $stmt->bindValue($identifier, $this->colwidth, PDO::PARAM_INT);
                        break;
                    case 'notefld':
                        $stmt->bindValue($identifier, $this->notefld, PDO::PARAM_STR);
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
        $pos = QnoteTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRectype();
                break;
            case 5:
                return $this->getKey1();
                break;
            case 6:
                return $this->getKey2();
                break;
            case 7:
                return $this->getKey3();
                break;
            case 8:
                return $this->getKey4();
                break;
            case 9:
                return $this->getKey5();
                break;
            case 10:
                return $this->getForm1();
                break;
            case 11:
                return $this->getForm2();
                break;
            case 12:
                return $this->getForm3();
                break;
            case 13:
                return $this->getForm4();
                break;
            case 14:
                return $this->getForm5();
                break;
            case 15:
                return $this->getForm6();
                break;
            case 16:
                return $this->getForm7();
                break;
            case 17:
                return $this->getForm8();
                break;
            case 18:
                return $this->getColwidth();
                break;
            case 19:
                return $this->getNotefld();
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

        if (isset($alreadyDumpedObjects['Qnote'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Qnote'][$this->hashCode()] = true;
        $keys = QnoteTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getRectype(),
            $keys[5] => $this->getKey1(),
            $keys[6] => $this->getKey2(),
            $keys[7] => $this->getKey3(),
            $keys[8] => $this->getKey4(),
            $keys[9] => $this->getKey5(),
            $keys[10] => $this->getForm1(),
            $keys[11] => $this->getForm2(),
            $keys[12] => $this->getForm3(),
            $keys[13] => $this->getForm4(),
            $keys[14] => $this->getForm5(),
            $keys[15] => $this->getForm6(),
            $keys[16] => $this->getForm7(),
            $keys[17] => $this->getForm8(),
            $keys[18] => $this->getColwidth(),
            $keys[19] => $this->getNotefld(),
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
     * @return $this|\Qnote
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = QnoteTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Qnote
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
                $this->setRectype($value);
                break;
            case 5:
                $this->setKey1($value);
                break;
            case 6:
                $this->setKey2($value);
                break;
            case 7:
                $this->setKey3($value);
                break;
            case 8:
                $this->setKey4($value);
                break;
            case 9:
                $this->setKey5($value);
                break;
            case 10:
                $this->setForm1($value);
                break;
            case 11:
                $this->setForm2($value);
                break;
            case 12:
                $this->setForm3($value);
                break;
            case 13:
                $this->setForm4($value);
                break;
            case 14:
                $this->setForm5($value);
                break;
            case 15:
                $this->setForm6($value);
                break;
            case 16:
                $this->setForm7($value);
                break;
            case 17:
                $this->setForm8($value);
                break;
            case 18:
                $this->setColwidth($value);
                break;
            case 19:
                $this->setNotefld($value);
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
        $keys = QnoteTableMap::getFieldNames($keyType);

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
            $this->setRectype($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setKey1($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setKey2($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setKey3($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setKey4($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setKey5($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setForm1($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setForm2($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setForm3($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setForm4($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setForm5($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setForm6($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setForm7($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setForm8($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setColwidth($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setNotefld($arr[$keys[19]]);
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
     * @return $this|\Qnote The current object, for fluid interface
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
        $criteria = new Criteria(QnoteTableMap::DATABASE_NAME);

        if ($this->isColumnModified(QnoteTableMap::COL_SESSIONID)) {
            $criteria->add(QnoteTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_RECNO)) {
            $criteria->add(QnoteTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_DATE)) {
            $criteria->add(QnoteTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_TIME)) {
            $criteria->add(QnoteTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_RECTYPE)) {
            $criteria->add(QnoteTableMap::COL_RECTYPE, $this->rectype);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY1)) {
            $criteria->add(QnoteTableMap::COL_KEY1, $this->key1);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY2)) {
            $criteria->add(QnoteTableMap::COL_KEY2, $this->key2);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY3)) {
            $criteria->add(QnoteTableMap::COL_KEY3, $this->key3);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY4)) {
            $criteria->add(QnoteTableMap::COL_KEY4, $this->key4);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_KEY5)) {
            $criteria->add(QnoteTableMap::COL_KEY5, $this->key5);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM1)) {
            $criteria->add(QnoteTableMap::COL_FORM1, $this->form1);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM2)) {
            $criteria->add(QnoteTableMap::COL_FORM2, $this->form2);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM3)) {
            $criteria->add(QnoteTableMap::COL_FORM3, $this->form3);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM4)) {
            $criteria->add(QnoteTableMap::COL_FORM4, $this->form4);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM5)) {
            $criteria->add(QnoteTableMap::COL_FORM5, $this->form5);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM6)) {
            $criteria->add(QnoteTableMap::COL_FORM6, $this->form6);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM7)) {
            $criteria->add(QnoteTableMap::COL_FORM7, $this->form7);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_FORM8)) {
            $criteria->add(QnoteTableMap::COL_FORM8, $this->form8);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_COLWIDTH)) {
            $criteria->add(QnoteTableMap::COL_COLWIDTH, $this->colwidth);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_NOTEFLD)) {
            $criteria->add(QnoteTableMap::COL_NOTEFLD, $this->notefld);
        }
        if ($this->isColumnModified(QnoteTableMap::COL_DUMMY)) {
            $criteria->add(QnoteTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildQnoteQuery::create();
        $criteria->add(QnoteTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(QnoteTableMap::COL_RECNO, $this->recno);
        $criteria->add(QnoteTableMap::COL_RECTYPE, $this->rectype);
        $criteria->add(QnoteTableMap::COL_KEY1, $this->key1);
        $criteria->add(QnoteTableMap::COL_KEY2, $this->key2);
        $criteria->add(QnoteTableMap::COL_FORM1, $this->form1);
        $criteria->add(QnoteTableMap::COL_FORM2, $this->form2);
        $criteria->add(QnoteTableMap::COL_FORM3, $this->form3);
        $criteria->add(QnoteTableMap::COL_FORM4, $this->form4);
        $criteria->add(QnoteTableMap::COL_FORM5, $this->form5);

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
            null !== $this->getRecno() &&
            null !== $this->getRectype() &&
            null !== $this->getKey1() &&
            null !== $this->getKey2() &&
            null !== $this->getForm1() &&
            null !== $this->getForm2() &&
            null !== $this->getForm3() &&
            null !== $this->getForm4() &&
            null !== $this->getForm5();

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
        $pks[2] = $this->getRectype();
        $pks[3] = $this->getKey1();
        $pks[4] = $this->getKey2();
        $pks[5] = $this->getForm1();
        $pks[6] = $this->getForm2();
        $pks[7] = $this->getForm3();
        $pks[8] = $this->getForm4();
        $pks[9] = $this->getForm5();

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
        $this->setRectype($keys[2]);
        $this->setKey1($keys[3]);
        $this->setKey2($keys[4]);
        $this->setForm1($keys[5]);
        $this->setForm2($keys[6]);
        $this->setForm3($keys[7]);
        $this->setForm4($keys[8]);
        $this->setForm5($keys[9]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getSessionid()) && (null === $this->getRecno()) && (null === $this->getRectype()) && (null === $this->getKey1()) && (null === $this->getKey2()) && (null === $this->getForm1()) && (null === $this->getForm2()) && (null === $this->getForm3()) && (null === $this->getForm4()) && (null === $this->getForm5());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Qnote (or compatible) type.
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
        $copyObj->setRectype($this->getRectype());
        $copyObj->setKey1($this->getKey1());
        $copyObj->setKey2($this->getKey2());
        $copyObj->setKey3($this->getKey3());
        $copyObj->setKey4($this->getKey4());
        $copyObj->setKey5($this->getKey5());
        $copyObj->setForm1($this->getForm1());
        $copyObj->setForm2($this->getForm2());
        $copyObj->setForm3($this->getForm3());
        $copyObj->setForm4($this->getForm4());
        $copyObj->setForm5($this->getForm5());
        $copyObj->setForm6($this->getForm6());
        $copyObj->setForm7($this->getForm7());
        $copyObj->setForm8($this->getForm8());
        $copyObj->setColwidth($this->getColwidth());
        $copyObj->setNotefld($this->getNotefld());
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
     * @return \Qnote Clone of current object.
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
        $this->rectype = null;
        $this->key1 = null;
        $this->key2 = null;
        $this->key3 = null;
        $this->key4 = null;
        $this->key5 = null;
        $this->form1 = null;
        $this->form2 = null;
        $this->form3 = null;
        $this->form4 = null;
        $this->form5 = null;
        $this->form6 = null;
        $this->form7 = null;
        $this->form8 = null;
        $this->colwidth = null;
        $this->notefld = null;
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
        return (string) $this->exportTo(QnoteTableMap::DEFAULT_STRING_FORMAT);
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
