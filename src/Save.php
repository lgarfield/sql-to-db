<?php
/**
 * This is a file for dbToMysql
 *
 * @Author Garfield
 * @Date 2019-09-11
 */
namespace DbToMysql;

/**
 * class Save
 *
 * @package DbToMysql
 */
class Save
{
    /**
     * sql files dir.
     *
     * string
     */
    private $_dir;

    /**
     * sql files for save.
     *
     * array
     */
    private $_files = [];

    private $_suffix = 'sql';

    /**
     * construct
     *
     * @void
     */
    public function __construct(string $dirName)
    {
        $this->_dir = $dirName;
    }

    /**
     * check dir is readable
     *
     * @return bool
     */
    public function canDirReadable(): bool
    {
        $tmpFileArr = scandir($this->_dir);
        if ($tmpFileArr) {
            $this->gengerateFileArr($tmpFileArr);

            return true;
        }

        return false;
    }

    /**
     * generate file arr
     *
     * @param array $fileArr
     *
     */
    public function generateFileArr(array $fileArr)
    {
        foreach ($fileArr as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }

            $tmpArr = explode('.', $file);
            $str = array_pop($tmpArr);

            if (!$str) {
                continue;
            }

            if ($str == $this->_suffix) {
                array_push($this->_files, $file);
            }
        }
    }

    /**
     * get files
     *
     * @return array
     */
    public function getFiles(): array
    {
        return $this->_files;
    }
}
