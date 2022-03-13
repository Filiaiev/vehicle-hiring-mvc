<?php
    class QueryBuilder {
        private function __construct() {      
        }

        static function buildPreparedQuestionMarks(array $values) {
            $fill = "?, ";
            $i = count($values);

            $qmarks = str_repeat($fill, max($i-1, 0));
            $qmarks .= $i >= 1 ? "?" : "";
            
            return $qmarks;
        }

        static function buildValuesToInsert(array $values) {
            $insertQuery = "";
            $i = count($values);

            foreach(array_keys($values) as $field) {
                $insertQuery .= "$field";
                if(--$i) {
                    $insertQuery .= ", ";
                }
            }

            return $insertQuery;
        }
    }
?>