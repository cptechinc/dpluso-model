<?php

namespace Map;

use \Qnote;
use \QnoteQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'qnote' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class QnoteTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.QnoteTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'qnote';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Qnote';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Qnote';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'qnote.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'qnote.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'qnote.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'qnote.time';

    /**
     * the column name for the rectype field
     */
    const COL_RECTYPE = 'qnote.rectype';

    /**
     * the column name for the key1 field
     */
    const COL_KEY1 = 'qnote.key1';

    /**
     * the column name for the key2 field
     */
    const COL_KEY2 = 'qnote.key2';

    /**
     * the column name for the key3 field
     */
    const COL_KEY3 = 'qnote.key3';

    /**
     * the column name for the key4 field
     */
    const COL_KEY4 = 'qnote.key4';

    /**
     * the column name for the key5 field
     */
    const COL_KEY5 = 'qnote.key5';

    /**
     * the column name for the form1 field
     */
    const COL_FORM1 = 'qnote.form1';

    /**
     * the column name for the form2 field
     */
    const COL_FORM2 = 'qnote.form2';

    /**
     * the column name for the form3 field
     */
    const COL_FORM3 = 'qnote.form3';

    /**
     * the column name for the form4 field
     */
    const COL_FORM4 = 'qnote.form4';

    /**
     * the column name for the form5 field
     */
    const COL_FORM5 = 'qnote.form5';

    /**
     * the column name for the form6 field
     */
    const COL_FORM6 = 'qnote.form6';

    /**
     * the column name for the form7 field
     */
    const COL_FORM7 = 'qnote.form7';

    /**
     * the column name for the form8 field
     */
    const COL_FORM8 = 'qnote.form8';

    /**
     * the column name for the colwidth field
     */
    const COL_COLWIDTH = 'qnote.colwidth';

    /**
     * the column name for the notefld field
     */
    const COL_NOTEFLD = 'qnote.notefld';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'qnote.dummy';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'Rectype', 'Key1', 'Key2', 'Key3', 'Key4', 'Key5', 'Form1', 'Form2', 'Form3', 'Form4', 'Form5', 'Form6', 'Form7', 'Form8', 'Colwidth', 'Notefld', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'rectype', 'key1', 'key2', 'key3', 'key4', 'key5', 'form1', 'form2', 'form3', 'form4', 'form5', 'form6', 'form7', 'form8', 'colwidth', 'notefld', 'dummy', ),
        self::TYPE_COLNAME       => array(QnoteTableMap::COL_SESSIONID, QnoteTableMap::COL_RECNO, QnoteTableMap::COL_DATE, QnoteTableMap::COL_TIME, QnoteTableMap::COL_RECTYPE, QnoteTableMap::COL_KEY1, QnoteTableMap::COL_KEY2, QnoteTableMap::COL_KEY3, QnoteTableMap::COL_KEY4, QnoteTableMap::COL_KEY5, QnoteTableMap::COL_FORM1, QnoteTableMap::COL_FORM2, QnoteTableMap::COL_FORM3, QnoteTableMap::COL_FORM4, QnoteTableMap::COL_FORM5, QnoteTableMap::COL_FORM6, QnoteTableMap::COL_FORM7, QnoteTableMap::COL_FORM8, QnoteTableMap::COL_COLWIDTH, QnoteTableMap::COL_NOTEFLD, QnoteTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'rectype', 'key1', 'key2', 'key3', 'key4', 'key5', 'form1', 'form2', 'form3', 'form4', 'form5', 'form6', 'form7', 'form8', 'colwidth', 'notefld', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Rectype' => 4, 'Key1' => 5, 'Key2' => 6, 'Key3' => 7, 'Key4' => 8, 'Key5' => 9, 'Form1' => 10, 'Form2' => 11, 'Form3' => 12, 'Form4' => 13, 'Form5' => 14, 'Form6' => 15, 'Form7' => 16, 'Form8' => 17, 'Colwidth' => 18, 'Notefld' => 19, 'Dummy' => 20, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'rectype' => 4, 'key1' => 5, 'key2' => 6, 'key3' => 7, 'key4' => 8, 'key5' => 9, 'form1' => 10, 'form2' => 11, 'form3' => 12, 'form4' => 13, 'form5' => 14, 'form6' => 15, 'form7' => 16, 'form8' => 17, 'colwidth' => 18, 'notefld' => 19, 'dummy' => 20, ),
        self::TYPE_COLNAME       => array(QnoteTableMap::COL_SESSIONID => 0, QnoteTableMap::COL_RECNO => 1, QnoteTableMap::COL_DATE => 2, QnoteTableMap::COL_TIME => 3, QnoteTableMap::COL_RECTYPE => 4, QnoteTableMap::COL_KEY1 => 5, QnoteTableMap::COL_KEY2 => 6, QnoteTableMap::COL_KEY3 => 7, QnoteTableMap::COL_KEY4 => 8, QnoteTableMap::COL_KEY5 => 9, QnoteTableMap::COL_FORM1 => 10, QnoteTableMap::COL_FORM2 => 11, QnoteTableMap::COL_FORM3 => 12, QnoteTableMap::COL_FORM4 => 13, QnoteTableMap::COL_FORM5 => 14, QnoteTableMap::COL_FORM6 => 15, QnoteTableMap::COL_FORM7 => 16, QnoteTableMap::COL_FORM8 => 17, QnoteTableMap::COL_COLWIDTH => 18, QnoteTableMap::COL_NOTEFLD => 19, QnoteTableMap::COL_DUMMY => 20, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'rectype' => 4, 'key1' => 5, 'key2' => 6, 'key3' => 7, 'key4' => 8, 'key5' => 9, 'form1' => 10, 'form2' => 11, 'form3' => 12, 'form4' => 13, 'form5' => 14, 'form6' => 15, 'form7' => 16, 'form8' => 17, 'colwidth' => 18, 'notefld' => 19, 'dummy' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('qnote');
        $this->setPhpName('Qnote');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Qnote');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, 0);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addPrimaryKey('rectype', 'Rectype', 'VARCHAR', true, 4, 'SORD');
        $this->addPrimaryKey('key1', 'Key1', 'VARCHAR', true, 30, '');
        $this->addPrimaryKey('key2', 'Key2', 'VARCHAR', true, 30, '');
        $this->addColumn('key3', 'Key3', 'VARCHAR', false, 30, null);
        $this->addColumn('key4', 'Key4', 'VARCHAR', false, 30, null);
        $this->addColumn('key5', 'Key5', 'VARCHAR', false, 30, null);
        $this->addPrimaryKey('form1', 'Form1', 'VARCHAR', true, 1, '');
        $this->addPrimaryKey('form2', 'Form2', 'VARCHAR', true, 1, '');
        $this->addPrimaryKey('form3', 'Form3', 'VARCHAR', true, 1, '');
        $this->addPrimaryKey('form4', 'Form4', 'VARCHAR', true, 1, '');
        $this->addPrimaryKey('form5', 'Form5', 'VARCHAR', true, 1, '');
        $this->addColumn('form6', 'Form6', 'VARCHAR', false, 1, null);
        $this->addColumn('form7', 'Form7', 'VARCHAR', false, 1, null);
        $this->addColumn('form8', 'Form8', 'VARCHAR', false, 1, null);
        $this->addColumn('colwidth', 'Colwidth', 'INTEGER', false, 4, null);
        $this->addColumn('notefld', 'Notefld', 'LONGVARCHAR', false, null, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Qnote $obj A \Qnote object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getRecno() || is_scalar($obj->getRecno()) || is_callable([$obj->getRecno(), '__toString']) ? (string) $obj->getRecno() : $obj->getRecno()), (null === $obj->getRectype() || is_scalar($obj->getRectype()) || is_callable([$obj->getRectype(), '__toString']) ? (string) $obj->getRectype() : $obj->getRectype()), (null === $obj->getKey1() || is_scalar($obj->getKey1()) || is_callable([$obj->getKey1(), '__toString']) ? (string) $obj->getKey1() : $obj->getKey1()), (null === $obj->getKey2() || is_scalar($obj->getKey2()) || is_callable([$obj->getKey2(), '__toString']) ? (string) $obj->getKey2() : $obj->getKey2()), (null === $obj->getForm1() || is_scalar($obj->getForm1()) || is_callable([$obj->getForm1(), '__toString']) ? (string) $obj->getForm1() : $obj->getForm1()), (null === $obj->getForm2() || is_scalar($obj->getForm2()) || is_callable([$obj->getForm2(), '__toString']) ? (string) $obj->getForm2() : $obj->getForm2()), (null === $obj->getForm3() || is_scalar($obj->getForm3()) || is_callable([$obj->getForm3(), '__toString']) ? (string) $obj->getForm3() : $obj->getForm3()), (null === $obj->getForm4() || is_scalar($obj->getForm4()) || is_callable([$obj->getForm4(), '__toString']) ? (string) $obj->getForm4() : $obj->getForm4()), (null === $obj->getForm5() || is_scalar($obj->getForm5()) || is_callable([$obj->getForm5(), '__toString']) ? (string) $obj->getForm5() : $obj->getForm5())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \Qnote object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Qnote) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno()), (null === $value->getRectype() || is_scalar($value->getRectype()) || is_callable([$value->getRectype(), '__toString']) ? (string) $value->getRectype() : $value->getRectype()), (null === $value->getKey1() || is_scalar($value->getKey1()) || is_callable([$value->getKey1(), '__toString']) ? (string) $value->getKey1() : $value->getKey1()), (null === $value->getKey2() || is_scalar($value->getKey2()) || is_callable([$value->getKey2(), '__toString']) ? (string) $value->getKey2() : $value->getKey2()), (null === $value->getForm1() || is_scalar($value->getForm1()) || is_callable([$value->getForm1(), '__toString']) ? (string) $value->getForm1() : $value->getForm1()), (null === $value->getForm2() || is_scalar($value->getForm2()) || is_callable([$value->getForm2(), '__toString']) ? (string) $value->getForm2() : $value->getForm2()), (null === $value->getForm3() || is_scalar($value->getForm3()) || is_callable([$value->getForm3(), '__toString']) ? (string) $value->getForm3() : $value->getForm3()), (null === $value->getForm4() || is_scalar($value->getForm4()) || is_callable([$value->getForm4(), '__toString']) ? (string) $value->getForm4() : $value->getForm4()), (null === $value->getForm5() || is_scalar($value->getForm5()) || is_callable([$value->getForm5(), '__toString']) ? (string) $value->getForm5() : $value->getForm5())]);

            } elseif (is_array($value) && count($value) === 10) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3]), (null === $value[4] || is_scalar($value[4]) || is_callable([$value[4], '__toString']) ? (string) $value[4] : $value[4]), (null === $value[5] || is_scalar($value[5]) || is_callable([$value[5], '__toString']) ? (string) $value[5] : $value[5]), (null === $value[6] || is_scalar($value[6]) || is_callable([$value[6], '__toString']) ? (string) $value[6] : $value[6]), (null === $value[7] || is_scalar($value[7]) || is_callable([$value[7], '__toString']) ? (string) $value[7] : $value[7]), (null === $value[8] || is_scalar($value[8]) || is_callable([$value[8], '__toString']) ? (string) $value[8] : $value[8]), (null === $value[9] || is_scalar($value[9]) || is_callable([$value[9], '__toString']) ? (string) $value[9] : $value[9])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Qnote object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Key1', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Key2', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Form1', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Form2', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Form3', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Form4', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 14 + $offset : static::translateFieldName('Form5', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Key1', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Key1', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Key1', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Key1', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Key1', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Key2', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Key2', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Key2', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Key2', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Key2', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Form1', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Form1', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Form1', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Form1', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Form1', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Form2', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Form2', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Form2', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Form2', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Form2', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Form3', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Form3', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Form3', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Form3', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Form3', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Form4', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Form4', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Form4', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Form4', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Form4', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 14 + $offset : static::translateFieldName('Form5', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 14 + $offset : static::translateFieldName('Form5', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 14 + $offset : static::translateFieldName('Form5', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 14 + $offset : static::translateFieldName('Form5', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 14 + $offset : static::translateFieldName('Form5', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('Rectype', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 5 + $offset
                : self::translateFieldName('Key1', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 6 + $offset
                : self::translateFieldName('Key2', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 10 + $offset
                : self::translateFieldName('Form1', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 11 + $offset
                : self::translateFieldName('Form2', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 12 + $offset
                : self::translateFieldName('Form3', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 13 + $offset
                : self::translateFieldName('Form4', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 14 + $offset
                : self::translateFieldName('Form5', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? QnoteTableMap::CLASS_DEFAULT : QnoteTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Qnote object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = QnoteTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = QnoteTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + QnoteTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = QnoteTableMap::OM_CLASS;
            /** @var Qnote $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            QnoteTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = QnoteTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = QnoteTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Qnote $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                QnoteTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(QnoteTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(QnoteTableMap::COL_RECNO);
            $criteria->addSelectColumn(QnoteTableMap::COL_DATE);
            $criteria->addSelectColumn(QnoteTableMap::COL_TIME);
            $criteria->addSelectColumn(QnoteTableMap::COL_RECTYPE);
            $criteria->addSelectColumn(QnoteTableMap::COL_KEY1);
            $criteria->addSelectColumn(QnoteTableMap::COL_KEY2);
            $criteria->addSelectColumn(QnoteTableMap::COL_KEY3);
            $criteria->addSelectColumn(QnoteTableMap::COL_KEY4);
            $criteria->addSelectColumn(QnoteTableMap::COL_KEY5);
            $criteria->addSelectColumn(QnoteTableMap::COL_FORM1);
            $criteria->addSelectColumn(QnoteTableMap::COL_FORM2);
            $criteria->addSelectColumn(QnoteTableMap::COL_FORM3);
            $criteria->addSelectColumn(QnoteTableMap::COL_FORM4);
            $criteria->addSelectColumn(QnoteTableMap::COL_FORM5);
            $criteria->addSelectColumn(QnoteTableMap::COL_FORM6);
            $criteria->addSelectColumn(QnoteTableMap::COL_FORM7);
            $criteria->addSelectColumn(QnoteTableMap::COL_FORM8);
            $criteria->addSelectColumn(QnoteTableMap::COL_COLWIDTH);
            $criteria->addSelectColumn(QnoteTableMap::COL_NOTEFLD);
            $criteria->addSelectColumn(QnoteTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.rectype');
            $criteria->addSelectColumn($alias . '.key1');
            $criteria->addSelectColumn($alias . '.key2');
            $criteria->addSelectColumn($alias . '.key3');
            $criteria->addSelectColumn($alias . '.key4');
            $criteria->addSelectColumn($alias . '.key5');
            $criteria->addSelectColumn($alias . '.form1');
            $criteria->addSelectColumn($alias . '.form2');
            $criteria->addSelectColumn($alias . '.form3');
            $criteria->addSelectColumn($alias . '.form4');
            $criteria->addSelectColumn($alias . '.form5');
            $criteria->addSelectColumn($alias . '.form6');
            $criteria->addSelectColumn($alias . '.form7');
            $criteria->addSelectColumn($alias . '.form8');
            $criteria->addSelectColumn($alias . '.colwidth');
            $criteria->addSelectColumn($alias . '.notefld');
            $criteria->addSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(QnoteTableMap::DATABASE_NAME)->getTable(QnoteTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(QnoteTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(QnoteTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new QnoteTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Qnote or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Qnote object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QnoteTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Qnote) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(QnoteTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(QnoteTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_RECNO, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_RECTYPE, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_KEY1, $value[3]));
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_KEY2, $value[4]));
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_FORM1, $value[5]));
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_FORM2, $value[6]));
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_FORM3, $value[7]));
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_FORM4, $value[8]));
                $criterion->addAnd($criteria->getNewCriterion(QnoteTableMap::COL_FORM5, $value[9]));
                $criteria->addOr($criterion);
            }
        }

        $query = QnoteQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            QnoteTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                QnoteTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the qnote table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return QnoteQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Qnote or Criteria object.
     *
     * @param mixed               $criteria Criteria or Qnote object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QnoteTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Qnote object
        }


        // Set the correct dbName
        $query = QnoteQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // QnoteTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
QnoteTableMap::buildTableMap();
