<?php

namespace Base;

use \UseractionsQuery as ChildUseractionsQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\UseractionsTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'useractions' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Useractions implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\UseractionsTableMap';


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
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the datecreated field.
     *
     * @var        DateTime
     */
    protected $datecreated;

    /**
     * The value for the actiontype field.
     *
     * @var        string
     */
    protected $actiontype;

    /**
     * The value for the actionsubtype field.
     *
     * @var        string
     */
    protected $actionsubtype;

    /**
     * The value for the duedate field.
     *
     * @var        DateTime
     */
    protected $duedate;

    /**
     * The value for the createdby field.
     *
     * @var        string
     */
    protected $createdby;

    /**
     * The value for the assignedto field.
     *
     * @var        string
     */
    protected $assignedto;

    /**
     * The value for the assignedby field.
     *
     * @var        string
     */
    protected $assignedby;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the textbody field.
     *
     * @var        string
     */
    protected $textbody;

    /**
     * The value for the reflectnote field.
     *
     * @var        string
     */
    protected $reflectnote;

    /**
     * The value for the completed field.
     *
     * @var        string
     */
    protected $completed;

    /**
     * The value for the datecompleted field.
     *
     * @var        DateTime
     */
    protected $datecompleted;

    /**
     * The value for the dateupdated field.
     *
     * @var        DateTime
     */
    protected $dateupdated;

    /**
     * The value for the customerlink field.
     *
     * @var        string
     */
    protected $customerlink;

    /**
     * The value for the shiptolink field.
     *
     * @var        string
     */
    protected $shiptolink;

    /**
     * The value for the contactlink field.
     *
     * @var        string
     */
    protected $contactlink;

    /**
     * The value for the salesorderlink field.
     *
     * @var        string
     */
    protected $salesorderlink;

    /**
     * The value for the quotelink field.
     *
     * @var        string
     */
    protected $quotelink;

    /**
     * The value for the vendorlink field.
     *
     * @var        string
     */
    protected $vendorlink;

    /**
     * The value for the vendorshipfromlink field.
     *
     * @var        string
     */
    protected $vendorshipfromlink;

    /**
     * The value for the purchaseorderlink field.
     *
     * @var        string
     */
    protected $purchaseorderlink;

    /**
     * The value for the actionlink field.
     *
     * @var        string
     */
    protected $actionlink;

    /**
     * The value for the rescheduledlink field.
     *
     * @var        string
     */
    protected $rescheduledlink;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\Useractions object.
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
     * Compares this with another <code>Useractions</code> instance.  If
     * <code>obj</code> is an instance of <code>Useractions</code>, delegates to
     * <code>equals(Useractions)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Useractions The current object, for fluid interface
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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [optionally formatted] temporal [datecreated] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatecreated($format = NULL)
    {
        if ($format === null) {
            return $this->datecreated;
        } else {
            return $this->datecreated instanceof \DateTimeInterface ? $this->datecreated->format($format) : null;
        }
    }

    /**
     * Get the [actiontype] column value.
     *
     * @return string
     */
    public function getActiontype()
    {
        return $this->actiontype;
    }

    /**
     * Get the [actionsubtype] column value.
     *
     * @return string
     */
    public function getActionsubtype()
    {
        return $this->actionsubtype;
    }

    /**
     * Get the [optionally formatted] temporal [duedate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDuedate($format = NULL)
    {
        if ($format === null) {
            return $this->duedate;
        } else {
            return $this->duedate instanceof \DateTimeInterface ? $this->duedate->format($format) : null;
        }
    }

    /**
     * Get the [createdby] column value.
     *
     * @return string
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * Get the [assignedto] column value.
     *
     * @return string
     */
    public function getAssignedto()
    {
        return $this->assignedto;
    }

    /**
     * Get the [assignedby] column value.
     *
     * @return string
     */
    public function getAssignedby()
    {
        return $this->assignedby;
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
     * Get the [textbody] column value.
     *
     * @return string
     */
    public function getTextbody()
    {
        return $this->textbody;
    }

    /**
     * Get the [reflectnote] column value.
     *
     * @return string
     */
    public function getReflectnote()
    {
        return $this->reflectnote;
    }

    /**
     * Get the [completed] column value.
     *
     * @return string
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * Get the [optionally formatted] temporal [datecompleted] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatecompleted($format = NULL)
    {
        if ($format === null) {
            return $this->datecompleted;
        } else {
            return $this->datecompleted instanceof \DateTimeInterface ? $this->datecompleted->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [dateupdated] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateupdated($format = NULL)
    {
        if ($format === null) {
            return $this->dateupdated;
        } else {
            return $this->dateupdated instanceof \DateTimeInterface ? $this->dateupdated->format($format) : null;
        }
    }

    /**
     * Get the [customerlink] column value.
     *
     * @return string
     */
    public function getCustomerlink()
    {
        return $this->customerlink;
    }

    /**
     * Get the [shiptolink] column value.
     *
     * @return string
     */
    public function getShiptolink()
    {
        return $this->shiptolink;
    }

    /**
     * Get the [contactlink] column value.
     *
     * @return string
     */
    public function getContactlink()
    {
        return $this->contactlink;
    }

    /**
     * Get the [salesorderlink] column value.
     *
     * @return string
     */
    public function getSalesorderlink()
    {
        return $this->salesorderlink;
    }

    /**
     * Get the [quotelink] column value.
     *
     * @return string
     */
    public function getQuotelink()
    {
        return $this->quotelink;
    }

    /**
     * Get the [vendorlink] column value.
     *
     * @return string
     */
    public function getVendorlink()
    {
        return $this->vendorlink;
    }

    /**
     * Get the [vendorshipfromlink] column value.
     *
     * @return string
     */
    public function getVendorshipfromlink()
    {
        return $this->vendorshipfromlink;
    }

    /**
     * Get the [purchaseorderlink] column value.
     *
     * @return string
     */
    public function getPurchaseorderlink()
    {
        return $this->purchaseorderlink;
    }

    /**
     * Get the [actionlink] column value.
     *
     * @return string
     */
    public function getActionlink()
    {
        return $this->actionlink;
    }

    /**
     * Get the [rescheduledlink] column value.
     *
     * @return string
     */
    public function getRescheduledlink()
    {
        return $this->rescheduledlink;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Sets the value of [datecreated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setDatecreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datecreated !== null || $dt !== null) {
            if ($this->datecreated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->datecreated->format("Y-m-d H:i:s.u")) {
                $this->datecreated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UseractionsTableMap::COL_DATECREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDatecreated()

    /**
     * Set the value of [actiontype] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setActiontype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->actiontype !== $v) {
            $this->actiontype = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_ACTIONTYPE] = true;
        }

        return $this;
    } // setActiontype()

    /**
     * Set the value of [actionsubtype] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setActionsubtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->actionsubtype !== $v) {
            $this->actionsubtype = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_ACTIONSUBTYPE] = true;
        }

        return $this;
    } // setActionsubtype()

    /**
     * Sets the value of [duedate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setDuedate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->duedate !== null || $dt !== null) {
            if ($this->duedate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->duedate->format("Y-m-d H:i:s.u")) {
                $this->duedate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UseractionsTableMap::COL_DUEDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setDuedate()

    /**
     * Set the value of [createdby] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setCreatedby($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->createdby !== $v) {
            $this->createdby = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_CREATEDBY] = true;
        }

        return $this;
    } // setCreatedby()

    /**
     * Set the value of [assignedto] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setAssignedto($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->assignedto !== $v) {
            $this->assignedto = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_ASSIGNEDTO] = true;
        }

        return $this;
    } // setAssignedto()

    /**
     * Set the value of [assignedby] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setAssignedby($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->assignedby !== $v) {
            $this->assignedby = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_ASSIGNEDBY] = true;
        }

        return $this;
    } // setAssignedby()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [textbody] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setTextbody($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->textbody !== $v) {
            $this->textbody = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_TEXTBODY] = true;
        }

        return $this;
    } // setTextbody()

    /**
     * Set the value of [reflectnote] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setReflectnote($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reflectnote !== $v) {
            $this->reflectnote = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_REFLECTNOTE] = true;
        }

        return $this;
    } // setReflectnote()

    /**
     * Set the value of [completed] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setCompleted($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->completed !== $v) {
            $this->completed = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_COMPLETED] = true;
        }

        return $this;
    } // setCompleted()

    /**
     * Sets the value of [datecompleted] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setDatecompleted($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datecompleted !== null || $dt !== null) {
            if ($this->datecompleted === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->datecompleted->format("Y-m-d H:i:s.u")) {
                $this->datecompleted = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UseractionsTableMap::COL_DATECOMPLETED] = true;
            }
        } // if either are not null

        return $this;
    } // setDatecompleted()

    /**
     * Sets the value of [dateupdated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setDateupdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dateupdated !== null || $dt !== null) {
            if ($this->dateupdated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->dateupdated->format("Y-m-d H:i:s.u")) {
                $this->dateupdated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UseractionsTableMap::COL_DATEUPDATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateupdated()

    /**
     * Set the value of [customerlink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setCustomerlink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->customerlink !== $v) {
            $this->customerlink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_CUSTOMERLINK] = true;
        }

        return $this;
    } // setCustomerlink()

    /**
     * Set the value of [shiptolink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setShiptolink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptolink !== $v) {
            $this->shiptolink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_SHIPTOLINK] = true;
        }

        return $this;
    } // setShiptolink()

    /**
     * Set the value of [contactlink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setContactlink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactlink !== $v) {
            $this->contactlink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_CONTACTLINK] = true;
        }

        return $this;
    } // setContactlink()

    /**
     * Set the value of [salesorderlink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setSalesorderlink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesorderlink !== $v) {
            $this->salesorderlink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_SALESORDERLINK] = true;
        }

        return $this;
    } // setSalesorderlink()

    /**
     * Set the value of [quotelink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setQuotelink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotelink !== $v) {
            $this->quotelink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_QUOTELINK] = true;
        }

        return $this;
    } // setQuotelink()

    /**
     * Set the value of [vendorlink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setVendorlink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendorlink !== $v) {
            $this->vendorlink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_VENDORLINK] = true;
        }

        return $this;
    } // setVendorlink()

    /**
     * Set the value of [vendorshipfromlink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setVendorshipfromlink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendorshipfromlink !== $v) {
            $this->vendorshipfromlink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_VENDORSHIPFROMLINK] = true;
        }

        return $this;
    } // setVendorshipfromlink()

    /**
     * Set the value of [purchaseorderlink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setPurchaseorderlink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->purchaseorderlink !== $v) {
            $this->purchaseorderlink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_PURCHASEORDERLINK] = true;
        }

        return $this;
    } // setPurchaseorderlink()

    /**
     * Set the value of [actionlink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setActionlink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->actionlink !== $v) {
            $this->actionlink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_ACTIONLINK] = true;
        }

        return $this;
    } // setActionlink()

    /**
     * Set the value of [rescheduledlink] column.
     *
     * @param string $v new value
     * @return $this|\Useractions The current object (for fluent API support)
     */
    public function setRescheduledlink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rescheduledlink !== $v) {
            $this->rescheduledlink = $v;
            $this->modifiedColumns[UseractionsTableMap::COL_RESCHEDULEDLINK] = true;
        }

        return $this;
    } // setRescheduledlink()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UseractionsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UseractionsTableMap::translateFieldName('Datecreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->datecreated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UseractionsTableMap::translateFieldName('Actiontype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->actiontype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UseractionsTableMap::translateFieldName('Actionsubtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->actionsubtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UseractionsTableMap::translateFieldName('Duedate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->duedate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UseractionsTableMap::translateFieldName('Createdby', TableMap::TYPE_PHPNAME, $indexType)];
            $this->createdby = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UseractionsTableMap::translateFieldName('Assignedto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->assignedto = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : UseractionsTableMap::translateFieldName('Assignedby', TableMap::TYPE_PHPNAME, $indexType)];
            $this->assignedby = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : UseractionsTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : UseractionsTableMap::translateFieldName('Textbody', TableMap::TYPE_PHPNAME, $indexType)];
            $this->textbody = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : UseractionsTableMap::translateFieldName('Reflectnote', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reflectnote = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : UseractionsTableMap::translateFieldName('Completed', TableMap::TYPE_PHPNAME, $indexType)];
            $this->completed = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : UseractionsTableMap::translateFieldName('Datecompleted', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->datecompleted = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : UseractionsTableMap::translateFieldName('Dateupdated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->dateupdated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : UseractionsTableMap::translateFieldName('Customerlink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customerlink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : UseractionsTableMap::translateFieldName('Shiptolink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptolink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : UseractionsTableMap::translateFieldName('Contactlink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contactlink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : UseractionsTableMap::translateFieldName('Salesorderlink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesorderlink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : UseractionsTableMap::translateFieldName('Quotelink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotelink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : UseractionsTableMap::translateFieldName('Vendorlink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendorlink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : UseractionsTableMap::translateFieldName('Vendorshipfromlink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendorshipfromlink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : UseractionsTableMap::translateFieldName('Purchaseorderlink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->purchaseorderlink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : UseractionsTableMap::translateFieldName('Actionlink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->actionlink = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : UseractionsTableMap::translateFieldName('Rescheduledlink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rescheduledlink = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 24; // 24 = UseractionsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Useractions'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(UseractionsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUseractionsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Useractions::setDeleted()
     * @see Useractions::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UseractionsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUseractionsQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(UseractionsTableMap::DATABASE_NAME);
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
                UseractionsTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[UseractionsTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UseractionsTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UseractionsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_DATECREATED)) {
            $modifiedColumns[':p' . $index++]  = 'datecreated';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ACTIONTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'actiontype';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ACTIONSUBTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'actionsubtype';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_DUEDATE)) {
            $modifiedColumns[':p' . $index++]  = 'duedate';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_CREATEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'createdby';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ASSIGNEDTO)) {
            $modifiedColumns[':p' . $index++]  = 'assignedto';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ASSIGNEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'assignedby';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_TEXTBODY)) {
            $modifiedColumns[':p' . $index++]  = 'textbody';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_REFLECTNOTE)) {
            $modifiedColumns[':p' . $index++]  = 'reflectnote';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_COMPLETED)) {
            $modifiedColumns[':p' . $index++]  = 'completed';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_DATECOMPLETED)) {
            $modifiedColumns[':p' . $index++]  = 'datecompleted';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_DATEUPDATED)) {
            $modifiedColumns[':p' . $index++]  = 'dateupdated';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_CUSTOMERLINK)) {
            $modifiedColumns[':p' . $index++]  = 'customerlink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_SHIPTOLINK)) {
            $modifiedColumns[':p' . $index++]  = 'shiptolink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_CONTACTLINK)) {
            $modifiedColumns[':p' . $index++]  = 'contactlink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_SALESORDERLINK)) {
            $modifiedColumns[':p' . $index++]  = 'salesorderlink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_QUOTELINK)) {
            $modifiedColumns[':p' . $index++]  = 'quotelink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_VENDORLINK)) {
            $modifiedColumns[':p' . $index++]  = 'vendorlink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_VENDORSHIPFROMLINK)) {
            $modifiedColumns[':p' . $index++]  = 'vendorshipfromlink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_PURCHASEORDERLINK)) {
            $modifiedColumns[':p' . $index++]  = 'purchaseorderlink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ACTIONLINK)) {
            $modifiedColumns[':p' . $index++]  = 'actionlink';
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_RESCHEDULEDLINK)) {
            $modifiedColumns[':p' . $index++]  = 'rescheduledlink';
        }

        $sql = sprintf(
            'INSERT INTO useractions (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'datecreated':
                        $stmt->bindValue($identifier, $this->datecreated ? $this->datecreated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'actiontype':
                        $stmt->bindValue($identifier, $this->actiontype, PDO::PARAM_STR);
                        break;
                    case 'actionsubtype':
                        $stmt->bindValue($identifier, $this->actionsubtype, PDO::PARAM_STR);
                        break;
                    case 'duedate':
                        $stmt->bindValue($identifier, $this->duedate ? $this->duedate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'createdby':
                        $stmt->bindValue($identifier, $this->createdby, PDO::PARAM_STR);
                        break;
                    case 'assignedto':
                        $stmt->bindValue($identifier, $this->assignedto, PDO::PARAM_STR);
                        break;
                    case 'assignedby':
                        $stmt->bindValue($identifier, $this->assignedby, PDO::PARAM_STR);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'textbody':
                        $stmt->bindValue($identifier, $this->textbody, PDO::PARAM_STR);
                        break;
                    case 'reflectnote':
                        $stmt->bindValue($identifier, $this->reflectnote, PDO::PARAM_STR);
                        break;
                    case 'completed':
                        $stmt->bindValue($identifier, $this->completed, PDO::PARAM_STR);
                        break;
                    case 'datecompleted':
                        $stmt->bindValue($identifier, $this->datecompleted ? $this->datecompleted->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'dateupdated':
                        $stmt->bindValue($identifier, $this->dateupdated ? $this->dateupdated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'customerlink':
                        $stmt->bindValue($identifier, $this->customerlink, PDO::PARAM_STR);
                        break;
                    case 'shiptolink':
                        $stmt->bindValue($identifier, $this->shiptolink, PDO::PARAM_STR);
                        break;
                    case 'contactlink':
                        $stmt->bindValue($identifier, $this->contactlink, PDO::PARAM_STR);
                        break;
                    case 'salesorderlink':
                        $stmt->bindValue($identifier, $this->salesorderlink, PDO::PARAM_STR);
                        break;
                    case 'quotelink':
                        $stmt->bindValue($identifier, $this->quotelink, PDO::PARAM_STR);
                        break;
                    case 'vendorlink':
                        $stmt->bindValue($identifier, $this->vendorlink, PDO::PARAM_STR);
                        break;
                    case 'vendorshipfromlink':
                        $stmt->bindValue($identifier, $this->vendorshipfromlink, PDO::PARAM_STR);
                        break;
                    case 'purchaseorderlink':
                        $stmt->bindValue($identifier, $this->purchaseorderlink, PDO::PARAM_STR);
                        break;
                    case 'actionlink':
                        $stmt->bindValue($identifier, $this->actionlink, PDO::PARAM_STR);
                        break;
                    case 'rescheduledlink':
                        $stmt->bindValue($identifier, $this->rescheduledlink, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

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
        $pos = UseractionsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getId();
                break;
            case 1:
                return $this->getDatecreated();
                break;
            case 2:
                return $this->getActiontype();
                break;
            case 3:
                return $this->getActionsubtype();
                break;
            case 4:
                return $this->getDuedate();
                break;
            case 5:
                return $this->getCreatedby();
                break;
            case 6:
                return $this->getAssignedto();
                break;
            case 7:
                return $this->getAssignedby();
                break;
            case 8:
                return $this->getTitle();
                break;
            case 9:
                return $this->getTextbody();
                break;
            case 10:
                return $this->getReflectnote();
                break;
            case 11:
                return $this->getCompleted();
                break;
            case 12:
                return $this->getDatecompleted();
                break;
            case 13:
                return $this->getDateupdated();
                break;
            case 14:
                return $this->getCustomerlink();
                break;
            case 15:
                return $this->getShiptolink();
                break;
            case 16:
                return $this->getContactlink();
                break;
            case 17:
                return $this->getSalesorderlink();
                break;
            case 18:
                return $this->getQuotelink();
                break;
            case 19:
                return $this->getVendorlink();
                break;
            case 20:
                return $this->getVendorshipfromlink();
                break;
            case 21:
                return $this->getPurchaseorderlink();
                break;
            case 22:
                return $this->getActionlink();
                break;
            case 23:
                return $this->getRescheduledlink();
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

        if (isset($alreadyDumpedObjects['Useractions'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Useractions'][$this->hashCode()] = true;
        $keys = UseractionsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDatecreated(),
            $keys[2] => $this->getActiontype(),
            $keys[3] => $this->getActionsubtype(),
            $keys[4] => $this->getDuedate(),
            $keys[5] => $this->getCreatedby(),
            $keys[6] => $this->getAssignedto(),
            $keys[7] => $this->getAssignedby(),
            $keys[8] => $this->getTitle(),
            $keys[9] => $this->getTextbody(),
            $keys[10] => $this->getReflectnote(),
            $keys[11] => $this->getCompleted(),
            $keys[12] => $this->getDatecompleted(),
            $keys[13] => $this->getDateupdated(),
            $keys[14] => $this->getCustomerlink(),
            $keys[15] => $this->getShiptolink(),
            $keys[16] => $this->getContactlink(),
            $keys[17] => $this->getSalesorderlink(),
            $keys[18] => $this->getQuotelink(),
            $keys[19] => $this->getVendorlink(),
            $keys[20] => $this->getVendorshipfromlink(),
            $keys[21] => $this->getPurchaseorderlink(),
            $keys[22] => $this->getActionlink(),
            $keys[23] => $this->getRescheduledlink(),
        );
        if ($result[$keys[1]] instanceof \DateTimeInterface) {
            $result[$keys[1]] = $result[$keys[1]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        if ($result[$keys[12]] instanceof \DateTimeInterface) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }

        if ($result[$keys[13]] instanceof \DateTimeInterface) {
            $result[$keys[13]] = $result[$keys[13]]->format('c');
        }

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
     * @return $this|\Useractions
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UseractionsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Useractions
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setDatecreated($value);
                break;
            case 2:
                $this->setActiontype($value);
                break;
            case 3:
                $this->setActionsubtype($value);
                break;
            case 4:
                $this->setDuedate($value);
                break;
            case 5:
                $this->setCreatedby($value);
                break;
            case 6:
                $this->setAssignedto($value);
                break;
            case 7:
                $this->setAssignedby($value);
                break;
            case 8:
                $this->setTitle($value);
                break;
            case 9:
                $this->setTextbody($value);
                break;
            case 10:
                $this->setReflectnote($value);
                break;
            case 11:
                $this->setCompleted($value);
                break;
            case 12:
                $this->setDatecompleted($value);
                break;
            case 13:
                $this->setDateupdated($value);
                break;
            case 14:
                $this->setCustomerlink($value);
                break;
            case 15:
                $this->setShiptolink($value);
                break;
            case 16:
                $this->setContactlink($value);
                break;
            case 17:
                $this->setSalesorderlink($value);
                break;
            case 18:
                $this->setQuotelink($value);
                break;
            case 19:
                $this->setVendorlink($value);
                break;
            case 20:
                $this->setVendorshipfromlink($value);
                break;
            case 21:
                $this->setPurchaseorderlink($value);
                break;
            case 22:
                $this->setActionlink($value);
                break;
            case 23:
                $this->setRescheduledlink($value);
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
        $keys = UseractionsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDatecreated($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setActiontype($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setActionsubtype($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDuedate($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCreatedby($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setAssignedto($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAssignedby($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTitle($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTextbody($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setReflectnote($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCompleted($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDatecompleted($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setDateupdated($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCustomerlink($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setShiptolink($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setContactlink($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setSalesorderlink($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setQuotelink($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setVendorlink($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setVendorshipfromlink($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setPurchaseorderlink($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setActionlink($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setRescheduledlink($arr[$keys[23]]);
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
     * @return $this|\Useractions The current object, for fluid interface
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
        $criteria = new Criteria(UseractionsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UseractionsTableMap::COL_ID)) {
            $criteria->add(UseractionsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_DATECREATED)) {
            $criteria->add(UseractionsTableMap::COL_DATECREATED, $this->datecreated);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ACTIONTYPE)) {
            $criteria->add(UseractionsTableMap::COL_ACTIONTYPE, $this->actiontype);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ACTIONSUBTYPE)) {
            $criteria->add(UseractionsTableMap::COL_ACTIONSUBTYPE, $this->actionsubtype);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_DUEDATE)) {
            $criteria->add(UseractionsTableMap::COL_DUEDATE, $this->duedate);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_CREATEDBY)) {
            $criteria->add(UseractionsTableMap::COL_CREATEDBY, $this->createdby);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ASSIGNEDTO)) {
            $criteria->add(UseractionsTableMap::COL_ASSIGNEDTO, $this->assignedto);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ASSIGNEDBY)) {
            $criteria->add(UseractionsTableMap::COL_ASSIGNEDBY, $this->assignedby);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_TITLE)) {
            $criteria->add(UseractionsTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_TEXTBODY)) {
            $criteria->add(UseractionsTableMap::COL_TEXTBODY, $this->textbody);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_REFLECTNOTE)) {
            $criteria->add(UseractionsTableMap::COL_REFLECTNOTE, $this->reflectnote);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_COMPLETED)) {
            $criteria->add(UseractionsTableMap::COL_COMPLETED, $this->completed);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_DATECOMPLETED)) {
            $criteria->add(UseractionsTableMap::COL_DATECOMPLETED, $this->datecompleted);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_DATEUPDATED)) {
            $criteria->add(UseractionsTableMap::COL_DATEUPDATED, $this->dateupdated);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_CUSTOMERLINK)) {
            $criteria->add(UseractionsTableMap::COL_CUSTOMERLINK, $this->customerlink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_SHIPTOLINK)) {
            $criteria->add(UseractionsTableMap::COL_SHIPTOLINK, $this->shiptolink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_CONTACTLINK)) {
            $criteria->add(UseractionsTableMap::COL_CONTACTLINK, $this->contactlink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_SALESORDERLINK)) {
            $criteria->add(UseractionsTableMap::COL_SALESORDERLINK, $this->salesorderlink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_QUOTELINK)) {
            $criteria->add(UseractionsTableMap::COL_QUOTELINK, $this->quotelink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_VENDORLINK)) {
            $criteria->add(UseractionsTableMap::COL_VENDORLINK, $this->vendorlink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_VENDORSHIPFROMLINK)) {
            $criteria->add(UseractionsTableMap::COL_VENDORSHIPFROMLINK, $this->vendorshipfromlink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_PURCHASEORDERLINK)) {
            $criteria->add(UseractionsTableMap::COL_PURCHASEORDERLINK, $this->purchaseorderlink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_ACTIONLINK)) {
            $criteria->add(UseractionsTableMap::COL_ACTIONLINK, $this->actionlink);
        }
        if ($this->isColumnModified(UseractionsTableMap::COL_RESCHEDULEDLINK)) {
            $criteria->add(UseractionsTableMap::COL_RESCHEDULEDLINK, $this->rescheduledlink);
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
        $criteria = ChildUseractionsQuery::create();
        $criteria->add(UseractionsTableMap::COL_ID, $this->id);

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
        $validPk = null !== $this->getId();

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
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Useractions (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDatecreated($this->getDatecreated());
        $copyObj->setActiontype($this->getActiontype());
        $copyObj->setActionsubtype($this->getActionsubtype());
        $copyObj->setDuedate($this->getDuedate());
        $copyObj->setCreatedby($this->getCreatedby());
        $copyObj->setAssignedto($this->getAssignedto());
        $copyObj->setAssignedby($this->getAssignedby());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setTextbody($this->getTextbody());
        $copyObj->setReflectnote($this->getReflectnote());
        $copyObj->setCompleted($this->getCompleted());
        $copyObj->setDatecompleted($this->getDatecompleted());
        $copyObj->setDateupdated($this->getDateupdated());
        $copyObj->setCustomerlink($this->getCustomerlink());
        $copyObj->setShiptolink($this->getShiptolink());
        $copyObj->setContactlink($this->getContactlink());
        $copyObj->setSalesorderlink($this->getSalesorderlink());
        $copyObj->setQuotelink($this->getQuotelink());
        $copyObj->setVendorlink($this->getVendorlink());
        $copyObj->setVendorshipfromlink($this->getVendorshipfromlink());
        $copyObj->setPurchaseorderlink($this->getPurchaseorderlink());
        $copyObj->setActionlink($this->getActionlink());
        $copyObj->setRescheduledlink($this->getRescheduledlink());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Useractions Clone of current object.
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
        $this->id = null;
        $this->datecreated = null;
        $this->actiontype = null;
        $this->actionsubtype = null;
        $this->duedate = null;
        $this->createdby = null;
        $this->assignedto = null;
        $this->assignedby = null;
        $this->title = null;
        $this->textbody = null;
        $this->reflectnote = null;
        $this->completed = null;
        $this->datecompleted = null;
        $this->dateupdated = null;
        $this->customerlink = null;
        $this->shiptolink = null;
        $this->contactlink = null;
        $this->salesorderlink = null;
        $this->quotelink = null;
        $this->vendorlink = null;
        $this->vendorshipfromlink = null;
        $this->purchaseorderlink = null;
        $this->actionlink = null;
        $this->rescheduledlink = null;
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
        return (string) $this->exportTo(UseractionsTableMap::DEFAULT_STRING_FORMAT);
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
