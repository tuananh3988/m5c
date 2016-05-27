<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\Exception;

/**
 * BaseModel
 *
 */
class BaseModel extends \yii\db\ActiveRecord
{
    /*
     * Get errors for view
     *
     */

    public function getMgsError($keys = []) {
        $mgs = '';
        $errors = $this->getErrors();
        if (!empty($errors)) {
            foreach ($keys as $key) {
                if (!empty($errors[$key])) {
                    foreach ($errors[$key] as $e) {
                        if (strpos($mgs, $e) === false) {
                            $mgs .= $e . '</br>';
                        } else {
                            continue;
                        }
                    }
                }
            }
        }

        return $mgs;
    }

    /*
     * Get class errors for view
     *
     */

    public function getClassField($key) {
        if (!empty($this->getErrors($key))) {
            return 'error_input';
        }

        return '';
    }

}
