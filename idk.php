<?php
class GradeConverterModel {
    private $percentageGrade = 0;
    const MIN_PERCENT = 0;
    const MAX_PERCENT = 100;
    public function setPercentageGrade($percentage){
        if($this->isValidPercentageGrade($percentage)){
            $this->percentageGrade = $percentage;
        }
    }
    private function isValidPercentageGrade($percentage){
        //echo "checking $percentage";
        if((is_numeric($percentage)) &&
            ($percentage >= self::MIN_PERCENT) &&
            ($percentage <= self::MAX_PERCENT)){
            $this->percentageGrade = $percentage;
        }
    }


    public function getLetterGrade(){
        /* file format is:
            letter grade, min, max
           e.g.
            F,0,49
            C,50,69
            B,70,89
            A,90,100
        */
        $gradesFromFile = file('data.txt');

        foreach($gradesFromFile as $oneGradeFromFile){
            /* e.g. $oneGradeFromFile = "C,50,69" */
            $trimmed = trim($oneGradeFromFile);
            $data = preg_split("/,/", $trimmed); // e.g. C

            $letterGrade = $data[0];
            $lowerBound  = $data[1];
            $upperBound  = rtrim($data[2]);

            if(($this->percentageGrade >= $lowerBound) &&
                ($this->percentageGrade <= $upperBound)){
                echo $this->percentageGrade . " is " . $letterGrade;
                return $letterGrade;
            }
        }
        return "Error";
    }
}


class GradeConverterView {
    private $converter;
    private $percent;

    public function __construct(GradeConverterModel $converter, $percent) {
        $this->converter = $converter;
        $this->percent   = $percent;
    }

    public function output() {
        $html = '<form action="?action=convert" method="post">
					<input name="percent" type="hidden" value="' . $this->percent .'" />
					<label>' . $this->percent .':</label>
					<input name="letter" type="text" value="' . $this->converter->getLetterGrade($this->percent) . '" />
					<input type="submit" value="Convert" />				
				</form>';

        return $html;
    }
}


class GradeConverterController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function convert($request) {
        if (isset($_REQUEST['percent'])) {
            $this->model->setPercentageGrade($_REQUEST['percent']);
            echo "set " . $_REQUEST['percent'];
        }
    }
}
