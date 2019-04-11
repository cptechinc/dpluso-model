<?php

namespace Base;

use \CustcontactQuery as ChildCustcontactQuery;
use \Exception;
use \PDO;
use Map\CustcontactTableMap;
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
 * Base class that represents a row from the 'custcontact' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Custcontact implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CustcontactTableMap';


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
     * The value for the shiptoid field.
     *
     * @var        string
     */
    protected $shiptoid;

    /**
     * The value for the contactid field.
     *
     * @var        string
     */
    protected $contactid;

    /**
     * The value for the phtype field.
     *
     * @var        string
     */
    protected $phtype;

    /**
     * The value for the phseq field.
     *
     * @var        string
     */
    protected $phseq;

    /**
     * The value for the phintl field.
     *
     * @var        string
     */
    protected $phintl;

    /**
     * The value for the officephone field.
     *
     * @var        string
     */
    protected $officephone;

    /**
     * The value for the extension field.
     *
     * @var        string
     */
    protected $extension;

    /**
     * The value for the cellphone field.
     *
     * @var        string
     */
    protected $cellphone;

    /**
     * The value for the faxnumber field.
     *
     * @var        string
     */
    protected $faxnumber;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the webaddress field.
     *
     * @var        string
     */
    protected $webaddress;

    /**
     * The value for the lastcontact field.
     *
     * @var        string
     */
    protected $lastcontact;

    /**
     * The value for the followupdate field.
     *
     * @var        string
     */
    protected $followupdate;

    /**
     * The value for the errormsg field.
     *
     * @var        string
     */
    protected $errormsg;

    /**
     * The value for the shptoname field.
     *
     * @var        string
     */
    protected $shptoname;

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
     * Initializes internal state of Base\Custcontact object.
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
     * Compares this with another <code>Custcontact</code> instance.  If
     * <code>obj</code> is an instance of <code>Custcontact</code>, delegates to
     * <code>equals(Custcontact)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Custcontact The current object, for fluid interface
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
     * Get the [contactid] column value.
     *
     * @return string
     */
    public function getContactid()
    {
        return $this->contactid;
    }

    /**
     * Get the [phtype] column value.
     *
     * @return string
     */
    public function getPhtype()
    {
        return $this->phtype;
    }

    /**
     * Get the [phseq] column value.
     *
     * @return string
     */
    public function getPhseq()
    {
        return $this->phseq;
    }

    /**
     * Get the [phintl] column value.
     *
     * @return string
     */
    public function getPhintl()
    {
        return $this->phintl;
    }

    /**
     * Get the [officephone] column value.
     *
     * @return string
     */
    public function getOfficephone()
    {
        return $this->officephone;
    }

    /**
     * Get the [extension] column value.
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Get the [cellphone] column value.
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Get the [faxnumber] column value.
     *
     * @return string
     */
    public function getFaxnumber()
    {
        return $this->faxnumber;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [webaddress] column value.
     *
     * @return string
     */
    public function getWebaddress()
    {
        return $this->webaddress;
    }

    /**
     * Get the [lastcontact] column value.
     *
     * @return string
     */
    public function getLastcontact()
    {
        return $this->lastcontact;
    }

    /**
     * Get the [followupdate] column value.
     *
     * @return string
     */
    public function getFollowupdate()
    {
        return $this->followupdate;
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
     * Get the [shptoname] column value.
     *
     * @return string
     */
    public function getShptoname()
    {
        return $this->shptoname;
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
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    } // setShiptoid()

    /**
     * Set the value of [contactid] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setContactid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactid !== $v) {
            $this->contactid = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_CONTACTID] = true;
        }

        return $this;
    } // setContactid()

    /**
     * Set the value of [phtype] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setPhtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phtype !== $v) {
            $this->phtype = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_PHTYPE] = true;
        }

        return $this;
    } // setPhtype()

    /**
     * Set the value of [phseq] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setPhseq($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phseq !== $v) {
            $this->phseq = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_PHSEQ] = true;
        }

        return $this;
    } // setPhseq()

    /**
     * Set the value of [phintl] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setPhintl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phintl !== $v) {
            $this->phintl = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_PHINTL] = true;
        }

        return $this;
    } // setPhintl()

    /**
     * Set the value of [officephone] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setOfficephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->officephone !== $v) {
            $this->officephone = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_OFFICEPHONE] = true;
        }

        return $this;
    } // setOfficephone()

    /**
     * Set the value of [extension] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setExtension($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->extension !== $v) {
            $this->extension = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_EXTENSION] = true;
        }

        return $this;
    } // setExtension()

    /**
     * Set the value of [cellphone] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setCellphone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cellphone !== $v) {
            $this->cellphone = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_CELLPHONE] = true;
        }

        return $this;
    } // setCellphone()

    /**
     * Set the value of [faxnumber] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setFaxnumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->faxnumber !== $v) {
            $this->faxnumber = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_FAXNUMBER] = true;
        }

        return $this;
    } // setFaxnumber()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [webaddress] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setWebaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->webaddress !== $v) {
            $this->webaddress = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_WEBADDRESS] = true;
        }

        return $this;
    } // setWebaddress()

    /**
     * Set the value of [lastcontact] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setLastcontact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastcontact !== $v) {
            $this->lastcontact = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_LASTCONTACT] = true;
        }

        return $this;
    } // setLastcontact()

    /**
     * Set the value of [followupdate] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setFollowupdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->followupdate !== $v) {
            $this->followupdate = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_FOLLOWUPDATE] = true;
        }

        return $this;
    } // setFollowupdate()

    /**
     * Set the value of [errormsg] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setErrormsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->errormsg !== $v) {
            $this->errormsg = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_ERRORMSG] = true;
        }

        return $this;
    } // setErrormsg()

    /**
     * Set the value of [shptoname] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setShptoname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shptoname !== $v) {
            $this->shptoname = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_SHPTONAME] = true;
        }

        return $this;
    } // setShptoname()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Custcontact The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[CustcontactTableMap::COL_DUMMY] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CustcontactTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CustcontactTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CustcontactTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CustcontactTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CustcontactTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CustcontactTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CustcontactTableMap::translateFieldName('Contactid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contactid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CustcontactTableMap::translateFieldName('Phtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CustcontactTableMap::translateFieldName('Phseq', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phseq = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CustcontactTableMap::translateFieldName('Phintl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phintl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CustcontactTableMap::translateFieldName('Officephone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->officephone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CustcontactTableMap::translateFieldName('Extension', TableMap::TYPE_PHPNAME, $indexType)];
            $this->extension = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CustcontactTableMap::translateFieldName('Cellphone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cellphone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CustcontactTableMap::translateFieldName('Faxnumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->faxnumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CustcontactTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CustcontactTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CustcontactTableMap::translateFieldName('Webaddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->webaddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CustcontactTableMap::translateFieldName('Lastcontact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastcontact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : CustcontactTableMap::translateFieldName('Followupdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->followupdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : CustcontactTableMap::translateFieldName('Errormsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->errormsg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : CustcontactTableMap::translateFieldName('Shptoname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shptoname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : CustcontactTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 22; // 22 = CustcontactTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Custcontact'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(CustcontactTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCustcontactQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Custcontact::setDeleted()
     * @see Custcontact::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustcontactTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCustcontactQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustcontactTableMap::DATABASE_NAME);
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
                CustcontactTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(CustcontactTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_CONTACTID)) {
            $modifiedColumns[':p' . $index++]  = 'contactid';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_PHTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'phtype';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_PHSEQ)) {
            $modifiedColumns[':p' . $index++]  = 'phseq';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_PHINTL)) {
            $modifiedColumns[':p' . $index++]  = 'phintl';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_OFFICEPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'officephone';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_EXTENSION)) {
            $modifiedColumns[':p' . $index++]  = 'extension';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_CELLPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'cellphone';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_FAXNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'faxnumber';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_WEBADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'webaddress';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_LASTCONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'lastcontact';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_FOLLOWUPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'followupdate';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_ERRORMSG)) {
            $modifiedColumns[':p' . $index++]  = 'errormsg';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_SHPTONAME)) {
            $modifiedColumns[':p' . $index++]  = 'shptoname';
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO custcontact (%s) VALUES (%s)',
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
                    case 'contactid':
                        $stmt->bindValue($identifier, $this->contactid, PDO::PARAM_STR);
                        break;
                    case 'phtype':
                        $stmt->bindValue($identifier, $this->phtype, PDO::PARAM_STR);
                        break;
                    case 'phseq':
                        $stmt->bindValue($identifier, $this->phseq, PDO::PARAM_STR);
                        break;
                    case 'phintl':
                        $stmt->bindValue($identifier, $this->phintl, PDO::PARAM_STR);
                        break;
                    case 'officephone':
                        $stmt->bindValue($identifier, $this->officephone, PDO::PARAM_STR);
                        break;
                    case 'extension':
                        $stmt->bindValue($identifier, $this->extension, PDO::PARAM_STR);
                        break;
                    case 'cellphone':
                        $stmt->bindValue($identifier, $this->cellphone, PDO::PARAM_STR);
                        break;
                    case 'faxnumber':
                        $stmt->bindValue($identifier, $this->faxnumber, PDO::PARAM_STR);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'webaddress':
                        $stmt->bindValue($identifier, $this->webaddress, PDO::PARAM_STR);
                        break;
                    case 'lastcontact':
                        $stmt->bindValue($identifier, $this->lastcontact, PDO::PARAM_STR);
                        break;
                    case 'followupdate':
                        $stmt->bindValue($identifier, $this->followupdate, PDO::PARAM_STR);
                        break;
                    case 'errormsg':
                        $stmt->bindValue($identifier, $this->errormsg, PDO::PARAM_STR);
                        break;
                    case 'shptoname':
                        $stmt->bindValue($identifier, $this->shptoname, PDO::PARAM_STR);
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
        $pos = CustcontactTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getContactid();
                break;
            case 7:
                return $this->getPhtype();
                break;
            case 8:
                return $this->getPhseq();
                break;
            case 9:
                return $this->getPhintl();
                break;
            case 10:
                return $this->getOfficephone();
                break;
            case 11:
                return $this->getExtension();
                break;
            case 12:
                return $this->getCellphone();
                break;
            case 13:
                return $this->getFaxnumber();
                break;
            case 14:
                return $this->getTitle();
                break;
            case 15:
                return $this->getEmail();
                break;
            case 16:
                return $this->getWebaddress();
                break;
            case 17:
                return $this->getLastcontact();
                break;
            case 18:
                return $this->getFollowupdate();
                break;
            case 19:
                return $this->getErrormsg();
                break;
            case 20:
                return $this->getShptoname();
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

        if (isset($alreadyDumpedObjects['Custcontact'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Custcontact'][$this->hashCode()] = true;
        $keys = CustcontactTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getCustid(),
            $keys[5] => $this->getShiptoid(),
            $keys[6] => $this->getContactid(),
            $keys[7] => $this->getPhtype(),
            $keys[8] => $this->getPhseq(),
            $keys[9] => $this->getPhintl(),
            $keys[10] => $this->getOfficephone(),
            $keys[11] => $this->getExtension(),
            $keys[12] => $this->getCellphone(),
            $keys[13] => $this->getFaxnumber(),
            $keys[14] => $this->getTitle(),
            $keys[15] => $this->getEmail(),
            $keys[16] => $this->getWebaddress(),
            $keys[17] => $this->getLastcontact(),
            $keys[18] => $this->getFollowupdate(),
            $keys[19] => $this->getErrormsg(),
            $keys[20] => $this->getShptoname(),
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
     * @return $this|\Custcontact
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CustcontactTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Custcontact
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
                $this->setContactid($value);
                break;
            case 7:
                $this->setPhtype($value);
                break;
            case 8:
                $this->setPhseq($value);
                break;
            case 9:
                $this->setPhintl($value);
                break;
            case 10:
                $this->setOfficephone($value);
                break;
            case 11:
                $this->setExtension($value);
                break;
            case 12:
                $this->setCellphone($value);
                break;
            case 13:
                $this->setFaxnumber($value);
                break;
            case 14:
                $this->setTitle($value);
                break;
            case 15:
                $this->setEmail($value);
                break;
            case 16:
                $this->setWebaddress($value);
                break;
            case 17:
                $this->setLastcontact($value);
                break;
            case 18:
                $this->setFollowupdate($value);
                break;
            case 19:
                $this->setErrormsg($value);
                break;
            case 20:
                $this->setShptoname($value);
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
        $keys = CustcontactTableMap::getFieldNames($keyType);

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
            $this->setContactid($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPhtype($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPhseq($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPhintl($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setOfficephone($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setExtension($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCellphone($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setFaxnumber($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTitle($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setEmail($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setWebaddress($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setLastcontact($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setFollowupdate($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setErrormsg($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setShptoname($arr[$keys[20]]);
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
     * @return $this|\Custcontact The current object, for fluid interface
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
        $criteria = new Criteria(CustcontactTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CustcontactTableMap::COL_SESSIONID)) {
            $criteria->add(CustcontactTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_RECNO)) {
            $criteria->add(CustcontactTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_DATE)) {
            $criteria->add(CustcontactTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_TIME)) {
            $criteria->add(CustcontactTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_CUSTID)) {
            $criteria->add(CustcontactTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_SHIPTOID)) {
            $criteria->add(CustcontactTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_CONTACTID)) {
            $criteria->add(CustcontactTableMap::COL_CONTACTID, $this->contactid);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_PHTYPE)) {
            $criteria->add(CustcontactTableMap::COL_PHTYPE, $this->phtype);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_PHSEQ)) {
            $criteria->add(CustcontactTableMap::COL_PHSEQ, $this->phseq);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_PHINTL)) {
            $criteria->add(CustcontactTableMap::COL_PHINTL, $this->phintl);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_OFFICEPHONE)) {
            $criteria->add(CustcontactTableMap::COL_OFFICEPHONE, $this->officephone);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_EXTENSION)) {
            $criteria->add(CustcontactTableMap::COL_EXTENSION, $this->extension);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_CELLPHONE)) {
            $criteria->add(CustcontactTableMap::COL_CELLPHONE, $this->cellphone);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_FAXNUMBER)) {
            $criteria->add(CustcontactTableMap::COL_FAXNUMBER, $this->faxnumber);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_TITLE)) {
            $criteria->add(CustcontactTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_EMAIL)) {
            $criteria->add(CustcontactTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_WEBADDRESS)) {
            $criteria->add(CustcontactTableMap::COL_WEBADDRESS, $this->webaddress);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_LASTCONTACT)) {
            $criteria->add(CustcontactTableMap::COL_LASTCONTACT, $this->lastcontact);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_FOLLOWUPDATE)) {
            $criteria->add(CustcontactTableMap::COL_FOLLOWUPDATE, $this->followupdate);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_ERRORMSG)) {
            $criteria->add(CustcontactTableMap::COL_ERRORMSG, $this->errormsg);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_SHPTONAME)) {
            $criteria->add(CustcontactTableMap::COL_SHPTONAME, $this->shptoname);
        }
        if ($this->isColumnModified(CustcontactTableMap::COL_DUMMY)) {
            $criteria->add(CustcontactTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildCustcontactQuery::create();
        $criteria->add(CustcontactTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(CustcontactTableMap::COL_RECNO, $this->recno);

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
     * @param      object $copyObj An object of \Custcontact (or compatible) type.
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
        $copyObj->setContactid($this->getContactid());
        $copyObj->setPhtype($this->getPhtype());
        $copyObj->setPhseq($this->getPhseq());
        $copyObj->setPhintl($this->getPhintl());
        $copyObj->setOfficephone($this->getOfficephone());
        $copyObj->setExtension($this->getExtension());
        $copyObj->setCellphone($this->getCellphone());
        $copyObj->setFaxnumber($this->getFaxnumber());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setWebaddress($this->getWebaddress());
        $copyObj->setLastcontact($this->getLastcontact());
        $copyObj->setFollowupdate($this->getFollowupdate());
        $copyObj->setErrormsg($this->getErrormsg());
        $copyObj->setShptoname($this->getShptoname());
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
     * @return \Custcontact Clone of current object.
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
        $this->contactid = null;
        $this->phtype = null;
        $this->phseq = null;
        $this->phintl = null;
        $this->officephone = null;
        $this->extension = null;
        $this->cellphone = null;
        $this->faxnumber = null;
        $this->title = null;
        $this->email = null;
        $this->webaddress = null;
        $this->lastcontact = null;
        $this->followupdate = null;
        $this->errormsg = null;
        $this->shptoname = null;
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
        return (string) $this->exportTo(CustcontactTableMap::DEFAULT_STRING_FORMAT);
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
