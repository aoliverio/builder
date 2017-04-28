<?php

/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Antonio Oliverio
 * @copyright     Copyright (c) Antonio Oliverio (http://www.aoliverio.com)
 * @link          http://www.aoliverio.com/builder AOBuilder Project
 * @since         1.1.3
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Builder\Lib;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Utility\Inflector;
use Cake\Core\Configure;

/**
 * This class is used to manage and organize files in the filesystem
 */
class Filesystem {

    /**
     * Upload and organize file in /uploads/YEAR/MONTH directory
     * 
     * @param type $inputfile
     * @param string $destfile
     * @return boolean
     */
    public function upload($inputfile, $destfile = NULL) {

        /**
         * 
         */
        if (strlen(trim($inputfile['name'])) === 0)
            return FALSE;

        /**
         * 
         */
        $filename = strtolower($inputfile['name']);
        $sourcefile = $inputfile['tmp_name'];
        $file = new File($sourcefile, true, 0775);

        /**
         * 
         */
        $CONTENT_YEAR = date('Y');
        $CONTENT_MONTH = date('m');
        $UPLOAD_DIR = (Configure::check('DEFAULT_UPLOAD_DIR') ? Configure::read('DEFAULT_UPLOAD_DIR') : WWW_ROOT . 'uploads');
        $folder_dest = new Folder($UPLOAD_DIR);

        if (!$folder_dest->inCakePath($folder_dest->pwd() . DS . $CONTENT_YEAR))
            $folder_dest->create($folder_dest->pwd() . DS . $CONTENT_YEAR);
        $folder_dest->cd($CONTENT_YEAR);

        if (!$folder_dest->inCakePath($folder_dest->pwd() . DS . $CONTENT_MONTH))
            $folder_dest->create($folder_dest->pwd() . DS . $CONTENT_MONTH);
        $folder_dest->cd($CONTENT_MONTH);

        $path = DS . $CONTENT_YEAR . DS . $CONTENT_MONTH . DS;
        $permittedFilename = $this->getPermittedFileName($UPLOAD_DIR . $path, $filename);
        $destfile = $folder_dest->pwd() . DS . $permittedFilename;

        /**
         * Save file in filesystem
         */
        if ($file->copy($destfile, true))
            return $path . $permittedFilename;
        else
            return FALSE;
    }

    /**
     * Delete file from filesystem
     * 
     * @param type $content_path
     * @return boolean
     */
    public function remove($content_path) {
        $UPLOAD_DIR = (Configure::check('DEFAULT_UPLOAD_DIR') ? Configure::read('DEFAULT_UPLOAD_DIR') : WWW_ROOT . 'uploads');
        $file = new File($UPLOAD_DIR . $content_path);
        return $file->delete();
    }

    /**
     * Returns the valid file name to use for upload
     * 
     * @param string $path
     * @return string
     */
    public function getPermittedFileName($directory, $filename) {

        /**
         * Get $pathInfo from $filename
         */
        $pathInfo = pathinfo($filename);

        /**
         * Max limit permitted $filename
         */
        $pathInfo['filename'] = substr(Inflector::slug($pathInfo['filename']), 0, 100);

        /**
         * Min limit permitted $filename
         */
        if (strlen($pathInfo['filename']) < 3)
            $pathInfo['filename'] = $this->_randomString();

        /**
         * 
         */
        $dir = new Folder($directory);
        $iter = 0;
        do {
            if ($iter == 0)
                $slugFileName = $pathInfo['filename'] . '.' . $pathInfo['extension'];
            else
                $slugFileName = $pathInfo['filename'] . '-' . $iter . '.' . $pathInfo['extension'];
            $data = $dir->find($slugFileName, true);
            $iter++;
        } while (count($data) > 0);

        return $slugFileName;
    }

}
